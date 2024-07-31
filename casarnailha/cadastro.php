<?php

/*
Template Name: Cadastro

*/

?>

<?php 
acf_form_head();
get_header(); ?>

<div class="capaHACK">
  <div class="capa" style="background-image:url('<?php echo get_the_post_thumbnail_url(72); ?>');"></div>
</div>

<div class="sobrebox">

  <div class="sobre">

  <div class="descricione">Quer ter acesso aos benefícios e descontos exclusivos, além de informações em primeira mão? Tudo sobre casamento em São Paulo pautado pelos melhores profissionais da região, a apenas um clique.<br><br></div>

<?php

if(isset($_GET['form'])) {
   $form = $_GET['form'];
}else{$form = "noiva";} ?>

  <div class="tipo">
    <h3>Você é</h3>
    <div class="direitela">
    <a class="<?php if ($form == "noiva") {?>prim<?php } ?>" href="<?php echo get_home_url(); ?>/cadastre-se/?form=noiva">Noiva</a>
    <a class="<?php if ($form == "noivo") {?>prim<?php } ?>" href="<?php echo get_home_url(); ?>/cadastre-se/?form=noivo">Noivo</a>
    <a class="<?php if ($form == "fornecedor") {?>prim<?php } ?>" href="<?php echo get_home_url(); ?>/cadastre-se/?form=fornecedor">Profissional do Mercado</a>
    </div>
  </div>

<?php
if ($form == "noiva" || $form == "noivo") {
    acf_form(array(
    'post_id'   => 'new_post',
    'post_title'  => false,
    'post_content'  => false,
    'updated_message' => __("Cadastrado com sucesso!", 'acf'),
    'submit_value' => __("Cadastrar", 'acf'),
    'field_groups' => array(796, 882, 1206),
    'new_post'    => array(
      'post_type'   => 'cadastro',
      'post_status' => 'publish'
    )
  ));
}

if ($form == "fornecedor") {
  acf_form(array(
    'post_id'   => 'new_post',
    'post_title'  => false,
    'post_content'  => false,
    'updated_message' => __("Cadastrado com sucesso!", 'acf'),
    'submit_value' => __("Cadastrar", 'acf'),
    'field_groups' => array(796, 869, 1206),
    'new_post'    => array(
      'post_type'   => 'cadastro',
      'post_status' => 'publish'
    )
  ));
}

  
  ?>
  </div>

<?php include "banner-sidebar.php"; ?>
</div>


<?php get_footer(); ?>