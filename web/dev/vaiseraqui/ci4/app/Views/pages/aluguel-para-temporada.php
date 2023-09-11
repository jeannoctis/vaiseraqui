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
               
               <!-- Filtro -->
               <?= view("templates/order-filter", $get) ?>
            </div>
         </header>
         <? if ($alugueisParaTemporada) { ?>
            <div class="left-space">

               <!-- Destaque maior -->
               <? if ($alugueisEmAlta['grande']) {
                  echo view("templates/aluguel-para-temporada-destaque-grande-card.php", (array)$alugueisEmAlta['grande']);
               } ?>

               <div class="list-articles">
                  <? if ($alugueisEmAlta['comum']) { ?>
                     <!-- Destaque menores -->
                     <? foreach ($alugueisEmAlta['comum'] as $aluguel) {
                        echo view("templates/aluguel-para-temporada-destaque-card.php", (array)$aluguel);
                     } ?>
                  <? } ?>

                  <!-- Listagem comumn -->
                  <? foreach ($alugueisParaTemporada as $produto) {
                     echo view("templates/aluguel-para-temporada-card.php", (array)$produto);
                  } ?>
               </div>

               <?= $pager->links("anuncios") ?>

            </div>
         <? } ?>

      </div>
      <div class="column">
         <div class="embed-map">
            <div class="mapa fixme" id="map">
               
            </div>
         </div>
      </div>
   </section>

   <!-- Buscar anúncios -->
   <? if ($alugueisEmAlta) { ?>
      <section class="s-title-and-list-cards">
         <div class="container-medium">
            <header data-aos="fade-up">
               <h2>Imóveis em destaque</h2>
               <p>Outros imóveis de aluguel para temporada semelhantes na sua região</p>
            </header>
         </div>
         <div class="list">
            <div class="swiper rent-interna">
               <div class="swiper-wrapper">
                  <? foreach ($alugueisEmAlta as $item) { ?>
                     <div class="swiper-slide">
                        <?= view("templates/aluguel-para-temporada-destaque-card.php", (array)$item) ?>
                     </div>
                  <? } ?>
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
            O que você está procurando?
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
         <a href="#" class="active" data-form="form1">
            <svg class="isActive" width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M4 24V5.47222C4 3.98148 4.9 1 8.5 1C10 1 13 1.89444 13 5.47222C13 9.05 13 19.3148 13 24" stroke="white" stroke-width="1.5" />
               <path d="M0 24H34.1053C34.7368 24 36 24.0001 36 25.2222C36 26.4444 36 32.5556 36 33.7778C36 35 35.6211 35 34.1053 35H0" stroke="white" stroke-width="1.5" />
               <path d="M0 29H15" stroke="white" stroke-width="1.5" />
               <path d="M19 24L10 35" stroke="white" stroke-width="1.5" />
               <path d="M26 24L18 35" stroke="white" stroke-width="1.5" />
               <path d="M34 24L25 35" stroke="white" stroke-width="1.5" />
               <path d="M30 8V24" stroke="white" stroke-width="1.5" />
               <path d="M13 13.7426C15.9822 11.6049 20.6364 8.26866 20.6364 8.26866C20.8485 8.06592 21.4 7.78209 21.9091 8.26866C22.4182 8.75523 30.1818 14.959 34 18" stroke="white" stroke-width="1.5" />
               <mask id="path-9-inside-1_1084_2733" fill="white">
                  <rect x="18" y="17" width="6" height="7" rx="1" />
               </mask>
               <rect x="18" y="17" width="6" height="7" rx="1" stroke="white" stroke-width="3" mask="url(#path-9-inside-1_1084_2733)" />
            </svg>

            <svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M4 24V5.47222C4 3.98148 4.9 1 8.5 1C10 1 13 1.89444 13 5.47222C13 9.05 13 19.3148 13 24" stroke="#808080" stroke-width="1.5" />
               <path d="M0 24H34.1053C34.7368 24 36 24.0001 36 25.2222C36 26.4444 36 32.5556 36 33.7778C36 35 35.6211 35 34.1053 35H0" stroke="#808080" stroke-width="1.5" />
               <path d="M0 29H15" stroke="#808080" stroke-width="1.5" />
               <path d="M19 24L10 35" stroke="#808080" stroke-width="1.5" />
               <path d="M26 24L18 35" stroke="#808080" stroke-width="1.5" />
               <path d="M34 24L25 35" stroke="#808080" stroke-width="1.5" />
               <path d="M30 8V24" stroke="#808080" stroke-width="1.5" />
               <path d="M13 13.7426C15.9822 11.6049 20.6364 8.26866 20.6364 8.26866C20.8485 8.06592 21.4 7.78209 21.9091 8.26866C22.4182 8.75523 30.1818 14.959 34 18" stroke="#808080" stroke-width="1.5" />
               <mask id="path-9-inside-1_1059_28965" fill="white">
                  <rect x="18" y="17" width="6" height="7" rx="1" />
               </mask>
               <rect x="18" y="17" width="6" height="7" rx="1" stroke="#808080" stroke-width="3" mask="url(#path-9-inside-1_1059_28965)" />
            </svg>

            Aluguel para <br>
            temporada
         </a>
         <a href="#" data-form="form2">
            <svg class="isActive" width="32" height="35" viewBox="0 0 32 35" fill="none" xmlns="http://www.w3.org/2000/svg">
               <rect x="12.5" y="2.5" width="7" height="1" rx="0.5" fill="#BBBBBB" stroke="white" />
               <rect x="15.5" y="3.5" width="3" height="1" rx="0.5" transform="rotate(-90 15.5 3.5)" fill="#BBBBBB" stroke="white" />
               <path d="M16 3C12.6759 4.48988 6 10.3606 6 19.4985C6 28.6365 16.5541 35.2807 14.3379 33.7908" stroke="white" stroke-width="1.5" />
               <path d="M16 3C19.1579 4.49001 26.5 10.3613 26.5 19.5C26.5 28.6387 15.3947 35.49 17.5 34" stroke="white" stroke-width="1.5" />
               <path d="M5.5 8.5C6.5 9.33333 9.9 11.1 15.5 11.5C21.1 11.9 24.8333 9.33333 26 8" stroke="white" stroke-width="1.5" />
               <path d="M1 16C1 16 6.3 19 15.5 19C24.7 19 31 16 31 16" stroke="white" stroke-width="1.5" />
               <path d="M1 22.5C1 22.5 7.2 28 16 28C24.8 28 29.6667 23.1667 31 21.5" stroke="white" stroke-width="1.5" />
               <circle cx="16" cy="19" r="15.25" stroke="white" stroke-width="1.5" />
               <path d="M16 4.5V34" stroke="white" stroke-width="1.5" />
            </svg>

            <svg width="32" height="35" viewBox="0 0 32 35" fill="none" xmlns="http://www.w3.org/2000/svg">
               <rect x="12.5" y="2.5" width="7" height="1" rx="0.5" fill="#BBBBBB" stroke="#808080" />
               <rect x="15.5" y="3.5" width="3" height="1" rx="0.5" transform="rotate(-90 15.5 3.5)" fill="#BBBBBB" stroke="#808080" />
               <path d="M16 3C12.6759 4.48988 6 10.3606 6 19.4985C6 28.6365 16.5541 35.2807 14.3379 33.7908" stroke="#808080" stroke-width="1.5" />
               <path d="M16 3C19.1579 4.49001 26.5 10.3613 26.5 19.5C26.5 28.6387 15.3947 35.49 17.5 34" stroke="#808080" stroke-width="1.5" />
               <path d="M5.5 8.5C6.5 9.33333 9.9 11.1 15.5 11.5C21.1 11.9 24.8333 9.33333 26 8" stroke="#808080" stroke-width="1.5" />
               <path d="M1 16C1 16 6.3 19 15.5 19C24.7 19 31 16 31 16" stroke="#808080" stroke-width="1.5" />
               <path d="M1 22.5C1 22.5 7.2 28 16 28C24.8 28 29.6667 23.1667 31 21.5" stroke="#808080" stroke-width="1.5" />
               <circle cx="16" cy="19" r="15.25" stroke="#808080" stroke-width="1.5" />
               <path d="M16 4.5V34" stroke="#808080" stroke-width="1.5" />
            </svg>
            Salões de Festa e <br>
            Áreas de Lazer
         </a>
         <a href="#" data-form="form3">
            <svg class="isActive" width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M4 16V28.75C4 30.1667 4.88889 33 8.44444 33C12 33 24.7407 33 30.6667 33C31.7778 33 34 32.15 34 28.75C34 25.35 34 19.1875 34 16.5312" stroke="white" stroke-width="2" />
               <path d="M14.0197 33V25.2222C13.8446 24.4815 14.8602 23 16.1209 23C17.3816 23 20.4981 23 21.8988 23C22.5992 23 24 23.4444 24 25.2222C24 27 24 31.1481 24 33" stroke="white" stroke-width="2" />
               <path d="M5.35458 1H31.9287C32.4824 1 33.7003 1.22857 34.1432 2.14286C34.5861 3.05714 36.1732 7.85714 36.9114 10.1429C37.2805 12.4286 36.6899 17 31.3751 17C26.0603 17 24.7316 11.6667 24.7316 9C24.9161 11.4762 24.0672 16.4286 19.1953 16.4286C14.3234 16.4286 13.1054 11.4762 13.1054 9C13.1054 11.4762 11.6659 16.4286 5.90821 16.4286C0.925552 15.8571 0.371923 11.8571 1.47918 9C2.36498 6.71429 3.69358 3.47619 4.24716 2.14286C4.43176 1.7619 4.91167 1 5.35458 1Z" stroke="white" stroke-width="2" stroke-linejoin="round" />
            </svg>

            <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M4 16V28.75C4 30.1667 4.88889 33 8.44444 33C12 33 24.7407 33 30.6667 33C31.7778 33 34 32.15 34 28.75C34 25.35 34 19.1875 34 16.5312" stroke="#808080" stroke-width="2" />
               <path d="M14.0197 33V25.2222C13.8446 24.4815 14.8602 23 16.1209 23C17.3816 23 20.4981 23 21.8988 23C22.5992 23 24 23.4444 24 25.2222C24 27 24 31.1481 24 33" stroke="#808080" stroke-width="2" />
               <path d="M5.35458 1H31.9287C32.4824 1 33.7003 1.22857 34.1432 2.14286C34.5861 3.05714 36.1732 7.85714 36.9114 10.1429C37.2805 12.4286 36.6899 17 31.3751 17C26.0603 17 24.7316 11.6667 24.7316 9C24.9161 11.4762 24.0672 16.4286 19.1953 16.4286C14.3234 16.4286 13.1054 11.4762 13.1054 9C13.1054 11.4762 11.6659 16.4286 5.90821 16.4286C0.925552 15.8571 0.371923 11.8571 1.47918 9C2.36498 6.71429 3.69358 3.47619 4.24716 2.14286C4.43176 1.7619 4.91167 1 5.35458 1Z" stroke="#808080" stroke-width="2" stroke-linejoin="round" />
            </svg>
            Lojas Temporárias
         </a>
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
            Prestadores de <br>
            Serviços
         </a>
         <a href="#" data-form="form5">
            <svg class="isActive" width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M3 23.5C1.4 23.5 1 24.5 1 25V31.5C1 32.3 1.66667 32.5 2 32.5H3.5C4.3 32.5 4.83333 32.1667 5 32L7.5 29.5H34L36.5 32C36.9 32.4 37.6667 32.5 38 32.5H39.5C40.7 32.5 41 31.8333 41 31.5V25C41 23.8 39.6667 23.5 39 23.5H3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M3 22.5715V19.1429C3 18.2857 3.19726 17 5.95891 17C8.72057 17 27.1644 17 36.0411 17C38.0138 17 39 17.1714 39 19.5715C39 21.9715 39 22.8572 39 23" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M2.5 1V23.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M39.5 1V23.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M2.5 5H39.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M9.5 16.5V12.5C9.5 11.8333 10 10.5 12 10.5C14 10.5 17.1667 10.5 18.5 10.5C19.3333 10.5 21 10.9 21 12.5C21 14.1 21 15.8333 21 16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M21 16.5V12.5C21 11.8333 21.5 10.5 23.5 10.5C25.5 10.5 28.6667 10.5 30 10.5C30.8333 10.5 32.5 10.9 32.5 12.5C32.5 14.1 32.5 15.8333 32.5 16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M3 23.5C1.4 23.5 1 24.5 1 25V31.5C1 32.3 1.66667 32.5 2 32.5H3.5C4.3 32.5 4.83333 32.1667 5 32L7.5 29.5H34L36.5 32C36.9 32.4 37.6667 32.5 38 32.5H39.5C40.7 32.5 41 31.8333 41 31.5V25C41 23.8 39.6667 23.5 39 23.5H3Z" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M3 22.5715V19.1429C3 18.2857 3.19726 17 5.95891 17C8.72057 17 27.1644 17 36.0411 17C38.0138 17 39 17.1714 39 19.5715C39 21.9715 39 22.8572 39 23" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M2.5 1V23.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M39.5 1V23.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M2.5 5H39.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M9.5 16.5V12.5C9.5 11.8333 10 10.5 12 10.5C14 10.5 17.1667 10.5 18.5 10.5C19.3333 10.5 21 10.9 21 12.5C21 14.1 21 15.8333 21 16.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               <path d="M21 16.5V12.5C21 11.8333 21.5 10.5 23.5 10.5C25.5 10.5 28.6667 10.5 30 10.5C30.8333 10.5 32.5 10.9 32.5 12.5C32.5 14.1 32.5 15.8333 32.5 16.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Hospedagem
         </a>
         <a href="#" data-form="form6">
            <svg class="isActive" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M18.0567 0.799663L18.2409 0.98099L32 15.1798L30.5243 16.7564L28.6297 14.8016L28.6307 29.7887C28.6307 30.9541 27.7719 31.9093 26.6825 31.9934L26.5256 32H5.47438C4.36498 32 3.45556 31.0978 3.37452 29.9534L3.36925 29.7887L3.3682 14.8027L1.47569 16.7564L0 15.1798L13.7444 0.995363C14.9159 -0.260655 16.8052 -0.33031 18.0567 0.799663ZM15.3348 2.46257L15.2337 2.55876L5.47332 12.6301L5.47438 29.7887L10.7361 29.7876L10.7372 18.7322C10.7372 17.5669 11.5961 16.6116 12.6855 16.5264L12.8423 16.5209H19.1577C20.2671 16.5209 21.1765 17.4231 21.2575 18.5675L21.2628 18.7322L21.2618 29.7876L26.5256 29.7887L26.5246 12.629L16.7368 2.5278C16.3537 2.13308 15.7558 2.10875 15.3348 2.46257ZM19.1577 18.7322H12.8423L12.8413 29.7876H19.1566L19.1577 18.7322Z" fill="white" />
            </svg>

            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M18.0567 0.799663L18.2409 0.98099L32 15.1798L30.5243 16.7564L28.6297 14.8016L28.6307 29.7887C28.6307 30.9541 27.7719 31.9093 26.6825 31.9934L26.5256 32H5.47438C4.36498 32 3.45556 31.0978 3.37452 29.9534L3.36925 29.7887L3.3682 14.8027L1.47569 16.7564L0 15.1798L13.7444 0.995363C14.9159 -0.260655 16.8052 -0.33031 18.0567 0.799663ZM15.3348 2.46257L15.2337 2.55876L5.47332 12.6301L5.47438 29.7887L10.7361 29.7876L10.7372 18.7322C10.7372 17.5669 11.5961 16.6116 12.6855 16.5264L12.8423 16.5209H19.1577C20.2671 16.5209 21.1765 17.4231 21.2575 18.5675L21.2628 18.7322L21.2618 29.7876L26.5256 29.7887L26.5246 12.629L16.7368 2.5278C16.3537 2.13308 15.7558 2.10875 15.3348 2.46257ZM19.1577 18.7322H12.8423L12.8413 29.7876H19.1566L19.1577 18.7322Z" fill="#808080" />
            </svg>
            Imobiliárias e <br>
            Corretores
         </a>
         <a href="#" data-form="form7">
            <svg class="isActive" width="57" height="55" viewBox="0 0 57 55" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M14.6827 42.1065C13.8824 42.4011 13.1042 41.623 13.3988 40.8227L21.376 19.1515C21.6282 18.4665 22.5054 18.2737 23.0216 18.7899L36.7155 32.4838C37.2316 32.9999 37.0388 33.8772 36.3539 34.1294L14.6827 42.1065Z" stroke="white" stroke-width="2" />
               <path d="M29.1637 15.3293C31.3208 12.4018 34.1559 5.43747 28.2393 1" stroke="white" stroke-width="2" stroke-linecap="round" />
               <path d="M35.1738 18.565C37.485 18.7191 42.3847 17.6406 43.4941 12.0937C44.8808 5.16018 45.8053 1.46228 52.2766 1.46228" stroke="white" stroke-width="2" stroke-linecap="round" />
               <path d="M40.2588 25.9609C42.7241 23.8038 49.1337 21.2461 55.0504 28.2721" stroke="white" stroke-width="2" stroke-linecap="round" />
               <circle cx="46.7298" cy="32.8944" r="1.84895" fill="white" />
               <circle cx="22.6927" cy="8.85798" r="1.84895" fill="white" />
               <path d="M31.0136 35.6679L19.9199 24.5742" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>

            <svg width="57" height="55" viewBox="0 0 57 55" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M14.6832 42.1065C13.8829 42.4011 13.1047 41.623 13.3993 40.8227L21.3765 19.1515C21.6286 18.4665 22.5059 18.2737 23.0221 18.7899L36.716 32.4838C37.2321 32.9999 37.0393 33.8772 36.3543 34.1294L14.6832 42.1065Z" stroke="#808080" stroke-width="2" />
               <path d="M29.1642 15.3293C31.3213 12.4018 34.1564 5.43747 28.2397 1" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <path d="M35.1738 18.5649C37.485 18.719 42.3847 17.6404 43.4941 12.0936C44.8808 5.16005 45.8053 1.46216 52.2766 1.46216" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <path d="M40.2583 25.9608C42.7236 23.8037 49.1332 21.246 55.0499 28.272" stroke="#808080" stroke-width="2" stroke-linecap="round" />
               <circle cx="46.7293" cy="32.8944" r="1.84895" fill="#808080" />
               <circle cx="22.6932" cy="8.85798" r="1.84895" fill="#808080" />
               <path d="M31.0136 35.6679L19.9199 24.5742" stroke="#808080" stroke-width="2" stroke-linecap="round" />
            </svg>
            Eventos
         </a>
      </nav>
      <div class="presentation-form-content">
         <form class="form1 visible">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="hospedagem">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-hospedagem.svg" alt="icon map">
                        Tipo da Hospedagem
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Hospedagem 1</li>
                           <li>Hospedagem 2</li>
                           <li>Hospedagem 3</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="">
                     Palavra-chave
                  </label>
                  <input type="text" placeholder="Digite aqui">
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkin.svg" alt="">
                     Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
               </div>
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkout.svg" alt="">
                     Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
               </div>
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form2">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-type-space.svg" alt="icon map">
                        Tipo do Espaço
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Espaço 1</li>
                           <li>Espaço 2</li>
                           <li>Espaço 3</li>
                           <li>Espaço 4</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="">
                     Palavra-chave
                  </label>
                  <input type="text" placeholder="Digite aqui">
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkin.svg" alt="">
                     Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
               </div>
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkout.svg" alt="">
                     Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
               </div>
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form3">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="hospedagem">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-loja-temp.svg" alt="icon map">
                        Tipo da Loja Temporária
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Hospedagem 1</li>
                           <li>Hospedagem 2</li>
                           <li>Hospedagem 3</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box-select j-box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-area-util.svg" alt="icon map">
                        Área Útil
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>200 m²</li>
                           <li>250 m²</li>
                           <li>340 m²</li>
                        </ul>
                     </div>
                  </div>
               </div>

            </div>
            <div class="box-select mb-10">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="icon keyword">
                     Palavra-chave
                  </div>
               </label>
               <input type="text" placeholder="palavra-chave">
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form4">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="hospedagem">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-prestador-servico.svg" alt="icon map">
                        Tipo do Prestador de Serviço
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Hospedagem 1</li>
                           <li>Hospedagem 2</li>
                           <li>Hospedagem 3</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="icon keyword">
                        Palavra-chave
                     </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
               </div>
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form5">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="hospedagem">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-hospedagem-2.svg" alt="icon map">
                        Tipo da Hospedagem
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Hospedagem 1</li>
                           <li>Hospedagem 2</li>
                           <li>Hospedagem 3</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="icon keyword">
                        Palavra-chave
                     </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkin.svg" alt="">
                     Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
               </div>
               <div class="input-group">
                  <label for="keyword">
                     <img src="<?= PATHSITE ?>assets/images/icon-checkout.svg" alt="">
                     Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
               </div>
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form6">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-venda-aluguel.svg" alt="icon map">
                        Venda/Aluguel
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Aluguel 1</li>
                           <li>Aluguel 2</li>
                           <li>Venda 1</li>
                           <li>Venda 1</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="icon keyword">
                        Palavra-chave
                     </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
               </div>
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
         <form class="form7">
            <div class="box-select mb-10 j-box-select">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="icon map">
                     Cidade
                  </div>
                  <button class="j-btn-select">
                     <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
               </label>
               <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <ul class="dropdown-select">
                        <li>Couto de Magalhães</li>
                        <li>Diamantina</li>
                        <li>Curvelo</li>
                        <li>Montes Claros</li>
                        <li>Belo Horizonte</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="input-group-wraper mb-10">
               <div class="box-select j-box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-evento.svg" alt="icon map">
                        Tipo do Evento
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Busque por cidade">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>Evento 1</li>
                           <li>Evento 2</li>
                           <li>Evento 3</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box-select j-box-select">
                  <label for="cities">
                     <div>
                        <img src="<?= PATHSITE ?>assets/images/icon-data.svg" alt="icon map">
                        Data
                     </div>
                     <button class="j-btn-select">
                        <img src="<?= PATHSITE ?>assets/images/icon-selector.svg" alt="icon dropdown">
                     </button>
                  </label>
                  <div class="select">
                     <input type="text" placeholder="Selecione">
                     <div class="select-list">
                        <ul class="dropdown-select">
                           <li>04/08/2023</li>
                           <li>05/08/2023</li>
                           <li>06/08/2023</li>
                           <li>07/08/2023</li>
                           <li>08/08/2023</li>
                           <li>09/08/2023</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="box-select mb-10">
               <label for="cities">
                  <div>
                     <img src="<?= PATHSITE ?>assets/images/icon-keyword.svg" alt="icon keyword">
                     Palavra-chave
                  </div>
               </label>
               <input type="text" placeholder="palavra-chave">
            </div>
            <a href="#" class="more-filters">
               <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328" />
               </svg>
               <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327" />
               </svg>
               Mais filtros
            </a>
            <button class="btn-primary" type="submit">Buscar</button>
         </form>
      </div>
   </div>
</div>

<a href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z" data-fancybox class="btn-maps-mobile">
   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1 5.34737C1 4.15952 1 3.5656 1.30539 3.21919C1.41381 3.0962 1.54559 2.99776 1.69245 2.93005C2.1061 2.73932 2.64974 2.92714 3.73701 3.30276C4.56709 3.58954 4.98214 3.73293 5.40152 3.71808C5.55555 3.71263 5.70867 3.69138 5.85866 3.65463C6.26704 3.55459 6.63103 3.30307 7.35911 2.80003L8.43423 2.05712C9.36687 1.41275 9.83314 1.09057 10.3684 1.01628C10.9037 0.941984 11.4353 1.12566 12.4986 1.49301L13.4045 1.80598C14.1745 2.07201 14.5595 2.20502 14.7798 2.52169C15 2.83836 15 3.25898 15 4.10023V10.6527C15 11.8405 15 12.4344 14.6946 12.7808C14.5862 12.9039 14.4544 13.0023 14.3075 13.07C13.8939 13.2607 13.3503 13.0729 12.263 12.6972C11.4329 12.4105 11.0179 12.2671 10.5985 12.2819C10.4445 12.2874 10.2913 12.3086 10.1414 12.3454C9.73297 12.4454 9.36897 12.6969 8.64089 13.2L7.56577 13.9429C6.63313 14.5873 6.16686 14.9095 5.63161 14.9837C5.09635 15.058 4.5647 14.8743 3.5014 14.507L2.59547 14.194C1.82545 13.928 1.44043 13.795 1.22022 13.4783C1 13.1616 1 12.741 1 11.8997V5.34737Z" stroke="white" stroke-width="1.5" />
      <path d="M5.6665 4.11133V15.0002" stroke="white" stroke-width="1.5" />
      <path d="M10.3335 1V11.8889" stroke="white" stroke-width="1.5" />
   </svg>
   Mapa
</a>

<script>
   // Controla modal de mapa
   const btnMaps = document.querySelector('.btn-maps-mobile')
   btnMaps.addEventListener('click', (e) => {
      e.preventDefault()
      Fancybox.show([{
         src: "https://www.google.com/maps/@51.5039653,-0.1246493,14.12z",
         width: 800,
         height: 600,
      }, ]);
   })
</script>