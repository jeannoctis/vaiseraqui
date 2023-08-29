<?
 $infoPagina['nomeDaPagina'] = $nomePagina;
          $infoPagina['iconePagina'] = $iconePagina;
?>

<? if($tipoPagina == 'itens'){
   $meusItens = explode(";", $anuncio->itens);
} else if($tipoPagina == 'proximidades'){
    $meusItens = explode(";", $anuncio->proximidades);
} else if($tipoPagina == 'lazer'){
    $meusItens = explode(";", $anuncio->lazer);
} ?>

<section class="wrap">
           <? echo View("templates/barra-topo", $infoPagina); ?>
<div class="conteudo">
            <div class="container-fluid">
                 <div class="row">                  
                    <div class="col-12 col-md-12">
                       <?=$textoExplicativo->texto?>
                    </div>
                </div>                  
                <hr class="linhaform">
                
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                    <fieldset>
                        
                        <div class="row">

                            <div class="col-12">
                                <label>Adicionados</label>
                                <div class="boxOpcoesAdicionadas">
                                   <? if($tipoPagina == 'itens'){ ?>
                                  <input id="campoItens" data-role="tagsinput" type="text" name="itens" class="form-control tags-input mySingleFieldTags "  value="<?= $anuncio->itens ?>" placeholder="Itens">
                                    <? } else if($tipoPagina == 'proximidades') { ?>
                                   <input id="campoItens" data-role="tagsinput" type="text" name="proximidades" class="form-control tags-input mySingleFieldTags "  value="<?= $anuncio->proximidades ?>" placeholder="Itens">
                                    <? } else if($tipoPagina == 'lazer') { ?>
                                   <input id="campoItens" data-role="tagsinput" type="text" name="lazer" class="form-control tags-input mySingleFieldTags "  value="<?= $anuncio->lazer ?>" placeholder="Itens">
                                  <? } ?>

                                </div>
                            </div>

                            <div class="col-12">
                                <label>Opções para adicionar</label>

                                <div class="boxOpcoesAdicionar">
                                    <?
                                    if ($itens) {
                                        foreach ($itens as $item) {
                                            //  if (!in_array($item->titulo, $meusItens)) {
                                            ?>
                                    <a onclick="addItem(<?= $item->id ?>, '<?= $item->titulo ?>')" id="item-<?= md5($item->titulo) ?>" style="<?= (in_array($item->titulo, $meusItens)) ? 'display:none;' : '' ?>" href="javascript:void(0)" class="opcaoAdicionar">
                                       <?= $item->titulo ?>
                                    </a>
                                            <?
                                            //   }
                                        }
                                    } ?>

                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <button type="submit" class="form-control formsubmit" name="">
                                    Salvar e atualizar
                                </button>
                            </div>

                        </div>
                    </fieldset>
                </form>
              
            </div>
        </div>

    </section>
