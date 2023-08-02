<main>
   <div class="box" data-aos="fade-up">
      <h1>Visualizar projeto</h1>
      <div class="about-product">

         <div class="gallery">
            <div class="main-cover">
               <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $pdAtual->projeto->fotos[0]->arquivo ?>" alt="capa do projeto">
            </div>
            <div class="swiper gallery-swiper gallery-scroll">
               <div class="swiper-wrapper gallery-list">
                  <? foreach ($pdAtual->projeto->fotos as $ind => $foto) { ?>
                     <div data-image-source="<?= PATHSITE ?>uploads/pj_foto/<?= $foto->arquivo ?>" class="swiper-slide item <?= $ind == 0 ? 'active' : '' ?>">
                        <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $foto->arquivo ?>" alt="foto do projeto">
                     </div>
                  <? } ?>
               </div>
               <div class="swiper-scrollbar"></div>
            </div>
         </div>
         <div class="text">
            <h1><?= $pdAtual->projeto->titulo ?></h1>
            <div class="table-list open">
               <h2 class="title">
                  <span>Informações Gerais</span>
                  <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M9 5L5 1L1 5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </h2>
               <div class="table-content">
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-area.svg" alt="ícone área útil" loading="lazy">
                     <span>Área útil</span> <span><?= $pdAtual->projeto->areautil ?> m²</span>
                  </p>
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-larg.svg" alt="ícone largura por fundo" loading="lazy">
                     <span>Largura x Fundo (m)</span> <span><?= $pdAtual->projeto->dimensoes ?></span>
                  </p>
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-lote-min.svg" alt="ícone lote mínimo" loading="lazy">
                     <span>Lote mínimo (m²)</span> <span><?= $pdAtual->projeto->loteminimo ?></span>
                  </p>
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-quarto.svg" alt="ícone quartos e suítes" loading="lazy">
                     <span>Quartos</span> <span><?= $pdAtual->projeto->quartos ?>+<?= $pdAtual->projeto->suites ?></span>
                  </p>
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-banheiro.svg" alt="ícone banheiros" loading="lazy">
                     <span>Banheiros</span> <span><?= $pdAtual->projeto->banheiros ?></span>
                  </p>
                  <p class="line">
                     <img src="<?= PATHSITE ?>assets/images/icon-table-vagas.svg" alt="ícone vagas" loading="lazy">
                     <span>Vagas de Garagem</span> <span><?= $pdAtual->projeto->vagas ?></span>
                  </p>
                  <? if ($pdAtual->projeto->churrasqueira == 'S') { ?>
                     <p class="line">
                        <img src="<?= PATHSITE ?>assets/images/icon-table-churrasqueira.svg" alt="ícone churrasqueira" loading="lazy">
                        <span>Churrasqueira</span>
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                              <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                           </svg>
                        </span>
                     </p>
                  <? } ?>

                  <? if ($pdAtual->projeto->piscina == 'S') { ?>
                     <p class="line">
                        <img src="<?= PATHSITE ?>assets/images/icon-table-piscina.svg" alt="ícone piscina" loading="lazy">
                        <span>Piscina</span>
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                              <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                           </svg>
                        </span>
                     </p>
                  <? } ?>

                  <? if ($pdAtual->projeto->escritorio == 'S') { ?>
                     <p class="line">
                        <img src="<?= PATHSITE ?>assets/images/icon-table-escritorio.svg" alt="ícone escritório" loading="lazy">
                        <span>Escritório</span>
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                              <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                           </svg>
                        </span>
                     </p>
                  <? } ?>
               </div>
            </div>

            <h2>Descrição</h2>
            <p><?= $pdAtual->projeto->descricao ?>
            </p>
         </div>
      </div>
      <div class="wraper-table">
         <h2>Informações Gerais</h2>
         <div class="table-group">
            <div class="table">
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-area.svg" alt="ícone área útil" loading="lazy"> Área útil</div>
                  <div class="td"><?= $pdAtual->projeto->areautil ?> m²</div>
               </div>
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-lote-min.svg" alt="ícone lote mínimo" loading="lazy"> Lote mínimo (m²)</div>
                  <div class="td"><?= $pdAtual->projeto->loteminimo ?></div>
               </div>
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-banheiro.svg" alt="ícone banheiros" loading="lazy"> Banheiros</div>
                  <div class="td"><?= $pdAtual->projeto->banheiros ?></div>
               </div>
               <? if ($pdAtual->projeto->churrasqueira == 'S') { ?>
                  <div class="tr">
                     <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-churrasqueira.svg" alt="ícone churrasqueira" loading="lazy"> Churrasqueira</div>
                     <div class="td">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                           <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                        </svg>
                     </div>
                  </div>
               <? } ?>
               <? if ($pdAtual->projeto->escritorio == 'S') { ?>
                  <div class="tr">
                     <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-escritorio.svg" alt="ícone escritório" loading="lazy"> Escritório</div>
                     <div class="td">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                           <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                        </svg>
                     </div>
                  </div>
               <? } ?>
            </div>
            <div class="table">
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-larg.svg" alt="ícone largura por fundo" loading="lazy"> Largura x Fundo (m)</div>
                  <div class="td"><?= $pdAtual->projeto->dimensoes ?></div>
               </div>
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-quarto.svg" alt="ícone quartos e suítes" loading="lazy"> Quartos</div>
                  <div class="td"><?= $pdAtual->projeto->quartos ?>x<?= $pdAtual->projeto->suites ?></div>
               </div>
               <div class="tr">
                  <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-vagas.svg" alt="ícone vagas" loading="lazy"> Vagas de Garagem</div>
                  <div class="td"><?= $pdAtual->projeto->vagas ?></div>
               </div>
               <? if ($pdAtual->projeto->piscina == 'S') { ?>
                  <div class="tr">
                     <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-piscina.svg" alt="ícone piscina" loading="lazy"> Piscina</div>
                     <div class="td">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                           <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                        </svg>
                     </div>
                  </div>
               <? } ?>
            </div>
         </div>
      </div>

      <? if (!empty($pdAtual->projeto->plantas)) { ?>
         <div class="blue-print">
            <h2>Planta Baixa</h2>
            <div class="swiper custom blueSwiper">
               <div class="swiper-wrapper">
                  <? foreach ($pdAtual->projeto->plantas as $planta) { ?>
                     <div class="swiper-slide">
                        <div class="cover">
                           <img src="<?= PATHSITE ?>uploads/pj_planta/<?= $planta->arquivo ?>" alt="imagem da planta baixa do projeto" loading="lazy">
                        </div>
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
         </div>
      <? } ?>

      <? if (!empty($pdAtual->projeto->videos)) { ?>
         <div class="virtual-tour">
            <h2>Tour virtual</h2>
            <div class="swiper custom tourVirtual">
               <div class="swiper-wrapper">
                  <? foreach ($pdAtual->projeto->videos as $video) { ?>
                     <div class="swiper-slide">
                        <div class="video">
                           <span class="badget"><?= $video->titulo ?></span>
                           <? if ($video->video) {
                              $url_components = parse_url($video->video);
                              if ($url_components) {
                                 parse_str($url_components['query'], $params);
                              }
                           } ?>
                           <!-- <button class="play" data-video-id="<?= $params['v'] ?>">
                              <svg width="108" height="108" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <circle cx="60" cy="60" r="60" fill="black" fill-opacity="0.7" />
                                 <path d="M79.5 57.4019C81.5 58.5566 81.5 61.4434 79.5 62.5981L52.5 78.1865C50.5 79.3412 48 77.8979 48 75.5885L48 44.4115C48 42.1021 50.5 40.6588 52.5 41.8135L79.5 57.4019Z" fill="white" />
                              </svg>
                           </button> -->
                           <div class="embed">
                              <iframe width="" height="" src="https://www.youtube.com/embed/<?= $params['v'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                           </div>
                        </div>
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
         </div>
      <? } ?>

      <div class="review-text">
         <p><?= $txDireitosAutorais->texto ?></p>
      </div>
   </div>
</main>