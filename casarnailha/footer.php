<?php if (!is_page(72)) { ?>

<div class="caixanews <?php if (is_singular('fornecedor') && !$GLOBALS['relacionado']) {?>azuzinha<?php } ?>">
	<div class="ladotexto">
		<h3><?php echo get_field('newsletter_titulo', 114) ?></h3>
		<div class="textinho"><?php echo get_field('newsletter_descricao', 114) ?></div>
	</div>
	<div class="ladoform">
		<form class="news" id="news" method="POST">
			<div class="olhaaqui" id="errinho"><div></div></div>
			<div class="nome-sobrenome">
				<label for="nomone"></label><input type="text" id="nomone" name="nome-sobrenome" placeholder="Nome & Sobrenome">
			</div>
			<div class="email-noiva">
				<label for="emelo"></label><input type="text" id="emelo" name="email-noiva" placeholder="seu@email.com">
			</div>
			<button type="submit"><i class="far fa-envelope fa-lg"></i>Receber ofertas</button>
		</form>
	</div>
</div>

<?php } ?>

<div class="linha">
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
	<h4>Siga <a href="https://www.instagram.com/casarsp/">@casarsp</a> e fique por dentro de todas as novidades</h4>
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
</div>

<?php echo do_shortcode('[instagram feed="1908"]'); ?>



<div class="linha">
	<div class="triguinho divu">
		<div class="trigoHACK">
			<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
	<h4 class="divo">Apoio</h4>
	<div class="triguinho divu">
		<div class="trigoHACK">
			<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
</div>

<div class="linha-apoio">
	<div class="marca-apoio">
		<div class="apoioHACK">
			<a alt="Constance" href="https://www.constancezahn.com/" target="blank"><div class="constance apui">
			</div></a>
		</div>
	</div>
	<div class="marca-apoio">
		<div class="apoioHACK">
			<a alt="Lapis" href="https://lapisdenoiva.com/" target="blank"><div class="lapisdenoiva apui">
			</div></a>
		</div>
	</div>
	<div class="marca-apoio">
		<div class="apoioHACK">
			<a alt="Noiva" href="https://www.noivaansiosa.com.br/" target="blank"><div class="noiva-apoio apui">
			</div></a>
		</div>
	</div>
	<div class="marca-apoio">
		<div class="apoioHACK">
			<a alt="500dias" href="https://500diaspracasar.com/" target="blank"><div class="diaspracasar apui">
			</div></a>
		</div>
	</div>
	<div class="marca-apoio">
		<div class="apoioHACK">
			<a alt="Penaareia" href="https://casamentopenaareia.com" target="blank"><div class="penaareia apui">
			</div></a>
		</div>
	</div>	
	<div class="marca-apoio">
		<div class="apoioHACK">
			<div class="tvband apui">
			</div>
		</div>
	</div>
</div>


<div class="rodape">
	<div class="central">
		<div class="links-rodape">
			<div class="logo-rodape">
				<div class="logoHACK logape">
					<a alt="Vou casar na Ilha" href="<?php echo get_home_url(); ?>"><div class="logo"></div></a>
				</div>
			</div>
			<div class="links-faceis">
				<ul>
					<li><a href="<?php echo get_home_url(); ?>/sobre/">Sobre</a></li>
					<li><a href="<?php echo get_home_url(); ?>/contato/">Contato</a></li>
					<li><a href="<?php echo get_home_url(); ?>/cadastre-se/">Inscrição no evento</a></li>
					<li><a href="<?php echo get_home_url(); ?>/fornecedores/">Encontre um Fornecedor</a></li>
					<li><a href="<?php echo get_home_url(); ?>/evento/">Mais informações</a></li>
				</ul>
			</div>
			<div class="guia-rodape">
				<h3><a href="<?php echo get_home_url(); ?>/fornecedores/">Guia de Fornecedores</a></h3>
				<ul>
					<?php listaCategorias(); ?>
				</ul>
			</div>
			<div class="noiva-ansiosa">
				<div class="tamanhonoiva">
				<div class="logoHACK ansiosa">
					<a alt="Noiva Ansiosa" href="https://www.noivaansiosa.com.br/" target="blank"><div class="logo"></div></a>
				</div>
				</div>
				<div class="studio">Layout & programação</div>
				<a class="yd" target="_blank" alt="Young Dog" href="http://fb.com/youngdogstudio"><div class="assinatura"><img src="<?php echo get_template_directory_uri(); ?>/images/young.png"></div></a>
			</div>	
		</div>
		<div class="copyr">Vou Casar em São Paulo 2021 - Copyright © Todos os direitos reservados. <br>O Vou Casar em São Paulo não se responsabiliza por contratos fechados entre noivas e profissionais.</div> 

		<?php 
		$bannerfooter = get_field('banner_footer', 286); 
		$linkbannerfooter = get_field('link_banner_footer', 286); 
		$bannersfooter = get_field('banners_footer', 286);
		?>

		<div class="centraliza">
			<div class="banner-rodape">
				<div class="bannerHACK banape">
					<a alt="Vou casar na Ilha" href="<?php echo $linkbannerfooter; ?>"><div class="banner" style="background-image:url('<?php echo $bannerfooter; ?>');"></div>
					</a>
				</div>
			</div>

			<?php if ($bannersfooter) { ?>
			<div class="boxabaixo">
			<?php foreach ($bannersfooter as $banner) { ?>
				<div class="post-banner-footer">
					<a href="<?php echo $banner['link_banner']; ?>">
						<div class="banfooHACK">
							<div class="banfoo" style="background-image:url('<?php echo $banner['banner']; ?>');"></div>
						</div>
					</a>
				</div>
			<?php	} ?>
			</div>
			<?php } ?>

		</div>

	</div>
</div>

</div>



<div class="clear"></div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.5.1.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/js.cookie.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js?v=7"></script>

<?php wp_footer(); ?>
    