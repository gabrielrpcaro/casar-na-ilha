<?php

/* 

CADASTRO POST TYPE

*/

add_action( 'init', 'posttype_cadastro' );

function posttype_cadastro() {
  $labels = array(
    'name'               => _x( 'Cadastro', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Cadastro', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Cadastro', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Cadastro', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Adicionar Novo', 'atuacao', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Adicionar Novo Cadastro', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Novo Cadastro', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Editar Cadastro', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Ver Cadastro', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Todos os Cadastros', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Procurar Cadastro', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Cadastro:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'Nenhum Cadastro encontrado.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'Nenhum Cadastro encontrado no lixo.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'menu_icon'   => 'dashicons-groups',
    'description'        => __('Cadastro', 'cadastro' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'cadastro' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => null,
    'show_in_rest' => true,
    'supports'           => array('title')
  );

  register_post_type('cadastro', $args);
}


/*

MODIFICANDO AS COLUNAS

*/
add_filter( 'manage_cadastro_posts_columns', 'smashing_cadastro_columns' );
function smashing_cadastro_columns( $columns ) {
  
  
    $columns = array(
      'cb' => $columns['cb'],
        'tipo' => __( 'tipo' ),
        'nome' => __( 'nome' ),
        'parceirx' => __( 'parceirx' ),
        'empresa' => __( 'empresa' ),
        'email' => __( 'email' ),
        'whatsapp' => __( 'whatsapp' ),
        'localizacao' => __( 'localizacao' ),
        'cidade' => __( 'cidade' ),
        'data' => __( 'data' ),
        'servicos' => __( 'servicos' ),
        'motivo' => __( 'motivo' ),
        'beneficios' => __( 'beneficios' ),
        'realizados' => __( 'realizados' )        
    );
  
  return $columns;
}

add_action( 'manage_cadastro_posts_custom_column', 'smashing_cadastro_column', 10, 2);
function smashing_cadastro_column( $column, $post_id ) {
      if ( 'tipo' === $column ) {
    echo get_field("tipo", $post_id);
  }

        if ( 'parceirx' === $column ) {
    echo get_field("parceiro", $post_id);
  }
      if ( 'nome' === $column ) {
    echo get_field("nome", $post_id);
  }   
      if ( 'empresa' === $column ) {
    echo get_field("empresa", $post_id);
  }
      if ( 'email' === $column ) {
    echo get_field("email", $post_id);
  }
      if ( 'whatsapp' === $column ) {
    echo get_field("whatsapp", $post_id);
  }
      if ( 'localizacao' === $column ) {
    echo get_field("localizacao", $post_id);
  }
      if ( 'cidade' === $column ) {
    echo get_field("cidade", $post_id);
  }
      if ( 'data' === $column ) {
    echo get_field("data", $post_id);
  }
      if ( 'servicos' === $column ) {
    echo get_field("servicos", $post_id);
  }
      if ( 'motivo' === $column ) {
    echo get_field("motivo", $post_id);
  }
      if ( 'beneficios' === $column ) {
    echo get_field("beneficios", $post_id);
  }
      if ( 'realizados' === $column ) {
    echo get_field("realizados", $post_id);
  }

}


/*

REGISTRA FUNÇÃO DO AJAX DO ENVIO

*/


add_action( 'wp_ajax_postCadastro', 'postCadastro_callback' );
add_action( 'wp_ajax_nopriv_postCadastro', 'postCadastro_callback' );

function postCadastro_callback() {

$nome = $_POST["nome"];
$email = $_POST["email"];

 $cadastroargs = array(  
  'posts_per_page' => -1,
  'post_type'   => 'cadastro',
  'meta_query'  => array(
    array(
      'key'   => 'email',
      'value'   => $email,
      'compare' => '='
    )));

$cadastro = new WP_Query($cadastroargs); 
$quantidade = $cadastro->found_posts;

if ($quantidade == 0) {
  // CADASTRA A PESSOA
if(is_email(esc_attr($email))){
  // CHECOU O EMAIL E TA TUDO BEM

  $Cadastra = array(
   'post_type' => 'cadastro',
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
