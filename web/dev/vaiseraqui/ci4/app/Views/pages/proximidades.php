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
                    <div class="row col-12 mb-5">
                        <h2>Proximidades pela região</h2>
                        <h6 class="ml-2">ocultaremos no anúncio os campos vazios ;)</h6>
                    </div>

                    <? foreach ($proximidadesDisponiveis as $ind => $proximidade) { ?>
                        <div class="card border-top py-3">
                            <div class="card-header pt-0" id="tituloAba<?= $ind ?>">
                                <h5 class="mb-0">
                                    <div class="btn btn-link px-0" data-toggle="collapse" data-target="#aba<?= $ind ?>" aria-expanded="true" aria-controls="aba<?= $ind ?>">
                                        <img src="<?= PATHSITE ?>uploads/proximidade/<?= $proximidade->arquivo ?>" alt="">

                                        <?= $proximidade->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">

                                        <div onclick="excluirAba('<?= encode($proximidade->id) ?>','true', 'ProdutoComodidadeModel')" class="excluirAba d-none">
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
                                            <label>Nas proximidades</label>
                                            <input type='hidden' name='id[]' value="<?= encode($proximidade->id) ?>" />
                                            <input type="text" name="proximidades[]" class="form-control" Value="<?= $proximidade->proximidades ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>

                    <div class="col-12 border-top pt-3">
                        <button type="submit" class="form-control formsubmit">
                            Salvar e Atualizar
                        </button>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <label>Adicionados</label>
                            <div class="boxOpcoesAdicionadas">
                                <? if ($tipoPagina == 'itens') { ?>
                                    <input id="campoItens" data-role="tagsinput" type="text" name="itens" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->itens ?>" placeholder="Itens">
                                <? } else if ($tipoPagina == 'proximidades') { ?>
                                    <input id="campoItens" data-role="tagsinput" type="text" name="proximidades" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->proximidades ?>" placeholder="Itens">
                                <? } else if ($tipoPagina == 'lazer') { ?>
                                    <input id="campoItens" data-role="tagsinput" type="text" name="lazer" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->lazer ?>" placeholder="Itens">
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

                    </div> -->
                </fieldset>
            </form>
        </div>
    </div>
</section>