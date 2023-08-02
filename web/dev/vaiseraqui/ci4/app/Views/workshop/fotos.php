<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title">Fotos</h4>
               </div>

               <div class='col-xs-12 col-md-6 text-right form-group'>
                  <a style="float: right; margin-left: 15px; margin-top: 13px;" href="#" class="switch danger">
                     <input style="width:20px; margin-top: 0; margin-bottom:0; height: 20px; float: left; margin-right: 5px;" type="checkbox" id="check-excluir" />
                     <label style="float: left; color: gray" for="check-excluir">Modo Exclusão </label>
                  </a>

                  <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/foto/<?= encode($idWorkshop) ?>">
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
                  </a>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
               </div>

               <!-- /.dropdown js__dropdown -->

               <form id='form' method="post">
                  <div class="sortable">
                     <? if ($fotos) { ?>
                        <? foreach ($fotos as  $ind => $elemento) { ?>
                           <div style="padding: 0; cursor: pointer; border: solid 1px #000;" class="ui-state-default base sort col-md-4" rel="<?= $elemento->id ?>">
                              <div style="background-size: cover; background-position: center center; background-image:url('<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $elemento->arquivo ?>'); height: 467px; background-repeat: no-repeat"></div>
                              <div class="hover">

                                 <input class="excluir" type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" />
                                 <div class="icones">

                                    <div>
                                       <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/foto/<?= encode($workshop->id) ?>/<?= encode($elemento->id) ?>">
                                          <i class="glyphicon glyphicon-edit"></i> Editar
                                       </a>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        <? } ?>
                     <? } ?>
                  </div>

                  <!-- Botões -->
                  <div class="form-group col-xs-12" style="margin-top: 2rem;">
                     <div class='col-xs-12'>
                        <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>">
                           <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                        </a>
                        <input type="submit" name="salvar" value="Salvar e Atualizar" class="btn btn-success btn-rounded waves-effect mb-1" />
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.box-content -->
         </div>
         <!-- /.col-lg-6 col-xs-12 -->


      </div>

      <style>
         .base {
            position: relative;
         }

         .exclusao .hover {
            border: solid 20px #FFF;
            display: block !important;
         }

         .excluir {
            display: none;
            position: absolute;
            left: -17px;
            top: -19px;
            height: 15px;
            width: 15px;
         }

         .exclusao .hover .excluir {
            display: block;
         }

         .base .hover {
            display: none;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            left: 0;
            top: 0;
         }

         .base:hover .hover {
            display: block;
         }

         .icones {
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%);
         }

         .icones a {
            color: #FFF !important;
         }

         .botao {
            float: left;
            padding: 15px 25px;
            border-radius: 6px;
            margin-right: 10px;
            background-color: #FFF;
            color: #000;
            border: solid 1px #428bca;
            text-decoration: none !important;
         }

         .botao.ativo,
         .botao:hover {
            color: #FFF;
            background-color: #428bca;
         }
      </style>