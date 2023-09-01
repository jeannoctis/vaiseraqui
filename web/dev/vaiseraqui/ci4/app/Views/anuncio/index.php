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
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
                  </a>
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
                        <a href="<?= PATHSITE ?>admin/anunciante/" class="btn btn-primary btn-rounded cleanfilter">Limpar Filtro</a>
                     </li>
                  </ul>
                  <input type="hidden" name="tipo" value="<?= $get['tipo'] ?>">

               </form>

               <? if ($lista) { ?>
                  <div class='col-xs-12 paddingZeroM'>
                     <form method='post' id='form'>

                        <div class="table-responsive">
                           <table class="table  ">
                              <thead>
                                 <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <? foreach ($lista as $item) { ?>
                                    <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>/">
                                             <?= $item->produtoFK ?>
                                          </a>
                                       </td>
                                       <td>
                                          <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>/">
                                             <?= $item->tipo ?>
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
                        <?= $pager->links('anunciantes') ?>
                     </nav>
                  </div>
               <? } ?>
            </div>
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