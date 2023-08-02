(function(){
  // Swiper
  new Swiper(".gallery-swiper", {
    slidesPerView: 4.5,
    spaceBetween: 8,      
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    // freeMode: true,
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: true
    },
    breakpoints: {

    },            
  });

  const galleryItens = document.querySelectorAll('.gallery .gallery-list .item')
  const galleryMainImage = document.querySelector('.gallery .main-cover img')

  galleryItens.forEach(item => {
    item.addEventListener('click', function () {
      const source = this.dataset.imageSource
      cleanAllActiveItems()
      this.classList.add('active');
      if (source) {
        galleryMainImage.src = source;
      }
    })
  })

  function cleanAllActiveItems() {
    galleryItens.forEach(item => {
      item.classList.remove('active')
    })
  }
})()