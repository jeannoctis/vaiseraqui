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
					
       
       <div class="card-content card-content2">

              <div class='form-group col-xs-12 paddingZeroM'>
                <div class="col-xs-12 col-sm-6">
                  <label for="diferencial1">Diferencial 01  </label> 
                  <input type="text" name="diferencial1" class="form-control" id="diferencial1" value="<?= $resultado->diferencial1 ?>" placeholder="Escreva...">
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="icone1"> Ícone 01 <b>(Tamanho Recomendado: 100x100)</b>  </label>

                  <input data-default-file='<?= PATHSITE ?>uploads/<?=$tabela ?>/<?= $resultado->icone1 ?>' type="file" name='icone1' id="input-file-now" class="dropify">                 
                </div>
                   <div class="col-xs-12 col-sm-2">
                  <div class='iconezinho' style="margin-top: 55px; background-size: contain; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->icone1 ?>); height: 45px; background-repeat: no-repeat"></div>
              </div>
              </div>
              
              <div class='form-group col-xs-12 paddingZeroM'>
                <div class="col-xs-12 col-sm-6">
                  <label for="diferencial2">Diferencial 02  </label>
                  <input type="text" name="diferencial2" class="form-control" id="diferencial2" value="<?= $resultado->diferencial2 ?>" placeholder="Escreva...">
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="icone2"> Ícone 02  <b>(Tamanho Recomendado: 100x100)</b> </label>
                  <input data-default-file='<?= PATHSITE ?>uploads/<?=$tabela ?>/<?= $resultado->icone2 ?>' type="file" name='icone2' id="input-file-now" class="dropify">               
                </div>
                 <div class="col-xs-12 col-sm-2">
                  <div class='iconezinho' style="margin-top: 55px; background-size: contain; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->icone2 ?>); height: 45px; background-repeat: no-repeat"></div>
              </div>
              </div>
              <div class='form-group col-xs-12 paddingZeroM'>
                <div class="col-xs-12 col-sm-6">
                  <label for="diferencial3">Diferencial 03 </label>
                  <input type="text" name="diferencial3" class="form-control" id="diferencial3" value="<?= $resultado->diferencial3 ?>" placeholder="Escreva...">
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label for="icone1"> Ícone 03  <b>(Tamanho Recomendado: 100x100)</b> </label>
                  <input data-default-file='<?= PATHSITE ?>uploads/<?=$tabela ?>/<?= $resultado->icone3 ?>' type="file" name='icone3' id="input-file-now" class="dropify">                 
                </div>
                 <div class="col-xs-12 col-sm-2">
                  <div class='iconezinho' style="margin-top: 55px; background-size: contain; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->icone3 ?>); height: 45px; background-repeat: no-repeat"></div>
              </div>
                <div class="form-group col-xs-12">
                  <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                    </a>
                  <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                </div>
              </div>


            </div>
       
				<!-- /.box-content -->
			</div>