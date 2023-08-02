(function() {
  // Setup modal Video
  const modal = document.querySelector('.modal-video')
  const iframe = modal.querySelector('iframe')
  const btnClose = modal.querySelector('.close')
  const btnsOpenModal = document.querySelectorAll('.j-button-open-modal')

  btnsOpenModal.forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault()

      const videoId = this.dataset.videoId
      iframe.src = `https://www.youtube.com/embed/${videoId}`
      modal.classList.add('open')
    })
  })

  btnClose.addEventListener('click', function () {
    modal.classList.remove('open')
    iframe.src = `https://www.youtube.com/embed/`
  })

})()