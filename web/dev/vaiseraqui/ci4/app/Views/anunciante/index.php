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
                    <!-- /.dropdown js__dropdown -->

                    <? if ($artigos) { ?>
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
                                            <? foreach ($artigos as $artigo) { ?>
                                                <tr class="ui-state-default sort" rel="<?= $artigo->id ?>">
                                                    <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($artigo->id) ?>/<?= arruma_url($artigo->titulo) ?>">
                                                            <?= $artigo->titulo ?>
                                                        </a>
                                                    </td>	
                                                    <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($artigo->id) ?>/<?= arruma_url($artigo->titulo) ?>">
                                                            <?= $artigo->email ?>
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
                </div>
            </div>
        </div>