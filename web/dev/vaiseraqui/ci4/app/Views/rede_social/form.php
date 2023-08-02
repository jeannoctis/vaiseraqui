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
                           <label for="titulo">Titulo </label>
                           <input type="text" name="" class="form-control" id="titulo" value="<?= $resultado->nome ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                           <label for="titulo">link </label>
                           <input type="text" name="link" class="form-control" id="link" value="<?= $resultado->link ?>" placeholder="Escreva..." required>
                        </div>
                     </div>
                     <div class="form-group col-xs-12 paddingZeroM">
                        <div class="col-xs-12 col-sm-12">
                           <label for="imagem">Ícone <b>(Tamanho recomendado: 20x20 | 1:1 )</b></label> Você pode encontrar ícones em <i><a href="https://www.svgrepo.com/" target="_blank">SVG Repo</a></i>. Recomendamos baixá-los na cor branco.
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->imagem ?>' type="file" name='imagem' id="input-file-now" class="dropify" required>
                           <div class="switch danger col-xs-12">
                              <input id="apagar-imagem" type="checkbox" name="apagarimagem">
                              <label for="apagar-imagem">Apagar imagem</label>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-group col-xs-12">
                     <div class='col-xs-12'>
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