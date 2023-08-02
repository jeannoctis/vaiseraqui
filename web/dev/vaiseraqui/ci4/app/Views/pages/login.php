<script src="https://accounts.google.com/gsi/client" async defer></script>

<main>
   <div class="content">
      <div class="wraper">
         <h2 data-aos="fade-up">Login</h2>

         <form action="#" method="post" data-aos="fade-up">
            <div class="input-group">
               <label for="email">E-mail</label>
               <input type="email" name="email" id="email" placeholder="Digite aqui">
            </div>
            <div class="input-group">
               <label for="senha">Senha</label>
               <div class="input">
                  <input type="password" name="senha" id="senha" placeholder="Digite aqui">
                  <button class="btn-change-password">
                     <svg class="eye-open" width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7189 8.50684C14.7189 10.2174 13.2802 11.5996 11.4997 11.5996C9.71929 11.5996 8.28052 10.2174 8.28052 8.50684C8.28052 6.79633 9.71929 5.41406 11.4997 5.41406C13.2802 5.41406 14.7189 6.79633 14.7189 8.50684Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.5 16C15.288 16 18.8183 14.1147 21.2757 10.852C22.2414 9.57403 22.2414 7.426 21.2757 6.14802C18.8183 2.88519 15.288 1 11.5 1C7.71205 1 4.18165 2.88519 1.72432 6.14802C0.758559 7.426 0.758559 9.57403 1.72432 10.852C4.18165 14.1147 7.71205 16 11.5 16Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                     <svg class="eye-close hide" width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7189 8.50684C14.7189 10.2174 13.2802 11.5996 11.4997 11.5996C9.71929 11.5996 8.28052 10.2174 8.28052 8.50684C8.28052 6.79633 9.71929 5.41406 11.4997 5.41406C13.2802 5.41406 14.7189 6.79633 14.7189 8.50684Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.5 16C15.288 16 18.8183 14.1147 21.2757 10.852C22.2414 9.57403 22.2414 7.426 21.2757 6.14802C18.8183 2.88519 15.288 1 11.5 1C7.71205 1 4.18165 2.88519 1.72432 6.14802C0.758559 7.426 0.758559 9.57403 1.72432 10.852C4.18165 14.1147 7.71205 16 11.5 16Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.3462 16.9869C19.2604 16.988 19.1754 16.9711 19.0966 16.9374C19.0177 16.9036 18.9468 16.8538 18.8885 16.7911L3.19615 1.12289C2.93462 0.861751 2.93462 0.456989 3.19615 0.195853C3.45769 -0.0652842 3.86308 -0.0652842 4.12462 0.195853L19.8038 15.8771C20.0654 16.1382 20.0654 16.543 19.8038 16.8041C19.6731 16.9347 19.5031 17 19.3462 17V16.9869Z" fill="#333333" />
                     </svg>
                  </button>
               </div>
            </div>
            <a href="<?=PATHSITE?>esqueci/" class="forget">Esqueceu a senha?</a>
            <button type="submit" class="btn-primary">Entrar</button>
         </form>

         <h3 class="social-login" data-aos="fade-up">
            <span class="separator"></span>
            <span>Ou entre com</span>
            <span class="separator"></span>
         </h3>
         <div class="wraper-button" data-aos="fade-up">
            <div class='ml-auto mr-auto text-center'>
                       <div  id="g_id_onload"
     data-client_id="<?=$configs->chavegoogle?>"
     data-context="signin"
     data-ux_mode="popup"
     data-login_uri="<?=PATHSITE?>cliente/loginGoogle"> 
</div>
                      </div>
                <div class='ml-auto mr-auto text-center'>
                    
      <div class="g_id_signin"
     data-type="standard" 
     data-shape="rectangular"
     data-theme="outline"
    data-ux_mode="popup" 
     data-text="continue_with"
     data-size="large"
data-width="222"
     data-logo_alignment="left">
</div>
    </div>   
             
            <a onclick="checkLoginState();" href="#" class="facebook">
               <img height="25" src="<?=PATHSITE?>assets-cliente/images/icon-facebook.svg" alt="">
               Facebook
            </a>
         </div>
         <p class="sign-up">Não tem conta? <a href="<?=PATHSITE?>area-do-cliente/cadastro-1/">Cadastre-se</a></p>
      </div>-
   </div>
   <div class="cover">
      <!-- <img src="<?=PATHSITE?>assets-cliente/images/cover.jpg" alt=""> -->
   </div>
</main>


<script src="<?= PATHSITE ?>assets/scripts/jquery/jquery.js"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script>

  function statusChangeCallback(response) {
   
    // Called with the results from FB.getLoginStatus().
     // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {
        // Not logged into your webpage or we are unable to tell.
      FB.login(function(response){
          testAPI();  
  // handle the response 
});   
    }
  }


  function checkLoginState() {     // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '934277650401754',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v13.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
    //  statusChangeCallback(response);        // Returns the login status.
    });
  };
 
  function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    FB.api('/me', {fields: 'name, email'}, function(response) {     
 
      $.post("<?=PATHSITE?>cliente/loginFacebook/", {titulo: response.name,email: response.email}, function(e) {
        dados = jQuery.parseJSON(e);
          if(dados.sucesso){
            window.location.href = dados.url;
          } else {
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: dados.erro
});
          }
    });
      
    });
  }
  
  function logout() {
    FB.logout(function(response) {
   // Person is now logged out
});
  }
</script>