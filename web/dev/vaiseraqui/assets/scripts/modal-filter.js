(function() {
  // Modal Filter
  const btnMenu = document.querySelector('.menu-mobile-button')

  const modalContainer = document.querySelector('.moda-filter-container');
  const modalFormContent = document.querySelector('.presentation-form');
  const btnClose = modalContainer.querySelector('button.open-modal')

  const body = document.querySelector('body')

  btnClose.addEventListener('click', () =>{
    closeModalFilter()
  })

  modalContainer.addEventListener('click', (e) => {
    const isParent = e.target.classList.contains('moda-filter-container')
    if (isParent) {
      closeModalFilter()
    }
  })

  function closeModalFilter() {
    btnMenu.classList.remove('open')
    modalContainer.classList.remove('open')      
    modalFormContent && modalFormContent.classList.remove('open-menu-modal')
    body.classList.remove('no-scroll')
  }
})()