<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white pb-1">
                  <h4 class="box-title"><?= $title ?> - <?= $tipo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-xs-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="titulo">Título do anúncio </label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 col-md-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="categoria">Categoria</label>
                           <? if ($categoriasDoTipo) { ?>
                              <select name="categoriaFK" required class="form-control js-example-basic-single" id="categoria">
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

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="ativo">Anúncio ativo?</label>
                           <select name="ativo" id="ativo" class="form-control" required>
                              <option value="0" <?= $resultado->ativo == "0" ? "selected" : "" ?>>NÃO</option>
                              <option value="1" <?= $resultado->ativo == "1" ? "selected" : "" ?>>SIM</option>
                           </select>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="inicioValidade">Início validade</label>
                           <input type="date" name="inicioValidade" class="form-control" id="inicioValidade" value="<?= $resultado->inicioValidade ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="validade">Fim validade</label>
                           <input type="date" name="validade" class="form-control" id="validade" value="<?= $resultado->validade ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="destaque">Anúncio destacado?</label>
                           <select name="destaque" id="destaque" class="form-control" required>
                              <option value="0" <?= $resultado->destaque == "0" ? "selected" : "" ?>>NÃO</option>
                              <option value="1" <?= $resultado->destaque == "1" ? "selected" : "" ?>>SIM</option>
                           </select>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="inicioDestaque">Início destaque</label>
                           <input type="date" name="inicioDestaque" class="form-control" id="inicioDestaque" value="<?= $resultado->inicioDestaque ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="validadeDestaque">Fim Destaque</label>
                           <input type="date" name="validadeDestaque" class="form-control" id="validadeDestaque" value="<?= $resultado->validadeDestaque ?>" placeholder="Escreva...">
                        </div>
                     </div>

                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Endereço
                  </h4>

                  <div class="card-content">
                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="endereco">Endereço, número, complemento </label>
                           <input type="text" name="endereco" class="form-control" id="endereco" value="<?= $resultado->endereco ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="bairro">Bairro </label>
                           <input type="text" name="bairro" class="form-control" id="bairro" value="<?= $resultado->bairro ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 col-md-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="cidadeFK">Cidade</label>
                           <? if ($estados) { ?>
                              <select name="cidadeFK" required class="form-control js-example-basic-single" id="cidadeFK">
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

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="local">Nome do local </label>
                           <input type="text" name="local" class="form-control" id="local" value="<?= $resultado->local ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="mapa">iframe do Mapa
                              <a href='https://www.youtube.com/watch?v=tkDykmlUvYo' target='_blank'>
                                 <i class='mdi mdi-comment-question-outline'></i>
                              </a>
                           </label>
                           <textarea name='mapa' class="form-control" id="mapa"><?= $resultado->mapa ?></textarea>
                        </div>
                     </div>

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="coordenadas">Coordenadas
                              <a href='https://support.google.com/maps/answer/18539?hl=pt-BR&co=GENIE.Platform%3DDesktop&oco=0' target='_blank'>
                                 <i class='mdi mdi-comment-question-outline'></i>
                              </a>
                           </label>
                           <textarea name='coordenadas' class="form-control" id="coordenadas"><?= $resultado->coordenadas ?></textarea>
                        </div>
                     </div>

                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Anunciante
                  </h4>

                  <div class="card-content">
                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12">
                           <label for="anuncianteFK">Responsável</label>
                           <select name="anuncianteFK" id="anuncianteFK" class="js-example-basic-single form-control" <?= $get['tipo'] != 5 ? "required" : "" ?>>
                              <? if ($anunciantes) { ?>
                                 <option value="">-- Selecione a pessoa responsável</option>
                                 <? foreach ($anunciantes as $anunciante) { ?>
                                    <option <?= $resultado->anuncianteFK == $anunciante->id ? 'selected' : '' ?> value="<?= $anunciante->id ?>">
                                       <?= "{$anunciante->titulo} ({$anunciante->email})" ?>
                                    </option>
                                 <? } ?>
                              <? } ?>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Descrição
                  </h4>
                  <div class="card-content">
                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="descricao">Descrição de apresentação</label>
                           <textarea name='descricao' class="form-control" id="descricao" required><?= $resultado->descricao ?></textarea>
                        </div>
                     </div>

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="detalhes">Descrição completa</label>
                           <textarea name='texto' class="tinymce_full" id="detalhes"><?= $resultado->texto ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>

               <? if (in_array($get['tipo'], [1, 2, 3, 4])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Valores
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" id="modalValorBtn" data-target="modalValor">
                           Adicionar valor
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>

                     <div class="card-content" id="valoresContainer">

                        <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="preco">Valor</label>
                              <div class="input-group">
                                 <span class="input-group-addon">R$</span>
                                 <input type="text" name="preco" class="form-control money" id="preco" value="<?= $resultado->preco ?>" placeholder="Escreva..." required>
                              </div>
                           </div>
                        </div>

                        <? if ($valores) { ?>
                           <? foreach ($valores as $ind => $item) { ?>
                              <div class='form-group col-sm-12 col-lg-4 paddingZeroM valor-div'>
                                 <div class="col-xs-12 col-sm-12">
                                    <label for="valor<?= $item->titulo ?>" class="with-btn">
                                       <?= $item->titulo ?>
                                       <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="valor-div">Excluir</button>
                                    </label>
                                    <input type="hidden" name="valor[<?= $ind ?>][id]" value="<?= $item->id ?>">
                                    <div class="input-group">
                                       <span class="input-group-addon">Título</span>
                                       <input type="text" name="valor[<?= $ind ?>][titulo]" class="form-control" id="valor<?= $item->titulo ?>" value="<?= $item->titulo ?>" placeholder="Escreva..." required>
                                    </div>
                                    <div class="input-group">
                                       <span class="input-group-addon">R$</span>
                                       <input type="text" name="valor[<?= $ind ?>][valor]" class="form-control money" value="<?= $item->valor ?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>
                              </div>
                           <? } ?>
                        <? } ?>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [2, 4])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Itens disponíveis
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">

                        <div class='form-group col-xs-12 paddingZeroM'>
                           <div class="col-xs-12">
                              <label for="itensdisponiveis">Itens</label>
                              <input type="text" name="itensdisponiveis" class="form-control mySingleFieldTags" id="itensdisponiveis" value="<?= $resultado->itensdisponiveis ?>" placeholder="Escreva...">
                           </div>
                        </div>

                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Informações importantes
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="areautil">Área útil (m²)</label>
                              <div class="input-group">
                                 <input type="number" min="0" name="areautil" class="form-control" id="areautil" value="<?= $resultado->areautil ?>" placeholder="Escreva...">
                                 <span class="input-group-addon">m²</span>
                              </div>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="quartos">Quartos</label>
                              <input type="number" min="0" name="quartos" class="form-control" id="quartos" value="<?= $resultado->quartos ?>" placeholder="Escreva...">
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="banheiros">Banheiros</label>
                              <input type="number" min="0" name="banheiros" class="form-control" id="banheiros" value="<?= $resultado->banheiros ?>" placeholder="Escreva...">
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="vagas">Vagas</label>
                              <input type="number" min="0" name="vagas" class="form-control" id="vagas" value="<?= $resultado->vagas ?>" placeholder="Escreva...">
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-lg-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="andar">Andar</label>
                              <input type="number" min="0" name="andar" class="form-control" id="andar" value="<?= $resultado->andar ?>" placeholder="Escreva...">
                           </div>
                        </div>


                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="animais">Animais de estimação?</label>
                              <select name="animais" required class="form-control" id="animais">
                                 <option <?= $resultado->animais == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->animais == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="mobilia">Mobiliado</label>
                              <select name="mobilia" required class="form-control" id="mobilia">
                                 <option <?= $resultado->mobilia == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->mobilia == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="transporte">Transporte Público</label>
                              <input type="text" name="transporte" class="form-control" id="transporte" value="<?= $resultado->transporte ?>" placeholder="Escreva...">
                           </div>
                        </div>

                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Informações importantes
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="cafedamanha">Café da manhã</label>
                              <select name="cafedamanha" required class="form-control" id="cafedamanha">
                                 <option <?= $resultado->cafedamanha == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->cafedamanha == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="wifi">Wi-fi</label>
                              <select name="wifi" required class="form-control" id="wifi">
                                 <option <?= $resultado->wifi == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->wifi == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="arcondicionado">Ar condicionado</label>
                              <select name="arcondicionado" required class="form-control" id="arcondicionado">
                                 <option <?= $resultado->arcondicionado == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->arcondicionado == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="bar">Bar</label>
                              <select name="bar" required class="form-control" id="bar">
                                 <option <?= $resultado->bar == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->bar == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>


                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="recepcao24">Recepção 24h</label>
                              <select name="recepcao24" required class="form-control" id="recepcao24">
                                 <option <?= $resultado->recepcao24 == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->recepcao24 == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="animais">Aceita pets</label>
                              <select name="animais" required class="form-control" id="animais">
                                 <option <?= $resultado->animais == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->animais == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="acessibilidade">Acessibilidade</label>
                              <select name="acessibilidade" required class="form-control" id="acessibilidade">
                                 <option <?= $resultado->acessibilidade == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->acessibilidade == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                        <div class='form-group col-sm-12 col-md-3 paddingZeroM'>
                           <div class="col-xs-12 col-sm-12">
                              <label for="estacionamento">Estacionamento</label>
                              <select name="estacionamento" required class="form-control" id="estacionamento">
                                 <option <?= $resultado->estacionamento == "N" ? 'selected' : '' ?> value="N">Não</option>
                                 <option <?= $resultado->estacionamento == "S" ? 'selected' : '' ?> value="S">Sim</option>
                              </select>
                           </div>
                        </div>

                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Principais Comodidades
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">

                        <div class='form-group col-xs-12 paddingZeroM'>
                           <div class="col-xs-12">
                              <label for="principaiscomodidades">Adicionadas</label>
                              <input type="text" name="principaiscomodidades" class="form-control tags-input mySingleFieldTags" id="principaiscomodidades" value="<?= $resultado->principaiscomodidades ?>" placeholder="Escreva...">
                           </div>
                        </div>

                        <div class='form-group col-xs-12 paddingZeroM'>
                           <div class="col-xs-12">
                              <label for="principaiscomodidades">Sugestões <i class="bi bi-arrow-down-up"></i></label>
                              <? if ($comodidadesDisponiveis) {
                                 $atuais = explode(";", $produtoPrincCmdd->principaiscomodidades)
                              ?>
                                 <ul class="sugestoes comodidades">
                                    <? foreach ($comodidadesDisponiveis as $comodidade) { ?>
                                       <li class="btn btn-rounded btn-xs btn-bordered" style="<?= in_array($comodidade->titulo, $atuais) ? "display: none" : "" ?>" data-id="<?= $comodidade->titulo ?>" data-target="principaiscomodidades">
                                          <?= $comodidade->titulo ?>
                                       </li>
                                    <? } ?>
                                 </ul>
                              <? } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Comodidades por área
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" id="modalCatCmddBtn" data-target="modalCatCmdd">
                           Adicionar área
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="cmddCatContainer">
                        <? if ($catsCmdds) { ?>
                           <? foreach ($catsCmdds as $ind => $area) { ?>
                              <div class="form-group col-xs-12 paddingZeroM catCmdd-div card-content" data-cat-titulo="<?= str_replace(' ', '', $area->titulo) ?>">

                                 <input type="hidden" name="catCmdd[ <?= $ind ?> ][id]" value="<?= $area->id ?>">

                                 <div class="col-xs-12 col-sm-12 form-group">
                                    <label for="area<?= $area->titulo ?>" class="with-btn">
                                       Área
                                       <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="catCmdd-div">Excluir</button>
                                    </label>
                                    <input type="text" name="catCmdd[ <?= $ind ?> ][titulo]" class="form-control" id="area<?= $area->titulo ?>" value="<?= $area->titulo ?>" placeholder="cozinha, banheiro...">
                                 </div>

                                 <div class="col-xs-12 form-group">
                                    <label for="catCmdd<?= $area->titulo ?>">Adicionadas</label>
                                    <input type="text" name="catCmdd[ <?= $ind ?> ][comodidades]" class="form-control tag-it mySingleFieldTags" id="catCmdd<?= str_replace(' ', '', $area->titulo) ?>" value="<?= $area->comodidades ?>" placeholder="Escreva...">
                                 </div>

                                 <div class='form-group col-xs-12 paddingZeroM'>
                                    <label for="">Sugestões <i class="bi bi-arrow-down-up"></i></label>
                                    <? if ($comodidadesDisponiveis) {
                                       $atuais = explode(";", $area->comodidades);
                                    } ?>
                                    <ul class="sugestoes comodidades">
                                       <? foreach ($comodidadesDisponiveis as $comodidade) { ?>
                                          <li class="btn btn-rounded btn-xs btn-bordered" style="<?= in_array($comodidade->titulo, $atuais) ? "display: none" : "" ?>" data-id="<?= $comodidade->titulo ?>" data-target="catCmdd<?= str_replace(' ', '', $area->titulo) ?>">
                                             <?= $comodidade->titulo ?>
                                          </li>
                                       <? } ?>
                                    </ul>
                                 </div>

                              </div>
                           <? } ?>
                        <? } ?>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 2, 3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Proximidades
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" data-target="modalProximidades">
                           Adicionar proximidades
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content" id="proximidadesContainer">

                        <? if ($proximidadesProduto) { ?>
                           <? foreach ($proximidadesProduto as $ind => $prox) { ?>
                              <div class="form-group col-xs-12 paddingZeroM proximidade-div card-content">

                                 <input type="hidden" name="proximidade[ <?= $ind ?> ][id]" value="<?= $prox->pp_id ?>">
                                 <!-- <input type="hidden" name="proximidade[ <?= $ind ?> ][proximidadeFK]" value="<?= $prox->proximidadeFK ?>"> -->

                                 <div class="col-xs-12 col-sm-12 form-group">
                                    <label for="area<?= $prox->titulo ?>" class="with-btn">
                                       <div>
                                          <img src="<?= PATHSITE ?>uploads/proximidade/<?= $prox->arquivo ?>" alt="ícone <?= $prox->titulo ?>"> <?= $prox->titulo ?>
                                       </div>
                                       <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="proximidade-div">Excluir</button>
                                    </label>
                                    <input type="text" name="proximidade[ <?= $ind ?> ][proximidades]" class="form-control" id="area<?= $prox->titulo ?>" value="<?= $prox->proximidades ?>" placeholder="<?= $prox->proximidadeFK ?> próximos....">
                                 </div>

                              </div>
                           <? } ?>
                        <? } ?>

                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 4])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Condomínio
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">
                        <div class='form-group col-xs-12 paddingZeroM'>
                           <div class="col-xs-12">
                              <label for="condominio">Comodidades do condomínio</label>
                              <input type="text" name="condominio" class="form-control mySingleFieldTags" id="condominio" value="<?= $resultado->condominio ?>" placeholder="Escreva...">
                           </div>
                        </div>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [6])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Cardápios
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" data-target="modalCardapio">
                           Adicionar Cardápio
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="cardapioContainer">
                        <? if ($cardapios) { ?>
                           <? foreach ($cardapios as $ind => $item) { ?>
                              <div class="form-group col-xs-12 paddingZeroM cardapio-div card-content" data-cardapio-titulo="<?= str_replace(' ', '', $item->titulo) ?>">

                                 <input type="hidden" name="cardapios[ <?= $ind ?> ][id]" value="<?= $item->id ?>">

                                 <div class="col-xs-12 col-sm-12 form-group">
                                    <label for="cardapio<?= $item->titulo ?>" class="with-btn">
                                       Cardápio
                                       <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="cardapio-div">Excluir</button>
                                    </label>
                                    <input type="text" name="cardapios[ <?= $ind ?> ][titulo]" class="form-control" id="cardapio<?= $item->titulo ?>" value="<?= $item->titulo ?>" placeholder="cozinha, banheiro...">
                                 </div>

                                 <div class="col-xs-12 form-group">
                                    <label for="cardapio-menu<?= $item->titulo ?>">Adicionadas</label>
                                    <input type="text" name="cardapios[ <?= $ind ?> ][menu]" class="form-control tag-it mySingleFieldTags" id="cardapio-menu<?= str_replace(' ', '', $item->titulo) ?>" value="<?= $item->menu ?>" placeholder="Escreva...">
                                 </div>

                                 <div class='form-group col-xs-12 paddingZeroM'>
                                    <label for="">Sugestões <i class="bi bi-arrow-down-up"></i></label>
                                    <? if ($cardapiosDisponiveis) {
                                       $atuais = explode(";", $item->menu);
                                    } ?>
                                    <ul class="sugestoes cardapios">
                                       <? foreach ($cardapiosDisponiveis as $cardapio) { ?>
                                          <li class="btn btn-rounded btn-xs btn-bordered" style="<?= in_array($cardapio->titulo, $atuais) ? "display: none" : "" ?>" data-id="<?= $cardapio->titulo ?>" data-target="cardapio-menu<?= str_replace(' ', '', $item->titulo) ?>">
                                             <?= $cardapio->titulo ?>
                                          </li>
                                       <? } ?>
                                    </ul>
                                 </div>

                              </div>
                           <? } ?>
                        <? } ?>

                     </div>

                     <div class="card content">
                        <div class="form-group col-xs-12 paddingZeroM mt-5">
                           <div class='col-xs-12'>
                              <label for="cardapio">Cardápio completo <b>(Formato recomendado: .PDF)</b> </label>
                              <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->cardapio ?>' type="file" name='cardapio' id="cardapio" class="dropify">
                              <div class="col-xs-12 switch danger">
                                 <input id="apagar-cardapio" type="checkbox" name="apagarcardapio">
                                 <label for="apagar-cardapio">Apagar arquivo</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 2, 3, 4, 6])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Observações
                     </h4>
                     <div class="card-content">
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="observacoes">Orientações importantes</label>
                              <textarea name='observacoes' class="tinymce_full" id="observacoes"><?= $resultado->observacoes ?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [6])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        O que fazemos e não fazemos
                     </h4>
                     <div class="card-content">
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="pode">O que fazemos</label>
                              <input type="text" name="pode" class="form-control" id="pode" value="<?= $resultado->pode ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="naopode">O que não fazemos</label>
                              <input type="text" name="naopode" class="form-control" id="naopode" value="<?= $resultado->naopode ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="box-content card white">
                     <h4 class="box-title">
                        Eventos que atendemos
                     </h4>
                     <!-- /.box-title -->
                     <div class="card-content">

                        <div class='form-group col-xs-12 paddingZeroM'>
                           <div class="col-xs-12">
                              <label for="eventosatendidos">Eventos</label>
                              <input type="text" name="eventosatendidos" class="form-control mySingleFieldTags" id="eventosatendidos" value="<?= $resultado->eventosatendidos ?>" placeholder="Escreva...">
                           </div>
                        </div>

                     </div>
                  </div>

               <? } ?>

               <? if (in_array($get['tipo'], [2, 3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Check-in & Check-out
                     </h4>
                     <div class="card-content">
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="regrascheck">Regras</label>
                              <textarea name='regrascheck' class="tinymce_full" id="regrascheck"><?= $resultado->regrascheck ?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="box-content card white">
                     <h4 class="box-title">
                        Pode & Não Pode
                     </h4>
                     <div class="card-content">
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="pode">Pode</label>
                              <input type="text" name="pode" class="form-control" id="pode" value="<?= $resultado->pode ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                        <div class='col-xs-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="naopode">Não pode</label>
                              <input type="text" name="naopode" class="form-control" id="naopode" value="<?= $resultado->naopode ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                     </div>
                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [5])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Datas
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded " onclick="adicionarData()">
                           Adicionar data
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>

                     <div class="card-content" id="datas-container">
                        <? if ($datas) { ?>
                           <? foreach ($datas as $ind => $item) { ?>
                              <div class='form-group col-xs-12 col-lg-4 paddingZeroM card-content data-div'>
                                 <div class="col-xs-12 col-sm-12">

                                    <input type="hidden" name="datas[<?= $ind ?>][id]" value="<?= $item->id ?>">
                                    <label for="data<?= $ind ?>" class="with-btn">
                                       Data
                                       <button class="btn btn-rounded btn-danger btn-xs" type="button" data-parent="data-div">Excluir</button>
                                    </label>
                                    <input type="date" name="datas[<?= $ind ?>][data]" class="form-control" id="data<?= $ind ?>" value="<?= $item->data ?>" placeholder="Escreva..." required>

                                    <label for="horarioI<?= $ind ?>">Horário Início</label>
                                    <input type="time" name="datas[<?= $ind ?>][horarioInicio]" class="form-control" id="horarioI<?= $ind ?>" value="<?= $item->horarioInicio ?>" placeholder="Escreva..." required>

                                    <label for="horarioT<?= $ind ?>">Horário Término</label>
                                    <input type="time" name="datas[<?= $ind ?>][horarioTermino]" class="form-control" id="horarioT<?= $ind ?>" value="<?= $item->horarioTermino ?>" placeholder="Escreva..." required>
                                 </div>
                              </div>
                           <? } ?>
                        <? } else { ?>
                           <div class='form-group col-xs-12 col-lg-4 paddingZeroM card-content data-div'>
                              <div class="col-xs-12 col-sm-12">
                                 <label for="data0">Data</label>
                                 <input type="date" name="datas[0][data]" class="form-control" id="data0" placeholder="Escreva..." required>

                                 <label for="horario0">Horário Início</label>
                                 <input type="time" name="datas[0][horarioInicio]" class="form-control" id="horario0" placeholder="Escreva..." required>

                                 <label for="horario0">Horário Término</label>
                                 <input type="time" name="datas[0][horarioTermino]" class="form-control" id="horario0" placeholder="Escreva..." required>
                              </div>
                           </div>
                        <? } ?>
                     </div>
                  </div>


                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Ingressos
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" data-target="modalSetorIngresso">
                           Adicionar categoria
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="setorIngressoContainer">

                        <? if ($setores) {
                           foreach ($setores as $key => $setor) { ?>
                              <div class="form-group col-xs-12 paddingZeroM setor-ingresso card-content" data-setor-ingresso="<?= $setor->setor ?>" data-setor-numero=<?= $key ?>>
                                 <div class="box-title with-btn">
                                    <?= $setor->setor ?>
                                    <div class="btns-cont">
                                       <button type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="<?= $setor->setor ?>">
                                          Adicionar ingresso
                                          <i class="ico bi bi-plus-lg"></i>
                                       </button>
                                       <button type="button" class="btn btn-xs btn-rounded btn-danger" data-parent="setor-ingresso">
                                          <i class="bi bi-trash"></i>
                                       </button>
                                    </div>
                                 </div>

                                 <? foreach ($setor->ingressos as $keyIng => $ingresso) { ?>
                                    <div class="col-xs-12 paddingZeroM ingresso-div card-content">
                                       <div class="input-group">
                                          <input type="hidden" name="setorIngresso[<?= $key ?>][id]" value="<?= $setor->id ?>">
                                          <input type="hidden" name="setorIngresso[<?= $key ?>][setor]" value="<?= $setor->setor ?>">
                                          <input type="hidden" name="setorIngresso[<?= $key ?>][idSetor]" value="<?= $setor->id ?>">

                                          <span class="input-group-addon">Tipo</span>
                                          <input type="hidden" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][idIngresso]" value="<?= $ingresso->id ?>">
                                          <input type="text" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][modalidade]" class="form-control" value="<?= $ingresso->titulo ?>" placeholder="Escreva...">
                                          <span class="input-group-addon">R$</span>
                                          <input type="text" name="setorIngresso[<?= $key ?>][ingressos][ <?= $keyIng ?> ][preco]" class="form-control money" value="<?= $ingresso->preco ?>" placeholder="Escreva...">
                                       </div>
                                    </div>
                                 <? } ?>
                              </div>
                        <? }
                        } ?>
                     </div>
                  </div>

                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Pontos de Venda
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" data-target="modalPontoDeVenda">
                           Adicionar ponto de venda
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="pontosDeVendaContainer">

                        <? if ($pontosDeVenda) {
                           foreach ($pontosDeVenda as $ind => $pdv) { ?>
                              <div class="col-xs-12 paddingZeroM pdv-div card-content">
                                 <label for="pdv<?= $pdv->id ?>-titulo" class="with-btn">
                                    <div>
                                       <img src="<?= PATHSITE ?>assets2/<?= $pdv->tipo == "fisico" ? "Group 2310" : "web" ?>.png" alt="ícone de ponto de venda <?= $pdv->tipo ?>">
                                       Ponto de Venda <?= $pdv->tipo == "fisico" ? "Físico" : "Online" ?>
                                    </div>
                                    <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="pdv-div">Excluir</button>
                                 </label>

                                 <input type="hidden" name="pdvs[ <?= $ind ?> ][id]" value="<?= $pdv->id ?>">

                                 <label for="pdv<?= $pdv->id ?>-endereco" class="col-xs-12 col-lg-6">
                                    Título
                                    <input type="text" name="pdvs[ <?= $ind ?> ][titulo]" value="<?= $pdv->titulo ?>" class="form-control" required minlength="3" placeholder="Sua Loja ou Seu Site etc...">
                                 </label>

                                 <label for="pdv<?= $pdv->id ?>-endereco" class="col-xs-12 col-lg-6">
                                    Endereço / Site
                                    <input type="text" name="pdvs[ <?= $ind ?> ][endereco]" value="<?= $pdv->endereco ?>" class="form-control" required minlength="3" placeholder="Rua Margarida ou www.site.com.br etc...">
                                 </label>

                                 <? if ($pdv->tipo == "fisico") { ?>
                                    <label for="pdv<?= $pdv->id ?>-cep" class="col-xs-12 col-lg-6">
                                       Telefone
                                       <input type="text" name="pdvs[ <?= $ind ?> ][cep]" value="<?= $pdv->cep ?>" class="form-control telefone" required minlength="3" placeholder="Escreva...">
                                    </label>

                                    <label for="pdv<?= $pdv->id ?>-cep" class="col-xs-12 col-lg-6">
                                       Cidade
                                       <input type="text" name="pdvs[ <?= $ind ?> ][cidade]" value="<?= $pdv->cidade ?>" class="form-control" required minlength="3" placeholder="Cidade - UF">
                                    </label>
                                 <? } ?>
                              </div>
                        <? }
                        } ?>

                     </div>
                  </div>

                  <div class="box-content card white">
                     <h4 class="box-title with-btn">
                        Organização
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded" onclick="adicionarOrganizadores()">
                           Adicionar organizadores
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="organizadoresContainer">

                        <? if ($organizadores) {
                           foreach ($organizadores as $key => $item) { ?>
                              <div class="form-group col-xs-12 paddingZeroM organizacao-div card-content">

                                 <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="organizacao-div"><i class="bi bi-trash"></i></button>
                                 <input type="hidden" name="organizadores[ <?= $key ?> ][id]" value="<?= $item->id ?>">

                                 <div class='col-xs-12 col-lg-6 paddingZeroM'>
                                    <div class="col-xs-12 form-group">
                                       <label>Organização <?= $key + 1 ?></label>
                                       <input type="text" name="organizadores[ <?= $key ?> ][titulo]" class="form-control" value="<?= $item->titulo ?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>

                                 <div class='col-xs-12 col-lg-6 paddingZeroM'>
                                    <div class="col-xs-12 form-group">
                                       <label>Endereço, número, complemento</label>
                                       <input type="text" name="organizadores[ <?= $key ?> ][endereco]" class="form-control" value="<?= $item->endereco ?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>

                                 <div class='col-xs-12 col-lg-6 paddingZeroM'>
                                    <div class="col-xs-12 form-group">
                                       <label>Cidade - UF</label>
                                       <input type="text" name="organizadores[ <?= $key ?> ][cidade]" class="form-control" value="<?= $item->cidade ?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>

                                 <div class='col-xs-12 col-lg-6 paddingZeroM'>
                                    <div class="col-xs-12 form-group">
                                       <label>Site</label>
                                       <input type="text" name="organizadores[ <?= $key ?> ][site]" class="form-control" value="<?= $item->site ?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>
                              </div>
                        <? }
                        } ?>
                     </div>
                  </div>
               <? } ?>

               <!-- <div class="box-content card white">
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
               </div> -->

               <div class="box-content card white">
                  <h4 class="box-title">
                     Salvar alterações?
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class="form-group col-xs-12">
                        <div class="col-xs-12 col-sm-12">
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>?tipo=<?= $get['tipo'] ?>">
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

      <dialog id="modalValor" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar valor</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group">
               Título
               <input type="text" name="tituloValor" class="form-control">
            </label>
            <label for="">
               Valor R$
               <input type="text" name="valorValor" class="money form-control">
            </label>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalCatCmdd" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar área com comodidades</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group col-xs-12">
               Título
               <input type="text" name="tituloCmdd" class="form-control">
            </label>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalProximidades" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar proximidades</h2>

            <span class="close"><i class="bi bi-x-lg"></i></span>

            <? if ($proximidadesDisponiveis) { ?>
               <ul class="proximidadesDisponiveis">
                  <? foreach ($proximidadesDisponiveis as $prox) { ?>
                     <li>
                        <div class="radio info">
                           <input type="hidden" name="proximidadeFK" value="<?= $prox->id ?>" data-img="<?= $prox->arquivo ?>">
                           <input type="radio" name="proximidade" id="proximidade<?= $prox->id ?>" value="<?= $prox->titulo ?>">
                           <label for="proximidade<?= $prox->id ?>">
                              <img src="<?= PATHSITE ?>uploads/proximidade/<?= $prox->arquivo ?>" alt="ícone <?= $prox->titulo ?>">
                              <?= $prox->titulo ?>
                           </label>
                        </div>
                     </li>
                  <? } ?>
               </ul>
            <? } ?>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>

            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalSetorIngresso" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar categoria de Ingresso</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="tituloSetor" class="form-group col-xs-12">
               Título
               <input type="text" name="titulo" id="tituloSetor" class="form-control" placeholder="pista, vip, camarote...">
            </label>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalIngresso" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar ingresso</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="ingTitulo" class="form-group col-xs-12">
               Tipo
               <input type="text" name="titulo" class="form-control" id="ingTitulo" placeholder="inteira, meia...">
            </label>
            <label for="preco" class="form-group col-xs-12">
               Valor R$
               <input type="text" name="preco" class="money form-control" id="preco" placeholder="apenas números">
            </label>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalPontoDeVenda" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar ponto de venda</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <ul class="tipo-ponto-de-venda">
               <li>
                  <div class="radio info">
                     <input type="radio" name="tipo-pdv" id="pdv-fisico" value="fisico">
                     <label for="pdv-fisico">
                        Ponto de venda físico
                        <img src="<?= PATHSITE ?>assets/images/icon-map-2.svg" alt="ícone ponto de venda físico">
                     </label>
                  </div>
               </li>
               <li>
                  <div class="radio info">
                     <input type="radio" name="tipo-pdv" id="pdv-online" value="online">
                     <label for="pdv-online">
                        Ponto de venda online
                        <img src="<?= PATHSITE ?>assets/images/icon-www.svg" alt="ícone ponto de venda online">
                     </label>
                  </div>
               </li>
            </ul>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <dialog id="modalCardapio" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Adicionar Cardápio</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group col-xs-12">
               Título
               <input type="text" name="titulo" class="form-control">
            </label>

            <button class="form-control btn-primary" type="button">Adicionar Campo</button>
            <span class="msgErro text-warning bold"></span>
         </div>
      </dialog>

      <style>
         /* Input Dinamico */
         label.with-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }

         .dialog {
            padding: 0;
            max-width: 80%;
            min-width: 375px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 1px 1px rgba(0, 0, 0, 0.05);
         }

         .dialog .content {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 2.75rem;
         }

         .dialog .content label.form-group.col-xs-12 {
            padding-inline: 0;
         }

         .dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
         }

         .dialog .close {
            position: absolute;
            top: 1rem;
            right: 1rem;
         }

         .dialog .msgErro {
            display: block;
            margin-block-start: 6px;
            color: red;
         }

         .box-title.with-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }

         .with-btn img {
            width: 26px;
            aspect-ratio: 1;
            object-fit: contain;
            margin-inline-end: 1rem;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            align-items: center;
            gap: 1.75rem;
            padding: 0;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul img {
            width: 26px;
            aspect-ratio: 1;
            object-fit: contain;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul li {
            padding: 10px 20px;
            border-radius: 1rem;
            transition: all 200ms ease-in-out;
            width: fit-content;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul li:hover {
            background-color: aliceblue;
         }

         .dialog#modalPontoDeVenda ul li:hover {
            background-color: aliceblue;
         }

         */ .dialog#modalPontoDeVenda label {
            max-width: 50%;
         }

         /* Sugestões */
         :is(.catCmdd-div, .proximidade-div, .setor-ingresso-div, div[data-setor-ingresso], .pdv-div, .cardapio-div, .organizacao-div) {
            border: 1px solid #e6e9ed;
            border-radius: 4px;
            margin-block-end: 3rem;
         }

         .sugestoes {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            align-content: flex-start;
            justify-content: space-between;
            gap: 2rem;
            height: fit-content;
            max-height: 175px;
            padding: 9px 14px;
            border-color: #ccd1d9;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow-y: scroll;
         }

         .sugestoes:hover {
            border-color: #00aeff !important;
            box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.12) !important;
         }

         .sugestoes .sugestao {
            padding: 0.5rem 1rem;
            background-color: aquamarine;
            display: flex;
            border-radius: 8px;
         }

         li.customTag {
            background-color: red !important;
         }

         .organizacao-div {
            position: relative;
         }

         .organizacao-div button[data-parent] {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 5;
         }
      </style>

      <script>
         // Adicionar Datas
         let datasCount = document.querySelectorAll(".data-div").length

         function adicionarData() {
            const datasContainer = document.querySelector("#datas-container")
            const newElement = document.createElement("div")
            datasCount++

            newElement.classList.add("form-group", "col-xs-12", "col-lg-4", "paddingZeroM", "data-div", "card-content")
            newElement.innerHTML = `
               <div class="col-xs-12 col-sm-12">
                  <label for="data${datasCount}" class="with-btn">
                     Data 
                     <button class="btn btn-rounded btn-danger btn-xs" type="button" data-parent="data-div">Excluir</button>
                  </label>
                  <input type="date" name="datas[${datasCount}][data]" class="form-control" id="data${datasCount}" value="" placeholder="Escreva..." required>

                  <label for="horarioI${datasCount}">Horário Início</label> 
                  <input type="time" name="datas[${datasCount}][horarioInicio]" class="form-control" id="horarioI${datasCount}" value="" placeholder="Escreva..." required>
                  
                  <label for="horarioT${datasCount}">Horário Término</label> 
                  <input type="time" name="datas[${datasCount}][horarioTermino]" class="form-control" id="horarioT${datasCount}" value="" placeholder="Escreva..." required>
               </div>
            `
            datasContainer.appendChild(newElement)
         }

         // Adicionar Organizadores
         let organizadoresCount = document.querySelectorAll(".organizacao-div").length

         function adicionarOrganizadores() {
            const organizadoresContainer = document.querySelector("#organizadoresContainer")
            const newElement = document.createElement("div")

            organizadoresCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "organizacao-div", "card-content")
            newElement.innerHTML = `
               <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="organizacao-div"><i class="bi bi-trash"></i></button>

               <div class='col-xs-12 col-lg-6 paddingZeroM'>
                  <div class="col-xs-12 form-group">
                     <label>Organização</label>
                     <input type="text" name="organizadores[${organizadoresCount}][titulo]" class="form-control" value="" placeholder="Escreva..." required>
                  </div>
               </div>

               <div class='col-xs-12 col-lg-6 paddingZeroM'>
                  <div class="col-xs-12 form-group">
                     <label>Endereço, número, complemento</label>
                     <input type="text" name="organizadores[${organizadoresCount}][endereco]" class="form-control" value="" placeholder="Escreva..." required>
                  </div>
               </div>

               <div class='col-xs-12 col-lg-6 paddingZeroM'>
                  <div class="col-xs-12 form-group">
                     <label>Cidade - UF</label>
                     <input type="text" name="organizadores[${organizadoresCount}][cidade]" class="form-control" value="" placeholder="Escreva..." required>
                  </div>
               </div>

               <div class='col-xs-12 col-lg-6 paddingZeroM'>
                  <div class="col-xs-12 form-group">
                     <label>Site</label>
                     <input type="text" name="organizadores[${organizadoresCount}][site]" class="form-control" value="" placeholder="Escreva..." required>
                  </div>
               </div>
            `
            organizadoresContainer.appendChild(newElement)
         }

         // Modal Adicionar Cardápio
         const cardapioList = document.querySelectorAll(".cardapio-div")
         const addCardapio = document.querySelector("#modalCardapio button")
         let cardapioCount = cardapioList.length

         addCardapio.addEventListener("click", conferirModalCardapio)

         function conferirModalCardapio() {
            const modal = document.querySelector("#modalCardapio")
            const titulo = modal.querySelector("input[name=titulo]")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = ""
            if (titulo.value.length <= 2) {
               msg.textContent = "Título com pelo menos 3 caracteres"
               return
            }
            modal.close()

            adicionarCampoCardapio(titulo.value)
            titulo.value = ""
         }

         function adicionarCampoCardapio(titulo) {
            const cardapioContainer = document.querySelector("#cardapioContainer")
            const newElement = document.createElement("div")
            titulo = titulo.replace(/\s+/g, '')
            cardapioCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "cardapio-div", "card-content")
            newElement.innerHTML = `
               <input type="hidden" name="cardapios[${cardapioCount}][id]" value="">
               <div class="col-xs-12 col-sm-12 form-group">
                  <label for="cardapio${titulo}" class="with-btn">
                     Cardápio
                     <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="cardapio-div">Excluir</button>
                  </label>
                  <input type="text" name="cardapios[${cardapioCount}][titulo]" class="form-control" id="cardapio${titulo}" value="${titulo}" placeholder="Buffet aniversário, festa, casamento...">
               </div>
               <div class="col-xs-12 form-group">
                  <label for="cardapio-menu${titulo}">Adicionadas</label>
                  <input type="text" name="cardapios[${cardapioCount}][menu]" class="form-control" id="cardapio-menu${titulo}" value="" placeholder="Escreva...">
               </div>

               <div class='form-group col-xs-12 paddingZeroM'>
                  
                  <label for="">Sugestões <i class="bi bi-arrow-down-up"></i></label>                     
                  <ul class="sugestoes cardapio">
                     <? foreach ($cardapiosDisponiveis as $cardapio) { ?>
                        <li class="btn btn-rounded btn-xs btn-bordered"
                           data-id="<?= $cardapio->titulo ?>"
                           data-target="cardapio-menu${titulo}"
                        > 
                           <?= $cardapio->titulo ?>
                        </li>
                     <? } ?>
                  </ul>
               
               </div>
            `
            cardapioContainer.appendChild(newElement)
            addFuncionalidadesSugestoes(titulo, 'cardapio-menu')
         }

         // Modal Adicionar Ponto de Venda (pdv)
         const pdvList = document.querySelectorAll(".pdv-div")
         const addPdv = document.querySelector("#modalPontoDeVenda button")
         let pdvCount = pdvList.length

         addPdv.addEventListener("click", conferirModalPdv)

         function conferirModalPdv() {
            const modal = document.querySelector("#modalPontoDeVenda")
            const tipoPdv = modal.querySelector("input[name=tipo-pdv]:checked")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = "";
            if (!tipoPdv) {
               msg.textContent = "Selecione o tipo do ponto de venda"
               return
            }

            modal.close()
            adicionarCampoPdv(tipoPdv.value)
            tipoPdv.checked = false
         }

         function adicionarCampoPdv(tipo) {
            const pdvsContainer = document.querySelector("#pontosDeVendaContainer")
            const newElement = document.createElement("div")
            pdvCount++

            newElement.classList.add("col-xs-12", "paddingZeroM", "pdv-div", 'card-content')
            newElement.innerHTML = `
               <label class="with-btn">
                  <div>
                     <img src="<?= PATHSITE ?>assets2/${tipo == "fisico" ? "Group 2310" : "web"}.png" alt="ícone de ponto de venda ${tipo}">
                     Ponto de venda ${tipo == "fisico" ? "Físico" : "Online"}
                  </div>
                  <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="pdv-div">Excluir</button>
               </label>

               <input type="hidden" name="pdvs[${pdvCount}][tipo]" value="${tipo}">

               <label class="col-xs-12 col-lg-6">
                  Título
                  <input type="text" name="pdvs[${pdvCount}][titulo]" value="" class="form-control" required minlength="3" placeholder="Sua Loja ou Seu Site etc...">
               </label>

               <label class="col-xs-12 col-lg-6">
                  Endereço / Site
                  <input type="text" name="pdvs[${pdvCount}][endereco]" value="" class="form-control" required minlength="3" placeholder="Rua Margarida ou www.site.com.br etc...">
               </label>
            `
            if (tipo == 'fisico') {
               newElement.innerHTML += `
                  <label class="col-xs-12 col-lg-6">
                     Telefone
                     <input type="text" name="pdvs[${pdvCount}][cep]" value="" class="form-control telefone" required minlength="3" placeholder="Escreva">
                  </label>

                  <label class="col-xs-12 col-lg-6">
                     Cidade
                     <input type="text" name="pdvs[${pdvCount}][cidade]" value="" class="form-control" required minlength="3" placeholder="Cidade - UF">
                  </label>
               `
            }

            pdvsContainer.appendChild(newElement);
            
            var SPMaskBehavior = function(val) {
                  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
               },
               spOptions = {
                  onKeyPress: function(val, e, field, options) {
                     field.mask(SPMaskBehavior.apply({}, arguments), options);
                  }
               };
            $('.telefone').mask(SPMaskBehavior, spOptions);
         }

         // Modal Adicionar Ingresso
         const ingressoList = document.querySelectorAll(".ingresso-div")
         const addIngresso = document.querySelector("#modalIngresso button")
         let ingressoCount = ingressoList.length

         addIngresso.addEventListener("click", conferirModalIngresso)

         function conferirModalIngresso() {
            const modal = document.querySelector("#modalIngresso")
            const tituloIngresso = modal.querySelector("input[name=titulo]")
            const precoIngresso = modal.querySelector("input[name=preco]")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = ""
            if (tituloIngresso.value.length <= 2) {
               msg.textContent = "Título com pelo menos 3 caracteres"
               return
            }
            if (precoIngresso.value == "") {
               msg.textContent = "Preencha o preço do ingresso!"
               return
            }

            const titulo = tituloIngresso.value
            const preco = precoIngresso.value
            tituloIngresso.value = "";
            precoIngresso.value = "";

            modal.close()
            adicionarCampoIngresso(titulo, preco, setorIngresso)
         }

         function adicionarCampoIngresso(titulo, preco, setor) {
            const ingressoContainer = document.querySelector(`[data-setor-ingresso="${setor}"`)
            const setorNumber = ingressoContainer.dataset.setorNumero
            const newElement = document.createElement("div")
            ingressoCount++

            newElement.classList.add("col-xs-12", "paddingZeroM", "ingresso-div", "card-content")
            newElement.innerHTML = `
               <div class="input-group">
                  <input type="hidden" name="setorIngresso[${setorNumber}][setor]" value="${setor}">

                  <span class="input-group-addon">Tipo</span>
                  <input type="text" 
                     name="setorIngresso[${setorNumber}][ingressos][${ingressoCount}][titulo]" 
                     value="${titulo}" 
                     class="form-control" 
                     value="${titulo}"
                     placeholder="Escreva..."
                  >

                  <span class="input-group-addon">R$</span>
                  <input type="text" 
                     name="setorIngresso[${setorNumber}][ingressos][${ingressoCount}][preco]" 
                     value="${preco}" 
                     class="form-control money" 
                     placeholder="Escreva..."
                  >                     
               </div>
            `
            ingressoContainer.appendChild(newElement)
            $('.money').mask('#.##0,00', {
               reverse: true
            });
         }

         // Modal Setor Ingresso
         const setorIngressoList = document.querySelectorAll(".setor-ingresso-div")
         const addSetorIngresso = document.querySelector("#modalSetorIngresso button")
         let setorIngressoCount = setorIngressoList.length

         addSetorIngresso.addEventListener("click", conferirModalSetorIngresso)

         function conferirModalSetorIngresso() {
            const modal = document.querySelector("#modalSetorIngresso")
            const tituloSetor = modal.querySelector("input[name=titulo]")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = ""
            if (tituloSetor.value.length <= 2) {
               msg.textContent = "Título com pelo menos 3 caracteres"
               return
            }

            const titulo = tituloSetor.value
            tituloSetor.value = ""

            modal.close()
            adicionarCampoSetorIngresso(titulo)
         }

         function adicionarCampoSetorIngresso(titulo) {
            const setorIngressoContainer = document.querySelector("#setorIngressoContainer")
            const newElement = document.createElement("div")
            setorIngressoCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "setor-ingresso", "card-content")
            newElement.setAttribute("data-setor-ingresso", `${titulo}`)
            newElement.setAttribute("data-setor-numero", `${setorIngressoCount}`)

            newElement.innerHTML = `
               <div class="box-title with-btn">
                  ${titulo}
                  <div class="btns-cont">
                     <button type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="${titulo}">
                        Adicionar ingresso
                        <i class="ico bi bi-plus-lg"></i>
                     </button>
                     <button type="button" class="btn btn-xs btn-rounded btn-danger" data-parent="setor-ingresso">
                        <i class="bi bi-trash"></i>
                     </button>
                  </div>
               </div>            
            `
            setorIngressoContainer.appendChild(newElement)
         }

         // Modal Proximidades
         const proximidadesList = document.querySelectorAll(".proximidade-div")
         const addProximidade = document.querySelector("#modalProximidades button")
         let proximidadesCount = proximidadesList.length

         addProximidade.addEventListener("click", conferirModalProximidade)

         function conferirModalProximidade() {
            const modal = document.querySelector("#modalProximidades")
            const optionSelected = modal.querySelector("input:checked")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = "";
            if (!optionSelected) {
               msg.textContent = "Seleciona uma opção!"
               return
            }
            const idOption = optionSelected.previousElementSibling

            const titulo = optionSelected.value
            const id = idOption.value
            const img = idOption.dataset.img

            optionSelected.checked = false
            modal.close()
            adicionarCampoProximidade(titulo, id, img)
         }

         function adicionarCampoProximidade(titulo, id, imagem) {
            const proximidadesContainer = document.querySelector("#proximidadesContainer")
            const newElement = document.createElement("div")
            proximidadesCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "proximidade-div", "card-content")
            newElement.innerHTML = `
               <input type="hidden" name="proximidade[${proximidadesCount}][id]" value="">
               <input type="hidden" name="proximidade[${proximidadesCount}][proximidadeFK]" value="${id}">
               <div class="col-xs-12 col-sm-12 form-group">
                  <label for="proximidade${titulo}" class="with-btn">

                     <div>
                        <img src="<?= PATHSITE ?>uploads/proximidade/${imagem}" alt="ícone ${titulo} ">
                        ${titulo}
                     </div>
                     
                     <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="proximidade-div">Excluir</button>
                  </label>
                  <input type="text" name="proximidade[${proximidadesCount}][proximidades]" class="form-control" id="proximidade${titulo}" value="" placeholder="Escreva...">
               </div>
            `
            proximidadesContainer.appendChild(newElement)
         }

         // Modal Categoria Comodidade
         const catCmddList = document.querySelectorAll(".catCmdd-div");
         const addCatCmdd = document.querySelector("#modalCatCmdd button")
         let catCmddCount = catCmddList.length

         addCatCmdd.addEventListener("click", conferirModalCatCmdd)

         function conferirModalCatCmdd() {
            const modal = document.querySelector("#modalCatCmdd")
            const tituloCat = modal.querySelector("input")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = "";
            if (tituloCat.value.length <= 2) {
               msg.textContent = "Título com pelo menos 2 caracteres"
               return
            }

            const titulo = tituloCat.value
            tituloCat.value = ""

            modal.close();
            adicionarCampoCatCmdd(titulo)
         }

         function adicionarCampoCatCmdd(titulo) {
            const cmddCatContainer = document.querySelector("#cmddCatContainer")
            const newElement = document.createElement("div")
            titulo = titulo.replace(/\s+/g, '')
            catCmddCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "catCmdd-div", "card-content")
            newElement.innerHTML = `               
               <input type="hidden" name="catCmdd[${catCmddCount}][id]" value="">
               <div class="col-xs-12 col-sm-12 form-group">
                  <label for="area" class="with-btn">
                     Área
                     <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="catCmdd-div">Excluir</button>
                  </label>
                  <input type="text" name="catCmdd[${catCmddCount}][titulo]" class="form-control" id="area" value="${titulo}" placeholder="cozinha, banheiro...">
               </div>
               <div class="col-xs-12 form-group">
                  <label for="catCmdd${titulo}">Adicionadas</label>
                  <input type="text" name="catCmdd[${catCmddCount}][comodidades]" class="form-control" id="catCmdd${titulo}" value="" placeholder="Escreva...">
               </div>

               <div class='form-group col-xs-12 paddingZeroM'>
                  
                  <label for="">Sugestões <i class="bi bi-arrow-down-up"></i></label>                     
                  <ul class="sugestoes comodidades">
                     <? foreach ($comodidadesDisponiveis as $comodidade) { ?>
                        <li class="btn btn-rounded btn-xs btn-bordered"
                           data-id="<?= $comodidade->titulo ?>"
                           data-target="catCmdd${titulo}"
                        > 
                           <?= $comodidade->titulo ?>
                        </li>
                     <? } ?>
                  </ul>
               
               </div>
            `
            cmddCatContainer.appendChild(newElement)
            addFuncionalidadesSugestoes(titulo, 'catCmdd')
         }

         // Modal Valor
         const valoresList = document.querySelectorAll(".valor-div");
         const addValor = document.querySelector("#modalValor button")
         let valoresCount = valoresList.length

         addValor.addEventListener("click", conferirModalValor)

         function conferirModalValor() {
            const modal = document.querySelector("#modalValor")
            const tituloValor = modal.querySelector("input[name=tituloValor]")
            const valorValor = modal.querySelector("input[name=valorValor]")
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = ""
            if (tituloValor.value.length <= 2) {
               msg.textContent = "Título com pelo menos 2 caracteres"
               return
            }
            if (valorValor.value == "") {
               msg.textContent = "Preencha o valor!"
               return
            }

            const titulo = tituloValor.value
            const valor = valorValor.value
            tituloValor.value = ""
            valorValor.value = ""

            modal.close()
            adicionarCampoValor(titulo, valor)
         }

         function adicionarCampoValor(titulo, valor) {
            const valoresContainer = document.querySelector("#valoresContainer")
            const newInput = document.createElement("div")

            valoresCount++

            newInput.classList.add("form-group", "col-sm-12", "col-lg-4", "paddingZeroM", "valor-div")
            newInput.innerHTML = `
               <div class="col-xs-12 col-sm-12">
                  <label for="valor${titulo}" class="with-btn">
                     ${titulo}
                     <button type="button" class="btn btn-danger btn-xs btn-rounded" data-parent="valor-div">Excluir</button>
                  </label>
                  <input type="hidden" name="valor[${valoresCount}][id]" value="">
                  <div class="input-group">
                     <span class="input-group-addon">Título</span>
                     <input type="text" name="valor[${valoresCount}][titulo]" class="form-control" id="valor${titulo}" value="${titulo}" placeholder="Escreva..." required>
                  </div>
                  <div class="input-group">
                     <span class="input-group-addon">R$</span>
                     <input type="text" name="valor[${valoresCount}][valor]" class="form-control money" value="${valor}" placeholder="Escreva..." required>
                  </div>
               </div>
            `
            valoresContainer.appendChild(newInput)

            $('.money').mask('#.##0,00', {
               reverse: true
            });
         }

         // Sugestões
         document.querySelector("form").addEventListener("click", event => {
            if (event.target.matches(".sugestoes li")) {
               const item = event.target;
               const textContent = item.textContent
               const tagDisplayTarget = item.dataset.target

               $(`#${tagDisplayTarget}`).tagit("createTag", textContent)
               item.style.display = "none";
            }
         })

         // Sugestões de Comodidades
         const catCmddExistentes = document.querySelectorAll(".catCmdd-div")
         document.addEventListener("DOMContentLoaded", () => {
            catCmddExistentes.forEach(element => {
               const titulo = element.dataset.catTitulo
               addFuncionalidadesSugestoes(titulo, 'catCmdd')
            });
         })

         // Sugestão de Cardápios
         const cardapiosExistentes = document.querySelectorAll(".cardapio-div")
         document.addEventListener("DOMContentLoaded", () => {
            cardapiosExistentes.forEach(element => {
               const titulo = element.dataset.cardapioTitulo
               addFuncionalidadesSugestoes(titulo, 'cardapio-menu')
            });
         })

         function addFuncionalidadesSugestoes(titulo, classeDivs) {
            $(`#${classeDivs}${titulo}`).tagit({
               allowSpaces: true,
               caseSensitive: false,
               beforeTagRemoved: function(event, ui) {
                  let label = ui.tagLabel
                  const item = document.querySelector(`.sugestoes li[data-id='${label}'][data-target="${classeDivs}${titulo}"]`);

                  if (item) {
                     item.style.display = "inline-block"
                  }
               }
            })
         }

         // Deletar Elementos Dinâmicos
         const cardsContent = document.querySelectorAll(".card-content")
         cardsContent.forEach(card => {
            card.addEventListener("click", e => {
               const element = e.target

               if (element.matches("button[data-parent], button[data-parent] i")) {
                  swal({
                     title: "Confirmação",
                     text: "Tem certeza que quer excluir o item?",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                  }).then((confirmDel) => {
                     if (confirmDel) {
                        const parentToDelete = element.dataset.parent
                        element.closest(`.${parentToDelete}`).remove()

                        swal("O item será excluído ao salvar as alterações!", {
                           icon: "success",
                        });
                     }
                  });
               }
            })
         })

         // Dialogs Geral
         const boxesContent = document.querySelectorAll(".box-content")
         const dialogs = document.querySelectorAll(".dialog")
         const closeBtns = document.querySelectorAll(".dialog .close")
         let catInngresso
         boxesContent.forEach(box => {
            box.addEventListener("click", e => {
               if (e.target.matches(".dialog-btn")) {
                  const btn = e.target
                  const modalTarget = document.querySelector(`#${btn.dataset.target}`)

                  if (btn.dataset.setor) {
                     setorIngresso = btn.dataset.setor
                     console.log(setorIngresso);
                  }
                  modalTarget.showModal()
                  modalTarget.querySelector("input").focus()
               }
            })
         })
         dialogs.forEach(dialog => {
            dialog.addEventListener("click", e => {
               if (e.target == dialog) {
                  dialog.close()
               }
            })
         })
         closeBtns.forEach(btn => {
            btn.addEventListener("click", (e) => {
               e.target.closest("dialog").close();
            })
         })
      </script>