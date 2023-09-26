<?
$infoPagina['nomeDaPagina'] = "Comodidades";
$infoPagina['iconePagina'] = 'icon-bathtub.svg';
?>
<section class="wrap">

    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">
        <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">

                <fieldset>
                    <legend class="col-12">
                        <h2>Comodidades em destaque</h2>
                    </legend>

                    <div class="row col-12">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Área útil (m²)</label>
                            <input type="number" min="0" name="areautil" class="form-control" id="areautil" value="<?= $anuncio->areautil ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Quartos</label>
                            <input type="number" min="0" name="quartos" class="form-control" id="quartos" value="<?= $anuncio->quartos ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Banheiros</label>
                            <input type="number" min="0" name="banheiros" class="form-control" id="banheiros" value="<?= $anuncio->banheiros ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Vagas</label>
                            <input type="number" min="0" name="vagas" class="form-control" id="vagas" value="<?= $anuncio->vagas ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Andares</label>
                            <input type="andar" min="0" name="andar" class="form-control" id="andar" value="<?= $anuncio->andar ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Animais de estimação?</label>
                            <select name="animais" required class="form-control" id="animais">
                                <option <?= $anuncio->animais == "N" ? 'selected' : '' ?> value="N">Não</option>
                                <option <?= $anuncio->animais == "S" ? 'selected' : '' ?> value="S">Sim</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Mobilidado?</label>
                            <select name="mobilia" required class="form-control" id="mobilia">
                                <option <?= $anuncio->mobilia == "N" ? 'selected' : '' ?> value="N">Não</option>
                                <option <?= $anuncio->mobilia == "S" ? 'selected' : '' ?> value="S">Sim</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Transporte público</label>
                            <input type="text" name="transporte" class="form-control" id="transporte" value="<?= $anuncio->transporte ?>" placeholder="Escreva...">
                        </div>
                    </div>

                </fieldset>

                <fieldset class="col-12 mt-5">
                    <legend>
                        <h2>Principais comodidades</h2>
                    </legend>

                    <input id="campoItens" data-role="tagsinput" type="text" name="principaiscomodidades" class="form-control tags-input mySingleFieldTags col-12" value="<?= $anuncio->principaiscomodidades ?>" placeholder="Itens">
                </fieldset>

                <fieldset class="col-12 mt-5">
                    <legend>
                        <h2>Comodidades por Área</h2>
                    </legend>
                    <div id="accordion">
                        <? if ($acomodacoes) { ?>
                            <? foreach ($acomodacoes as $ind => $texto) { ?>
                                <div class="card">
                                    <div class="card-header pt-0" id="tituloAba<?= $ind ?>">
                                        <h5 class="mb-0">
                                            <div class="btn btn-link px-0" data-toggle="collapse" data-target="#aba<?= $ind ?>" aria-expanded="true" aria-controls="aba<?= $ind ?>">
                                                <?= $texto->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">

                                                <div onclick="excluirAba('<?= encode($texto->id) ?>','true', 'ProdutoComodidadeModel')" class="excluirAba">
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
                                                    <input type='hidden' name='id[]' value="<?= encode($texto->id) ?>" />
                                                    <input type="text" name="titulo[]" class="form-control" Value="<?= $texto->titulo ?>">
                                                </div>
                                                <div class='col-12'>
                                                    <label>Itens</label>
                                                    <input id="campoItens" data-role="tagsinput" type="text" name="comodidades[]" class="form-control tags-input mySingleFieldTags " value="<?= $texto->comodidades ?>" placeholder="Itens">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>

                    <div onclick='novaComodidade();' class="areaAcomodacao2">
                        <div class="d-flex">
                            <img src="<?= PATHSITE ?>assets/images/plus.svg">
                            Nova comodidade
                        </div>
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