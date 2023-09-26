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

               <h2 class="col-12 mb-3">Observações</h2>
               <div class='col-12'>
                  <textarea name="observacoes" id="" cols="30" rows="10" class="form-control tinymce_full"><?=$anuncio->observacoes?></textarea>
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