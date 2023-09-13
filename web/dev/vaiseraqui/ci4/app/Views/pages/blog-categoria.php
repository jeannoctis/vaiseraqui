<? switch ($ordem) {
  case 'relevancia':
    $filtro = "Relevância";
    break;
  case 'recentes':
    $filtro = "Mais recentes";
    break;
  case 'antigos':
    $filtro = "Mais antigos";
    break;
  default:
    $filtro = "Relevância";
    break;
} ?>

<style>
  @media screen and (max-width: 769px) {
    main {
      margin-bottom: 0;
    }
  }
</style>

<main>
  <div class="container-medium">
    <nav class="navigation-breadcrumb" data-aos="fade-up">
      <a href="<?= PATHSITE ?>">Início</a>
      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
      <a href="<?= PATHSITE ?>blog/">Blog</a>
      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
      <a href="<?= PATHSITE ?>blog/<?= $categoriaAtual->identificador ?>"><?= $categoriaAtual->titulo ?></a>
    </nav>
  </div>

  <header class="header-page" data-aos="fade-up">
    <div class="container-medium">
      <h1><?= $categoriaAtual->titulo ?></h1>
      <a href="<?= PATHSITE ?>blog/" class="goback">
        <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 1L1 5.5L5 10" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Voltar
      </a>
    </div>
  </header>

  <? if ($artigosCategoria) { ?>
    <section class="s-last" data-aos="fade-up">
      <div class="container-medium">

        <form method="get" id="form-oder">
          <span><?= count($artigosCategoria) ?> artigo(s) na categoria <?= $categoriaAtual->titulo ?> encontrados</span>
          <div class="input-order j-input-order-select">

            <label for="order">
              <img src="<?= PATHSITE ?>assets/images/icon-order.svg" alt="">
              <img class="active" src="<?= PATHSITE ?>assets/images/icon-order-active.svg" alt="">
              Ordenar por:
              <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
              <svg class="active" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </label>

            <div class="modal-order">
              <input type="text" readonly="" value="Mais recentes">
              <div class="modal-order-select">
                <div class="wraper-scroll">
                  <nav class="content">
                    <a data-select-value="Relevância" href="<?= $crrUrl?>?ordem=relevancia" class="<?= $ordem == 'relevancia' ? 'active' : '' ?>">Relevância</a>
                    <a data-select-value="Mais visto" href="<?= $crrUrl?>?ordem=recentes" class="<?= $ordem == 'recentes' ? 'active' : '' ?>">Mais recentes</a>
                    <a data-select-value="Mais perto" href="<?= $crrUrl?>?ordem=antigos" class="<?= $ordem == 'antigos' ? 'active' : '' ?>">Mais antigos</a>
                  </nav>
                </div>
              </div>
            </div>

          </div>
        </form>

        <div class="list">
          <? foreach ($artigosCategoria as $artigo) {
            echo view("templates/blog-card", (array)$artigo);
          } ?>
        </div>

        <?= $pager->links("artigos") ?>
      </div>
    </section>
  <? } ?>

</main>