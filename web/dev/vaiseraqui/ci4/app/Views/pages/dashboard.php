<main>
   <div class="main-header" data-aos="fade-up">
      <div class="box">
         <img src="<?= PATHSITE ?>uploads/cliente/<?= $cliente->arquivo ?>" alt="avatar do cliente">
         <h2 class="title">Bem vindo, <span><?= $cliente->nome ?>!</span></h2>
      </div>
      <form action="#">
         <button><img src="<?= PATHSITE ?>assets-cliente/images/icon-search.svg" alt=""></button>
         <input type="text" placeholder="Buscar">
      </form>
   </div>
   <div class="box">
      <h1 data-aos="fade-up">Meus Projetos</h1>
      <? if ($meusPd) { ?>
         <div class="wraper-cards-products" data-aos="fade-up">
            <div>
               <? foreach ($meusPd as $pedido) {
                  $status = getPdStatus($pedido->status) ?>
                  <div class="card card-link">
                     <div class="cover">
                        <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $pedido->foto[0]->arquivo ?>" alt="capa do projeto">
                        <span class="badget <?= $status['class'] ?>"><?= $status['badge'] ?></span>
                     </div>
                     <div class="desc">
                        <h3><?= $pedido->projeto->titulo ?></h3>
                        <p class="price">R$<?= number_format($pedido->total, 2, ",", ".") ?></p>

                        <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/<?= $pedido->id ?>" class="btn-details">
                           Ver detalhes do pedido <img src="<?= PATHSITE ?>assets-cliente/images/icon-arrow-right.svg" alt="seta para a direita">
                        </a>
                     </div>
                  </div>
               <? } ?>
            </div>
            <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/" class="btn-primary">Ver todos os projetos</a>
         </div>
      <? } ?>
   </div>
</main>