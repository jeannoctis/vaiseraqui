<main>
   <form class="box" method="post" enctype="multipart/form-data" id="dadosForm">
      <h1>Meus dados</h1>
      <h2 class="subtitle">Dados da conta</h2>

      <div class="section">
         <div class="wraper-group">
            <div class="group-edit-input input-editable">
               <label for="email">E-mail
                  <button>
                     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0628 0.784088C16.0173 -0.261358 14.3224 -0.261367 13.2769 0.784088L11.778 2.28305L4.72308 9.3379C4.60871 9.4523 4.52759 9.59561 4.48836 9.75248L3.59602 13.3219C3.51999 13.626 3.60909 13.9477 3.83073 14.1692C4.05237 14.3909 4.37405 14.48 4.67815 14.404L8.24749 13.5117C8.40445 13.4724 8.54767 13.3913 8.66207 13.2769L15.6656 6.27338L17.2159 4.72309C18.2614 3.67765 18.2614 1.98263 17.2159 0.937188L17.0628 0.784088ZM14.5389 2.04605C14.8873 1.69757 15.4524 1.69757 15.8008 2.04605L15.9539 2.19915C16.3024 2.54764 16.3024 3.11265 15.9539 3.46113L15.0469 4.36822L13.6589 2.92601L14.5389 2.04605ZM12.3967 4.18821L13.7847 5.63041L7.57493 11.8402L5.68813 12.3119L6.15981 10.4251L12.3967 4.18821ZM1.78469 5.50718C1.78469 5.01436 2.18421 4.61483 2.67703 4.61483H7.13875C7.63159 4.61483 8.03109 4.21532 8.03109 3.72249C8.03109 3.22966 7.63159 2.83014 7.13875 2.83014H2.67703C1.19855 2.83014 0 4.0287 0 5.50718V15.323C0 16.8015 1.19855 18 2.67703 18H12.4928C13.9713 18 15.1698 16.8015 15.1698 15.323V10.8612C15.1698 10.3685 14.7703 9.96888 14.2775 9.96888C13.7847 9.96888 13.3852 10.3685 13.3852 10.8612V15.323C13.3852 15.8158 12.9857 16.2153 12.4928 16.2153H2.67703C2.18421 16.2153 1.78469 15.8158 1.78469 15.323V5.50718Z" fill="#333333" />
                     </svg>
                  </button>
               </label>
               <input disabled type="text" name="email" placeholder="Digite aqui" value="<?= $cliente->email ?>" required>
            </div>
            <div class="group-edit-input" id="changePwGroup">
               <label for="senha">Senha</label>
               <a href="#" data-change-pw-btn>Alterar senha</a>
               <input type="password" name="oldpassword" id="oldpassword" data-change-password class="hide" disabled placeholder="Senha ANTIGA" minlength="6">
               <input type="password" name="password" id="password" data-change-password class="" disabled placeholder="Senha NOVA" minlength="6">
               <input type="password" name="password2" id="password2" data-change-password class="" disabled placeholder="Repita a nova senha" minlength="6">
            </div>
         </div>
         <div class="wraper-group">
            <div class="group-edit-input" style="margin-bottom: 0;">
               <label>Foto de Pefil</label>
               <div class="form-profile">
                  <div class="img-cont">
                     <img src="<?= PATHSITE ?>uploads/cliente/<?= $cliente->arquivo ?>" width="64" height="64" alt="foto de perfil da conta" id="profilePic">
                  </div>
                  <div>
                     <label style="margin-bottom: 0;" class="btn-primary" for="arquivo">Selecionar arquivo</label>
                  </div>
                  <input class="profile-file" type="file" name="arquivo" id="arquivo">
                  <p class="profile-message">Nenhum arquivo selecionado</p>
               </div>
               <p>Tipos de formatos aceitos: PDF, JPG e PNG com no máximo 10mb.</p>
               <p>Proporção recomendada: 1 : 1</p>
            </div>
         </div>
      </div>

      <div class="section">
         <h2 class="subtitle">Dados pessoais</h2>
         <div class="wraper-group">
            <div class="group-edit-input input-editable">
               <label for="name" class="w90">Nome
                  <button>
                     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0628 0.784088C16.0173 -0.261358 14.3224 -0.261367 13.2769 0.784088L11.778 2.28305L4.72308 9.3379C4.60871 9.4523 4.52759 9.59561 4.48836 9.75248L3.59602 13.3219C3.51999 13.626 3.60909 13.9477 3.83073 14.1692C4.05237 14.3909 4.37405 14.48 4.67815 14.404L8.24749 13.5117C8.40445 13.4724 8.54767 13.3913 8.66207 13.2769L15.6656 6.27338L17.2159 4.72309C18.2614 3.67765 18.2614 1.98263 17.2159 0.937188L17.0628 0.784088ZM14.5389 2.04605C14.8873 1.69757 15.4524 1.69757 15.8008 2.04605L15.9539 2.19915C16.3024 2.54764 16.3024 3.11265 15.9539 3.46113L15.0469 4.36822L13.6589 2.92601L14.5389 2.04605ZM12.3967 4.18821L13.7847 5.63041L7.57493 11.8402L5.68813 12.3119L6.15981 10.4251L12.3967 4.18821ZM1.78469 5.50718C1.78469 5.01436 2.18421 4.61483 2.67703 4.61483H7.13875C7.63159 4.61483 8.03109 4.21532 8.03109 3.72249C8.03109 3.22966 7.63159 2.83014 7.13875 2.83014H2.67703C1.19855 2.83014 0 4.0287 0 5.50718V15.323C0 16.8015 1.19855 18 2.67703 18H12.4928C13.9713 18 15.1698 16.8015 15.1698 15.323V10.8612C15.1698 10.3685 14.7703 9.96888 14.2775 9.96888C13.7847 9.96888 13.3852 10.3685 13.3852 10.8612V15.323C13.3852 15.8158 12.9857 16.2153 12.4928 16.2153H2.67703C2.18421 16.2153 1.78469 15.8158 1.78469 15.323V5.50718Z" fill="#333333" />
                     </svg>
                  </button>
               </label>
               <input disabled type="text" name="nome" placeholder="Digite aqui" value="<?= $cliente->nome ?>" required>
            </div>
            <div class="group-edit-input input-editable">
               <label for="lastname" class="w130">Sobrenome
                  <button>
                     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0628 0.784088C16.0173 -0.261358 14.3224 -0.261367 13.2769 0.784088L11.778 2.28305L4.72308 9.3379C4.60871 9.4523 4.52759 9.59561 4.48836 9.75248L3.59602 13.3219C3.51999 13.626 3.60909 13.9477 3.83073 14.1692C4.05237 14.3909 4.37405 14.48 4.67815 14.404L8.24749 13.5117C8.40445 13.4724 8.54767 13.3913 8.66207 13.2769L15.6656 6.27338L17.2159 4.72309C18.2614 3.67765 18.2614 1.98263 17.2159 0.937188L17.0628 0.784088ZM14.5389 2.04605C14.8873 1.69757 15.4524 1.69757 15.8008 2.04605L15.9539 2.19915C16.3024 2.54764 16.3024 3.11265 15.9539 3.46113L15.0469 4.36822L13.6589 2.92601L14.5389 2.04605ZM12.3967 4.18821L13.7847 5.63041L7.57493 11.8402L5.68813 12.3119L6.15981 10.4251L12.3967 4.18821ZM1.78469 5.50718C1.78469 5.01436 2.18421 4.61483 2.67703 4.61483H7.13875C7.63159 4.61483 8.03109 4.21532 8.03109 3.72249C8.03109 3.22966 7.63159 2.83014 7.13875 2.83014H2.67703C1.19855 2.83014 0 4.0287 0 5.50718V15.323C0 16.8015 1.19855 18 2.67703 18H12.4928C13.9713 18 15.1698 16.8015 15.1698 15.323V10.8612C15.1698 10.3685 14.7703 9.96888 14.2775 9.96888C13.7847 9.96888 13.3852 10.3685 13.3852 10.8612V15.323C13.3852 15.8158 12.9857 16.2153 12.4928 16.2153H2.67703C2.18421 16.2153 1.78469 15.8158 1.78469 15.323V5.50718Z" fill="#333333" />
                     </svg>
                  </button>
               </label>
               <input disabled id="lastname" type="text" name="sobrenome" placeholder="Digite aqui" value="<?= $cliente->sobrenome ?>" required>
            </div>
         </div>
         <div class="wraper-group">
            <div class="group-edit-input input-editable">
               <label for="cpf" class="w90">CPF
                  <button>
                     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0628 0.784088C16.0173 -0.261358 14.3224 -0.261367 13.2769 0.784088L11.778 2.28305L4.72308 9.3379C4.60871 9.4523 4.52759 9.59561 4.48836 9.75248L3.59602 13.3219C3.51999 13.626 3.60909 13.9477 3.83073 14.1692C4.05237 14.3909 4.37405 14.48 4.67815 14.404L8.24749 13.5117C8.40445 13.4724 8.54767 13.3913 8.66207 13.2769L15.6656 6.27338L17.2159 4.72309C18.2614 3.67765 18.2614 1.98263 17.2159 0.937188L17.0628 0.784088ZM14.5389 2.04605C14.8873 1.69757 15.4524 1.69757 15.8008 2.04605L15.9539 2.19915C16.3024 2.54764 16.3024 3.11265 15.9539 3.46113L15.0469 4.36822L13.6589 2.92601L14.5389 2.04605ZM12.3967 4.18821L13.7847 5.63041L7.57493 11.8402L5.68813 12.3119L6.15981 10.4251L12.3967 4.18821ZM1.78469 5.50718C1.78469 5.01436 2.18421 4.61483 2.67703 4.61483H7.13875C7.63159 4.61483 8.03109 4.21532 8.03109 3.72249C8.03109 3.22966 7.63159 2.83014 7.13875 2.83014H2.67703C1.19855 2.83014 0 4.0287 0 5.50718V15.323C0 16.8015 1.19855 18 2.67703 18H12.4928C13.9713 18 15.1698 16.8015 15.1698 15.323V10.8612C15.1698 10.3685 14.7703 9.96888 14.2775 9.96888C13.7847 9.96888 13.3852 10.3685 13.3852 10.8612V15.323C13.3852 15.8158 12.9857 16.2153 12.4928 16.2153H2.67703C2.18421 16.2153 1.78469 15.8158 1.78469 15.323V5.50718Z" fill="#333333" />
                     </svg>
                  </button>
               </label>
               <input id="cpf" maxlength="15" class="cpf" disabled type="text" name="cpf" placeholder="Digite aqui" value="<?= $cliente->cpf ?>" required>
            </div>
            <div class="group-edit-input input-editable">
               <label for="tel" class="w130">Telefone
                  <button>
                     <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0628 0.784088C16.0173 -0.261358 14.3224 -0.261367 13.2769 0.784088L11.778 2.28305L4.72308 9.3379C4.60871 9.4523 4.52759 9.59561 4.48836 9.75248L3.59602 13.3219C3.51999 13.626 3.60909 13.9477 3.83073 14.1692C4.05237 14.3909 4.37405 14.48 4.67815 14.404L8.24749 13.5117C8.40445 13.4724 8.54767 13.3913 8.66207 13.2769L15.6656 6.27338L17.2159 4.72309C18.2614 3.67765 18.2614 1.98263 17.2159 0.937188L17.0628 0.784088ZM14.5389 2.04605C14.8873 1.69757 15.4524 1.69757 15.8008 2.04605L15.9539 2.19915C16.3024 2.54764 16.3024 3.11265 15.9539 3.46113L15.0469 4.36822L13.6589 2.92601L14.5389 2.04605ZM12.3967 4.18821L13.7847 5.63041L7.57493 11.8402L5.68813 12.3119L6.15981 10.4251L12.3967 4.18821ZM1.78469 5.50718C1.78469 5.01436 2.18421 4.61483 2.67703 4.61483H7.13875C7.63159 4.61483 8.03109 4.21532 8.03109 3.72249C8.03109 3.22966 7.63159 2.83014 7.13875 2.83014H2.67703C1.19855 2.83014 0 4.0287 0 5.50718V15.323C0 16.8015 1.19855 18 2.67703 18H12.4928C13.9713 18 15.1698 16.8015 15.1698 15.323V10.8612C15.1698 10.3685 14.7703 9.96888 14.2775 9.96888C13.7847 9.96888 13.3852 10.3685 13.3852 10.8612V15.323C13.3852 15.8158 12.9857 16.2153 12.4928 16.2153H2.67703C2.18421 16.2153 1.78469 15.8158 1.78469 15.323V5.50718Z" fill="#333333" />
                     </svg>
                  </button>
               </label>
               <input id="tel" disabled type="text" name="telefone" maxlength="16" class="phone" placeholder="Digite aqui" value="<?= $cliente->telefone ?>" required>
            </div>
         </div>
      </div>

      <input type="hidden" name="id" value="<?= $cliente->id ?>">
      <input type="hidden" name="dados" value="dados">
      <button class="btn-primary" type="submit">Atualizar</button>

      <!-- <h2 class="subtitle">Dados de Pagamento</h2> -->
      <!-- <? if ($clCartoes) {
         foreach ($clCartoes as $cartao) { ?>
            <div class="register-card">
               <button type="button" onclick="deleteCard('<?= encode($cartao->id) ?>')">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <circle cx="10" cy="10" r="9.5" stroke="#DF2626" />
                     <rect y="0.336113" width="9.09599" height="0.478736" rx="0.239368" transform="matrix(0.712094 0.702084 -0.712094 0.702084 7.17098 6.4556)" fill="#333333" stroke="#DF2626" stroke-width="0.478736" />
                     <rect x="0.340905" y="-5.70698e-08" width="9.09599" height="0.478736" rx="0.239368" transform="matrix(0.712094 -0.702084 0.712094 0.702084 6.34815 13.212)" fill="#333333" stroke="#DF2626" stroke-width="0.478736" />
                  </svg>
               </button>

               <div class="cardFlagIcon <?= $cartao->bandeira ?>">

               </div>

               <p>**** - **** - **** - <?= substr($cartao->numero, -4); ?></p>
            </div>
         <? }
            } ?> -->

      <!-- <a href="" class="add-method-payment j-open-modal">Adicionar novo método de pagamento</a> -->
   </form>
