function callRecaptcha() {
    
    grecaptcha.ready(function () {
        grecaptcha.execute(public_recaptcha, { action: "" }).then(function (e) {
            document.getElementById("g-recaptcha-response").value = e;
        });
    });
}

var options = {
     type: "delay",
     time: "7000",
     scripts: ["https://www.google.com/recaptcha/api.js?render=" + public_recaptcha],
     success: function () {
            callRecaptcha();
   setInterval(function () {
                    callRecaptcha();
                }, 1e5);
     }
 };
 $.lazyscript(options);

function listaWhatsapp() {
    $(".shown").length <= 0 ? ($(".whatsapp2").addClass("shown"), $(".ul-whatsapp").addClass("shown")) : ($(".whatsapp2").removeClass("shown"), $(".ul-whatsapp").removeClass("shown"));
} 

function contadorWhatsapp(whatsappFK) {
    $.post(PATHSITE + "utils/contadorWhatsapp/", {whatsappFK: whatsappFK  }, function (e) {});
}

// Menu mudar de estilo
$(window).scroll(function(){
    var ScrollTop = parseInt($(window).scrollTop());
    if (ScrollTop > 10) {
       jQuery("header").addClass('menufixo');
       jQuery("header").addClass('menufixo');
    } else{
       jQuery("header").removeClass('menufixo');
       jQuery("header").removeClass('menufixo');
    }
});

// Slide Home para espaços
var swiperEspacos = new Swiper(".sliderEspacos", {
     preloadImages: false,
  lazy: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-nextEsp",
      prevEl: ".swiper-button-prevEsp"
    },
    breakpoints: {
      200: {
        slidesPerView: 1.2,
        spaceBetween: 30,
        slidesOffsetBefore: 20,
      },
      760: {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesOffsetBefore: 30,
      },
      990: {
        slidesPerView: 5,
        spaceBetween: 30,
        slidesOffsetBefore: 100,
      },
    },
});

// Slide Home para servicos, bares e eventos
var swiper = new Swiper(".sliderDefault", {
    preloadImages: false,
  lazy: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-nextSer",
      prevEl: ".swiper-button-prevSer"
    },
    breakpoints: {
      200: {
        slidesPerView: 1.2,
        spaceBetween: 30,
        slidesOffsetBefore: 20,
      },
      760: {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesOffsetBefore: 30,
      },
      990: {
        slidesPerView: 5,
        spaceBetween: 30,
        slidesOffsetBefore: 100,
      },
    },
});

// Slide interna de 3 itens
var swiperDestaque = new Swiper(".sliderDestaque", {
    grabCursor: true,
    loop: false,
    breakpoints: {
        200: {
          slidesPerView: 1,
          spaceBetween: 20
        },
        700: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        900: {
          slidesPerView: 3,
          spaceBetween: 40
        },
        1200: {
          slidesPerView: 5,
          spaceBetween: 40
        },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
});

// Slide interna de 3 itens
var swiperPlanos = new Swiper(".swiperPlanos", {
    grabCursor: true,
    loop: false,
    breakpoints: {
      200: {
        slidesPerView: 1.1,
        spaceBetween: 20
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      900: {
        slidesPerView: 2,
        spaceBetween: 40
      },
        1300: {
        slidesPerView: 3,
        spaceBetween: 20
      },
    },
    navigation: {
      nextEl: ".swiper-button-next3",
      prevEl: ".swiper-button-prev3"
    },
});

// Slide interna de 3 itens
var swiperPlanos2 = new Swiper(".swiperPlanos2", {
    grabCursor: true,
    loop: false,
    breakpoints: {
      200: {
        slidesPerView: 1.1,
        spaceBetween: 20
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      900: {
        slidesPerView: 2,
        spaceBetween: 40
      },
        1300: {
        slidesPerView: 3,
        spaceBetween: 20
      },
    },
    navigation: {
      nextEl: ".swiper-button-next4",
      prevEl: ".swiper-button-prev4"
    },
});

// Slide interna de 4 itens
var swiperBusca = new Swiper(".sliderBuscaInterna", {
    grabCursor: true,
    loop: true,
    breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 40
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
});

// Slide interna de 4 itens
var swiperFive = new Swiper(".sliderFive", {
    grabCursor: true,
    loop: false,
    breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 40
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
});

// Slide interna de 4 itens
var swiperDepoimentos = new Swiper(".sliderDepoimentos", {
    grabCursor: true,
    loop: true,
    breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      700: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 40
      },
    },
    navigation: {
      nextEl: ".swiper-button-next2",
      prevEl: ".swiper-button-prev2"
    },
});

//Slide Calendario (1 calendário)
var swiperCalendario = new Swiper(".sliderCalendario", {
    grabCursor: false,
    loop: false,
    breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 0
      },
      700: {
        slidesPerView: 1,
        spaceBetween: 0
      },
      900: {
        slidesPerView: 1,
        spaceBetween: 0
      },
    },
    navigation: {
      nextEl: ".swiper-button-nextCal",
      prevEl: ".swiper-button-prevCal"
    },
});

