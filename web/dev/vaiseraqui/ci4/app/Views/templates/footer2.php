
<script>
var PATHSITE = '<?=PATHSITE?>';
  var public_recaptcha = '<?=$configs->public_recaptcha?>';
</script>

<!--script src="https://kit.fontawesome.com/b04984a577.js" crossorigin="anonymous"></script-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=PATHSITE?>js-anunciante/plugins.js"></script>
<script type="text/javascript" src="<?=PATHSITE?>js-anunciante/jquery.mask.js"></script>
<script type="text/javascript" src="<?=PATHSITE?>js-anunciante/swiper-bundle.min.js"></script>
 <script src="<?=PATHSITE?>js-anunciante/lazyscript/lazyscript.min.js" type="text/javascript"></script>
<script src="<?=PATHSITE?>js-anunciante/sweetalert/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?=PATHSITE?>js-anunciante/scripts.js?v=1.0.8"></script>


<? if($sucessoCadastro){?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#avisoCadastro').modal('show');
    });
</script>
<? } ?>

<script>
 <?
  
  if($erroLogin){?>
   swal.fire("Ops,", "<?=$erroLogin?>", "error");
<?  } else if ($salvou) {
  ?>
  swal.fire("Sucesso", "<?=$sucesso ? $sucesso : "Salvo com sucesso!"?>", "success");

  <? } else if ($_POST) { ?>
  swal.fire("Ops,", "<?=$erro?>", "error");
  <?
                        }
  ?>
</script>

<? if($pagina == 10 && !$isLogado){ ?>
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
      console.log(response);
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
            window.location.href = "<?=PATHSITE?>meu-perfil";
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
  
<?}?>

</body>
</html>


