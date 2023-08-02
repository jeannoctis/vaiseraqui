// Setup Faq
const faqArticleTitles = document.querySelectorAll('.faq-content article h4')
const faqArticles = document.querySelectorAll('.faq-content article')

faqArticleTitles.forEach(title => {      
  title.addEventListener('click', (e) => {
    const parent = e.target.parentElement
    if (!parent.classList.contains('open')) {
      closeAllFaqQuestion()
      parent.classList.add('open')
    } else {          
      parent.classList.remove('open')
    }
  })
})  

function closeAllFaqQuestion() {
  faqArticles.forEach(article => {
    console.log(article)
    article.classList.remove('open')
  })
}