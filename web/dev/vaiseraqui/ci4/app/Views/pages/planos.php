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

            <picture>
               <source srcset="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo2 ?>.webp" type="image/webp">
               <img src="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo2 ?>" class="mockup only-mobile" alt="banner planos mobile" data-aos="fade-left" />
            </picture>

            <a href="<?= $txPlanosHero->link ?>" <?= substr($txPlanosHero->link, 0, 1) != "#" ? "target='_blank'" : "" ?> class="btn-primary"><?= $txPlanosHero->botao ?></a>
         </div>

         <picture>
            <source srcset="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo ?>.webp" type="image/webp">
            <img src="<?= PATHSITE ?>uploads/texto/<?= $txPlanosHero->arquivo ?>" class="mockup" alt="banner planos" data-aos="fade-left">
         </picture>

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
               </div>
               <div class="only-more-1440">
                  <? foreach ($planosLinha as $plano) {
                     echo view("templates/plano-linha-card", (array)$plano);
                  } ?>
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
               <label for="nome">Seu nome</label>
               <input type="text" name="nome" id="nome" placeholder="ex: João" class="user" required>
            </div>
            <div class="wraper-inputs">
               <div class="input-group">
                  <label for="email">E-mail</label>
                  <input type="email" name="email" id="email" placeholder="ex: joao@gmail.com" class="email" required>
               </div>
               <div class="input-group">
                  <label for="telefone">Telefone</label>
                  <input type="text" name="telefone" id="telefone" placeholder="ex: (00) 9 9999-9999" maxlength="16" class="tel" required>
               </div>
            </div>
            <div class="wraper-prefer">
               <label for="#">Preferência de Contato</label>
               <div class="wraper">
                  <div>
                     <input type="radio" name="prefContato" value="whatsapp" id="whatsapp">
                     <label for="whatsapp">WhatsApp</label>
                  </div>
                  <div>
                     <input type="radio" name="prefContato" value="ligacao" id="call">
                     <label for="call">Ligação</label>
                  </div>
                  <div>
                     <input type="radio" name="prefContato" value="email" id="email">
                     <label for="email">E-mail</label>
                  </div>
               </div>
            </div>
            <div class="wraper-inputs">
               <div class="input-group j-input-order-select">
                  <label for="plano">Plano</label>
                  <div class="modal-order">
                      <input id="planoform" readonly="" type="text" name="plano" value="selecione uma modalidade">
                     <div class="modal-order-select">
                        <div class="wraper-scroll">
                           <nav class="content">                              
                              <a data-select-value="Anúncio de linha" href="javascript:void();" class="active" data-categoria="p-linha">Anúncio de linha</a>
                              <a data-select-value="Anúncio destaque" href="javascript:void();" data-categoria="p-destaque">Anúncio destaque</a>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="input-group j-input-order-select">
                  <label for="email">Duração</label>
                  <div class="modal-order">
                     <input id="duracao" readonly="" type="text" name="duracao" value="selecione a duração" disabled>
                     <div class="modal-order-select">
                        <div class="wraper-scroll">
                           <nav class="content">
                              <? foreach ($planosAnuncio as $plano) { ?>
                                 <a data-select-value="<?= $plano->titulo ?>" href="javascript:void();" class="p-opcao p-linha"><?= $plano->titulo ?></a>
                              <? } ?>
                              <? foreach ($planosLinha as $plano) { ?>
                                 <a data-select-value="<?= $plano->titulo ?>" href="javascript:void();" class="p-opcao p-destaque"><?= $plano->titulo ?></a>
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
                  <input type="hidden" name="modeloAnuncio" class="modal-value-selected">
                  <span class="label-value">Nenhuma opção selecionada</span>
               </div>
            </div>
            <div class="input-group">
               <label for="mensagem">Mensagem</label>
               <textarea style="resize: none;" name="mensagem" id="mensagem" placeholder="Escreva aqui sua mensagem"></textarea>
            </div>
            <input type="hidden" name="origem" value="planos">
            <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response" value="">
            <input type="hidden" name="enviar" value="enviar">
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

<style>
   .modal-order .modal-order-select .wraper-scroll {
      height: auto;
   }
</style>

<script>
   const categoriasPlano = document.querySelectorAll("a[data-categoria]")

   categoriasPlano.forEach(opt => {
      opt.addEventListener("click", ev => {
         const categoria = ev.target.dataset.categoria
         const opcoesPlano = document.querySelectorAll("a.p-opcao")
         const inputDuracao = document.querySelector("input[name=duracao]")

         inputDuracao.removeAttribute("disabled")

         opcoesPlano.forEach(opcao => {
            if(!opcao.classList.contains(categoria)) {
               opcao.style.display = "none"
            } else if (opcao.classList.contains(categoria)) {
               opcao.style.display = "block"
            }
         })
      })
   })
</script>