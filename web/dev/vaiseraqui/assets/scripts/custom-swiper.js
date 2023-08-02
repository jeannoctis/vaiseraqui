class CustomSwiper {
   constructor(customClass, slidesPerView, spaceBetween) {
      this.customClass = customClass
      this.slidesPerView = slidesPerView
      this.spaceBetween = spaceBetween
      this.initSwiper()
   }

   initSwiper () {
      const swiperCarrosel = new Swiper(`.${this.customClass}`, {
         spaceBetween: this.spaceBetween,
         slidesPerView: this.slidesPerView,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
         }
      });

      const custom = document.querySelector(`.${this.customClass}`)
      if (custom) {

         const buttonSwiperCustomPrev = custom.querySelector('.navigation .prev')
         const buttonSwiperCustomNext = custom.querySelector('.navigation .next')

         if (buttonSwiperCustomPrev && buttonSwiperCustomNext) {            

            swiperCarrosel.on('slideChange', () => {
               const activeIndex = swiperCarrosel.activeIndex
               if (activeIndex > 0) {
                  buttonSwiperCustomPrev.classList.add('has-more')
               } else {
                  buttonSwiperCustomPrev.classList.remove('has-more')
               }

               const more = this.slidesPerView > 1 ? this.slidesPerView : 0

               const isLast = more === 0 ? -1 : +0
               if (activeIndex + more === swiperCarrosel.slides.length + isLast) {
                  buttonSwiperCustomNext.classList.remove('has-more')
               } else {
                  buttonSwiperCustomNext.classList.add('has-more')
               }
            })

            swiperCarrosel.on('progress', () => {
               let prevSwp = custom.querySelector(".swiper-button-prev");
               if (prevSwp.classList.contains("swiper-button-disabled")) {
                  buttonSwiperCustomPrev.classList.remove("has-more");
                  buttonSwiperCustomPrev.style.opacity = "0.5";
               } else {
                  buttonSwiperCustomPrev.classList.add("has-more");
                  buttonSwiperCustomPrev.style.opacity = "1";
               }
               
               let nextSwp = custom.querySelector(".swiper-button-next");
               if (nextSwp.classList.contains("swiper-button-disabled")) {
                  buttonSwiperCustomNext.classList.remove("has-more");
                  buttonSwiperCustomNext.style.opacity = "0.5";
               } else {
                  buttonSwiperCustomNext.classList.add("has-more");
                  buttonSwiperCustomNext.style.opacity = "1";
               }
            })
         
            buttonSwiperCustomNext.addEventListener('click', () => {
               console.log('next')
               swiperCarrosel.slideNext()

            })

            buttonSwiperCustomPrev.addEventListener('click', () => {
               console.log('prev')
               swiperCarrosel.slidePrev()

            })
         }
      }
   }
}