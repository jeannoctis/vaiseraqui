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
                                <input readonly type="text" name="" class="form-control" id="titulo" value="<?= $resultado->nome ?>" placeholder="Escreva...">
                            </div>

                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="titulo">E-mail </label>
                                <input readonly type="text" name="" class="form-control" id="titulo" value="<?= $resultado->email ?>" placeholder="Escreva...">
                            </div>

                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="prefContato">Preferência de Contato </label>
                                <input readonly type="text" name="" class="form-control" id="prefContato" value="<?= $resultado->prefContato ?>" placeholder="Escreva...">
                            </div>

                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="titulo">Data do contato </label>
                                <input readonly type="text" name="" class="form-control" id="titulo" value="<?= formataDataHora($resultado->dtCriacao) ?>" placeholder="Escreva...">
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group">
                                <label for="titulo">Telefone </label>
                                <input readonly type="text" name="" class="form-control" id="telefone" value="<?= $resultado->telefone ?>" placeholder="Escreva...">
                            </div>

                            <div class="col-xs-12 col-sm-12 form-group">
                                <label for="titulo">Mensagem </label>
                                <textarea readonly type="text" name="" class="form-control" id="telefone" placeholder="Escreva..."><?= $resultado->mensagem ?></textarea>
                            </div>


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