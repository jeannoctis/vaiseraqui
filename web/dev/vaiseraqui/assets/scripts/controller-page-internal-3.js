import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

(function() {    
    const swiperImoveis = new Swiper('.rent-interna', {
      slidesPerView: 1.1,
      spaceBetween: 10,
      cssMode: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
      },
      breakpoints: { 
        650: {
          slidesPerView: 1.4,
        },   
        930: {
          slidesPerView: 2.4,
        },
        1120: {
          slidesPerView: 3,
          spaceBetween: 22,
        }
      }
    })

    // Controller swiper callendar
    const buttonNext = document.querySelector('.navigation-swiper-blog > .next')
    const buttonPrev = document.querySelector('.navigation-swiper-blog > .prev')
    
    buttonNext.addEventListener('click', function(e) {
      e.preventDefault()
      swiperImoveis.slideNext()
    })

    buttonPrev.addEventListener('click', function(e) {
      e.preventDefault()
      swiperImoveis.slidePrev()
    })

    swiperImoveis.on('reachBeginning', function () {
      buttonNext.classList.add('active')
      buttonPrev.classList.remove('active')
    });

    swiperImoveis.on('reachEnd', function () {
      buttonNext.classList.remove('active')
      buttonPrev.classList.add('active')
    });

    swiperImoveis.on('slideChange', function() {
      if (!swiperImoveis.isEnd) {
        buttonNext.classList.add('active')
      }
  
      if (!swiperImoveis.isBeginning) {
        buttonPrev.classList.add('active')
      }
    })
})()