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
                           Área do anunciante
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
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </section>