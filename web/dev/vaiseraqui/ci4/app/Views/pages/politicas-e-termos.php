<main>
  <article>
    <div class="container-medium">
      <nav class="navigation-breadcrumb" data-aos="fade-up">
        <a href="<?= PATHSITE ?>">Início</a>
        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <a href="<?= PATHSITE ?>politica-de-privacidade-e-termos-de-uso/"><?= $txPoliticaETermos->titulo ?></a>
      </nav>

      <h1 data-aos="fade-up"><?= $txPoliticaETermos->titulo ?></h1>
      <h2 data-aos="fade-up"><?= $txPoliticaETermos->descricao ?></h2>
      <div class="nav-and-content">
        <nav>
          <div class="sticky">
            <h3>Navegação</h3>
            <? if ($politicaETermos) { ?>
              <div class="wraper navigation-terms">
                <? foreach ($politicaETermos as $key => $topico) { ?>
                  <a href="#topico-<?= $key ?>" data-link="topico-<?= $key ?>" class="active"><?= $topico->titulo ?></a>
                <? } ?>
              </div>
            <? } ?>

          </div>
        </nav>
        <div class="content navigation-titles">
          <?= $txPoliticaETermos->texto ?>

          <? foreach ($politicaETermos as $key => $topico) { ?>
            <h3 id="topico-<?= $key ?>" data-title="topico-<?= $key ?>"><?= $topico->titulo ?></h3>
            <p><?= $topico->texto ?></p>
          <? } ?>          
        </div>
      </div>
    </div>
  </article>
</main>