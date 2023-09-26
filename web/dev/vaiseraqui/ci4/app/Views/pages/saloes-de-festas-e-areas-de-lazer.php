  <main>
    <section class="s-with-maps" id="areas">      
      <div class="column" data-aos="fade-right">
        <header class="s-with-maps-header">
          <div class="left-space">
            <nav class="box-breadcrumbs">
              <span>Início</span>
              <img src="<?= PATHSITE ?>assets/images/icon-bread-crumbs.svg" alt="">
              <a href="#">Salões de Festa e Áreas de Lazer</a>
            </nav>
            <span class="result"><?= count($saloes) ?> salões de festa e áreas de lazer encontradas</span>
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
               <? } ?>
               <div class="list-articles">               
                  <!-- Listagem comumn -->
                  <? foreach ($saloes as $salao) {

                        $salao->tipo =  $segments[0]; // 'salao-de-festa-e-area-de-lazer';
                     echo view("templates/aluguel-para-temporada-card.php", (array)$salao);
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
          <? if($emAlta) {          
                ?>
    <section class="s-title-and-list-cards" id="servicos-destaque">
      <div class="container-medium">
        <header data-aos="fade-up">
          <h2>Mais destaques</h2>
          <p>Conheça mais destaques na sua região</p>
        </header>
      </div>
      <div class="list ">                                  
        <div class="swiper imoveisSwiper">
          <div class="swiper-wrapper">
              <? foreach($emAlta as $ind => $destaque) {
                  if($ind) {
                  ?>
            <div class="swiper-slide">
              <article class="card-services" data-aos="fade-right">
                    <a href="<?=PATHSITE?><?=$segments[0]?>/<?=$destaque->identificador?>/">
                <div class="cover">        
                  <span class="button-category">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756"/>
                      <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756"/>
                    </svg>                                   
                    Em Alta
                  </span>                 
                    <? if($destaque->fotos) {?>
                  <div class="swiper swiper-card">
                    <div class="swiper-wrapper">
                           <? foreach($destaque->fotos as $foto) {?>
                  <div class="swiper-slide">
                      <img src="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?>/<?=$foto->arquivo?>" alt="">
                  </div>
                   <? } ?>       
              
                    </div>
                    <div class="swiper-pagination"></div>                  
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>                  
                  </div>
                    <? } ?>
                </div>
              
                  <div class="info">
                    <span class="type"><?=$destaque->categoria?></span>
                    <strong class="title"><?=$destaque->titulo?></strong>
                    <span class="uf"><?=$destaque->cidade?></span>
                    <p><?=$destaque->descricao?></p>
                    
                      <span href="#" onclick="favoritar(<?= $destaque->id ?>)" href="#" class="icon-heart <?= (in_array($destaque->id, $todosFavoritos)) ? 'active' : '' ?>" data-id-heart="<?= $destaque->id ?>">
                      <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                      </svg>
                      <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                      </svg>
                    </span>
                  </div>
                </a>                    
              </article>
            </div>    
              <? } } ?> 
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="navigation-swiper-blog only-mobile" data-aos="fade-up">
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

<a href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z" data-fancybox class="btn-maps-mobile">
  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 5.34737C1 4.15952 1 3.5656 1.30539 3.21919C1.41381 3.0962 1.54559 2.99776 1.69245 2.93005C2.1061 2.73932 2.64974 2.92714 3.73701 3.30276C4.56709 3.58954 4.98214 3.73293 5.40152 3.71808C5.55555 3.71263 5.70867 3.69138 5.85866 3.65463C6.26704 3.55459 6.63103 3.30307 7.35911 2.80003L8.43423 2.05712C9.36687 1.41275 9.83314 1.09057 10.3684 1.01628C10.9037 0.941984 11.4353 1.12566 12.4986 1.49301L13.4045 1.80598C14.1745 2.07201 14.5595 2.20502 14.7798 2.52169C15 2.83836 15 3.25898 15 4.10023V10.6527C15 11.8405 15 12.4344 14.6946 12.7808C14.5862 12.9039 14.4544 13.0023 14.3075 13.07C13.8939 13.2607 13.3503 13.0729 12.263 12.6972C11.4329 12.4105 11.0179 12.2671 10.5985 12.2819C10.4445 12.2874 10.2913 12.3086 10.1414 12.3454C9.73297 12.4454 9.36897 12.6969 8.64089 13.2L7.56577 13.9429C6.63313 14.5873 6.16686 14.9095 5.63161 14.9837C5.09635 15.058 4.5647 14.8743 3.5014 14.507L2.59547 14.194C1.82545 13.928 1.44043 13.795 1.22022 13.4783C1 13.1616 1 12.741 1 11.8997V5.34737Z" stroke="white" stroke-width="1.5" />
    <path d="M5.6665 4.11133V15.0002" stroke="white" stroke-width="1.5" />
    <path d="M10.3335 1V11.8889" stroke="white" stroke-width="1.5" />
  </svg>
  Mapa
</a>

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
            <path d="M2 2L15.5 14L29 2" stroke="#404041" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>              
          <svg class="active" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
            <g fill="#404041" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M4.99023,3.99023c-0.40692,0.00011 -0.77321,0.24676 -0.92633,0.62377c-0.15312,0.37701 -0.06255,0.80921 0.22907,1.09303l6.29297,6.29297l-6.29297,6.29297c-0.26124,0.25082 -0.36647,0.62327 -0.27511,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27511l6.29297,-6.29297l6.29297,6.29297c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-6.29297,-6.29297l6.29297,-6.29297c0.29576,-0.28749 0.38469,-0.72707 0.22393,-1.10691c-0.16075,-0.37985 -0.53821,-0.62204 -0.9505,-0.60988c-0.2598,0.00774 -0.50638,0.11632 -0.6875,0.30273l-6.29297,6.29297l-6.29297,-6.29297c-0.18827,-0.19353 -0.4468,-0.30272 -0.7168,-0.30273z"></path></g></g>
          </svg>
        </button>
      </header>
      <nav class="presentation-form-menu">     
        <a href="#" data-form="form4">
          <svg class="isActive" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29 16H3" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M26 15.4827C25.7619 12.0984 23.4048 5.26521 15.881 5.00654C8.35714 4.74787 6.15873 12.2277 6 16" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M10.4915 27.5106H19.1202C19.6069 27.4468 20.5804 26.9745 20.5804 25.5957C20.5804 24.217 19.6069 23.6596 19.1202 23.5532H13.412C12.8367 22.7021 10.757 21 7.04006 21C3.3231 21 1.46462 22.9574 1 23.9362V33H16.2661C17.0626 32.9787 19.1335 32.6681 21.045 31.5957C22.9566 30.5234 29.2312 26.9362 32.1295 25.2766C32.7048 24.9787 33.5765 23.9745 32.4614 22.3404C31.6118 21.166 30.3374 21.383 29.8064 21.6383L20.8459 25.5957" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <rect width="2" height="3" transform="matrix(-1 0 0 1 17 2)" fill="white"/>
            <rect width="6" height="3" rx="1.5" transform="matrix(-1 0 0 1 19 0)" fill="white"/>
          </svg>              
            
          <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29 16H3" stroke="#808080" stroke-width="2" stroke-linecap="round"/>
            <path d="M26 15.4827C25.7619 12.0984 23.4048 5.26521 15.881 5.00654C8.35714 4.74787 6.15873 12.2277 6 16" stroke="#808080" stroke-width="2" stroke-linecap="round"/>
            <path d="M10.4915 27.5106H19.1202C19.6069 27.4468 20.5804 26.9745 20.5804 25.5957C20.5804 24.217 19.6069 23.6596 19.1202 23.5532H13.412C12.8367 22.7021 10.757 21 7.04006 21C3.3231 21 1.46462 22.9574 1 23.9362V33H16.2661C17.0626 32.9787 19.1335 32.6681 21.045 31.5957C22.9566 30.5234 29.2312 26.9362 32.1295 25.2766C32.7048 24.9787 33.5765 23.9745 32.4614 22.3404C31.6118 21.166 30.3374 21.383 29.8064 21.6383L20.8459 25.5957" stroke="#808080" stroke-width="2" stroke-linecap="round"/>
            <rect width="2" height="3" transform="matrix(-1 0 0 1 17 2)" fill="#808080"/>
            <rect width="6" height="3" rx="1.5" transform="matrix(-1 0 0 1 19 0)" fill="#808080"/>
          </svg>              
          Prestadores de <br>
          Serviços
        </a>        
      </nav>
      <div class="presentation-form-content">       
         <? echo View("templates/form2", (array) $tipoAtual) ?>        
      </div>        
    </div>
  </div>