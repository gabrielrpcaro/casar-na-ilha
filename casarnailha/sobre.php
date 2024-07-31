<?php

/*
Template Name: Sobre

*/

?>
<?php get_header(); ?>

<?php
    wp_reset_query(); // necessary to reset query
    while ( have_posts() ) : the_post(); ?>

<div class="capaHACK">
	<div class="capa" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
</div>

<div class="sobrebox">

	<div class="sobre">
<?php 
        the_content();
    endwhile; // End of the loop.
?>
	</div>

	<div class="post banner-post">
			<div class="posteeHACK">
				<div class="postee" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/banner-post.gif');"></div>
			</div>
	</div>
</div>

<?php get_footer(); ?>