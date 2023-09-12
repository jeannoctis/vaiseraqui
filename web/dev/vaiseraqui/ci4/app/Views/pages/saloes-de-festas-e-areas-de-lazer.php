  <main>
    <section class="s-with-maps" id="areas">      
      <div class="column" data-aos="fade-right">
        <header class="s-with-maps-header">
          <div class="left-space">
            <nav class="box-breadcrumbs">
              <span>Início</span>
              <img src="<?=PATHSITE?>assets/images/icon-bread-crumbs.svg" alt="">
              <a href="#">Salões de Festa e Áreas de Lazer</a>
            </nav>
            <span class="result"><?=count($saloes)?> salões de festa e áreas de lazer encontradas</span>
             <?= view("templates/order-filter", $get) ?>
          </div>
        </header>
          <? if ($emAlta) {
              ?>
            <div class="left-space">

               <!-- Destaque maior -->
               <? if ($emAlta[0]) {
                   $emAlta[0]->tipo = 'salao-de-festa-e-area-de-lazer';
                  echo view("templates/aluguel-para-temporada-destaque-grande-card.php", (array)$emAlta[0]);
               } ?>

               <div class="list-articles">
                  <? if ($emAlta) { ?>
                     <!-- Destaque menores -->
                     <? foreach ($emAlta as $alta) {
                         $alta->tipo = 'salao-de-festa-e-area-de-lazer';
                        echo view("templates/aluguel-para-temporada-destaque-card.php", (array)$alta);
                     } ?>
                  <? } ?>

                  <!-- Listagem comumn -->
                  <? foreach ($saloes as $salao) {
                        $salao->tipo = 'salao-de-festa-e-area-de-lazer';
                     echo view("templates/aluguel-para-temporada-card.php", (array)$salao);
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
     <? if($destaques) {           
             echo View('templates/prestadores-servico');
         } ?>
  </main>

<a href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z" data-fancybox class="btn-maps-mobile">
  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 5.34737C1 4.15952 1 3.5656 1.30539 3.21919C1.41381 3.0962 1.54559 2.99776 1.69245 2.93005C2.1061 2.73932 2.64974 2.92714 3.73701 3.30276C4.56709 3.58954 4.98214 3.73293 5.40152 3.71808C5.55555 3.71263 5.70867 3.69138 5.85866 3.65463C6.26704 3.55459 6.63103 3.30307 7.35911 2.80003L8.43423 2.05712C9.36687 1.41275 9.83314 1.09057 10.3684 1.01628C10.9037 0.941984 11.4353 1.12566 12.4986 1.49301L13.4045 1.80598C14.1745 2.07201 14.5595 2.20502 14.7798 2.52169C15 2.83836 15 3.25898 15 4.10023V10.6527C15 11.8405 15 12.4344 14.6946 12.7808C14.5862 12.9039 14.4544 13.0023 14.3075 13.07C13.8939 13.2607 13.3503 13.0729 12.263 12.6972C11.4329 12.4105 11.0179 12.2671 10.5985 12.2819C10.4445 12.2874 10.2913 12.3086 10.1414 12.3454C9.73297 12.4454 9.36897 12.6969 8.64089 13.2L7.56577 13.9429C6.63313 14.5873 6.16686 14.9095 5.63161 14.9837C5.09635 15.058 4.5647 14.8743 3.5014 14.507L2.59547 14.194C1.82545 13.928 1.44043 13.795 1.22022 13.4783C1 13.1616 1 12.741 1 11.8997V5.34737Z" stroke="white" stroke-width="1.5" />
    <path d="M5.6665 4.11133V15.0002" stroke="white" stroke-width="1.5" />
    <path d="M10.3335 1V11.8889" stroke="white" stroke-width="1.5" />
  </svg>
  Mapa
</a>