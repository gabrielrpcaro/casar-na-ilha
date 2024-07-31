<?php get_header(); ?>

<?php if (have_posts()){ ?>
<?php while ( have_posts() ) : the_post();
	$idObj = get_the_ID();
	$endereco = get_field("endereco");
	$email = get_field("email");
	$telefone = get_field("telefone");
	$contatowhats = get_field("contato_whatsapp");
	$contatowhats2 = get_field("contato_whatsapp_2");
	$whatsapp = get_field("whatsapp");
	$conferencia = get_field("conferencia");
	$senhazoom = get_field("senhazoom");
	$relacionado = get_field("relacionado");
	$instagram = get_field("instagram");
	$twitter = get_field("twitter");
	$facebook = get_field("facebook");
	$youtube = get_field("youtube");
	$vimeo = get_field("vimeo");
	$site = get_field("site");
	$video = get_field("video");

	$v = 0; 
	$f = 0; 
	if ($video) {$v = count($video);}
	$fotos = get_field("foto");
	if ($fotos) {$f = count($fotos);}
	$totalmidia = $v + $f;
	$capapost = get_the_post_thumbnail_url();

	$onlinho = get_field('online', 114);
	$desconto = get_field('desconto_especial', 114);

	if ($contatowhats) { $numwhats =""; preg_match_all('!\d+!', $contatowhats, $numwhats); $numwhats = implode('', $numwhats[0]); }
	if ($contatowhats2) { $numwhats2 =""; preg_match_all('!\d+!', $contatowhats2, $numwhats2); $numwhats2 = implode('', $numwhats2[0]); }

 ?>


<div class="topo-fornecedor">
	<div class="logo-fornecedor">		
		<div class="logoHACK fornecido">
			<a target="_blank" href="<?php if ($site) {echo $site;}else{echo "#";} ?>"><div class="logo" style="background-image:url('<?php echo get_field("logo"); ?>');"></div></a>
		</div>
	</div>

<?php
	$termid = "";
	
	$terms = get_the_terms(get_the_ID(), 'tipos' );
	if ($terms) {$termid = $terms[0]->term_id;}
	if($termid){ ?>

	<div class="envolve-info topi">
		<div class="categoria"><?php echo $terms[0]->name; ?></div>
	<?php } ?>
		<div class="nome-social">
			<h2 class="nome-fornecedor"><?php echo get_the_title(); ?></h2>
			<div class="social">
				<?php if($instagram){ ?>
				<a target="_blank" href="<?php echo $instagram; ?>"><i class="fab fa-instagram fa-lg"></i></a>
				<?php } ?>
				<?php if($facebook){ ?>
				<a target="_blank" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square fa-lg"></i></a>
				<?php } ?>
				<?php if($twitter){ ?>
				<a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square fa-lg"></i></a>
				<?php } ?>
				<?php if($youtube){ ?>
				<a target="_blank" href="<?php echo $youtube; ?>"><i class="fab fa-youtube"></i></a>
				<?php } ?>
				<?php if($vimeo){ ?>
				<a target="_blank" href="<?php echo $vimeo; ?>"><i class="fab fa-vimeo"></i></a>
				<?php } ?>
				<?php if($site){ ?>
				<a target="_blank" href="<?php echo $site; ?>"><i class="fas fa-globe fa-lg"></i></a>
				<?php } ?>
			</div>
		</div>

		<?php
		if($endereco) { ?>
		<div class="endereco"><i class="fas fa-map-marker-alt fa-lg"></i><?php echo $endereco; ?></div>
		<?php } ?>

		<div class="info-contato">
			<?php
			if($email) { ?>
			<div class="email"><a href="mailto:<?php echo $email; ?>"><i class="fas fa-at"></i><?php echo $email; ?></a></div>
			<?php } ?>
			<?php
			if($telefone) { ?>
			<div class="telefone"><i class="fas fa-phone-alt fa-lg"></i><?php echo $telefone; ?></div>
			<?php } ?>
			<?php
			if($contatowhats) { ?>
			<div class="telefone wh"><a target="_blank" href="https://wa.me/55<?php echo $numwhats; ?>"><i class="fab fa-whatsapp fa-lg"></i><?php echo $contatowhats; ?></a></div>
			<?php } ?>
			<?php
			if($contatowhats2) { ?>
			<div class="telefone wh"><a target="_blank" href="https://wa.me/55<?php echo $numwhats2; ?>"><i class="fab fa-whatsapp fa-lg"></i><?php echo $contatowhats2; ?></a></div>
			<?php } ?>
		</div>
	</div>
</div>



<?php 
	if ($totalmidia > 2 && $capapost) { ?>
		
<div class="midia-fornecedor">

	<div class="fotao">
		<div class="capaHACK fotone">
			<a href="javascript:;" data-posicao="0" class="mais">
				<div class="capa" style="background-image:url('<?php echo $capapost; ?>');"></div>
			</a>
		</div>
	</div>

	<div class="fotinhas">


	<?php if ($video) { ?>
		<div class="fotinha video">
			<div class="capaHACK fotinhe">
				<a href="javascript:;" data-posicao="<?php echo $f + 1; ?>" class="mais">
					<div class="capa" style="background-image:url('<?php echo $video[0]['thumb_video']; ?>');"></div>
					<div class="degrade girado vidi">
						<div>
							<i class="far fa-play-circle"></i>
							<h2>ASSISTIR VIDEO</h2>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php }else{ ?>
		<div class="fotinha">
			<div class="capaHACK fotinhe">
				<a href="javascript:;" data-posicao="1" class="mais">
					<div class="capa" style="background-image:url('<?php echo $fotos[0]['photo']; ?>');"></div>
				</a>
			</div>
		</div>
		<?php 

		} ?>
		<?php

		 if ($v > 1) { ?>
		<div class="fotinha video">
			<div class="capaHACK fotinhe">
				<a href="javascript:;" data-posicao="<?php echo $f + 2; ?>" class="mais">
					<div class="capa" style="background-image:url('<?php echo $video[1]['thumb_video']; ?>');"></div>
					<div class="degrade girado vidi">
						<div>
							<i class="far fa-play-circle"></i>
							<h2>ASSISTIR VIDEO</h2>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php }else{

	if ($video) {$fotoaqui = $fotos[0]['photo']; $positinha = 1;}else{$fotoaqui = $fotos[1]['photo']; $positinha = 2;}

	 ?>
		<div class="fotinha">
			<div class="capaHACK fotinhe">
				<a href="javascript:;" data-posicao="<?php echo $positinha; ?>" class="mais">
					<div class="capa" style="background-image:url('<?php echo $fotoaqui; ?>');"></div>
				</a>
			</div>
		</div>
		<?php 
		} 
		$dadinho = 3;
		if ($video){$dadinho = 2;} if($v > 1){$dadinho = 1;}?>

		<a href="javascript:;" data-posicao="<?php echo $dadinho; ?>" class="mais">
			<div class="veja-mais">
				<i class="far fa-images fa-2x"></i>
				<p>veja mais imagens
				na galeria de fotos</p>
			</div>
		</a>
	</div>

	<a href="<?php echo $capapost; ?>" data-fancybox="gallery">

	<?php 
/*		
		$novoitem = array('photo' => $capapost);
		array_push($fotos, $novoitem);
*/

	if ($fotos) {

		foreach ($fotos as $foto) { ?>
			<a href="<?php echo $foto['photo']; ?>" data-fancybox="gallery"></a> 
	<?php }	} 

	if ($video) { ?>

		<a href="<?php echo $video[0]['link_video']; ?>" data-fancybox="gallery"></a>
		
	<?php  } if($v > 1) { ?>

		<a href="<?php echo $video[1]['link_video']; ?>" data-fancybox="gallery"></a>
	
	<?php } ?> 

	</div>

	<?php } ?>

<div class="caixa lo">
	<div class="ondinhabox forni lo">
	    <div class="ondinhaHACK forni">
	      <div class="ondinha" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/ondinha.png');">
	      </div>
	    </div>
  	</div>
	<div class="descricao-fornecedor"><?php the_content(); ?>
	</div>

	<?php if ($desconto) { ?>
	<div class="box-promocao">
		<h3><i><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 100 125" style="enable-background:new 0 0 100 125;" xml:space="preserve">
<path d="M48.3,31.4c4.5,1.3,9.4-0.9,11.2-5.4c0.4-1.1,5.1-12.5,5.1-12.5l-7.7,3L56,10l-5.1,4l-3.4-7.5c0,0-4.7,11.4-5.1,12.5
	c-1.9,4.5,0.1,9.7,4.4,11.8L48.3,31.4z"/>
<path d="M73.6,62.4c1.2,3.1,4.5,4.8,7.7,3.9c0.8-0.2,9.1-2.5,9.1-2.5l-4.9-3l3.2-3.2l-4.4-1.2l2.7-5.1c0,0-8.3,2.3-9.1,2.5
	c-3.3,0.9-5.3,4.1-4.7,7.4L73.6,62.4z"/>
<path d="M61.7,47.2c4.6,4.5,12,4.8,17,0.6C80,46.8,93,35.9,93,35.9l-11.2-1.3l3.1-8.4L76,27.7l0.7-11.3c0,0-13,10.9-14.2,11.9
	c-5.1,4.3-6.1,11.8-2.2,17.1L61.7,47.2z"/>
<path d="M37.3,31.3c0,0,23.5,14.4,32.7,38.3l-31.7,5.7L27.4,62.5L37.3,31.3z"/>
<polygon points="23.7,66.2 7.4,78 22.6,95 34.5,78.2 "/>
</svg></i>Vem casar em SP</h3>
		<div class="snip"><?php echo $desconto; ?></div>
	</div>
	<?php } ?>

</div>

<?php 

	if ($onlinho == 'online') {


	if ($whatsapp || $conferencia) { 
		$whatsapptrab = substr($whatsapp, 0, 7) . "." . substr($whatsapp, 7);
		$whatsapptrab = substr($whatsapptrab, 0, 2) . " " . substr($whatsapptrab, 2);
		?>
		
	<div class="boxcontato">
	<div class="online"><div class="blink-me"><i class="fas fa-circle"></i></div><h3><?php the_title(); ?> está online
	para te atender agora</h3></div>
	<div class="colunacontato">
		<b class="chamada">escolha por onde deseja INICIAR uma conversa</b>
		<div class="botoes-contato">
			<?php
			if($whatsapp) { ?>
			<a target="blank" href="https://wa.me/55<?php echo $whatsapp; ?>">
			<div class="whatsapp">
				<i class="fab fa-whatsapp fa-2x"></i>
				<p>whatsapp</p>
				<p class="numerinho">(<?php echo $whatsapptrab; ?>)</p>
			</div>
			</a>
			<?php } ?>
			<?php
			if($conferencia) { ?>
			<a target="blank" href="<?php echo $conferencia; ?>">
			<div class="zoom">
				<i class="fas fa-video fa-2x"></i>
				<p>Zoom</p> 
			<?php if ($senhazoom) { ?>
				<p class="numerinho">(senha: <?php echo $senhazoom; ?>)</p>
			<?php } ?>
			</div>
			</a>
			<?php } ?>
		</div>
	</div>
</div>
	<?php } ?>

<?php 	} ?>

<?php
if($relacionado) { ?>

<div class="linha">
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
	<h3 class="saiba">Saiba mais sobre <?php the_title(); ?></h3>
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
</div>

	<ul class="links-externos">
		<?php foreach ($relacionado as $relacionado) { ?>
			<li class="linkinho">
				<a href="<?php echo $relacionado['link']; ?>" target="_blank">
					<div class="instaHACK linkee">
						<div class="insta" style="background-image:url('<?php echo $relacionado['imagem']; ?>');">
						</div>
					</div>
					<div class="degrade giradi">
						<div class="coluna">
							<h2><?php echo $relacionado['descricao']; ?></h2>
						</div>
					</div>
				</a>
				
			</li>
		<?php } ?> 
		<li class="linkinhofake"></li>
		<li class="linkinhofake"></li>
		<li class="linkinhofake"></li>
	</ul>

	<?php } ?>

<?php 
    endwhile;
 

    ?>	
    <?php }else{ ?>
<?php include"404-msg.php"; ?>
 <?php } ?>

<?php get_footer(); ?>