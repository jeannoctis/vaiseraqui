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
         <? if ($alugueisParaTemporada) { ?>
            <div class="left-space">

               <!-- Destaque maior -->
               <? if ($alugueisEmAlta['grande']) {
                   $alugueisEmAlta['grande']->tipo = 'aluguel-para-temporada';
                  echo view("templates/aluguel-para-temporada-destaque-grande-card.php", (array)$alugueisEmAlta['grande']);
               } ?>

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
                  <? foreach ($alugueisEmAlta as $item) {
                      ?>
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


