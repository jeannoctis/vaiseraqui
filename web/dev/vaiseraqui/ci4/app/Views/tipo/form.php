<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?> - <?= $resultado->titulo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-xs-12 form-group'>
                        <label for="titulo">Nome</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." >
                     </div>
                      
                      <? if(!$resultado->id) { ?>
                           <div class='col-xs-12 form-group'>
                        <label for="tipo">Tipo</label>
                        <select name="tipo" class="form-control" id="tipo"  >
                            <option value='ALUGUEL'>Aluguel</option>
                            <option value='SALOES'>Salões de Festas e Áreas de Lazer</option>
                            <option value='HOSPEDAGEM'>Hospedagens</option>
                            <option value='LOJAS'>LOjas temporárias</option>
                        </select>
                     </div>   
                     <? }
                          ?>

                     <div class="col-xs-12 form-group">
                        <label for="arquivo">Ícone <b>(Tamanho recomendado: 54 x 54 | 1:1 ) </b></label>
                        <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" <?= !$resultado->arquivo ? 'required' : '' ?>>
                     </div>

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <a href="<?= PATHSITE ?>admin/anuncio_tipo/">
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