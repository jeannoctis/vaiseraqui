class MenuTabs {
  constructor(menuLinks, items) {
    this.menuLinks = menuLinks
    this.items = items

    this.init()
  }

  init() {
    this.initEvents()
  }

  initEvents() {
    this.menuLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault()
        const boxRefer = link.dataset.btn

        this.openItem(boxRefer)
        this.removeAllMenuActives()
        link.classList.add('active')
      })
    });
  }

  openItem(refer) {
    const box = [...this.items].find(item => {
      return item.dataset.modal === refer
    })


    if (!box) {
      return
    }

    this.items.forEach(item => {
      item.classList.remove('show')      
    })
    box.classList.add('show')
  }

  removeAllMenuActives() {
    this.menuLinks.forEach(link => {
      link.classList.remove('active')
    })
  }
}