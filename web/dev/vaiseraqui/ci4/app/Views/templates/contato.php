<div class="contact" id="contact" data-aos="fade-up">
   <div class="content">
      <div class="group-title">
         <h2>Contato</h2>
         <h3><?= $txContato->titulo ?></h3>
         <p><?= $txContato->descricao ?></p>
      </div>
      <form action="#" method="post">
         <div class="input-group">
            <label for="nome">Nome</label>
            <input required type="text" name="nome" id="nome" placeholder="ex. Maria Eduarda">
         </div>
         <div class="input-group">
            <label for="email">E-mail</label>
            <input required type="email" name="email" id="email" placeholder="ex. mariaeduarda@gmail.com">
         </div>
         <div class="input-group">
            <label for="telefone">Telefone</label>
            <input required type="text" maxlength="16" class="phone" name="telefone" id="telefone" placeholder="ex. (44) 9 9999-9999">
         </div>
         <div class="input-group">
            <label for="phone">Preferência de Contato</label>
            <div class="wraper">
               <label><input type="radio" required name="prefContato" value="whatsapp"> <span>Whatsapp</span></label>
               <label><input type="radio" required name="prefContato" value="ligacao"> <span>Ligação</span></label>
               <label><input type="radio" required name="prefContato" value="email"> <span>E-mail</span></label>
            </div>
         </div>
         <div class="input-group full">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" required id="mensagem" placeholder="Digite sua mensagem aqui"></textarea>
         </div>
         <div class="wraper-button">
            <h5 class="recaptcha-label">
               Este site é protegido por reCAPTCHA e Google 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/privacy">Política de Privacidade</a> e 
               <a rel="nofollow" target="_blank" href="https://policies.google.com/terms">Termos de serviço </a>.
            </h5>
            <button name="enviar" type="submit" class="btn-primary">Enviar</button>
         </div>

         <input type="hidden" name="enviar" value="enviar">
         <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response" value="">
      </form>
   </div>
</div>