</main>

<div class="modal-container">
   <form class="modal" method="post" data-aos="fade-up">
      <h2>
         <span>Novo método de pagamento</span>
         <button class="close">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
               <rect y="0.702084" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 0.702084 -0.712094 0.702084 2.13642 0.463068)" fill="#333333" stroke="#333333" />
               <rect x="0.712094" y="-1.19209e-07" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 -0.702084 0.712094 0.702084 0.20526 16.6337)" fill="#333333" stroke="#333333" />
            </svg>
         </button>
      </h2>

      <div class="input-group">
         <label for="modal-number">Número do Cartão</label>
         <input type="text" name="numero" class="input-flag credi-card" id="modal-number" placeholder="ex. 0000 0000 0000 0000" required>
      </div>

      <div class="input-group">
         <label for="modal-name-of-card">Nome como está no cartão</label>
         <input type="text" name="nome" id="modal-name-of-card" placeholder="ex. MARIA E N SANTOS" required>
      </div>

      <div class="input-group">
         <label for="modal-cpf">CPF</label>
         <input type="text" name="cpf" class="cpf" maxlength="15" id="modal-cpf" placeholder="ex. 000.000.000-00" required>
      </div>

      <div class="wraper">
         <div class="input-group">
            <label for="modal-validate">Validade</label>
            <input type="text" class="credi-card-validate" maxlength="5" name="validade" id="modal-validate" placeholder="MM/AA" required>
         </div>
         <div class="input-group">
            <label for="modal-cvv">CVV</label>
            <div class="box-info">
               <input type="text" maxlength="3" name="cvv" id="cvv" placeholder="ex. 000" required>
               <button class="input-btn-info">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <circle cx="12" cy="12" r="12" fill="#CDCDCD" />
                     <path d="M10.604 13.084C10.604 12.804 10.648 12.556 10.736 12.34C10.832 12.124 10.948 11.932 11.084 11.764C11.228 11.596 11.38 11.44 11.54 11.296C11.7 11.152 11.848 11.016 11.984 10.888C12.128 10.752 12.244 10.612 12.332 10.468C12.428 10.324 12.476 10.164 12.476 9.988C12.476 9.7 12.356 9.468 12.116 9.292C11.884 9.116 11.572 9.028 11.18 9.028C10.804 9.028 10.468 9.108 10.172 9.268C9.876 9.42 9.632 9.636 9.44 9.916L7.988 9.064C8.308 8.576 8.752 8.188 9.32 7.9C9.888 7.604 10.576 7.456 11.384 7.456C11.984 7.456 12.512 7.544 12.968 7.72C13.424 7.888 13.78 8.136 14.036 8.464C14.3 8.792 14.432 9.196 14.432 9.676C14.432 9.988 14.384 10.264 14.288 10.504C14.192 10.744 14.068 10.952 13.916 11.128C13.764 11.304 13.6 11.468 13.424 11.62C13.256 11.772 13.096 11.92 12.944 12.064C12.792 12.208 12.664 12.36 12.56 12.52C12.464 12.68 12.416 12.868 12.416 13.084H10.604ZM11.516 16.096C11.18 16.096 10.904 15.988 10.688 15.772C10.472 15.556 10.364 15.3 10.364 15.004C10.364 14.7 10.472 14.448 10.688 14.248C10.904 14.04 11.18 13.936 11.516 13.936C11.86 13.936 12.136 14.04 12.344 14.248C12.56 14.448 12.668 14.7 12.668 15.004C12.668 15.3 12.56 15.556 12.344 15.772C12.136 15.988 11.86 16.096 11.516 16.096Z" fill="#545454" />
                  </svg>
               </button>
               <p class="message-input-info">CVV é o código de segurança que fica no verso do cartão.</p>
            </div>
         </div>
      </div>

      <input type="hidden" name="clienteFK" value="<?= $cliente->id ?>">
      <input type="hidden" name="bandeira" value="">
      <input type="hidden" name="metodoPagamento" value="metodoPagamento">
      <button type="submit" class="btn-primary">Adicionar</button>
   </form>
