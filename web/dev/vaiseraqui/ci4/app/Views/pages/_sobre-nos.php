<div class="page-about-us">
   <main>
      <article>
         <div class="content">
            <div class="top-title">
               <div class="group-title">
                  <h2 class="subtitle" data-aos="fade-right">Sobre nós</h2>
                  <h1 data-aos="fade-right"><?= $sobreNos->titulo ?></h1>
                  <div data-aos="fade-right"><?= $sobreNos->texto ?></div>
               </div>
               <div class="container-with-card-floats" data-aos="fade-left">
                  <picture>
                     <source media="(min-width: 768px)" srcset="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo ?>">
                     <source media="(max-width: 768px)" srcset="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo2 ?>">
                     <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo ?>" alt="">
                  </picture>
                  <div class="card float-animation-up">
                     <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo3 ?>" alt="">
                     <div>
                        <span class="number">+ 200</span>
                        <span class="title"><?= $sobreNos->extra1 ?></span>
                     </div>
                  </div>
                  <div class="card float-animation-down">
                     <img src="<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo4 ?>" alt="">
                     <div>
                        <span class="number">+ 450</span>
                        <span class="title"><?= $sobreNos->extra2 ?></span>
                     </div>
                  </div>
               </div>
            </div>

            <h2 data-aos="fade-right"><?= $sobreNos->descricao ?></h2>
            <div data-aos="fade-right"><?= $sobreNos->texto2 ?></div>
            <div class="box-video" data-aos="fade-left" style="background-image: url('<?= PATHSITE ?>uploads/texto/<?= $sobreNos->arquivo5 ?>');">
               <div class="embed">
                  <? if ($sobreNos->video) {
                     $url_components = parse_url($sobreNos->video);
                     if ($url_components) {
                        parse_str($url_components['query'], $params);
                     }
                  } ?>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $params['v'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
               </div>
            </div>

            <? if ($aspectos) { ?>
               <aside class="wraper">
                  <? foreach ($aspectos as $aspecto) { ?>
                     <article data-aos="fade-right">
                        <img src="<?= PATHSITE ?>uploads/aspecto/<?= $aspecto->arquivo ?>" alt="icone do aspecto">
                        <h2><?= $aspecto->titulo ?></h2>
                        <p><?= $aspecto->descricao ?></p>
                     </article>
                  <? } ?>
               </aside>
            <? } ?>

         </div>
      </article>
      <div class="review" data-aos="fade-up">
         <div class="content">
            <svg class="quotes" width="87" height="68" viewBox="0 0 87 68" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g clip-path="url(#clip0_1275_13)">
                  <path d="M22.488 33.832H23C27.2667 33.832 30.8507 35.4533 33.752 38.696C36.824 41.768 38.36 45.5227 38.36 49.96C38.36 54.7387 36.568 58.8347 32.984 62.248C29.5707 65.6613 25.3893 67.368 20.44 67.368C14.9787 67.368 10.3707 65.4053 6.616 61.48C3.032 57.5547 1.24 52.6053 1.24 46.632C1.24 31.4427 12.4187 16.5093 34.776 1.83199L43.48 14.12C32.216 22.4827 25.2187 29.0533 22.488 33.832Z" fill="#607380" />
                  <path d="M64.488 33.832H65C69.2667 33.832 72.8507 35.4533 75.752 38.696C78.824 41.768 80.36 45.5227 80.36 49.96C80.36 54.7387 78.568 58.8347 74.984 62.248C71.5707 65.6613 67.3893 67.368 62.44 67.368C56.9787 67.368 52.3707 65.4053 48.616 61.48C45.032 57.5547 43.24 52.6053 43.24 46.632C43.24 31.4427 54.4187 16.5093 76.776 1.83199L85.48 14.12C74.216 22.4827 67.2187 29.0533 64.488 33.832Z" fill="#607380" />
               </g>
               <defs>
                  <clipPath id="clip0_1275_13">
                     <rect width="87" height="68" fill="white" />
                  </clipPath>
               </defs>
            </svg>
            <p><?=$depoimento->texto?></p>
            <div class="author">
               <img src="<?= PATHSITE ?>uploads/texto/<?=$depoimento->arquivo?>" alt="">
               <h3><?=$depoimento->titulo?></h3>
               <hr>
            </div>
         </div>
      </div>
      <section class="s-social">
         <div class="content">
            <h2 data-aos="fade-up"><?=$txInstagram->titulo?></h2>
            <p data-aos="fade-up" class="tagline">
               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.33398 8C5.33398 6.5273 6.52757 5.33312 8.00032 5.33312C9.47308 5.33312 10.6673 6.5273 10.6673 8C10.6673 9.4727 9.47308 10.6669 8.00032 10.6669C6.52757 10.6669 5.33398 9.4727 5.33398 8ZM3.89224 8C3.89224 10.2688 5.73141 12.1079 8.00032 12.1079C10.2692 12.1079 12.1084 10.2688 12.1084 8C12.1084 5.73118 10.2692 3.89208 8.00032 3.89208C5.73141 3.89208 3.89224 5.73118 3.89224 8ZM11.311 3.72924C11.311 4.25913 11.7407 4.6895 12.2713 4.6895C12.8012 4.6895 13.2316 4.25913 13.2316 3.72924C13.2316 3.19935 12.8018 2.76963 12.2713 2.76963C11.7407 2.76963 11.311 3.19935 11.311 3.72924ZM4.76788 14.5118C3.98788 14.4763 3.56396 14.3464 3.2822 14.2365C2.90868 14.0911 2.64243 13.9179 2.36197 13.6381C2.08215 13.3583 1.90832 13.0921 1.76356 12.7186C1.6537 12.4368 1.52381 12.0129 1.48827 11.233C1.44949 10.3897 1.44174 10.1363 1.44174 8C1.44174 5.86365 1.45014 5.61099 1.48827 4.76704C1.52381 3.98708 1.65435 3.56381 1.76356 3.28142C1.90896 2.90792 2.08215 2.64168 2.36197 2.36123C2.64179 2.08142 2.90803 1.90759 3.2822 1.76284C3.56396 1.65299 3.98788 1.5231 4.76788 1.48756C5.61121 1.44879 5.86453 1.44103 8.00032 1.44103C10.1368 1.44103 10.3894 1.44943 11.2334 1.48756C12.0134 1.5231 12.4367 1.65363 12.7191 1.76284C13.0926 1.90759 13.3589 2.08142 13.6393 2.36123C13.9191 2.64103 14.0923 2.90792 14.2377 3.28142C14.3476 3.56317 14.4775 3.98708 14.513 4.76704C14.5518 5.61099 14.5596 5.86365 14.5596 8C14.5596 10.1357 14.5518 10.389 14.513 11.233C14.4775 12.0129 14.3469 12.4368 14.2377 12.7186C14.0923 13.0921 13.9191 13.3583 13.6393 13.6381C13.3595 13.9179 13.0926 14.0911 12.7191 14.2365C12.4373 14.3464 12.0134 14.4763 11.2334 14.5118C10.3901 14.5506 10.1368 14.5583 8.00032 14.5583C5.86453 14.5583 5.61121 14.5506 4.76788 14.5118ZM4.70197 0.0484653C3.85024 0.0872375 3.26863 0.222294 2.76005 0.420032C2.23402 0.624233 1.78812 0.898223 1.34287 1.34281C0.898259 1.7874 0.624258 2.23328 0.420049 2.75994C0.222303 3.2685 0.087241 3.85008 0.0484672 4.70178C0.00904722 5.55477 0 5.82746 0 8C0 10.1725 0.00904722 10.4452 0.0484672 11.2982C0.087241 12.1499 0.222303 12.7315 0.420049 13.2401C0.624258 13.7661 0.897613 14.2126 1.34287 14.6572C1.78747 15.1018 2.23337 15.3751 2.76005 15.58C3.26928 15.7777 3.85024 15.9128 4.70197 15.9515C5.55564 15.9903 5.8277 16 8.00032 16C10.1736 16 10.4457 15.991 11.2987 15.9515C12.1504 15.9128 12.732 15.7777 13.2406 15.58C13.7666 15.3751 14.2125 15.1018 14.6578 14.6572C15.1024 14.2126 15.3757 13.7661 15.5806 13.2401C15.7783 12.7315 15.9141 12.1499 15.9522 11.2982C15.991 10.4446 16 10.1725 16 8C16 5.82746 15.991 5.55477 15.9522 4.70178C15.9134 3.85008 15.7783 3.2685 15.5806 2.75994C15.3757 2.23393 15.1024 1.78805 14.6578 1.34281C14.2132 0.898223 13.7666 0.624233 13.2412 0.420032C12.732 0.222294 12.1504 0.0865913 11.2993 0.0484653C10.4463 0.00969305 10.1736 0 8.00097 0C5.8277 0 5.55564 0.00904685 4.70197 0.0484653Z" fill="#333333" />
               </svg>
               <span><?=$txInstagram->descricao?></span>
            </p>
            <div id="instagramAPI" data-aos="fade-up">

            </div>
            <a href="<?=$igInfo->link?>" target="_blank" class="btn-primary">Visitar Instagram</a>
         </div>
      </section>
   </main>
</div>