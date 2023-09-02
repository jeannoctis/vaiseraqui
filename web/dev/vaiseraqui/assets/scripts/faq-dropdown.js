(function() {
  const faqTitles = document.querySelectorAll('.faq-item .faq-title')
  faqTitles.forEach(title => {
    title.addEventListener('click', function(e) {
      e.preventDefault()
      const item = title.parentNode
      const isOpen = item.classList.contains('open')

      if (isOpen) {
        item.classList.remove('open')  
      } else {
        closAllFaqResponses()
        item.classList.add('open')
      }
    })
  })

  function closAllFaqResponses() {
    faqTitles.forEach(title => {
      title.parentNode.classList.remove('open')
    })
  }
})()