<body>

    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <section class="areaPerfil">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="marca">
                        <a href="<?= PATHSITE ?>" class="logo">
                            <img src="<?= PATHSITE ?>assets/images/logo.svg" title="Vai ser aqui">
                        </a>
                    </div>

                    <div class="boxPerfil">
                        <h5>
                            Meu perfil
                        </h5>
                        <h1>
                            Novo cadastro
                        </h1>

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <label>Seu nome</label>
                                        <input required type="text" name="titulo" value="<?= $post["titulo"] ?>" class="form-control iconeName" placeholder="ex: João">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label>Sobrenome</label>
                                        <input type="text" name="sobrenome" value="<?= $post["sobrenome"] ?>" class="form-control" placeholder="ex: Da Silva">
                                    </div>

                                    <div class="col-12">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" value="<?= $post["telefone"] ?>" class="form-control iconeTelefone phone_with_ddd" placeholder="ex: (00) 9 9999-9999">
                                    </div>

                                    <div class="col-12">
                                        <label>Tenho interesse em</label>
                                    </div>

                                    <div class="col-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox ">
                                                Aluguel para temporada
                                                <input type="checkbox" id="campoTemporada" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectTemporada">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <? if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 1) { ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                                    <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox">
                                                Salões e áreas de lazer
                                                <input type="checkbox" id="campoSaloes" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectSaloes">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <?
                                            if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 2) {
                                            ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                            <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox ">
                                            Hospedagem
                                                <input type="checkbox" id="campoHospedagem" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectHospedagem">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <?
                                            if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 3) {
                                            ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                            <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox ">
                                                Lojas temporárias
                                                <input type="checkbox" id="campoTemporarias" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectTemporarias">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <?
                                            if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 4) {
                                            ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                            <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox ">
                                                Eventos
                                                <input type="checkbox" id="campoEventos" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectEventos">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <?
                                            if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 5) {
                                            ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                            <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-5">
                                        <div class="control-group">
                                            <label class="checkboxDefault control-checkbox ">
                                                Prestadores de serviços
                                                <input type="checkbox" id="campoServicos" />
                                                <div class="control_indicator control_indicator2"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <select name='interesse[]' disabled class="form-control" id="selectServicos">
                                            <option selected disabled>Subcategoria de interesse</option>
                                            <?
                                            if ($categorias) {
                                                foreach ($categorias as $cat) {
                                                    if ($cat->tipoFK == 6) {
                                            ?>
                                                        <option value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                            <? }
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label>E-mail</label>
                                        <input value="<?= $post["email"] ?>" type="email" name="email" class="form-control" placeholder="ex: joao@gmail.com">
                                    </div>
                                    <div class="col-12 posRelative">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control inputSenha" placeholder="senha com no mínimo 8 caracteres" autocomplete="on">
                                        <div class="iconeSenha" toggle=".inputSenha"></div>
                                    </div>
                                    <div class="col-12 posRelative">
                                        <label>Confirme sua senha</label>
                                        <input name="senha2" type="password" class="form-control inputSenha" placeholder="digite novamente a sua senha para confirmarmos" autocomplete="on">
                                        <div class="iconeSenha" toggle=".inputSenha"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="linkPerfil">
                                            Ao selecionar <b>Concordar e continuar</b> abaixo, concordo com os <br>
                                            <a target='_blank' href="<?= PATHSITE ?>politica-de-privacidade-e-termos-de-uso/">Termos de Uso e Política de privacidade</a> do Vai Ser Aqui.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="form-control formsubmit" name="enviar" value="Enviar">
                                            Concordar e continuar
                                        </button>
                                    </div>
                                </div>
                                <input type='hidden' name='g-recaptcha-response' id='g-recaptcha-response' />
                            </fieldset>
                        </form>

                        <div class="linkPerfil">
                            Já tem uma conta? <br>
                            <a href="<?= PATHSITE ?>login/">Entrar</a>
                        </div>

                        <div class="linhaPerfil">
                            <span>ou</span>
                            <hr>
                        </div>

                        <div id="g_id_onload" data-client_id="<?= $configs->chavegoogle ?>" data-context="signin" data-ux_mode="redirect" data-login_uri="<?= PATHSITE ?>cadastro/">
                        </div>


                        <div class="g_id_signin mb-3 ml-auto mr-auto text-center" data-type="standard" data-shape="rectangular" data-theme="outline" data-ux_mode="popup" data-text="$ {button.text}" data-size="large" data-width="250" data-logo_alignment="left" style="display: flex; justify-content: center;">
                        </div>

                        <a href="#" class="cta9" onclick='checkLoginState()'>
                            <img src="<?= PATHSITE ?>images/perfil_facebook.svg">
                            Fazer login com o Facebook
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 
        Para abrir o modal use seguinte código:
        data-toggle="modal" data-target="#avisoCadastro"
    -->

    <div id="avisoCadastro" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-body modalForm">
                    <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                    <div class="iconeModal">
                        <img src="<?= PATHSITE ?>images/perfil_festa.svg">
                    </div>

                    <h4>
                        Cadastro completado com sucesso!
                    </h4>
                    <p>
                        Boa! Agora você pode aproveitar nossa plataforma de maneira completa!
                    </p>
                    <a href="<?= PATHSITE ?>meu-perfil/" class="cta6">
                        Entrar
                    </a>

                </div>
            </div>
        </div>
    </div>



</body>

</html>


<style>
    .boxPerfil {
        max-height: unset;
    }
</style>

<?
echo View("templates/logins");
?>