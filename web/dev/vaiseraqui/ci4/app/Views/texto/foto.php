<?
$tamanhoRecomendado = "1920x800";
?>

 
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
  <div class="col-lg-12 col-xs-12">
     <form method="post" enctype="multipart/form-data" >
				<div class="box-content card white">
					<h4 class="box-title">Fotos</h4>
					<!-- /.box-title -->
					<div class="card-content">
            
            <div class='form-group col-xs-12 paddingZeroM'>
                            <div class="col-xs-12 col-sm-12">
                               
                              <label for="nome" > <span  style='<?=($pageFK2) ? '' : 'display: none;' ?>'>Titulo</span> <b>(Tamanho recomendado: 220x280) </b>  </label>                               
                                    <input  style='<?=($pageFK2) ? '' : 'display: none;' ?>' type="text" name="nome" class="form-control" id="nome" value="<?= $resultado->nome ?>" placeholder="Escreva...">  
                              <? if($resultado->id){?>
                        <input type='hidden' name='id' value='<?=$resultado->id?>' />
<?}?>
              </div>                             
          </div>
            
                  <div class='form-group col-xs-12 paddingZeroM'>
                   <? if ($pageFK2) { ?>
            
    <input  data-default-file='<?= PATHSITE ?>uploads/<?=$table ?>/<?=$resultado->textoFK?>/<?= $resultado->arquivo ?>' class='dropify'  type="file" name='arquivo' value="upload" />
                    <? } else { ?>
                    <input class='dropify' multiple type="file" name='arquivo[]' value="upload"  />
                    
<? }?>
            </div>
       
             <div class="form-group col-xs-12">
                                    <a  href="<?= PATHSITE ?>admin/<?= $table ?>/fotos/<?= encode($pageFK) ?>?tipo=<?=$get["tipo"]?>">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                    </a>
                                    <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                                </div>
                        
                        </div>
					</div>
       
       	
       
         </form>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>