</div>

<script>
   const changePwGroup = document.querySelector("#changePwGroup")
   const changePwBtn = changePwGroup.querySelector("[data-change-pw-btn]")
   const pwInputs = changePwGroup.querySelectorAll("[data-change-password]")

   if (changePwBtn) {
   changePwBtn.addEventListener("click", (e) => {
      e.preventDefault();

      pwInputs.forEach(input => {
         input.disabled = !input.disabled
      })
   })
   }


   const dadosForm = document.querySelector("#dadosForm")
   const dadosFormSbBtn = dadosForm.querySelector("button[type=submit]")
   let disabledInputs

   if (dadosFormSbBtn) {
   dadosFormSbBtn.addEventListener("click", (e) => {
      disabledInputs = dadosForm.querySelectorAll("input:disabled");

         if (!uploadPic || disabledInputs.length == 8) {
         e.preventDefault();
         cSwal.fire('Ops', "Você não alterou nenhuma informação", "info")
      } else {
         dadosForm.submit();
      }
   })
   }

   const profilePic = document.querySelector("#profilePic")
   const inputFile = document.querySelector("#arquivo")

   inputFile.addEventListener("change", loadFile)

   function loadFile(e) {
      const file = e.target.files[0];
      if(!file) return
      profilePic.src = URL.createObjectURL(file);
      let uploadPic = true;
         }

   // function deleteCard(id) {
   //    cSwal.fire({
   //       title: 'Quer mesmo excluir esse cartão?',
   //       showDenyButton: true,
   //       showCancelButton: true,
   //       confirmButtonText: 'Excluir',
   //       denyButtonText: `Não excluir`,
   //    }).then(result => {
   //       if (result.isConfirmed) {
   //          $.post("<?= PATHSITE ?>utils/deleteCard", {
   //             id
   //          }, function(data) {
   //             response = jQuery.parseJSON(data)

   //             if (response.sucesso) {
   //                cSwal.fire("Pronto", response.sucesso, "success")
   //                setTimeout(() => {
   //                   location.reload();
   //                }, 1250);
   //             } else if (response.erro) {
   //                cSwal.fire("Ops", response.erro, "error")
   //             }
   //          })
   //       } else if (result.isDenied) {
   //          cSwal.fire("Exclusão cancelada", "", "info")
   //       }
   //    })


   // }
</script>