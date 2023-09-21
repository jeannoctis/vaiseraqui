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
                                    <input type="text" required  name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" required  name="email" class="form-control" id="email" value="<?= $resultado->email ?>" placeholder="Escreva...">
                                </div>
                            </div>
 
                            <div class='form-group col-xs-12 col-lg-12 paddingZeroM'>
                               <div class="col-xs-12 col-sm-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" required  name="telefone" class="form-control telefone" id="telefone" value="<?= $resultado->telefone ?>" placeholder="Escreva...">
                                </div>
                                 <div class="col-xs-12 col-sm-6">
                                    <label for="telefone2">Telefone 2</label>
                                    <input type="text" required  name="telefone2" class="form-control telefone" id="telefone2" value="<?= $resultado->telefone2 ?>" placeholder="Escreva...">
                                </div>
                                
                                 <div class="col-xs-12 col-sm-6">
                                    <label for="telefone3">Telefone 3</label>
                                    <input type="text" required  name="telefone3" class="form-control telefone" id="telefone3" value="<?= $resultado->telefone3 ?>" placeholder="Escreva...">
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
                                    <label for="senha">Senha</label>
                                    <input type="password"   name="senha" class="form-control" id="senha" value="" placeholder="Escreva...">
                                </div>
                            </div>



                            <div id='imagem' class="form-group col-xs-12 paddingZeroM mt-5   ">
                                <div class='col-xs-12'>
                                    <label for="arquivo">Imagem <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
                                    <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                                    <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                                        <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
                                        <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="form-group col-xs-12">
                                <div class="col-xs-12 col-sm-12">
                                    <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                                        <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                                    </a>
                                    <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>