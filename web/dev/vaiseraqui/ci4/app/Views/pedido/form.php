<? switch ($resultado->envio) {
    case "ambos":
        $resultEnvio = "E-mail + Transportadora";
        break;
    case "sedex":
        $resultEnvio = "Transportadora";
        break;
    case "email":
        $resultEnvio = "E-mail";
        break;
} ?>

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="box-content card white">
                        <h4 class="box-title"><?= $title ?> - <?= str_pad($resultado->id, 6, 0, STR_PAD_LEFT) ?></h4>
                        <!-- /.box-title -->
                        <div class="card-content">

                            <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="statusSelect">Status</label>
                                    <select name="status" required class="form-control" id="statusSelect">

                                        <option <?= $resultado->status == 'AGUARDANDO' ? 'selected' : '' ?> value="AGUARDANDO">Aguardando</option>
                                        <option <?= $resultado->status == 'APROVADO' ? 'selected' : '' ?> value="APROVADO">Aprovado</option>
                                        <option <?= $resultado->status == 'PAGO' ? 'selected' : '' ?> value="PAGO">Pago</option>
                                        <option <?= $resultado->status == 'ENVIADO' ? 'selected' : '' ?> value="ENVIADO">Enviado</option>
                                        <option <?= $resultado->status == 'ENTREGUE' ? 'selected' : '' ?> value="ENTREGUE" class="text-success">Entregue</option>
                                        <option <?= $resultado->status == 'CANCELADO' ? 'selected' : '' ?> value="CANCELADO" class="text-danger">Cancelado</option>

                                    </select>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="projeto">Projeto </label>
                                    <input type="projeto" name="projeto" class="form-control" id="projeto" value="<?= $projeto->titulo ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="adicionais">Adicionais </label>
                                    <? foreach ($adicionais as $adicional) {
                                        $totalAdc += $adicional->info->valor; ?>
                                        <input type="text" name="adicional[]" class="form-control" id="adicional<?= $adicional->id ?>" value="<?= $adicional->info->titulo . ' - R$' . number_format($adicional->info->valor,2,',','.') ?> " placeholder="Escreva..." readonly>
                                    <? } ?>
                                </div>
                            </div>

                            <div class='form-group col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="totalAdc">Total de projetos adicionais</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="totalAdc" class="form-control" id="totalAdc" value="<?= number_format($totalAdc, 2, ",", ".") ?>" placeholder="Escreva..." readonly>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="totalCopias">Total em cópias</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="totalCopias" name="totalCopias" class="form-control" id="totalCopias" value="<?= number_format($resultado->valorImpressao, 2, ",", ".") ?>" placeholder="Escreva..." readonly>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="valorEnvio">Valor do envio</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="valorEnvio" class="form-control" id="valorEnvio" value="<?= number_format($resultado->valorEnvio, 2, ",", ".") ?>" placeholder="Escreva..." readonly>
                                    </div>
                                </div>
                            </div>

                            <?
                          
                            $totalTotal = $resultado->total + $totalAdc + $resultado->valorImpressao + $resultado->valorEnvio; ?>
                            <div class='form-group col-sm-6 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="total">Total</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-success text-white">R$</span>
                                        <input type="text" name="total" class="form-control" id="total" value="<?= number_format($totalTotal, 2, ",", ".") ?>" placeholder="Escreva..." readonly>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group col-sm-6 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="parcelas">Parcelas</label>
                                    <input type="number" name="parcelas" class="form-control" id="parcelas" value="<?= $resultado->parcelas ?>" placeholder="Escreva..." readonly>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-content card white">
                        <h4 class="box-title">
                            Informações do Comprador
                        </h4>
                        <div class="card-content">
                            <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="nome">Nome | Razão Social </label>
                                    <input type="text" name="nome" class="form-control" id="nome" value="<?= $cliente->nome . ' ' . $cliente->sobrenome ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="cpf">Documento </label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $cliente->cpf ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email">E-mail </label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $cliente->email ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                              <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email">Telefone </label>
                                    <input type="email" name="" class="form-control" id="email" value="<?= $cliente->telefone ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    

                    <div class="box-content card white">
                        <h4 class="box-title">
                            Entrega
                        </h4>
                        <div class="card-content">
                            
                             <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="nome">Nome  </label>
                                    <input type="text" name="nome" class="form-control" id="nome" value="<?= $resultado->nome ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="cpf">Documento </label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $resultado->cpf ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>

                            <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email">E-mail </label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $resultado->email ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                              <div class='form-group col-xs-12 col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="email">Telefone </label>
                                    <input type="email" name="" class="form-control" id="email" value="<?= $resultado->telefone ?> " placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            
                            <div class='form-group col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="envio2">Método de envio</label>
                                    <input type="text" name="envio2" class="form-control" id="envio2" value="<?= $resultEnvio ?> " placeholder="Escreva..." readonly>
                                    <input type="text" name="envio" value="<?= $resultado->envio ?>" hidden>
                                </div>
                            </div>
                            <div class='form-group col-lg-2 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="copias">Cópias</label>
                                    <input type="number" min="0" name="copias" class="form-control" id="copias" value="<?= $resultado->copias ?>" placeholder="Escreva..." readonly>
                                </div>
                            </div>
                            <div class='form-group col-lg-4 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="">Endereço completo </label>
                                    <input readonly type="text" class="form-control" id="" value="<?= $resultado->endereco ?>, <?= $resultado->numero ?> <?= $resultado->complemento ?> - <?= $resultado->cidade ?>/<?= $resultado->uf ?> - <?= $resultado->cep ?> " placeholder="Escreva...">
                                </div>
                            </div>                            
                            <div class='form-group col-lg-3 paddingZeroM'>
                                <div class="col-xs-12 col-sm-12">
                                    <label for="rastreio">Código de Rastreio </label>
                                    <input type="text" name="rastreio" class="form-control" id="rastreio" value="<?= trim($resultado->rastreio) ?> " placeholder="Escreva...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="box-content card white">
                        <h4 class="box-title">
                            Vídeo
                        </h4>
                        <div class="card-content">
                            
                        </div>
                    </div> -->

                    <div class="box-content card white">
                        <h4 class="box-title">
                            Salvar alterações?
                        </h4>
                        <div class="card-content">
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


        <script>
            function disablePreviousOptions() {
                const statusSelect = document.getElementById('statusSelect');
                const selectedIndex = statusSelect.selectedIndex;

                for (let i = 0; i < selectedIndex; i++) {
                    statusSelect.options[i].disabled = true;
                    statusSelect.options[i].style.color = "lightgray";
                }
            }

            window.onload = disablePreviousOptions();
        </script>