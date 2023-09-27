<?
$infoPagina['nomeDaPagina'] = "Datas";
$infoPagina['iconePagina'] = 'icon-calendar.svg';
?>
<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">            
            <!-- <hr class="linhaform"> -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca">
                <fieldset>
                    <div class="row">

                        <h2 class="col-12">Datas do Evento</h2>
       

                            <!-- Datas Eventos -->
                            <h2 class="col-12 mt-5">Datas do Evento</h2>
                            <div class="dates-container col-12 row">
                                <? foreach ($datas as $ind => $data) { ?>
                                    <label class="has-del-btn py-3 col-12">
                                        
                                        <button onclick="excluirAba('<?=encode($data->id)?>' ,'true', 'ProdutoDataModel')"  type="button" class="del-btn has-icon" data-delete-field="label">
                <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                excluir
            </button>
                                        
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
        newElement.classList.add("has-del-btn", "py-3", "col-12")
        newElement.innerHTML = `
         <div id='card${datesCount}'  >
            Data:
       
            <button onclick="excluirAba('${datesCount}','false', 'ProdutoSetorModel')"  type="button" class="del-btn has-icon" data-delete-field="label">
                <img src="<?= PATHSITE ?>assets/images/icon-trash-can.svg" alt="">
                excluir
            </button>
            <input type="date" name="datas[${datesCount}][data]" class="form-control mt-3">
            Início
            <input type="time" name="datas[${datesCount}][horarioInicio]" class="form-control mt-3">
            Término
            <input type="time" name="datas[${datesCount}][horarioTermino]" class="form-control mt-3">
                </div>
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