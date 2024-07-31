<?php

function wrap_embed_with_div($html, $url, $attr) {

     return '<div class="video-container">' . $html . '</div>';

}

 add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

/* 

DEFINIÇÕES DE TAMANHOS DE THUMBS

*/

if(function_exists('add_theme_support')){ 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size(1100, 581, true);
  add_image_size('thumb-fornecedor', 180, 180, true);
  add_image_size('capa-fornecedor', 600, 317, true);
  add_image_size('mosaico-slim', 500, 866, true);
  add_image_size('mosaico-wide', 1100, 445, true);
  add_image_size('mosaico-regular', 700, 590, true);
  add_image_size('banner-topo', 693, 101, true);
  add_image_size('banner-mosaico', 352, 295, true);
  add_image_size('banner-post', 300, 250, true);
  add_image_size('capa-site', 770, 430, true);
  add_image_size('banner-programacao', 352, 130, true);

/*   

  add_image_size('topo-pagina', 1380, 400, true);
  add_image_size('capa-livro', 600, 936, true);
  add_image_size('avatar', 170, 170, array('center', 'center'));
*/
}

add_filter( 'jpeg_quality', function ( $quality ) { return 100; } );


/* 

Desativar barras WP

*/

add_filter('show_admin_bar', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

add_filter ('wp_image_editors', 'wpse303391_change_graphic_editor');
function wpse303391_change_graphic_editor ($array) {
    return array( 'WP_Image_Editor_Gd', 'WP_Image_Editor_Imagick' );
    }

include "functions-fornecedores.php";
include "functions-news.php";
include "functions-cadastro.php";

function listaCategorias() {
  $categories = get_terms( array(
    'taxonomy' => 'tipos',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => 0
) );

if(isset($_GET['c'])) {
  $c = $_GET['c'];
 }else{
  $c = "";
  }

  if(is_tax()){ $abc = get_queried_object_id(); }else{ $abc = 0; }

  foreach ($categories as $categoria) { 
    $xyz = $categoria->term_id; ?>
      <li <?php if($abc == $xyz || $c == $categoria->slug){ ?>class="selecionati"<?php } ?> ><div class="estrelinha"></div><a href="<?php echo esc_url( get_category_link($categoria->term_id )); ?>"><?php echo $categoria->name; ?><div class="traco"></div></a></li>
<?php }
}

function dropCategorias($c = null) {

if($c){ $modificado = 1; }else{ $modificado = 0; }

if(!$c){
  if(isset($_GET['c'])) {
  $c = $_GET['c'];
 }else{
  $c = "";
  }
}

  $categories = get_terms( array(
    'taxonomy' => 'tipos',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => 0
) );
  foreach ($categories as $categoria) {
$preciso = get_field("preciso", "tipos_". $categoria->term_id ."");


if($modificado == 1){
  if(in_array($c, $preciso)){
?>
<?php echo $categoria->slug; ?>+<?php
}
}else{
    ?>
    <option <?php if($c == $categoria->slug){echo"selected";} ?> value="<?php echo $categoria->slug; ?>"><?php echo $categoria->name; ?></option>
<?php
  }}
}

function dropCategoriasX($c = null) {

  $categories = get_terms( array(
    'taxonomy' => 'tipos',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => 0
) );

  $lenke = get_queried_object_id();

  foreach ($categories as $categoria) { ?>

<option <?php if($lenke == $categoria->term_id){echo"selected";} ?> value="<?php echo esc_url( get_category_link($categoria->term_id )); ?>"><?php echo $categoria->name; ?></option>

<?php 
}}


function ListaPrecisos() {

$field = get_field_object('field_5ec381d069725');
$choices = $field['choices'];

foreach ($choices as $k => $v) { ?>
  <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
 <?php }
}



/*

TRAZ OS FORNECEDORES ALEATORIAMENTE

*/

session_start();
 
add_filter( 'posts_orderby', 'randomise_with_pagination' );
function randomise_with_pagination( $orderby ) {
 
    if( is_page(131) ) {
 
        // Reset seed on load of initial archive page
        if( ! get_query_var( 'paged' ) || get_query_var( 'paged' ) == 0 || get_query_var( 'paged' ) == 1 ) {
            if( isset( $_SESSION['seed'] ) ) {
                unset( $_SESSION['seed'] );
            }
        }
     
        // Get seed from session variable if it exists
        $seed = false;
        if( isset( $_SESSION['seed'] ) ) {
            $seed = $_SESSION['seed'];
        }
     
            // Set new seed if none exists
            if ( ! $seed ) {
                $seed = rand();
                $_SESSION['seed'] = $seed;
            }
     
            // Update ORDER BY clause to use seed
            $orderby = 'RAND(' . $seed . ')';
    }
 
    return $orderby;
}



/*

REGISTRA FUNÇÃO DO AJAX DA BUSCA

*/


add_action( 'wp_ajax_getbusca', 'getbusca_callback' );
add_action( 'wp_ajax_nopriv_getbusca', 'getbusca_callback' );

function getbusca_callback() {

if(isset($_POST["categoria"])) {
  $categoria = $_POST["categoria"];
 }else{
  $categoria = "";
  }


$termos = get_terms( array(
  'taxonomy' => 'tipos',
     'hide_empty' => false
));

$total = count($termos);
$response = array();

foreach($termos as $tee){
$slu = $tee->slug;
$preciso = get_field("preciso", "tipos_". $tee->term_id ."");


if(in_array($categoria, $preciso)){
  $response[] = array("id" => $tee->slug, "name" => $tee->name);
}

}


  echo json_encode($response);
 wp_die();
}