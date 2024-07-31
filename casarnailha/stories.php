<?php

/*
Template Name: Stories

*/

?>

<?php get_header(); 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="box-web-stories">

	<?php if (get_the_post_thumbnail_url()) { ?>
	<div class="capaHACK">
		<div class="capa" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
	</div>
	<?php }else{ ?>
	<div class="semimagem"></div>
	<?php } ?>
	
	<div class="sobrebox">
		<div class="sobre">
			<h2><?php the_title(); ?></h2>
			<div class="texto"><?php the_content(); ?></div>
		</div>
	</div>

	<div class="bloco stories">
		<ul class="links">
		  <?php
		$featuredPosts = new WP_Query(array('posts_per_page'=> '12', 'post_type' => 'web-story', 'paged' => $paged));
		if ($featuredPosts->have_posts()){

		while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
		?>

		<li class="link-item">
		<a href="<?php the_permalink(); ?>"><div class="thumbe" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');"></div></a>
		<div class="story-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		</li>

		<?php endwhile; } ?>

		<li class="link-item fake"></li>
		<li class="link-item fake"></li>
		<li class="link-item fake"></li>
		<li class="link-item fake"></li>
		</ul>
		
		<div class="pagenav">
			<?php
     		$big = 999999999;
     		echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $featuredPosts->max_num_pages,
          'prev_text' => '<span></span>',
          'next_text' => '<span></span>',
          'before_page_number' => '<span>',
          'after_page_number' => '</span>'
     		) ); ?>	
		</div>


		<?php wp_reset_postdata(); ?>
	</div>

</div>


<?php 
    endwhile; // End of the loop.
?>

<?php get_footer(); ?>