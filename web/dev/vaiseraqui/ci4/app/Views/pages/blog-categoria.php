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
                    <a data-select-value="Maior preço - Menor preço" href="#maior-menor">Maior preço - Menor preço</a>
                    <a data-select-value="Menor preço - Maior preço" href="#menor-maior" class="active">Menor preço - Maior preço</a>
                    <a data-select-value="Entre R$800,00 e R$1.200,00" href="#entre-800-1200">Entre R$800,00 e R$1.200,00</a>
                    <a data-select-value="Entre R$1.200,00 e R$1.600,00" href="#entre-1200-1600">Entre R$1.200,00 e R$1.600,00</a>
                    <a data-select-value="Acima de R$1.600,00" href="#acima-1600">Acima de R$1.600,00</a>
                    <a data-select-value="Mais visto" href="#mais-visto">Mais visto</a>
                    <a data-select-value="Mais perto" href="#mais perto">Mais perto</a>
                    <!-- <a href="<?= PATHSITE ?>blog/<?= $categoriaAtual->identificador ?>?ordem=antigos" class="<?= $get['ordem'] == "novos" ? "active" : "" ?>">
                      Mais antigos
                    </a>
                    <a href="<?= PATHSITE ?>blog/<?= $categoriaAtual->identificador ?>?ordem=recentes" class="<?= $get['ordem'] == "recentes" ? "active" : "" ?>">
                      Mais Recentes
                    </a> -->
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

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="<?= PATHSITE ?>assets/scripts/header.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/menu-mobile.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/form-filter.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/select.js"></script>
<!-- <script src="<?= PATHSITE ?>assets/scripts/modal-filter.js"></script> -->
<!-- <script src="<?= PATHSITE ?>assets/scripts/modal-select-order.js"></script> -->

<script> 

  // // Ordenar
  // const orderOptions = document.querySelectorAll(".modal-order a")

  // orderOptions.forEach(option => {
  //   option.addEventListener("click", () => {

  //   })
  // })  
</script>