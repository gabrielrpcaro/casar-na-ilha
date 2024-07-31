<?php
/*

Criar uma página Instagram com os campos do ACF:
data_insta
last_update
insta_token

*/


// SELECIONA CAMPO DE INSTA DATA
  $idPagInsta = 1151; // Id da página que contem o campo data_insta 249 no local
  $datainsta = get_field("data_insta", $idPagInsta);
  // if ($datainstaPega) {
  // $datainsta = json_decode($datainstaPega, true); }else{$datainstaPega = ""; }// array() que será usado pra dar foreach nas urls

  $last_update = get_field("last_update", $idPagInsta);
  
  // TROCAR PRO ACF E PREENCHER ACF COM ESSE VALOR
  $token = get_field("insta_token", $idPagInsta);
  // $token = "IGQVJXUjFkMHlZAUGkyYnJkM01hd0pLV1FlOTIwcENwMW43b1h1SklJX2xzNzRncVE5aVdybGxyVnRGOEFpRU5tSXZAaUGNiMHM5SThGMF9GUDRaS2JvMmZApbWoteDhMU2t5ajA3b2FUZAUlvaXhYVGhDdgZDZD"; 

// CHECA SE FOI ATUALIZADO A 1 DIA ATRÁS
if((strtotime($last_update) > strtotime('-1 day') || $last_update == "") && $token){

  /* Atualiza o last_update para agora */
  $agora = strtotime('now');
  update_field("last_update", $agora, $idPagInsta);
/* Monta a URL */
  $apiURL = "https://graph.instagram.com/me/media?fields=media_url&access_token=$token";

/* ENTRA NA URL E LÊ O JSON */
  $pegaData = file_get_contents($apiURL);
  $pegou = json_decode($pegaData);

/* PEGA A KEY DATA E ATUALIZA */
  $novodatainsta = $pegou->data;
    update_field("data_insta", $novodatainsta, $idPagInsta);

}

/* -------------------------------------- */
if ($datainsta) {
/* Corta o array pra 5 itens */
$datainsta2 = array_slice($datainsta, 0, 5); ?>

<div class="linha">
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
	<h4>Siga <a href="https://www.instagram.com/voucasarnailha/">@casarnailha</a> e fique por dentro de todas as novidades</h4>
	<div class="triguinho">
		<div class="trigoHACK">
			<div class="trigo reverso" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/galho.jpg');">
			</div>
		</div>
	</div>
</div>

<a alt="Instagram" href="https://www.instagram.com/voucasarnailha/"><div class="boxinsta">

<?php foreach($datainsta2 as $listaInsta){


?>

	<div class="instinha">
		<div class="instaHACK">
			<div class="insta" style="background-image:url('<?php echo $listaInsta->media_url;?>');">
			</div>
		</div>
	</div>

<?php


} ?>

</div></a>

<?php }

?>