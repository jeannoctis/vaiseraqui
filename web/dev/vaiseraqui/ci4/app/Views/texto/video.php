<?
$tamanhoRecomendado = "1920x800";
?>

 
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
  <div class="col-lg-12 col-xs-12">
     <form method="post" enctype="multipart/form-data" >
				<div class="box-content card white">
					<h4 class="box-title"><?=$title?></h4>
					<!-- /.box-title -->
					<div class="card-content">
					
            <div class='form-group col-xs-12 paddingZeroM'>
               <div class="col-xs-12 col-sm-12">
                                <label for="titulo" >Nome do vídeo  </label>                               
                                    <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Ex: Vídeo da empresa">                             
              </div>      
              
            </div>
            
         <?
                              if($resultado->video){
                              $url_components = parse_url($resultado->video);  
    if($url_components) {
       parse_str($url_components['query'], $params);
    } } ?>
  
       <div class="form-group col-xs-12 paddingZeroM">
           <div style='margin-bottom: 20px;' class="col-xs-12 col-sm-12">
                                <label for="video" >Vídeo (Youtube)</label>                                
                                    <input type="text" name="video" class="form-control" id="link" value="<?= $resultado->video ?>" placeholder="https://www.youtube.com/watch?v=VIDEO">                               
                            </div>
                            <? if ($resultado->video) { ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Ver vídeo</label>
                                    <div class="col-sm-10">
                                        <iframe  height="315"
                                                 src="https://www.youtube.com/embed/<?= $params['v'] ?>">
                                        </iframe>
                                    </div>
                                </div>
            </div>
              <? } ?>
                          
                        <div style='margin-top: 15px;' class="form-group col-xs-12">
                                   <a href="<?= PATHSITE ?>admin/<?= $table ?>/videos/<?= encode($pageFK) ?>?tipo=<?=$get["tipo"]?>">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                    </a>
                                    <input type="submit" name="salvar" value="Salvar e <?=($resultado->id) ? "atualizar" : "continuar" ?>" class="btn btn-success btn-rounded waves-effect mb-1">
                                </div>
            
          </div>
           </div>
    
					</div>     
       
         </form>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>