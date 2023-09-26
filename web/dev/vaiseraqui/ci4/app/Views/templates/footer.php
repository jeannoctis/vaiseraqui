  <footer class="footer">
    <div class="container-medium">
      <div class="item">
        <img src="<?= PATHSITE ?>assets/images/logo-mobile.png" alt="" class="logo only-mobile">
        <img src="<?= PATHSITE ?>assets/images/logo-footer.png" alt="Logo" class="logo">
        <a href="<?= PATHSITE ?>planos/" class="btn-primary">Anuncie seu imóvel conosco</a>
      </div>
      <div class="item">
        <h2>Categorias</h2>
        <nav>
               <? foreach($tipos as $tipo) {?>
          <a href="<?= PATHSITE ?><?=$tipo->identificador2?>/"><?=$tipo->titulo?></a>      
               <? } ?>
        </nav>
      </div>
      <div class="item">
        <h2>Institucional</h2>
        <nav>
          <a href="<?= PATHSITE ?>sobre-nos/">Sobre nós</a>
          <a href="<?= PATHSITE ?>planos/">Planos</a>
          <a href="<?= PATHSITE ?>blog/">Blog</a>
          <a href="<?= PATHSITE ?>politica-de-privacidade-e-termos-de-uso/">Política de Privacidade e Termos de Uso</a>
          <a href="<?= PATHSITE ?>contato/">Contato</a>
        </nav>
      </div>
      <div class="item">
        <h2>Contato</h2>
        <nav>
          <a href="#">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5032 3.48779C18.2471 1.23984 15.2467 0.00131836 12.0502 0C5.4635 0 0.102885 5.33481 0.100235 11.8917C0.0993524 13.9878 0.649544 16.0339 1.69532 17.8374L0 24L6.33485 22.3462C8.08037 23.2938 10.0455 23.7932 12.0453 23.7938H12.0503C18.6363 23.7938 23.9975 18.4585 24 11.9013C24.0013 8.72344 22.7595 5.7356 20.5032 3.48779ZM12.0502 21.7853H12.0461C10.2639 21.7846 8.51604 21.3079 6.99087 20.4075L6.62835 20.1932L2.86915 21.1746L3.87253 17.527L3.6363 17.153C2.64204 15.5792 2.11701 13.7602 2.1179 11.8925C2.11996 6.44253 6.57565 2.00859 12.0542 2.00859C14.7071 2.00947 17.2009 3.03896 19.0761 4.90737C20.9513 6.77578 21.9834 9.25928 21.9825 11.9005C21.9801 17.3509 17.5247 21.7853 12.0502 21.7853ZM17.4982 14.3821C17.1997 14.2333 15.7317 13.5146 15.4579 13.4153C15.1844 13.3162 14.9851 13.2668 14.7863 13.5642C14.5871 13.8615 14.015 14.531 13.8407 14.7292C13.6665 14.9275 13.4925 14.9524 13.1938 14.8036C12.8952 14.6549 11.9332 14.341 10.7926 13.3286C9.90506 12.5407 9.30586 11.5676 9.13159 11.2702C8.95761 10.9726 9.13011 10.8272 9.26258 10.6638C9.58581 10.2643 9.90948 9.84551 10.009 9.64732C10.1086 9.44897 10.0587 9.27539 9.98396 9.12671C9.90948 8.97803 9.31233 7.51538 9.06359 6.92022C8.82102 6.34102 8.57507 6.41924 8.39167 6.41016C8.21769 6.40151 8.01855 6.39976 7.8194 6.39976C7.6204 6.39976 7.29688 6.47402 7.02311 6.77168C6.74948 7.06919 5.97822 7.78799 5.97822 9.25064C5.97822 10.7133 7.04813 12.1263 7.19738 12.3246C7.34663 12.523 9.30291 15.5244 12.2981 16.8114C13.0105 17.1179 13.5665 17.3005 14.0003 17.4375C14.7156 17.6637 15.3664 17.6317 15.8809 17.5553C16.4547 17.4699 17.6473 16.8363 17.8964 16.1423C18.1451 15.4481 18.1451 14.8532 18.0704 14.7292C17.9959 14.6052 17.7967 14.531 17.4982 14.3821Z" fill="#932327" />
            </svg>
            <?= $configs->whatsapp ?>
          </a>
          <a href="#">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M24.9993 18.9686V22.5816C25.0006 22.917 24.9318 23.249 24.7971 23.5563C24.6625 23.8636 24.465 24.1395 24.2174 24.3662C23.9698 24.593 23.6774 24.7656 23.359 24.873C23.0407 24.9805 22.7033 25.0204 22.3686 24.9902C18.6554 24.5875 15.0885 23.3212 11.9547 21.293C9.03906 19.4439 6.56712 16.9769 4.7144 14.067C2.67503 10.9252 1.40589 7.34809 1.00979 3.62554C0.979639 3.2925 1.0193 2.95685 1.12624 2.63995C1.23319 2.32305 1.40508 2.03185 1.63097 1.78488C1.85686 1.53791 2.1318 1.34059 2.43829 1.20548C2.74478 1.07037 3.0761 1.00043 3.41115 1.00012H7.03129C7.61692 0.994364 8.18466 1.20133 8.6287 1.58245C9.07273 1.96356 9.36276 2.49281 9.44472 3.07155C9.59752 4.22778 9.88089 5.36305 10.2894 6.4557C10.4518 6.88675 10.4869 7.35522 10.3907 7.8056C10.2944 8.25597 10.0708 8.66938 9.7464 8.99682L8.21387 10.5263C9.9317 13.5414 12.4331 16.0378 15.4542 17.7522L16.9867 16.2228C17.3148 15.899 17.729 15.6758 18.1803 15.5798C18.6315 15.4837 19.1009 15.5188 19.5328 15.6808C20.6277 16.0885 21.7652 16.3713 22.9237 16.5238C23.5099 16.6064 24.0452 16.901 24.4279 17.3518C24.8106 17.8026 25.0139 18.378 24.9993 18.9686Z" stroke="#932327" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?= $configs->telefone ?>
          </a>
          <a href="#">
            <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.6 2H25.4C26.83 2 28 3.125 28 4.5V19.5C28 20.875 26.83 22 25.4 22H4.6C3.17 22 2 20.875 2 19.5V4.5C2 3.125 3.17 2 4.6 2Z" stroke="#932327" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M28 4.30859L15 13.5395L2 4.30859" stroke="#932327" stroke-width="2.37838" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?= $configs->email ?>
          </a>
          <? if ($redes) {
            foreach ($redes as $rede) { ?>
              <a target="_blank" rel="me" href="<?= $rede->link ?>">
                <img src="<?=PATHSITE?>uploads/rede_social/<?=$rede->imagem?>" />
                <?= $rede->nome ?>
              </a>
          <? }
          } ?>
        </nav>
      </div>
    </div>
    <hr>
        <div class="uaau">
    <a href="https://www.uaau.digital/" target="_blank">
      <img src="<?= PATHSITE ?>assets/images/logo-footer-uaau.svg" alt="ícone Uaau Digital">
    </a>
        </div>
  </footer>

  <dialog class="dialog-not-logged">
    <div class="content">

      <span class="dialog-close">
        <img src="<?=PATHSITE?>assets/images/icon-close.svg" alt="icone fechar">
      </span>

      <img src="<?=PATHSITE?>assets/images/logo.png" alt="" class="dialog-logo">

      <h3>Você ainda não está logado...</h3>

      <p>Faça login ou cadastre-se para poder curtir e salvar os anúncios!</p>

      <div class="buttons-div">
        <a href="<?=PATHSITE?>login/">
          <button type="button">Área de login</button>
        </a>
        <a href="<?=PATHSITE?>cadastro/">
          <button type="button">Cadastre-se!</button>
        </a>
      </div>
    </div>
  </dialog>

  <!-- Cookies + WhatsApp -->
  <? if (!$_COOKIE['aceitou']) { ?>
    <div id="aviso-cookies" data-aos="fade-up">
      <p>
        Este site usa cookies para personalizar anúncios e melhorar a sua experiência no site. Ao continuar
        navegando, você concorda com a nossa <a href="<?= PATHSITE ?>politica-de-privacidade/">Política de
          Privacidade</a> e nossos <a href="<?= PATHSITE ?>termos-de-uso/">Termos de Uso</a>.
      </p>
      <input type="hidden" name="cookies" value="1">
      <button type="button" onclick='aceitaCookie()' type="submit" tabindex="0">
        <span>
          Continuar
        </span>
      </button>
    </div>
  <? } ?>
  <? if ($whatsapps) { ?>
    <div class="form-wpp">
      <div class="fw-header">
        <picture>
          <source srcset="<?= PATHSITE ?>uploads/whatsapp/<?= $whatsapps[0]->arquivo ?>.webp" type="image/webp">
          <img src="<?= PATHSITE ?>uploads/whatsapp/<?= $whatsapps[0]->arquivo ?>" />
        </picture>
        <span><?= $whatsapps[0]->titulo ?></span>
      </div>

      <div class="fw-content">

        <input type="text" name="nome" placeholder="Seu nome" required>
        <input type="text" name="telefone" placeholder="DDD + WhatsApp" required class="tel" maxlength="16">
        <input type="hidden" name="origem" value="whatsapp">

        <h5 class="recaptcha-label">
          Este site é protegido por reCAPTCHA e Google <br>
          <a rel="nofollow" target="_blank" href="https://policies.google.com/privacy">Política de Privacidade</a> e
          <a rel="nofollow" target="_blank" href="https://policies.google.com/terms">Termos de serviço </a>.
        </h5>

        <?
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");

        if ($iphone || $android || $palmpre || $ipod || $berry == true) {
          $usaApi = "api";
        } else {
          $usaApi = "web";
        }
        $removeChars = array("-", "(", ")", " ");

        $linkwhatsapp = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $whatsapps[0]->telefone);
        ?>

        <a href="<?= $linkwhatsapp ?>" target="_blank">
          <button onclick="contadorWhatsapp(<?= $whatsapps[0]->id ?>); cliqueWhatsapp(); startWpp()">
            Iniciar conversa no WhatsApp
        </button>
        </a>

                </div>
    </div>

    <? if (!$escondeWhatsapp) { ?>
    <button type="button" class="btn-whatsapp-float" onclick="toggleFormWpp();" data-aos="fade-down">
      <img src="<?= PATHSITE ?>assets/images/icon-whatsapp.svg" alt="icon whatsapp">
      Fale conosco
    </button>
          <? } ?>
  <? } ?>

  <script>
    var public_recaptcha = "<?= $configs->public_recaptcha ?>";
    var PATHSITE = '<?= PATHSITE ?>';
    var PAGINA_VISITADA = '<?= $_SERVER['PATH_INFO'] ?>';
    var pagina = '<?= $pagina ?>';
  </script>

  <!-- Fixos -->
  <script src="<?= PATHSITE ?>assets/scripts/jquery/jquery.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/lazyscript.min.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/aos/aos.js"></script>

  <?= view("templates/script-group", $script_list) ?>
  <? if ($pagina == 21) { ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
      });
      var valorTabPerfil;
      $('ul.menuDados li').click(function() {
        valorTabPerfil = $(this).data('painel');
        $(".boxTabView").removeClass('ativo');
        $(valorTabPerfil).addClass('ativo');
        $('ul.menuDados li').removeClass('ativo');
        $(this).addClass('ativo');
      });
    </script>

  <? } ?>

  <!-- Fixos -->
  <script src="<?= PATHSITE ?>assets/scripts/header.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/form-filter.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/select.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/menu-mobile.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/sweetalert2/swal2.min.js"></script>
  <script src="<?= PATHSITE ?>assets/scripts/script.js?v=1.0.0"></script>

  <!-- Scripts Individuais -->
  <?= view("templates/script-individual") ?>

  <script>
    AOS.init({
      once: true,
      duration: 1000
    });

    const shareButton = document.querySelector("a.share");
    if (shareButton) {
      const titulo = shareButton.dataset.title
      const url = window.location.href
      shareButton.addEventListener("click", async () => {
        try {
          await navigator.share({
            title: titulo,
            url: url
          });
          console.log("Data was shared successfully");
        } catch (err) {
          console.error("Share failed:", err.message);
        }
      });
    }
    const cSwal = Swal.mixin({
      confirmButtonColor: "#932327",
      customClass: {
        popup: 'custom-swal-font',
      }
    })
    <? if ($erro) { ?>
      cSwal.fire({
        title: "Ops,",
        text: "<?= $erro ?>",
        icon: "error",
      });
    <? } else if ($sucesso) { ?>
      enviarContato();
      cSwal.fire({
        title: "Obrigado",
        text: "<?= $sucesso ?>",
        icon: "success",
      });
    <? } ?>

    function enviarContato() {
      <?
      if ($analytics[4]) {
        echo $analytics[4]->codigo;
      }
      ?>
    }

    function cliqueWhatsapp() {
      <?
      if ($analytics[3]) {
        echo $analytics[3]->codigo;
      }
      ?>
    }

    function favoritar (produtoFK) {
      const isLogado = '<?= $isLogado ?>';

      if(!isLogado) {
        showLoginModal()
        return
      }
      
      $.post(PATHSITE + "cliente/favoritar", {
        produtoFK
      }, function (data) {        
        const heartIcon = document.querySelector(`[data-id-heart='${produtoFK}']`)
        heartIcon.classList.toggle("active")
      });
    }

    function showLoginModal(){
      const modal = document.querySelector(".dialog-not-logged")
      modal.showModal();
    }

    document.querySelectorAll(".dialog-close").forEach(btn => {
      btn.addEventListener("click", (ev) => {
        ev.target.closest("dialog").close()
      })
    })
  </script>
  
  <script>
      <? if($pagina == 1) {?>
      carregaDestaques(<?=$destaqueEmAlta->id?>,0);
      carregaDestaques(<?=$destaqueEmAlta2->id?>,1);
      <? } ?>
   </script>
  
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"  crossorigin=""></script>

  <? if ($coordenadas) {
    echo View('templates/coordenadas');
  } ?>

</body>

</html>