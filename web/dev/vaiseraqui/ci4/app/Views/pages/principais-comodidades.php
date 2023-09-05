<?
$infoPagina['nomeDaPagina'] = $nomePagina;
$infoPagina['iconePagina'] = $iconePagina;
?>

<?
if ($tipoPagina == 'itens') {
    $meusItens = explode(";", $anuncio->itens);
} else if ($tipoPagina == 'proximidades') {
    $meusItens = explode(";", $anuncio->proximidades);
} else if ($tipoPagina == 'lazer') {
    $meusItens = explode(";", $anuncio->lazer);
}
?>

<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>
    <div class="conteudo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <?= $textoExplicativo->texto ?>
                </div>
            </div>
            <hr class="linhaform">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div class="row">

                        <div class="col-12">
                            <label>Adicionados</label>
                            <div class="boxOpcoesAdicionadas">                               
                                <input id="campoItens" data-role="tagsinput" type="text" name="principaiscomodidades" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->principaiscomodidades ?>" placeholder="Itens">
                            </div>
                        </div>

                        <div class="col-12">
                            <label>Opções para adicionar</label>

                            <div class="boxOpcoesAdicionar">
                                <?
                                if ($comodidadesDisponiveis) {
                                    foreach ($comodidadesDisponiveis as $item) {
                                        $atuais = explode(";", $item->principaiscomodidades)
                                        //  if (!in_array($item->titulo, $meusItens)) {
                                ?>
                                        <a onclick="addItem(<?= $item->id ?>, '<?= $item->titulo ?>')" id="item-<?= md5($item->titulo) ?>" style="<?= (in_array($item->titulo, $atuais)) ? 'display:none;' : '' ?>" href="javascript:void(0)" class="opcaoAdicionar">
                                            <?= $item->titulo ?>
                                        </a>
                                <?
                                        //   }
                                    }
                                }
                                ?>

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