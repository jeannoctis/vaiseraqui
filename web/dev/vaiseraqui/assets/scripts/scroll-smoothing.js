(function () {
  // Scroll animation
  const buttonsNavigation = document.querySelectorAll('.j-button-scroll-section')
  buttonsNavigation.forEach(button => {
    button.addEventListener('click', (e) => {
      const href = e.target.href.split('#')[1]
      const section = document.getElementById(href);

      if (section) {
        e.preventDefault()
        const position = section.offsetTop - 120;

        window.scrollTo({
          top: position,
          behavior: 'smooth'
        });
      }
    })
  })
})()