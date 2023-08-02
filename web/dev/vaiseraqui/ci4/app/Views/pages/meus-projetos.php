<main>
   <div class="box" data-aos="fade-up">
      <h1>Meus Projetos</h1>
      <? if ($meusPd) { ?>
         <div class="wraper-cards-products">
            <div>
               <? foreach ($meusPd as $pedido) {
                  echo view("templates/pj-pedido-card", (array)$pedido);
               } ?>
            </div>
         </div>
      <? } ?>
   </div>
</main>