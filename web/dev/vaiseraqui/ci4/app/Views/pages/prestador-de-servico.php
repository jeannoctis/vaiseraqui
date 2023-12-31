<style>
    @media screen and (max-width: 769px) {
        .internal-rent .more-about-2-column .container-medium .column:first-of-type > article .list-items {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
    }
</style>

<main>
    <section class="s-text-and-slider">
        <div class="info" data-aos="fade-right">
            <div>
                <span class="type"><?= $metatag->categoria ?></span>
                <h1><?= $metatag->titulo ?></h1>
                <span class="location"><?= $metatag->cidade ?>-<?= $metatag->estado ?></span>
                <div class="desc">            
                    <?= $metatag->descricao ?>
                </div>
            </div>

            <footer>
                  <? if($anunciante->whatsapp && $anunciante->pago == 'S'){?>
                    <div class="buttons one-button">
                        <a target='_blank' onclick="abreWhatsapp('<?= encode($metatag->id) ?>');" href="<?= $anunciante->whatsapp ?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?= $metatag->titulo ?>" class="btn-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"/>
                            </svg>                
                            Agendar
                        </a>
                    </div>
                <? } else { ?>
                   <div class="buttons one-button">
                   <a  onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="mailto:<?=$anunciante->email?>" class="btn-primary">
                  <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.6 2H25.4C26.83 2 28 3.125 28 4.5V19.5C28 20.875 26.83 22 25.4 22H4.6C3.17 22 2 20.875 2 19.5V4.5C2 3.125 3.17 2 4.6 2Z" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M28 4.30859L15 13.5395L2 4.30859" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
                  Agendar visita
               </a>
                    </div>   
               <? } ?>
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
                    <? if ($fotos) { ?>
                         <a data-fslightbox="presentation-1" href="<?=PATHSITE?>uploads/produto/<?=$fotos[0]->produtoFK?>/<?=$fotos[0]->arquivo?>" class="btn photo">
                            <img src="<?= PATHSITE ?>assets/images/icon-photo.png" alt="">
                                <?= count($fotos) ?> Fotos
                        </a>
                    <? } ?>
                    <? if($videos){?>
                    <a onclick="verVideos();" class="btn btn-videos"  >
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
                                                <?
                                                if ($fotos) {
                                                    foreach ($fotos as $foto) {
                                                        ?>
                                                        <a data-fslightbox="mobile-presentation-1" href="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?><?= $foto->arquivo ?>">
                                                            <img class="mode-slide" src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                                        </a>
                                                    <? }
                                                }
                                                ?> 
                                            </div>  
<? if ($fotos) { ?>
                                                <div class="swiper presentationSwiper">
                                                    <div class="swiper-wrapper">
    <? foreach ($fotos as $foto) { ?>
                                                            <div class="swiper-slide">
                                                                <div class="item"> 
                                                                    <a data-fslightbox="presentation-1" href="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>">
                                                                        <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
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
                                            <section class="more-about-2-column" id="sobre">
                                                <div class="container-medium">
                                                    <div class="column">
                                                        <nav class="navigation-breadcrumb" data-aos="fade-up">
                                                            <a href="<?= PATHSITE ?>">Início</a>
                                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>            
                                                            <a href="<?= PATHSITE ?><?= $segments[0] ?>/">Prestadores de Serviço</a>
                                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>            
                                                            <a href="#"><?= $metatag->cidade ?></a>
                                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>            
                                                            <a href="#"><?= $metatag->titulo ?></a>
                                                        </nav>
                                                        <aside class="info-slider" data-aos="fade-up">
                                                            <div class="price">
                                                            </div>
                                                            <div class="buttons">
                                                                <a href="#">Ver mais detalhes</a>
                                                            </div>
                                                        </aside>
                                                        <div class="navigation-breadcrumb-mobile" data-aos="fade-right">
                                                            <a href="#">
                                                                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6 1L1 6L6 11" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
<?= $metatag->titulo ?></a>
                                                        </div>
                                                        <div class="info-about-item" data-aos="fade-right">
                                                            <aside class="service-providers">
                                                                <form action="#">
                                                                    <div class="input-group">
                                                                        <label for="date-event">Data do Evento</label>
                                                                        <input type="text" readonly="" name="" value="" id="mobile-table-checkin" class="">                
                                                                    </div>
                                                                    <div style='display: none; margin-top: 15px;' id='maisDeUmDia2' class="input-group">
                                                                        <label for="date-event">Data final do Evento</label>
                                                                        <input type="text" readonly name="" value="" id="mobile-table-checkout">                
                                                                    </div>
                                                                    <div  class="checkbox">                  
                                                                        <input onclick='$("#maisDeUmDia2").toggle();' type="checkbox" name="" id="checkbox-event2">
                                                                        <label   for="checkbox-event">Evento de mais de 01 dia</label>
                                                                    </div>
                                                                    <div class="input-group j-input-order-select">
                                                                        <label for="select-people">Quantidade de pessoas</label>
                                                                        <div class="modal-order">
                                                                            <input readonly="" type="text" value="Selecione">
                                                                                <div class="modal-order-select">
                                                                                    <div class="wraper-scroll">
                                                                                        <div class="content">
                                                                                            <?
                                                                                            $i = 10;
                                                                                            while ($i <= $metatag->hospedes) {
                                                                                                ?>
                                                                                                <a onclick='$("#quantidadePessoas").val(<?= $i ?>)' href="#" class="active" data-select-value="Até <?= $i ?> pessoas">Até <?= $i ?> pessoas</a>
    <? $i = $i + 10;
}
?>                          
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
 <? if($anunciante->whatsapp && $anunciante->pago == 'S'){?>
                                                                        <a onclick="abreWhatsapp('<?= encode($metatag->id) ?>'); agendar('prestadores-de-servicos', '<?= PATHSITE . $tipoAtual->identificador . '/' . $metatag->identificador . '/' ?>', '<?= $anunciante->whatsapp ?>', 'mobile');" href="#" class="btn-primary">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"></path>
                                                                            </svg>                
                                                                            Agendar
                                                                        </a>
<? } else { ?>
         <a  onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="mailto:<?=$anunciante->email?>" class="btn-primary">
                  <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.6 2H25.4C26.83 2 28 3.125 28 4.5V19.5C28 20.875 26.83 22 25.4 22H4.6C3.17 22 2 20.875 2 19.5V4.5C2 3.125 3.17 2 4.6 2Z" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M28 4.30859L15 13.5395L2 4.30859" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
                  Agendar visita
               </a>     
<? } ?>
                                                                </form>
                                                            </aside>
                                                        </div>          
                                                        <article data-aos="fade-right">
                                                            <h2>
<?= $metatag->titulo ?>
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
                                                                    <?
                                                                    $hoje = new Datetime('');
                                                                    $dataCriacao = new DateTime($metatag->dtCriacao);

                                                                    $interval = $hoje->diff($dataCriacao);
                                                                    ?>
                                                                    Publicado há <?= $interval->days ?> dias
                                                                </span>
                                                            </h2>

                                                            <div>
<?= $metatag->texto ?>
                                                            </div>
                                                            <div class="list-items"></div>            

                                                            <div class="faq">
<? if ($cardapio) { ?>
                                                                    <div class="faq-item" data-aos="fade-right">
                                                                        <div class="faq-title">
                                                                            <div class="icon-title">
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-faq-10.svg" alt="">
                                                                            </div>
                                                                            <div class="group-title">
                                                                                <h3>Cardápio</h3>
                                                                                <span>Confira o que oferecemos em nosso buffet</span>
                                                                            </div>
                                                                            <div class="icon-dropdown">
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="faq-response">
                                                                            <div class="box-menu">
                                                                                <?
                                                                                foreach ($cardapio as $carda) {
                                                                                    $menu = explode(";", $carda->menu);
                                                                                    ?>
                                                                                    <div class="wraper">
                                                                                        <h4><?= $carda->titulo ?></h4>
                                                                                            <? if ($menu) { ?>
                                                                                            <ul>
                                                                                            <? foreach ($menu as $men) { ?>
                                                                                                    <li><?= $men ?></li>
                                                                                        <? } ?>
                                                                                            </ul>
                                                                                    <? } ?>
                                                                                    </div>
    <? } ?>

    <? if ($metatag->cardapio) { ?>
                                                                                    <div class="wraper">
                                                                                        <div class="menu-pdf">
                                                                                            <span>Cardápio completo</span>
                                                                                            <a download href="<?= PATHSITE ?>uploads/produto/<?= $metatag->cardapio ?>" download="">Baixar cardápio em PDF</a>
                                                                                        </div>
                                                                                    </div>
                                                                    <? } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>           
<? } ?>
                                                                <div class="faq-item" data-aos="fade-right">
                                                                    <div class="faq-title">
                                                                        <div class="icon-title" style="margin-top: 4px;">
                                                                            <img src="<?= PATHSITE ?>assets/images/icon-faq-4.svg" alt="">
                                                                        </div>
                                                                        <div class="group-title">
                                                                            <h3>Observações</h3>
                                                                            <span>Alguns pontos que você precisa saber sobre nossos serviços</span>
                                                                        </div>
                                                                        <div class="icon-dropdown">
                                                                            <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="faq-response">
                                                                        <div class="post post-short">
<?= $metatag->observacoes ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="faq-item" data-aos="fade-right">
                                                                    <div class="faq-title">
                                                                        <div class="icon-title" style="margin-top: 4px;">
                                                                            <img src="<?= PATHSITE ?>assets/images/icon-faq-6.svg" alt="">
                                                                        </div>
                                                                        <div class="group-title">
                                                                            <h3>O que fazemos e não fazemos</h3>
                                                                            <span>O que você pode e não pode esperar dos nossos serviços</span>
                                                                        </div>
                                                                        <div class="icon-dropdown">
                                                                            <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="faq-response">
                                                                        <div class="card-item-icon">
                                                                            <h4>
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-faq-allowed.svg" alt="">
                                                                                    O que fazemos:
                                                                            </h4>
                                                                            <p> <p><?= $metatag->pode ?></p></p>
                                                                        </div>
                                                                        <div class="card-item-icon">
                                                                            <h4>
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-faq-prohibited.svg" alt="">
                                                                                    O que não fazemos:
                                                                            </h4>
                                                                            <p><?= $metatag->naopode ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?
                                                                if ($metatag->eventosatendidos) {
                                                                    $eventosAtentidos = explode(";", $metatag->eventosatendidos);
                                                                    ?>
                                                                    <div class="faq-item" data-aos="fade-right">
                                                                        <div class="faq-title">
                                                                            <div class="icon-title" style="margin-top: 4px;">
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-faq-11.svg" alt="">
                                                                            </div>
                                                                            <div class="group-title">
                                                                                <h3>Eventos que atendemos</h3>
                                                                                <span>Espaço e eventos que nossos serviços combinam bem</span>
                                                                            </div>
                                                                            <div class="icon-dropdown">
                                                                                <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="faq-response">
                                                                            <div class="item">
                                                                                <ul>
    <? foreach ($eventosAtentidos as $atend) { ?> 
                                                                                        <li><?= $atend ?></li>
    <? } ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
<? } ?>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <div class="column">
                                                        <div class="sticky">
                                                            <aside class="service-providers">
                                                                <form action="#">
                                                                    <div class="input-group">
                                                                        <label for="date-event">Data do Evento</label>
                                                                        <input type="text" readonly name="" value="" id="desktop-table-checkin">                
                                                                    </div>
                                                                    <div style='display: none; margin-top: 15px;' id='maisDeUmDia' class="input-group">
                                                                        <label for="date-event">Data final do Evento</label>
                                                                        <input type="text" readonly name="" value="" id="desktop-table-checkout">                
                                                                    </div>
                                                                    <div  class="checkbox">                  
                                                                        <input onclick='$("#maisDeUmDia").toggle();' type="checkbox" name="" id="checkbox-event">
                                                                            <label onclick='$("#maisDeUmDia").toggle();'  for="checkbox-event">Evento de mais de 01 dia</label>
                                                                    </div>

                                                                    <div class="input-group j-input-order-select">
                                                                        <label for="select-people">Quantidade de pessoas</label>
                                                                        <input type='hidden' id='quantidadePessoas' />
                                                                        <div class="modal-order">
                                                                            <input readonly="" type="text" value="Selecione">
                                                                                <div class="modal-order-select">
                                                                                    <div class="wraper-scroll">
                                                                                        <div class="content">
                                                                                            <?
                                                                                            $i = 10;
                                                                                            while ($i <= $metatag->hospedes) {
                                                                                               
                                                                                                ?>
                                                                                                <a onclick='$("#quantidadePessoas").val(<?= $i ?>)' href="#" class="active" data-select-value="Até <?= $i ?> pessoas">Até <?= $i ?> pessoas</a>
    <? 
     $i = $i+10;
}
?>                          
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <button>
                                                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M1 1L7 7L13 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>                    
                                                                        </button>
                                                                    </div>
      <? if($anunciante->whatsapp && $anunciante->pago == 'S'){?>
                                                                        <a onclick="abreWhatsapp('<?= encode($metatag->id) ?>'); agendar('prestadores-de-servicos', '<?= PATHSITE . $tipoAtual->identificador . '/' . $metatag->identificador . '/' ?>', '<?= $anunciante->whatsapp ?>', 'mobile');" href="#" class="btn-primary">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"/>
                                                                            </svg>                
                                                                            Agendar
                                                                        </a>
 <? } else { ?>
                        <a  onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="mailto:<?=$anunciante->email?>" class="btn-primary">
                  <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.6 2H25.4C26.83 2 28 3.125 28 4.5V19.5C28 20.875 26.83 22 25.4 22H4.6C3.17 22 2 20.875 2 19.5V4.5C2 3.125 3.17 2 4.6 2Z" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M28 4.30859L15 13.5395L2 4.30859" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
                  Agendar visita
               </a> 
                    <? } ?>
                                                                </form>
                                                            </aside>
                                            <?= View('templates/anunciante') ?>           
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

<?= view("templates/prestadores-servico", (array) $destaque) ?>

                                            </main>
 <? if($anunciante->whatsapp && $anunciante->pago == 'S'){?>
                                                <div class="box-agendar-float">
                                                    <a target='_blank' onclick="abreWhatsapp('<?= encode($metatag->id) ?>');"  href="<?= $anunciante->whatsapp ?>&text=Olá, vim pelo site vaiseraqui.com.br e tenho interesse no anúncio: <?= $metatag->titulo ?>" class="btn-primary btn-agendar">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="white"/>
                                                        </svg>                
                                                        Agendar visita
                                                    </a>
                                                </div>
<? } else { ?>
 <div class="box-agendar-float">
   <a  onclick="abreWhatsapp('<?=encode($metatag->id)?>');"  href="mailto:<?=$anunciante->email?>" class="btn-primary btn-agendar">
                  <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.6 2H25.4C26.83 2 28 3.125 28 4.5V19.5C28 20.875 26.83 22 25.4 22H4.6C3.17 22 2 20.875 2 19.5V4.5C2 3.125 3.17 2 4.6 2Z" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M28 4.30859L15 13.5395L2 4.30859" stroke="#FFF" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
                  Agendar visita
               </a>    
 </div>
<? } ?>

<script>
  const shareButtons = document.querySelectorAll('.share');
  shareButtons.forEach(btn => {
    btn.addEventListener("click", async () => {
    try {
      await navigator.share({
        title: "<?= $metatag->titulo ?>",
        url: "<?= PATHSITE ?>espaco/<?= $metatag->identificador ?>/"
      });
      console.log("Data was shared successfully");
    } catch (err) {
      console.error("Share failed:", err.message);
    }
  });
  })
  
</script>