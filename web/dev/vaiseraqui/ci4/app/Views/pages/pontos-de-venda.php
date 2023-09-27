<?
$infoPagina['nomeDaPagina'] = "Pontos de venda";
$infoPagina['iconePagina'] = 'icon-sales-point.svg';
?>
<section class="wrap">

    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">
            
        <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>


            <hr class="linhaform">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div id="accordion">
                        <? if ($pontos) { ?>
                            <? foreach ($pontos as $ind => $texto) { ?>
                                <div class="card">
                                    <div class="card-header" id="tituloAba<?= $ind ?>">
                                        <h5 class="mb-0">
                                            <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $ind ?>" aria-expanded="true" aria-controls="aba<?= $ind ?>">
                                                <?= $texto->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">

                                                <div onclick="excluirAba('<?= encode($texto->id) ?>','true', 'ProdutoPontoDeVendaModel')" class="excluirAba">
                                                    <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                                                    Excluir
                                                </div>
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="aba<?= $ind ?>" class="collapse show" aria-labelledby="tituloAba<?= $ind ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <input type="hidden" name="tipo[]" value="<?= $texto->tipo ?>" />
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <label>Título</label>
                                                    <input type='hidden' name='id[]' value="<?= encode($texto->id) ?>" />
                                                    <input type="text" name="titulo[]" class="form-control" Value="<?= $texto->titulo ?>">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label> <?= ($texto->tipo == 'fisico') ? 'Endereço' : 'Site' ?> </label>
                                                    <input type="text" name="endereco[]" class="form-control" Value="<?= $texto->endereco ?>">
                                                </div>

                                                <div class="col-12 col-md-6 <?= ($texto->tipo == 'online') ? 'd-none' : '' ?>">
                                                    <label>Telefone</label>
                                                    <input type="text" name="cep[]" class="form-control phone_with_ddd" Value="<?= $texto->cep ?>">
                                                </div>
                                                <div class="col-12 col-md-6 <?= ($texto->tipo == 'online') ? 'd-none' : '' ?>">
                                                    <label>Cidade / Estado</label>
                                                    <input type="text" name="cidade[]" class="form-control" Value="<?= $texto->cidade ?>">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>
                    <div class="row">                        
                        <button type="button" class="has-icon add-field-btn areaAcomodacao2 col-12 col-md-6" onclick='novoPontoDeVenda("fisico");'>
                            <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                            adicionar ponto de venda físico
                        </button>
                        <button type="button" class="has-icon add-field-btn areaAcomodacao2 col-12 col-md-6" onclick='novoPontoDeVenda("online");'>
                            <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                            adicionar ponto de venda online
                        </button>
                    </div>

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