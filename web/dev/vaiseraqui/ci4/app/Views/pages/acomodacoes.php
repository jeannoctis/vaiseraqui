<?
$infoPagina['nomeDaPagina'] = "Comodidades";
$infoPagina['iconePagina'] = 'icon-bathtub.svg';
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
            <div class="row">
                <div class="col-12 instruction">
                    <?= $textoExplicativo->texto ?>
                    <div class="top btn btn-link" data-toggle="collapse" data-target="#instrucao">
                        <div class="title has-icon">
                            <img src="<?= PATHSITE ?>assets/images/icon-alert.svg" alt="">
                            Instruções
                        </div>
                        <button type="button" class="chevron">
                            <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                        </button>
                    </div>

                    <div class="bottom collapse" id="instrucao">
                        <div class="content">
                            Nesta seção, você deverá escolher apenas os itens que correspondam com a estrutura real de seu imóvel, que esta sendo anunciado.


                            Caso hajam itens que não correspondam com o seu anúncio, este poderá ser removido pelo administrador do site.



                            Para inserir um item basta clicar sobre ele que está destacado com o fundo vermelho. Após clicar no item, ele será carregado automaticamente para o seu anúncio, e caso queira excluir o mesmo basta clicar no "x" que fica localizado na frente do nome do item e o mesmo voltará para a lista de item podendo ser escolhido no futuro caso deseje.



                            No campo onde os itens ficam selecionados, o anunciante também poderá digitar ali o que deseja como por exemplo “50 pratos” ou somente escrever “talheres” caso não queira colocar a quantidade no item a ser publicado no site. Depois de digitado o item de interesse, basta dar "enter" para que o item digitado seja carregado no anúncio.


                            Não se preocupe com a ordem dos nomes dos itens que o anunciante inserir em seu anúncio, ao clicar no botão "Enviar" o sistema organizará em ordem alfabética todos os itens selecionados.

                            Lembramos que a escolha dos itens abaixo, são de responsabilidade do anunciante.

                            Relacionamos abaixo algumas opções de itens para ajudar o anunciante na publicação dos mesmos em seu anúncio.
                        </div>
                    </div>
                </div>
            </div>

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
                            <input type="number" min="0" name="banheiros" class="form-control" id="quartos" value="<?= $anuncio->banheiros ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label>Vagas</label>
                            <input type="number" min="0" name="vagas" class="form-control" id="quartos" value="<?= $anuncio->vagas ?>" placeholder="Escreva...">
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

                    <input id="campoItens" data-role="tagsinput" type="text" name="comodidades[]" class="form-control tags-input mySingleFieldTags col-12" value="<?= $texto->comodidades ?>" placeholder="Itens">
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