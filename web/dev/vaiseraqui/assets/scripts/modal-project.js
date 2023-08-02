const buttonsOpenModal = document.querySelectorAll('.j-button-open-modal')
const buttonsCloseModal = document.querySelectorAll('.j-button-close')
const modalProject = document.querySelector('.modal-project')
const modals = document.querySelectorAll(".modal-project");

const shouldOpenModal = window.innerWidth > 768

if (shouldOpenModal) {
  buttonsOpenModal.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault()
      document.querySelector('body').classList.add('modal-is-open')

      modals.forEach(modal => {
        console.log(button.dataset.adicional)

        if (button.dataset.adicional == modal.dataset.adicional) {
          modal.classList.add('open')
        }
      })
      
    })
  })
}

if (buttonsCloseModal) {
  buttonsCloseModal.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault()
      document.querySelector('body').classList.remove('modal-is-open')
      btn.closest(".modal-project").classList.remove('open')
    })
  })
}