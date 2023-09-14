<link rel="stylesheet" href="<?= PATHSITE ?>style.css?v=1.0.3">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="meuPerfil mt-5">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <h2 class="titulo2 mt-5 text-left">
                    Meu perfil
                </h2>
            </div>

            <div class="col-12 col-md-6">
                <div class="boxDados">
                    <div class="areaFoto">
                        <? if ($clienteLogado->arquivo) { ?>
                            <img src="<?= PATHSITE ?>uploads/cliente/<?= $clienteLogado->arquivo ?>" class="fotoDePerfil">
                        <? } else { ?>
                            <img src="<?= PATHSITE ?>assets/images/profile-pic.png" class='fotoDePerfil'>
                        <? } ?>

                        <form class="old-input" method="post" enctype="multipart/form-data">
                            <input accept="image/*" mudartexto="label-file" class="d-none files" id="file2" type="file" value="" name="arquivo">
                        </form>

                        <label for='file2'>
                            <div class="editarFoto">
                                <div class="editarFotoFechado">
                                    <img src="<?= PATHSITE ?>images/perfil_editar.svg">
                                </div>
                            </div>
                        </label>

                    </div>
                    <h3>
                        <?= $clienteLogado->nome ?> <?= $clienteLogado->sobrenome ?>
                    </h3>
                    <h6>
                        <?= $clienteLogado->cidade ?> - <?= $clienteLogado->estado ?>
                    </h6>

                    <div class="clearfix"></div>

                    <ul class="menuDados">
                        <li class="ativo" data-painel=".boxViewTab1">
                            Alterar dados cadastrais
                        </li>
                        <li data-painel=".boxViewTab2">
                            Favoritos
                        </li>
                        <li onclick="$('#avisoSair').modal('show');">
                            <img src="<?= PATHSITE ?>images/perfil_sair.svg"> Sair
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="boxView">
                    <div class="boxTabView boxViewTab1 ativo">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>
                                            Alterar dados cadastrais
                                        </h3>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Seu nome</label>
                                        <input type="text" name="titulo" class="form-control iconeName" placeholder="ex: João" value="<?= $clienteLogado->nome ?>">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Sobrenome</label>
                                        <input type="text" name="sobrenome" class="form-control" placeholder="ex: Da Silva" value="<?= $clienteLogado->sobrenome ?>">
                                    </div>

                                    <div class="col-12 ">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" value="<?= $clienteLogado->cidade ?>" class="form-control" placeholder="ex: Catanduva">
                                    </div>

                                    <div class="col-12 ">
                                        <label>Estado</label>
                                        <select name="estado" class="form-control">
                                            <option value="">Selecione seu estado</option>
                                            <? foreach ($estados as $estado) { ?>
                                                <option value="<?= $estado->sigla ?>">
                                                    <?= $estado->titulo ?>
                                                </option>
                                            <? } ?>
                                        </select>
                                        <input type="text" name="estado" value="<?= $clienteLogado->estado ?>" class="form-control" placeholder="ex: Catanduva">
                                    </div>

                                    <div class="col-12">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" class="form-control iconeTelefone phone_with_ddd" placeholder="ex: (00) 9 9999-9999" value="<?= $clienteLogado->telefone ?>">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Tenho interesse em:</label>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <select name='interesse[]' multiple="multiple" class="js-example-basic-multiple" style="width: 100%;">
                                            <option value="">selecione categorias</option>
                                            <? foreach ($tipos as $tipo) { ?>
                                                <optgroup label="<?= $tipo->titulo ?>">
                                                    <? foreach ($tipo->categorias as $categoria) { ?>
                                                        <option value="<?= $categoria->id ?>" <?= in_array($categoria->id, $interessesClienteIds) ? "selected" : "" ?>>
                                                            <?= $categoria->titulo ?>
                                                        </option>
                                                    <? } ?>
                                                </optgroup>
                                            <? } ?>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label>E-mail</label>
                                        <input type="email" name="" readonly class="form-control" placeholder="ex: joao@gmail.com" value="<?= $clienteLogado->email ?>">
                                    </div>

                                    <div class="col-12 posRelative">
                                        <label>Senha</label>
                                        <input type="password" class="form-control inputSenha" name="senha" placeholder="senha com no mínimo 8 caracteres" autocomplete="on" value="">
                                        <div class="iconeSenha" toggle=".inputSenha"></div>
                                    </div>

                                    <div class="col-12 posRelative">
                                        <label>Confirme sua senha</label>
                                        <input type="password" class="form-control inputSenha" name="senha2" placeholder="digite novamente a sua senha para confirmarmos" autocomplete="on" value="">
                                        <div class="iconeSenha" toggle=".inputSenha"></div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="form-control formsubmit" name="enviar" value="Enviar">
                                            Atualizar
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="boxTabView boxViewTab2">
                        <h3 class="fav-title">
                            Meus favoritos
                        </h3>
                        </form>

                        <div class="clearfix"></div>

                        <? if ($favoritos) { ?>
                            <div class="favoritos-container">
                                <? foreach ($favoritos as $ind => $fav) {
                                    switch ($fav->tipo_id) {
                                        case 1:
                                            echo view("templates/aluguel-para-temporada-card", (array)$fav);
                                            break;
                                        case 2:
                                            echo view("templates/aluguel-para-temporada-card", (array)$fav);
                                            break;
                                        case 3:
                                            echo view("templates/hospedagem-card", (array)$fav);
                                            break;
                                        case 5:
                                            echo view("templates/aluguel-para-temporada-card", (array)$fav);
                                            break;
                                        case 6:
                                            echo view("templates/aluguel-para-temporada-card", (array)$fav);
                                            break;
                                        case 7:
                                            echo view("templates/aluguel-para-temporada-card", (array)$fav);
                                            break;
                                    } ?>
                                <? } ?>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="margemTopo"></div>

<div id="avisoSair" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <div class="iconeModal">
                    <img src="<?= PATHSITE ?>images/perfil_atencao.svg">
                </div>

                <h4>
                    Tem certeza que deseja sair?
                </h4>
                <p>
                    Depois você poderá entrar novamente usando seus dados cadastrados!
                </p>
                <button style='cursor:pointer;' type='button' onclick="$('#avisoSair').modal('hide');" class="cta8 cta8b">
                    Cancelar
                </button>
                <a href="<?= PATHSITE ?>logout/" class="cta8">
                    Sair
                </a>

            </div>
        </div>
    </div>
</div>

<div id="avisoAlterado" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <div class="iconeModal">
                    <img src="<?= PATHSITE ?>images/perfil_alterado.svg">
                </div>

                <h4>
                    Dados alterados!
                </h4>
                <p>
                    Agora os usuários da nossa plataforma já vão ver seus dados atualizados! ;)
                </p>
                <a href="" class="cta6">
                    Eba!
                </a>

            </div>
        </div>
    </div>
</div>

<style>
    .meu-perfil .fav-title {
        color: #404041;
        font-size: 24px;
        font-weight: 700;
        line-height: 21px;
        letter-spacing: -0.72px;
    }

    .favoritos-container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .favoritos-container article {
        width: 547px;
    }
</style>