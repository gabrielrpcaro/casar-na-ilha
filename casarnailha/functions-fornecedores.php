<?php

/* 

FORNECEDOR POST TYPE

*/

add_action( 'init', 'posttype_fornecedor' );

function posttype_fornecedor() {
  $labels = array(
    'name'               => _x( 'Fornecedores', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Fornecedor', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Fornecedores', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Fornecedores', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Adicionar Novo', 'atuacao', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Adicionar Novo Fornecedor', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Novo Fornecedor', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Editar Fornecedor', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Ver Fornecedor', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Todos os Fornecedores', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Procurar Fornecedor', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Fornecedor:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'Nenhum Fornecedor encontrado.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'Nenhum Fornecedor encontrado no lixo.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'menu_icon'   => 'dashicons-clipboard',
    'description'        => __('Fornecedor', 'fornecedor' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'fornecedor' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => null,
    'show_in_rest' => true,
    'taxonomies'  => array('tipos'),
    'supports'           => array('title', 'permalink', 'editor', 'author', 'thumbnail')
  );

  register_post_type('fornecedor', $args);
}


/* 
add_action( 'init', 'sk_add_category_taxonomy_to_events' );

function sk_add_category_taxonomy_to_events() {
  register_taxonomy_for_object_type( 'tipos', 'biblioteca' );
}

*/

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_topics_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Categoria do fornecedor', 'taxonomy general name' ),
    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
    'search_items' =>  __( 'Procurar Categoria' ),
    'all_items' => __( 'Todas as Categorias' ),
    'parent_item' => __( 'Categoria parent' ),
    'parent_item_colon' => __( 'Categoria parent:' ),
    'edit_item' => __( 'Editar Categoria' ), 
    'update_item' => __( 'Atualizar Categoria' ),
    'add_new_item' => __( 'Adicionar nova Categoria' ),
    'new_item_name' => __( 'Novo nome de Categoria' ),
    'menu_name' => __( 'Categoria do fornecedor' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('tipos',array('fornecedor'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_rest' => true,
    'rewrite' => array( 'slug' => 'fornecedores' ),
  ));
 
}