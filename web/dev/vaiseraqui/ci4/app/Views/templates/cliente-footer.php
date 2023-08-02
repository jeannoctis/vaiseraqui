<footer class="footer">
   <div class="content">
      <div class="item">
         <img class="logo" src="<?= PATHSITE ?>assets-cliente/images/logo-white.svg" alt="">
         <? if ($redes) { ?>
         <nav class="social">
               <? foreach ($redes as $rede) { ?>
                  <a href="<?= $rede->link ?>" target="_blank">
                     <img src="<?= PATHSITE ?>uploads/rede_social/<?= $rede->imagem ?>" alt="ícone <?= $rede->nome ?>">
                  </a>
               <? } ?>
         </nav>
         <? } ?>
         <a href="<?= PATHSITE ?>area-do-cliente/dashboard/" class="btn-primary">Área do Cliente</a>
      </div>
      <div class="item">
         <h3>Institucional</h3>
         <ul>
            <li><a href="<?= PATHSITE ?>sobre-nos/">Sobre nós</a></li>
            <? if ($depoimentos) { ?>
               <li><a href="<?= PATHSITE ?>#depoimentos" class="j-button-scroll-section">Depoimentos</a></li>
            <? } ?>
            <? if ($faqs) { ?>
               <li><a href="<?= PATHSITE ?>#faq" class="j-button-scroll-section">FAQ</a></li>
            <? } ?>
            <li><a href="<?= PATHSITE ?>contato/">Contato</a></li>
         </ul>
      </div>
      <div class="item">
         <h3>Nossos projetos</h3>
         <ul>
            <li><a href="<?= PATHSITE ?>projetos/#maisrecentes" class="j-button-scroll-section">Projetos recentes</a></li>
            <li><a href="<?= PATHSITE ?>projetos/#maisrelevantes" class="j-button-scroll-section">Mais vendidos</a></li>
         </ul>
      </div>
      <div class="item">
         <h3>Conteúdos</h3>
         <ul>
            <li><a href="<?= PATHSITE ?>blog/">Blog</a></li>
         </ul>
      </div>
   </div>
   <div class="footer-bottom">
      <img src="<?= PATHSITE ?>assets-cliente/images/uaau-white-footer.svg" alt="logo Uaau Digital">
   </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<? if ($pagina == 7) { ?>
   <!-- LOGIN -->
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/change-password-visibility.js"></script>
<? } else if ($pagina == 8) { ?>
   <!-- CADASTRO 1 -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/change-password-visibility.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-cpf.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-telefone.js"></script>

   <script>
      const inputsCpf = document.querySelectorAll('input.cpf');
      inputsCpf.forEach(cpfInput => {
         cpfInput.addEventListener('input', function(e) {
            cpfInput.value = cpf(e.target.value)
         })
      })

      const inputsTelefone = document.querySelectorAll('input.phone');
      inputsTelefone.forEach(tel => {
         tel.addEventListener('input', function(e) {
            tel.value = telefone(e.target.value)
         })
      })
   </script>
<? } else if ($pagina == 9) { ?>
   <!-- Dashboard -->
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/card-link.js"></script>
<? } else if ($pagina == 10) { ?>
   <!-- Meus dados -->
   <script src="<?= PATHSITE ?>assets/scripts/jquery/jquery.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/change-password-visibility.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-cpf.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-telefone.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-cartao.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/mask-validate-card.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/verify-flag.js"></script>
   <script>
      (function() {
         // Has a new photo in Profile
         const inputProfile = document.querySelector('.profile-file');
         const profileMessage = document.querySelector('.profile-message');
         inputProfile.addEventListener('input', function() {
            profileMessage.innerHTML = 'Arquivo selecionado!!';
            profileMessage.classList.add("added");
         })

         // Change inputs to editable
         const inputsEditables = document.querySelectorAll('.input-editable')
         inputsEditables.forEach(editables => {
            const button = editables.querySelector('button')
            const input = editables.querySelector('input')

            button.addEventListener('click', function(e) {
               e.preventDefault();
               input.disabled = !input.disabled
            })
         })

         // Mask CPF
         const inputCpfs = document.querySelectorAll('input.cpf');
         inputCpfs.forEach(input => {
            input.addEventListener('input', function(e) {
               input.value = cpf(e.target.value)
            })
         })

         // Mask Phone      
         const inputTelefone = document.querySelector('input.phone');
         inputTelefone.addEventListener('input', function(e) {
            inputTelefone.value = telefone(e.target.value)
         })

         // Mask Credit Card
         const inputCreditCard = document.querySelector('input.credi-card');
         const inputBandeira = document.querySelector('input[name=bandeira]');
         inputCreditCard.addEventListener('input', function(e) {
            inputCreditCard.value = cartao(e.target.value)

            let hasFlag = verifyFlag(e.target.value)

            if (hasFlag) {

               switch (hasFlag) {
                  case 'visa':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('visa')
                     inputBandeira.value = 'visa'
                     break
                  case 'mastercard':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('mastercard')
                     inputBandeira.value = 'mastercard'
                     break
                  case 'diners':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('diners')
                     inputBandeira.value = 'diners'
                     break
                  case 'amex':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('amex')
                     inputBandeira.value = 'amex'
                     break
                  case 'discover':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('discover')
                     inputBandeira.value = 'discover'
                     break
                  case 'hipercard':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('hipercard')
                     inputBandeira.value = 'hipercard'
                     break
                  case 'elo':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('elo')
                     inputBandeira.value = 'elo'
                     break
                  case 'jcb':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('jcb')
                     inputBandeira.value = 'jcb'
                     break
                  case 'aura':
                     inputCreditCard.className = 'input-flag credi-card'
                     inputCreditCard.classList.add('aura')
                     inputBandeira.value = 'aura'
                     break
               }
            } else {
               inputBandeira.value = 'geral'
            }
         })
         
         // Mask Credit Card
         const inputCreditCardValidate = document.querySelector('input.credi-card-validate');
         inputCreditCardValidate.addEventListener('input', function(e) {
            inputCreditCardValidate.value = validateCard(e.target.value)
         })

         // Open Modal only desktop
         function openModal() {
            if (btnOpenModal) {
            btnOpenModal.addEventListener('click', function(e) {
               e.preventDefault()
               modalContainer.classList.add('show');
            })
         }

         }

         const btnOpenModal = document.querySelector('.j-open-modal')
         window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
               openModal()
            }
         })

         if (window.innerWidth > 768) {
            openModal()
         }

         // Close Modal
         const modalContainer = document.querySelector('.modal-container')
         const btnModalClose = document.querySelector('.modal .close')

         btnModalClose.addEventListener('click', function(e) {
            e.preventDefault()
            modalContainer.classList.remove('show');
         })

      })()
   </script>
