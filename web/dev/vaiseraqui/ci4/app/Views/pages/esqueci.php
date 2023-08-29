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
                            <a href="<?=PATHSITE?>esqueci/anunciante">Esqueci a senha</a>
                        </div>    
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </section>


<div class="contact" id="contact" data-aos="fade-up">
   <div class="content">
      <div class="group-title">
         <h2>Esqueci a senha</h2>
         <h3>Digite seu e-mail para recuperar a sua senha</h3>
      </div>
      <form action="#" method="post">
         <div style="width: 100%;" class="input-group">
            <label for="email">E-mail</label>
            <input required type="email" name="email" id="email" placeholder="ex. mariaeduarda@gmail.com">
         </div>
         
         <div style="width: 100%;" class="wraper-button w-100">
            <h5 class="recaptcha-label">
               Este site é protegido por reCAPTCHA e Google 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/privacy">Política de Privacidade</a> e 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/terms">Termos de serviço </a>.
            </h5>
            <button name="" type="submit" class="btn-primary">Enviar</button>
         </div>

         <input type="hidden" name="" value="enviar">
         <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response" value="">
      </form>
   </div>
</div>