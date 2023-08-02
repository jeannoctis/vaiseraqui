<main>
   <section class="s-blog">
      <div class="content">
         <div class="header-top" data-aos="fade-down">
            <h2>Blog</h2>
            <h1><?= $txBlog->titulo ?></h1>
            <p><?= $txBlog->descricao ?></p>
            <form action="" method="get" id="blogFilter">
               <div class="input-group">
                  <div class="input">
                     <input type="text" placeholder="Procure o artigo por palavra-chave" name="procura" value="<?= $get['procura'] ?? '' ?>">
                     <button type="submit" class="search" id="searchBtn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7.125 13.25C10.5077 13.25 13.25 10.5077 13.25 7.125C13.25 3.74226 10.5077 1 7.125 1C3.74226 1 1 3.74226 1 7.125C1 10.5077 3.74226 13.25 7.125 13.25Z" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                           <path d="M15 15L11.5 11.5" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                     </button>
                  </div>
               </div>
               <div class="input-group">
                  <select class="js-example-basic-single select2-customize" name="categoria" data-cat-select id="select2">
                     <option value="">Selecione a categoria</option>
                     <? foreach ($BCategorias as $categoria) { ?>
                        <option <?= $get['categoria'] == $categoria->id ? 'selected' : '' ?> value="<?= $categoria->id ?>">
                           <?= $categoria->titulo ?>
                        </option>
                     <? } ?>
                  </select>
               </div>
            </form>
         </div>

         <? if ($artigos) { ?>
            <div class="wraper-posts" data-aos="fade-up">
               <? foreach ($artigos as $artigo) { ?>
                  <?= view("templates/artigo-card", (array)$artigo) ?>
               <? } ?>
            </div>
         <? } ?>

         <nav class="navigation-pages" data-aos="fade-up">
            <?= $pager->links('blog') ?>
         </nav>
         
      </div>
   </section>
</main>