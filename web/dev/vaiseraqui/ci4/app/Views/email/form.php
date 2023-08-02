<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-content card white">
                        <h4 class="box-title"><?= $title ?></h4>
                        <!-- /.box-title -->
                        <div class="card-content">

                            <div class="col-xs-12 col-sm-12 form-group">
                                <label for="titulo">Nome </label>
                                <input readonly type="text" name="" class="form-control" id="titulo" value="<?= $resultado->nome ?>" placeholder="Escreva...">
                            </div>

                            <div class="col-xs-12 col-sm-12 form-group">
                                <label for="titulo">E-mail(s) </label>
                                <input type="text" name="email" class="form-control tags-input mySingleFieldTags" id="titulo" value="<?= $resultado->email ?>" placeholder="Escreva...">
                            </div>


                            <div class="form-group col-xs-12">
                                <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $resultado->tipo ?>">
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