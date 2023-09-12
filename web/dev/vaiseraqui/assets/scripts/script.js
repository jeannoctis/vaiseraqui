function favoritar (id) {
  $("#modal-logar").modal('show');  
    $.post(PATHSITE + "cliente/favoritar/", { produtoFK: id }, function (e) {   
        });  
}

function eventosData (dia) {
    $.get(PATHSITE + "produto/eventos/", { dia: dia }, function (e) {   
         dados = jQuery.parseJSON(e);
        $("#categoria-eventos").html(dados.html);
        });   
}

function callRecaptcha () {
  grecaptcha.ready(function () {
    grecaptcha.execute(public_recaptcha, { action: "" }).then(function (e) {
      $(".g-recaptcha-response").val(e);
    });
  });
  $(".formsubmit").show();
}

var options = {
  type: "delay",
  time: "4000",
  scripts: ["https://www.google.com/recaptcha/api.js?render=" + public_recaptcha],
  success: function () {

    visitaPagina(PAGINA_VISITADA);

    callRecaptcha();
    setInterval(function () {
      callRecaptcha();
    }, 1e5);
    //    carregaVideo();    
  }
};

function aceitaCookie () {
  setCookie('aceitou', '1', 30);
  $("#aviso-cookies").addClass("hideCookie")
  setTimeout(() => { $("#aviso-cookies").hide() }, 400)
}

function setCookie (cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function listaWhatsapp () {
  $(".shown").length <= 0 ? ($(".whatsapp2").addClass("shown"), $(".ul-whatsapp").addClass("shown")) : ($(".whatsapp2").removeClass("shown"), $(".ul-whatsapp").removeClass("shown"));
}

function visitaPagina (pagina) {
  $.post(PATHSITE + "utils/visitaPagina/", { pagina: pagina }, function (e) {
  });
}

function contadorWhatsapp (whatsappFK) {
  $.post(PATHSITE + "utils/contadorWhatsapp/", { whatsappFK: whatsappFK }, function (e) { });
}

function abreWhatsapp(id){
      $.post(PATHSITE + "produto/chamarWhats/", { produtoFK: id }, function (e) {   
        });  
}
