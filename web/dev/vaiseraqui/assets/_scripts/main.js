// Menu Mobile
const html = document.querySelector("html")
const body = document.querySelector("body")
const mobileBtn = document.querySelector(".menu-mobile-icon");
const navMobile = document.querySelector(".nav__mobile");
const navMobLinks = document.querySelectorAll(".nav__mobile ul li a")
const hasFadeEls = document.querySelectorAll(".has-fade")

if (mobileBtn) {
   mobileBtn.addEventListener("click", () => {
      if (navMobile.classList.contains("open")) { // Close hamburguer menu
         closeMenu()
      } else { // Open hamburguer menu
         body.classList.add("noscroll");
         html.classList.add("noscroll");
         navMobile.classList.add("open");
         hasFadeEls.forEach(el => {
            el.classList.remove("anFadeOut2");
            el.classList.add("anFadeIn2");
         });
      }
   })
}

navMobLinks.forEach(item => { // Close menu on menu item click
   item.addEventListener("click", closeMenu)
})

hasFadeEls.forEach(item => { // Close menu on overlay click
   item.addEventListener("click", () => {
      closeMenu()
   })
})

function closeMenu () {
   body.classList.remove("noscroll");
   html.classList.remove("noscroll");
   navMobile.classList.remove("open");
   hasFadeEls.forEach(el => {
      el.classList.remove("anFadeIn2");
      el.classList.add("anFadeOut2");
   })
}
// Sticky Menu
const header = document.querySelector("header")

if (header) {
   window.addEventListener("scroll", () => {
      var scrollTop = window.scrollY

      if (scrollTop >= 85) {
         header.classList.add("sticky")
      } else {
         header.classList.remove("sticky")
      }
   })
}

// btnCopy
const btnCopy = document.querySelector("#btnCopy");
if (btnCopy) {
   btnCopy.addEventListener("click", (e) => {
      e.preventDefault();
      var link = window.location.href; // Obtém o link da página atual
      navigator.clipboard.writeText(link).then(swal("Link da página copiado!", {
         buttons: false,
         timer: 1000,
      }));
   });
}

// AOS
AOS.init({
   duration: 2000,
   once: true,
});

// Cookies + WhatsApp
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

// Recaptcha
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