<? } else if ($pagina == 11) { ?>
   <!-- Meus Projetos -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/card-link.js"></script>
<? } else if ($pagina == 12) { ?>
   <!-- Detalhes do pedido -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/verify-flag.js"></script>

   <script>
      let crrCard = "<?= $pdAtual->pagamento->numero ?>";
      console.log()

      const cardFlag = document.querySelector("#cardFlag");
      cardFlag.innerHTML = verifyFlag(crrCard);
   </script>
<? } else if ($pagina == 13) { ?>
   <!-- Visualizar meu Projeto -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/gallery.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/custom-swiper.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>

   <script>
      new CustomSwiper('blueSwiper', 1, 10)
      new CustomSwiper('tourVirtual', 1, 10)

      const titleTable = document.querySelector('.table-list .title')
      titleTable.addEventListener('click', (e) => {
         e.preventDefault()
         titleTable.parentElement.classList.toggle('open')
      })
   </script>
<? } else if ($pagina == 14) { ?>
   <!-- Baixar Projeto -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/active-header-when-scroll.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/menu-mobile-members.js"></script>
   <script src="<?= PATHSITE ?>assets-cliente/scripts/gallery.js"></script>
<? } ?>
<script>
   AOS.init({
      duration: 1000,
      once: true
   });
   const cSwal = Swal.mixin({
      confirmButtonColor: "#7191A7",
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
      cSwal.fire({
         title: "Pronto",
         text: "<?= $sucesso ?>",
         icon: "success",
      });
   <? } ?>
</script>
</body>