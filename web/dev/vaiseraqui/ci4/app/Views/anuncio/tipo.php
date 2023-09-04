<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?> - <?= getTipo($resultado->tipoFK) ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-xs-12 form-group'>
                        <label for="produtoFK1">Anúncio <?= $resultado->id != 5 ? "Grande" : "" ?></label>
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

                     <div class='col-lg-6 form-group'>
                        <label for="produtoFK2">Anúncio <?= $resultado->id != 5 ? "Pequeno 1" : "" ?></label>
                        <select name="produtoFK2" id="produtoFK2" class="form-control js-example-basic-single">
                           <option>-- selecione o anúncio --</option>
                           <? if ($produtos) { ?>
                              <? foreach ($produtos as $produto) { ?>
                                 <option value="<?= $produto->id ?>" <?= $resultado->produtoFK2 == $produto->id ? 'selected' : '' ?>>
                                    <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                 </option>
                              <? } ?>
                           <? } ?>
                        </select>
                     </div>

                     <div class='col-lg-6 form-group'>
                        <label for="produtoFK3">Anúncio <?= $resultado->id != 5 ? "Pequeno 2" : "" ?></label>
                        <select name="produtoFK3" id="produtoFK3" class="form-control js-example-basic-single">
                           <option>-- selecione o anúncio --</option>
                           <? if ($produtos) { ?>
                              <? foreach ($produtos as $produto) { ?>
                                 <option value="<?= $produto->id ?>" <?= $resultado->produtoFK3 == $produto->id ? 'selected' : '' ?>>
                                    <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                 </option>
                              <? } ?>
                           <? } ?>
                        </select>
                     </div>

                     <? if ($resultado->id != 5) { ?>

                        <div class='col-lg-6 form-group'>
                           <label for="produtoFK4">Anúncio Pequeno 3</label>
                           <select name="produtoFK4" id="produtoFK4" class="form-control js-example-basic-single">
                              <option>-- selecione o anúncio --</option>
                              <? if ($produtos) { ?>
                                 <? foreach ($produtos as $produto) { ?>
                                    <option value="<?= $produto->id ?>" <?= $resultado->produtoFK4 == $produto->id ? 'selected' : '' ?>>
                                       <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                    </option>
                                 <? } ?>
                              <? } ?>
                           </select>
                        </div>

                        <div class='col-lg-6 form-group'>
                           <label for="produtoFK5">Anúncio Pequeno 4</label>
                           <select name="produtoFK5" id="produtoFK5" class="form-control js-example-basic-single">
                              <option>-- selecione o anúncio --</option>
                              <? if ($produtos) { ?>
                                 <? foreach ($produtos as $produto) { ?>
                                    <option value="<?= $produto->id ?>" <?= $resultado->produtoFK5 == $produto->id ? 'selected' : '' ?>>
                                       <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                    </option>
                                 <? } ?>
                              <? } ?>
                           </select>
                        </div>

                        <? if ($resultado->id == 6) { ?>
                           <div class='col-lg-6 form-group'>
                              <label for="produtoFK6">Anúncio Pequeno 5</label>
                              <select name="produtoFK6" id="produtoFK6" class="form-control js-example-basic-single">
                                 <option>-- selecione o anúncio --</option>
                                 <? if ($produtos) { ?>
                                    <? foreach ($produtos as $produto) { ?>
                                       <option value="<?= $produto->id ?>" <?= $resultado->produtoFK6 == $produto->id ? 'selected' : '' ?>>
                                          <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                       </option>
                                    <? } ?>
                                 <? } ?>
                              </select>
                           </div>

                           <div class='col-lg-6 form-group'>
                              <label for="produtoFK7">Anúncio Pequeno 6</label>
                              <select name="produtoFK7" id="produtoFK7" class="form-control js-example-basic-single">
                                 <option>-- selecione o anúncio --</option>
                                 <? if ($produtos) { ?>
                                    <? foreach ($produtos as $produto) { ?>
                                       <option value="<?= $produto->id ?>" <?= $resultado->produtoFK7 == $produto->id ? 'selected' : '' ?>>
                                          <?= $produto->titulo ?> (<?= $produto->anunciante ?> - Contato: <?= $produto->telefone ?>)
                                       </option>
                                    <? } ?>
                                 <? } ?>
                              </select>
                           </div>
                        <? } ?>

                     <? } ?>
                     <!-- Botões -->
                     <div class="col-xs-12 form-group">
                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/tipos/">
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