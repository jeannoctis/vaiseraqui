import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

(function() {

  const swiperAgenda = new Swiper('.swiper-agenda', {
    slidesPerView: 3,
    spaceBetween: 2,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      950: {
        slidesPerView: 5,
        spaceBetween: 5,
      },
      1320: {
        slidesPerView: 7,
      }
    }
  })

  // Controller swiper callendar
  const buttonNext = document.querySelector('.calendar-swiper-navigation-wraper > .next')
  const buttonPrev = document.querySelector('.calendar-swiper-navigation-wraper > .prev')

  buttonNext.addEventListener('click', function(e) {
    e.preventDefault()
    swiperAgenda.slideNext()
  })

  buttonPrev.addEventListener('click', function(e) {
    e.preventDefault()
    swiperAgenda.slidePrev()
  })

  swiperAgenda.on('reachBeginning', function () {
    buttonNext.classList.add('active')
    buttonPrev.classList.remove('active')
  });

  swiperAgenda.on('reachEnd', function () {
    buttonNext.classList.remove('active')
    buttonPrev.classList.add('active')
  });

  swiperAgenda.on('slideChange', function() {
    if (!swiperAgenda.isEnd) {
      buttonNext.classList.add('active')
    }

    if (!swiperAgenda.isBeginning) {
      buttonPrev.classList.add('active')
    }
  })

  // dropdown callendar
  const calendarTitle = document.querySelectorAll('.j-calendar-columns .column h3')
  calendarTitle.forEach(title => {
    title.addEventListener('click', function (e) {
      e.preventDefault()      
      const column = this.parentNode 

      if (title.classList.contains('show'))  {
        title.classList.remove('show')
        column.classList.remove('show')
      } else {
        closeAllAdsColumn()  
        title.classList.add('show')
        column.classList.add('show')
      }
    })
  })

  function closeAllAdsColumn() {
    calendarTitle.forEach(title => {
      const column = title.parentNode
      column.classList.remove('show')
      title.classList.remove('show')
    })
  }
})()