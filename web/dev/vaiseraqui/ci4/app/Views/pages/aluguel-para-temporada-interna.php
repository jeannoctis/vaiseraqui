<style>
   @media screen and (max-width: 750px) {
      .internal-rent .s-service .list {
         width: calc(100% - 20px);
         padding-right: 0;
         margin-right: 0;
         padding-left: 0;
      }
   }
</style>

<main>
   <section class="s-text-and-slider">
      <div class="info" data-aos="fade-right">
         <div>
            <span class="type"><?= $espacoAtual->categoria ?></span>
            <h1><?= $espacoAtual->titulo ?></h1>
            <span class="location"><?= $espacoAtual->cidade ?> - <?= $espacoAtual->estado ?></span>
            <div class="desc">
               <p><?= $espacoAtual->descricao ?></p>
            </div>
         </div>

         <footer>
            <div class="price">
               <span>aluguel</span>
               <span class="value">R$<?= number_format($espacoAtual->preco, 2, ",", ".") ?></span>
            </div>
            <div class="buttons">
               <a href="#" class="btn-primary">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white" />
                  </svg>
                  Agendar visita
               </a>
               <a href="#">Fazer proposta</a>
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
            <a href="#" class="share">
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
            <a href="#" class="like">
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
                  <?= count($espacoAtual->fotos) ?> Fotos
               </a>
               <a class="btn btn-videos">
                  <img class="active" src="<?= PATHSITE ?>assets/images/icon-video-active.png" alt="">
                  <img src="<?= PATHSITE ?>assets/images/icon-video.png" alt="">
                  Vídeos
               </a>
               <a href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z" data-fancybox class="btn btn-maps">
                  <img class="active" src="<?= PATHSITE ?>assets/images/icon-map-active.png" alt="">
                  <img src="<?= PATHSITE ?>assets/images/icon-map.png" alt="">
                  Mapa
               </a>
            </div>
         </div>

         <div class="box-presentation only-mobile">
            <div class="description">
               <span class="tagline"><?= $espacoAtual->categoria ?></span>
               <strong class="title"><?= $espacoAtual->titulo ?></strong>
               <span class="uf"><?= $espacoAtual->cidade ?> - <?= $espacoAtual->estado ?></span>
            </div>
            <a data-fslightbox="mobile-presentation-1" href="<?= PATHSITE ?>assets/images/slide-rent-1.png">
               <img class="mode-slide" src="<?= PATHSITE ?>assets/images/slide-rent-1.png" alt="">
            </a>
            <a data-fslightbox="mobile-presentation-1" href="<?= PATHSITE ?>assets/images/slide-rent-2.png"></a>
            <a data-fslightbox="mobile-presentation-1" href="<?= PATHSITE ?>assets/images/slide-rent-3.png"></a>
         </div>

         <? if ($espacoAtual->fotos) { ?>
            <div class="swiper presentationSwiper">
               <div class="swiper-wrapper">

                  <? foreach ($espacoAtual->fotos as $foto) { ?>
                     <div class="swiper-slide">
                        <div class="item">
                           <a data-fslightbox="presetation-1" href="<?= PATHSITE ?>uploads/produto_foto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>">
                              <img src="<?= PATHSITE ?>uploads/produto_foto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="foto do espaço">
                           </a>
                        </div>
                     </div>
                  <? } ?>

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
            </div>
         <? } ?>


   </section>

   <section class="more-about-2-column">
      <div class="container-medium">
         <div class="column" id="aluguel">

            <nav class="navigation-breadcrumb" data-aos="fade-up">
               <a href="<?= PATHSITE ?>">Início</a>
               <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               <a href="<?= PATHSITE ?>aluguel-para-temporada/">Aluguel para Temporada</a>
               <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               <a href="<?= PATHSITE ?>aluguel-para-temporada?cidade=<?= $espacoAtual->cidade_id ?>"><?= $espacoAtual->cidade ?></a>
               <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               <a href="<?= PATHSITE ?>aluguel-para-temporada/<?= $espacoAtual->identificador ?>/"><?= $espacoAtual->título ?></a>
            </nav>

            <aside class="info-slider" data-aos="fade-up">
               <div class="price">
                  <span class="total">Total R$<?= number_format($espacoAtual->total, 2, ",", ".") ?></span>
                  <span class="rent">Aluguel R$<?= number_format($espacoAtual->preco, 2, ",", ".") ?></span>
               </div>
               <div class="buttons">
                  <a href="#">Ver mais detalhes</a>
               </div>
            </aside>

            <header class="header-bg" data-aos="fade-up">
               <div class="group-title">
                  <strong><?= $espacoAtual->endereco ?></strong>
                  <span><?= $espacoAtual->bairro ?>, <?= $espacoAtual->cidade ?></span>
               </div>
            </header>

            <div class="navigation-breadcrumb-mobile" data-aos="fade-up">
               <a href="<?= PATHSITE ?>aluguel-para-temporada?cidade=<?= $espacoAtual->cidade_id ?>">
                  <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M6 1L1 6L6 11" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  Mais em <?= $espacoAtual->cidade ?> - <?= $espacoAtual->estado ?>
               </a>
            </div>

            <aside class="info-about-item" data-aos="fade-right">
               <h2>
                  <?= $espacoAtual->titulo ?>
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
                     Publicado há <?= getDateInterval($espacoAtual->dtCriacao)->days ?> dias...
                  </span>
               </h2>
               <table>
                  <tbody>
                     <tr>
                        <td>Aluguel</td>
                        <td>R$<?= number_format($espacoAtual->preco, 2, ",", ".") ?></td>
                     </tr>
                     <? if ($espacoAtual->valores) {
                        foreach ($espacoAtual->valores as $valor) { ?>
                           <tr>
                              <td><?= $valor->titulo ?></td>
                              <td class="<?= $valor->valor == 0 ? 'empashis' : '' ?>">
                                 R$<?= number_format($valor->valor, 2, ",", ".") ?>
                              </td>
                           </tr>
                        <? } ?>
                     <? } ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td>Total</td>
                        <td>R$<?= number_format($espacoAtual->total, 2, ",", ".") ?></td>
                     </tr>
                  </tfoot>
               </table>
            </aside>

            <article data-aos="fade-right">
               <h2>
                  <?= $espacoAtual->titulo ?>
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
                     Publicado há <?= getDateInterval($espacoAtual->dtCriacao)->days ?> dias
                  </span>
               </h2>
               <p><?= $espacoAtual->detalhes ?></p>

               <div class="list-items">
                  <div class="item">
                     <svg width="35" height="15" viewBox="0 0 35 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="33" height="13" rx="1" stroke="#404041" stroke-width="2" />
                        <line x1="10" y1="4.37112e-08" x2="10" y2="6.92308" stroke="#404041" stroke-width="2" />
                        <line x1="17" y1="4.37112e-08" x2="17" y2="6.92308" stroke="#404041" stroke-width="2" />
                        <line x1="24" y1="4.37112e-08" x2="24" y2="6.92308" stroke="#404041" stroke-width="2" />
                     </svg>
                     <span><?= $espacoAtual->areautil ?>m²</span>
                  </div>
                  <div class="item">
                     <svg width="33" height="25" viewBox="0 0 33 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1" y1="1" x2="0.999999" y2="23" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <path d="M31.9995 5L31.9995 24" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <line y1="15" x2="32" y2="15" stroke="#404041" stroke-width="2" />
                        <path d="M16.0005 10C16.0005 7.79086 17.7913 6 20.0005 6H32.0005V15H16.0005V10Z" stroke="#404041" stroke-width="2" />
                        <path d="M10 7.5C10 8.88071 8.88071 10 7.5 10C6.11929 10 5 8.88071 5 7.5C5 6.11929 6.11929 5 7.5 5C8.88071 5 10 6.11929 10 7.5Z" stroke="#404041" stroke-width="2" />
                     </svg>
                     <span><?= $espacoAtual->quartos ?> quartos</span>
                  </div>
                  <div class="item">
                     <svg width="20" height="26" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 25V1H14.2V6.69492H9.8H19" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.9999 10.3555L10.9999 14.4233" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <path d="M19 10.3555L19 14.4233" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <path d="M14.9994 10.3555L14.9994 17.6775" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                     </svg>
                     <span><?= $espacoAtual->banheiros ?> banheiros</span>
                  </div>
                  <div class="item">
                     <svg width="30" height="23" viewBox="0 0 30 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.54297 9.59531L7.21124 1.58369C7.37408 1.22805 7.72932 1 8.12047 1H21.0044C21.3956 1 21.7508 1.22805 21.9137 1.58369L25.5819 9.59531M3.54297 9.59531V18.4799C3.54297 19.0322 3.99068 19.4799 4.54297 19.4799H24.5819C25.1342 19.4799 25.5819 19.0322 25.5819 18.4799V9.59531M3.54297 9.59531H25.5819" stroke="#404041" stroke-width="2" stroke-linejoin="round" />
                        <path d="M4.39062 9.40039H1.00002" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M28.1248 10.4004C28.677 10.4004 29.1248 9.95268 29.1248 9.40039C29.1248 8.84811 28.677 8.40039 28.1248 8.40039L28.1248 10.4004ZM26.4295 8.40039L25.4295 8.40039L25.4295 10.4004L26.4295 10.4004L26.4295 8.40039ZM28.1248 8.40039L26.4295 8.40039L26.4295 10.4004L28.1248 10.4004L28.1248 8.40039Z" fill="#404041" />
                        <path d="M6.08594 19.4805L6.08594 22.0005" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M23.0391 19.4805L23.0391 22.0005" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3.54297 14.0195H8.62888" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20.4961 14.0195H25.582" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                     <span><?= $espacoAtual->vagas ?> vaga</span>
                  </div>
                  <div class="item">
                     <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="2" y1="1" x2="21" y2="1" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <path d="M1 25L22 25" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <line x1="4" y1="2" x2="4" y2="25" stroke="#404041" stroke-width="2" />
                        <line x1="19" y1="2" x2="19" y2="25" stroke="#404041" stroke-width="2" />
                        <rect x="6.5" y="5.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="6.5" y="10.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="11" y="5.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="11" y="10.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="15.5" y="5.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="15.5" y="10.5" width="1" height="1" fill="black" stroke="#404041" />
                        <rect x="15.5" y="15.5" width="1" height="1" fill="black" stroke="#404041" />
                        <mask id="path-12-inside-1_1348_4" fill="white">
                           <path d="M6 16C6 15.4477 6.44772 15 7 15H13C13.5523 15 14 15.4477 14 16V26H6V16Z" />
                        </mask>
                        <path d="M6 16C6 15.4477 6.44772 15 7 15H13C13.5523 15 14 15.4477 14 16V26H6V16Z" stroke="#404041" stroke-width="4" mask="url(#path-12-inside-1_1348_4)" />
                     </svg>
                     <span><?= $espacoAtual->andar ?>º andar</span>
                  </div>
                  <div class="item">
                     <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.24749 8.07494C7.02901 9.29818 6.68056 10.6686 5.78691 11.2177C4.89326 11.7669 3.48389 11.4767 2.70236 10.2535C1.92084 9.03026 2.26929 7.65988 3.16294 7.11071C4.05659 6.56155 5.46596 6.85171 6.24749 8.07494Z" stroke="#404041" stroke-width="2" />
                        <path d="M11.3617 3.63346C11.8318 5.07856 11.1404 6.32896 10.1799 6.62948C9.21946 6.93 7.91743 6.30334 7.44733 4.85823C6.97723 3.41313 7.66865 2.16273 8.62912 1.86221C9.58958 1.56169 10.8916 2.18835 11.3617 3.63346Z" stroke="#404041" stroke-width="2" />
                        <path d="M18.4485 4.49213C18.2511 5.97849 17.0973 6.815 16.1063 6.68844C15.1154 6.56188 14.2185 5.46346 14.4158 3.97709C14.6132 2.49072 15.767 1.65421 16.758 1.78078C17.749 1.90734 18.6459 3.00576 18.4485 4.49213Z" stroke="#404041" stroke-width="2" />
                        <path d="M22.9637 10.353C21.9637 11.5859 20.5169 11.7012 19.7675 11.1166C19.0182 10.5319 18.8072 9.12348 19.8072 7.89049C20.8072 6.65749 22.254 6.54228 23.0034 7.12689C23.7528 7.71149 23.9638 9.11996 22.9637 10.353Z" stroke="#404041" stroke-width="2" />
                        <path d="M12.9309 9.88281C7.98444 9.88281 6.74781 14.9361 6.74781 17.4628C6.57606 18.6419 7.57223 21.0001 12.9309 21.0001C18.2896 21.0001 19.2858 18.6419 19.114 17.4628C19.114 14.9361 17.8774 9.88281 12.9309 9.88281Z" stroke="#404041" stroke-width="2" />
                     </svg>
                     <span><?= $espacoAtual->animais == "S" ? "Aceita Pet" : "<span style='color: red;'>Não</span> aceita pet" ?></span>
                  </div>
                  <div class="item">
                     <svg width="31" height="22" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="1" width="25" height="17" rx="2" stroke="#404041" stroke-width="2" />
                        <path d="M1 10C1 9.44772 1.44772 9 2 9C3.65685 9 5 10.3431 5 12V17C5 17.5523 4.55228 18 4 18H2C1.44772 18 1 17.5523 1 17V10Z" fill="white" stroke="#404041" stroke-width="2" />
                        <path d="M30 10C30 9.44772 29.5523 9 29 9C27.3431 9 26 10.3431 26 12V17C26 17.5523 26.4477 18 27 18H29C29.5523 18 30 17.5523 30 17V10Z" fill="white" stroke="#404041" stroke-width="2" />
                        <path d="M2 21C2 21.5523 2.44772 22 3 22C3.55228 22 4 21.5523 4 21L2 21ZM2 17L2 21L4 21L4 17L2 17Z" fill="#404041" />
                        <path d="M27 21C27 21.5523 27.4477 22 28 22C28.5523 22 29 21.5523 29 21L27 21ZM27 17L27 21L29 21L29 17L27 17Z" fill="#404041" />
                        <line x1="4" y1="10" x2="27" y2="10" stroke="#404041" stroke-width="2" />
                     </svg>
                     <span><?= $espacoAtual->mobilia == "S" ? "Mobiliado" : "<span style='color: red;'>Não</span> mobiliado" ?></span>
                  </div>
                  <div class="item">
                     <svg width="18" height="28" viewBox="0 0 18 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.33165 25.4336L5.03287 24.7214L3.57192 23.354L2.8707 24.0663L4.33165 25.4336ZM0.655419 26.3163C0.268145 26.7096 0.281242 27.3346 0.684673 27.7122C1.0881 28.0898 1.7291 28.077 2.11637 27.6836L0.655419 26.3163ZM2.8707 24.0663L0.655419 26.3163L2.11637 27.6836L4.33165 25.4336L2.8707 24.0663Z" fill="#404041" />
                        <path d="M15.1269 24.0663L14.4257 23.3541L12.9648 24.7215L13.666 25.4337L15.1269 24.0663ZM15.8813 27.6837C16.2686 28.077 16.9096 28.0898 17.313 27.7122C17.7164 27.3346 17.7295 26.7096 17.3422 26.3162L15.8813 27.6837ZM13.666 25.4337L15.8813 27.6837L17.3422 26.3162L15.1269 24.0663L13.666 25.4337Z" fill="#404041" />
                        <mask id="path-3-inside-1_618_2809" fill="white">
                           <rect width="18" height="24.75" rx="1" />
                        </mask>
                        <rect width="18" height="24.75" rx="1" stroke="#404041" stroke-width="4" stroke-linejoin="round" mask="url(#path-3-inside-1_618_2809)" />
                        <line x1="1.125" y1="4.625" x2="18" y2="4.625" stroke="#404041" stroke-width="2" />
                        <line x1="9.09197e-08" y1="14.75" x2="16.875" y2="14.75" stroke="#404041" stroke-width="2" />
                        <path d="M1.38867 19.5752H5.54251" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                        <path d="M12.4629 19.5752H16.6167" stroke="#404041" stroke-width="2" stroke-linecap="round" />
                     </svg>
                     <span><?= $espacoAtual->transporte ?></span>
                  </div>
               </div>

               <? if ($espacoAtual->principaiscomodidades) {
                  $listaCmdd = explode(";", $espacoAtual->principaiscomodidades) ?>
                  <div class="list-li" id="comodidades">
                     <h2>Principais comodidades</h2>
                     <div class="wraper">
                        <ul>
                           <? foreach ($listaCmdd as $key => $comodidade) {
                              if ($key % 2 == 0) { ?>
                                 <li><?= $comodidade ?></li>
                              <? } ?>
                           <? } ?>
                        </ul>

                        <ul>
                           <? foreach ($listaCmdd as $key => $comodidade) {
                              if ($key % 2 != 0) { ?>
                                 <li><?= $comodidade ?></li>
                              <? } ?>
                           <? } ?>
                        </ul>
                     </div>
                  </div>
               <? } ?>

               <div class="wraper-scroll-cards">
                  <? foreach ($espacoAtual->fotos as $foto) { ?>
                     <a data-fslightbox="new-gallery" href="<?= PATHSITE ?>uploads/produto_foto/<?= $espacoAtual->id ?>/<?= $foto->arquivo ?>"></a>
                  <? } ?>
                  <div class="photos-and-video">

                     <a data-fslightbox="new-gallery" href="<?= PATHSITE ?>uploads/produto_foto/<?= $espacoAtual->id ?>/<?= $espacoAtual->fotoDestaque ?>">
                        <div class="card" style="background-image: url(<?= PATHSITE ?>uploads/produto_foto/<?= $espacoAtual->id ?>/<?= $espacoAtual->fotoDestaque ?>">
                           <div class="wraper">
                              <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.33333C0 2.83554 2.83554 0 6.33333 0H31.6667C35.1646 0 38 2.83554 38 6.33333V29.5534V29.5577V31.6667C38 35.1646 35.1646 38 31.6667 38H6.33333C2.83554 38 0 35.1646 0 31.6667V23.2222V6.33333ZM33.7778 6.33333V24.4589L26.8261 17.5072C26.0017 16.6828 24.665 16.6828 23.8406 17.5072L21.1111 20.2367L13.1039 12.2294C12.2794 11.405 10.9428 11.405 10.1183 12.2294L4.22222 18.1256V6.33333C4.22222 5.16741 5.16741 4.22222 6.33333 4.22222H31.6667C32.8326 4.22222 33.7778 5.16741 33.7778 6.33333ZM4.22222 31.6667V24.0966L11.6111 16.7078L19.6183 24.715C20.4427 25.5394 21.7795 25.5394 22.6039 24.715L25.3333 21.9855L33.7778 30.43V31.6667C33.7778 32.8326 32.8326 33.7778 31.6667 33.7778H6.33333C5.16741 33.7778 4.22222 32.8326 4.22222 31.6667ZM24.2778 14.7778C26.0266 14.7778 27.4444 13.36 27.4444 11.6111C27.4444 9.8622 26.0266 8.44444 24.2778 8.44444C22.5289 8.44444 21.1111 9.8622 21.1111 11.6111C21.1111 13.36 22.5289 14.7778 24.2778 14.7778Z" fill="white" />
                              </svg>
                              <span>Ver todas as fotos</span>
                           </div>
                        </div>
                     </a>

                     <a href="#" class="btn-videos">
                        <div class="card" style="background-image: url(<?= PATHSITE ?>uploads/produto_foto/<?= $espacoAtual->id ?>/<?= $espacoAtual->fotoDestaque ?>);">
                           <div class="wraper">
                              <svg width="34" height="38" viewBox="0 0 34 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M31.9346 19L2.75001 35.4912L2.75 2.50876L31.9346 19Z" stroke="white" stroke-width="4" />
                              </svg>
                              <span>Assistir Vídeos</span>
                           </div>
                        </div>
                     </a>

                  </div>
               </div>

               <div class="faq">
                  <? if ($espacoAtual->comodidades) { ?>
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
                           <? foreach ($espacoAtual->comodidades as $categoria) {
                              $listaComodidades = explode(";", $categoria->comodidades) ?>
                              <div class="item">
                                 <strong><?= $categoria->titulo ?></strong>
                                 <ul>
                                    <? foreach ($listaComodidades as $comodidade) { ?>
                                       <li><?= $comodidade ?></li>
                                    <? } ?>
                                 </ul>
                              </div>
                           <? } ?>
                        </div>
                     </div>
                  <? } ?>

                  <? if ($espacoAtual->proximidades) { ?>
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
                           <? foreach ($espacoAtual->proximidades as $proximidade) { ?>
                              <div class="topic">
                                 <img src="<?= PATHSITE ?>uploads/proximidade/<?= $proximidade->arquivo ?>" alt="ícone da proximidade">
                                 <div>
                                    <strong><?= $proximidade->titulo ?></strong>
                                    <span><?= $proximidade->proximidades ?></span>
                                 </div>
                              </div>
                           <? } ?>
                        </div>
                     </div>
                  <? } ?>

                  <? if ($espacoAtual->condominio) { ?>

                     <div class="faq-item" data-aos="fade-right">
                        <div class="faq-title">
                           <div class="icon-title">
                              <img src="<?= PATHSITE ?>assets/images/icon-faq-3.svg" alt="">
                           </div>
                           <div class="group-title">
                              <h3>Condomínio</h3>
                              <span>Itens disponíveis relacionados ao condomínio do imóvel</span>
                           </div>
                           <div class="icon-dropdown">
                              <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                           </div>
                        </div>
                        <div class="faq-response">
                           <div class="item">
                              <ul>
                                 <? $itens = explode(";", $espacoAtual->condominio);
                                 foreach ($itens as $item) { ?>
                                    <li><?= $item ?></li>
                                 <? } ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  <? } ?>

                  <? if ($espacoAtual->observacoes) { ?>
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
                              <?= $espacoAtual->observacoes ?>
                           </div>
                        </div>
                     </div>
                  <? } ?>
               </div>

            </article>
         </div>

         <div class="column">
            <div class="sticky">
               <aside class="box">
                  <table>
                     <tbody>
                        <tr>
                           <td>Aluguel</td>
                           <td>R$<?= number_format($espacoAtual->preco, 2, ",", ".") ?></td>
                        </tr>
                        <? if ($espacoAtual->valores) {
                           foreach ($espacoAtual->valores as $valor) { ?>
                              <tr>
                                 <td><?= $valor->titulo ?></td>
                                 <td class="<?= $valor->valor == 0 ? 'empashis' : '' ?>">
                                    R$<?= number_format($valor->valor, 2, ",", ".") ?>
                                 </td>
                              </tr>
                           <? } ?>
                        <? } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td>Total</td>
                           <td>R$<?= number_format($espacoAtual->total, 2, ",", ".") ?></td>
                        </tr>
                     </tfoot>
                  </table>
                  <a href="#" class="btn-primary">
                     <img src="<?= PATHSITE ?>assets/images/icon-whatsapp.svg" alt="">
                     Agendar visita
                  </a>
               </aside>

               <div class="box-ads">
                  <img src="<?= PATHSITE ?>uploads/anunciante/<?= $espacoAtual->anunciante->arquivo ?>" alt="foto do anunciante">
                  <div>
                     <span class="type">Anunciante</span>
                     <span class="title"><?= $espacoAtual->anunciante->titulo ?></span>
                     <ul>
                        <li>
                           <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                           <span><?= $espacoAtual->anunciante->telefone ?></span>
                        </li>
                        <? if ($espacoAtual->anunciante->telefone2) { ?>
                           <li>
                              <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                              <span><?= $espacoAtual->anunciante->telefone2 ?></span>
                           </li>
                        <? } ?>
                        <? if ($espacoAtual->anunciante->telefone3) { ?>
                           <li>
                              <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                              <span><?= $espacoAtual->anunciante->telefone3 ?></span>
                           </li>
                        <? } ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </section>

   <? if ($servicosEmAlta) { ?>
      <section class="s-service" id="servicos-destaque">

         <div class="container-medium">
            <header data-aos="fade-up">
               <h2>Prestadores de Serviços em destaque </h2>
               <p>Prestadores de serviços na sua região que podem ajudar com o seu imóvel</p>
            </header>
         </div>

         <div class="list list-of-swiper">
            <div class="swiper rent-interna">
               <div class="swiper-wrapper">
                  <? foreach ($servicosEmAlta as $servico) { ?>
                     <div class="swiper-slide">
                        <?= view("templates/services-destaque-card", (array)$servico); ?>
                     </div>
                  <? } ?>
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

<div class="box-agendar-float">
   <a href="#" class="btn-primary btn-agendar">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white" />
      </svg>
      Agendar visita
   </a>
</div>

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