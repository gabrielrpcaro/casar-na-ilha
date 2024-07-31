<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="pt" class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="robots" content="all" />
	<meta name="viewport" content="width=device-width">
    
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
<!---    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png" sizes="16x16" />

	<link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
--->

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=55"/>
	<link href="<?php echo get_template_directory_uri(); ?>/fonts/font-awesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.min.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
	$fechou = isset($_COOKIE["fechou"]);
	if ($fechou != 1) { ?>

		<div class="popupnews">
	<div class="relativa">
	<h3>Cadastre-se e receba ofertas exclusivas!</h3>
	<form class="news" id="news" method="POST">
		<div class="olhaali" id="errinho"><div>esvs</div></div>
		<div class="nome-sobrenome">
			<label for="nomone"></label><input type="text" id="nomone" name="nome-sobrenome" placeholder="Nome & Sobrenome">
		</div>
		<div class="email-noiva">
			<label for="emelo"></label><input type="text" id="emelo" name="email-noiva" placeholder="seu@email.com">
		</div>
		<button type="submit"><i class="far fa-envelope fa-lg"></i></button>
		<i class="closenews fas fa-times-circle"></i>
	</form>
	</div>
</div>

	<?php }
?>



<div class="wrap">

<div class="caixa upper">
	<div class="caixalogo">
		<div class="logoHACK">
			<a aria-label="Vou casar na Ilha" href="<?php echo get_home_url(); ?>"><div class="logo"></div></a>
		</div>
	</div>

<?php $bannertopo = get_field('banner_topo', 286); $linkbannertopo = get_field('link_banner_topo', 286); ?>

	<div class="caixabanner">
		<div class="bannerHACK">
			<a target="_blank" aria-label="Vou casar na Ilha" href="<?php echo $linkbannertopo; ?>"><div class="banner" style="background-image:url('<?php echo $bannertopo; ?>');"></div></a>
		</div>
	</div>
</div>

<div class="caixa caixamenu">
	<div class="fixoresp">
		<div class="cordaresp">
			<div class="icone">
				<div class="tracadinhos">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
					<i id ="fechinha" class="fas fa-times"></i>
				</div>
			</div>
			<ul class="menuresp">
					<li><a href="<?php echo get_home_url(); ?>">Home</a></li>

					<li><a href="<?php echo get_home_url(); ?>/sobre">Sobre</a></li>

					<li><a href="<?php echo get_home_url(); ?>/fornecedores">Fornecedores</a></li>

					<li><a href="<?php echo get_home_url(); ?>/evento">Evento</a></li>

					<li><a href="<?php echo get_home_url(); ?>/cadastre-se">Cadastre-se</a></li>
			</ul>
			<div class="lupa"><i id ="xisxis" class="fas fa-times"></i><i id ="lupinha" class="fas fa-search fa-lg"></i></div>
		</div>
	</div>
	<div class="corda">
		<ul class="menu">
			<?php 
			$paginaAtual = get_the_ID();
			if ($paginaAtual == 66) { ?>
			<li class="selecionati"><a href="<?php echo get_home_url(); ?>/sobre">Sobre<div class="traco"></div></a></li>
			<?php }else{ ?>
			<li><a href="<?php echo get_home_url(); ?>/sobre">Sobre<div class="traco"></div></a></li>
			<?php } ?>

			<li><div class="estrelinha"></div></li>

			<?php if ($paginaAtual == 5) { ?>
			<li class="selecionati"><a href="<?php echo get_home_url(); ?>/fornecedores">Fornecedores<div class="traco"></div></a></li>
			<?php }else{ ?>
			<li><a href="<?php echo get_home_url(); ?>/fornecedores">Fornecedores<div class="traco"></div></a></li>
			<?php } ?>

			<li><div class="estrelinha"></div></li>

			<?php if ($paginaAtual == 70) { ?>
			<li class="selecionati"><a href="<?php echo get_home_url(); ?>/evento">Evento<div class="traco"></div></a></li>
			<?php }else{ ?>
			<li><a href="<?php echo get_home_url(); ?>/evento">Evento<div class="traco"></div></a></li>
			<?php } ?>

			<li><div class="estrelinha"></div></li>

			<?php if ($paginaAtual == 72) { ?>
			<li class="selecionati"><a href="<?php echo get_home_url(); ?>/cadastre-se">Cadastre-se<div class="traco"></div></a></li>
			<?php }else{ ?>
			<li><a href="<?php echo get_home_url(); ?>/cadastre-se">Cadastre-se<div class="traco"></div></a></li>
			<?php } ?>
		</ul>
	</div>


	<div class="caixabusca">

		<?php
	
if(isset($_GET['c'])) {
  $c = $_GET['c'];
 }else{
  $c = "";
  }


if(isset($_GET['b'])) {
  $b = $_GET['b'];
 }else{
  $b = "";
  }
  
?>
		<form class="busca" action="<?php echo get_home_url(); ?>/fornecedores#buscar" method="GET">
			<label class="buscartt" for="categoria">buscar</label>
			<div class="busca-categoria">
				<select id="categoria" name="c">
					<?php if(!$c){ ?><option value="" disabled selected>por categoria</option><?php } ?>
					<?php dropCategorias(); ?>
				</select>
			</div>
			<div class="busca-nome">
				<label for="b"></label><input type="text" id="b" name="b" placeholder="por nome" <?php if($b){ ?> value="<?php echo $b; ?>" <?php } ?>>
			</div>
			<button type="submit"><i class="fas fa-search fa-lg"></i></button>
		</form>
	</div>
</div>