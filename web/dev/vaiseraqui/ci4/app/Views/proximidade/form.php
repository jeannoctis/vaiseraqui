<style>
   .card-content2 .dropify-wrapper {
      height: 120px;
   }
</style>

<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title">
                     <?= $title ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." readonly>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Banner Mobile <b>(Tamanho recomendado: 000 x 000 )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" >
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo2">Banner Desktop <b>(Tamanho recomendado: 000 x 000 )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify" >
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo2" type="checkbox" name="apagararquivo2" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo2" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>                     
                     
                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a class='hidden' href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                              <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                           </a>
                           <input type="submit" name="salvar" value="Salvar e Atualizar" class="btn btn-success btn-rounded waves-effect mb-1" />
                        </div>
                     </div>

                  </div>
               </div>

            </form>
         </div>
      </div>