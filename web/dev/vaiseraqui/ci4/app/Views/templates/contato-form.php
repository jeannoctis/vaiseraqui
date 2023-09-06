<section class="s-contact" id="contato">
   <div class="container-medium">
      <div class="cover" data-aos="fade-right">
         <img src="<?= PATHSITE ?>uploads/texto/<?= $arquivo ?>" alt="Barraca de acampamento">
      </div>
      <form method="post" class="form" data-aos="fade-left">
         <h2><?= $titulo ?></h2>
         <div class="input-group">
            <label for="name">Seu nome</label>
            <input type="text" name="name" id="name" placeholder="ex: João" class="username">
         </div>
         <div class="wraper-input-group-2">
            <div class="input-group">
               <label for="email">E-mail</label>
               <input type="email" name="email" id="email" placeholder="ex: joao@gmail.com" class="email">
            </div>
            <div class="input-group">
               <label for="tel">Telefone</label>
               <input type="text" name="tel" id="tel" placeholder="ex: (00) 9 9999-9999" maxlength="16" class="tel">
            </div>
         </div>
         <div class="input-group-prefer">
            <label for="contact">Preferência de Contato</label>
            <div class="wraper">
               <label><input type="radio" name="prefer-contact" value="whatsapp"> Whatsapp</label>
               <label><input type="radio" name="prefer-contact" value="call"> Ligação</label>
               <label><input type="radio" name="prefer-contact" value="email"> E-mail</label>
            </div>
         </div>
         <div class="input-group">
            <label for="message">Mensagem</label>
            <textarea name="message" id="message" placeholder="Escreva aqui sua mensagem"></textarea>
         </div>
         <input type="hidden" name="origem" value="<?= $origem ?>">
         <button type="submit">Enviar</button>
      </form>
   </div>
</section>