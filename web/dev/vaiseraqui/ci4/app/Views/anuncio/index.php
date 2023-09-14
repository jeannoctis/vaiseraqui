<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title"><?= $title ?></h4>
               </div>
               <div class='col-xs-12 col-md-6 text-right form-group'>
                  <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/">
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light hide">Adicionar</button>
                  </a>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light hide">Excluir</button>
               </div>


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
                              
                              <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/destaques/">
                                       Destaques / Em Alta
                                    </a>
                                 </td>
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/destaques/">
                                       Descrição...
                                    </a>
                                 </td>
                              </tr>

                              <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/tipos/">
                                       Tipos
                                    </a>
                                 </td> 
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/tipos/">
                                       Descrição...
                                    </a>
                                 </td>                                
                              </tr>

                              <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/banners/">
                                       Banners
                                    </a>
                                 </td>
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/banners/">
                                       Descrição...
                                    </a>
                                 </td>
                              </tr>

                              <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/servicocategorias/">
                                       Categoria Serviços
                                    </a>
                                 </td>
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/modelos/servicocategorias/">
                                       Descrição...
                                    </a>
                                 </td>
                              </tr>
                              
                           </tbody>
                        </table>
                     </div>
                     <input type="hidden" name="nexc" value="1">
                  </form>
               </div>


            </div>
         </div>
      </div>
   </div>
</div>