// BotÕes da home de categorias
var valorButton;
$('.buttonDefault2').click(function(){
    valorButton = $(this).data('button');
  var categoriaFK = $(this).attr("categoria") ;
  var tipo = $(this).attr("tipo") ;
    $('.'+valorButton).removeClass('buttonActive');

  if(categoriaFK) {
    $(".card"+tipo).hide();
    $(".card"+tipo+"-"+categoriaFK).show();
  } else {
     $(".card"+tipo).show();
  }
  
    $(this).addClass('buttonActive');
});

// Botão de listagem da home na seção Eventos
var valorFiltroButton;
$('.buttonFiltroEventos').click(function(){
   if(!$(this).hasClass("buttonActive")) {
    valorFiltroButton = $(this).data('button');
    $('.'+valorFiltroButton).removeClass('buttonActive');
    $(this).addClass('buttonActive');
    $('.menuEventosHome').toggleClass('on');
   }
});

// Botão de data de Eventos
$('.infoslideData').click(function(){
    $('.infoslideData').removeClass('ativo');
    $(this).addClass('ativo');
});

// Boão de filtro na página de busca
$('.buttonFiltro').click(function(){

    $(".cardBusca").hide();
  
    if ($(this).hasClass('buttonActive')) {
        $(this).removeClass('buttonActive');
    } else{
        $(this).addClass('buttonActive');
    }
  var s = "";
    $('.buttonFiltro.buttonActive').each(function() {
      s +=   "." + $(this).attr("nome") + "";     
});
      $(s).show();
      if(!s){
        $(".cardBusca").show();
      }
});

//
$('.linkInline').click(function(e) {
    e.preventDefault()
    $(this).hide();
    $('.opcoesOcultas').show();
});

//jQuery Mask
$(document).ready(function(){ 

      $('.time').mask('00:00:00');
      $('.time2').mask('00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.dateniver').mask('00/00');
      $('.cep').mask('00000-000');
      $('.phone').mask('(00) 0000-0000');
      $('.phone_with_ddd').mask('(00) 00000-0000');
      $('.phone_us').mask('(000) 000-0000');
      $('.mixed').mask('AAA 000-S0S');
      $('.cpf').mask('000.000.000-00', {reverse: true});
      $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
      $('.money').mask('000.000.000.000.000,00', {reverse: true});
      $('.money2').mask("#.##0,00", {reverse: true});
      $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
          'Z': {
            pattern: /[0-9]/, optional: true
          }
        }
      });
      $('.ip_address').mask('099.099.099.099');
      $('.percent').mask('##0,00%', {reverse: true});
      $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
      $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
      $('.fallback').mask("00r00r0000", {
          translation: {
            'r': {
              pattern: /[\/]/,
              fallback: '/'
            },
            placeholder: "__/__/____"
          }
        });
      $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
  });

//
//Menu mobile
$('.buttonSidebar').click(function(){
    $('.boxSidebar').toggleClass('show');
});

