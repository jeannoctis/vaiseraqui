<?
 $infoPagina['nomeDaPagina'] = "Vídeo";
          $infoPagina['iconePagina'] = 'icone_video.svg';
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
                        <div class="row">
                            <div class="col-12">
                                <label>Vídeo (URL do Youtube)</label>
                                <input type="text" name="video" class="form-control" Value="<?=$anuncio->video?>">
                            </div>
                          
                          <?
  
  if($anuncio->video){
                              $url_components = parse_url($anuncio->video);  
    if($url_components) {
       parse_str($url_components['query'], $params);
    }
                                       
  }
                     
                          ?>
                          
                            <div class="col-12">
                                <div class="areaVideo">
                                    <iframe  class=""
                                            src="https://www.youtube.com/embed/<?=$params["v"]?>">
                                        </iframe>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <button type="submit" class="form-control formsubmit" name="">
                                    Salvar e atualizar
                                </button>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="buttonLink resetForm">
                                    Limpar filtros
                                 </div>
                            </div>

                        </div>
                    </fieldset>
                </form>
                
                
                




            </div>
        </div>

    </section>