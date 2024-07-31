jQuery(function($){


// MENU RESPONSIVO

$(".icone").click(function(){
        $(".bar").toggle();
        $("#fechinha").toggle();
    if($(".menuresp").hasClass("aberto")) {
        // fecha
        $(".menuresp").removeClass("aberto");
    }else{
        // abre
        $(".menuresp").addClass("aberto");
        $(".caixabusca").removeClass("aberto");
        if($("#lupinha").css("display") == "none"){ $("#xisxis").toggle(); $("#lupinha").toggle(); }
    }
});

$(".lupa").click(function(){

if($(".menuresp").hasClass("aberto")){ $(".menuresp").removeClass("aberto"); $("#fechinha").toggle(); $(".bar").toggle(); }

        $("#lupinha").toggle();
        $("#xisxis").toggle();
    if($(".caixabusca").hasClass("aberto")) {
        // fecha
        $(".caixabusca").removeClass("aberto");
    }else{
        // abre
        $(".caixabusca").addClass("aberto");

    }
});


// SELECT CATEGORIA FORNECEDORES

$(document).ready(function(){
    $("select.categoriasresp").change(function(){
        var selectedCategory = $(this).children("option:selected").val();
        window.location.href = selectedCategory;
    });
});

// POPUP ON SCROLL

$(window).scroll(function(){
    if (!$(".popupnews").hasClass("aberti")) {
    $(".popupnews").addClass("aberti");
    }
});


//FECHAR POPUP

$(".closenews").click(function(){
    $(".popupnews").addClass("aberti2");
  Cookies.set('fechou', '1');
});



// FANCYBOX MOSAICO
var instance = $.fancybox.getInstance();

$('[data-fancybox="gallery"]').fancybox({
    loop: true,
});

$(".mais").click(function(){
    var numero = ($(this).data("posicao"));
  $.fancybox.open( $('[data-fancybox="gallery"'), {loop: true,}, numero);
});



// VALIDAÇÃO DO FORMULÁRIO

$('.news').on('submit', function(e) {
e.preventDefault();

var nome = $(this).find('#nomone');
var email = $(this).find('#emelo');
var form = $(this);

var nomeVal = nome.val();
var emailVal = email.val();

var erro = 0;
 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (nomeVal) { nome.removeClass("erro"); }else{ nome.addClass("erro"); erro++; }

if (emailVal && regex.test(emailVal)) { email.removeClass("erro"); }else{ email.addClass("erro"); erro++; }


// SE NAO TIVER ERRO
if(erro == 0){
var ajax_url = "/wp-admin/admin-ajax.php";
// var ajax_url = "/casarnailha/wp-admin/admin-ajax.php";

 jQuery.ajax({
        url: ajax_url,
        type: 'post',
        dataType: 'JSON',
        data: {
        	action: 'postNews',
        	nome: nomeVal,
        	email: emailVal
        },
        success: function(data) {
        
    form.find('#errinho div').html('');
    form.find('#errinho div').html(data);
    form.find('#errinho').fadeIn(500);

        }});

// FIM DO IF SE NAO TIVER ERRO
}

 e.stopImmediatePropagation();

 return false;
 });
// FIM DO AJAX

$('#news input').on('focus', function(e) {
 $('#errinho').fadeOut(500);
});











/// FIM DO JQUEYR
});


