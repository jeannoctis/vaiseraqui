<body>
    <section class="areaPerfil">
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <div class="marca">
                        <a href="<?=PATHSITE?>" class="logo">
                            <img src="<?=PATHSITE?>assets/images/logo.svg" title="Vai ser Aqui">
                        </a> 
                    </div>

                    <div class="boxPerfil row">
                        
                         <div class="col-12 col-md-6">
                                        <img class="img-fluid" src="<?=PATHSITE?>assets/images/capalogin.jpg" />
                                    </div>
                        <div class="col-12 col-md-5">
                        <h5>
                         Esqueci a 
                        </h5>
                        <h2>
                            Senha
                        </h2>

                        <form class="form-horizontal" method="post" >
                            <fieldset>
                                <div class="row">                                   
                                    <div class="col-12">
                                        <label>E-mail</label>
                                        <input required type="email" name="email" class="form-control" placeholder="ex: joao@gmail.com">
                                    </div>
                                   
                                    <div class="col-12">
                                         <h5 class="recaptcha-label">
               Este site é protegido por reCAPTCHA e Google 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/privacy">Política de Privacidade</a> e 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/terms">Termos de serviço </a>.
            </h5>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="form-control formsubmit" name="enviar" value="Enviar">
                                                Recuperar
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        <div class="linkPerfil">
                            <a href="<?=PATHSITE?>login">voltar</a>
                        </div>    
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </section>


