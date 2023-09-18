<style>
  .blog-list .s-last .container-medium .list {
    display: block;
  }

  @media screen and (max-width: 1120px) {
    .blog-list .s-last .container-medium .list {
      width: calc(100% + 40px);
    }
  }

  @media screen and (max-width: 769px) {
    .blog-list .s-last .container-medium .list {
      width: calc(100% + 20px);
    }
  }
</style>
<main>
  <article class="container-medium">
    <nav class="navigation-breadcrumb" data-aos="fade-up">
      <a href="<?= PATHSITE ?>">Início</a>
      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
      <a href="<?= PATHSITE ?>blog/">Blog</a>
      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
      <a href="<?= PATHSITE ?>blog/<?= $artigoAtual->identificador ?>"><?= $artigoAtual->titulo ?></a>
    </nav>

    <div class="content two-columns">
      <div class="column">
        <a href="<?= PATHSITE ?>blog-listagem-categoria.html" class="tagline" data-aos="fade-up"><?= $cats[$artigoAtual->categoriaFK] ?></a>
        <h1 data-aos="fade-up"><?= $artigoAtual->titulo ?></h1>
        <div class="post-main-cover" data-aos="fade-up">
          <img src="<?= PATHSITE ?>uploads/artigo/<?= $artigoAtual->arquivo ?>" alt="capa do artigo">
        </div>

        <div data-aos="fade-up">
          <?= $artigoAtual->texto ?>
        </div>

        <hr>

        <div class="box-social" data-aos="fade-up">
          <span class="title">Compartilhe</span>
          <nav>
            <a href="#">
              <img src="<?= PATHSITE ?>assets/images/icon-instagram.svg" alt="ícone">
            </a>
            <a href="#">
              <img src="<?= PATHSITE ?>assets/images/icon-facebook.svg" alt="ícone">
            </a>
            <a href="#">
              <img src="<?= PATHSITE ?>assets/images/icon-twitter.svg" alt="ícone">
            </a>
            <a href="#">
              <img src="<?= PATHSITE ?>assets/images/icon-linkedin.svg" alt="ícone">
            </a>
            <a href="#">
              <img src="<?= PATHSITE ?>assets/images/link.svg" alt="ícone">
            </a>
          </nav>
        </div>
      </div>

      <div class="column">
        <aside>

          <a href="<?= $anuncioBannerV->link ?>">
            <picture>
              <source srcset="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerV->arquivo ?>.webp" type="image/webp">
              <img src="<?= PATHSITE ?>uploads/anuncio/<?= $anuncioBannerV->arquivo ?>">
            </picture>
          </a>

        </aside>
      </div>

    </div>
  </article>

  <? if ($artigosRelacionados) { ?>
    <aside class="s-last" id="artigos">
      <div class="container-medium">
        <h2 data-aos="fade-up">Artigos Relacionados</h2>
        <div class="list list-of-swiper">
          <div class="swiper rent-interna">
            <div class="swiper-wrapper">
              <? foreach ($artigosRelacionados as $artigo) { ?>
                <div class="swiper-slide">
                  <?= view("templates/blog-card", (array)$artigo) ?>
                </div>
              <? } ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="navigation-swiper-blog only-mobile">
            <button class="prev">
              <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 6.5L7 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
            <button class="next active">
              <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </aside>
  <? } ?>

</main>