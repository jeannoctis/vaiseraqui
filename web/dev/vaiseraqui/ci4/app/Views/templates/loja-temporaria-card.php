<article class="card-item" data-aos="fade-right">
   <? if ($fotos) { ?>
      <div class="cover">
         <div class="swiper swiper-card">
            <div class="swiper-wrapper">
               <? foreach ($fotos as $foto) { ?>
                  <div class="swiper-slide">                     
                     <picture>
                        <source srcset="<?= PATHSITE ?>uploads/produto/<?= $id ?>/<?= $foto->arquivo ?>.webp" type="image/webp">
                        <img src="<?= PATHSITE ?>uploads/produto/<?= $id ?>/<?= $foto->arquivo ?>" alt="foto do local">
                     </picture>
                  </div>
               <? } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
         </div>
      </div>
   <? } ?>

   <a href="<?=PATHSITE?>lojas-temporarias/<?=$identificador?>">
      <div class="info">
         <span class="type"><?= $categoria ?></span>
         <span class="zona"><?= $titulo ?></span>
         <strong class="city"><?= $cidade ?> - <?= $estado ?></strong>
         <? if ($itensdisponiveis) {
            $itens = explode(";", $itensdisponiveis) ?>
            <ul>
               <? foreach ($itens as $key => $item) {
                  if ($key < 3) { ?>
                     <li><?= $item ?></li>
                  <? } ?>
               <? } ?>
            </ul>
         <? } ?>

         <p class="price">
            <span class="value">R$<?= number_format($preco, 2, ",", ".") ?></span>
            <span class="recurrency">/aluguel</span>
         </p>

         <span class="icon-heart">
            <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
               <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
            </svg>
            <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
               <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
            </svg>
         </span>
      </div>
   </a>
</article>