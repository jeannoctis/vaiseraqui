<?
$infoPagina['nomeDaPagina'] = "Ingressos";
$infoPagina['iconePagina'] = 'icon-pricing.svg';
?>
<section class="wrap">

    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">

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

            <!-- <hr class="linhaform"> -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>
                    <? if ($precos) { ?>
                        <div id="accordion">
                            <? foreach ($precos as $ind => $texto) { ?>
                                <div class="card">
                                    <div class="card-header" id="tituloAba<?= $ind ?>">
                                        <h5 class="mb-0">
                                            <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $ind ?>" aria-expanded="true" aria-controls="aba<?= $ind ?>">
                                                <?= $texto->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">

                                                <div onclick="excluirAba('<?= encode($texto->id) ?>','true', 'ProdutoPrecoModel')" class="excluirAba">
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
                                                    <label>Preço</label>
                                                    <input type="text" name="valor[]" class="form-control money2" Value="<?= $texto->valor ?>">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>

                    <div class="setor-container">

                        <div class="setor-item py-3">

                            <div class="top" data-toggle="collapse" data-target="#ingressos1">
                                <button type="button" class="chevron">
                                    <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                                </button>

                                <label class="py-3 col">
                                    Setor...
                                </label>
                            </div>

                            <div class="collapse col bottom" id="ingressos1">

                                <div class="setor-titulo has-del-btn">
                                    <label class="col-12">
                                        Título do setor
                                        <input type="text" name="" class="form-control mt-3">
                                    </label>

                                    <button type="button" class="del-btn has-icon" data-delete-field="label">
                                        <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                                        excluir setor
                                    </button>
                                </div>

                                <div class="ingressos col-12">
                                    <div class="ingresso-item has-del-btn">
                                        <button type="button" class="del-btn has-icon" data-delete-field="label">
                                            <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                                            excluir ingresso
                                        </button>
                                        <label>
                                            Modalidade ingresso
                                            <input type="text" name="" id=" " class="form-control">
                                        </label>
                                        <label>
                                            Valor
                                            <input type="text" name="" id=" " class="form-control">
                                        </label>
                                    </div>
                                </div>

                                <button type="button" class="has-icon add-field-btn col-12" data-add-field="ingresso">
                                    <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                                    adicionar ingresso
                                </button>
                            </div>
                        </div>

                    </div>

                    <button type="button" class="has-icon add-field-btn" data-add-field="setor">
                        <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                        adicionar novo setor
                    </button>

                    <!-- <div onclick='novoPreco();' class="areaAcomodacao2">
                        <div class="d-flex">
                            <img src="<?= PATHSITE ?>assets/images/plus.svg">
                            Novo Preço
                        </div>
                    </div> -->

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
<script>
    const addSetorBtn = document.querySelector("[data-add-field=setor]")
    addSetorBtn.addEventListener("click", () => {
        const setorContainer = document.querySelector(".setor-container")
        let setorCount = document.querySelectorAll(".setor-item").length
        setorCount++

        const newElement = document.createElement("div")
        newElement.classList.add("setor-item", "py-3")
        newElement.innerHTML = `
            <div class="top" data-toggle="collapse" data-target="#setor-${setorCount}">
                <button type="button" class="chevron">
                    <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                </button>

                <label class="py-3 col">
                    Setor...
                </label>
            </div>

            <div class="collapse col bottom" id="setor-${setorCount}" data-setor="${setorCount}">
                <div class="setor-titulo has-del-btn">
                    <label class="col-12">
                        Título do setor
                        <input type="text" name="setores[${setorCount}][titulo]" class="form-control mt-3">
                    </label>

                    <button type="button" class="del-btn has-icon" data-delete-field=".setor-item">
                        <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                        excluir setor
                    </button>
                </div>

                <div class="ingressos col-12">
                    
                </div>

                <button type="button" class="has-icon add-field-btn col-12" data-add-field="ingresso">
                    <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                    adicionar ingresso
                </button>
            </div>
        `
        setorContainer.appendChild(newElement)
    })

    const form = document.querySelector("form")
    form.addEventListener("click", (ev)=>{
        const element = ev.target

        if(element.matches("[data-add-field=ingresso]")) {
            const ingressosContainer = element.previousElementSibling
            const currentSetor = element.closest("[data-setor]").dataset.setor
            let ingressosCount = ingressosContainer.querySelectorAll(".ingresso-item").length
            ingressosCount++

            const newElement = document.createElement("div")
            newElement.classList.add("ingresso-item", "has-del-btn")
            newElement.innerHTML = `
                <button type="button" class="del-btn has-icon" data-delete-field=".ingresso-item">
                    <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                    excluir ingresso
                </button>
                <label>
                    Modalidade ingresso
                    <input type="text" name="setores[${currentSetor}][ingressos][${ingressosCount}][titulo]" class="form-control">
                </label>
                <label>
                    Valor
                    <input type="text" name="setores[${currentSetor}][ingressos][${ingressosCount}][valor]" class="form-control">
                </label>
            `
            ingressosContainer.appendChild(newElement)
        }
    })
</script>