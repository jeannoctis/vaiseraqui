<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-content card white">
                        <h4 class="box-title"><?= getTipo($get['tipo']) ?> - Categoria: <?= $resultado->titulo ?></h4>
                        <!-- /.box-title -->
                        <div class="card-content">

                            <div class='col-xs-12 form-group'>
                                <label for="titulo">Nome</label>
                                <input type="text" required name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                            </div>

                            <? if ($get['tipo'] == 6) { ?>
                                <div class="col-xs-12 form-group">
                                    <label for="arquivo">Ícone <b>(Tamanho recomendado: 54 x 54 | 1:1 ) </b></label>
                                    <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" <?= !$resultado->arquivo ? 'required' : '' ?>>
                                </div>
                            <? } ?>

                            <!-- Botões -->
                            <div class="form-group col-xs-12">
                                <a href="<?= PATHSITE ?>admin/<?= $tabela ?>?tipo=<?= $get['tipo'] ?>">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                </a>
                                <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                            </div>

                        </div>
                    </div>

                </form>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>