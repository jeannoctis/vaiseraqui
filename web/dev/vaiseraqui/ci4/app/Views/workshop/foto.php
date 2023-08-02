<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title">Foto</h4>
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <? if ($idFoto) { ?>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' class='dropify' type="file" name='arquivo' value="upload" />
                        <? } else { ?>
                           <input class='dropify' multiple type="file" name='arquivo[]' value="upload" />
                        <? } ?>
                     </div>

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/fotos/<?= encode($idWorkshop) ?>">
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