<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-6">
                           <label for="titulo">Endereço completo </label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <label for="complemento">Complemento </label>
                           <input type="text" name="complemento" class="form-control" id="complemento" value="<?= $resultado->complemento ?>" placeholder="Escreva...">
                        </div>

                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-6">
                           <label for="cep">CEP </label>
                           <input type="text" name="cep" class="form-control" id="cep" value="<?= $resultado->cep ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <label for="bairro">Bairro </label>
                           <input type="text" name="bairro" class="form-control" id="bairro" value="<?= $resultado->bairro ?>" placeholder="Escreva...">
                        </div>

                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-6">
                           <label for="cidade">Cidade</label>
                           <input type="text" name="cidade" class="form-control" id="cidade" value="<?= $resultado->cidade ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <label for="estado">Estado </label>
                           <input type="text" name="estado" class="form-control" id="estado" value="<?= $resultado->estado ?>" placeholder="Escreva...">
                        </div>

                     </div>

                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                              <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                           </a>
                           <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                        </div>
                     </div>
                  </div>
               </div>

            </form>
            <!-- /.card-content -->
         </div>
         <!-- /.box-content -->
      </div>