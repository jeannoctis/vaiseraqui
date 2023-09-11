import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

(function () {
  const swiperPresentation = new Swiper('.presentationSwiper', {
    slidesPerView: 1.5,
    spaceBetween: 15,
    // cssMode: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
    },
    breakpoints: {
      769: {
        slidesPerView: 1.1,
      },
      // 900: {
      //   slidesPerView: 1.4,
      // },   
      1200: {
        slidesPerView: 1.3,
      },
      1700: {
        slidesPerView: 2.2,
      }
    }
  })

  // Controller swiper presentation
  const buttonNext = document.querySelector('.navigation-swiper-blog > .next')
  const buttonPrev = document.querySelector('.navigation-swiper-blog > .prev')
  if (buttonNext) {
    buttonNext.addEventListener('click', function (e) {
      e.preventDefault()
      console.log('next')
      swiperPresentation.slideNext()
    })
  }
  if (buttonPrev) {
    buttonPrev.addEventListener('click', function (e) {
      e.preventDefault()
      console.log('prev')
      swiperPresentation.slidePrev()
    })
  }
  swiperPresentation.on('reachBeginning', function () {
    buttonNext.classList.add('active')
    buttonPrev.classList.remove('active')
  });

  swiperPresentation.on('reachEnd', function () {
    buttonNext.classList.remove('active')
    buttonPrev.classList.add('active')
  });

  swiperPresentation.on('slideChange', function () {
    if (!swiperPresentation.isBeginning) {
      buttonPrev.classList.add('active')
    }

    if (!swiperPresentation.isEnd) {
      buttonNext.classList.add('active')
    }
  })

})()