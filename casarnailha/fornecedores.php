<?php

/*
Template Name: Fornecedores

*/

?>

<?php get_header(); ?>

<div class="capaHACK">
  <div class="capa" style="background-image:url('<?php echo get_the_post_thumbnail_url(131); ?>');"></div>
</div>


<div class="caixa forni" id="buscar">
  <div class="ondinhabox forni">
    <div class="ondinhaHACK forni">
      <div class="ondinha" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/ondinha.png');">
      </div>
    </div>
  </div>
  <div class="descricao"><?php echo get_post_field('post_content', 131) ?></div>
  <div class="categresp"><select class="categoriasresp"><?php dropCategoriasX(); ?></select></div>
  <ul class="categorias">
  	<?php listaCategorias(); ?>
  </ul>
</div>


<ul class="lista-fornecedores">

	<?php 

if(isset($_GET['c'])) {
  $c = $_GET['c'];
 }else{
  $c = "";
  }

if(isset($_GET['cc'])) {
  $cc = $_GET['cc'];
 }else{
  $cc= "";
  }



if(isset($_GET['b'])) {
  $b = $_GET['b'];
 }else{
  $b = "";
  }
if($c){ $termone = get_term_by('slug', $c, 'tipos');}else{$termone = ""; }

if($b){
?>
<div class="linha forone">
  <div class="triguinho">
    <div class="trigoHACK">
      <div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
      </div>
    </div>
  </div>

<h3>Procurando por <?php echo $b; ?> <?php if($termone){ echo"em <span>$termone->name</span>"; } ?></h3>
  
  <div class="triguinho">
    <div class="trigoHACK">
      <div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
      </div>
    </div>
  </div>
</div>


<?php
}


$taxID = get_queried_object()->term_id;

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
if(is_tax("tipos")){

	 $argsFornecedor = array(  
        'post_type' => 'fornecedor',
        'post_status' => 'publish',
        'posts_per_page' => 15,
        'paged'          => $paged,
        'orderby' => 'title',
        'order'        => 'ASC',
         'tax_query' => array(
        array (
            'taxonomy' => 'tipos',
            'field' => 'term_id',
            'terms' => $taxID,
        )
    )
    ); 

}else if($c || $b){


if(!$c){
  // NAO TEM CATEGORIA
 $argsFornecedor = array(  
        'post_type' => 'fornecedor',
        'post_status' => 'publish',
        'posts_per_page' => 15,
          's' => esc_attr($b),
        'paged'          => $paged
    ); 
}else{
  // TEM CATEGORIA
 
 $cs = explode(",", $c);
 $argsFornecedor = array(  
        'post_type' => 'fornecedor',
        'post_status' => 'publish',
        'posts_per_page' => 15,
        'orderby' => 'title',
        'order'        => 'ASC',
         's' => esc_attr($b),
        'paged'          => $paged,
         'tax_query' => array(
        array (
            'taxonomy' => 'tipos',
            'field' => 'slug',
            'terms' => $cs,
            'operator' => 'IN'
        )
    )
    ); 


}


}else if($cc){


$cc2 = array($cc);

$termos = get_terms( array(
  'taxonomy' => 'tipos',
     'hide_empty' => false
));

$responsa = array();

foreach($termos as $tee){
$slu = $tee->slug;
$preciso = get_field("preciso", "tipos_". $tee->term_id."");

if(count($preciso) > 0){
if(in_array($cc, $preciso)){
  $responsa[] = $tee->slug;
}
}

}

 $argsFornecedor = array(  
        'post_type' => 'fornecedor',
        'post_status' => 'publish',
        'posts_per_page' => 15,
'tax_query' => array(
    array(
        'taxonomy' => 'tipos',
        'field'    => 'slug',
        'terms'    => $responsa,
    )),
        'paged'          => $paged
    ); 




}else{

     $argsFornecedor = array(  
        'post_type' => 'fornecedor',
        'post_status' => 'publish',
        'posts_per_page' => 15,
        'orderby'        => 'rand',
        'paged'          => $paged
    );
}

    $fornecedores = new WP_Query($argsFornecedor);


if($fornecedores->have_posts()){
    while ($fornecedores->have_posts()) : $fornecedores->the_post(); ?>

	<li class="box-fornecedor">
		<div class="thumbHACK">
          <?php $capafornecedor = get_the_post_thumbnail_url(get_the_ID(), 'capa-fornecedor'); ?>
			<a name="<?php echo get_the_title(); ?>" href="<?php the_permalink(); ?>"><div class="thumb" style="background-image: url('<?php echo $capafornecedor; ?>');"></div></a>
        </div>
		<div class="envolve-info">

          <div class="categoria">
			<?php
      $termid = "";
			$terms = get_the_terms(get_the_ID(), 'tipos' );
			if ($terms) {$termid = $terms[0]->term_id;}
			if($termid){ ?>
			<a href="<?php echo get_term_link($termid, "tipos"); ?>"><?php echo $terms[0]->name; ?></a>
			<?php } ?>
    		</div>
          	
           <a href="<?php echo get_permalink(); ?>"><h3 class="nome-fornecedor"><?php echo get_the_title(); ?></h3>
           </a>
		</div>
	</li>

	<?php 
    endwhile;

 }else{
  echo"<div class='nadaencontrdo'>Desculpe, não encontramos nada por aqui :(</div>"; 
 }

    ?>

	<li class="fakefornecedor"></li>
	<li class="fakefornecedor"></li>

</ul>

<div class="pagenav"><?php
     		$big = 999999999;
     		echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $fornecedores->max_num_pages,
          'prev_text' => '<span></span>',
          'next_text' => '<span></span>',
          'before_page_number' => '<span>',
          'after_page_number' => '</span>'
     		) );
		?></div>

<?php get_footer(); ?>