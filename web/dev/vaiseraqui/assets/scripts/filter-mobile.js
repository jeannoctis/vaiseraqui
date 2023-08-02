// Filter dropdown
const buttonFilter = document.querySelector('.filter-mobile .bottom > h3')
const iconDropdown = document.querySelector('.filter-mobile .bottom > h3 .icon-checked')

const boxFilter = document.querySelector('.filter-mobile .bottom .form')
const items = document.querySelectorAll('.filter-mobile .bottom .form .item')

if (buttonFilter) {
  buttonFilter.addEventListener('click', () => {  
    if (boxFilter.classList.contains('open')) {
      boxFilter.classList.remove('open')  
      iconDropdown.classList.remove('open')
    } else {
      boxFilter.classList.add('open')  
      iconDropdown.classList.add('open')        
    }      
  })
  
  items.forEach(item => {
    const button = item.querySelector('button')
    const h3 = item.querySelector('h3')
    const ul = item.querySelector('ul')
  
    h3.addEventListener('click', (e) => {
      e.preventDefault()
      if (ul.classList.contains('open')) {
        item.classList.remove('open')
        ul.classList.remove('open')
        button.classList.remove('open')
      } else {
        item.classList.add('open')
        ul.classList.add('open')
        button.classList.add('open')
      }
    })
  })
}
