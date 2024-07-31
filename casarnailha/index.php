
<?php get_header();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if($paged == 1){
 ?>

<div class="caixa caixahome">
	<div class="principal">
		<div class="destaqueHACK">
			<div class="destaque" style="background-image:url('<?php $capas = get_field('imagens_principais', 114); shuffle($capas); echo $capas[0]['imagemdacapa']; ?>');">
			</div>
		</div>
	</div>
	<div class="degrade">
		<div class="ondinhabox">
			<div class="ondinhaHACK">
				<div class="ondinha" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/ondinha.png');"></div>
			</div>
		</div>
		<div class="coluna">
			<div class="intro"><?php echo get_field('subtitulo', 114); ?></div>
			<h2><?php echo get_field('titulo', 114); ?></h2>
			<div class="subtitulo"><?php echo get_field('descricao', 114); ?></div>
			<a href="<?php echo get_home_url(); ?>/cadastre-se"><i class="fas fa-heart"></i><?php echo get_field('inscrição', 114); ?></a>
		</div>
	</div>
</div>



<div class="pesquisa-noiva">
	<form class="pesquisa" action="<?php echo get_home_url(); ?>/fornecedores#buscar" method="GET">
		<label class="eupreciso" for="necessidade">Eu preciso</label>
		<div class="pesquisa-necessidade">
			<select id="necessidade" name="cc">
				<?php ListaPrecisos() ?>
			</select>
		</div>
		<button type="submit">Encontrar fornecedor</button>
	</form>
</div>

<?php 

$bana = get_field('banner_programacao', 114);
$banb = get_field('banner_programacao_2', 114);
$banc = get_field('banner_programacao_3', 114);


if ($bana && $banb && $banc) { ?>
	<div class="programacao">
			<div class="banner_programacao">
				<a target="_blank" href="<?php echo get_field('link_banner_programacao', 114) ?>">
				<div class="banner_programacaoHACK">
					<div class="bp" style="background-image:url('<?php echo $bana; ?>');">
					</div>
				</div>
			</div>
		</a>
			<div class="banner_programacao">
				<a target="_blank" href="<?php echo get_field('link_banner_programacao_2', 114) ?>">
				<div class="banner_programacaoHACK">
					<div class="bp" style="background-image:url('<?php echo $banb; ?>');">
					</div>
				</div>
			</div>
		</a>
			<div class="banner_programacao">
				<a target="_blank" href="<?php echo get_field('link_banner_programacao_3', 114) ?>">
				<div class="banner_programacaoHACK">
					<div class="bp" style="background-image:url('<?php echo $banc; ?>');">
					</div>
				</div>
			</div>
		</a>
	</div>
<?php } ?>



<?php } ?>

<div class="linha">
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>

	<?php if ($paged == 1) { ?>
		<h3><?php echo get_field('tituloposts', 114); ?></h3>
	<?php }else{ ?>
		<h3>Página <?php echo $paged; ?></h3>
	<?php } ?>
	
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
</div>

<div class="mosaico-posts">

<?php 

/* $taxID = get_queried_object()->term_id; */

		
	    $argsPost = array(  
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged'          => $paged
    	);

	$posts = new WP_Query($argsPost); 
$conta = 0;
    while ($posts->have_posts()) : $posts->the_post(); 
    	$conta++; 
    	$cat = get_the_category( $post->ID );



    if ($paged == 1) {
    	if ($conta == 1) {
    		$meuthumb = get_the_post_thumbnail_url(get_the_ID(), 'mosaico-slim');
    	}elseif ($conta == 6) {
    		$meuthumb = get_the_post_thumbnail_url(get_the_ID(), 'mosaico-wide');	
    	}else{
    		$meuthumb = get_the_post_thumbnail_url(get_the_ID(), 'mosaico-regular');
    	}

    	if ($conta == 1) { ?>
	<div class="primeirobloco">
		<?php } 
    if ($conta == 3) { ?>
    		</div>
	<div class="segundobloco">
	<?php } ?>

    		<a href="<?php the_permalink(); ?>"><div class="post <?php if($conta == 1){echo"slim";}elseif($conta == 6){echo"wide";} ?>">
			<div class="postHACK <?php if($conta == 1){echo"slim";}elseif($conta == 6){echo"wide";} ?>">
				<div class="postee" style="background-image:url('<?php echo $meuthumb; ?>');"></div>
			</div>
			<div class="degrade girado">
				<div class="coluna">
					<div class="cat-post"><?php echo $cat[0]->name; ?></div>
					<h2><?php the_title(); ?></h2>
				</div>
			</div>
		</div></a>
	
		<?php if ($conta == 5) {  $bannermosaico = get_field('banner_mosaico', 286); $linkbannermosaico = get_field('link_banner_mosaico', 286); ?>	
		<a class="banni" target="_blank" href="<?php echo $linkbannermosaico; ?>"><div class="post banner-post">
			<div class="postHACK">
				<div class="posteebanner" style="background-image:url('<?php echo $bannermosaico; ?>');"></div>
			</div>
		</div></a>
    	<?php }
    	if ($conta == 6) { ?>	
    	</div>
    <?php }

}else{ 
    	$meuthumb = get_the_post_thumbnail_url(get_the_ID(),'mosaico-regular');
    	?>
    	<a href="<?php the_permalink(); ?>"><div class="post outra">
			<div class="postHACK">
				<div class="postee" style="background-image:url('<?php echo $meuthumb; ?>');"></div>
			</div>
			<div class="degrade girado">
				<div class="coluna">
					<div class="cat-post"><?php echo $cat[0]->name; ?></div>
					<h2><?php the_title(); ?></h2>
				</div>
			</div>
		</div></a>	

    <?php } ?>

	<?php endwhile; ?>

	<?php if ($paged != 1) { ?>
		<div class="fakepost"></div>
		<div class="fakepost"></div>
	<?php } ?>

</div>



<div class="pagenav"><?php
     		$big = 999999999;
     		echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $posts->max_num_pages,
          'prev_text' => '<span></span>',
          'next_text' => '<span></span>',
          'before_page_number' => '<span>',
          'after_page_number' => '</span>'
     		) );
		?>	
</div>


<?php get_footer(); ?>