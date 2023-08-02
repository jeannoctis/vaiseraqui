<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title"><?= $title ?></h4>
               </div>

               <!-- /.dropdown js__dropdown -->

               <? if ($lista) {  ?>
                  <div class='col-xs-12 paddingZeroM'>
                     <form method='post' id='form'>

                        <div class="table-responsive">
                           <table class="table  ">
                              <thead>
                                 <tr>
                                    <th>Nome</th>
                                    <th>E-mails</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <? foreach ($lista as $elemento) { ?>
                                    <tr class="ui-state-default sort" rel="<?= $elemento->id ?>">

                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>">
                                             <?= $elemento->nome ?>
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>">
                                             <?= $elemento->email ?>
                                          </a>
                                       </td>
                                    </tr>
                                 <? } ?>
                              </tbody>
                           </table>
                        </div>
                     </form>
                  </div>
               <? } ?>
            </div>
            <!-- /.box-content -->
         </div>
         <!-- /.col-lg-6 col-xs-12 -->


      </div>
      <!-- /.row -->

      <!-- /.row small-spacing -->