<style>
   @media screen and (max-width: 769px) {
      main {
         margin-bottom: 0;
      }
   }
</style>

<main>
   <div class="container-medium">
      <nav class="navigation-breadcrumb">
         <a href="<?= PATHSITE ?>">Início</a>
         <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            </path>
         </svg>
         <a href="<?= PATHSITE ?>blog/">Blog</a>
      </nav>

      <? if ($artigoDestaque) { ?>
         <a href="<?= PATHSITE ?>blog/<?= $artigoDestaque->identificador ?>/" class="link-wraper-post">
            <article class="blog-list-article-post" data-aos="fade-up">
               <div class="cover">
                  <picture>
                     <source srcset="<?= PATHSITE ?>uploads/artigo/<?= $artigoDestaque->arquivo ?>.webp" type="image/webp">
                     <img src="<?= PATHSITE ?>uploads/artigo/<?= $artigoDestaque->arquivo ?>" alt="capa do artigo" />
                  </picture>
               </div>
               <div class="info">
                  <span class="featured-article">
                     <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_810_552)">
                           <path d="M14.9575 5.74614C14.8458 5.40261 14.5327 5.16407 14.1717 5.1479L9.8377 4.95202L8.31162 0.890244C8.18465 0.552246 7.86118 0.328125 7.49998 0.328125C7.13878 0.328125 6.81531 0.552246 6.68834 0.890244L5.1623 4.95202L0.828263 5.1479C0.467296 5.16407 0.154201 5.40261 0.0424917 5.74614C-0.069188 6.08968 0.0440152 6.46679 0.326349 6.69193L3.71764 9.39803L2.56469 13.581C2.46889 13.9293 2.59853 14.3003 2.89094 14.5129C3.18347 14.7251 3.5766 14.734 3.87836 14.5351L7.49998 12.146L11.1216 14.5351C11.4233 14.734 11.8165 14.7251 12.109 14.5129C12.4014 14.3006 12.531 13.9293 12.4351 13.581L11.2824 9.39803L14.6736 6.69193C14.956 6.46676 15.0692 6.08965 14.9575 5.74614Z" fill="#404041" />
                        </g>
                        <defs>
                           <clipPath id="clip0_810_552">
                              <rect width="15" height="15" fill="white" />
                           </clipPath>
                        </defs>
                     </svg>
                     <svg class="active" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_810_552)">
                           <path d="M14.9575 5.74614C14.8458 5.40261 14.5327 5.16407 14.1717 5.1479L9.8377 4.95202L8.31162 0.890244C8.18465 0.552246 7.86118 0.328125 7.49998 0.328125C7.13878 0.328125 6.81531 0.552246 6.68834 0.890244L5.1623 4.95202L0.828263 5.1479C0.467296 5.16407 0.154201 5.40261 0.0424917 5.74614C-0.069188 6.08968 0.0440152 6.46679 0.326349 6.69193L3.71764 9.39803L2.56469 13.581C2.46889 13.9293 2.59853 14.3003 2.89094 14.5129C3.18347 14.7251 3.5766 14.734 3.87836 14.5351L7.49998 12.146L11.1216 14.5351C11.4233 14.734 11.8165 14.7251 12.109 14.5129C12.4014 14.3006 12.531 13.9293 12.4351 13.581L11.2824 9.39803L14.6736 6.69193C14.956 6.46676 15.0692 6.08965 14.9575 5.74614Z" fill="#932327" />
                        </g>
                        <defs>
                           <clipPath id="clip0_810_552">
                              <rect width="15" height="15" fill="white" />
                           </clipPath>
                        </defs>
                     </svg>
                     Matéria Destaque
                  </span>
                  <span class="tagline"><?= $cats[$artigoDestaque->categoriaFK] ?></span>
                  <h2><?= $artigoDestaque->titulo ?></h2>
                  <p><?= character_limiter($artigoDestaque->texto, 255) ?></p>
                  <a href="<?= PATHSITE ?>blog/<?= $artigoDestaque->identificador ?>" class="more">
                     Ler artigo
                     <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 13L6 7.5L2 2" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </a>
               </div>
            </article>
         </a>
      <? } ?>

      <div class="more-about-modal">
         <span>Leia sobre</span>

         <a href="javascript:void(0)">
            todas as categorias
            <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M2 2L7.5 6L13 2" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg class="active" width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M2 2L7.5 6L13 2" stroke="#c82328" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </a>

         <? if ($categorias) { ?>
            <div class="modal-more-categories">
               <div class="wraper-scroll">
                  <nav class="content">
                     <? foreach ($categorias as $categoria) { ?>
                        <a href="<?= PATHSITE ?>blog/categoria/<?= $categoria->identificador ?>">
                           <?= $categoria->titulo ?>
                        </a>
                     <? } ?>
                  </nav>
               </div>
            </div>
         <? } ?>

      </div>
   </div>

   <section class="most-read" id="most-read">
      <div class="container-medium">
         <h2>Mais lidas</h2>
         <? if ($artigosMaisLidos) { ?>
            <div class="list" data-aos="fade-up">
               <? foreach ($artigosMaisLidos as $artigo) {
                  echo view("templates/blog-card", (array)$artigo);
               } ?>
            </div>
         <? } ?>
      </div>
   </section>

   <!-- Incluir -->
   <div class="banner-zinho" data-aos="fade-up">
      <div class="container-medium">

         <a href="<?= $anuncioBannerH->link ?>">
            <div class="banner-zinho" data-aos="fade-up">
               <div class="container-medium">

                  <picture>
                     <source srcset="<?= PATHSITE ?>uploads/texto<?= $anuncioBannerH->arquivo2 ?>.webp" type="image/webp">
                     <img src="<?= PATHSITE ?>uploads/texto/<?= $anuncioBannerH->arquivo2 ?>" class="only-mobile">
                  </picture>

                  <picture>
                     <source srcset="<?= PATHSITE ?>uploads/texto/<?= $anuncioBannerH->arquivo ?>.webp" type="image/webp">
                     <img src="<?= PATHSITE ?>uploads/texto/<?= $anuncioBannerH->arquivo ?>">
                  </picture>

               </div>
            </div>
         </a>
      </div>
   </div>

   <section class="s-last" id="last">
      <div class="container-medium">
         <h2>Mais recentes</h2>

         <? if ($artigosRecentes) { ?>
            <div class="list">
               <? foreach ($artigosRecentes as $artigo) {
                  echo view("templates/blog-card", (array)$artigo);
               } ?>
            </div>
         <? } ?>

         <?= $pager->links("artigos") ?>
      </div>
   </section>
</main>