<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-content card white">
                        <h4 class="box-title"><?= $title ?> - <?= $resultado->titulo ?></h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <div class='form-group col-xs-12 paddingZeroM'>
                                <div class="col-xs-12 col-sm-6">
                                    <label for="titulo">Nome</label>
                                    <input type="text" required  name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva..." readonly>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label for="sobrenome">E-mail</label>
                                    <input type="sobrenome" required  name="sobrenome" class="form-control" id="sobrenome" value="<?= $resultado->sobrenome ?>" placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-12 paddingZeroM'>
                               <div class="col-xs-12 col-sm-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" required  name="telefone" class="form-control telefone" id="telefone" value="<?= $resultado->telefone ?>" placeholder="Escreva..." readonly>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" required  name="email" class="form-control" id="email" value="<?= $resultado->email ?>" placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                            <div class='form-group col-xs-12 col-lg-12 paddingZeroM'>
                               <div class="col-xs-12 col-sm-6">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" required  name="cidade" class="form-control cidade" id="cidade" value="<?= $resultado->cidade ?>" placeholder="Escreva..." readonly>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label for="estado">Estado</label>
                                    <input type="estado" required  name="estado" class="form-control" id="estado" value="<?= $resultado->estado ?>" placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                            <div class="form-group col-xs-12 paddingZeroM mt-5   ">
                                <div class='col-xs-12'>
                                    <label for="arquivo">Imagem</label>
                                    <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" readonly>                                    
                                </div>
                            </div>
                            
                            <!-- Botões -->
                            <div class="form-group col-xs-12">
                                <div class="col-xs-12 col-sm-12">
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                    </a>
                                    <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1 hide">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>