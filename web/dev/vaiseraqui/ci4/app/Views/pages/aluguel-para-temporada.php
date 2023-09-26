<main>
   <section class="s-with-maps">
      <div class="column" data-aos="fade-right">
         <header class="s-with-maps-header">
            <div class="left-space">
               <nav class="box-breadcrumbs">
                  <a href="<?= PATHSITE ?>"><span>Início</span></a>
                  <img src="<?= PATHSITE ?>assets/images/icon-bread-crumbs.svg" alt="">
                  <a href="<?= PATHSITE ?>aluguel-para-temporada/">Aluguel para Temporada</a>
               </nav>
               <span class="result"><?= count($alugueisParaTemporada) ?> espaços encontrados</span>

               <?= view("templates/order-filter", $get) ?>
            </div>
         </header>
         <? if ($emAlta) { ?>
            <div class="left-space">
               <!-- Destaque maior -->
               <? if ($emAlta[0]) {
                  $emAlta[0]->tipo = 'aluguel-para-temporada';
                  echo view("templates/aluguel-para-temporada-destaque-grande-card.php", (array)$emAlta[0]);
               } ?>
                <? } ?>

               <div class="list-articles">
                  <? if ($alugueisEmAlta['comum']) { ?>
                     <!-- Destaque menores -->
                     <? foreach ($alugueisEmAlta['comum'] as $aluguel) {
                        $aluguel->tipo = 'aluguel-para-temporada';
                        echo view("templates/aluguel-para-temporada-destaque-card.php", (array)$aluguel);
                     } ?>
                  <? } ?>
                  
                  <!-- Listagem comumn -->
                  <? foreach ($alugueisParaTemporada as $produto) {
                     $produto->tipo = 'aluguel-para-temporada';
                     echo view("templates/aluguel-para-temporada-card.php", (array)$produto);
                  } ?>
               </div>
               <?= $pager->links("anuncios") ?>
            </div>
        

      </div>
      <div class="column">
         <div class="embed-map">
            <div class="mapa fixme" id="map">

            </div>
         </div>
      </div>
   </section>

   <!-- Buscar anúncios -->
   <? if ($emAlta) { ?>
      <section class="s-title-and-list-cards">
         <div class="container-medium">
            <header data-aos="fade-up">
               <h2>Mais destaques</h2>
               <p>Conheça mais destaques na sua região</p>
            </header>
         </div>
         <div class="list">
            <div class="swiper rent-interna">
               <div class="swiper-wrapper">
                  <? foreach ($emAlta as $ind => $item) {
                      if($ind) { ?>
                     <div class="swiper-slide">
                        <?= view("templates/aluguel-para-temporada-destaque-card.php", (array)$item) ?>
                     </div>
                  <? } } ?>
               </div>
               <div class="swiper-pagination"></div>
            </div>
            <div class="navigation-swiper-blog only-mobile">
               <button class="prev">
                  <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 1L1 6.5L7 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
               <button class="next active">
                  <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
            </div>
         </div>
      </section>
   <? } ?>
</main>


<div class="moda-filter-container">
   <div action="#" class="presentation-form j-filter-modal-container">
      <header>
         <h2>
            <div class="wraper-icon">
               <img src="<?= PATHSITE ?>assets/images/icon-search-box.svg" alt="icon search">
            </div>
            <?= $txMenuFiltro->titulo ?>
         </h2>
         <button class="open-modal j-open-form-modal">
            <svg width="31" height="16" viewBox="0 0 31 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M2 2L15.5 14L29 2" stroke="#404041" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg class="active" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
               <g fill="#404041" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                  <g transform="scale(10.66667,10.66667)">
                     <path d="M4.99023,3.99023c-0.40692,0.00011 -0.77321,0.24676 -0.92633,0.62377c-0.15312,0.37701 -0.06255,0.80921 0.22907,1.09303l6.29297,6.29297l-6.29297,6.29297c-0.26124,0.25082 -0.36647,0.62327 -0.27511,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27511l6.29297,-6.29297l6.29297,6.29297c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-6.29297,-6.29297l6.29297,-6.29297c0.29576,-0.28749 0.38469,-0.72707 0.22393,-1.10691c-0.16075,-0.37985 -0.53821,-0.62204 -0.9505,-0.60988c-0.2598,0.00774 -0.50638,0.11632 -0.6875,0.30273l-6.29297,6.29297l-6.29297,-6.29297c-0.18827,-0.19353 -0.4468,-0.30272 -0.7168,-0.30273z"></path>
                  </g>
               </g>
            </svg>
         </button>
      </header>

      <nav class="presentation-form-menu">
         <a href="#" data-form="form4">
            <svg class="isActive" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M29 16H3" stroke="white" stroke-width="2" stroke-linecap="round" />
               <path d="M26 15.4827C25.7619 12.0984 23.4048 5.26521 15.881 5.00654C8.35714 4.74787 6.15873 12.2277 6 16" stroke="white" stroke-width="2" stroke-linecap="round" />
               <path d="M10.4915 27.5106H19.1202C19.6069 27.4468 20.5804 26.9745 20.5804 25.5957C20.5804 24.217 19.6069 23.6596 19.1202 23.5532H13.412C12.8367 22.7021 10.757 21 7.04006 21C3.3231 21 1.46462 22.9574 1 23.9362V33H16.2661C17.0626 32.9787 19.1335 32.6681 21.045 31.5957C22.9566 30.5234 29.2312 26.9362 32.1295 25.2766C32.7048 24.9787 33.5765 23.9745 32.4614 22.3404C31.6118 21.166 30.3374 21.383 29.8064 21.6383L20.8459 25.5957" stroke="white" stroke-width="2" stroke-linecap="round" />
               <rect width="2" height="3" transform="matrix(-1 0 0 1 17 2)" fill="white" />
               <rect width="6" height="3" rx="1.5" transform="matrix(-1 0 0 1 19 0)" fill="white" />
            </svg>

            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M29 16H3" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <path d="M26 15.4827C25.7619 12.0984 23.4048 5.26521 15.881 5.00654C8.35714 4.74787 6.15873 12.2277 6 16" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <path d="M10.4915 27.5106H19.1202C19.6069 27.4468 20.5804 26.9745 20.5804 25.5957C20.5804 24.217 19.6069 23.6596 19.1202 23.5532H13.412C12.8367 22.7021 10.757 21 7.04006 21C3.3231 21 1.46462 22.9574 1 23.9362V33H16.2661C17.0626 32.9787 19.1335 32.6681 21.045 31.5957C22.9566 30.5234 29.2312 26.9362 32.1295 25.2766C32.7048 24.9787 33.5765 23.9745 32.4614 22.3404C31.6118 21.166 30.3374 21.383 29.8064 21.6383L20.8459 25.5957" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <rect width="2" height="3" transform="matrix(-1 0 0 1 17 2)" fill="#808080" />
               <rect width="6" height="3" rx="1.5" transform="matrix(-1 0 0 1 19 0)" fill="#808080" />
            </svg>
            
            Aluguel para <br>
            Temporada
         </a>
      </nav>

      <div class="presentation-form-content">
         <? echo View("templates/form1", (array) $tipoAtual ) ?>
      </div>

   </div>
</div>