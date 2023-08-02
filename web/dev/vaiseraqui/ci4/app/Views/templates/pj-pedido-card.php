<? $result = getPdStatus($status) ?>

<div class="card card-link">
   <div class="cover">
      <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $foto->arquivo ?>" alt="capa do projeto">
      <span class="badget <?= $result['class'] ?>"><?= $result['badge'] ?></span>
   </div>
   <div class="desc">
      <h3><?= $projeto->titulo ?></h3>
      <p class="price">R$<?= number_format($projeto->valor, 2, ",", ".") ?></p>

      <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/<?= $id ?>" class="btn-details">
         Ver detalhes do pedido <img src="<?= PATHSITE ?>assets-cliente/images/icon-arrow-right.svg" alt="seta para a direita">
      </a>
   </div>
</div>