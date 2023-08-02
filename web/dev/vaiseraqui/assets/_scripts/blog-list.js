// Categories Modal
const modalBtn = document.querySelector(".categories-button span")
const catModal = document.querySelector(".categories")
const overlayModal = document.querySelector(".overlayModal")

if (modalBtn) {
   modalBtn.addEventListener("click", () => {
      if (!catModal.classList.contains("active")) {
         catModal.classList.add("active")
         body.classList.add("noscroll")
         html.classList.add("noscroll")

         catModal.classList.remove("anFadeOut2")
         overlayModal.classList.remove("anFadeOut2")

         catModal.classList.add("anFadeIn2")
         overlayModal.classList.add("anFadeIn2")
      } else {
         catModal.classList.remove("active")
         body.classList.remove("noscroll")
         html.classList.remove("noscroll")

         catModal.classList.remove("anFadeIn2")
         overlayModal.classList.remove("anFadeIn2")

         catModal.classList.add("anFadeOut2")
         overlayModal.classList.add("anFadeOut2")
      }
   })
}

overlayModal.addEventListener("click", () => {
   catModal.classList.remove("active")
   body.classList.remove("noscroll")
   html.classList.remove("noscroll")

   catModal.classList.remove("anFadeIn2")
   overlayModal.classList.remove("anFadeIn2")

   catModal.classList.add("anFadeOut2")
   overlayModal.classList.add("anFadeOut2")
})

// Article Highlight
const articleHl = document.querySelector(".blog-highlight")
if (articleHl) {   
   articleHl.addEventListener("click", () => {
      articleHl.querySelector("a").click();
   })
}

// Related Articles Slide
const relatedSwiper = new Swiper(".relatedSwiper", {
   slidesPerView: 'auto',
   slidesPerGroup: 1,
   slidesPerGroupAuto: true,
   spaceBetween: 12,
   grabCursor: true,
   centerInsufficientSlides: true,
   pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
   },
   navigation: {
      nextEl: '.nextBtn',
      prevEl: '.prevBtn',
      
   }
})

const spCurrent = document.querySelector(".swiper-pagination-current");
const spTotal = document.querySelector(".swiper-pagination-total");
const lpCurrent = document.querySelector(".lp-pagination .current");
const lpTotal = document.querySelector(".lp-pagination .total");
const navsBtn = document.querySelectorAll(".navBtn");

if (navsBtn) {   
   navsBtn.forEach(btn => {
      btn.addEventListener("click", () => {
         updateCurrent()
      })
   })
}

updateCurrent()

function updateCurrent () {
   if (spCurrent && spTotal) {      
      lpCurrent.innerHTML = spCurrent.innerHTML;
      lpTotal.innerHTML = spTotal.innerHTML;
   }
}