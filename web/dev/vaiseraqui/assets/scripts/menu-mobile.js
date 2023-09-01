(function() {
  // Show menu mobile 
  const btnMenu = document.querySelector('.menu-mobile-button')
  const menuMobile = document.querySelector('.menu-mobile-modal')
  const btnMenuMobile = menuMobile.querySelector('.menu-mobile-button-modal')
  const body = document.querySelector('body')
  const menuLinks = menuMobile.querySelectorAll('.menu-mobile-links a')

  if (window.innerWidth < 1140) {
    btnMenu.addEventListener('click', function() {
      menuMobile.classList.add('open')
      btnMenu.classList.add('open')
      btnMenuMobile.classList.add('open')
      body.classList.add('no-scroll')
    })
    
    btnMenuMobile.addEventListener('click', function() {
      menuMobile.classList.remove('open')
      btnMenu.classList.remove('open')
      btnMenuMobile.classList.remove('open')
      body.classList.remove('no-scroll')
    })
  
    menuLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        btnMenuMobile.click()
        header.classList.add('up')
        setTimeout(() => {
          header.classList.add('up')
        }, 1000)
      })
    })
  } else {
    const modalFilter = document.querySelector('.moda-filter-container')
    btnMenu.addEventListener('click', (e) => {
      btnMenu.classList.add('open')
      
      if (modalFilter) {
        body.classList.add('no-scroll')
        modalFilter.classList.add('open')
      }
      
    })
  }

  
})()