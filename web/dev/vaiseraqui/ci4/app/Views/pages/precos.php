<?
 $infoPagina['nomeDaPagina'] = "Ingressos";
 $infoPagina['iconePagina'] = 'icon-pricing.svg';
?>
<section class="wrap">
   
    <? echo View("templates/barra-topo",$infoPagina); ?>
   
        <div class="conteudo">
            <div class="container-fluid">
              
                 <div class="row">                  
                    <div class="col-12 col-md-12">
                       <?=$textoExplicativo->texto?>
                    </div>
                </div>               
                 <hr class="linhaform">
                
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                    <fieldset>
                      <? if($precos){?>
                        <div id="accordion">
                          <? foreach($precos as $ind => $texto){?>
                            <div class="card">
                                <div class="card-header" id="tituloAba<?=$ind?>">
                                    <h5 class="mb-0">
                                        <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?=$ind?>" aria-expanded="true" aria-controls="aba<?=$ind?>">
                                          <?=$texto->titulo?> <img src="<?=PATHSITE?>images/icone_menu.svg">

                                            <div onclick="excluirAba('<?=encode($texto->id)?>','true', 'ProdutoPrecoModel')" class="excluirAba">
                                               <img style="filter: unset;" src="<?=PATHSITE?>images/lixeira.svg">
                                                Excluir 
                                            </div>
                                        </div>
                                    </h5>
                                </div>

                                <div id="aba<?=$ind?>" class="collapse show" aria-labelledby="tituloAba<?=$ind?>" data-parent="#accordion">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12">
                                                <label>Título</label>
                                              <input type='hidden' name='id[]' value="<?=encode($texto->id)?>" />
                                                <input type="text" name="titulo[]" class="form-control" Value="<?=$texto->titulo?>">
                                            </div>
                                      
                                          
                                           <div class='col-12'>
                                            <label>Preço</label>
                                            <input type="text" name="valor[]" class="form-control money2" Value="<?=$texto->valor?>">
                                          </div>
                                       
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                          <? } ?>
                        </div>
                      <? } ?>

                            <div onclick='novoPreco();' class="areaAcomodacao2">
                                <div class="d-flex">
                                    <img src="<?=PATHSITE?>assets/images/plus.svg">
                                    Novo Preço     
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
