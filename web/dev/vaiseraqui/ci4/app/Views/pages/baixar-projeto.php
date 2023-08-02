<main>
   <div class="box">
      <h1 data-aos="fade-up">Baixar Projeto</h1>

      <div class="post" data-aos="fade-up">

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
               <h2>Descrição</h2>
               <p><?= $pdAtual->projeto->descricao ?></p>
            </div>
         </div>

         <div class="box-download">
            <h2>Arquivos para baixar</h2>


            <a download href="<?= PATHSITE ?>uploads/projeto/<?= $pdAtual->projeto->pdf ?>" class="card">
               <img src="<?= PATHSITE ?>assets-cliente/images/icon-pdf.svg" alt="">
               <h3>Projeto Arquitetônico</h3>
               <img src="<?= PATHSITE ?>assets-cliente/images/icon-download.svg" alt="">
            </a>

            <? if ($pdAtual->adicionais) { ?>
               <? foreach ($pdAtual->adicionais as $adicional) { ?>
                  <? if (isset($adicional->pdf)) { ?>
                     <a download href="<?= PATHSITE ?>uploads/pj_adicional/<?= $adicional->pdf ?>" class="card">
                        <img src="<?= PATHSITE ?>assets-cliente/images/icon-pdf.svg" alt="ícone PDF">
                        <h3><?= $adicional->titulo ?></h3>
                        <img src="<?= PATHSITE ?>assets-cliente/images/icon-download.svg" alt="ícone download">
                     </a>
                  <? } ?>
               <? } ?>
            <? } ?>
         </div>
      </div>
   </div>
</main>