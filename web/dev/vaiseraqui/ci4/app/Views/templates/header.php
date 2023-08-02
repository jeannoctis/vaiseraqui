<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="icon" type="image/x-icon" href="<?= PATHSITE ?>assets/images/favicon.ico">

   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

   <? if ($pagina == 5) { ?>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
   <? } ?>
   <link rel="stylesheet" href="<?= PATHSITE ?>assets/css/style.css">

   <title><?= $metatag->titulo ?> - <?= $configs->nome ?></title>
     <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body class="<?=$bodyClass?>">
   <header class="header">
      <div class="content">
         <a href="<?= PATHSITE ?>"><img src="<?= PATHSITE ?>assets/images/logo.svg" alt="logo"></a>
         <nav>
            <a href="<?= PATHSITE ?>projetos/">Projetos</a>
            <a href="<?= PATHSITE ?>sobre-nos/">Sobre nós</a>
            <a href="<?= PATHSITE ?>blog/">Blog</a>
            <a href="<?= PATHSITE ?>contato/">Contato</a>
            <a href="<?= PATHSITE ?>area-do-cliente/dashboard/" class="btn-primary">Área do Cliente</a>
         </nav>
         
         <nav class="only-mobile islogged">
            <div class="wraper">
               
               <div class="is-not-logged">
                  <h2>Olá! Faça seu <strong>Login</strong></h2>
                  <hr>
               </div>
               
               <a class="j-button-scroll-section" href="<?= PATHSITE ?>#project">Projetos</a>
               <a class="j-button-scroll-section" href="<?= PATHSITE ?>#about">Sobre nós</a>
               <a class="j-button-scroll-section" href="<?= PATHSITE ?>#blog">Blog</a>
               <a class="j-button-scroll-section" href="<?= PATHSITE ?>#contact">Contato</a>

            </div>

            <div class="footer">
               <div class="is-not-logged">
                  <h3>Área do cliente</h3>
                  <a href="<?= PATHSITE ?>#" class="btn-primary">Área do Cliente</a>
               </div>               
            </div>

         </nav>
         <div class="menu">
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </header>