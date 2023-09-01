(function() {
  // Open Form    
  const buttonOpenFormMenu = document.querySelector('.j-open-form-modal')
  const form = document.querySelector('.presentation-form')

  buttonOpenFormMenu && buttonOpenFormMenu.addEventListener('click', function(e) {
    e.preventDefault()
    form && form.classList.toggle('open-menu-modal')
  })

  // Controll visibility of forms in modal
  const formsContainer = document.querySelectorAll('.j-filter-modal-container')
  formsContainer && formsContainer.forEach(formWraper => {  
    const tabMenu = formWraper.querySelectorAll('.presentation-form-menu a')
    const internalforms = formWraper.querySelectorAll('.presentation-form-content form')
    
    controlVisibility(tabMenu, internalforms, formWraper)
  })


  function controlVisibility(tabMenu, forms, target) {
    tabMenu.forEach(menu => {
      menu.addEventListener('click', function(e) {
        e.preventDefault()
        const className = this.dataset.form
        const formTarget = target.querySelector(`.presentation-form-content .${className}`)        
        clearActiveTabMenu(tabMenu)
        clearVisibleForms(forms)
        this.classList.add('active')
        formTarget.classList.add('visible')
      })
    })
  }

  function clearVisibleForms(forms) {
    forms.forEach(form => {
      form.classList.remove('visible')
    })
  }

  function clearActiveTabMenu(tabMenu) {
    tabMenu.forEach(menu => {
      menu.classList.remove('active')
    })
  }  
})()