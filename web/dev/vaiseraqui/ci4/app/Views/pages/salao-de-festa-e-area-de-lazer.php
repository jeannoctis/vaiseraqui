  <style>    
    @media screen and (max-width: 769px) {
    .internal-rent .more-about-2-column .container-medium .column:first-of-type>article .list-items {
          margin-top: 0 !important;
          margin-bottom: 0 !important;
      }

      .internal-rent .s-service .list {
        padding-left: 20px;
        width: 100%;
      }
    }
  </style>
  
  <main>
    <section class="s-text-and-slider">
      <div class="info" data-aos="fade-right">
        <div>
          <span class="type"><?=$metatag->categoria?></span>
          <h1><?=$metatag->titulo?></h1>
          <span class="location"><?=$metatag->cidade?>-<?=$metatag->estado?></span>
          <div class="desc">
            <p><?=$metatag->descricao?></p>
          </div>
        </div>

        <footer>
          <div class="price">
            <span>diárias a partir de</span>
            <span class="value">R$<?=number_format($metatag->preco,2,',','.')?></span>
          </div>
          <div class="buttons">
                  <? if($anunciante->whatsapp) {?>
            <a target='_blank' onclick="abreWhatsapp('<?=encode($metatag->id)?>');" href="<?=$anunciante->whatsapp?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?=$metatag->titulo?>" class="btn-primary">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"/>
              </svg>                
              Agendar
            </a>
                  <? } ?>
            <a href="#inicio">Ver mais detalhes</a>
          </div>
        </footer>
      </div>
      <div class="slider" data-aos="fade-left">
        <div class="top">
          <a href="#" class="goback">
            <svg class="active" width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 1L1 6.5L6 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 1L1 6.5L6 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </a>
          <a href="#" class="share">
            <svg class="active" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_606_3393)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_606_3393">
              <rect width="22" height="22" fill="white"/>
              </clipPath>
              </defs>
            </svg>  
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_606_3393)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="#404041"/>
              </g>
              <defs>
              <clipPath id="clip0_606_3393">
              <rect width="22" height="22" fill="white"/>
              </clipPath>
              </defs>
            </svg>                  
          </a>
          <a href="#" class="like <?= (in_array($metatag->id, $todosFavoritos)) ? 'active' : '' ?>" onclick="favoritar(<?= $metatag->id ?>)" data-id-heart="<?= $metatag->id ?>">
            <svg class="active" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="white"/>
            </svg>                  
            <svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="#404041"/>
            </svg>                  
          </a>
        </div>
        <div class="bottom">
          <div>
            <a href="#" class="btn photo">
              <img src="<?=PATHSITE?>assets/images/icon-photo.png" alt="">
              <?=count($fotos)?> Fotos
            </a>
              <? if($videos) {?>
            <a onclick="verVideos();" class="btn btn-videos" >
              <img class="active" src="<?=PATHSITE?>assets/images/icon-video-active.png" alt="">
              <img src="<?=PATHSITE?>assets/images/icon-video.png" alt="">
              Vídeos
            </a>
              <? } ?>
              <? if($metatag->mapa) {?>
            <a onclick="clicaMapa('<?=$metatag->mapa?>')" data-fancybox class="btn btn-maps" >
              <img class="active" src="<?=PATHSITE?>assets/images/icon-map-active.png" alt="">
              <img src="<?=PATHSITE?>assets/images/icon-map.png" alt="">
              Mapa
            </a>
              <? } ?>
          </div>
        </div>
        <div class="box-presentation only-mobile">
          <div class="description">
            <span class="tagline"><?=$metatag->categoria?></span>
            <strong class="title"><?=$metatag->titulo?></strong>
            <span class="uf"><?=$metatag->cidade?>-<?=$metatag->estado?></span>
          </div>
             <? if($fotos) {
                foreach($fotos as $foto) {
                ?>
          <a data-fslightbox="presentation-1" href="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?><?=$foto->arquivo?>">
            <img class="mode-slide" src="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?>/<?=$foto->arquivo?>" alt="">
          </a>
            <? } } ?>        
        </div>
            <? if($fotos) { ?>
        <div class="swiper presentationSwiper">
          <div class="swiper-wrapper">
              <?    foreach($fotos as $foto) { ?>
            <div class="swiper-slide">
              <div class="item"> 
                <a data-fslightbox="presetation-1" href="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?>/<?=$foto->arquivo?>">
                  <img src="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?>/<?=$foto->arquivo?>" alt="">
                </a>           
              </div>
            </div>
              <? } ?>
          </div> 
          <div class="navigation-swiper-blog">
            <button class="prev">
              <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 6.5L7 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>              
              <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>              
            </button>
            <button class="next active">
              <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>              
              <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>              
            </button>
          </div>         
        </div>
            <? } ?>
      </div>
    </section>
    <section class="more-about-2-column">
      <div class="container-medium">
        <div class="column">
          <nav id="inicio" class="navigation-breadcrumb" data-aos="fade-up">
            <a href="#">Início</a>
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            <a href="<?=PATHSITE?>saloes-de-festa-e-areas-de-lazer/">Salões de Festa e Área de Lazer</a>
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            <a href="#"><?=$metatag->cidade?></a>
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>            
            <a href="#"><?=$metatag->titulo?></a>
          </nav>
          <aside class="info-slider" data-aos="fade-up">
            <div class="price">
              <span class="total">Total <?=number_format($metatag->preco,2,'.',',')?></span>
              <span class="rent">Aluguel R$<?=number_format($metatag->preco,2,'.',',')?></span>
            </div>
            <div class="buttons">              
              <a href="#">Ver mais detalhes</a>
            </div>
          </aside>   
          <header class="header-bg" data-aos="fade-up">
            <div class="group-title">
              <strong><?=$metatag->endereco?>,<?=$metatag->numero?></strong>
              <span>Portal das Torres, Maringá</span>
            </div>
          </header>
          <div class="navigation-breadcrumb-mobile" data-aos="fade-up">
            <a href="#">
              <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 1L1 6L6 11" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
               Mais em <?=$metatag->cidade?> - <?=$metatag->estado?></a>
          </div>
          <aside class="info-about-item" data-aos="fade-right">
            <h2>
              <?=$metatag->titulo?>
              <span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_606_3371)">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45817 7.00032C1.45817 5.53058 2.04202 4.12104 3.08129 3.08177C4.12055 2.04251 5.5301 1.45866 6.99984 1.45866C8.46958 1.45866 9.87912 2.04251 10.9184 3.08177C11.9576 4.12104 12.5415 5.53058 12.5415 7.00032C12.5415 8.47007 11.9576 9.87961 10.9184 10.9189C9.87912 11.9581 8.46958 12.542 6.99984 12.542C5.5301 12.542 4.12055 11.9581 3.08129 10.9189C2.04202 9.87961 1.45817 8.47007 1.45817 7.00032ZM6.99984 0.291992C3.29509 0.291992 0.291504 3.29558 0.291504 7.00032C0.291504 10.7051 3.29509 13.7087 6.99984 13.7087C10.7046 13.7087 13.7082 10.7051 13.7082 7.00032C13.7082 3.29558 10.7046 0.291992 6.99984 0.291992ZM6.4165 4.08366C6.4165 3.92895 6.47796 3.78058 6.58736 3.67118C6.69675 3.56178 6.84513 3.50032 6.99984 3.50033C7.15455 3.50032 7.30292 3.56178 7.41231 3.67118C7.52171 3.78058 7.58317 3.92895 7.58317 4.08366V7.00032H9.9165C10.0712 7.00032 10.2196 7.06178 10.329 7.17118C10.4384 7.28058 10.4998 7.42895 10.4998 7.58366C10.4998 7.73837 10.4384 7.88674 10.329 7.99614C10.2196 8.10553 10.0712 8.16699 9.9165 8.16699H6.99984C6.84513 8.16699 6.69675 8.10553 6.58736 7.99614C6.47796 7.88674 6.4165 7.73837 6.4165 7.58366V4.08366Z" fill="#7F7F7F"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_606_3371">
                  <rect width="14" height="14" fill="white"/>
                  </clipPath>
                  </defs>
                </svg>                  
                Publicado há <?= getDateInterval($metatag->dtCriacao)->days ?> dias...
              </span>
            </h2>
            <div class="box-checkin">
              <div class="price">
                <strong>R$<?=number_format($metatag->preco,2,',','.')?></strong>
                <span>diária</span>
              </div>
              <div class="table-checkin">
                <div class="tr">
                  <div class="td">
                    <strong>Check-in</strong>
                    <input readonly="" type="text" id="mobile-table-checkin" placeholder="dd/mm/aaaa" value="">
                  </div>
                  <div class="td">
                    <strong>Checkout</strong>
                    <input disabled readonly="" type="text" id="mobile-table-checkout" placeholder="dd/mm/aaaa" value="">
                  </div>
                </div>
                <div class="tr">
                  <div class="td j-input-order-select" colspan="2">
                    <div class="colspan">
                      <div>
                        <strong>Hóspedes</strong>
                        <div class="modal-order">
                          <input readonly="" type="text" value="1 hóspede">
                          <div class="modal-order-select">
                            <div class="wraper-scroll">
                              <div class="content">
                                    <? 
                                  $i = 1;
                                  while($i <= 5) { ?>
                                <a onclick="$('#campoHospede').val(<?=$i?>); " href="javascript:void();" data-select-value="<?=$i?> hóspede"><?=$i?> hóspede(s)</a>
                                  <? $i++; } ?>    
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button>
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 1L7 7L13 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>                      
                      </button> 
                    </div>                
                  </div>
                </div>
              </div>
                  <? if($anunciante->whatsapp) {?> 
              <a onclick="abreWhatsapp('<?=encode($metatag->id)?>'); agendar('salao-de-festa','<?= PATHSITE . $tipoAtual->identificador . '/' . $metatag->identificador .'/' ?>', '<?=$anunciante->whatsapp?>','mobile');" href="#" class="btn-primary">
                <img src="<?=PATHSITE?>assets/images/icon-whatsapp.svg" alt="">
                Agendar
              </a>
                  <? } ?>
              <table class="resume">
                <tr>
                    <td><span><?=number_format($metatag->preco,2,',','.')?> x <spantss id="quantidadeDias2">1</spantss> diária(s)</span></td>
                  <td id="totalDiarias2"><?=number_format($metatag->preco,2,',','.')?></td>
                </tr>
                  <?
                  $soma = $metatag->preco;
                  if($valores) {
                      foreach($valores as $valor) {
                          $soma+= $valor->valor;
                      ?>
                <tr>
                  <td><span><?=$valor->titulo?></span></td>
                  <td class="<?=($valor->valor != '0.00') ? '' : 'featured' ?>"><?=($valor->valor != '0.00') ? number_format($valor->valor,2,',','.') : 'Grátis' ?></td>
                </tr>
                  <? } } ?>
              </table>
              <hr>
             <div class="total">
                <span id="">Total</span>
                <span id="spanTotal2"><?=number_format($soma,2,',','.')?></span>
              </div>
            </div>
          </aside>
          <article data-aos="fade-right">
            <h2>
              <?=$metatag->titulo?>
              <span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_606_3371)">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45817 7.00032C1.45817 5.53058 2.04202 4.12104 3.08129 3.08177C4.12055 2.04251 5.5301 1.45866 6.99984 1.45866C8.46958 1.45866 9.87912 2.04251 10.9184 3.08177C11.9576 4.12104 12.5415 5.53058 12.5415 7.00032C12.5415 8.47007 11.9576 9.87961 10.9184 10.9189C9.87912 11.9581 8.46958 12.542 6.99984 12.542C5.5301 12.542 4.12055 11.9581 3.08129 10.9189C2.04202 9.87961 1.45817 8.47007 1.45817 7.00032ZM6.99984 0.291992C3.29509 0.291992 0.291504 3.29558 0.291504 7.00032C0.291504 10.7051 3.29509 13.7087 6.99984 13.7087C10.7046 13.7087 13.7082 10.7051 13.7082 7.00032C13.7082 3.29558 10.7046 0.291992 6.99984 0.291992ZM6.4165 4.08366C6.4165 3.92895 6.47796 3.78058 6.58736 3.67118C6.69675 3.56178 6.84513 3.50032 6.99984 3.50033C7.15455 3.50032 7.30292 3.56178 7.41231 3.67118C7.52171 3.78058 7.58317 3.92895 7.58317 4.08366V7.00032H9.9165C10.0712 7.00032 10.2196 7.06178 10.329 7.17118C10.4384 7.28058 10.4998 7.42895 10.4998 7.58366C10.4998 7.73837 10.4384 7.88674 10.329 7.99614C10.2196 8.10553 10.0712 8.16699 9.9165 8.16699H6.99984C6.84513 8.16699 6.69675 8.10553 6.58736 7.99614C6.47796 7.88674 6.4165 7.73837 6.4165 7.58366V4.08366Z" fill="#7F7F7F"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_606_3371">
                  <rect width="14" height="14" fill="white"/>
                  </clipPath>
                  </defs>
                </svg>                  
                Publicado há <?= getDateInterval($metatag->dtCriacao)->days ?> dias...
              </span>
            </h2>
            
              <div>
                   <?= $metatag->texto ?>
              </div>
              
            <div class="list-items"></div>

                 <? if ($metatag->itensdisponiveis) {
                  $itens = explode(";", $metatag->itensdisponiveis) ?>
                  <div class="list-li">
                     <h2>Itens Disponíveis</h2>

                     <div class="wraper">
                        <ul>
                           <? foreach ($itens as $key => $item) {
                              if ($key % 2 == 0) { ?>
                                 <li><?= $item ?></li>
                              <? } ?>
                           <? } ?>
                        </ul>
                        <ul>
                           <? foreach ($itens as $key => $item) {
                              if ($key % 2 != 0) { ?>
                                 <li><?= $item ?></li>
                              <? } ?>
                           <? } ?>
                        </ul>
                     </div>

                  </div>
               <? } ?>

                 <? if($fotos) {?>
            <div class="wraper-scroll-cards">
              <div class="photos-and-video">
             
                <a data-fancybox data-fslightbox="presentation-1" >
                  <div class="card" style="background-image: url(<?=PATHSITE?>uploads/produto/<?=$fotos[0]->produtoFK?>/<?=$fotos[0]->arquivo?>);">
                    <div class="wraper">
                      <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.33333C0 2.83554 2.83554 0 6.33333 0H31.6667C35.1646 0 38 2.83554 38 6.33333V29.5534V29.5577V31.6667C38 35.1646 35.1646 38 31.6667 38H6.33333C2.83554 38 0 35.1646 0 31.6667V23.2222V6.33333ZM33.7778 6.33333V24.4589L26.8261 17.5072C26.0017 16.6828 24.665 16.6828 23.8406 17.5072L21.1111 20.2367L13.1039 12.2294C12.2794 11.405 10.9428 11.405 10.1183 12.2294L4.22222 18.1256V6.33333C4.22222 5.16741 5.16741 4.22222 6.33333 4.22222H31.6667C32.8326 4.22222 33.7778 5.16741 33.7778 6.33333ZM4.22222 31.6667V24.0966L11.6111 16.7078L19.6183 24.715C20.4427 25.5394 21.7795 25.5394 22.6039 24.715L25.3333 21.9855L33.7778 30.43V31.6667C33.7778 32.8326 32.8326 33.7778 31.6667 33.7778H6.33333C5.16741 33.7778 4.22222 32.8326 4.22222 31.6667ZM24.2778 14.7778C26.0266 14.7778 27.4444 13.36 27.4444 11.6111C27.4444 9.8622 26.0266 8.44444 24.2778 8.44444C22.5289 8.44444 21.1111 9.8622 21.1111 11.6111C21.1111 13.36 22.5289 14.7778 24.2778 14.7778Z" fill="white"/>
                      </svg>                    
                      <span>Ver todas as fotos</span>
                    </div>
                  </div>
                </a>
                  <? } ?>
                  <? if($fotos && $videos) {?>
                <a href="#" class="btn-videos" onclick="verVideos()">
                  <div class="card" style="background-image: url(<?=PATHSITE?>uploads/produto/<?=$fotos[0]->produtoFK?>/<?=$fotos[0]->arquivo?>);">
                    <div class="wraper">
                      <svg width="34" height="38" viewBox="0 0 34 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M31.9346 19L2.75001 35.4912L2.75 2.50876L31.9346 19Z" stroke="white" stroke-width="4"/>
                      </svg>                    
                      <span>Assistir Vídeos</span>
                    </div>
                  </div>
                </a>
              
              </div>
            </div>
                <? } ?>
            
            <div class="faq">       
                <? if($proximidades) {?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?=PATHSITE?>assets/images/icon-faq-2.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Proximidades</h3>
                    <span>Conheça os pontos próximos ao local</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?=PATHSITE?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                    <? foreach($proximidades as $proximidade) {?>
                  <div class="topic">
                    <img src="<?=PATHSITE?>uploads/proximidade/<?=$proximidade->arquivo?>" alt="">
                    <div>
                      <strong><?=$proximidade->titulo?></strong>
                      <span><?=$proximidade->proximidades?></span>
                    </div>
                  </div>
                    <? } ?>    
                </div>
              </div>  
                <? } ?>
                <? if($metatag->observacoes) {?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title" style="margin-top: 4px;">
                    <img src="<?=PATHSITE?>assets/images/icon-faq-4.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Observações</h3>
                    <span>Alguns pontos que você precisa saber sobre o local</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?=PATHSITE?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <div class="post">
                   <?=$metatag->observacoes?>
                  </div>
                </div>
              </div>
                <?  } ?>
                <? if($metatag->regrascheck) {?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?=PATHSITE?>assets/images/icon-faq-5.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Regras de check-in e check-out</h3>
                    <span>Conheça os horários para entrada e saída da área de lazer</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?=PATHSITE?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <div class="post">
                  <?=$metatag->regrascheck?>
                  </div>
                </div>
              </div>
                <? } ?>
                <? if($metatag->pode || $metatag->naopode) {?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?=PATHSITE?>assets/images/icon-faq-6.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Permitido e Proibido</h3>
                    <span>O que você pode levar? Que tipo de festa não é permitida? Saiba aqui!</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?=PATHSITE?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                    <? if($metatag->pode) {?>
                  <div class="card-item-icon">
                    <h4>
                      <img src="<?=PATHSITE?>assets/images/icon-faq-allowed.svg" alt="">
                      Permitido:
                    </h4>
                    <p><?=$metatag->pode?></p>
                  </div>
                    <? } ?>
                       <? if($metatag->naopode) {?>
                  <div class="card-item-icon">
                    <h4>
                      <img src="<?=PATHSITE?>assets/images/icon-faq-prohibited.svg" alt="">
                      Proibido:
                    </h4>
                    <p><?=$metatag->naopode?></p>
                  </div>
                       <? } ?>
                </div>
              </div>
                <? } ?>
            </div>
          </article>
        </div>
        <div class="column">
          <div class="sticky">
            <aside class="box-checkin">
              <div class="price">
                  <input type="hidden" id="diaria" value="<?=$metatag->preco?>" />
                <strong><?=number_format($metatag->preco,2,',','.')?></strong>
                <span>diária</span>
              </div>
              <div class="table-checkin">
                <div class="tr">
                  <div class="td">
                    <strong>Check-in</strong>
                    <input readonly="" type="text" id="desktop-table-checkin" value="Selecione uma data">
                  </div>
                  <div class="td">
                    <strong>Checkout</strong>
                    <input disabled type="text" id="desktop-table-checkout" value="Selecione uma data">
                  </div>
                </div>
                <div class="tr">
                  <div class="td j-input-order-select" colspan="2">
                    <div class="colspan">
                      <div>
                        <strong>Hóspedes</strong>
                        <div class="modal-order">
                          <input readonly="" type="text" value="1 hóspede">
                          <div class="modal-order-select">
                            <div class="wraper-scroll">
                              <div class="content">
                                  <? 
                                  $i = 1;
                                  while($i <= 5) { ?>
                                <a onclick="$('#campoHospede').val(<?=$i?>);  " href="javascript:void();" data-select-value="<?=$i?> hóspede"><?=$i?> hóspede(s)</a>
                                  <? $i++; } ?>                              
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        <input type="hidden" id="campoHospede" value="1" />
                      <button>
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 1L7 7L13 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>                      
                      </button> 
                    </div>                
                  </div>
                </div>
              </div>
           
                <? if($anunciante->whatsapp) {?>
              <a onclick="abreWhatsapp('<?=encode($metatag->id)?>'); agendar('salao-de-festa','<?= PATHSITE . $tipoAtual->identificador . '/' . $metatag->identificador .'/' ?>', '<?=$anunciante->whatsapp?>','desktop'); " class="btn-primary">
                <img src="<?=PATHSITE?>assets/images/icon-whatsapp.svg" alt="">
                Agendar
              </a>
                <? } ?>
              <table class="resume">
                <tr>
                    <td><span><?=number_format($metatag->preco,2,',','.')?> x <spantss id="quantidadeDias1">1</spantss> diária(s)</span></td>
                  <td id="totalDiarias1"><?=number_format($metatag->preco,2,',','.')?></td>
                </tr>
                  <?
                  $soma = $metatag->preco;
                  if($valores) {
                      foreach($valores as $valor) {
                          $soma+= $valor->valor;
                      ?>
                <tr>
                  <td><span><?=$valor->titulo?></span></td>
                  <td class="<?=($valor->valor != '0.00') ? '' : 'featured' ?>"><?=($valor->valor != '0.00') ? number_format($valor->valor,2,',','.') : 'Grátis' ?></td>
                </tr>
                  <? } } ?>
              </table>
              <hr>
              <div class="total">
                  <input type="hidden" id="totalDiaria" value="<?=($soma - $metatag->preco)?>" />
                <span>Total</span>
                <span id="spanTotal1"><?=number_format($soma,2,',','.')?></span>
              </div>
            </aside>
                        <?= View('templates/anunciante')?>           
          </div>
        </div>
      </div>
    </section>
      <? if($destaques) {?>
    <section class="s-service">
      <div class="container-medium">
        <header data-aos="fade-up">
          <h2>Prestadores de Serviços em destaque </h2>
          <p>Prestadores de serviços na sua região que podem ajudar com o seu imóvel</p>
        </header>
      </div>
      <div class="list list-of-swiper" data-aos="fade-up">                                  
        <div class="swiper rent-interna">
          <div class="swiper-wrapper">
               <? foreach($destaques as $destaque) {?>
            <div class="swiper-slide">
             <a href="<?=PATHSITE?>prestador-de-servico/<?=$destaque->identificador?>/" >   
              <article class="card-services">   
                <div class="cover">
                  <span class="button-category">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756"/>
                      <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756"/>
                    </svg>                                   
                    Em Alta
                  </span>
                  <div class="swiper swiper-card">
                    <div class="swiper-wrapper">
                             <? if($destaque->fotos) {
                foreach($destaque->fotos as $foto) {
                ?>
                        <div class="swiper-slide">                     
                          <img src="<?=PATHSITE?>uploads/produto/<?=$foto->produtoFK?>/<?=$foto->arquivo?>" alt="">                   
                      </div>
            <? } } ?>    
                    </div>
                    <div class="swiper-pagination"></div>
                  
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>                  
                  </div>
                </div>
                
                  <div class="info">
                    <span class="type"><?=$destaque->categoria?></span>
                    <strong class="title"><?=$destaque->titulo?></strong>
                    <span class="uf"><?=$destaque->cidade?></span>
                    <p><?=$destaque->descricao ?>.</p>
                    
                    <a onclick="favoritar(<?= $destaque->id ?>)" href="#" class="icon-heart <?= (in_array($destaque->id, $todosFavoritos)) ? 'active' : '' ?>" data-id-heart="<?= $destaque->id ?>">
                      <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                      </svg>
                      <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
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
              <path d="M7 1L1 6.5L7 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </button>
          <button class="next active">
            <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </button>
        </div>
      </div>
    </section>
      <? } ?>
  </main>  
 <? if($anunciante->whatsapp) {?>
  <div class="box-agendar-float">
     <a target='_blank' onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="<?=$anunciante->whatsapp?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?=$metatag->titulo?>" class="btn-primary btn-agendar">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"/>
      </svg>                
      Agendar visita
    </a>
  </div>
 <? } ?>