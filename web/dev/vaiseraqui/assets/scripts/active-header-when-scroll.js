(function(){
  const header = document.querySelector('.header')

  let isMobile = window.innerWidth < 768

  window.addEventListener('resize', function() {
    isMobile = window.innerWidth < 768
  })

  window.addEventListener('scroll', function() {
    header.classList.toggle('active', window.scrollY > 0)
    if (header.classList.contains('active')) {      
      header.style.backgroundColor = isMobile ? '#FBFBFB' : '#FFF'
    } else {
      header.style.backgroundColor = isMobile ? '#FBFBFB' : 'transparent'
    }
  })
})()