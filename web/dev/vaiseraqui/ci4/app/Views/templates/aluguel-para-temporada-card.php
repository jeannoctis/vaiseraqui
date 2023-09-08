<article class="card-item" data-aos="fade-right">
   <div class="cover">
      
      <? if ($fotos) { ?>
         <div class="swiper swiper-card">
            <div class="swiper-wrapper">
               <? foreach ($fotos as $foto) { ?>
                  <div class="swiper-slide">
                     <a data-fslightbox="gallery-4" href="<?= PATHSITE ?>uploads/produto//<?= $foto->arquivo?>">
                        <img src="<?= PATHSITE ?>uploads/produto//<?= $foto->arquivo?>" alt="">
                     </a>
                  </div>
               <? } ?>               
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
         </div>
      <? } ?>
   </div>
   <a href="<?=PATHSITE?>aluguel-para-temporada/<?= $identificador ?>">
      <div class="info">
         <span class="type"><?= $categoria ?></span>
         <span class="zona"><?= $bairro ?></span>
         <strong class="city"><?= $cidade ?> - <?= $estado ?></strong>
         <ul>
            <li><?= $quartos ?> quartos</li>
            <li><?= $banheiros ?> banheiros</li>
            <li><?= $areautil ?> m²</li>
         </ul>

         <p class="price">
            <span class="value">R$<?= number_format($valor, 2, ",", ".") ?></span>
            <span class="recurrency">/aluguel</span>
         </p>

         <a href="#" class="icon-heart">
            <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
               <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
            </svg>
            <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
               <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
            </svg>
         </a>
      </div>
   </a>
</article>