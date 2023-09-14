(function() {
  // Likes in card
  const likes = document.querySelectorAll('.icon-heart')
  likes.forEach(like => {
    like.addEventListener('click', (e) => {
      e.preventDefault()
    })
  })
})()