$('#campoEspaco').click(function(e) {
    var isChecked = document.getElementById("campoEspaco").checked;
    document.getElementById("selectEspaco").disabled = !isChecked;
    document.getElementById("selectEspaco").selectedIndex = 0;
});
$('#campoBar').click(function(e) {
    var isChecked = document.getElementById("campoBar").checked;
    document.getElementById("selectBar").disabled = !isChecked;
    document.getElementById("selectBar").selectedIndex = 0;
});
$('#campoEvento').click(function(e) {
    var isChecked = document.getElementById("campoEvento").checked;
    document.getElementById("selectEvento").disabled = !isChecked;
    document.getElementById("selectEvento").selectedIndex = 0;
});
$('#campoServico').click(function(e) {
    var isChecked = document.getElementById("campoServico").checked;
    document.getElementById("selectServico").disabled = !isChecked;
    document.getElementById("selectServico").selectedIndex = 0;
});
$('#campoFestaDia1').click(function(e) {
    var isChecked = document.getElementById("campoFestaDia1").checked;
  if(isChecked){
   $("#checkout-1").hide();
  }else {
   $("#checkout-1").show();
    }
});
$('#campoFestaDia4').click(function(e) {
    var isChecked = document.getElementById("campoFestaDia4").checked;
  if(isChecked){
   $("#checkout-4").hide();
  }else {
   $("#checkout-4").show();
    }
});

$('#campoFestaDia5').click(function(e) {
    var isChecked = document.getElementById("campoFestaDia5").checked;
  if(isChecked){
   $("#checkout-5").hide();
  }else {
   $("#checkout-5").show();
    }
});

$('#campoFestaDia8').click(function(e) {
    var isChecked = document.getElementById("campoFestaDia8").checked;
  if(isChecked){
   $("#checkout-8").hide();
  }else {
   $("#checkout-8").show();
    }
});


//
$(".iconeSenha").click(function() {
    $(".iconeSenha").toggleClass("verSenha");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});

// Tabs Meu Perfil
var valorTabPerfil;
$('ul.menuDados li').click(function(){
    valorTabPerfil = $(this).data('painel');
    $(".boxTabView").removeClass('ativo');
    $(valorTabPerfil).addClass('ativo');
    $('ul.menuDados li').removeClass('ativo');
    $(this).addClass('ativo');
});

// Tabs Menu
var valorMenu;
$('.menuSearch').click(function(){
    valorMenu = $(this).data('menu');
    $(".buscaMenuItem").removeClass('ativo');
    $("."+valorMenu).addClass('ativo');
    $('.menuSearch').removeClass('ativo');
    $(this).addClass('ativo');
});

// Input Range de Preço
var rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".sliderPreco .progress");
var priceGap = 10;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
      var minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
      
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
          
      var idSelecionado = e.target.id;   
      var nomeParceiro = e.target.attributes.parceiro.value;
      var inputMin = e.target.attributes.inputMin.value;
      var inputMax = e.target.attributes.inputMax.value;
           
      var minVal = 0, maxVal = 0;
      
      if(e.target.className === "range-min"){
        maxVal = $("#"+nomeParceiro).val(); 
        minVal = $("#"+idSelecionado).val();   
      } else {
        maxVal = $("#"+idSelecionado).val();  
        minVal =  $("#"+nomeParceiro).val();
      }
     
      if((maxVal - minVal) < priceGap){
          $("#"+inputMin).val(minVal);
          $("#"+inputMax).val(maxVal);
                    
            if(e.target.className === "range-min"){
              $("#"+idSelecionado).val(maxVal - priceGap);
                $("#"+inputMin).val(minVal);               
            }else{
                $("#"+nomeParceiro).val(maxVal - priceGap);
                $("#"+inputMax).val(maxVal);            
            }
        }else{
          $("#"+inputMin).val(minVal);
          $("#"+inputMax).val(maxVal);         
        }
    });
});

//
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down numeroDesativado">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
      $(btnDown).removeClass('numeroDesativado');
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
      console.log(newVal); console.log('aqui');
    } else {
      var newVal = oldValue - 1;
      console.log(newVal); console.log('outro');
        if(newVal === 0){
          $(btnDown).addClass('numeroDesativado');
        }
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });
});

$('.resetForm').click(function(){
  $('#formBusca1').trigger("reset");
  $('#formBusca2').trigger("reset");
  $('#formBusca3').trigger("reset");
  $('#formBusca4').trigger("reset");
  $('.quantity-down').addClass('numeroDesativado');
  $('.sliderPreco .progress').css({
    left: '0%',
    right: '0%'
  });
});

