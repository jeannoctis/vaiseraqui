(function() {
  // Show menu mobile 
  const btnMenu = document.querySelector('.menu-mobile-button')
  const menuMobile = document.querySelector('.menu-mobile-modal')
  const btnMenuCloseMobile = menuMobile.querySelector('.menu-mobile-button-modal')
  const body = document.querySelector('body')
  const menuLinks = menuMobile.querySelectorAll('a')
  const modalFilter = document.querySelector('.moda-filter-container')    
  const btnFilter = document.querySelector('.form-order .btn-primary')  

  btnMenu.addEventListener('click', function() {
    menuMobile.classList.add('open')
    btnMenu.classList.add('open')
    btnMenuCloseMobile.classList.add('open')
    disableScroll(false)
  })
  
  btnMenuCloseMobile.addEventListener('click', function() {
    menuMobile.classList.remove('open')
    btnMenu.classList.remove('open')
    btnMenuCloseMobile.classList.remove('open')
    disableScroll(true)
  })

  menuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      btnMenuCloseMobile.click()
      // header.classList.add('up')
      setTimeout(() => {
        // header.classList.add('up')
      }, 1000)
    })
  })

  menuMobile.addEventListener('click', (e) => {
    const isOverlay = e.target.classList.contains('menu-mobile-modal')

    if (isOverlay) {
      btnMenuCloseMobile.click()
    }
  })

  btnFilter && btnFilter.addEventListener('click', () => {
    openModalFilter()
  })
  
  function disableScroll(show = false) {
    if (window.innerWidth < 769) {
      if (show) {
        body.classList.remove('no-scroll')
      } else {
        body.classList.add('no-scroll')
      }
    }
  }

  function openModalFilter() {
    if (modalFilter) {
      body.classList.add('no-scroll')
      modalFilter.classList.add('open')
    } 
  }
  
})()