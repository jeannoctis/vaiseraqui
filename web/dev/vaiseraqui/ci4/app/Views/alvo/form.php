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
                     <?= $title ?> - <?= $resultado->titulo ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="texto">Texto</label>
                           <textarea name='texto' class="tinymce_full" id="texto"><?= $resultado->texto ?></textarea>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Banner/fundo <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                           <div>
                              <label for='apagar-arquivo'><i class="bi bi-trash3"></i> Apagar arquivo</i><input style='height: 20px;width: 20px; float: left; margin-right: 8px; margin-top: 1px; margin-bottom: 10px;' name='apagararquivo' type='checkbox' id='apagar-arquivo' /> </label>
                           </div>
                        </div>
                     </div>

                     <div class="form-group col-lg-6 paddingZeroM">
                        <div class="col-xs-12 col-sm-12">
                           <label for="arquivo2">Ícone <b>(Tamanho recomendado: x | 1:1 )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify">
                           <div>
                              <label for='apagar-arquivo2'><i class="bi bi-trash3"></i> Apagar arquivo <input style='height: 20px;width: 20px; float: left; margin-right: 8px; margin-top: 1px; margin-bottom: 10px;' name='apagararquivo2' type='checkbox' id='apagar-arquivo2' /> </label>
                           </div>
                        </div>
                     </div>

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
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