<style>
  main {
    overflow-x: hidden;
  }
</style>
<main>

  <section class="s-presentation-mission" id="sobre-nos">
    <div class="ballon-mission" data-aos="fade-right">
      <span class="title">Sobre nós</span>
      <? $txSobreNos->titulo = preg_replace('#\*{1}(.*?)\*{1}#', '<b>$1</b>', $txSobreNos->titulo); ?>
      <h1><?= $txSobreNos->titulo ?></h1>
    </div>
    <div class="info" data-aos="fade-left">
      <p><?= $txSobreNos->texto ?></p>
    </div>
  </section>

  <section class="who" id="quem-somos">
    <div class="container-medium">
      <div class="info" data-aos="fade-right">
        <h2>
          <?= $txSobreNos->extra4 ?>
        </h2>
        <p>
          <?= $txSobreNos->texto2 ?>
        </p>
      </div>
      <div class="box-container" data-aos="fade-left">
        <div class="card-float float-up-down left">
          <img src="<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo4 ?>" alt="ícone" />
          <div>
            <? $detalhe2 = explode("*", $txSobreNos->extra2)  ?>
            <span class="title"><?= $detalhe2[0] ?></span>
            <span class="text"><?= $detalhe2[1] ?></span>
          </div>
        </div>
        <div class="card-float float-down-up right">
          <img src="<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo3 ?>" alt="ícone" />
          <div>
            <? $detalhe1 = explode("*", $txSobreNos->extra1)  ?>
            <span class="title"><?= $detalhe1[0] ?></span>
            <span class="text"><?= $detalhe1[1] ?></span>
          </div>
        </div>
        <div class="item top" style="background-image: url(<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo2 ?>);"></div>
        <div class="item bottom" style="background-image: url(<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo ?>);"></div>
      </div>
    </div>
  </section>

  <section class="more-about">
    <div class="container-medium" data-aos="fade-right">
      <div class="cover" style="background-image: url(<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo5 ?>);">
        <div class="card-float float-up-down">         
          <img src="<?= PATHSITE ?>uploads/texto/<?= $txSobreNos->arquivo6 ?>" alt="sobre a empresa" />
          <div>
            <? $detalhe3 = explode("*", $txSobreNos->extra3)  ?>
            <span class="title"><?= $detalhe3[0] ?></span>
            <span><?= $detalhe3[1] ?></span>
          </div>
        </div>
      </div>
      <div class="info" data-aos="fade-left">
        <h2><?= $txSobreNos->extra5 ?></h2>
        <?= $txSobreNos->texto3 ?>
      </div>
    </div>
  </section>

  <? if ($aspectos) { ?>
    <section class="mission" id="missao" data-aos="fade-up">
      <div class="container-medium">
        <? foreach ($aspectos as $aspecto) {
          echo view("templates/aspecto", (array)$aspecto);
        } ?>
      </div>
    </section>
  <? } ?>

  <article class="text-review" id="depoimento" data-aos="fade-up">
    <img src="<?= PATHSITE ?>assets/images/aspas-top.svg" alt="aspas" class="left">
    <img src="<?= PATHSITE ?>assets/images/aspas-bottom.svg" alt="aspas" class="right">
    <h2>
      <?= $depoimento->texto ?>
    </h2>
    <span><?= $depoimento->titulo ?></span>
  </article>
  <? $txContato->origem = "sobre-nos";
  echo view("templates/contato-form", (array)$txContato) ?>
</main>