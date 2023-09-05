class Selector {
  constructor(select) {
    this.boxSelect = select
    this.init()
  }

  init() {          
    this.select = this.boxSelect.querySelector('.select')
    this.input = this.select.querySelector('input')
    this.list = this.select.querySelector('.select-list')
    this.label = this.boxSelect.querySelector('label')
    this.btn = this.boxSelect.querySelector('.j-btn-select')
    this.dropdownList = this.boxSelect.querySelector('.dropdown-select')
    this.dropdownListitems = this.boxSelect.querySelectorAll('.dropdown-select li')

    this.copyOriginalItems()
    this.initEventsItems()
    this.filterItems()    
    
  }

  copyOriginalItems() {
    this.items = []
    this.dropdownListitems.forEach(item => {
      this.items.push(item.innerHTML)
    })

  }

  initEventsItems() {    
    this.dropdownListitems.forEach(item => {
      item.addEventListener('click', (e) => {        
        e.preventDefault()
        this.input.value = e.target.innerHTML
        this.closeDropdown()
      })
    })

    this.label.addEventListener('click', (e) =>{
      e.preventDefault()      
      this.openDropdown()
    })

    this.input.addEventListener('click', (e) => {
      e.preventDefault()
      document.querySelectorAll('.select-list.open').forEach(list => {
        list.classList.remove('open')
      })
      this.openDropdown()
    })
  }

  filterItems() {
    let newOptions = [...this.items]
    this.input.addEventListener('input', (e) =>{
      e.preventDefault()

      if (this.value !== '') {
        newOptions = this.items.filter(item => item.toLowerCase().includes(e.target.value.toLowerCase()))
        this.rerender(newOptions)
      } else {
        this.restartDropdownList(list, options)   
      }
    })
  }

  restartDropdownList() {
    this.list.innerHTML = ''
    this.items.forEach(option => {
      const newLi = this.createLi(option)
      newLi.addEventListener('click', (e) => {
        e.preventDefault()
        this.input.value = option
        this.closeDropdown()
      })
      this.list.appendChild(newLi)
    })
  }

  rerender(newOptions) {
    this.dropdownList.innerHTML = ''
    newOptions.forEach(option => {
      const newLi = this.createLi(option)
      newLi.addEventListener('click', (e) =>{
        e.preventDefault()
        this.input.value = option
        this.closeDropdown()
      })
      this.dropdownList.appendChild(newLi)
    })
  }

  createLi(value) {
    const newLi = document.createElement('li')
    newLi.append(value)
    return newLi
  }

  openDropdown() {
    this.input.focus()
    this.list.classList.add('open')
    this.select.classList.add('open')
  }

  closeDropdown() {
    this.input.blur()
    this.list.classList.remove('open')
    this.btn.classList.remove('open')
  }
}