// Tabs Menu
var valorFiltroBusca;
$('.openBoxFiltro').click(function(){
  valorFiltroBusca = $(this).data('busca');
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
    $(valorFiltroBusca).addClass('boxFiltroAberto');
});

$(document).mouseup(function(e) 
{
    var container = $(".boxFiltroAberto");
    var containerCta = $(".boxFiltroAberto div.ctaCategoria1");
  
    // Caso clique fora do container 
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        //container.hide();
        $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
    } 
    else if(containerCta.is(e.target)) 
    {
      $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
   
    }
});

function cliqueCategorias(id) {
    var categorias = "";  
  $('.categoriasCheckbox:checked').each(function() {
    categorias += $(this).attr("nome") + ", ";
});
    if(categorias){
  categorias = categorias.substring(0, categorias.length - 2);
  }
    $("#conteudoCategorias-"+id).html(categorias);  
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function cliqueCidades(id) {
  
  if(!id){
    id = '';
  }
  
    var categorias = "";  
  $('.cidadesCheckbox:checked').each(function() {
    categorias += $(this).attr("nome") + ", ";
});
  if(categorias){
  categorias = categorias.substring(0, categorias.length - 2);
  }
    $("#conteudoCidades"+id).html(categorias);  
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function aplicarDatePicker(id){
  $("#selecaoData-"+id).html($("#datepickerAplicar-"+id).val());
  $("#dataAplicada-"+id).val($("#datepickerAplicar-"+id).val());
  $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function aplicarHospedes(){
  var adulto = $("#adulto").val();
  var crianca = $("#crianca").val();
  var bebe = $("#bebe").val();
  var pet = $("#pet").val();
  $("#hospedes").html( adulto +  " adulto(s), " + crianca + " criança(s), " + bebe + " bebê(s), " + pet + " pet(s)"  );
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function aplicarConvidados() {
  console.log($("#qtdConvidados option:selected").attr("resultado"));
  $("#selecaoConvidados").html($("#qtdConvidados option:selected").attr("resultado"));
  $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function aplicarPreco(id){
  $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
  $("#selecaoPreco-"+id).html( "R$"+ $("#precoMinimo-"+id).val() + "~ R$" +  $("#precoMaximo-"+id).val() );
}

function aplicarTexto(termo) {
  $("#span-"+termo).html($("#"+termo).val());
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function aplicarFuncionamento(id){
  var resultado = $("#horaIni"+id).val() +  "h" + " às " + $("#horaFim"+id).val() + "h" ;
  
  $("#spanFuncionamento-1").html(resultado);
   $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
}

function ordenaBlog(thiss) {
  $("#ordenar").val(thiss.value);
  $("#form-blog").submit();
  
//  location.href= PATHSITE + "blog?" + "trecho=" +trecho + "&categoriaFK=" +categoriaFK+"&ordem="+thiss.value;
}

$(".checkLikeRadio").on('click', function() {
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});


$('.like').click(function(){
  $(this).toggleClass('active');
  if ($(this).hasClass('active')) {
    $(this).attr("aria-expanded","true");
  } else {
    $(this).attr("aria-expanded","false");
  }
});

function openNav(){
  document.getElementById("menuOpen").style.width = '95%';
  document.getElementById("menuAzul").style.width = '100%';
}
function closeNav(){
  document.getElementById("menuOpen").style.width = '0%';
  document.getElementById("menuAzul").style.width = '0%';
}

function selecionaData(id) {
  var diasSelecionado = $('.dia.selecionado').length;
    $(".dia").removeClass("intervalo");
    if($("#dia-"+id).hasClass("selecionado")) {
    $("#dia-"+id).removeClass("selecionado");
  } else if(diasSelecionado <= 1){
    $("#dia-"+id).addClass("selecionado");
  } else {
     $(".dia.selecionado").removeClass("selecionado");
      $("#dia-"+id).addClass("selecionado");
  }
    
setTimeout(function(){
   diasSelecionado = $('.dia.selecionado').length;
      console.log(diasSelecionado);
    if(diasSelecionado == 2){
  
  var contador1 = "";
    var contador2 = "";

       $(".selecionado").each(function() {
 
          if(!contador1){
         contador1 = $(this).attr("contador");
          } else {
        contador2 = $(this).attr("contador");     
          }  
});
  
   if(contador1 && contador2){
     contador1 = parseInt(contador1);
     contador2 = parseInt(contador2);
     
        var maior = contador1;
        var menor = contador2;
      
      if(contador1 < contador2){
        maior = contador2;
        menor = contador1;
      }
    var aux = menor;
    
     for(aux; aux <= maior; aux++ ){
        if(aux != menor && aux != maior){
       $("#dia-"+aux).addClass("intervalo");
        }
     }
     
         var s = "";
     $(".selecionado").each(function() {
          s += $(this).attr("diaselecionado") + " até ";      
      });
  s = s.slice(0, -4);
    $("#dataDoEvento").val(s);
     
  }  } else if(diasSelecionado == 1) {
              var s = "";
     $(".selecionado").each(function() {
          s += $(this).attr("diaselecionado");
        $("#dataDoEvento").val(s);
      });
        }
  
}, 1000);
}

function mudaQuantidade(id){
    $(".apartirde").hide();
  $("#apartirde-"+id).show();
}

  function solicitarOrcamento(produto, api, whatsapp) {
        var s = "";
    var ate = "";
    var aaa = '';
    
    var quantidade = $("#select-quantidade option:selected").attr("quantidade");

    
    $(".selecionado").each(function() {
          s +=  aaa + $(this).attr("diaselecionado") + " ";
        aaa = ' a ';
      });
    
    if(quantidade) {
     ate =  " até " + quantidade + " pessoas "; 
    }
       
        var i = "Olá, vim aqui pelo site https://www.soufesta.com.br/ e tenho interesse em agendar " + produto +  ate  +  " para o(s) dias: " + s;

 
        window.open("https://" + api + ".whatsapp.com/send?phone=55" + whatsapp + "&text=" + i), cliqueWhatsapp(a);
    }

function contratarAnuncio(e, o) {
 
    $("#input-tipo-anuncio").val(e);
        $.post(PATHSITE + "/contato/contratarAnuncio/", { tipo: e, validade: o }, function (e) {
            dados = jQuery.parseJSON(e);
      
      $("#input-validade").html(dados.html);
        });
}

function favoritar(id){
  $("#modal-logar").modal('show');  
  
    $.post(PATHSITE + "cliente/favoritar/", { produtoFK: id }, function (e) {   
        });  
}

function mudaCategorias(valor){  
  if(valor){
    $("#subcategoria option").hide();
      $(".subcat-"+valor).show();
  } else {
     $("#subcategoria option").show();
  }
}

function mudaSubcategorias(valor){  
   if(valor){
     $(".cardBusca").hide();
     $(".cardBusca.categoria-"+valor).show();
   } else {
        $(".cardBusca").show();
   }
}

function chamarWhats(id){
      $.post(PATHSITE + "cliente/chamarWhats/", { produtoFK: id }, function (e) {   
        });  
}

function chamarTelefone(id){
      $.post(PATHSITE + "cliente/chamarTelefone/", { produtoFK: id }, function (e) {   
        });  
}


  $("#file2").change(function(){
    var file_data;
      if($('#file2').length>0){
    file_data = $('#file2').prop('files')[0];  
    }
   if(file_data){
    var form_data = new FormData();          
    form_data.append('file', file_data);
                          
    $.ajax({
        url: PATHSITE + 'cliente/mudarFoto', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
           location.reload();
          
           // alert(php_script_response); // <-- display response from the PHP script, if any
        }
           });
        } else {
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Ocorreu um erro. Tente novamente!',
          footer: ''
        });
        }
    
 });


    function excluirInteresse(id) {
        Swal.fire({
            title: 'Tem certeza que deseja excluir?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim!',
            cancelButtonText: 'Não!'
        }).then((result) => {
            if (result.value) {
            $.post(PATHSITE+'cliente/excluirInteresse/', {id:id}, function (retorno) {
                    location.reload();
        });
            }
        });
        return false;
    }

function mudatipoFiltro (tipo) {
  $('#filtro').val(tipo);
  $('#formPrincipal').submit();
}  
