<?
$infoPagina['nomeDaPagina'] = "Dados do anúncio";
$infoPagina['iconePagina'] = 'icon-write.svg';
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
            <!-- <hr class="linhaform"> -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca">
                <fieldset>
                    <div class="row">

                        <h2 class="col-12">Dados Gerais</h2>

                        <div class="col-6">
                            <label>Nome (que você quer que apareça em destaque)</label>
                            <input type="text" name="titulo" class="form-control" Value="<?= $anuncio->titulo ?>">
                        </div>

                        <? if ($categorias) { ?>
                            <div class="col-6">
                                <label>Tipo do Imóvel</label>
                                <select <?= ($anuncio->categoriaFK) ? "disabled" : "" ?> required type="text" name="categoriaFK" class="form-control" Value="">
                                    <option value=''>Selecione...</option>
                                    <? foreach ($categorias as $cat) { ?>
                                        <option <?= ($anuncio->categoriaFK == $cat->id) ? "selected" : "" ?> value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                    <? } ?>
                                </select>
                            </div>
                        <? } ?>



                        <h2 class="col-12 mt-5">Endereco</h2>
                        <div class="row col-12">
                            <div class="col-12 col-md-4">
                                <label>Endereço</label>
                                <input <?= ($anuncio->endereco) ? "disabled" : "" ?> type="text" name="endereco" class="form-control" Value="<?= $anuncio->endereco ?>">
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Bairro</label>
                                <input <?= ($anuncio->bairro) ? "disabled" : "" ?> type="text" name="bairro" class="form-control" Value="<?= $anuncio->bairro ?>">
                            </div>

                            <? if ($cidades) { ?>
                                <div class="col-12 col-md-4">
                                    <label>Cidade</label>
                                    <select <?= ($anuncio->cidadeFK) ? "disabled" : "" ?> required type="text" name="cidadeFK" class="form-control" Value="">
                                        <option value=''>Selecione...</option>
                                        <? foreach ($cidades as $cat) { ?>
                                            <option <?= ($anuncio->cidadeFK == $cat->id) ? "selected" : "" ?> value="<?= $cat->id ?>"><?= $cat->titulo ?>/<?= $cat->sigla ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            <? } ?>
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

                        <h2 class="col-12 mt-5">Descrição</h2>
                        <div class="col-12">
                            <label>Descrição da Apresentação</label>
                            <textarea rows="3" type="text" name="descricao" class="form-control"><?= $anuncio->descricao ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Descrição completa</label>
                            <textarea rows="3" type="text" name="detalhes" class="form-control"><?= $anuncio->detalhes ?></textarea>
                        </div>

                        <!-- <div class='col-12'>
                            <label>Itens disponíveis</label>
                            <input id="itensdisponiveis" data-role="tagsinput" type="text" name="itensdisponiveis" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->itensdisponiveis ?>" placeholder="Itens">
                        </div> -->

                        <!-- <div class='col-12'>
                            <label>Condomínio</label>
                            <input id="condominio" data-role="tagsinput" type="text" name="condominio" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->condominio ?>" placeholder="Itens">
                        </div> -->

                        <div class="col-12 mb-3">
                            <label>Descrição sobre o imóvel</label>
                            <textarea name="texto" id="inputTexto" class="form-control tinymce_full"><?= $anuncio->texto ?></textarea>
                        </div>

                        <!-- <div class="col-12">
                            <label>Observações</label>
                            <textarea type="text" name="observacoes" class="form-control tinymce_full"><?= $anuncio->observacoes ?></textarea>
                        </div> -->

                        <!-- <div class="col-12">
                            <label>Regras de Check-in e Check-out</label>
                            <textarea type="text" name="regrascheck" class="form-control tinymce_full"><?= $anuncio->regrascheck ?></textarea>
                        </div> -->

                        <!-- <div class="col-12">
                            <label>O que é permitido</label>
                            <textarea type="text" name="pode" class="form-control tinymce_full"><?= $anuncio->pode ?></textarea>
                        </div> -->

                        <!-- <div class="col-12">
                            <label>O que é permitido</label>
                            <textarea type="text" name="naopode" class="form-control tinymce_full"><?= $anuncio->naopode ?></textarea>
                        </div> -->

                        <div class="col-12">
                            <label>Description (SEO)</label>
                            <textarea name="description" class="form-control"><?= $anuncio->description ?></textarea>
                        </div>

                        <!-- Datas Eventos -->
                        <h2 class="col-12 mt-5">Datas do Evento</h2>

                        <div class="dates-container col-12 row">
                            <label class="has-del-btn py-3 col">
                                Data 1                                
                                <input type="date" name="datas[0][data]" class="form-control mt-3">
                                Início
                                <input type="time" name="datas[0][horarioInicio]" class="form-control mt-3">
                                Término
                                <input type="time" name="datas[0][horarioTermino]" class="form-control mt-3">
                            </label>
                        </div>

                        <button type="button" class="has-icon add-field-btn" data-add-field="date">
                            <img src="<?= PATHSITE ?>assets/images/icon-plus.svg" alt="">
                            adicionar novo campo de data
                        </button>

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