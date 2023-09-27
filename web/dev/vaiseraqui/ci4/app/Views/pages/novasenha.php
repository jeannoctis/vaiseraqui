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
                                            <label>Senha 1</label>
                                             <input required type="password" name="senha1" id="senha1" class='form-control' placeholder="Sua nova senha...">
                                        </div>
                                        <div class="col-12">
                                            <label>Senha 2</label>
                                            <input required type="password" name="senha2" id="senha2" class='form-control' placeholder="Sua nova senha...">
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="form-control formsubmit" name="" value="Enviar">
                                                Alterar
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>