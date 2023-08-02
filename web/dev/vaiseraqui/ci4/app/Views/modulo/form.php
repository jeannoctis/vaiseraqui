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

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="modulo">Módulo</label>
                           <input type="text" name="modulo" class="form-control" id="modulo" value="<?= $resultado->modulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="descricao">Descrição</label>
                           <input type="text" name="descricao" class="form-control" id="descricao" value="<?= $resultado->descricao ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class="form-group col-lg-6 paddingZeroM">
                        <div class="col-xs-12 col-sm-12">
                           <label for="arquivo">Ícone <b>(Tamanho recomendado: 42 x 42 | 1:1 )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                           <div>
                              <label for='apagar-arquivo'><i class="bi bi-trash3"></i> Apagar arquivo <input style='height: 20px;width: 20px; float: left; margin-right: 8px; margin-top: 1px; margin-bottom: 10px;' name='apagararquivo' type='checkbox' id='apagar-arquivo' /> </label>
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