<div class="card-project card-link">
   <div class="cover">
      <span class="badget novo">Novo</span>
      <span class="badget destaque">Destaque</span>
      <img class="post" src="<?= PATHSITE ?>uploads/pj_foto/<?= $fotos[0]->arquivo ?>" alt="capa do projeto" loading="lazy">
   </div>
   <div class="title">
      <h4><?= $titulo ?></h4>
   </div>
   <div class="top-menu">
      <div class="box">
         <img src="<?= PATHSITE ?>assets/images/icon-card-project-1.svg" alt="ícone área útil" loading="lazy">
         <h5>área útil <span><?= $areautil ?> m²</span></h5>
      </div>
      <div class="box">
         <img src="<?= PATHSITE ?>assets/images/icon-card-project-2.svg" alt="ícone quartos e suítes" loading="lazy">
         <h5>quartos <span><?= $quartos ?> + <?= $suites ?></span></h5>
      </div>
      <div class="box">
         <img src="<?= PATHSITE ?>assets/images/icon-card-project-3.svg" alt="ícone banheiros" loading="lazy">
         <h5>banheiros <span><?= $banheiros ?></span></h5>
      </div>
      <div class="box">
         <img src="<?= PATHSITE ?>assets/images/icon-card-project-4.svg" alt="ícone vagas" loading="lazy">
         <h5>vagas <span><?= $vagas ?></span></h5>
      </div>
   </div>
   <div class="table-price">
      <p class="installments">Em até <?= $configs->parcelasjuros ?> x de <span> R$<?= number_format(($valor / $configs->parcelasjuros), 2, ',', '.') ?> </span> s/ juros</p>
      <p class="in-cash">R$<?= number_format($valor, 2, ',', '.') ?> à vista</p>
      <a href="<?= PATHSITE ?>projetos/<?= $identificador ?>/">Ver mais detalhes <img src="<?= PATHSITE ?>assets/images/icon-chevron.svg" alt="ícone seta" loading="lazy"></a>
   </div>
</div>