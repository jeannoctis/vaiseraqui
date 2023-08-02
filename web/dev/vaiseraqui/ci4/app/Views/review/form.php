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
                     <?= $title ?> - <?= $resultado->autor ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="autor">Autor</label>
                           <input type="text" name="autor" class="form-control" id="autor" value="<?= $resultado->autor ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="servico">Serviço prestado</label>
                           <input type="text" name="servico" class="form-control" id="servico" value="<?= $resultado->servico ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="texto">Texto</label>
                           <textarea name='texto' class="tinymce_full" id="texto"><?= $resultado->texto ?></textarea>
                        </div>
                     </div>

                     <? if ($resultado->video) {
                        $url_components = parse_url($resultado->video);
                        if ($url_components) {
                           parse_str($url_components['query'], $params);
                        }
                     } ?>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Foto do cliente <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagararquivo" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagararquivo" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div class="form-group col-lg-6 paddingZeroM">
                        <div class='col-xs-12'>
                           <label for="video">Vídeo (Youtube)</label>
                           <input type="text" name="video" class="form-control" id="link" value="<?= $resultado->video ?>" placeholder="https://www.youtube.com/watch?v=VIDEO">
                        </div>
                        <? if ($resultado->video) { ?>
                           <div class="form-group col-xs-12">
                              <label class="control-label col-xs-12 mt-1">Ver vídeo</label>
                              <div class="col-xs-12">
                                 <iframe class="col-xs-12" height="315" src="https://www.youtube.com/embed/<?= $params['v'] ?>">
                                 </iframe>
                              </div>
                           </div>
                        <? } ?>
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
      <style>
         label i {
            color: #ffd051;
         }
      </style>