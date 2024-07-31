
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


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
	

	<?php 
	$rows = get_field('info_servico');
	if (get_post_type() === 'post' && $rows) { 
		$i = 0;
		$len = count($rows);
		$serviceresults = array(); ?>
		<div class="linha">
				<div class="triguinho">
					<div class="trigoHACK">
						<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
						</div>
					</div>
				</div>

					<h4>Quem faz acontecer</h4>
				
				<div class="triguinho">
					<div class="trigoHACK">
						<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
						</div>
					</div>
				</div>
		</div>
	    <div class="box-servicos"><p>
	    <?php foreach( $rows as $row ) {

	        // Load sub field value.
	        $servico = $row['servico'];
	        $nome_do_fornecedor = $row['nome_do_fornecedor'];
	        $link_do_fornecedor = $row['link_do_fornecedor'];
	        if($link_do_fornecedor) {
	        	$link_do_fornecedor2 = get_post_permalink($link_do_fornecedor[0]);
	        	$serviceresults = array_merge($serviceresults, $link_do_fornecedor);
	    	} ?>

	    	<strong><?php echo $servico . ': '; ?></strong><a <?php if($link_do_fornecedor) {?>href="<?php echo $link_do_fornecedor2; ?>"<?php }else{ ?>class="link-vazio"<?php } ?>><?php echo $nome_do_fornecedor; ?></a><?php if($i == $len - 1) {}else{ echo ' • ';} ?>    
	    <?php $i++; } ?>
	    </p></div>
	    <div class="cards-servicos">
	    	<div class="linha">
				<div class="triguinho">
					<div class="trigoHACK">
						<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
						</div>
					</div>
				</div>

					<h4>Fornecedores dos sonhos</h4>
				
				<div class="triguinho">
					<div class="trigoHACK">
						<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
						</div>
					</div>
				</div>
			</div>
	    	<ul class="lista-fornecedores">
	    			<?php foreach ($serviceresults as $serviceresult) { ?>
	    			<li class="box-fornecedor">
						<div class="thumbHACK">
				          <?php $capafornecedor = get_the_post_thumbnail_url($serviceresult, 'capa-fornecedor'); ?>
							<a name="<?php echo get_the_title($serviceresult); ?>" href="<?php echo get_post_permalink($serviceresult); ?>"><div class="thumb" style="background-image: url('<?php echo $capafornecedor; ?>');"></div></a>
				        </div>
						<div class="envolve-info deinicio">

				          <div class="categoria">
							<?php
				      $termid = "";
							$terms = get_the_terms($serviceresult, 'tipos' );
							if ($terms) {$termid = $terms[0]->term_id;}
							if($termid){ ?>
							<a href="<?php echo get_term_link($termid, "tipos"); ?>"><?php echo $terms[0]->name; ?></a>
							<?php } ?>
				    		</div>
				          	
				           <a href="<?php echo get_post_permalink($serviceresult); ?>"><h3 class="nome-fornecedor"><?php echo get_the_title($serviceresult); ?></h3>
				           </a>
						</div>
					</li>
					<?php }?>
					<li class="fakefornecedor"></li>
					<li class="fakefornecedor"></li>
	    	</ul>
	    </div>
	<?php } ?>	






<?php if (is_page(70)) { ?>
		<div class="botao-cadastrar"><a href="<?php echo get_home_url(); ?>/cadastre-se"><i class="fas fa-heart"></i><?php echo get_field('inscrição', 114); ?></a></div>
<?php } ?>
	</div>

<?php include "banner-sidebar.php"; ?>
</div>
<?php 
    endwhile; // End of the loop.
?>

<?php get_footer(); ?>