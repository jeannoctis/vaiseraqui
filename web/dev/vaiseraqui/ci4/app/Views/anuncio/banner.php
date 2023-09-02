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
                        <label for="produtoFK1">Anúncio</label>
                        <select name="produtoFK1" id="produtoFK1" class="form-control js-example-basic-single">
                           <option>-- selecione o anúncio --</option>
                           <? if ($produtos) { ?>
                              <? foreach ($produtos as $produto) { ?>
                                 <option value="<?= $produto->id ?>" <?= $resultado->produtoFK1 == $produto->id ? 'selected' : '' ?>>
                                    <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                 </option>
                              <? } ?>
                           <? } ?>
                        </select>
                     </div>

                     <div class="col-xs-12 form-group">
                        <label for="arquivo">Imagem/Banner <b>(Tamanho recomendado: <?= $resultado->id == 11 ? "1440 x 540" : "427 x 901" ?>) </b></label>
                        <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" <?= !$resultado->arquivo ? 'required' : '' ?>>
                     </div>

                     <? if ($resultado->id == 11) { ?>
                        <div class="col-xs-12 form-group">
                           <label for="arquivo2">Imagem/Banner <b>(Tamanho recomendado: 335 x 540)</b></label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify" <?= !$resultado->arquivo2 ? 'required' : '' ?>>
                        </div>
                     <? } ?>

                     <div class='col-xs-12 form-group'>
                        <label for="link">Link botão </label>
                        <input type="text" name="link" class="form-control" id="link" value="<?= $resultado->link ?>" placeholder="Escreva...">
                     </div>

                     <!-- Botões -->
                     <div class="col-xs-12 form-group">
                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/banners/">
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
   </div>
</div>