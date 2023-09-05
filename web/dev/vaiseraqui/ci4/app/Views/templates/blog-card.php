<article class="post-article" data-aos="fade-up">
   <a href="<?= PATHSITE ?>blog/<?= $identificador ?>/">
      <div class="cover">
         <img src="<?= PATHSITE ?>uploads/artigo/<?= $arquivo ?>" alt="capa do artigo">
         <span class="tagline"><?= $cats[$categoriaFK] ?></span>
      </div>
      <div class="info">
         <h3><?=$titulo?></h3>
         <div>
            <?= character_limiter($texto, 255) ?>
         </div>
         <a href="<?= PATHSITE ?>blog/<?= $identificador ?>/" class="more">
            Ler artigo
            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M1 10L5 5.5L1 0.999999" stroke="#932327" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </a>
      </div>
   </a>
</article>