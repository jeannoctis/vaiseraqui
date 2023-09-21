<main>
  <style>
    main {
      overflow-x: hidden;
    }

    .modal-order .modal-order-select {
      min-width: calc(100% + 40px);
      left: -20px;
    }
  </style>
  <section class="s-text-and-slider">
    <div class="info" data-aos="fade-right">
      <div>
        <span class="type"><?= $metatag->categoria ?></span>
        <h1><?= $metatag->titulo ?></h1>
        <span class="location"><?= $metatag->cidade ?>-<?= $metatag->estado ?></span>
        <div class="desc">
          <p><?= $metatag->descricao ?></p>
        </div>
      </div>

      <footer>
        <div class="price">
          <span>diárias a partir de</span>
          <span class="value">R$<?= number_format($metatag->preco, 2, ',', '.') ?></span>
        </div>
        <div class="buttons">
              <? if($anunciante->whatsapp) {?>
      <a  onclick="abreWhatsapp('<?=encode($espacoAtual->id)?>');" target="_blank" href="<?= $anunciante->whatsapp?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?=$metatag->titulo?>" class="btn-primary">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white" />
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
            <path d="M6 1L1 6.5L6 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 1L1 6.5L6 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
        <a href="#" class="share" data-title="<?= $metatag->titulo ?>">
          <svg class="active" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_606_3393)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="white" />
            </g>
            <defs>
              <clipPath id="clip0_606_3393">
                <rect width="22" height="22" fill="white" />
              </clipPath>
            </defs>
          </svg>
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_606_3393)">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="#404041" />
            </g>
            <defs>
              <clipPath id="clip0_606_3393">
                <rect width="22" height="22" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </a>
        <a href="#" class="like <?= (in_array($metatag->id, $todosFavoritos)) ? 'active' : '' ?>" onclick="favoritar(<?= $metatag->id ?>)" data-id-heart="<?= $metatag->id ?>">
          <svg class="active" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="white" />
          </svg>
          <svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="#404041" />
          </svg>
        </a>
      </div>
      <div class="bottom">
        <div>
          <a href="#" class="btn photo">
            <img src="<?= PATHSITE ?>assets/images/icon-photo.png" alt="">
            <?= count($fotos) ?> Fotos
          </a>
            <? if($videos) {?>
          <a href="#" class="btn-videos" onclick="verVideos()">
            <img class="active" src="<?= PATHSITE ?>assets/images/icon-video-active.png" alt="">
            <img src="<?= PATHSITE ?>assets/images/icon-video.png" alt="">
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
          <span class="tagline"><?= $metatag->categoria ?></span>
          <strong class="title"><?= $metatag->titulo ?></strong>
          <span class="uf"><?= $metatag->cidade ?>-<?= $metatag->estado ?></span>
        </div>

        <? if ($fotos) {
          foreach ($fotos as $foto) {
        ?>
            <a data-fslightbox="mobile-presentation-1" href="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>">
              <img class="mode-slide" src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
            </a>
          <? }  ?>
      </div>
      <div class="swiper presentationSwiper">
        <div class="swiper-wrapper">
          <? foreach ($fotos as $foto) { ?>
            <div class="swiper-slide">
              <div class="item">
                <a data-fslightbox="presetation-1" href="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>">
                  <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                </a>
              </div>
            </div>
          <? } ?>
        </div>
        <div class="navigation-swiper-blog">
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
    <? } ?>
    </div>
  </section>

  <section class="more-about-2-column">
    <div class="container-medium">
      <div class="column">
        <nav id='inicio' class="navigation-breadcrumb" data-aos="fade-up">
          <a href="<?= PATHSITE ?>">Início</a>
          <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <a href="<?= PATHSITE ?>hospedagens/">Hospedagem</a>
          <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <a href="<?= PATHSITE ?>hospedagens?cidade=<?= $metatag->cidade ?>"><?= $metatag->cidade ?>-<?= $metatag->estado ?></a>
          <svg width="8" height="14" viewBox="0 0 8 14" f<?= $metatag->cidade ?>ill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <a href="<?= PATHSITE ?>hospedagem/<?= $hospedagem->identificador ?>/"><?= $metatag->titulo ?></a>
        </nav>
        <aside class="info-slider" data-aos="fade-up">
          <div class="price">
            <span class="rent">Diárias a partir de R$<?= number_format($metatag->preco, 2, ',', '.') ?></span>
          </div>
          <div class="buttons">
            <a href="<?= PATHSITE ?>">Ver mais detalhes</a>
          </div>
        </aside>
        <header class="header-bg" data-aos="fade-up">
          <div class="group-title">
            <strong><?= $metatag->endereco ?></strong>
            <span><?= $metatag->bairro ?>, <?= $metatag->cidade ?>-<?= $metatag->estado ?></span>
          </div>
        </header>
        <div class="navigation-breadcrumb-mobile" data-aos="fade-up">
          <a href="<?= PATHSITE ?>hospedagens?cidade=<?= $metatag->cidade ?>">
            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 1L1 6L6 11" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Mais em <?= $metatag->cidade ?> - <?= $metatag->estado ?></a>
        </div>
        <aside class="info-about-item aos-init aos-animate" data-aos="fade-right">
          <h2>
            <?= $metatag->titulo ?>
            <span>
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_606_3371)">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45817 7.00032C1.45817 5.53058 2.04202 4.12104 3.08129 3.08177C4.12055 2.04251 5.5301 1.45866 6.99984 1.45866C8.46958 1.45866 9.87912 2.04251 10.9184 3.08177C11.9576 4.12104 12.5415 5.53058 12.5415 7.00032C12.5415 8.47007 11.9576 9.87961 10.9184 10.9189C9.87912 11.9581 8.46958 12.542 6.99984 12.542C5.5301 12.542 4.12055 11.9581 3.08129 10.9189C2.04202 9.87961 1.45817 8.47007 1.45817 7.00032ZM6.99984 0.291992C3.29509 0.291992 0.291504 3.29558 0.291504 7.00032C0.291504 10.7051 3.29509 13.7087 6.99984 13.7087C10.7046 13.7087 13.7082 10.7051 13.7082 7.00032C13.7082 3.29558 10.7046 0.291992 6.99984 0.291992ZM6.4165 4.08366C6.4165 3.92895 6.47796 3.78058 6.58736 3.67118C6.69675 3.56178 6.84513 3.50032 6.99984 3.50033C7.15455 3.50032 7.30292 3.56178 7.41231 3.67118C7.52171 3.78058 7.58317 3.92895 7.58317 4.08366V7.00032H9.9165C10.0712 7.00032 10.2196 7.06178 10.329 7.17118C10.4384 7.28058 10.4998 7.42895 10.4998 7.58366C10.4998 7.73837 10.4384 7.88674 10.329 7.99614C10.2196 8.10553 10.0712 8.16699 9.9165 8.16699H6.99984C6.84513 8.16699 6.69675 8.10553 6.58736 7.99614C6.47796 7.88674 6.4165 7.73837 6.4165 7.58366V4.08366Z" fill="#7F7F7F"></path>
                </g>
                <defs>
                  <clipPath id="clip0_606_3371">
                    <rect width="14" height="14" fill="white"></rect>
                  </clipPath>
                </defs>
              </svg>
              Publicado há <?= getDateInterval($metatag->dtCriacao)->days ?> dias...
            </span>
          </h2>
          <table>
            <tbody>
              <tr>
                <td>Aluguel</td>
                <td>R$<?= number_format($metatag->preco, 2, ";", ".") ?></td>
              </tr>
              <? foreach ($metatag->valores as $valor) { ?>
                <tr>
                  <td><?= $valor->titulo ?></td>
                  <td class="<?= $valor->valor == 0 ? 'empashis' : '' ?>">
                    R$<?= number_format($metatag->preco, 2, ";", ".") ?></td>
                </tr>
              <? } ?>
            </tbody>
            <tfoot>
              <tr>
                <td>Total</td>
                <td>R$<?= number_format($metatag->total, 2, ";", ".") ?></td>
              </tr>
            </tfoot>
          </table>
        </aside>
        <article data-aos="fade-right">
          <h2>
            <?= $metatag->titulo ?>
            <span>
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_606_3371)">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45817 7.00032C1.45817 5.53058 2.04202 4.12104 3.08129 3.08177C4.12055 2.04251 5.5301 1.45866 6.99984 1.45866C8.46958 1.45866 9.87912 2.04251 10.9184 3.08177C11.9576 4.12104 12.5415 5.53058 12.5415 7.00032C12.5415 8.47007 11.9576 9.87961 10.9184 10.9189C9.87912 11.9581 8.46958 12.542 6.99984 12.542C5.5301 12.542 4.12055 11.9581 3.08129 10.9189C2.04202 9.87961 1.45817 8.47007 1.45817 7.00032ZM6.99984 0.291992C3.29509 0.291992 0.291504 3.29558 0.291504 7.00032C0.291504 10.7051 3.29509 13.7087 6.99984 13.7087C10.7046 13.7087 13.7082 10.7051 13.7082 7.00032C13.7082 3.29558 10.7046 0.291992 6.99984 0.291992ZM6.4165 4.08366C6.4165 3.92895 6.47796 3.78058 6.58736 3.67118C6.69675 3.56178 6.84513 3.50032 6.99984 3.50033C7.15455 3.50032 7.30292 3.56178 7.41231 3.67118C7.52171 3.78058 7.58317 3.92895 7.58317 4.08366V7.00032H9.9165C10.0712 7.00032 10.2196 7.06178 10.329 7.17118C10.4384 7.28058 10.4998 7.42895 10.4998 7.58366C10.4998 7.73837 10.4384 7.88674 10.329 7.99614C10.2196 8.10553 10.0712 8.16699 9.9165 8.16699H6.99984C6.84513 8.16699 6.69675 8.10553 6.58736 7.99614C6.47796 7.88674 6.4165 7.73837 6.4165 7.58366V4.08366Z" fill="#7F7F7F" />
                </g>
                <defs>
                  <clipPath id="clip0_606_3371">
                    <rect width="14" height="14" fill="white" />
                  </clipPath>
                </defs>
              </svg>
              Publicado há 3 dias
            </span>
          </h2>
          <?= $metatag->detalhes ?>

          <div class="list-items">
            <? if ($metatag->cafedamanha == "S") { ?>
              <div class="item">
                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 21H28.3173" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M6.09741 2C6.09741 1.44772 6.54513 1 7.09741 1H20.8537C21.406 1 21.8537 1.44771 21.8537 2V14C21.8537 17.3137 19.1674 20 15.8537 20H12.0974C8.7837 20 6.09741 17.3137 6.09741 14V2Z" stroke="#404041" stroke-width="2" stroke-linejoin="round" />
                  <path d="M22.1709 3.50063C24.4473 3.03397 29.0002 3.36063 29.0002 8.40063C29.0002 13.4406 24.4473 14.7004 22.1709 14.7003" stroke="#404041" stroke-width="2" />
                </svg>
                <span>Café da manhã</span>
              </div>
            <? } ?>

            <? if ($metatag->wifi == "S") { ?>
              <div class="item">
                <svg width="27" height="23" viewBox="0 0 27 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 6.5C2.57658 4.66667 7.21622 1 13.1622 1C19.1081 1 24.1982 4.66667 26 6.5" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M4.37842 10.625C5.50454 9.25 8.83788 6.5 13.1622 6.5C17.4865 6.5 21.2703 9.25 22.6217 10.625" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M16.2163 18.875C16.2163 20.6173 14.8326 22 13.1622 22C11.4918 22 10.1082 20.6173 10.1082 18.875C10.1082 17.1327 11.4918 15.75 13.1622 15.75C14.8326 15.75 16.2163 17.1327 16.2163 18.875Z" stroke="#404041" stroke-width="2" />
                  <path d="M7.08105 14.0625C7.75673 13.1458 9.91889 11.3125 13.1621 11.3125C16.4054 11.3125 18.5675 13.1458 19.2432 14.0625" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span>Wi-Fi</span>
              </div>
            <? } ?>

            <? if ($metatag->arcondicionado == "S") { ?>
              <div class="item">
                <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.1465 1V25" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M1.14648 7L22.1465 19" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M22.1465 7L1.14648 19" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M8.14648 3L12.1465 6L16.1465 3" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M16.1465 23L12.1465 21L8.14648 23" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M1 10.7998L5.10509 9.41412L4.25258 5.16617" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M22.1465 15.2998L18.0414 16.6855L18.8939 20.9334" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M4.25293 21.0352L5.10544 16.7872L1.00035 15.4015" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M18.6255 5.5L17.773 9.74795L21.8781 11.1336" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span>Ar Condicionado</span>
              </div>
            <? } ?>

            <? if ($metatag->recepcao24 == "S") { ?>
              <div class="item">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 6V13.3171L13.1364 13.439L16 16" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13 25C19.6274 25 25 19.6274 25 13C25 6.37258 19.6274 1 13 1C6.37258 1 1 6.37258 1 13C1 19.6274 6.37258 25 13 25Z" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Recepção 24h</span>
              </div>
            <? } ?>

            <? if ($metatag->bar == "S") { ?>
              <div class="item">
                <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="20.0589" cy="5.94118" r="3.94118" fill="white" stroke="#404041" stroke-width="2" />
                  <path d="M1 1H4.47511C5.1991 1 6.64706 1.84706 6.64706 5.23529" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M17.8846 5.94141H3.53702C2.6294 5.94141 2.19118 7.05318 2.8547 7.67246L11.5882 15.8238L18.6439 7.5922C19.1999 6.94352 18.739 5.94141 17.8846 5.94141Z" fill="white" />
                  <path d="M11.5882 15.8238L18.6439 7.5922C19.1999 6.94352 18.739 5.94141 17.8846 5.94141H3.53702C2.6294 5.94141 2.19118 7.05318 2.8547 7.67246L11.5882 15.8238ZM11.5882 15.8238V25.0002M8.05882 25.0002H15.1176" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span>Bar</span>
              </div>
            <? } ?>

            <? if ($metatag->animais == "S") { ?>
              <div class="item">
                <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.24749 8.07446C7.02901 9.29769 6.68056 10.6681 5.78691 11.2172C4.89326 11.7664 3.48389 11.4762 2.70236 10.253C1.92084 9.02977 2.26929 7.65939 3.16294 7.11023C4.05659 6.56106 5.46596 6.85122 6.24749 8.07446Z" stroke="#404041" stroke-width="2" />
                  <path d="M11.3617 3.63297C11.8318 5.07807 11.1404 6.32847 10.1799 6.62899C9.21946 6.92951 7.91743 6.30285 7.44733 4.85774C6.97723 3.41264 7.66865 2.16225 8.62912 1.86172C9.58958 1.5612 10.8916 2.18786 11.3617 3.63297Z" stroke="#404041" stroke-width="2" />
                  <path d="M18.4485 4.49164C18.2511 5.97801 17.0973 6.81452 16.1063 6.68795C15.1154 6.56139 14.2185 5.46297 14.4158 3.9766C14.6132 2.49023 15.767 1.65373 16.758 1.78029C17.749 1.90685 18.6459 3.00527 18.4485 4.49164Z" stroke="#404041" stroke-width="2" />
                  <path d="M22.9637 10.3525C21.9637 11.5855 20.5169 11.7007 19.7675 11.1161C19.0182 10.5315 18.8072 9.12299 19.8072 7.89C20.8072 6.657 22.254 6.5418 23.0034 7.1264C23.7528 7.711 23.9638 9.11947 22.9637 10.3525Z" stroke="#404041" stroke-width="2" />
                  <path d="M12.9309 9.88232C7.98444 9.88232 6.74781 14.9357 6.74781 17.4623C6.57606 18.6414 7.57223 20.9997 12.9309 20.9997C18.2896 20.9997 19.2858 18.6414 19.114 17.4623C19.114 14.9357 17.8774 9.88232 12.9309 9.88232Z" stroke="#404041" stroke-width="2" />
                </svg>
                <span>Aceita pet</span>
              </div>
            <? } ?>

            <? if ($metatag->acessibilidade == "S") { ?>
              <div class="item">
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.54688 6.46729L9.664 12.6239C9.75031 13.0995 10.1645 13.4454 10.6479 13.4454H15.1076C15.4564 13.4454 15.7799 13.627 15.9615 13.9248L18.6773 18.3794C18.9459 18.82 19.5056 18.9838 19.9694 18.7577L22.0001 17.7674" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M9.33838 9.89502H15.0362" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M14.5566 17.704C14.2784 18.7683 13.7281 19.7464 12.9571 20.547C12.1861 21.3476 11.2196 21.9445 10.1479 22.2819C9.07621 22.6194 7.9343 22.6863 6.82886 22.4766C5.72343 22.2668 4.69055 21.7872 3.82676 21.0825C2.96297 20.3778 2.29645 19.471 1.88948 18.4469C1.48251 17.4228 1.34838 16.3148 1.49961 15.2264C1.65085 14.1381 2.08252 13.1049 2.75429 12.2233C3.42606 11.3418 4.316 10.6408 5.34095 10.1857" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M9.7627 2.16104C9.7627 2.77881 9.24211 3.32208 8.54688 3.32208C7.85165 3.32208 7.33105 2.77881 7.33105 2.16104C7.33105 1.54327 7.85165 1 8.54688 1C9.24211 1 9.7627 1.54327 9.7627 2.16104Z" stroke="#404041" stroke-width="2" />
                </svg>
                <span>Acessibilidade</span>
              </div>
            <? } ?>

            <? if ($metatag->estacionamento == "S") { ?>
              <div class="item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="11" stroke="#404041" stroke-width="2" />
                  <path d="M10 8L10 7L8 7L8 8L10 8ZM8 16C8 16.5523 8.44772 17 9 17C9.55229 17 10 16.5523 10 16L8 16ZM8 8L8 16L10 16L10 8L8 8Z" fill="#404041" />
                  <path d="M15 8H9" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M15 16H9" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                  <path d="M13 12H9" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span>Estacionamento</span>
              </div>
            <? } ?>
          </div>

          <? if ($metatag->principaiscomodidades) {
            $explode = explode(";", $metatag->principaiscomodidades);
            $arraySplit = array_chunk($explode, 2); ?>
            <div class="list-li" id="main-amenities">
              <h2>Principais comodidades</h2>
              <div class="wraper">
                <? if ($arraySplit[0]) { ?>
                  <ul>
                    <? foreach ($arraySplit[0] as $split) { ?>
                      <li><?= $split ?></li>
                    <? } ?>
                  </ul>
                <? } ?>
                <? if ($arraySplit[1]) { ?>
                  <ul>
                    <? foreach ($arraySplit[1] as $split) { ?>
                      <li><?= $split ?></li>
                    <? } ?>
                  </ul>
                <? } ?>
              </div>
            </div>
          <? } ?>

          <div class="wraper-scroll-cards">

                    <? if($fotos) {?>
              
                <? foreach ($fotos as $foto) { ?>
                        <a data-fslightbox="new-gallery" href="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>"></a>
                     <? } ?>
              
            <div class="wraper-scroll-cards">
              <div class="photos-and-video">
             
                      <a data-fslightbox="new-gallery" href="<?= PATHSITE ?>uploads/produto/<?= $fotos[0]->produtoFK ?>/<?= $fotos[0]->arquivo ?>">
                           <div class="card" style="background-image: url(<?= PATHSITE ?>uploads/produto/<?= $fotos[0]->produtoFK ?>/<?= $fotos[0]->arquivo ?>);">
                    <div class="wraper">
                      <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.33333C0 2.83554 2.83554 0 6.33333 0H31.6667C35.1646 0 38 2.83554 38 6.33333V29.5534V29.5577V31.6667C38 35.1646 35.1646 38 31.6667 38H6.33333C2.83554 38 0 35.1646 0 31.6667V23.2222V6.33333ZM33.7778 6.33333V24.4589L26.8261 17.5072C26.0017 16.6828 24.665 16.6828 23.8406 17.5072L21.1111 20.2367L13.1039 12.2294C12.2794 11.405 10.9428 11.405 10.1183 12.2294L4.22222 18.1256V6.33333C4.22222 5.16741 5.16741 4.22222 6.33333 4.22222H31.6667C32.8326 4.22222 33.7778 5.16741 33.7778 6.33333ZM4.22222 31.6667V24.0966L11.6111 16.7078L19.6183 24.715C20.4427 25.5394 21.7795 25.5394 22.6039 24.715L25.3333 21.9855L33.7778 30.43V31.6667C33.7778 32.8326 32.8326 33.7778 31.6667 33.7778H6.33333C5.16741 33.7778 4.22222 32.8326 4.22222 31.6667ZM24.2778 14.7778C26.0266 14.7778 27.4444 13.36 27.4444 11.6111C27.4444 9.8622 26.0266 8.44444 24.2778 8.44444C22.5289 8.44444 21.1111 9.8622 21.1111 11.6111C21.1111 13.36 22.5289 14.7778 24.2778 14.7778Z" fill="white" />
                      </svg>                    
                      <span>Ver todas as fotos</span>
                    </div>
                  </div>
                </a>
                  <? } ?>
                  <? if($videos) {?>
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
          </div>

          <div class="faq">

            <? if ($comodidades) { ?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?= PATHSITE ?>assets/images/icon-faq-1.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Comodidades</h3>
                    <span>Itens que facilitam o seu dia-a-dia na estadia</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <? foreach ($comodidades as $comodidade) { ?>
                    <div class="item">
                      <strong><?= $comodidade->titulo ?></strong>
                      <? $listaCmdd = explode(";", $comodidade->comodidades) ?>
                      <ul>
                        <? foreach ($listaCmdd as $cmdd) { ?>
                          <li><?= $cmdd ?></li>
                        <? } ?>
                      </ul>
                    </div>
                  <? } ?>
                </div>
              </div>
            <? } ?>

            <? if ($metatag->proximidades) { ?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?= PATHSITE ?>assets/images/icon-faq-2.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Proximidades</h3>
                    <span>Conheça os pontos próximos ao local</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <? foreach ($metatag->proximidades as $proximidade) { ?>
                    <div class="topic">
                      <img src="<?= PATHSITE ?>assets/images/icon-faq-response-1.svg" alt="">
                      <div>
                        <strong><?= $proximidade->titulo ?></strong>
                        <span><?= $proximidade->proximidades ?></span>
                      </div>
                    </div>
                  <? } ?>
                </div>
              </div>
            <? } ?>

            <? if ($metatag->observacoes) { ?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title" style="margin-top: 4px;">
                    <img src="<?= PATHSITE ?>assets/images/icon-faq-4.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Observações</h3>
                    <span>Alguns pontos que você precisa saber sobre o local</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <div class="post">
                    <?= $metatag->observacoes ?>
                  </div>
                </div>
              </div>
            <? } ?>

            <? if ($metatag->regrascheck) { ?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?= PATHSITE ?>assets/images/icon-faq-5.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Regras de check-in e check-out</h3>
                    <span>Conheça os horários para entrada e saída da área de lazer</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <div class="post">
                    <?= $metatag->regrascheck ?>
                  </div>
                </div>
              </div>
            <? } ?>

            <? if ($metatag->permitido || $metatag->proibido) { ?>
              <div class="faq-item" data-aos="fade-right">
                <div class="faq-title">
                  <div class="icon-title">
                    <img src="<?= PATHSITE ?>assets/images/icon-faq-6.svg" alt="">
                  </div>
                  <div class="group-title">
                    <h3>Permitido e Proibido</h3>
                    <span>O que você pode levar? Que tipo de festa não é permitida? Saiba aqui!</span>
                  </div>
                  <div class="icon-dropdown">
                    <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                  </div>
                </div>
                <div class="faq-response">
                  <? if ($metatag->permitido) { ?>
                    <div class="card-item-icon">
                      <h4>
                        <img src="<?= PATHSITE ?>assets/images/icon-faq-allowed.svg" alt="">
                        Permitido:
                      </h4>
                      <?= $metatag->permitido ?>
                    </div>
                  <? } ?>
                  <? if ($metatag->proibido) { ?>
                    <div class="card-item-icon">
                      <h4>
                        <img src="<?= PATHSITE ?>assets/images/icon-faq-prohibited.svg" alt="">
                        Proibido:
                      </h4>
                      <?= $metatag->proibido ?>
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
              <a onclick="abreWhatsapp('<?=encode($metatag->id)?>'); agendar('hospedagem','<?= PATHSITE . $tipoAtual->identificador . '/' . $metatag->identificador .'/' ?>', '<?=$anunciante->whatsapp?>','desktop'); " class="btn-primary">
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

  <? if ($destaques) { ?>
    <section class="s-service" id="service-featured">
      <div class="container-medium">
        <header data-aos="fade-up">
          <h2>Prestadores de Serviços em destaque </h2>
          <p>Prestadores de serviços na sua região que podem ajudar com o seu imóvel</p>
        </header>
      </div>
      <div class="list list-of-swiper" data-aos="fade-up">
        <div class="swiper imoveisSwiper">
          <div class="swiper-wrapper">
            <? foreach ($destaques as $destaque) { ?>
              <div class="swiper-slide">
                <?= view("templates/services-destaque-card", (array)$destaque) ?>
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
 <? if($anunciante->whatsapp) {?>
<div class="box-agendar-float">
   <a target='_blank' onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="<?=$anunciante->whatsapp?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?=$metatag->titulo?>" class="btn-primary btn-agendar">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white" />
    </svg>
    Agendar visita
  </a>
</div>
 <? } ?>
<a href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z" data-fancybox class="btn-maps-mobile">
  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 5.34737C1 4.15952 1 3.5656 1.30539 3.21919C1.41381 3.0962 1.54559 2.99776 1.69245 2.93005C2.1061 2.73932 2.64974 2.92714 3.73701 3.30276C4.56709 3.58954 4.98214 3.73293 5.40152 3.71808C5.55555 3.71263 5.70867 3.69138 5.85866 3.65463C6.26704 3.55459 6.63103 3.30307 7.35911 2.80003L8.43423 2.05712C9.36687 1.41275 9.83314 1.09057 10.3684 1.01628C10.9037 0.941984 11.4353 1.12566 12.4986 1.49301L13.4045 1.80598C14.1745 2.07201 14.5595 2.20502 14.7798 2.52169C15 2.83836 15 3.25898 15 4.10023V10.6527C15 11.8405 15 12.4344 14.6946 12.7808C14.5862 12.9039 14.4544 13.0023 14.3075 13.07C13.8939 13.2607 13.3503 13.0729 12.263 12.6972C11.4329 12.4105 11.0179 12.2671 10.5985 12.2819C10.4445 12.2874 10.2913 12.3086 10.1414 12.3454C9.73297 12.4454 9.36897 12.6969 8.64089 13.2L7.56577 13.9429C6.63313 14.5873 6.16686 14.9095 5.63161 14.9837C5.09635 15.058 4.5647 14.8743 3.5014 14.507L2.59547 14.194C1.82545 13.928 1.44043 13.795 1.22022 13.4783C1 13.1616 1 12.741 1 11.8997V5.34737Z" stroke="white" stroke-width="1.5" />
    <path d="M5.6665 4.11133V15.0002" stroke="white" stroke-width="1.5" />
    <path d="M10.3335 1V11.8889" stroke="white" stroke-width="1.5" />
  </svg>
  Mapa
</a>