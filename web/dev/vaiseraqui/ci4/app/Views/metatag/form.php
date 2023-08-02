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
					
         
       	<div class="box-content card white">
					<h4 class="box-title"><?=$resultado->nome?></h4>
					<!-- /.box-title -->
					<div class="card-content">
            <div class='form-group col-xs-12 paddingZeroM'>                                                  
                            <div class="col-xs-12 col-sm-6">
                                <label for="title">Title</label>                               
                                    <input type="text" name="titulo" class="form-control" id="title" value="<?= $resultado->titulo ?>" placeholder="Escreva...">                              
                            </div>
                <div class="col-xs-12 col-sm-4">
                                <label for="description">Description</label>                               
                  <textarea maxlength='160' type="text" name="description" class="form-control validaTamanho" id="textarea"  placeholder="Escreva..."><?= $resultado->description ?></textarea>                             
                            </div>
                            </div>
            <div class="form-group col-xs-12">
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
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