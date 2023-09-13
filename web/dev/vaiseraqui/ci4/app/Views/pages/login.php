<script src="https://accounts.google.com/gsi/client" async defer></script>

<style>
    .g_id_signin iframe {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>

<body>
    <section class="areaPerfil">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="marca">
                        <a href="<?= PATHSITE ?>" class="logo">
                            <img src="<?= PATHSITE ?>assets/images/logo.svg" title="Vai ser Aqui">
                        </a>
                    </div>

                    <div class="boxPerfil row">

                        <div class="col-12 col-md-6">
                            <img class="img-fluid" src="<?= PATHSITE ?>assets/images/capalogin.jpg" />
                        </div>
                        <div class="col-12 col-md-5">
                            <h5>
                                Meu Perfil
                            </h5>
                            <h2>
                                Login
                            </h2>

                            <form class="form-horizontal" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <label>E-mail</label>
                                            <input required type="email" name="email" class="form-control" placeholder="ex: joao@gmail.com">
                                        </div>
                                        <div class="col-12">
                                            <label>Senha</label>
                                            <input required type="password" name="senha" class="form-control" placeholder="senha ">
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="form-control formsubmit" name="enviar" value="Enviar">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                            <div class="linkPerfil">
                                <a href="<?= PATHSITE ?>esqueci/anunciante">Esqueci a senha</a>
                            </div>
                            <div class="linkPerfil">
                                Não tem uma conta? <a href="<?= PATHSITE ?>cadastro/">Cadastre-se</a>
                            </div>

                            <div class='ml-auto mr-auto text-center'>
                                <div id="g_id_onload" data-client_id="<?= $configs->chavegoogle ?>" data-context="signin" data-ux_mode="redirect" data-login_uri="<?= PATHSITE ?>cadastro/">
                                </div>
                            </div>

                            <div class='ml-auto mr-auto text-center'>

                                <div class="g_id_signin mb-3 ml-auto mr-auto text-center" data-type="standard" data-shape="rectangular" data-theme="outline" data-ux_mode="popup" data-text="$ {button.text}" data-size="large" data-width="285" data-logo_alignment="left">
                                </div>
                            </div>

                            <a style='width: 285px;' onclick="checkLoginState();" href="#" class="cta9 mr-auto ml-auto">
                                <img src="<?= PATHSITE ?>images/perfil_facebook.svg">
                                Fazer login com o Facebook
                            </a>

                            <div id="status">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?
    echo View("templates/logins");
    ?>