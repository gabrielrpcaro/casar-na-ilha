<?php

/* 

NEWSLETTER POST TYPE

*/

add_action( 'init', 'posttype_news' );

function posttype_news() {
  $labels = array(
    'name'               => _x( 'Newsletter', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Assinante', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Newsletter', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Newsletter', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Adicionar Novo', 'atuacao', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Adicionar Novo Assinante', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Novo Assinante', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Editar Assinante', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Ver Assinante', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Todos os Assinantes', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Procurar Assinante', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Assinante:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'Nenhum Assinante encontrado.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'Nenhum Assinante encontrado no lixo.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'menu_icon'   => 'dashicons-email-alt',
    'description'        => __('Assinante', 'news' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'news' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => null,
    'show_in_rest' => true,
    'supports'           => array('title')
  );

  register_post_type('news', $args);
}


/*

MODIFICANDO AS COLUNAS
LIKE

*/
add_filter( 'manage_news_posts_columns', 'smashing_news_columns' );
function smashing_news_columns( $columns ) {
  
  
    $columns = array(
      'cb' => $columns['cb'],
             'nome' => __( 'nome' ),
       'email' => __( 'email' )
    );
  
  return $columns;
}

add_action( 'manage_news_posts_custom_column', 'smashing_news_column', 10, 2);
function smashing_news_column( $column, $post_id ) {

      if ( 'nome' === $column ) {
    echo get_field("nome", $post_id);
  }   
      if ( 'email' === $column ) {
    echo get_field("email", $post_id);
  }



}


/*

REGISTRA FUNÇÃO DO AJAX DO ENVIO

*/


add_action( 'wp_ajax_postNews', 'postNews_callback' );
add_action( 'wp_ajax_nopriv_postNews', 'postNews_callback' );

function postNews_callback() {

$nome = $_POST["nome"];
$email = $_POST["email"];

 $newsargs = array(  
  'posts_per_page' => -1,
  'post_type'   => 'news',
  'meta_query'  => array(
    array(
      'key'   => 'email',
      'value'   => $email,
      'compare' => '='
    )));

$news = new WP_Query($newsargs); 
$quantidade = $news->found_posts;

if ($quantidade == 0) {
  // CADASTRA A PESSOA
if(is_email(esc_attr($email))){
  // CHECOU O EMAIL E TA TUDO BEM

  $Cadastra = array(
   'post_type' => 'news',
    'post_status'   => 'publish',
    'post_author'   => 1,
     'meta_input'   => array(
                    'nome' => $nome,
                    'email' => $email 
                )
);
 
   $idCadastrado = wp_insert_post($Cadastra);

// CHECA SE ADICIONOU O POST OU NAO
   if ($idCadastrado) {
  $response = "Prontinho, agora você faz parte da nossa newsletter";
   }else{
    $responde = "Erro, não foi possivel cadastrar o email na newsletter"; 
   }


// O EMAIL NAO É VALIDO
}else{
  $response = "Email inválido";
}



// FIM DO IF SE JA TEM EMAIL CADASTRADO
}else{
  //  EMAIL JA CADASTRADO

  $response = "Este email já está cadastrado!";
}

  echo json_encode($response);
 wp_die();
}
