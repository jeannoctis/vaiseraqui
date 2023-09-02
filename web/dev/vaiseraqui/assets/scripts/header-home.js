(function(){
  // Page Home - Menu
  const header = document.querySelector('body > header.header')
  const btnMenu = document.querySelector('.menu-mobile-button')
  const formPresentation = document.querySelector('.presentation-form')

  const menuMobile = document.querySelector('.menu-mobile-modal')
  const btnMenuMobile = menuMobile.querySelector('.menu-mobile-button-modal')
  const body = document.querySelector('body')
  const menuLinks = menuMobile.querySelectorAll('.menu-mobile-links a')

  const formTop = formPresentation.getBoundingClientRect().top
  
  if (window.innerWidth > 1140) {
    btnMenu.addEventListener('click', function(e) {
      e.preventDefault()
      
      const menuIsOpen = btnMenu.classList.contains('open')
  
      if (menuIsOpen) {
        btnMenu.classList.remove('open')
        formPresentation.classList.remove('open-menu-modal')          
      } else {
        btnMenu.classList.add('open')
        formPresentation.classList.add('open-menu-modal')  
        
        window.scrollTo({
          top: formTop,
          behavior: 'smooth'
        })
      }    
    })

    // Modal Filter
    const btnModalFilter = document.querySelector('.j-open-form-modal')
    btnModalFilter.addEventListener('click', function() {
      btnMenu.classList.toggle('open')
      header.classList.add('up')  
    })
  } else {
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
  }
})()