// Courses Slider
// const coursesList = document.querySelectorAll(".item-course")
// const swiperWrapper = document.querySelector(".courses-wrapper")
// const cBtnPrev = document.querySelector(".btn-arrow.prev")
// const cBtnNext = document.querySelector(".btn-arrow.next")
// const saibaMaisBtn = document.querySelectorAll(".course-info button");

// let fadeEls = document.querySelectorAll(".fadeEl")
// let currentCardEls = document.querySelectorAll(".current .fadeEl")

// let cardIndex
// coursesList.forEach((currentCard, index) => {
//    currentCard.addEventListener('click', () => {

//       cardIndex = index

//       let currentCardIndex = 0
//       coursesList.forEach(sib => {
//          sib.classList.remove("current")
//       })
//       currentCard.classList.add("current")

//       swiperWrapper.style.marginLeft = (index * (currentCardIndex + 1) * -190) + "px"
//       checkBtns(index)

//       fadeEls.forEach(item => {
//          item.classList.remove("anFadeIn");
//          item.classList.add("anFadeOut")
//       })
//       currentCardEls = document.querySelectorAll(".current .fadeEl")
//       currentCardEls.forEach(item => {
//          item.classList.remove("anFadeOut")
//          item.classList.add("anFadeIn")
//       })
//    })
// })
// function checkBtns (index) {
//    if (index + 1 === coursesList.length) {
//       cBtnNext.classList.add("btnDisabled")
//    }
//    if (coursesList[index - 1]) {
//       cBtnPrev.classList.remove("btnDisabled")
//    }
//    if (index === 0) {
//       cBtnPrev.classList.add("btnDisabled")
//    }
//    if (coursesList[index + 1]) {
//       cBtnNext.classList.remove("btnDisabled")
//    }
// }
// cBtnNext.addEventListener("click", () => {
//    if (coursesList[cardIndex + 1]) {
//       coursesList[cardIndex + 1].click()
//    }
// })
// cBtnPrev.addEventListener("click", () => {
//    if (coursesList[cardIndex - 1]) {
//       coursesList[cardIndex - 1].click()
//    }
// })
// saibaMaisBtn.forEach(btn => {
//    btn.addEventListener("click", () => {
//       btn.firstElementChild.click()
//    })
// })
// window.onload = coursesList[0].click()
// window.onload = cBtnPrev.click()

// Workshop
const workshopCont = document.querySelector("[data-workshop-container]")
const workshopBg = document.querySelector("[data-workshop-bg]");
const workshopItems = document.querySelectorAll("[data-workshop-item]");
const workshopModal = document.querySelector("#modalWorkshop");

if (workshopItems[0]) {

   workshopItems[0].classList.add("wkiActive");
   const wkiActive = document.querySelector(".wkiActive")
   workshopBg.style.backgroundImage = `url(${PATHSITE}uploads/workshop/${wkiActive.dataset.workshopImg})`

   workshopCont.style.marginBottom = `calc(66 * ${workshopItems.length}px)`;

   workshopItems.forEach(item => {

      item.addEventListener("mouseover", () => {
         workshopItems.forEach(item => item.classList.remove("wkiActive"))

         if (item.dataset.workshopImg != "") {
            workshopBg.style.backgroundImage = `url(${PATHSITE}uploads/workshop/${item.dataset.workshopImg})`
         } else {
            workshopBg.style.backgroundImage = `url(${PATHSITE}assets/images/article-cover.png)`
         }
      })

      item.addEventListener("mouseleave", () => {
         workshopItems[0].classList.add("wkiActive");
         workshopBg.style.backgroundImage = `url(${PATHSITE}uploads/workshop/${wkiActive.dataset.workshopImg})`
      })
   })

   workshopItems.forEach(item => {
      item.addEventListener("click", (e) => {
         e.preventDefault();
         body.classList.toggle("noscroll")
         html.classList.toggle("noscroll")
         workshopModal.showModal();
      })
   })   
}
// AJAX
function abrirModalWorkshop (id) {
   $.post(PATHSITE + "workshop/abrirmodalworkshop", { id: id },
      function (data) {
         retorno = jQuery.parseJSON(data);
         if (retorno.html) {
            $("#modalWorkshop").html(retorno.html);
         }
      }
   )
}

function instagram () {
   $.post(PATHSITE + "utils/instagram", {},
      function (data) {
         retorno = jQuery.parseJSON(data);
         if (retorno.html) {
            $("#instagramAPI").html(retorno.html);
         }
      }
   );
}

// Blog Swiper
const swiper = new Swiper('.swiper', {
   pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
   },
   navigation: {
      nextEl: '.button-next',
      prevEl: '.button-prev',
   },
   spaceBetween: 12,
   slideClass: 'slide',
   slidesPerView: 'auto',
   mousewheel: true
});

// Máscara Telefone
const inputsTel = document.querySelectorAll('input[type=tel]');
inputsTel.forEach(tel => {
   tel.addEventListener('keypress', e => {
      const keyCode = (e.keyCode ? e.keyCode : e.value);
      if (!(keyCode > 47 && keyCode < 58)) {
         e.preventDefault();
      }
      maskTel(tel);
   });
});
function maskTel (tel) {
   if (tel.value.length == 1) {
      tel.value = '(' + tel.value;
   } else if (tel.value.length === 3) {
      tel.value += ') ';
   } else if (tel.value.length === 5) {
      tel.value += ' ';
   } else if (tel.value.length === 6) {
      tel.value += ' ';
   } else if (tel.value.length === 11) {
      tel.value += '-';
   }
}