<?
 $infoPagina['nomeDaPagina'] = "Vídeo";
          $infoPagina['iconePagina'] = 'icon-video.svg';
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
                                    
                </div>
                <hr class="linhaform">
                
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                    <fieldset>                        
                        <div id="accordion">
                              <? if($textos){?>
                          <? foreach($textos as $ind => $texto){
                              if ($texto->video) {
                        $url_components = parse_url($texto->video);
                        if ($url_components) {
                           parse_str($url_components['query'], $params);
                        }
                     }
              
                              ?>
                            <div  class="card card-video">
                                <div class="card-header" id="tituloAba<?=$ind?>">
                                    <h5 class="mb-0">
                                        <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#aba<?=$ind?>" aria-expanded="true" aria-controls="aba<?=$ind?>">
                                         Vídeo 0<?=$ind+1?> <img src="<?=PATHSITE?>images/icone_menu.svg">                                            
                                        </div>
                                        <div onclick="excluirVideo('<?=encode($texto->id)?>','true', 'ProdutoVideoModel')" class="excluirAba">
                                                <img src="<?=PATHSITE?>images/lixeira.svg">
                                                Excluir 
                                            </div>
                                    </h5>
                                </div>

                                <div id="aba<?=$ind?>" class="collapse " aria-labelledby="tituloAba<?=$ind?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Vídeo</label>
                                              <input type='hidden' name='id[]' value="<?=encode($texto->id)?>" />
                                                <input placeholder="https://www.youtube.com/watch?v=CODIGO" type="text" name="titulo[]" class="form-control" Value="<?=$texto->video?>">
                                            </div>
                                            <div class="col-12">
                                               <iframe style='margin-top: 3rem;' height="315" width="500" src="https://www.youtube.com/embed/<?= $params['v'] ?>">
                                 </iframe>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                          <? } ?>
    <? } ?>
                        </div>
                  

                            <div onclick='novoVideo();' class=" areaAcomodacao2 ">
                                <div class="d-flex">
                                    <img src="<?=PATHSITE?>assets/images/plus.svg">
                                    Adicionar vídeo     
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
                