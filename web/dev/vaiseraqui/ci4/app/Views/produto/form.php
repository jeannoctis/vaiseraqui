<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white pb-1">
                  <h4 class="box-title"><?= $title ?> - <?= $tipo ?></h4>
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

                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Endereço
                  </h4>
                  <div class="card-content">
                     <div class='col-xm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="endereco">Endereço, número, complemento </label>
                           <input type="text" name="endereco" class="form-control" id="endereco" value="<?= $resultado->endereco ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="bairro">Bairro </label>
                           <input type="text" name="bairro" class="form-control" id="bairro" value="<?= $resultado->bairro ?>" placeholder="Escreva..." required>
                        </div>
                     </div>

                     <div class='col-xm-12 col-md-4 paddingZeroM'>
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
                           <label for="mapa">iframe do Mapa
                              <a href='https://www.youtube.com/watch?v=tkDykmlUvYo' target='_blank'>
                                 <i class='mdi mdi-comment-question-outline'></i>
                              </a>
                           </label>
                           <textarea name='mapa' class="form-control" id="mapa"><?= $resultado->mapa ?></textarea>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="box-content card white">
                  <h4 class="box-title">
                     Anunciante
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12">
                           <label for="anuncianteFK">Responsável</label>
                           <select name="anuncianteFK" id="anuncianteFK" class="js-example-basic-single form-control">
                              <? if ($anunciantes) { ?>
                                 <option value="">-- Selecione a pessoa responsável</option>
                                 <? foreach ($anunciantes as $anunciante) { ?>
                                    <option <?= $resultado->anuncianteFK == $anunciante->id ? 'selected' : '' ?> value="<?= $anunciante->id ?>">
                                       <?= $anunciante->titulo ?>
                                    </option>
                                 <? } ?>
                              <? } ?>
                              <option value=""></option>
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
                           <textarea name='descricao' class="tinymce_full" id="descricao"><?= $resultado->descricao ?></textarea>
                        </div>
                     </div>

                     <div class='col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="detalhes">Descrição completa</label>
                           <textarea name='detalhes' class="tinymce_full" id="detalhes"><?= $resultado->detalhes ?></textarea>
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
                                       <input type="text" name="valor[<?= $ind ?>][valor]" class="form-control money" value="<?= $item->valor?>" placeholder="Escreva..." required>
                                    </div>
                                 </div>
                              </div>
                           <? } ?>
                        <? } ?>
                     </div>

                  </div>
               <? } ?>

               <? if (in_array($get['tipo'], [1, 3])) { ?>
                  <div class="box-content card white">
                     <h4 class="box-title">
                        Comodidades em Destaque
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
                              <div class="form-group col-xs-12 paddingZeroM catCmdd-div card-content" data-cat-titulo="<?= $area->titulo ?>">

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
                                    <input type="text" name="catCmdd[ <?= $ind ?> ][comodidades]" class="form-control tag-it mySingleFieldTags" id="catCmdd<?= $area->titulo ?>" value="<?= $area->comodidades ?>" placeholder="Escreva...">
                                 </div>

                                 <div class='form-group col-xs-12 paddingZeroM'>
                                    <label for="">Sugestões <i class="bi bi-arrow-down-up"></i></label>
                                    <? if ($comodidadesDisponiveis) {
                                       $atuais = explode(";", $area->comodidades);
                                    } ?>
                                    <ul class="sugestoes comodidades">
                                       <? foreach ($comodidadesDisponiveis as $comodidade) { ?>
                                          <li class="btn btn-rounded btn-xs btn-bordered" style="<?= in_array($comodidade->titulo, $atuais) ? "display: none" : "" ?>" data-id="<?= $comodidade->titulo ?>" data-target="catCmdd<?= $area->titulo ?>">
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

               <? if (in_array($get['tipo'], [1])) { ?>
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

               <? if (in_array($get['tipo'], [1, 2, 3, 4])) { ?>
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
                        <div class='col-xm-12 paddingZeroM'>
                           <div class="col-xs-12 form-group">
                              <label for="pode">Pode</label>
                              <input type="text" name="pode" class="form-control" id="pode" value="<?= $resultado->pode ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                        <div class='col-xm-12 paddingZeroM'>
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
                        Ingressos
                        <button type="button" class="btn btn-icon btn-icon-left btn-success btn-xs btn-rounded dialog-btn" data-target="modalSetorIngresso">
                           Adicionar categoria
                           <i class="ico bi bi-plus-lg"></i>
                        </button>
                     </h4>
                     <div class="card-content" id="setorIngressoContainer">

                        <? if ($setores) {
                           foreach ($setores as $key => $setor) { ?>
                              <div class="form-group, col-xs-12 paddingZeroM setor-ingresso card-content" data-setor-ingresso="<?= $setor->setor ?>">
                                 <div class="box-title with-btn">
                                    <?= $setor->setor ?>
                                    <button type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="<?= $setor->setor ?>" ->
                                       Adicionar ingresso
                                       <i class="ico bi bi-plus-lg"></i>
                                    </button>
                                 </div>

                                 <? foreach ($setor->ingressos as $keyIng => $ingresso) { ?>
                                    <div class="col-xs-12 paddingZeroM ingresso-div card-content">                                       
                                       <div class="input-group">
                                          <input type="hidden" name="setorIngresso[ <?= $key ?> ][id]" value="<?= $setor->id ?>">
                                          <input type="hidden" name="setorIngresso[ <?= $key ?> ][setor]" value="<?= $setor->setor ?>">

                                          <span class="input-group-addon">Tipo</span>
                                          <input type="hidden" name="setorIngresso[ <?= $key ?> ][ingressos][ <?= $keyIng ?> ][idIngresso]" value="<?= $ingresso->id ?>">
                                          <input type="text" name="setorIngresso[ <?= $key ?> ][ingressos][ <?= $keyIng ?> ][modalidade]" class="form-control" value="<?= $ingresso->titulo ?>" placeholder="Escreva...">
                                          <span class="input-group-addon">R$</span>
                                          <input type="text" name="setorIngresso[ <?= $key ?> ][ingressos][ <?= $keyIng ?> ][preco]" class="form-control money" value="<?= $ingresso->preco ?>" placeholder="Escreva...">
                                       </div>                                       
                                    </div>
                                 <? } ?>
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

            <label for="" class="form-group col-xs-12" style="padding-inline: 0;">
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
                           <input type="hidden" name="proximidadeFK" value="<?= $prox->id ?>">
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

            <label for="tituloSetor" class="form-group col-xs-12" style="padding-inline: 0;">
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
            padding: 2.75rem;
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

         .dialog#modalProximidades ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.75rem;
         }

         .dialog#modalProximidades ul img {
            width: 26px;
            aspect-ratio: 1;
            object-fit: contain;
         }

         .dialog#modalProximidades ul li {
            padding: 10px 20px;
            border-radius: 1rem;
            transition: all 200ms ease-in-out;
         }

         .dialog#modalProximidades ul li:hover {
            background-color: aliceblue;
         }

         /* Sugestões */
         :is(.catCmdd-div, .proximidade-div, .setor-ingresso-div, div[data-setor-ingresso]) {
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
      </style>

      <script>
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
            const newElement = document.createElement("div")
            ingressoCount++

            newElement.classList.add("col-xs-12", "paddingZeroM", "ingresso-div", "card-content")

            newElement.innerHTML = `
               <div class="input-group">
                  <input type="hidden" name="setorIngresso[${setorIngressoCount}][setor]" value="${setor}">
                  <span class="input-group-addon">Tipo</span>
                  <input type="text" 
                     name="setorIngresso[${setorIngressoCount}][ingressos][${ingressoCount}][titulo]" 
                     value="${titulo}" 
                     class="form-control" 
                     value="${titulo}"
                     placeholder="Escreva..."
                  >
                  <span class="input-group-addon">R$</span>
                  <input type="text" 
                     name="setorIngresso[${setorIngressoCount}][ingressos][${ingressoCount}][preco]" 
                     value="${preco}" 
                     class="form-control money" 
                     placeholder="Escreva..."
                  >                     
               </div>               
            `
            ingressoContainer.appendChild(newElement)
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

            newElement.innerHTML = `
               <div class="box-title with-btn">
                  ${titulo}
                  <button type="button" class="btn btn-icon btn-icon-left btn-xs btn-rounded dialog-btn" data-target="modalIngresso" data-setor="${titulo}"->
                     Adicionar ingresso
                     <i class="ico bi bi-plus-lg"></i>
                  </button>
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
            const idOption = optionSelected.previousElementSibling
            const msg = modal.querySelector("span.msgErro")

            msg.textContent = "";
            if (!optionSelected) {
               msg.textContent = "Seleciona uma opção!"
               return
            }

            const titulo = optionSelected.value
            const id = idOption.value

            optionSelected.checked = false
            modal.close()
            adicionarCampoProximidade(titulo, id)
         }

         function adicionarCampoProximidade(titulo, id) {
            const proximidadesContainer = document.querySelector("#proximidadesContainer")
            const newElement = document.createElement("div")
            proximidadesCount++

            newElement.classList.add("form-group", "col-xs-12", "paddingZeroM", "proximidade-div", "card-content")
            newElement.innerHTML = `
               <input type="hidden" name="proximidade[${proximidadesCount}][id]" value="">
               <input type="hidden" name="proximidade[${proximidadesCount}][proximidadeFK]" value="${id}">
               <div class="col-xs-12 col-sm-12 form-group">
                  <label for="proximidade${titulo}" class="with-btn">
                     ${titulo} 
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
            addFuncionalidadesSugestoes(titulo)
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

         // Sugestões de Comodidades
         document.querySelector("form").addEventListener("click", event => {
            if (event.target.matches(".sugestoes li")) {
               const item = event.target;
               const textContent = item.textContent
               const tagDisplayTarget = item.dataset.target

               $(`#${tagDisplayTarget}`).tagit("createTag", textContent)
               item.style.display = "none";
            }
         })
         const catCmddExistentes = document.querySelectorAll(".catCmdd-div")
         document.addEventListener("DOMContentLoaded", () => {
            catCmddExistentes.forEach(element => {
               const titulo = element.dataset.catTitulo
               addFuncionalidadesSugestoes(titulo)
            });
         })

         function addFuncionalidadesSugestoes(titulo) {
            $(`#catCmdd${titulo}`).tagit({
               allowSpaces: true,
               caseSensitive: false,
               beforeTagRemoved: function(event, ui) {
                  let label = ui.tagLabel
                  const item = document.querySelector(`.sugestoes li[data-id='${label}'][data-target="catCmdd${titulo}"]`);

                  console.log(item)
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

               if (element.matches("button[data-parent]")) {

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
                  }
                  modalTarget.showModal()
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