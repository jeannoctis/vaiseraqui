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
                     <?= $currentCurso->nomeCurso ?> - <?= $title ?> - <?= $review->autor ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $review->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="texto">Texto</label>
                           <textarea name='texto' class="tinymce_full" id="texto"><?= $review->texto ?></textarea>
                        </div>
                     </div>

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="autor">Autor</label>
                           <input type="text" name="autor" class="form-control" id="autor" value="<?= $review->autor ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="profissao">Profissão + Cidade</label>
                           <input type="text" name="profissao" class="form-control" id="profissao" value="<?= $review->profissao ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <? if ($review->video) {
                        $url_components = parse_url($review->video);
                        if ($url_components) {
                           parse_str($url_components['query'], $params);
                        }
                     } ?>

                     <div class="form-group col-lg-6 paddingZeroM">
                        <div class='col-xs-12'>
                           <label for="video">Vídeo (Youtube)</label>
                           <input type="text" name="video" class="form-control" id="link" value="<?= $review->video ?>" placeholder="https://www.youtube.com/watch?v=VIDEO">
                        </div>
                        <? if ($review->video) { ?>
                           <div class="form-group">
                              <label style='margin-top: 3rem;' class="col-sm-2 control-label">Ver vídeo</label>
                              <div class="col-sm-10">
                                 <iframe style='margin-top: 3rem;' height="315" width="500" src="https://www.youtube.com/embed/<?= $params['v'] ?>">
                                 </iframe>
                              </div>
                           </div>
                        <? } ?>
                     </div>

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFK2 ?>/<?= encode($idCurso) ?>">
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