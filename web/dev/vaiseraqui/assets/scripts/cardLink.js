const cards = document.querySelectorAll('.card-link');

cards.forEach(card => {
  const link = card.querySelector('a')
  card.addEventListener('click', function() {
    link.click()
  })
})