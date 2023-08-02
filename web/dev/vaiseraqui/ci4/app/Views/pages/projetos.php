<main class="project-list">
   <h2 class="title-mobile" data-aos="fade-down">Nossos projetos</h2>

   <?= view("templates/filtro-mobile") ?>
   <?= view("templates/filtro-desktop") ?>

   <div class="sections-with-not-filter">
      <div class="recent-projects" id="maisrecentes">
         <div class="content">
            <div class="group-title" data-aos="fade-up">
               <h3><?= $txPjRecentes->titulo ?></h3>
               <p><?= $txPjRecentes->descricao ?></p>
            </div>

            <div class="swiper custom ourProjects" data-aos="fade-up">
               <div class="swiper-wrapper">
                  <? foreach ($pjRecentes as $projeto) { ?>
                     <div class="swiper-slide">
                        <?= view("templates/project-card", (array)$projeto) ?>
                     </div>
                  <? } ?>
               </div>
               <div class="navigation">
                  <div class="buttons">
                     <button class="prev">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                        </svg>
                     </button>
                     <button class="has-more next">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                        </svg>
                     </button>
                  </div>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
            </div>

            <div class="swiper custom ourProjectsResponsive" data-aos="fade-up">
               <div class="swiper-wrapper">
                  <? foreach ($pjRecentes as $projeto) { ?>
                     <div class="swiper-slide">
                        <div class="card-project card-link">
                           <div class="cover">
                              <span class="badget">Novo</span>
                              <img class="post" src="<?= PATHSITE ?>uploads/pj_foto/<?= $projeto->fotos[0]->arquivo ?>" alt="capa do projeto">
                           </div>
                           <div class="title">
                              <h4><?= $projeto->titulo ?></h4>
                           </div>
                           <div class="top-menu">
                              <div class="box">
                                 <img src="<?= PATHSITE ?>assets/images/icon-card-project-1.svg" alt="">
                                 <h5>área útil <span><?= $projeto->areautil ?> m²</span></h5>
                              </div>
                              <div class="box">
                                 <img src="<?= PATHSITE ?>assets/images/icon-card-project-2.svg" alt="">
                                 <h5>quartos <span><?= $projeto->quartos ?> + <?= $projeto->suites ?></span></h5>
                              </div>
                              <div class="box">
                                 <img src="<?= PATHSITE ?>assets/images/icon-card-project-3.svg" alt="">
                                 <h5>banheiros <span><?= $projeto->banheiros ?></span></h5>
                              </div>
                              <div class="box">
                                 <img src="<?= PATHSITE ?>assets/images/icon-card-project-4.svg" alt="">
                                 <h5>vagas <span><?= $projeto->vagas ?></span></h5>
                              </div>
                           </div>
                           <div class="table-price">
                              <p class="installments">12x<span>R$69,90</span></p>
                              <p class="in-cash">R$<?= number_format($projeto->valor, 2, ',', '.') ?> à vista</p>
                              <a href="<?= PATHSITE ?>projetos/<?= $projeto->identificador ?>">Ver mais detalhes <img src="<?= PATHSITE ?>assets/images/icon-chevron.svg" alt=""></a>
                           </div>
                        </div>
                     </div>
                  <? } ?>
               </div>
               <div class="navigation">
                  <div class="buttons">
                     <button class="prev">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                        </svg>
                     </button>
                     <button class="has-more next">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                        </svg>
                     </button>
                  </div>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
            </div>

            <div class="only-mobile" data-aos="fade-up">
               <? foreach ($pjRecentes as $ind => $projeto) { ?>
                  <div class="project <?= $ind > 2 ? 'hide' : '' ?>">
                     <?= view("templates/project-card", (array)$projeto); ?>
                  </div>                  
                  <? } ?>
               <a href="#" class="btn-primary" id="verMaisRecentes">ver mais</a>
            </div>

         </div>
      </div>
      <div class="recent-projects" id="maisrelevantes">
         <div class="content">
            <div class="group-title" data-aos="fade-up">
               <h3><?= $txPjRelevantes->titulo ?></h3>
               <p><?= $txPjRelevantes->descricao ?></p>
            </div>
            <div class="wraper" data-aos="fade-up">
               <? foreach ($pjRelevantes as $projeto) { ?>
                  <?= view("templates/project-card", (array)$projeto) ?>
               <? } ?>
            </div>
            <!-- <a href="#" class="btn-primary">ver mais</a> -->
         </div>
      </div>
      <div class="recent-projects hide-when-mobile">
         <div class="content">
            <div class="group-title" data-aos="fade-up">
               <h3><?= $txOutrosPj->titulo ?></h3>
               <p><?= $txOutrosPj->descricao ?></p>
            </div>
            <div class="wraper" data-aos="fade-up">
               <? foreach ($pjOutros as $projeto) { ?>
                  <?= view("templates/project-card", (array)$projeto) ?>
               <? } ?>
            </div>
         </div>
         <nav class="navigation-pages" data-aos="fade-up">
            <?= $pager->links('projetos') ?>
         </nav>
      </div>
   </div>

   <div class="loading">
      <div class="custom-loader"></div>
   </div>

   <div class="recent-projects hide box-filter sections-with-filter">
      <div class="content">

         <div class="group-title" data-aos="fade-up">
            <h3>Projetos baseados na sua filtragem</h3>
            <p>Exibindo somente os projetos com base nas opções selecionadas acima</p>
         </div>

         <? if ($pjFiltrados) { ?>
            <div class="wraper" data-aos="fade-up">
               <? foreach ($pjFiltrados as $projeto) { ?>
                  <?= view("templates/project-card", (array)$projeto) ?>
               <? } ?>
            </div>
         <? } ?>

      </div>

      <nav class="navigation-pages" data-aos="fade-up">
         <?= $pager->links('filtrados') ?>
      </nav>

   </div>

</main>

<script>
   document.querySelector("#verMaisRecentes").addEventListener("click", showProjects)

   function showProjects(e) {
      e.preventDefault()
      document.querySelectorAll("#maisrecentes .only-mobile .project").forEach(pj => {
         pj.classList.remove("hide");
      })
      e.currentTarget.style.display = 'none';
   }
</script>