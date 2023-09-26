<?
$infoPagina['nomeDaPagina'] = $nomePagina;
$infoPagina['iconePagina'] = $iconePagina;
?>

<? if ($tipoPagina == 'itens') {
   $meusItens = explode(";", $anuncio->itens);
} else if ($tipoPagina == 'proximidades') {
   $meusItens = explode(";", $anuncio->proximidades);
} else if ($tipoPagina == 'lazer') {
   $meusItens = explode(";", $anuncio->lazer);
} ?>

<section class="wrap">
   <? echo View("templates/barra-topo", $infoPagina); ?>
   <div class="conteudo">
      <div class="container-fluid">
         
         <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>

         <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
            <fieldset>

               <div class="col-12 mb-5">
                  <label>Permitido</label>
                  <input type="text" name="pode" class="form-control" value="<?= $anuncio->pode ?>">
               </div>

               <div class="col-12">
                  <label>Proibido</label>
                  <input type="text" name="naopode" class="form-control" value="<?= $anuncio->naopode ?>">
               </div>

               <div class="col-12 border-top pt-3">
                  <button type="submit" class="form-control formsubmit">
                     Salvar e Atualizar
                  </button>
               </div>

            </fieldset>
         </form>
      </div>
   </div>
</section>