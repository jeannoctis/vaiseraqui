<article class="card-link">
   <div class="cover">
      <span class="badget"><?= $cats[$categoriaFK] ?></span>
      <img src="<?= PATHSITE ?>uploads/artigo/<?= $arquivo ?>" alt="capa do artigo" class="post">
   </div>
   <div class="text">
      <h4><?= $titulo ?></h4>
      <p><?= character_limiter(strip_tags($texto), 190) ?></p>
      <a href="<?= PATHSITE ?>blog/<?= $identificador ?>/" class="more">Ler artigo <img src="<?= PATHSITE ?>assets/images/icon-chevron.svg" alt="ícone seta"></a>
   </div>
</article>