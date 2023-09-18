<style>
   @media screen and (max-width: 769px) {
      main {
         margin-bottom: 0;
      }
   }
</style>

<main>
   <div class="container-medium">
      <nav class="navigation-breadcrumb" data-aos="fade-up">
         <a href="<?= PATHSITE ?>">Início</a>
         <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
         </svg>
         <a href="<?= PATHSITE ?>busca?<?= $get['busca'] ?>">Buscando por: <?= $get['busca'] ?></a>
      </nav>
   </div>

   <header class="header-page" data-aos="fade-up">
      <div class="container-medium">
         <h1>Buscando por: <?= $get['busca'] ?></h1>
         <a href="<?= PATHSITE ?>" class="goback">
            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M5 1L1 5.5L5 10" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Voltar
         </a>
      </div>
   </header>

   <section class="s-last" data-aos="fade-up">
      <div class="container-medium">

         <div class="list busca-resultados">

            <? if ($buscaProduto) { ?>
               
               <? foreach($buscaProduto as $produto) { 
                  echo view("templates/cards/comum-card", (array)$produto);
               } ?>
               
            <? } ?>

            <? if ($buscaArtigo) { ?>
               
               <? foreach($buscaArtigo as $artigo) {
                  echo view("templates/blog-card", (array)$artigo);
               } ?>
               
            <? } ?>

            <? if (empty($buscaProduto) && empty($buscaArtigo)) { ?>
               <h2 class="no-results">
                  Sem resultados... Tente outra busca.
               </h2>
            <? } ?>

         </div>

      </div>
   </section>

</main>