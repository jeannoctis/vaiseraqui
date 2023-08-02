<? ?>
<? /* <script type="text/javascript">
  $(function () {
  $("#sortable").sortable({
  items: ".sort", opacity: 0.5, update: function (event, ui) {
  var lista = [];
  $('#sortable .sort').each(function (cont, element) {
  lista.push($(element).attr("rel"));
  });
  ordena(lista, "<?= $tabela ?>");
  }
  });
  $("#sortable").disableSelection();
  });
  function ordena(lista, tabela) {
  $.post('<?= PATHSITE ?>banco/ordena/', {lista: lista, tabela: tabela}, function (retorno) {

  });
  }
  </script> */ ?>

<form method="post">
   <div class="col-md-10">
      <div class="row">
         <div class="col-md-12">
            <div class="content-box-large">
               <div class="panel-heading">
                  <div class="panel-title"><?= $title ?></div>

                  <div class="panel-options">
                     <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/" data-rel="collapse"><i class="glyphicon glyphicon-plus"></i>Adicionar</a>
                  </div>
               </div>
               <div class="panel-body">
                  <table id="sortable" class="table table-striped">
                     <thead>
                        <tr>
                           <th>Excluir</th>
                           <th>Nome</th>
                           <th>Foto</th>
                        </tr>
                     </thead>
                     <tbody>
                        <? if ($lista) {
                           foreach ($lista as $elemento) { ?>
                              <tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
                                 <td><input type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" /> </td>
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->nome) ?>">
                                       <?= $elemento->nome ?>
                                    </a>
                                 </td>
                                 <td>
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->nome) ?>">
                                       <?= $elemento->link ?>
                                    </a>
                                 </td>
                              </tr>
                           <? }
                        } ?>
                     </tbody>
                  </table>
                  <input class="btn btn-primary" type="submit" name="apagar" value="Excluir" />
               </div>
            </div>
         </div>
      </div>
   </div>
</form>