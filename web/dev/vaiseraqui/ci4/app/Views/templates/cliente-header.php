<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="icon" type="image/x-icon" href="<?= PATHSITE ?>assets/images/favicon.ico">

   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="<?= PATHSITE ?>assets-cliente/css/style.css">

   <title><?= $metatag->titulo ?> - <?= $configs->nome ?></title>
</head>

<? switch ($pagina) {
   case 7:
      $bodyClass = 'authentication';
      break;
   case 8:
      $bodyClass = 'authentication';
      break;
   case 9:
      $bodyClass = 'dashboard container-dasboard home';
      break;
   case 10:
      $bodyClass = 'my-data container-dasboard';
      break;
   case 11:
      $bodyClass = 'dashboard container-dasboard';
      break;
   case 12:
      $bodyClass = 'order-details container-dasboard';
      break;
   case 13:
      $bodyClass = 'view-project container-dasboard';
      break;
   case 14:
      $bodyClass = 'download-project special-gallery container-dasboard';
      break;
} ?>

<body class="<?= $bodyClass ?>">
   <!-- Login/Cadastro -->
   <? if ($pagina == 7 || $pagina == 8) { ?>
      <header class="header">

         <div class="content">
            <div class="logo-wraper">
               <img src="<?= PATHSITE ?>assets-cliente/images/logo.svg" alt="" class="logo">
               <h1>Área do Cliente</h1>
            </div>
            <a href="<?= PATHSITE ?>" class="btn-primary">Voltar para o site</a>
         </div>

         <div class="content only-mobile">
            <div class="logo-wraper">
               <img src="<?= PATHSITE ?>assets-cliente/images/logo.svg" alt="" class="logo">
            </div>

            <nav class="only-mobile islogged">
               <div class="wraper">

                  <div class="is-not-logged">
                     <h2>Olá! Faça seu <strong>Login</strong></h2>
                     <hr>
                  </div>

                  <div class="is-logged hide">
                     <h2>Bem-vindo novamente, <strong>Lucas Ferraiol!</strong></h2>
                     <hr>
                  </div>

                  <a class="j-button-scroll-section" href="#project">Projetos</a>
                  <a class="j-button-scroll-section" href="#about">Sobre nós</a>
                  <a class="j-button-scroll-section" href="#blog">Blog</a>
                  <a class="j-button-scroll-section" href="#contact">Contato</a>

               </div>
               <div class="footer">
                  <div class="is-not-logged">
                     <h3>Área do cliente</h3>
                     <a href="#" class="btn-primary">Área do Cliente</a>
                  </div>
                  <div class="is-logged hide">
                     <div class="title">
                        <h3>Área do cliente</h3>
                        <a href="#" class="btn-primary">
                           <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.0588 12.25V14.3333C10.0588 15.2538 9.32144 16 8.41176 16H2.64706C1.73741 16 1 15.2538 1 14.3333V2.66667C1 1.74619 1.73741 1 2.64706 1H8.41176C9.32144 1 10.0588 1.74619 10.0588 2.66667V5.21875M6.76471 8.5H15M15 8.5L12.9412 6.41667M15 8.5L12.9412 10.5833" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                           <span>Sair</span>
                        </a>
                     </div>
                     <a href="#">Meus Projetos</a>
                     <a href="#">Meus Dados</a>
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
   <? } else if ($pagina == 9 || $pagina == 10 || $pagina == 11 || $pagina == 12 || $pagina == 13 || $pagina == 14) { ?>
      <header class="sidebar-mobile">
         <div class="top">
            <div>
               <a class="logo" href="<?= PATHSITE ?>area-do-cliente/dashboard/">
                  <img src="<?= PATHSITE ?>assets-cliente/images/logo.svg" alt="logo Projeto Online Arq">
               </a>
               <h2>Área do Cliente</h2>
               <hr>
            </div>
            <nav>
               <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/" class="<?= $segments[1] == 'meus-projetos' ? 'active' : '' ?>">
                  <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M20 7.10667C20.0009 6.87172 19.9387 6.6407 19.8195 6.43699C19.7004 6.23329 19.5285 6.06414 19.3214 5.94667L10.5 1L1.67858 5.94667C1.47148 6.06414 1.29964 6.23329 1.18048 6.43699C1.06132 6.6407 0.999061 6.87172 1.00001 7.10667V25H9.14286L20 16.1067V7.10667Z" stroke="#607380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M25 12V25H9L25 12Z" stroke="#607380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  Meus Projetos
               </a>
               <a href="<?= PATHSITE ?>area-do-cliente/meus-dados/" class="<?= $segments[1] == 'meus-dados' ? 'active' : '' ?>">
                  <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M13.1464 14C13.061 13.9878 12.9512 13.9878 12.8537 14C10.7073 13.9267 9 12.1679 9 10.0061C9 7.79541 10.7805 6 13 6C15.2073 6 17 7.79541 17 10.0061C16.9878 12.1679 15.2927 13.9267 13.1464 14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M21 21.8073C18.8872 23.7936 16.086 25 13 25C9.91395 25 7.11276 23.7936 5 21.8073C5.11869 20.6618 5.83086 19.5407 7.10089 18.6634C10.3531 16.4455 15.6706 16.4455 18.8991 18.6634C20.1691 19.5407 20.8813 20.6618 21 21.8073Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M13 25C19.6274 25 25 19.6274 25 13C25 6.37258 19.6274 1 13 1C6.37258 1 1 6.37258 1 13C1 19.6274 6.37258 25 13 25Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  Meus Dados
               </a>
            </nav>
         </div>
         <div class="footer">
            <a href="<?= PATHSITE ?>area-do-cliente/logout/" class="btn-primary">
               <img src="<?= PATHSITE ?>assets-cliente/images/icon-logout.svg" alt=""> Sair
            </a>
            <a href="<?= PATHSITE ?>" class="btn-outline">Ir para o Site Principal</a>
         </div>
      </header>

      <header class="header only-mobile">
         <div class="content only-mobile">
            <div class="logo-wraper">
               <img src="<?= PATHSITE ?>assets-cliente/images/logo.svg" alt="logo Projeto Online Arq" class="logo">
            </div>
            <div class="menu">
               <span></span>
               <span></span>
               <span></span>
            </div>
         </div>
      </header>
   <? } ?>