<style>
    .input-group-addon {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>

<?
$infoPagina['nomeDaPagina'] = "Ingressos";
$infoPagina['iconePagina'] = 'icon-pricing.svg';
?>
<section class="wrap">

    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">

            <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div class="setor-container">

                        <? foreach ($setores as $ind => $setor) { ?>

                            <div class="setor-item py-3">
                                <div class="top" data-toggle="collapse show" data-target="#setor-<?= $ind ?>">
                                    <button type="button" class="chevron">
                                        <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                                    </button>

                                    <label class="py-3 col">
                                        Setor <?= $setor->setor ?>
                                    </label>
                                </div>

                                <div class="collapse show col bottom" id="setor-<?= $ind ?>" data-setor="<?= $ind ?>">
                                    <div class="setor-titulo has-del-btn">
                                        <label class="col-12">
                                            Título do setor
                                            <input type="text" name="setorIngresso[<?= $ind ?>][setor]" value="<?= $setor->setor ?>" class="form-control mt-3" required>
                                        </label>
                                        <input type="hidden" name="setorIngresso[<?= $ind ?>][id]" value="<?= $setor->id ?>">

                                        <button onclick="excluirAba('<?= encode($setor->id) ?>','true', 'ProdutoSetorModel')" type="button" class="del-btn has-icon" data-delete-field=".setor-item">
                                            <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                                            excluir setor
                                        </button>
                                    </div>

                                    <div class="ingressos col-12">

                                        <? foreach ($setor->ingressos as $ind2 => $ingresso) { ?>
                                            <div class="ingresso-item has-del-btn">
                                                <button onclick="excluirAba('<?= encode($ingresso->id) ?>','true', 'SetorIngressoModel')" type="button" class="del-btn has-icon" data-delete-field=".ingresso-item">
                                                    <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                                                    excluir ingresso
                                                </button>
                                                <label>
                                                    Modalidade ingresso
                                                    <input type="text" name="setorIngresso[<?=$ind?>][ingressos][<?=$ind2?>][titulo]" value="<?= $ingresso->titulo ?>" class="form-control" required>
                                                </label>
                                                <label>
                                                    Valor
                                                    <input type="text" name="setorIngresso[<?=$ind?>][ingressos][<?=$ind2?>][preco]" value="<?= $ingresso->preco ?>" class="form-control money" required>
                                                </label>
                                                <input type="hidden" name="setorIngresso[<?= $ind ?>][ingressos][<?=$ind2?>][idIngresso]" value="<?= $ingresso->id ?>">
                                            </div>
                                        <? } ?>

                                    </div>

                                    <button type="button" class="has-icon add-field-btn col-12" data-add-field="ingresso">
                                        <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                                        adicionar ingresso
                                    </button>
                                </div>
                            </div>



                        <? } ?>

                    </div>

                    <button type="button" class="has-icon add-field-btn" data-add-field="setor">
                        <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                        adicionar novo setor
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

<script>
    const addSetorBtn = document.querySelector("[data-add-field=setor]")
    addSetorBtn.addEventListener("click", () => {
        const setorContainer = document.querySelector(".setor-container")
        let setorCount = document.querySelectorAll(".setor-item").length
        setorCount++

        const newElement = document.createElement("div")
        newElement.classList.add("setor-item", "py-3")
        newElement.innerHTML = `
        <div id="cardsetor-${setorCount}">
            <div class="top" data-toggle="collapse show" data-target="#setor-${setorCount}">
                <button type="button" class="chevron">
                    <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                </button>

                <label class="py-3 col">
                    Setor...
                </label>
            </div>

            <div class="collapse show col bottom" id="setor-${setorCount}" data-setor="${setorCount}">
                <div class="setor-titulo has-del-btn">
                    <label class="col-12">
                        Título do setor
                        <input type="text" name="setorIngresso[${setorCount}][setor]" class="form-control mt-3" required>
                    </label>

                    <button onclick="excluirAba('setor-${setorCount}','false', '');" type="button" class="del-btn has-icon" data-delete-field=".setor-item">
                        <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                        excluir setor
                    </button>
                </div>

                <div class="ingressos col-12">
                    
                </div>

                <button  type="button" class="has-icon add-field-btn col-12" data-add-field="ingresso">
                    <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                    adicionar ingresso
                </button>
            </div>
                            </div>
        `
        setorContainer.appendChild(newElement)
    })

    const form = document.querySelector("form")
    form.addEventListener("click", (ev) => {
        const element = ev.target

        if (element.matches("[data-add-field=ingresso]")) {
            const ingressosContainer = element.previousElementSibling
            const currentSetor = element.closest("[data-setor]").dataset.setor
            let ingressosCount = ingressosContainer.querySelectorAll(".ingresso-item").length
            ingressosCount++

            const newElement = document.createElement("div")
            newElement.classList.add("ingresso-item", "has-del-btn")
            newElement.innerHTML = `
            <div id='cardingresso-${ingressosCount}'>
                <button onclick="excluirAba('ingresso-${ingressosCount}','false', '');" type="button" class="del-btn has-icon" data-delete-field=".ingresso-item">
                    <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                    excluir ingresso
                </button>
                <label>
                    Modalidade ingresso
                    <input type="text" name="setorIngresso[${currentSetor}][ingressos][${ingressosCount}][titulo]" class="form-control" required>
                </label>
                <label>
                    Valor
                    <input type="text" name="setorIngresso[${currentSetor}][ingressos][${ingressosCount}][preco]" class="form-control money" required>
                </label>
                        </div>
            `
            ingressosContainer.appendChild(newElement)
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
        }
    })
</script>