<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-content card white">
                        <h4 class="box-title"><?= $title ?></h4>
                        <!-- /.box-title -->
                        <div class="card-content">

                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="titulo">Nome </label>
                                <input readonly type="text" class="form-control" id="titulo" value="<?= $resultado->nome ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="email">E-mail </label>
                                <input readonly type="text" class="form-control" id="email" value="<?= $resultado->email ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="prefContato">Preferência de Contato </label>
                                <input readonly type="text" class="form-control" id="prefContato" value="<?= $resultado->prefContato ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="dtCriacao">Data do contato </label>
                                <input readonly type="text" class="form-control" id="dtCriacao" value="<?= formataDataHora($resultado->dtCriacao) ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="telefone">Telefone </label>
                                <input readonly type="text" class="form-control" id="telefone" value="<?= $resultado->telefone ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="origem">Origem </label>
                                <input readonly type="text" class="form-control" id="origem" value="<?= $resultado->origem ?>">
                            </div>
                            <div class="col-xs-12 col-sm-12 form-group">
                                <label for="mensagem">Mensagem </label>
                                <textarea readonly type="text" class="form-control" id="mensagem"><?= $resultado->mensagem ?></textarea>
                            </div>

                            <? if ($resultado->plano) { ?>
                                <div class="col-xs-12 col-sm-4 form-group">
                                    <label for="plano">Plano </label>
                                    <input readonly type="text" class="form-control" id="plano" value="<?= $resultado->plano ?>">
                                </div>
                            <? } ?>
                            <? if ($resultado->duracao) { ?>
                                <div class="col-xs-12 col-sm-4 form-group">
                                    <label for="duracao">Duração </label>
                                    <input readonly type="text" class="form-control" id="duracao" value="<?= $resultado->duracao ?>">
                                </div>
                            <? } ?>
                            <? if ($resultado->modeloAnuncio) { ?>
                                <div class="col-xs-12 col-sm-4 form-group">
                                    <label for="modeloAnuncio">Modelo do anúncio </label>
                                    <input readonly type="text" class="form-control" id="modeloAnuncio" value="<?= $resultado->modeloAnuncio ?>">
                                </div>
                            <? } ?>

                            <div class="form-group col-xs-12">
                                <a href="<?= PATHSITE ?>admin/<?= $tabela ?>">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                </a>
                            </div>
                        </div>
                    </div>



                </form>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>