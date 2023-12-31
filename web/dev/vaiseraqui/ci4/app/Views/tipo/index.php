<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title"><?= $title ?></h4>
               </div>
             <div class='col-xs-12 col-md-6 text-right form-group'>
                  <a href="<?= PATHSITE ?>admin/anuncio_tipo/form/">
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
                  </a>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
               </div> 
               <!-- /.dropdown js__dropdown -->

               <? if ($lista) {  ?>
                  <div class='col-xs-12 paddingZeroM'>
                     <form method='post' id='form'>

                        <div class="table-responsive">
                           <table class="table  sortable">
                              <thead>
                                 <tr>
                                    <th class='menorTh'></th>
                                    <th>Nome</th>
                                    <th>Categorias</th>
                                        <th>Anúncios</th>
                                    <th>Ordenar</th> 
                                 </tr>
                              </thead>
                              <tbody>
                                 <? foreach ($lista as $elemento) { ?>
                                    <tr class="ui-state-default sort <?=($elemento->status == 'INATIVO') ? 'inativo'  : '' ?> " rel="<?= $elemento->id ?>">
                                       <td></td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/anuncio_tipo/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->titulo) ?>">
                                             <?= $elemento->titulo ?>
                                          </a>
                                       </td>
                                        <td>
                                          <a href="<?= PATHSITE ?>admin/produto_categoria?tipo=<?=$elemento->id?>">
                                           Categorias
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/produto?tipo=<?=$elemento->id?>">
                                           Anúncios
                                          </a>
                                       </td>
                                       <td><img src="<?= PATHSITE ?>admins/assets/images/ordenar.png" /> </td> 
                                    </tr>
                                 <? } ?>
                              </tbody>
                           </table>
                        </div>
                        <input type="hidden" name="nexc" value="1">
                     </form>
                  </div>
               <? } ?>
            </div>
         </div>
      </div>