<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title"><?= $title ?></h4>
               </div>
               <div class='col-xs-12 col-md-6 text-right form-group'>
                  <form method="post" style="display: inline-flex;">
                     <button type="submit" class="btn btn-primary btn-rounded" name="gerar">
                        Gerar Arquivo <i class="bi bi-download"></i>
                     </button>
                  </form>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
               </div>

               <h5 class="col-xs-12">Filtros <i class="bi bi-funnel"></i></h5>
               <form method="get" class="col-xs-12 filters" id="formFiltro">
                  <ul>
                     <li>
                        <div class="input-group">
                           <label for="procura">Busque por nome ou dado</label>
                           <div class="submit-wrapper">
                              <input type="text" name="procura" id="procura" class="form-control" value="<?= $get['procura'] ?? '' ?>">
                              <button type="submit" class="btn btn-info waves-effect waves-light">
                                 <i class="bi bi-search"></i>
                              </button>
                           </div>
                        </div>
                     </li>
                     <li>
								<div class="select2-wrapper">
									<label for="origem">Origem</label>
									<select name="origem" id="origem" class="form-control js-example-basic-single">
										<option value="">-- filtre por origem --</option>
										<option value="home" <?=$get['origem'] == 'home' ? 'selected' : '' ?>>Página inicial</option>
										<option value="contato" <?=$get['origem'] == 'contato' ? 'selected' : '' ?>>Página de contato</option>
										<option value="planos" <?=$get['origem'] == 'planos' ? 'selected' : '' ?>>Página de Planos</option>
										<option value="whatsapp" <?=$get['origem'] == 'whatsapp' ? 'selected' : '' ?>>Balão WhatsApp</option>
									</select>
								</div>
							</li>
                     <li>
                        <a href="<?= PATHSITE ?>admin/contato/" class="btn btn-primary btn-rounded cleanfilter">Limpar Filtro</a>
                     </li>
                  </ul>
                  <input type="hidden" name="tipo" value="<?= $get['tipo'] ?>">
               </form>

               <? if ($lista) {  ?>
                  <div class='col-xs-12 paddingZeroM'>
                     <form method='post' id='form'>

                        <div class="table-responsive">
                           <table class="table  ">
                              <thead>
                                 <tr>
                                    <th class='menorTh'>Excluir</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data/hora</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <? foreach ($lista as $elemento) { ?>
                                    <tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
                                       <td><input type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" /> </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>">
                                             <?= $elemento->nome ?>
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>">
                                             <?= $elemento->email ?? "(formulário WhatsApp) " ?>
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>">
                                             <?= formataDataHora($elemento->dtCriacao) ?>
                                          </a>
                                       </td>
                                    </tr>
                                 <? } ?>
                              </tbody>
                           </table>
                        </div>
                        <input type="hidden" name="nexc" value="1">
                     </form>
                     <nav class="col-xs-12 navigation-pages ">
                        <?= $pager->links('contatos', 'panel_full') ?>
                     </nav>
                  </div>
               <? } ?>
            </div>
            <!-- /.box-content -->
         </div>
         <!-- /.col-lg-6 col-xs-12 -->
      </div>
   </div>
   <style>
      form.filters,
      form.filters ul {
         display: flex;
         align-items: center;
      }

      form.filters {
         gap: 2rem;
         margin-block: 1rem;
      }

      form.filters ul {
         align-items: flex-end;
         justify-content: space-between;
         gap: 1.75rem;
         width: 100%;
         margin: 0;
         padding: 0;
         list-style: none;
      }

      form.filters ul .select2-wrapper {
         display: flex;
         flex-direction: column;
      }

      form.filters ul .submit-wrapper {
         display: flex;
         /* gap: 1rem; */
      }

      form.filters ul .submit-wrapper input {
         border: 1px solid #aaa;
         border-radius: 4px !important;
      }

      form.filters .cleanfilter {
         display: grid;
         place-items: center;
         height: 45px;
      }
   </style>
   <!-- /.row -->

   <!-- /.row small-spacing -->