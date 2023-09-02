<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title">Anúncios em Banners</h4>
               </div>
               <!-- <div class='col-xs-12 col-md-6 text-right form-group'>
                  <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/">
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
                  </a>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
               </div> -->

               <? if ($lista) { ?>
                  <div class='col-xs-12 paddingZeroM'>
                     <form method='post' id='form'>

                        <div class="table-responsive">
                           <table class="table  ">
                              <thead>
                                 <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <? foreach ($lista as $item) { ?>
                                    <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/banner/<?= encode($item->id) ?>/">
                                             <?= $item->titulo ?>
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/banner/<?= encode($item->id) ?>/">
                                             <?= $item->descricao ?>
                                          </a>
                                       </td>
                                    </tr>
                                 <? } ?>
                              </tbody>
                           </table>
                        </div>
                        <input type="hidden" name="nexc" value="1">
                     </form>


                  </div>
               <? } ?>

               <!-- Botões -->
               <div class="col-xs-12 form-group">
                  <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/">
                     <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                  </a>
                  <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1 hide">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
