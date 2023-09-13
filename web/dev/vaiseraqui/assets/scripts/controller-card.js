// import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

(function() {
  
  
  setTimeout(() => {
    const swiperCard = new Swiper('.swiper-card', {   
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      observer: true,
      observeParents: true,
    })    

  }, 100)
  

})()