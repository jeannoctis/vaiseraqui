<? if ($pagina == 1) { ?>
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   <script src="./assets/scripts/header.js"></script>
   <script src="./assets/scripts/menu-mobile.js"></script>
   <script src="./assets/scripts/select.js"></script>
   <script src="./assets/scripts/menu-tabs.js"></script>
   <script src="./assets/scripts/mask-telefone.js"></script>
   <script src="./assets/scripts/mask-date.js"></script>
   <script src="./assets/scripts/form-filter.js"></script>
   <script src="./assets/scripts/card-like.js"></script>
   <script src="./assets/scripts/fslightbox.js"></script>

   <script type="module" src="./assets/scripts/controller-agenda.js"></script>
   <script type="module" src="./assets/scripts/controller-card.js"></script>
   <script type="module" src="./assets/scripts/controller-blog.js"></script>

   <script>
      AOS.init({
         once: true,
         duration: 1000
      });

      // Form Select
      const boxes = document.querySelectorAll('.j-box-select')
      boxes.forEach((box, key) => {
         new Selector(box)
      })

      // My Spaces    
      const MySpaceMenuTabs = document.querySelectorAll('.my-spaces .menu-abas > a')
      const MySpaceItems = document.querySelectorAll('.my-spaces .menu-wraper > .item')

      new MenuTabs(MySpaceMenuTabs, MySpaceItems)

      // My Services    
      const MyServicesMenuTabs = document.querySelectorAll('.my-services .menu-abas > a')
      const MyServicesItems = document.querySelectorAll('.my-services .menu-wraper > .item')

      new MenuTabs(MyServicesMenuTabs, MyServicesItems)

      // My Callendar    
      const MyCallendarMenuTabs = document.querySelectorAll('.my-callendar .menu-abas .swiper-slide > a')
      const MyCallendarItems = document.querySelectorAll('.my-callendar .menu-wraper > .item')

      new MenuTabs(MyCallendarMenuTabs, MyCallendarItems)

      // Configuration click box
      const planItems = document.querySelectorAll('.card-clicked')
      planItems.forEach(item => {
         item.addEventListener('click', (e) => {
            e.preventDefault()
            const link = item.querySelector('a')
            if (link) {
               window.location = link.href
            }
         })
      })
   </script>
<? } else if ($pagina == 2) { ?>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   <script src="./assets/scripts/header.js"></script>
   <script src="./assets/scripts/menu-mobile.js"></script>
   <script src="./assets/scripts/form-filter.js"></script>
   <script src="./assets/scripts/select.js"></script>
   <script src="./assets/scripts/modal-filter.js"></script>
   <script src="./assets/scripts/mask-telefone.js"></script>
   <script>
      AOS.init({
         once: true,
         duration: 1000
      });

      // Form Select
      const boxes = document.querySelectorAll('.j-box-select')
      boxes.forEach((box, key) => {
         new Selector(box)
      })
   </script>
<? } else if ($pagina == 3) { ?>
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   <script type="module" src="./assets/scripts/controller-agenda.js"></script>
   <script type="module" src="./assets/scripts/controller-card.js"></script>
   <script type="module" src="./assets/scripts/controller-page-internal-3.js"></script>

   <script src="./assets/scripts/header.js"></script>
   <script src="./assets/scripts/menu-tabs.js"></script>
   <script src="./assets/scripts/card-like.js"></script>
   <script src="./assets/scripts/menu-mobile.js"></script>
   <script src="./assets/scripts/form-filter.js"></script>
   <script src="./assets/scripts/select.js"></script>
   <script src="./assets/scripts/modal-filter.js"></script>
   <script src="./assets/scripts/fslightbox.js"></script>

   <script>
      AOS.init({
         once: true,
         duration: 1000
      });

      // Form Select
      const boxes = document.querySelectorAll('.j-box-select')
      boxes.forEach((box, key) => {
         new Selector(box)
      })

      // My Callendar    
      const MyCallendarMenuTabs = document.querySelectorAll('.my-callendar .menu-abas .swiper-slide > a')
      const MyCallendarItems = document.querySelectorAll('.my-callendar .menu-wraper > .item')

      new MenuTabs(MyCallendarMenuTabs, MyCallendarItems)
   </script>
<? } else if ($pagina == 4) { ?>
   <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   <script src="./assets/scripts/header.js"></script>
   <script src="./assets/scripts/menu-mobile.js"></script>
   <script src="./assets/scripts/form-filter.js"></script>
   <script src="./assets/scripts/select.js"></script>
   <script src="./assets/scripts/modal-filter.js"></script>
   <script src="./assets/scripts/mask-telefone.js"></script>
   <script src="./assets/scripts/modal-select-order.js"></script>

   <script>
      AOS.init({
         once: true,
         duration: 1000
      });

      // Form Select
      const boxes = document.querySelectorAll('.j-box-select')
      boxes.forEach((box, key) => {
         new Selector(box)
      })


      // Swiper Plan
      const buttonPrev = document.querySelector('.navigation-arrows .prev')
      const buttonNext = document.querySelector('.navigation-arrows .next')

      const swiperPlan = new Swiper('.planSwiper', {
         slidesPerView: 1.1,
         spaceBetween: 15,
         breakpoints: {
            769: {
               slidesPerView: 2.1,
            },
            1120: {
               slidesPerView: 3,
            },
         }
      })

      buttonNext.addEventListener('click', function(e) {
         e.preventDefault()
         swiperPlan.slideNext()
      })

      buttonPrev.addEventListener('click', function(e) {
         e.preventDefault()
         swiperPlan.slidePrev()
      })

      swiperPlan.on('reachBeginning', function() {
         buttonNext.classList.add('active')
         buttonPrev.classList.remove('active')
      });

      swiperPlan.on('reachEnd', function() {
         buttonNext.classList.remove('active')
         buttonPrev.classList.add('active')
      });

      swiperPlan.on('slideChange', function() {
         if (!swiperPlan.isBeginning) {
            buttonPrev.classList.add('active')
         }

         if (!swiperPlan.isEnd) {
            buttonNext.classList.add('active')
         }
      });

      // Swiper Plan    
      const swiperPrice = new Swiper('.priceSwiper', {
         slidesPerView: 1.1,
         spaceBetween: 15,
         breakpoints: {
            769: {
               slidesPerView: 1.8,
            },
            1200: {
               slidesPerView: 2.3,
            },
            1300: {
               slidesPerView: 3,
            },
         }
      })


      // Modal Plan
      const buttonModal = document.querySelector('.box-modal-open .button')
      const modal = document.querySelector('.modal-plan-container')
      const btnClose = modal.querySelector('.close')
      const body = document.querySelector('body')

      buttonModal.addEventListener('click', function(e) {
         e.preventDefault()
         body.classList.add('no-scroll')
         modal.classList.add('open')
      })
      btnClose.addEventListener('click', function(e) {
         e.preventDefault()
         body.classList.remove('no-scroll')
         modal.classList.remove('open')
      })

      const btnInternalModalSelect = document.querySelectorAll('.group-category .j-btn-select')
      const boxesInternal = modal.querySelectorAll('.group-category')

      btnInternalModalSelect.forEach(btn => {
         btn.addEventListener('click', function(e) {
            const box = btn.parentElement.parentElement;
            turnDisabledInput()

            box.classList.add('selected')
            const input = box.querySelector('.j-input-order-select input')
            if (input) {
               input.disabled = false
            }
         })
      })


      function turnDisabledInput() {
         boxesInternal.forEach(box => {
            box.classList.remove('selected')
            const input = box.querySelector('.j-input-order-select input')
            if (input) {
               input.disabled = true
            }
         })
      }

      function setValueInForm(type, params) {
         const formboxModalOpen = document.querySelector('.box-modal-open')
         const labelResult = formboxModalOpen.querySelector('.label-value')
         const inputResult = formboxModalOpen.querySelector('input.modal-value-selected')

         labelResult.innerHTML = `${type} <br /> ${params}`
         inputResult.value = `${type} ${params}`

         btnClose.click()
      }

      const form = document.querySelector('.formModal')
      form.addEventListener('submit', function(e) {
         e.preventDefault()
         const inputSelected = form.querySelector('input[type=radio]:checked')

         if (!inputSelected) {
            alert('Selecione a localização do anúncio')
            return
         }

         const box = inputSelected.parentElement.parentElement.parentElement
         const input = box.querySelector('.j-input-order-select input')

         let isEmpty = false;

         if (input) {
            isEmpty = input.value === ''
         }

         if (isEmpty) {
            alert('Selecione a categoria')
         } else {
            const category = inputSelected.value
            const categoryTitles = {
               "categoria-1": "Anúncio de categoria (Grande) Home",
               "categoria-2": "Anúncio de categoria (Pequeno) Home",
               "categoria-3": "Anúncio de categoria (Grande) Internas",
               "categoria-4": "Anúncio de categoria (Pequeno) Internas",
               "categoria-5": "Anúncio banner Principal Home",
               "categoria-6": "Anúncio banner Lateral Blog - Interna",
            }
            let params = ''
            if (input) {
               params = input.value
            }

            setValueInForm(categoryTitles[category], params)
         }
      })
   </script>
<? } else if ($pagina == 5) { ?>

<? } else if ($pagina == 6) { ?>

<? } else if ($pagina == 7) { ?>

<? } else if ($pagina == 8) { ?>

<? } else if ($pagina == 9) { ?>

<? } else if ($pagina == 10) { ?>

<? } else if ($pagina == 11) { ?>

<? } else if ($pagina == 12) { ?>

<? } else if ($pagina == 13) { ?>

<? } else if ($pagina == 14) { ?>

<? } else if ($pagina == 15) { ?>

<? } else if ($pagina == 16) { ?>

<? } else if ($pagina == 17) { ?>

<? } else if ($pagina == 18) { ?>

<? } else if ($pagina == 19) { ?>

<? } else if ($pagina == 20) { ?>

<? } else if ($pagina == 21) { ?>

<? } else if ($pagina == 22) { ?>

<? } else if ($pagina == 23) { ?>

<? } ?>