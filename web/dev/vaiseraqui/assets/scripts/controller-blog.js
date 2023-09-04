import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

(function() {    
    const swiperBlog = new Swiper('.blogSwiper', {
      slidesPerView: 1.1,
      spaceBetween: 22,
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
        }
      }
    })

    // Controller swiper callendar
    const buttonNext = document.querySelector('.navigation-swiper-blog > .next')
    const buttonPrev = document.querySelector('.navigation-swiper-blog > .prev')
    
    buttonNext.addEventListener('click', function(e) {
      e.preventDefault()
      console.log('next')
      swiperBlog.slideNext()
    })

    buttonPrev.addEventListener('click', function(e) {
      e.preventDefault()
      console.log('prev')
      swiperBlog.slidePrev()
    })

    swiperBlog.on('reachBeginning', function () {
      buttonNext.classList.add('active')
      buttonPrev.classList.remove('active')
    });

    swiperBlog.on('reachEnd', function () {
      buttonNext.classList.remove('active')
      buttonPrev.classList.add('active')
    });

    swiperBlog.on('slideChange', function() {
      if (!swiperBlog.isEnd) {
        buttonNext.classList.add('active')
      }
  
      if (!swiperBlog.isBeginning) {
        buttonPrev.classList.add('active')
      }
    })
})()