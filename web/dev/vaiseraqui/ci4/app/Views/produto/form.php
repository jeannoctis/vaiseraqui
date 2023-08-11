<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white pb-1">
                  <h4 class="box-title"><?= $title ?> - <?= $resultado->titulo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-xm-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="titulo">Título do anúncio </label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xm-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="categoria">Categoria</label>
                           <? if ($categoriasDoTipo) { ?>
                              <select name="categoria" required class="form-control js-example-basic-single" id="categoria">
                              <option value="">-- selecione uma categoria --</option>
                                 <? foreach ($categoriasDoTipo as $categoria) { ?>
                                    <option <?= $resultado->categoriaFK == $categoria->id ? 'selected' : '' ?> value="<?= $categoria->id ?>">
                                       <?= $categoria->titulo ?>
                                    </option>
                                 <? } ?>
                              </select>
                           <? } ?>
                        </div>
                     </div>

                     <div class='col-xm-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="categoria">Cidade</label>
                           <? if ($estados) { ?>
                              <select name="categoria" required class="form-control js-example-basic-single" id="categoria">
                                 <option value="">-- selecione uma cidade --</option>
                                 <? foreach ($estados as $estado) { ?>
                                    <optgroup label="<?= $estado->titulo ?>">
                                       <? foreach ($estado->cidades as $cidade) { ?>
                                          <option <?= $resultado->cidadeFK == $cidade->id ? 'selected' : '' ?> value="<?= $cidade->id ?>">
                                             <?= $cidade->titulo ?>
                                          </option>
                                       <? } ?>
                                    </optgroup>
                                 <? } ?>
                              </select>
                           <? } ?>
                        </div>
                     </div>

                     <div class='col-sm-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="parcelas">Máximo de parcelas</label>
                           <input type="number" min="0" name="parcelas" class="form-control" id="parcelas" value="<?= $resultado->parcelas ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="descricao">Descrição</label>
                           <textarea name='descricao' class="tinymce_full" id="descricao"><?= $resultado->descricao ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Detalhes
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-sm-12 col-md-6 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="areautil">Área útil (m²)</label>
                           <div class="input-group">
                              <input type="number" min="0" name="areautil" class="form-control" id="areautil" value="<?= $resultado->areautil ?>" placeholder="Escreva...">
                              <span class="input-group-addon">m²</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="dimensoes">Largura x Fundo (m)</label>
                           <div class="input-group">
                              <input type="text" name="dimensoes" class="form-control" id="dimensoes" value="<?= $resultado->dimensoes ?>" placeholder="Escreva...">
                              <span class="input-group-addon">m</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="loteminimo">Lote mínimo (m²)</label>
                           <div class="input-group">
                              <input type="text" name="loteminimo" class="form-control" id="loteminimo" value="<?= $resultado->loteminimo ?>" placeholder="Escreva...">
                              <span class="input-group-addon">m²</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="quartos">Quartos</label>
                           <input type="number" min="0" name="quartos" class="form-control" id="quartos" value="<?= $resultado->quartos ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="suites">Suítes</label>
                           <input type="number" min="0" name="suites" class="form-control" id="suites" value="<?= $resultado->suites ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="banheiros">Banheiros</label>
                           <input type="number" min="0" name="banheiros" class="form-control" id="banheiros" value="<?= $resultado->banheiros ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="vagas">Vagas</label>
                           <input type="number" min="0" name="vagas" class="form-control" id="vagas" value="<?= $resultado->vagas ?>" placeholder="Escreva...">
                        </div>
                     </div>


                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="churrasqueira">Churrasqueira</label>
                           <select name="churrasqueira" required class="form-control" id="churrasqueira">
                              <option <?= $resultado->churrasqueira == "N" ? 'selected' : '' ?> value="N">Não</option>
                              <option <?= $resultado->churrasqueira == "S" ? 'selected' : '' ?> value="S">Sim</option>
                           </select>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="piscina">Piscina</label>
                           <select name="piscina" required class="form-control" id="piscina">
                              <option <?= $resultado->piscina == "N" ? 'selected' : '' ?> value="N">Não</option>
                              <option <?= $resultado->piscina == "S" ? 'selected' : '' ?> value="S">Sim</option>
                           </select>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="escritorio">Escritório</label>
                           <select name="escritorio" required class="form-control" id="escritorio">
                              <option <?= $resultado->escritorio == "N" ? 'selected' : '' ?> value="N">Não</option>
                              <option <?= $resultado->escritorio == "S" ? 'selected' : '' ?> value="S">Sim</option>
                           </select>
                        </div>
                     </div>

                     <? if ($pavimentos) { ?>
                        <div class='form-group col-sm-12 col-md-6 col-lg-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="pavimento">Pavimento</label>
                              <select name="pavimento" required class="form-control" id="pavimento">
                                 <? foreach ($pavimentos as $pavimento) { ?>
                                    <option <?= $resultado->pavimento == $pavimento->identificador ? 'selected' : '' ?> value="<?= $pavimento->identificador ?>">
                                       <?= $pavimento->titulo ?>
                                    </option>
                                 <? } ?>
                              </select>
                           </div>
                        </div>
                     <? } ?>


                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Itens inclusos e arquivo para download
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class="form-group col-xs-12 paddingZeroM">
                        <div class="col-xs-12 form-group">
                           <label for="incluso">Incluso nesse projeto <i>(separe-os com o Enter ou Tab)</i>: </label>
                           <input type="text" name="inclusoTopicos[]" class="form-control tags-input mySingleFieldTags" id="incluso" value="<?= $resultado->incluso ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-sm-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Imagem demonstrativa <b>(tamanho recomendado: )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-sm-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="pdf">Arquivo para download do projeto principal <b>(.ZIP, .PDF, imagens)</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->pdf ?>' type="file" name='pdf' id="pdf" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-pdf" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-pdf" id="lbCheck">Apagar arquivo</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Impressão do projeto
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-sm-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="impressao">Preço da impressão</label>
                           <div class="input-group">
                              <span class="input-group-addon">R$</span>
                              <input type="text" name="impressao" class="form-control money" id="impressao" value="<?= $resultado->impressao ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="peso">Peso (em gm)</label>
                           <div class="input-group">
                              <input type="number" name="peso" class="form-control" min="0" id="peso" value="<?= $resultado->peso ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">gramas</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="comprimento">Comprimento (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="comprimento" class="form-control" min="0" id="comprimento" value="<?= $resultado->comprimento ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="altura">Altura (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="altura" class="form-control" min="0" id="altura" value="<?= $resultado->altura ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="largura">Largura (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="largura" class="form-control" min="0" id="largura" value="<?= $resultado->largura ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Informações adicionais do projeto
                  </h4>
                  <div class="card-content">
                     <div class='form-group col-xs-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <h5>Galeria de fotos</h5>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjFotos/<?= encode($resultado->id) ?>?form=true" class="btn btn-violet btn-rounded waves-effect waves-light col-xs-12">Ver galeria <i class="bi bi-image-fill"></i></a>
                        </div>
                     </div>
                     <div class='form-group col-xs-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <h5>Planta baixa</h5>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjPlantas/<?= encode($resultado->id) ?>?form=true" class="btn btn-violet btn-rounded waves-effect waves-light col-xs-12">Ver plantas baixas <i class="bi bi-map-fill"></i></a>
                        </div>
                     </div>
                     <div class='form-group col-xs-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <h5>Vídeos</h5>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjVideos/<?= encode($resultado->id) ?>?form=true" class="btn btn-violet btn-rounded waves-effect waves-light col-xs-12">Ver vídeos <i class="bi bi-collection-play-fill"></i></a>
                        </div>
                     </div>
                     <div class='form-group col-xs-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <h5>Adicionais</h5>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjAdicionais/<?= encode($resultado->id) ?>?form=true" class="btn btn-violet btn-rounded waves-effect waves-light col-xs-12">Ver adicionais <i class="bi bi-node-plus-fill"></i></a>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- <div class="box-content card white">
                  <h4 class="box-title">
                     Vídeo
                  </h4>
                  <div class="card-content">
                     
                  </div>
               </div> -->

               <div class="box-content card white">
                  <h4 class="box-title">
                     Salvar alterações?
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class="form-group col-xs-12">
                        <div class="col-xs-12 col-sm-12">
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                              <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                           </a>
                           <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                        </div>
                     </div>
                  </div>
               </div>

            </form>
         </div>
      </div>