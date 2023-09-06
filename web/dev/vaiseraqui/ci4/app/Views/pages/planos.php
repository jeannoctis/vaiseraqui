<style>
   main {
      overflow-x: hidden;
   }

   .modal-order .modal-order-select {
      top: 60px;
      min-width: initial;
      width: 100%;
   }

   .modal-order .modal-order-select .wraper-scroll {
      height: 120px;
      overflow-y: auto;
   }
</style>

<main>
   <section class="s-presentation-plan" id="planos">
      <div class="container-medium">
         <div class="content">
            <nav class="navigation-breadcrumb" data-aos="fade-up">
               <a href="<?= PATHSITE ?>">Início</a>
               <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
               <a href="<?= PATHSITE ?>planos/">Planos</a>
            </nav>
            <h1 data-aos="fade-right"><?= $txPlanosHero->titulo ?></h1>
            <p data-aos="fade-right" class="strong"><?= $txPlanosHero->descricao ?></strong>

               <!-- <h2 data-aos="fade-right">Vantagens de anunciar no Vai Ser Aqui</h2> -->
            <div data-aos="fade-right">
               <?= $txPlanosHero->texto ?>
            </div>

            <? if ($txPlanosHero->topicos) {
               $topicos = explode(";", $txPlanosHero->topicos); ?>
               <ul data-aos="fade-right">
                  <? foreach ($topicos as $topico) { ?>
                     <li><?= $topico ?></li>
                  <? } ?>
               </ul>
            <? } ?>

            <img data-aos="fade-left" class="mockup only-mobile" src="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo2 ?>" alt="banner planos mobile">

            <a href="<?= $txPlanosHero->link ?>" class="btn-primary"><?= $txPlanosHero->botao ?></a>
         </div>
         <img class="mockup" data-aos="fade-left" src="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo ?>" alt="banner planos">
      </div>
   </section>

   <section class="s-type-of-plan" id="anuncio-linha">
      <div class="container-medium">
         <h2 data-aos="fade-up"><?= $txPlanoLinha->titulo ?></h2>
         <p data-aos="fade-up"><?= $txPlanoLinha->descricao ?></p>

         <? if ($planosLinha) { ?>
            <div class="box-container" data-aos="fade-up">
               <div class="swiper priceSwiper">
                  <div class="swiper-wrapper">
                     <? foreach ($planosLinha as $plano) { ?>
                        <div class="swiper-slide">
                           <?= view("templates/plano-linha-card", (array)$plano); ?>
                        </div>
                     <? } ?>
                  </div>

                  <!-- Corrigir -->
                  <div class="only-more-1440">
                     <? foreach ($planosLinha as $plano) {
                        view("templates/plano-linha-card", (array)$plano);
                     } ?>
                  </div>
               </div>
            </div>
         <? } ?>

         <span class="info-about-credit-card" data-aos="fade-up"><?= $txPlanoLinha->extra1 ?></span>
      </div>
   </section>

   <section class="ads-featured" id="anuncio-destaque">
      <div class="container-medium">
         <h2 data-aos="fade-up">
            <?= $txPlanoAnuncio->titulo ?>
            <div class="navigation-arrows">
               <button class="prev">
                  <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 1L1 6.5L7 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
               <button class="next active">
                  <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 12L7 6.5L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
            </div>
         </h2>
         <p data-aos="fade-up"><?= $txPlanoAnuncio->descricao ?></p>

         <? if ($planosAnuncio) { ?>
            <div class="list" data-aos="fade-up">
               <div class="swiper planSwiper">
                  <div class="swiper-wrapper">
                     <? foreach ($planosAnuncio as $plano) { ?>
                        <div class="swiper-slide">
                           <?= view("templates/plano-anuncio-card", (array)$plano); ?>
                        </div>
                     <? } ?>
                  </div>
               </div>
            </div>
         <? } ?>

         <span class="info-about-credit-card" data-aos="fade-up"><?= $txPlanoAnuncio->extra1 ?></span>
      </div>
   </section>

   <section class="s-contact-form" id="contato">
      <div class="container-medium">

         <div class="info" data-aos="fade-right">
            <h2>
               <? $arrayTitulo = explode("*", $txContatoPlanos->titulo);
               foreach ($arrayTitulo as $value) { ?>
                  <?= $value ?> <br>
               <? }
               ?>
            </h2>
            <p><?= $txContatoPlanos->descricao ?></p>
            <div>
               <?= $txContatoPlanos->texto ?>
            </div>
         </div>

         <form method="post" data-aos="fade-left">
            <div class="input-group">
               <label for="name">Seu nome</label>
               <input type="text" placeholder="ex: João" class="user">
            </div>
            <div class="wraper-inputs">
               <div class="input-group">
                  <label for="email">E-mail</label>
                  <input type="email" placeholder="ex: joao@gmail.com" class="email">
               </div>
               <div class="input-group">
                  <label for="email">Telefone</label>
                  <input type="email" placeholder="ex: (00) 9 9999-9999" maxlength="16" class="tel">
               </div>
            </div>
            <div class="wraper-prefer">
               <label for="#">Preferência de Contato</label>
               <div class="wraper">
                  <div>
                     <input type="radio" name="form-contact" id="whatsapp">
                     <label for="whatsapp">WhatsApp</label>
                  </div>
                  <div>
                     <input type="radio" name="form-contact" id="call">
                     <label for="call">Ligação</label>
                  </div>
                  <div>
                     <input type="radio" name="form-contact" id="email">
                     <label for="email">E-mail</label>
                  </div>
               </div>
            </div>
            <div class="wraper-inputs">
               <div class="input-group j-input-order-select">
                  <label for="email">Plano</label>
                  <div class="modal-order">
                     <input type="text" readonly="" value="Anúncio de Linha">
                     <div class="modal-order-select">
                        <div class="wraper-scroll">
                           <nav class="content">
                              <? foreach ($planosLinha as $plano) { ?>
                                 <a data-select-value="<?= $plano->titulo ?>" href="#" class="active"><?= $plano->titulo ?></a>
                              <? } ?>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="input-group j-input-order-select">
                  <label for="email">Duração</label>
                  <div class="modal-order">
                     <input type="text" readonly="" value="Anual">
                     <div class="modal-order-select">
                        <div class="wraper-scroll">
                           <nav class="content">
                              <? foreach ($planosAnuncio as $plano) { ?>
                                 <a data-select-value="<?= $plano->titulo ?>" href="#" class="active"><?= $plano->titulo ?></a>
                              <? } ?>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="box-modal-open">
               <label>Localização do anúncio</label>
               <div class="wraper">
                  <label class="button" for="">Selecione Aqui</label>
                  <input type="hidden" class="modal-value-selected">
                  <span class="label-value">Nenhuma opção selecionada</span>
               </div>
            </div>
            <div class="input-group">
               <label for="message">Mensagem</label>
               <textarea name="" id="message" placeholder="Escreva aqui sua mensagem"></textarea>
            </div>
            <input type="hidden" name="origem" value="planos">
            <button type="submit">Enviar</button>
         </form>
         
      </div>
   </section>

   <div class="modal-plan-container">
      <div class="modal-plan-content">
         <h2>
            Localização do anúncio
            <button class="close">
               <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.702084" width="19.4261" height="1.04261" rx="0.521304" transform="matrix(0.712094 0.702084 -0.712094 0.702084 1.95454 0.435725)" stroke="#404041" />
                  <rect x="0.712094" y="-1.19209e-07" width="19.4261" height="1.04261" rx="0.521304" transform="matrix(0.712094 -0.702084 0.712094 0.702084 0.205016 14.8398)" stroke="#404041" />
               </svg>
            </button>
         </h2>
         <form action="#" class="formModal">
            <div class="content">
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-1" id="category-1">
                     </div>
                     <label for="category-1" class="j-btn-select ">
                        <span class="title">Anúncio de Categoria (Grande)</span>
                        <span class="subtitle">Home</span>
                     </label>
                  </div>
                  <div class="j-input-order-select">
                     <div class="modal-order">
                        <input type="text" disabled readonly="" value="Anúncio de categoria 1:1">
                        <div class="modal-order-select">
                           <div class="wraper-scroll">
                              <nav class="content">
                                 <a data-select-value="Anúncio de categoria 1:1" href="#" class="active">Anúncio de
                                    categoria
                                    1:1</a>
                                 <a data-select-value="Anúncio de categoria 1:2" href="#">Anúncio de categoria 1:2</a>
                                 <a data-select-value="Anúncio de categoria 1:3" href="#">Anúncio de categoria 1:3</a>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-1.svg" alt="">
                  </div>
               </div>
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-2" id="category-2">
                     </div>
                     <label for="category-2" class="j-btn-select">
                        <span class="title">Anúncio de Categoria (Pequeno)</span>
                        <span class="subtitle">Home</span>
                     </label>
                  </div>
                  <div class="j-input-order-select">
                     <div class="modal-order">
                        <input type="text" disabled readonly="" value="Anúncio de categoria 2:1">
                        <div class="modal-order-select">
                           <div class="wraper-scroll">
                              <nav class="content">
                                 <a data-select-value="Anúncio de categoria 2:1" href="#" class="active">Anúncio de
                                    categoria
                                    2:1</a>
                                 <a data-select-value="Anúncio de categoria 2:2" href="#">Anúncio de categoria 2:2</a>
                                 <a data-select-value="Anúncio de categoria 2:3" href="#">Anúncio de categoria 2:3</a>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-2.svg" alt="">
                  </div>
               </div>
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-3" id="category-3">
                     </div>
                     <label for="category-3" class="j-btn-select">
                        <span class="title">Anúncio de Categoria (Grande)</span>
                        <span class="subtitle">Internas</span>
                     </label>
                  </div>
                  <div class="j-input-order-select">
                     <div class="modal-order">
                        <input type="text" disabled readonly="" value="Anúncio de categoria 3:1">
                        <div class="modal-order-select">
                           <div class="wraper-scroll">
                              <nav class="content">
                                 <a data-select-value="Anúncio de categoria 3:1" href="#" class="active">Anúncio de
                                    categoria
                                    3:1</a>
                                 <a data-select-value="Anúncio de categoria 3:2" href="#">Anúncio de categoria 3:2</a>
                                 <a data-select-value="Anúncio de categoria 3:3" href="#">Anúncio de categoria 3:3</a>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-3.svg" alt="">
                  </div>
               </div>
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-4" id="category-4">
                     </div>
                     <label for="category-4" class="j-btn-select">
                        <span class="title">Anúncio de Categoria (Pequeno)</span>
                        <span class="subtitle">Internas</span>
                     </label>
                  </div>
                  <div class="j-input-order-select">
                     <div class="modal-order">
                        <input type="text" disabled readonly="" value="Anúncio de categoria 4:1">
                        <div class="modal-order-select">
                           <div class="wraper-scroll">
                              <nav class="content">
                                 <a data-select-value="Anúncio de categoria 4:1" href="#" class="active">Anúncio de
                                    categoria
                                    4:1</a>
                                 <a data-select-value="Anúncio de categoria 4:2" href="#">Anúncio de categoria 4:2</a>
                                 <a data-select-value="Anúncio de categoria 4:3" href="#">Anúncio de categoria 4:3</a>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-4.svg" alt="">
                  </div>
               </div>
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-5" id="category-5">
                     </div>
                     <label for="category-5" class="j-btn-select">
                        <span class="title">Anúncio Banner Principal</span>
                        <span class="subtitle">Home</span>
                     </label>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-5.svg" alt="">
                  </div>
               </div>
               <div class="group-category">
                  <div class="wraper">
                     <div class="box-input">
                        <input type="radio" name="category" value="categoria-6" id="category-6">
                     </div>
                     <label for="category-6" class="j-btn-select">
                        <span class="title">Anúncio Banner Lateral</span>
                        <span class="subtitle">Blog - Interna</span>
                     </label>
                  </div>
                  <div class="cover">
                     <img src="<?= PATHSITE ?>assets/images/bg-modal-6.svg" alt="">
                  </div>
               </div>
            </div>
            <button type="submit" class="btn-primary">Selecionar</button>
         </form>
      </div>
   </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
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