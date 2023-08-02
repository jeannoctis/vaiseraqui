<main>
   <!-- Banner -->
   <article class="presentation">
      <div class="content">
         <div class="text">
            <? $banner->titulo = preg_replace('#\*{1}(.*?)\*{1}#', '<strong>$1</strong>', $banner->titulo); ?>
            <h1 data-aos="fade-right"><?= $banner->titulo ?></h1>
            <div class="cover mobile" data-aos="fade-left">
               <div class="float-card float-animation-down">
                  <span><img src="<?= PATHSITE ?>uploads/banner/<?= $banner->icone1 ?>" alt="ícone característica"></span>
               </div>
               <div class="float-card float-animation-up">
                  <span><img src="<?= PATHSITE ?>uploads/banner/<?= $banner->icone2 ?>" alt="ícone característica"></span>
               </div>
               <picture>
                  <? if (is_file(PATHHOME . "uploads/banner/{$banner->arquivo}.webp")) { ?>
                     <source srcset="<?= PATHSITE ?>uploads/banner/<?= $banner->arquivo ?>.webp">
                  <? } ?>
                  <img src="<?= PATHSITE ?>uploads/banner/<?= $banner->arquivo ?>" alt="banner" class="presentation-cover">
               </picture>
               <!-- <img src="<?= PATHSITE ?>assets/images/cover-home-1-mobile.png" alt="" class="presentation-cover"> -->
            </div>
            <p data-aos="fade-right"><?= $banner->descricao ?></p>
            <a data-aos="fade-up" href="#" href="#" class="btn-primary"><?= $banner->botao ?></a>
         </div>
         <div class="cover desktop" data-aos="fade-left">
            <div class="float-card float-animation-down">
               <span><img src="<?= PATHSITE ?>uploads/banner/<?= $banner->icone1 ?>" alt="ícone característica"></span>
            </div>
            <div class="float-card float-animation-up">
               <span><img src="<?= PATHSITE ?>uploads/banner/<?= $banner->icone2 ?>" alt="ícone característica"></span>
            </div>
            <picture>
               <? if (is_file(PATHHOME . "uploads/banner/{$banner->arquivo2}.webp")) { ?>
                  <source srcset="<?= PATHSITE ?>uploads/banner/<?= $banner->arquivo2 ?>.webp">
               <? } ?>
               <img src="<?= PATHSITE ?>uploads/banner/<?= $banner->arquivo2 ?>" alt="banner" class="presentation-cover">
            </picture>
         </div>
      </div>
   </article>

   <!-- Filtros -->
   <?= view("templates/filtro-mobile") ?>
   <?= view("templates/filtro-desktop") ?>

   <!-- Projetos -->
   <div class="recent-projects" id="project" data-aos="fade-up">
      <div class="content">
         <div class="group-title" data-aos="fade-right">
            <h2>Nossos projetos</h2>
            <h3><?= $txPjRecentes->titulo ?></h3>
            <p><?= $txPjRecentes->descricao ?></p>
         </div>
         <div class="swiper custom ourProjects" data-aos="fade-up">
            <div class="swiper-wrapper">
               <? foreach ($pjRecentes as $projeto) { ?>
                  <div class="swiper-slide">
                     <?= view("templates/project-card", (array)$projeto) ?>
                  </div>
               <? } ?>
            </div>
            <div class="navigation">
               <div class="buttons">
                  <button class="prev">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                     </svg>
                  </button>
                  <button class="has-more next">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                     </svg>
                  </button>
               </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
         </div>
         <div class="swiper custom ourProjectsResponsive" data-aos="fade-up">
            <div class="swiper-wrapper">
               <? foreach ($pjRecentes as $projeto) { ?>
                  <div class="swiper-slide">
                     <?= view("templates/project-card", (array)$projeto) ?>
                  </div>
               <? } ?>
            </div>
            <div class="navigation">
               <div class="buttons">
                  <button class="prev">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                     </svg>
                  </button>
                  <button class="has-more next">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                     </svg>
                  </button>
               </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
         </div>
         <div class="only-mobile" data-aos="fade-up">
            <? foreach ($pjRecentes as $projeto) { ?>
               <?= view("templates/project-card", (array)$projeto) ?>
            <? } ?>
         </div>
      </div>
   </div>
   <div class="recent-projects" data-aos="fade-up">
      <div class="content">
         <div class="group-title">
            <h3><?= $txPjRelevantes->titulo ?></h3>
            <p><?= $txPjRelevantes->descricao ?></p>
         </div>
         <div class="wraper">
            <? foreach ($pjRelevantes as $projeto) { ?>
               <?= view("templates/project-card", (array)$projeto) ?>
            <? } ?>
         </div>
         <a href="<?= PATHSITE ?>projetos/" class="btn-primary" data-aos="fade-up">Ver todos os projetos</a>
      </div>
   </div>

   <!-- Sobre Nós -->
   <div class="about" id="about">
      <div class="content">
         <div class="text">
            <h2 data-aos="fade-right">Sobre nós</h2>
            <h3 data-aos="fade-right"><?= $sobreNos->titulo ?></h3>
            <div data-aos="fade-right"><?= $sobreNos->texto ?></div>            
            <a data-aos="fade-right" href="<?= PATHSITE ?>sobre-nos/" class="btn-primary hide-1200">Conheça mais</a>
         </div>
         <div class="cover" data-aos="fade-left">
            <div class="card-float-with-image-and-text float-animation-down">
               <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo3 ?>" alt="">
               <div>
                  <h5>+200</h5>
                  <p><?= $sobreNos->extra1 ?></p>
               </div>
            </div>
            <div class="card-float-with-image-and-text float-animation-up">
               <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo4 ?>" alt="">
               <div>
                  <h5>+200</h5>
                  <p><?= $sobreNos->extra2 ?></p>
               </div>
            </div>

            <picture>
               <source srcset="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo2 ?>" media="(max-width: 1200px)" />
               <source srcset="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo ?>" media="(min-width: 1200px)" />
               <img src="<?= PATHSITE ?>uploads/texto/about.png" alt="" class="post">
            </picture>
         </div>
         <a data-aos="fade-up" href="<?= PATHSITE ?>sobre-nos/" class="btn-primary show-1200">Conheça mais</a>
      </div>
      <div class="content revert mt-110 hide-1200" data-aos="fade-up">
         <div class="text">
            <h3><?= $sobreNos->descricao ?></h3>
            <p><?= $sobreNos->texto2 ?></p>
         </div>
         <div class="cover" style="width: 520px; height: 450px; border-radius: 16px; background: linear-gradient(1deg, #000 0%, rgba(0, 0, 0, 0.00) 100%), linear-gradient(1deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.00) 100%), url(<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo5 ?>), lightgray 50% / cover no-repeat;">
            <div class="info-video">
               <? if ($sobreNos->video) {
                  $url_components = parse_url($sobreNos->video);
                  if ($url_components) {
                     parse_str($url_components['query'], $params);
                  }
               } ?>
               <button class="j-button-open-modal" data-video-id="<?= $params['v'] ?>">
                  <img src="<?= PATHSITE ?>assets/images/play.svg" alt="botão play">
               </button>
               <h6><?= $sobreNos->botao ?></h6>
            </div>
            <!-- <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo5 ?>" alt="capa do vídeo" class="post"> -->
         </div>
      </div>
   </div>

   <!-- Reviews -->
   <? if ($depoimentos) { ?>
      <div class="review" data-aos="fade-up" id="depoimentos">
         <div class="content">
            <div class="group-title">
               <h2>Depoimentos</h2>
               <h3><?= $txDepoimentos->titulo ?></h3>
               <p><?= $txDepoimentos->descricao ?></p>
            </div>

            <section class="box-reviews">
               <div class="swiper custom reviewsSwiper">
                  <div class="swiper-wrapper">
                     <? foreach ($depoimentos as $depoimento) { ?>
                        <div class="swiper-slide">
                           <article>
                              <p><?= character_limiter($depoimento->texto, 328) ?></p>
                              <? if (strlen($depoimento->texto) >= 329) { ?>
                                 <a href="#" class="more j-button-review" onclick="reviewInfo(<?= $depoimento->id ?>)">Leia mais</a>
                              <? } ?>
                              <div class="author">
                                 <? if ($depoimento->arquivo) { ?>
                                    <img src="<?= PATHSITE ?>uploads/review/<?= $depoimento->arquivo ?>" width="64" alt="foto do cliente">
                                 <? } ?>
                                 <div class="author-info">
                                    <h6><?= $depoimento->autor ?></h6>
                                    <p><?= $depoimento->profissao ?></p>
                                 </div>
                              </div>
                              <? if ($depoimento->video) {
                                 $url_components = parse_url($depoimento->video);
                                 if ($url_components) {
                                    parse_str($url_components['query'], $params);
                                 } ?>
                                 <a href="#" class="btn-review-video j-button-open-modal" data-video-id="<?= $params['v'] ?>">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <circle cx="16" cy="16" r="16" fill="#333333" />
                                       <path d="M20.5 15.134C21.1667 15.5189 21.1667 16.4811 20.5 16.866L14.5 20.3301C13.8333 20.715 13 20.2339 13 19.4641L13 12.5359C13 11.7661 13.8333 11.285 14.5 11.6699L20.5 15.134Z" fill="white" />
                                    </svg>
                                    <span>Assistir video</span>
                                 </a>
                              <? } ?>
                           </article>
                        </div>
                     <? } ?>
                  </div>
                  <div class="navigation">
                     <div class="buttons">
                        <button class="prev">
                           <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                           </svg>
                        </button>
                        <button class="has-more next">
                           <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-pagination"></div>
               </div>

            </section>
         </div>
      </div>
   <? } ?>

   <!-- blog -->
   <? if ($artigos) { ?>
      <section class="blog" id="blog" data-aos="fade-up">
         <div class="content">
            <div class="group-title">
               <h2>blog</h2>
               <h3><?= $txBlog->titulo ?></h3>
               <p><?= $txBlog->descricao ?></p>
            </div>
            <div class="wraper">
               <? foreach ($artigos as $artigo) {
                  echo view("templates/artigo-card", (array)$artigo);
               } ?>
            </div>
            <div class="swiper custom swiper-only-mobile">
               <div class="swiper-wrapper">
                  <? foreach ($artigos as $artigo) { ?>
                     <div class="swiper-slide">
                        <?= view("templates/artigo-card", (array)$artigo) ?>
                     </div>
                  <? } ?>
               </div>
               <div class="navigation" data-aos="fade-up">
                  <div class="buttons">
                     <button class="prev">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                        </svg>
                     </button>
                     <button class="has-more next">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                        </svg>
                     </button>
                  </div>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
            </div>
            <a href="<?= PATHSITE ?>blog/" class="btn-primary">Ver todos os artigos</a>
         </div>
      </section>
   <? } ?>

   <!-- FAQ -->
   <? if ($faqs) { ?>
      <div class="faq" id="faq">
         <div class="content">
            <div class="group-title">
               <h2 data-aos="fade-up">Perguntas frequentes</h2>
               <h3 data-aos="fade-up"><?= $txFaq->titulo ?></h3>
               <p data-aos="fade-up"><?= $txFaq->descricao ?></p>
            </div>
         </div>
         <div class="faq-content">
            <div class="content">
               <div class="text">
                  <? foreach ($faqs as $faq) { ?>
                     <article data-aos="fade-right">
                        <h4><?= $faq->titulo ?><img src="<?= PATHSITE ?>assets/images/icon-chevron-down.svg" alt=""></h4>
                        <p><?= $faq->texto ?></p>
                     </article>
                  <? } ?>
               </div>
               <div class="cover" data-aos="fade-left">
                  <img src="<?= PATHSITE ?>uploads/texto/<?= $txFaq->arquivo ?>" alt="capa das perguntas frequentes">
               </div>
            </div>
         </div>
      </div>
   <? } ?>

   <!-- Contato -->
   <?= view("templates/contato") ?>
</main>