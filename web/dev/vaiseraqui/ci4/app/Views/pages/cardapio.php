<?
$infoPagina['nomeDaPagina'] = "Cardápio";
$infoPagina['iconePagina'] = 'icon-menu.svg';
?>
<section class="wrap">

    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">

            <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div id="accordion">
                        <? if ($cardapios) { ?>
                            <? foreach ($cardapios as $ind => $item) { ?>
                                <div class="card">
                                    <div class="card-header" id="tituloAba<?= $ind ?>">
                                        <h5 class="mb-0">
                                            <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $ind ?>" aria-expanded="true" aria-controls="aba<?= $ind ?>">
                                                <?= $item->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">

                                                <div onclick="excluirAba('<?= encode($item->id) ?>','true', 'ProdutoAcomodacaoModel')" class="excluirAba">
                                                    <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                                                    Excluir
                                                </div>
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="aba<?= $ind ?>" class="collapse show" aria-labelledby="tituloAba<?= $ind ?>" data-parent="#accordion">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <label>Título</label>
                                                    <input type='hidden' name='id[]' value="<?= encode($item->id) ?>" />
                                                    <input type="text" name="titulo[]" class="form-control" Value="<?= $item->titulo ?>">
                                                </div>
                                                <div class='col-12'>
                                                    <label>Itens</label>
                                                    <input id="campoItens<?=$item->id?>" data-role="tagsinput" type="text" name="itens[]" class="form-control tags-input mySingleFieldTags2 " value="<?= $item->menu ?>" placeholder="Itens">
                                                    <div class="container-cardapio" id="fieldTag<?=$item->id?>"></div>
                                                </div>                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>
                    
                    <button type="button" class="has-icon add-field-btn areaAcomodacao2 col-12" onclick='novoCardapio();'>
                        <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                        adicionar cardápio
                    </button>

                    <div class="row">
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

<style>
    .container-cardapio{
    display: block; 
    position:relative
} 
.ui-autocomplete {
    position: absolute;
}
    </style>
    
    <script>
        var contador = <?=count($cardapios)?>
        </script>