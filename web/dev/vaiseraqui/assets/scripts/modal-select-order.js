(function() {
  // Modal filter
  const labelModals = document.querySelectorAll('.j-input-order-select')

  labelModals.forEach(labelModal => {
    const parentInput = labelModal.querySelector('.modal-order')
    const input = parentInput.querySelector('input')
    const modal = labelModal.querySelector('.modal-order-select')
    const options = modal.querySelectorAll('a')
  
    labelModal.addEventListener('click', function(e){
      e.preventDefault()
      modal.classList.toggle('open')
    }) 

    parentInput.addEventListener('click', function(e) {
      e.preventDefault()
      if (e.target === input) {
        e.stopPropagation()
        modal.classList.toggle('open')
      }
    })
  
    options.forEach(option => {
      option.addEventListener('click', function(e) {
        e.preventDefault()
        e.stopPropagation()
        removeAllOptionActive()
  
        const optionValue = option.dataset.selectValue
        input.value = optionValue
        option.classList.add('active')
        // window.location = option.href
        modal.classList.remove('open')
      })
    })
  
    function removeAllOptionActive() {
      options.forEach(option => {
        option.classList.remove('active')
      })
    }
  })  
})()