(function () {
  // Modal Filter
  const btnMenu = document.querySelector('.menu-mobile-button')

  const modalContainer = document.querySelector('.moda-filter-container');
  const modalFormContent = document.querySelector('.presentation-form');
  if (modalContainer) {
    const btnClose = modalContainer.querySelector('button.open-modal')
    btnClose.addEventListener('click', () => {
      closeModalFilter()
    })
  }

  const body = document.querySelector('body')

  if (modalContainer) {
    modalContainer.addEventListener('click', (e) => {
      const isParent = e.target.classList.contains('moda-filter-container')
      if (isParent) {
        closeModalFilter()
      }
    })
  }
  
  function closeModalFilter () {
    btnMenu.classList.remove('open')
    modalContainer.classList.remove('open')
    modalFormContent && modalFormContent.classList.remove('open-menu-modal')
    body.classList.remove('no-scroll')
  }
})()