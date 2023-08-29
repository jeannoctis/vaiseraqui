<style>
    .input-group-addon{
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
$infoPagina['nomeDaPagina'] = "Preços";
$infoPagina['iconePagina'] = 'icone_ok.svg';
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
            <hr class="linhaform">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div class="box-content card white">
                        <h4 class="box-title with-btn">
                            Ingressos
                        </h4>
                        <div class="card-content" id="setorIngressoContainer">
                            <?
                            if ($setores) {
                                foreach ($setores as $key => $setor) {
                                    ?>
                                    <div class="form-group col-12 paddingZeroM setor-ingresso card-content" data-setor-ingresso="<?= $setor->setor ?>" data-setor-numero=<?= $key ?>>
                                        <div class="box-title with-btn">
                                            <?= $setor->setor ?>
                                            <div class="btns-cont">
                                                <button onclick="$('#modalIngresso').show();" type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="<?= $setor->setor ?>">
                                                    Adicionar ingresso
                                                    <i class="ico bi bi-plus-lg"></i>
                                                </button>

                                                <div onclick="excluirAba('<?= encode($setor->id) ?>', 'true', 'ProdutoSetorModel')" class="excluirAba">
                                                    <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                                                    Excluir 
                                                </div>
                                            </div>
                                        </div>

                                        <? foreach ($setor->ingressos as $keyIng => $ingresso) { ?>
                                            <div class="col-12 paddingZeroM ingresso-div card-content mb-3">
                                                <div class="input-group">
                                                    <input type="hidden" name="setorIngresso[<?= $key ?>][id]" value="<?= $setor->id ?>">
                                                    <input type="hidden" name="setorIngresso[<?= $key ?>][setor]" value="<?= $setor->setor ?>">
                                                    <input type="hidden" name="setorIngresso[<?= $key ?>][idSetor]" value="<?= $setor->id ?>">

                                                    <span class="input-group-addon">Tipo</span>
                                                    <input type="hidden" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][idIngresso]" value="<?= $ingresso->id ?>">
                                                    <input type="text" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][modalidade]" class="form-control" value="<?= $ingresso->titulo ?>" placeholder="Escreva...">
                                                    <span class="input-group-addon">R$</span>
                                                    <input type="text" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][preco]" class="form-control money" value="<?= $ingresso->preco ?>" placeholder="Escreva...">
                                                    <div onclick="excluirAba('<?= encode($setor->id) ?>', 'true', 'SetorIngressoModel')" class="excluirAba">
                                                        <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                                                        Excluir 
                                                    </div>
                                                </div>

                                            </div>
                                        <? } ?>
                                    </div>
                                    <?
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div onclick='$("#modalSetorIngresso").modal("show");' class="areaAcomodacao2">
                        <div  class="d-flex">
                            <img src="<?= PATHSITE ?>assets/images/plus.svg">
                            Adicionar ponto de venda
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


<div id="modalSetorIngresso" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <h2 class='mt-3 mb-3'>
                    Adicionar ponto de venda
                </h2>

                <label for="tituloSetor" class="form-group col-12">
                    Título
                    <input type="text" name="titulo" id="tituloSetor" class="form-control" placeholder="pista, vip, camarote...">
                </label>

                <ul class="tipo-ponto-de-venda">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="tipo-pdv" id="pdv-fisico" value="fisico">
                            <label for="pdv-fisico">
                                Ponto de venda físico
                                <img src="<?= PATHSITE ?>assets2/Group 2310.png" alt="ícone ponto de venda físico">
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="tipo-pdv" id="pdv-online" value="online">
                            <label for="pdv-online">
                                Ponto de venda online
                                <img src="<?= PATHSITE ?>assets2/web.png" alt="ícone ponto de venda online">
                            </label>
                        </div>
                    </li>
                </ul> 
                <button onclick="conferirModalSetorIngresso();" class="form-control formsubmit" type="button">Adicionar Campo</button>
                <span class="msgErro text-warning bold"></span>

            </div>
        </div>
    </div>
</div>

<div id="modalIngresso" class="modal fade" role="dialog">
    <div  class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->


                <label for="ingTitulo" class="form-group col-12">
                    Tipo
                    <input type="text" name="titulo" class="form-control" id="ingTitulo" placeholder="inteira, meia...">
                </label>
                <label for="preco" class="form-group col-12">
                    Valor R$
                    <input type="text" name="preco" class="money form-control" id="preco" placeholder="apenas números">
                </label>

                <button class="form-control formsubmit" type="button">Adicionar Campo</button>
                <span id="msgErroIngresso" class="msgErro text-warning bold"></span>

            </div>
        </div>
    </div>
</div>



<script>
   function conferirModalSetorIngresso() {       
       var modal = $("#modalSetorIngresso");
            const tituloSetor = $("#tituloSetor").val();
            const msg = $("#msgErroIngresso");

            msg.textContent = ""
            if (tituloSetor.length <= 2) {
               msg.textContent = "Título com pelo menos 3 caracteres"
               return
            }

            const titulo = tituloSetor.value
            tituloSetor.value = ""

            $("#modalSetorIngresso").modal('hide');
            adicionarCampoSetorIngresso(titulo);
         }
         
         function adicionarCampoSetorIngresso(titulo) {
            const setorIngressoContainer = document.querySelector("#setorIngressoContainer")
            const newElement = document.createElement("div")
            setorIngressoCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "setor-ingresso", "card-content")
            newElement.setAttribute("data-setor-ingresso", `${titulo}`)
            newElement.setAttribute("data-setor-numero", `${setorIngressoCount}`)

            newElement.innerHTML = `
               <div class="box-title with-btn">
                  ${titulo}
                  <div class="btns-cont">
                     <button type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="${titulo}">
                        Adicionar ingresso
                        <i class="ico bi bi-plus-lg"></i>
                     </button>
                     <button type="button" class="btn btn-xs btn-rounded btn-danger" data-parent="setor-ingresso">
                        <i class="bi bi-trash"></i>
                     </button>
                  </div>
               </div>            
            `
            setorIngressoContainer.appendChild(newElement)
         }
         
    </script>