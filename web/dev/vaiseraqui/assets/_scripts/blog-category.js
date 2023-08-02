// Filters Modal
const filtersModalBtn = document.querySelector(".middle-infos .right")
const filtersModal = document.querySelector(".filters")
const overlayFiltersModal = document.querySelector(".overlayFiltersModal")

filtersModalBtn.addEventListener("click", () => {
   if (!filtersModal.classList.contains("active")) {
      filtersModal.classList.add("active")
      body.classList.add("noscroll")
      html.classList.add("noscroll")

      filtersModal.classList.remove("anFadeOut2")
      overlayFiltersModal.classList.remove("anFadeOut2")

      filtersModal.classList.add("anFadeIn2")
      overlayFiltersModal.classList.add("anFadeIn2")
   } else {
      filtersModal.classList.remove("active")
      body.classList.remove("noscroll")
      html.classList.remove("noscroll")

      filtersModal.classList.remove("anFadeIn2")
      overlayFiltersModal.classList.remove("anFadeIn2")

      filtersModal.classList.add("anFadeOut2")
      overlayFiltersModal.classList.add("anFadeOut2")
   }
})

overlayFiltersModal.addEventListener("click", () => {
   filtersModal.classList.remove("active")
   body.classList.remove("noscroll")
   html.classList.remove("noscroll")

   filtersModal.classList.remove("anFadeIn2")
   overlayFiltersModal.classList.remove("anFadeIn2")

   filtersModal.classList.add("anFadeOut2")
   overlayFiltersModal.classList.add("anFadeOut2")
})