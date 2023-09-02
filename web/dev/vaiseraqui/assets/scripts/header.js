(function() {
  const header = document.querySelector('header.header')
  const main = document.querySelector('main')

  const media769 = window.innerWidth <= 769 

  // Control scroll with or no page
  
  window.addEventListener('scroll', function() {  
    header.classList.toggle('scroll', window.scrollY > 0)    
  })
  
  let lastScrollPosition = window.scrollY;

  window.addEventListener('scroll', () => {
    const currentScrollPosition = window.scrollY;

    if (currentScrollPosition > lastScrollPosition) {
      main.style.marginTop = media769 ? 0 : 137.2
      header.classList.remove('up')
    } else if (currentScrollPosition < lastScrollPosition) {
      main.style.marginTop = media769 ? 0 : 137.2
      header.classList.add('up')
    }

    lastScrollPosition = currentScrollPosition;
  });

  // Search Form 
  const formSubmit = header.querySelector('form')
  const inputSearch = formSubmit.querySelector('input')
  const buttonSubmit = header.querySelector('.header .container form button')
  
  buttonSubmit.addEventListener('click', function(e) {
    e.preventDefault()    
    const searchIsOpen = header.classList.contains('search-active')
    const synthetic = header.classList.contains('synthetic-event-search')

    if (searchIsOpen) {
      header.classList.remove('search-active')
      formSubmit.submit()
    } else {
      if(synthetic) {
        header.classList.remove('search-active')
        header.classList.remove('synthetic-event-search')
        formSubmit.submit()
      } else {
        header.classList.add('search-active')
        inputSearch.focus()
      }
    }
  })

  inputSearch.addEventListener('focusout', function(e) {
    header.classList.remove('search-active')
    header.classList.add('synthetic-event-search')
  })

  // Modal filter
  const btnModalFilter = document.querySelector('.j-btn-modal-filter')
  const modalFilterContent = document.querySelector('.header-modal-filter .header-modal-filter-content')

  btnModalFilter.addEventListener('click', function(e) {
    e.preventDefault()
    modalFilterContent.classList.toggle('open')
    header.classList.toggle('modal-filter-open')
    main.classList.toggle('modal-filter-open')
  })


})()