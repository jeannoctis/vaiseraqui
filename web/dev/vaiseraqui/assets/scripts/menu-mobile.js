// Menu mobile
const btnMenu = document.querySelector('.header .menu')
const navMobile = document.querySelector('nav.only-mobile')
const headerContainer = document.querySelector('header.header')
const mobileNavItems = document.querySelectorAll(".j-button-scroll-section");

btnMenu.addEventListener('click', (e) => {
  e.preventDefault()
  if (btnMenu.classList.contains('active')) {
    closeMobileNav()
  } else {
    document.querySelector('body').style.overflow = 'hidden'
    btnMenu.classList.add('active')
    navMobile.classList.add('open')
    headerContainer.style.backgroundColor = '#FFF';
  }
})

mobileNavItems.forEach(item => {
  item.addEventListener("click", closeMobileNav)
})

function closeMobileNav() {
  document.querySelector('body').style.overflow = 'scroll'
  btnMenu.classList.remove('active')
  navMobile.classList.remove('open')
  headerContainer.style.backgroundColor = headerContainer.classList.contains('active') ? '#FFF' : 'transparent';
}

const avisoCookies = document.querySelector("#aviso-cookies")

function aceitaCookie () {
  setCookie('aceitou', '1', 30);
  avisoCookies.classList.add("hideCookie")
  setTimeout(() => { avisoCookies.style.display = 'none' }, 400)
}
function setCookie (cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

const shown = document.querySelector(".shown")
const whatsapp = document.querySelector(".whatsapp")
const ulWhatsapp = document.querySelector(".ul-whatsapp")

function listaWhatsapp () {
  !shown ? (whatsapp.classList.toggle("shown"), ulWhatsapp.classList.toggle("shown")) : '';
}
function visitaPagina (pagina) {
  $.post(PATHSITE + "utils/visitaPagina/", { pagina: pagina }, function (e) {
  });
}
function contadorWhatsapp (whatsappFK) {
  $.post(PATHSITE + "utils/contadorWhatsapp/", { whatsappFK: whatsappFK }, function (e) { });
}
function cliqueBanner (bannerFK) {
  $.post(PATHSITE + "utils/contadorBanner/", { bannerFK: bannerFK }, function (e) { });
}

function callRecaptcha () {
  grecaptcha.ready(function () {
    grecaptcha.execute(public_recaptcha, { action: "" }).then(function (e) {
       //  document.getElementById("g-recaptcha-response").value = e;
      $(".g-recaptcha-response").val(e);
    });
  });
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
     // carregaVideo();    
   }
 };

 $.lazyscript(options);
 
 function buscaCep(cep)
 {
     cep  = cep.replace("-","");
     $.get("https://viacep.com.br/ws/"+  cep +"/json" , {}, function (e) {
              
         $('#endereco').val(e.logradouro);
          $('#bairro').val(e.bairro);
           $('#cidade').val(e.localidade);
            $('#estado').val(e.uf);
        
  });
 }