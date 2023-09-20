<section class="s-contact" id="contato">
   <div class="container-medium">
      <div class="cover" data-aos="fade-right">
         <picture>
            <source srcset="<?= PATHSITE ?>uploads/texto/<?= $arquivo ?>.webp" type="image/webp">
            <img src="<?= PATHSITE ?>uploads/texto/<?= $arquivo ?>" alt="banner formulário de contato">
         </picture>
      </div>
      <form method="post" class="form" data-aos="fade-left">
         <h2><?= $titulo ?></h2>
         <div class="input-group">
            <label for="nome">Seu nome</label>
            <input type="text" name="nome" id="nome" placeholder="ex: João" class="username">
         </div>
         <div class="wraper-input-group-2">
            <div class="input-group">
               <label for="email">E-mail</label>
               <input type="email" name="email" id="email" placeholder="ex: joao@gmail.com" class="email">
            </div>
            <div class="input-group">
               <label for="telefone">Telefone</label>
               <input type="text" name="telefone" id="telefone" placeholder="ex: (00) 9 9999-9999" maxlength="16" class="tel">
            </div>
         </div>
         <div class="input-group-prefer">
            <label for="contact">Preferência de Contato</label>
            <div class="wraper">
               <label><input type="radio" name="prefContato" value="whatsapp"> Whatsapp</label>
               <label><input type="radio" name="prefContato" value="ligacao"> Ligação</label>
               <label><input type="radio" name="prefContato" value="email"> E-mail</label>
            </div>
         </div>
         <div class="input-group">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" placeholder="Escreva aqui sua mensagem"></textarea>
         </div>
         <input type="hidden" name="origem" value="<?= $origem ?>">
         <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response" value="">
         <input type="hidden" name="enviar" value="enviar">

         <button type="submit">Enviar</button>
      </form>
   </div>
</section>