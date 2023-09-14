<?
$infoPagina['nomeDaPagina'] = "Dados do anúncio";
$infoPagina['iconePagina'] = 'icon-write.svg';
?>
<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">            
            <!-- <hr class="linhaform"> -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca">
                <fieldset>
                    <div class="row">

                        <h2 class="col-12">Dados Gerais</h2>

                        <div class="col-6">
                            <label>Nome (que você quer que apareça em destaque)</label>
                            <input type="text" name="titulo" class="form-control" Value="<?= $anuncio->titulo ?>">
                        </div>

                        <div class="col-6">
                            <label>Categoria</label>
                            <? if ($categoriasDoTipo) { ?>
                                <select name="categoriaFK" required class="form-control js-example-basic-single" id="categoria" disabled>
                                    <option value="">-- selecione uma categoria --</option>
                                    <? foreach ($categoriasDoTipo as $categoria) { ?>
                                        <option <?= $anuncio->categoriaFK == $categoria->id ? 'selected' : '' ?> value="<?= $categoria->id ?>">
                                            <?= $categoria->titulo ?>
                                        </option>
                                    <? } ?>
                                </select>
                            <? } ?>
                        </div>

                        <h2 class="col-12 mt-5">Endereco</h2>
                        <div class="row col-12">
                            <div class="col-12 col-md-4">
                                <label>Rua, número, complemento</label>
                                <input type="text" name="endereco" class="form-control" Value="<?= $anuncio->endereco ?>">
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Bairro</label>
                                <input type="text" name="bairro" class="form-control" Value="<?= $anuncio->bairro ?>">
                            </div>


                            <div class="col-12 col-md-4">
                                <label>Cidade</label>

                                <? if ($estados) { ?>
                                    <select name="cidadeFK" required class="form-control js-example-basic-single" id="cidadeFK">
                                        <option value="">-- selecione uma cidade --</option>
                                        <? foreach ($estados as $estado) { ?>
                                            <optgroup label="<?= $estado->titulo ?>">
                                                <? foreach ($estado->cidades as $cidade) { ?>
                                                    <option <?= $anuncio->cidadeFK == $cidade->id ? 'selected' : '' ?> value="<?= $cidade->id ?>">
                                                        <?= $cidade->titulo ?>
                                                    </option>
                                                <? } ?>
                                            </optgroup>
                                        <? } ?>
                                    </select>
                                <? } ?>
                            </div>

                        </div>

                        <div class="col-12">
                            <label>Nome do local</label>
                            <input type="text" name="local" class="form-control" Value="<?= $anuncio->local ?>">
                        </div>

                        <div class="row col-12">
                            <div class="col-12 col-md-6">
                                <label>Iframe do mapa</label>
                                <textarea name="mapa" class="form-control"><?= $anuncio->mapa ?></textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label>Coordenadas </label>
                                <textarea name="coordenadas" class="form-control"><?= $anuncio->coordenadas ?></textarea>
                            </div>
                        </div>

                        <? if ($anuncio->tipoFK == 4) { ?>
                            <div class="col-12">
                                <label>Área útil</label>
                                <input type="text" name="areautil" class="form-control" Value="<?= $anuncio->areautil ?>">
                            </div>
                        <? } ?>

                        <h2 class="col-12 mt-5">Descrição</h2>
                        <div class="col-12">
                            <label>Descrição da Apresentação</label>
                            <textarea rows="3" type="text" name="descricao" class="form-control"><?= $anuncio->descricao ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Descrição completa</label>
                            <textarea rows="3" type="text" name="detalhes" class="form-control tinymce_full"><?= $anuncio->detalhes ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Description (SEO)</label>
                            <textarea name="description" class="form-control"><?= $anuncio->description ?></textarea>
                        </div>

                        <? if ($anuncio->tipoFK == 5) { ?>
                            <!-- Datas Eventos -->
                            <h2 class="col-12 mt-5">Datas do Evento</h2>
                            <div class="dates-container col-12 row">
                                <? foreach ($datas as $ind => $data) { ?>
                                    <label class="has-del-btn py-3 col">
                                        <input type="hidden" name="datas[<?= $ind ?>][id]" value="">
                                        Data 1
                                        <input type="date" name="datas[<?= $ind ?>][data]" value="<?= $data->data ?>" class="form-control mt-3">
                                        Início
                                        <input type="time" name="datas[<?= $ind ?>][horarioInicio]" value="<?= $data->horarioInicio ?>" class="form-control mt-3">
                                        Término
                                        <input type="time" name="datas[<?= $ind ?>][horarioTermino]" value="<?= $data->horarioTermino ?>" class="form-control mt-3">
                                    </label>
                                <? } ?>
                            </div>

                            <button type="button" class="has-icon add-field-btn" data-add-field="date">
                                <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                                adicionar novo campo de data
                            </button>

                        <? } ?>

                        <div class="col-12">
                            <button type="submit" class="form-control formsubmit" name="">
                                Atualizar dados
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>

<script>
    const datesContainer = document.querySelector(".dates-container")
    const addDateBtn = document.querySelector("[data-add-field=date]")
    addDateBtn.addEventListener("click", () => {
        let datesCount = datesContainer.querySelectorAll("label").length
        datesCount++
        const newElement = document.createElement("label")
        newElement.classList.add("has-del-btn", "py-3", "col")
        newElement.innerHTML = `
            Data ${datesCount}
            <button type="button" class="del-btn has-icon" data-delete-field="label">
                <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                excluir
            </button>
            <input type="date" name="datas[${datesCount}][data]" class="form-control mt-3">
            Início
            <input type="time" name="datas[${datesCount}][horarioInicio]" class="form-control mt-3">
            Término
            <input type="time" name="datas[${datesCount}][horarioTermino]" class="form-control mt-3">
        `
        datesContainer.appendChild(newElement)
    })

    function mudaCalendario() {
        var calendario = $("#calendario").val();

        if (calendario == 'S') {
            $("#bannerArquivo").hide();
        } else {
            $("#bannerArquivo").show();
        }

    }
</script>