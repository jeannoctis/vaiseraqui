<style>
  main {
    overflow-x: hidden;
  }
</style>

<main>
  <div class="overlay-full"></div>

  <div style="background-image:url('<?= PATHSITE ?>uploads/banner/<?= $banner1->arquivo ?>')" class="presentation">
    <div action="#" class="presentation-form j-filter-modal-container">

      <header>
        <h2>
          <div class="wraper-icon">
            <img src="assets/images/icon-search-box.svg" alt="icon search">
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

      <? if ($tipos) { ?>
        <nav class="presentation-form-menu">
          <? foreach ($tipos as $ind => $tipo) { ?>
            <a href="#" class="<?= ($ind) ? '' : 'active' ?>" data-form="form<?= $tipo->id ?>">

              <img src='<?= PATHSITE ?>uploads/tipo/<?= $tipo->arquivo ?>' />

              <?= $tipo->titulo ?>
            </a>
          <? } ?>
        </nav>
      <? } ?>

      <div class="presentation-form-content">
        <? foreach ($tipos as $ind => $tipo) {

          switch ($tipo->tipo) {
            case 'ALUGUEL':
              $idForm = 1;
              break;
            case 'SALOES':
              $idForm = 2;
              break;
            case 'HOSPEDAGEM':
              $idForm = 5;
              break;
            case 'LOJAS':
              $idForm = 3;
              break;
            case 'EVENTOS':
              $idForm = 7;
              break;
            case 'PRESTADORES':
              $idForm = 4;
              break;
          }
          $tipo = (array) $tipo;
          if (!$ind) {
            $tipo["form{$idForm}Visible"] = 'visible';
          }
        ?>
          <? echo View("templates/form{$idForm}", $tipo) ?>
        <? } ?>
      </div>

    </div>
    <div class="cover only-mobile">
      <img src="<?= PATHSITE ?>uploads/banner/<?= $banner1->arquivo2 ?>" alt="">
    </div>
  </div>

  <section class="s-spaces my-spaces" id="espacos">
    <div class="container-medium">
      <header data-aos="fade-up">
        <h2>Espaços</h2>
        <strong><?= $txSecaoEspacos->descricao ?></strong>

        
        <div class="wraper-scroll">
          <nav class="menu-abas">
              <? if($destaqueEmAlta){?>
            <a onclick="carregaDestaques(<?=$destaqueEmAlta->id?>,0)" href="#" class="active" data-btn="alta">
              <svg class="active" width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5543 0.164195C9.9072 0.564165 7.29027 2.26645 4.82664 5.10643C2.36342 7.94594 0 11.9865 0 17.0402H1.71429C1.71429 12.5413 3.8166 8.88311 6.12345 6.22387C8.42991 3.56507 10.8874 1.96864 11.4578 1.61625L10.5543 0.164195ZM16.7364 5.41109C14.6535 2.45175 12.3828 0.662628 11.7881 0.219381L10.7614 1.58769C11.2723 1.96838 13.3908 3.63279 15.3331 6.39228L16.7364 5.41109ZM17.1425 6.42845C17.7207 5.675 18.2052 5.19578 18.4251 4.99172L17.2567 3.74149C16.9778 4.00039 16.4261 4.54977 15.7809 5.39047L17.1425 6.42845ZM17.5728 4.98975C18.3427 5.70389 22.2857 9.71898 22.2857 17.0385H24C24 9.05943 19.6946 4.62392 18.7407 3.73908L17.5728 4.98975ZM22.2857 17.0385V17.0402H24V17.0385H22.2857ZM22.2857 17.0402C22.2857 18.3864 22.0197 19.7195 21.5028 20.9632L23.0866 21.617C23.6895 20.166 24 18.6109 24 17.0402H22.2857ZM21.5028 20.9632C20.9858 22.207 20.2282 23.337 19.273 24.289L20.4852 25.4971C21.5997 24.3866 22.4835 23.0681 23.0866 21.617L21.5028 20.9632ZM19.273 24.289C18.318 25.2409 17.1842 25.996 15.9362 26.5112L16.5922 28.0897C18.0482 27.4886 19.3709 26.6077 20.4852 25.4971L19.273 24.289ZM15.9362 26.5112C14.6882 27.0263 13.3507 27.2915 12 27.2915V29C13.5759 29 15.1363 28.6908 16.5922 28.0897L15.9362 26.5112ZM12 27.2915C10.6493 27.2915 9.31183 27.0263 8.06383 26.5112L7.40781 28.0897C8.86372 28.6908 10.4241 29 12 29V27.2915ZM8.06383 26.5112C6.81592 25.996 5.68202 25.2409 4.7269 24.289L3.51471 25.4971C4.62902 26.6077 5.9519 27.4886 7.40781 28.0897L8.06383 26.5112ZM4.7269 24.289C3.77179 23.337 3.01414 22.207 2.49723 20.9632L0.91344 21.617C1.51651 23.0681 2.40041 24.3866 3.51471 25.4971L4.7269 24.289ZM2.49723 20.9632C1.98033 19.7195 1.71429 18.3864 1.71429 17.0402H0C0 18.6109 0.310388 20.166 0.91344 21.617L2.49723 20.9632ZM18.4251 4.99172C18.1978 5.20275 17.8219 5.22078 17.5728 4.98975L18.7407 3.73908C18.3099 3.33949 17.6657 3.36178 17.2567 3.74149L18.4251 4.99172ZM15.3331 6.39228C15.7714 7.01519 16.686 7.02341 17.1425 6.42845L15.7809 5.39047C16.021 5.07749 16.5026 5.07877 16.7364 5.41109L15.3331 6.39228ZM11.4578 1.61625C11.233 1.75516 10.9536 1.73086 10.7614 1.58769L11.7881 0.219381C11.4353 -0.0435805 10.9497 -0.0801433 10.5543 0.164195L11.4578 1.61625Z" fill="#404041" />
                <path d="M11.3209 13.2098C10.8232 13.5561 9.26867 14.691 7.83048 16.3154C6.40636 17.9241 5.00002 20.1214 5 22.578H6.75009C6.75011 20.6676 7.86076 18.8279 9.18887 17.3277C10.5029 15.8433 11.9357 14.7973 12.3784 14.4891L11.3209 13.2098ZM18.9983 22.4356C18.9447 20.0138 17.54 17.8521 16.1276 16.2682C14.7015 14.6691 13.1722 13.5529 12.679 13.2098L11.6215 14.4891C12.0599 14.794 13.4693 15.8231 14.7733 17.285C16.0906 18.7624 17.207 20.5778 17.2486 22.4681L18.9983 22.4356ZM17.2486 22.4681C17.2495 22.5041 17.25 22.5414 17.25 22.5775H19C19 22.5296 18.9995 22.4831 18.9983 22.4356L17.2486 22.4681ZM17.25 22.5775C17.25 25.2379 14.8996 27.3944 12.0001 27.3944V29C15.8659 29 19 26.1246 19 22.5775H17.25ZM12.0001 27.3944C9.10067 27.3944 6.75034 25.238 6.75009 22.578H5C5.00033 26.1248 8.1343 29 12.0001 29V27.3944ZM5 22.578C5 23.0195 5.38978 23.3808 5.87505 23.3808V21.7752C6.36025 21.7752 6.75009 22.1364 6.75009 22.578H5ZM6.75009 22.578C6.75006 22.1427 6.36714 21.7752 5.87505 21.7752V23.3808C5.383 23.3808 5.00003 23.0131 5 22.578H6.75009ZM12.3784 14.4891C12.1555 14.6444 11.845 14.6446 11.6215 14.4891L12.679 13.2098C12.2769 12.9299 11.7227 12.9302 11.3209 13.2098L12.3784 14.4891Z" fill="#404041" />
              </svg>
              Em Alta
            </a>
              <? } ?>
              <? if($destaquesMaiores) {?>
              <? foreach($destaquesMaiores as $dest) {?>
            <a onclick="carregaDestaques(<?=$dest->id?>,0)" href="#" data-btn="destaque-<?=$dest->id?>">             
              <img height="32" class="active" src="<?=PATHSITE?>uploads/tipo/<?=$dest->arquivo?>" alt="">
                  <?=$dest->titulo?>
            </a>
              <? } ?>
      
          </nav>
        </div>
        <? } ?>
      </header>

      <div class="menu-wraper" data-aos="fade-up">
        <div class="item show" data-modal="alta">
          <div id="conteudoAlta0" class="menu-abas-content">
            
          </div>
        </div>
      </div>
      
    </div>
  </section>

  <section class="s-spaces my-services">
    <div class="container-medium" id="servicos">
      <header data-aos="fade-up">
        <h2>Prestadores de Serviços</h2>
        <strong><?= $txSecaoPrestServicos->descricao ?></strong>

        <div class="wraper-scroll">
          <nav class="menu-abas">
               <? if($destaqueEmAlta2){?>
             <a onclick="carregaDestaques(<?=$destaqueEmAlta2->id?>,1)" href="#" class="active" data-btn="alta">
              <svg class="active" width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5543 0.164195C9.9072 0.564165 7.29027 2.26645 4.82664 5.10643C2.36342 7.94594 0 11.9865 0 17.0402H1.71429C1.71429 12.5413 3.8166 8.88311 6.12345 6.22387C8.42991 3.56507 10.8874 1.96864 11.4578 1.61625L10.5543 0.164195ZM16.7364 5.41109C14.6535 2.45175 12.3828 0.662628 11.7881 0.219381L10.7614 1.58769C11.2723 1.96838 13.3908 3.63279 15.3331 6.39228L16.7364 5.41109ZM17.1425 6.42845C17.7207 5.675 18.2052 5.19578 18.4251 4.99172L17.2567 3.74149C16.9778 4.00039 16.4261 4.54977 15.7809 5.39047L17.1425 6.42845ZM17.5728 4.98975C18.3427 5.70389 22.2857 9.71898 22.2857 17.0385H24C24 9.05943 19.6946 4.62392 18.7407 3.73908L17.5728 4.98975ZM22.2857 17.0385V17.0402H24V17.0385H22.2857ZM22.2857 17.0402C22.2857 18.3864 22.0197 19.7195 21.5028 20.9632L23.0866 21.617C23.6895 20.166 24 18.6109 24 17.0402H22.2857ZM21.5028 20.9632C20.9858 22.207 20.2282 23.337 19.273 24.289L20.4852 25.4971C21.5997 24.3866 22.4835 23.0681 23.0866 21.617L21.5028 20.9632ZM19.273 24.289C18.318 25.2409 17.1842 25.996 15.9362 26.5112L16.5922 28.0897C18.0482 27.4886 19.3709 26.6077 20.4852 25.4971L19.273 24.289ZM15.9362 26.5112C14.6882 27.0263 13.3507 27.2915 12 27.2915V29C13.5759 29 15.1363 28.6908 16.5922 28.0897L15.9362 26.5112ZM12 27.2915C10.6493 27.2915 9.31183 27.0263 8.06383 26.5112L7.40781 28.0897C8.86372 28.6908 10.4241 29 12 29V27.2915ZM8.06383 26.5112C6.81592 25.996 5.68202 25.2409 4.7269 24.289L3.51471 25.4971C4.62902 26.6077 5.9519 27.4886 7.40781 28.0897L8.06383 26.5112ZM4.7269 24.289C3.77179 23.337 3.01414 22.207 2.49723 20.9632L0.91344 21.617C1.51651 23.0681 2.40041 24.3866 3.51471 25.4971L4.7269 24.289ZM2.49723 20.9632C1.98033 19.7195 1.71429 18.3864 1.71429 17.0402H0C0 18.6109 0.310388 20.166 0.91344 21.617L2.49723 20.9632ZM18.4251 4.99172C18.1978 5.20275 17.8219 5.22078 17.5728 4.98975L18.7407 3.73908C18.3099 3.33949 17.6657 3.36178 17.2567 3.74149L18.4251 4.99172ZM15.3331 6.39228C15.7714 7.01519 16.686 7.02341 17.1425 6.42845L15.7809 5.39047C16.021 5.07749 16.5026 5.07877 16.7364 5.41109L15.3331 6.39228ZM11.4578 1.61625C11.233 1.75516 10.9536 1.73086 10.7614 1.58769L11.7881 0.219381C11.4353 -0.0435805 10.9497 -0.0801433 10.5543 0.164195L11.4578 1.61625Z" fill="#404041" />
                <path d="M11.3209 13.2098C10.8232 13.5561 9.26867 14.691 7.83048 16.3154C6.40636 17.9241 5.00002 20.1214 5 22.578H6.75009C6.75011 20.6676 7.86076 18.8279 9.18887 17.3277C10.5029 15.8433 11.9357 14.7973 12.3784 14.4891L11.3209 13.2098ZM18.9983 22.4356C18.9447 20.0138 17.54 17.8521 16.1276 16.2682C14.7015 14.6691 13.1722 13.5529 12.679 13.2098L11.6215 14.4891C12.0599 14.794 13.4693 15.8231 14.7733 17.285C16.0906 18.7624 17.207 20.5778 17.2486 22.4681L18.9983 22.4356ZM17.2486 22.4681C17.2495 22.5041 17.25 22.5414 17.25 22.5775H19C19 22.5296 18.9995 22.4831 18.9983 22.4356L17.2486 22.4681ZM17.25 22.5775C17.25 25.2379 14.8996 27.3944 12.0001 27.3944V29C15.8659 29 19 26.1246 19 22.5775H17.25ZM12.0001 27.3944C9.10067 27.3944 6.75034 25.238 6.75009 22.578H5C5.00033 26.1248 8.1343 29 12.0001 29V27.3944ZM5 22.578C5 23.0195 5.38978 23.3808 5.87505 23.3808V21.7752C6.36025 21.7752 6.75009 22.1364 6.75009 22.578H5ZM6.75009 22.578C6.75006 22.1427 6.36714 21.7752 5.87505 21.7752V23.3808C5.383 23.3808 5.00003 23.0131 5 22.578H6.75009ZM12.3784 14.4891C12.1555 14.6444 11.845 14.6446 11.6215 14.4891L12.679 13.2098C12.2769 12.9299 11.7227 12.9302 11.3209 13.2098L12.3784 14.4891Z" fill="#404041" />
              </svg>
              Em Alta
            </a>
               <? } ?>
                  <? if($destaquesPrestadores) {?>
              <? foreach($destaquesPrestadores as $dest) {?>
            <a onclick="carregaDestaques(<?=$dest->id?>,1)" href="#" data-btn="destaque-<?=$dest->id?>">             
              <img height="32" class="active" src="<?=PATHSITE?>uploads/produto_categoria/<?=$dest->arquivo?>" alt="">
                  <?=$dest->titulo?>
            </a>
              <? } ?>
      
          </nav>
        </div>
        <? } ?>   
          </header>
      
   
      <div id="conteudoAlta1" class="menu-wraper" data-aos="fade-up">
        
    </div>
         </div>

  </section>

  <div class="plan-and-ads">
    <div class="container-medium">

      <div class="item card-clicked" data-aos="fade-right" style="background-image: linear-gradient(1deg, #000 17.47%, rgba(0, 0, 0, 0.00) 69.85%), url(<?= PATHSITE ?>uploads/texto/<?= $txConviteAnunciante1->arquivo ?>);">
        <h2><?= $txConviteAnunciante1->titulo ?></h2>
        <p><?= $txConviteAnunciante1->descricao ?></p>
        <a href="<?= $txConviteAnunciante1->link ?>" class="btn-primary"><?= $txConviteAnunciante1->botao ?></a>
      </div>

      <div class="item card-clicked" data-aos="fade-left" style="background-image: linear-gradient(1deg, #000 17.47%, rgba(0, 0, 0, 0.00) 69.85%), url(<?= PATHSITE ?>uploads/texto/<?= $txConviteAnunciante2->arquivo ?>);">
        <h2><?= $txConviteAnunciante2->titulo ?></h2>
        <p><?= $txConviteAnunciante2->descricao ?></p>
        <a href="<?= $txConviteAnunciante2->link ?>" class="btn-primary"><?= $txConviteAnunciante2->botao ?></a>
      </div>
    </div>
  </div>

  <a href="<?= $anuncioBanner->link ?>">
    <div class="banner-zinho" data-aos="fade-up">
      <div class="container-medium">
        <picture>
          <source srcset="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerH->arquivo2 ?>.webp" type="image/webp">
          <img src="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerH->arquivo2 ?>" class="only-mobile">
        </picture>

        <picture>
          <source srcset="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerH->arquivo ?>.webp" type="image/webp">
          <img src="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerH->arquivo ?>">
        </picture>
      </div>
    </div>
  </a>

  <section class="s-callendar my-callendar" id="eventos">
    <div class="container-medium">
      <header data-aos="fade-up">
        <h2>Calendário de Eventos</h2>
        <p><?= $txSecaoEventos->descricao ?></p>
      </header>
    </div>
    <div class="container-medium">
      <div class="calendar-swiper-navigation-wraper" data-aos="fade-up">
        <div class="swiper box-days menu-abas swiper-agenda">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a onclick="eventosData('<?= date("Y-m-d") ?>')" href="#" class="active" data-btn="<?= $dia->data ?>">
                <span class="name"><?= semana(date("Y-m-d")) ?></span>
                <span class="day"><?= date("d") ?></span>
                <span class="month"><?= mes(date("m")) ?></span>
              </a>
            </div>
            <? foreach ($diasMes as $ind => $dia) {
              $diaAtual =  explode("-", $dia->data); ?>
              <div class="swiper-slide">
                <a onclick="eventosData('<?= $dia->data ?>')" href="#" class="" data-btn="<?= $dia->data ?>">
                  <span class="name"><?= semana($dia->data) ?></span>
                  <span class="day"><?= $diaAtual[2] ?></span>
                  <span class="month"><?= mes($diaAtual[1]) ?></span>
                </a>
              </div>
            <? } ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <button class="prev">
          <svg class="active" width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 13.5L12 25" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 13.5L12 25" stroke="#BBBBBB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
        <button class="next active">
          <svg class="active" width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 25L12 13.5L2 2" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 25L12 13.5L2 2" stroke="#BBBBBB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <a style="display: none;" href="#" class="btn-primary d-none" data-aos="fade-up">
        <img src="assets/images/icon-calendar.svg" alt="Icon calendar">
        visualizar calendário
      </a>
      <div id="categoria-eventos" class="menu-wraper" data-aos="fade-up">
      </div>
    </div>
  </section>

  <? if ($blogs) { ?>
    <section class="s-blog ">
      <div class="container-medium">
        <header data-aos="fade-up">
          <h2><?= $txSecaoBlog->titulo ?></h2>
          <p><?= $txSecaoBlog->descricao ?></p>
        </header>
      </div>
      <div class="list-posts list-of-swiper" data-aos="fade-up">
        <div class="swiper blogSwiper">
          <div class="swiper-wrapper">
            <? foreach ($blogs as $blog) { ?>
              <div class="swiper-slide">
                <a href="<?= PATHSITE ?>blog/<?= $blog->identificador ?>/">
                  <article class="blog-post-medium">
                    <div class="cover">
                      <img src="<?= PATHSITE ?>uploads/blog/<?= $blog->arquivo ?>" alt="">
                      <a href="#" class="category"><?= $blog->categoria ?></a>
                    </div>
                    <div class="info">
                      <h3><?= $blog->titulo ?></h3>
                      <p class="chamada"><?= $blog->chamada ?></p>
                      <a href="<?= PATHSITE ?>blog/<?= $blog->identificador ?>/" class="more">
                        Ler artigo
                        <svg class="active" width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 10L5 5.5L1 0.999999" stroke="#C82328" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 10L5 5.5L1 0.999999" stroke="#932327" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </a>
                    </div>
                  </article>
                </a>
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
      <a href="<?= PATHSITE ?>blog/" class="btn-primary" data-aos="fade-up">Ver todos os artigos</a>
    </section>
  <? } ?>

  <?= view("templates/contato-form", (array)$txSecaoContato) ?>

</main>