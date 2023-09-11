<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?> - <?= $resultado->titulo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">
                     <div class='form-group col-xs-12'>
                        <label for="titulo">Formulário </label>
                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." readonly>
                     </div>

                     <div class='form-group col-xs-12'>
                        <label for="texto">Intruções</label>
                        <textarea name='texto' class="tinymce_full" id="texto"><?= $resultado->texto ?></textarea>
                     </div>

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/">
                           <button type="button" class="btn btn-primary btn-rounded waves-effect">Voltar</button>
                        </a>
                        <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect">
                     </div>
                  </div>
               </div>

            </form>
         </div>
      </div>
   </div>