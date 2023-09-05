<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="<?=PATHSITE?>assets/css/style.css">
   <title><?= $metatag->titulo ?> - <?= $configs->nome ?></title>
   <meta name="description" content="<?=$metatag->description?>">
 

</head>

<body class="<?=$bodyClass?>">

  <header class="header">
    <div class="container">
      <div class="menu-mobile">
        <button class="menu-mobile-button">
          <span></span>
          <span></span>
          <span></span>
        </button>        
      </div>      
      <a href="<?=PATHSITE?>">
        <img src="<?=PATHSITE?>assets/images/logo.png" alt="Logo" class="logo">
      </a>
      <form action="#" class="">
        <input type="text" name="search" placeholder="O que você está procurando?">
        <button type="submit"><img src="assets/images/icon-search.svg" alt=""></button>
      </form>
      <div class="header-modal-filter">
        <button class="j-btn-modal-filter">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="12" fill="#932327"/>
            <path d="M18 18L15.1046 15.1046M15.1046 15.1046C16.0697 14.1394 16.6667 12.8061 16.6667 11.3333C16.6667 8.38781 14.2789 6 11.3333 6C8.38781 6 6 8.38781 6 11.3333C6 14.2789 8.38781 16.6667 11.3333 16.6667C12.8061 16.6667 14.1394 16.0697 15.1046 15.1046Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>            
          <span class="name">O que você está procurando?</span>
          <div class="dropdown">
            <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L5.5 5L10 1" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
            <svg class="active" width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 5L5.5 1L1 5" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </div>
        </button>
        <div class="header-modal-filter-content j-filter-modal-container">
          <nav class="presentation-form-menu">
            <a href="#" class="active" data-form="form1">   
              <img src="assets/images/icon-tab-1-active-mobile.svg" alt="" class="isActive">
              <img src="assets/images/icon-tab-1-inactive-mobile.svg" alt="">                                  
              Aluguel para <br>
              temporada
            </a>
            <a href="#" data-form="form2">
              <svg class="isActive" width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="8.5" y="1.5" width="5" height="1" rx="0.5" fill="#BBBBBB" stroke="white"/>
                <rect x="10.5" y="2.5" width="2" height="1" rx="0.5" transform="rotate(-90 10.5 2.5)" fill="#BBBBBB" stroke="white"/>
                <path d="M11 2C8.67313 3.00927 4 6.98624 4 13.1764C4 19.3666 11.3879 23.8675 9.83656 22.8583" stroke="white" stroke-width="1.2"/>
                <path d="M11 2C13.1053 3.00276 18 6.95405 18 13.1043C18 19.2545 10.5964 23.8654 12 22.8626" stroke="white" stroke-width="1.2"/>
                <path d="M4 5.42351C4.68293 6.12936 7.00488 7.62576 10.8293 7.96456C14.6537 8.30337 17.2033 6.12936 18 5" stroke="white" stroke-width="1.2"/>
                <path d="M1 11C1 11 4.53333 13 10.6667 13C16.8 13 21 11 21 11" stroke="white" stroke-width="1.2"/>
                <path d="M1 15.6154C1 15.6154 5.13333 19 11 19C16.8667 19 20.1111 16.0256 21 15" stroke="white" stroke-width="1.2"/>
                <circle cx="11" cy="13" r="10.4" stroke="white" stroke-width="1.2"/>
                <path d="M11 3V23" stroke="white" stroke-width="1.2"/>
              </svg>
              <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="8.5" y="1.5" width="5" height="1" rx="0.5" fill="#BBBBBB" stroke="#808080"/>
                <rect x="10.5" y="2.5" width="2" height="1" rx="0.5" transform="rotate(-90 10.5 2.5)" fill="#BBBBBB" stroke="#808080"/>
                <path d="M11 2C8.67313 3.00927 4 6.98624 4 13.1764C4 19.3666 11.3879 23.8675 9.83656 22.8583" stroke="#808080" stroke-width="1.2"/>
                <path d="M11 2C13.1053 3.00276 18 6.95405 18 13.1043C18 19.2545 10.5964 23.8654 12 22.8626" stroke="#808080" stroke-width="1.2"/>
                <path d="M4 5.42351C4.68293 6.12936 7.00488 7.62576 10.8293 7.96456C14.6537 8.30337 17.2033 6.12936 18 5" stroke="#808080" stroke-width="1.2"/>
                <path d="M1 11C1 11 4.53333 13 10.6667 13C16.8 13 21 11 21 11" stroke="#808080" stroke-width="1.2"/>
                <path d="M1 15.6154C1 15.6154 5.13333 19 11 19C16.8667 19 20.1111 16.0256 21 15" stroke="#808080" stroke-width="1.2"/>
                <circle cx="11" cy="13" r="10.4" stroke="#808080" stroke-width="1.2"/>
                <path d="M11 3V23" stroke="#808080" stroke-width="1.2"/>
              </svg>                                                          
              Salões de Festa e <br>
              Áreas de Lazer
            </a>
            <a href="#" data-form="form3">
              <svg class="isActive" width="29" height="26" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.25 12.25V21.8125C3.25 22.875 3.91667 25 6.58333 25C9.25 25 18.8056 25 23.25 25C24.0833 25 25.75 24.3625 25.75 21.8125C25.75 19.2625 25.75 14.6406 25.75 12.6484" stroke="white" stroke-width="1.2"/>
                <path d="M10.7648 25V19.1667C10.6335 18.6111 11.3951 17.5 12.3406 17.5C13.2862 17.5 15.6236 17.5 16.6741 17.5C17.1994 17.5 18.25 17.8333 18.25 19.1667C18.25 20.5 18.25 23.6111 18.25 25" stroke="white" stroke-width="1.2"/>
                <path d="M4.26593 1H24.1965C24.6118 1 25.5253 1.17143 25.8574 1.85714C26.1896 2.54286 27.3799 6.14286 27.9335 7.85714C28.2104 9.57143 27.7675 13 23.7813 13C19.7952 13 18.7987 9 18.7987 7C18.9371 8.85714 18.3004 12.5714 14.6465 12.5714C10.9925 12.5714 10.079 8.85714 10.079 7C10.079 8.85714 8.99945 12.5714 4.68115 12.5714C0.944164 12.1429 0.528943 9.14286 1.35938 7C2.02374 5.28571 3.02019 2.85714 3.43537 1.85714C3.57382 1.57143 3.93376 1 4.26593 1Z" stroke="white" stroke-width="1.2" stroke-linejoin="round"/>
              </svg> 
              <svg width="29" height="26" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.25 12.25V21.8125C3.25 22.875 3.91667 25 6.58333 25C9.25 25 18.8056 25 23.25 25C24.0833 25 25.75 24.3625 25.75 21.8125C25.75 19.2625 25.75 14.6406 25.75 12.6484" stroke="#808080" stroke-width="1.2"/>
                <path d="M10.7648 25V19.1667C10.6335 18.6111 11.3951 17.5 12.3406 17.5C13.2862 17.5 15.6236 17.5 16.6741 17.5C17.1994 17.5 18.25 17.8333 18.25 19.1667C18.25 20.5 18.25 23.6111 18.25 25" stroke="#808080" stroke-width="1.2"/>
                <path d="M4.26593 1H24.1965C24.6118 1 25.5253 1.17143 25.8574 1.85714C26.1896 2.54286 27.3799 6.14286 27.9335 7.85714C28.2104 9.57143 27.7675 13 23.7813 13C19.7952 13 18.7987 9 18.7987 7C18.9371 8.85714 18.3004 12.5714 14.6465 12.5714C10.9925 12.5714 10.079 8.85714 10.079 7C10.079 8.85714 8.99945 12.5714 4.68115 12.5714C0.944164 12.1429 0.528943 9.14286 1.35938 7C2.02374 5.28571 3.02019 2.85714 3.43537 1.85714C3.57382 1.57143 3.93376 1 4.26593 1Z" stroke="#808080" stroke-width="1.2" stroke-linejoin="round"/>
              </svg>                                                                                 
              Lojas Temporárias
            </a>
            <a href="#" data-form="form4">
              <svg class="isActive" width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 11.6367H2.5" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M19.75 11.2605C19.5714 8.79919 17.8036 3.8296 12.1607 3.64147C6.51786 3.45335 4.86905 8.89325 4.75 11.6367" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M8.11864 20.0075H14.5901C14.9552 19.961 15.6853 19.6175 15.6853 18.6148C15.6853 17.6121 14.9552 17.2067 14.5901 17.1293H10.309C9.87756 16.5104 8.31776 15.2725 5.53004 15.2725C2.74232 15.2725 1.34846 16.6961 0.999999 17.4079V23.9997H12.4496C13.0469 23.9843 14.6001 23.7583 16.0338 22.9785C17.4675 22.1986 22.1734 19.5897 24.3471 18.3827C24.7786 18.1661 25.4324 17.4357 24.5961 16.2473C23.9589 15.3932 23.0031 15.551 22.6048 15.7367L15.8844 18.6148" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <rect width="1.5" height="2.18182" transform="matrix(-1 0 0 1 13 1.4541)" fill="white"/>
                <rect width="4.5" height="2.18182" rx="1.09091" transform="matrix(-1 0 0 1 14.5 0)" fill="white"/>
              </svg>                            
              <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 11.6367H2.5" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M19.75 11.2605C19.5714 8.79919 17.8036 3.8296 12.1607 3.64147C6.51786 3.45335 4.86905 8.89325 4.75 11.6367" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M8.11864 20.0075H14.5901C14.9552 19.961 15.6853 19.6175 15.6853 18.6148C15.6853 17.6121 14.9552 17.2067 14.5901 17.1293H10.309C9.87756 16.5104 8.31776 15.2725 5.53004 15.2725C2.74232 15.2725 1.34846 16.6961 0.999999 17.4079V23.9997H12.4496C13.0469 23.9843 14.6001 23.7583 16.0338 22.9785C17.4675 22.1986 22.1734 19.5897 24.3471 18.3827C24.7786 18.1661 25.4324 17.4357 24.5961 16.2473C23.9589 15.3932 23.0031 15.551 22.6048 15.7367L15.8844 18.6148" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <rect width="1.5" height="2.18182" transform="matrix(-1 0 0 1 13 1.4541)" fill="#808080"/>
                <rect width="4.5" height="2.18182" rx="1.09091" transform="matrix(-1 0 0 1 14.5 0)" fill="#808080"/>
              </svg>                
              Prestadores de <br>
              Serviços
            </a>
            <a href="#" data-form="form5">
              <svg class="isActive" width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.55 18.4375C1.31 18.4375 1 19.2125 1 19.6V24.6375C1 25.2575 1.51667 25.4125 1.775 25.4125H2.9375C3.5575 25.4125 3.97083 25.1542 4.1 25.025L6.0375 23.0875H26.575L28.5125 25.025C28.8225 25.335 29.4167 25.4125 29.675 25.4125H30.8375C31.7675 25.4125 32 24.8958 32 24.6375V19.6C32 18.67 30.9667 18.4375 30.45 18.4375H2.55Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.5498 17.7183V15.0611C2.5498 14.3968 2.70268 13.4004 4.84296 13.4004C6.98324 13.4004 21.2772 13.4004 28.1566 13.4004C29.6855 13.4004 30.4498 13.5332 30.4498 15.3933C30.4498 17.2533 30.4498 17.9397 30.4498 18.0504" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.1626 1V18.4375" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M30.8374 1V18.4375" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.1626 4.09961H30.8376" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.5874 13.0123V9.9123C7.5874 9.39564 7.9749 8.3623 9.5249 8.3623C11.0749 8.3623 13.5291 8.3623 14.5624 8.3623C15.2082 8.3623 16.4999 8.6723 16.4999 9.9123C16.4999 11.1523 16.4999 12.4956 16.4999 13.0123" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 13.0123V9.9123C16.5 9.39564 16.8875 8.3623 18.4375 8.3623C19.9875 8.3623 22.4417 8.3623 23.475 8.3623C24.1208 8.3623 25.4125 8.6723 25.4125 9.9123C25.4125 11.1523 25.4125 12.4956 25.4125 13.0123" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>                
              <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.55 18.4375C1.31 18.4375 1 19.2125 1 19.6V24.6375C1 25.2575 1.51667 25.4125 1.775 25.4125H2.9375C3.5575 25.4125 3.97083 25.1542 4.1 25.025L6.0375 23.0875H26.575L28.5125 25.025C28.8225 25.335 29.4167 25.4125 29.675 25.4125H30.8375C31.7675 25.4125 32 24.8958 32 24.6375V19.6C32 18.67 30.9667 18.4375 30.45 18.4375H2.55Z" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.5498 17.7183V15.0611C2.5498 14.3968 2.70268 13.4004 4.84296 13.4004C6.98324 13.4004 21.2772 13.4004 28.1566 13.4004C29.6855 13.4004 30.4498 13.5332 30.4498 15.3933C30.4498 17.2533 30.4498 17.9397 30.4498 18.0504" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.1626 1V18.4375" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M30.8374 1V18.4375" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.1626 4.09961H30.8376" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.5874 13.0123V9.9123C7.5874 9.39564 7.9749 8.3623 9.5249 8.3623C11.0749 8.3623 13.5291 8.3623 14.5624 8.3623C15.2082 8.3623 16.4999 8.6723 16.4999 9.9123C16.4999 11.1523 16.4999 12.4956 16.4999 13.0123" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 13.0123V9.9123C16.5 9.39564 16.8875 8.3623 18.4375 8.3623C19.9875 8.3623 22.4417 8.3623 23.475 8.3623C24.1208 8.3623 25.4125 8.6723 25.4125 9.9123C25.4125 11.1523 25.4125 12.4956 25.4125 13.0123" stroke="#808080" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>                              
              Hospedagem
            </a>
            <a href="#" data-form="form6">
              <svg class="isActive" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5425 0.599747L13.6807 0.735743L24 11.3848L22.8932 12.5673L21.4723 11.1012L21.4731 22.3415C21.4731 23.2155 20.8289 23.932 20.0118 23.995L19.8942 24H4.10578C3.27373 24 2.59167 23.3233 2.53089 22.4651L2.52694 22.3415L2.52615 11.102L1.10677 12.5673L0 11.3848L10.3083 0.746522C11.1869 -0.195491 12.6039 -0.247733 13.5425 0.599747ZM11.5011 1.84693L11.4253 1.91907L4.10499 9.47259L4.10578 22.3415L8.0521 22.3407L8.05289 14.0492C8.05289 13.1751 8.69706 12.4587 9.51411 12.3948L9.63173 12.3907H14.3683C15.2003 12.3907 15.8824 13.0673 15.9432 13.9256L15.9471 14.0492L15.9463 22.3407L19.8942 22.3415L19.8934 9.47176L12.5526 1.89585C12.2652 1.59981 11.8169 1.58156 11.5011 1.84693ZM14.3683 14.0492H9.63173L9.63095 22.3407H14.3675L14.3683 14.0492Z" fill="white"/>
              </svg>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5425 0.599747L13.6807 0.735743L24 11.3848L22.8932 12.5673L21.4723 11.1012L21.4731 22.3415C21.4731 23.2155 20.8289 23.932 20.0118 23.995L19.8942 24H4.10578C3.27373 24 2.59167 23.3233 2.53089 22.4651L2.52694 22.3415L2.52615 11.102L1.10677 12.5673L0 11.3848L10.3083 0.746522C11.1869 -0.195491 12.6039 -0.247733 13.5425 0.599747ZM11.5011 1.84693L11.4253 1.91907L4.10499 9.47259L4.10578 22.3415L8.0521 22.3407L8.05289 14.0492C8.05289 13.1751 8.69706 12.4587 9.51411 12.3948L9.63173 12.3907H14.3683C15.2003 12.3907 15.8824 13.0673 15.9432 13.9256L15.9471 14.0492L15.9463 22.3407L19.8942 22.3415L19.8934 9.47176L12.5526 1.89585C12.2652 1.59981 11.8169 1.58156 11.5011 1.84693ZM14.3683 14.0492H9.63173L9.63095 22.3407H14.3675L14.3683 14.0492Z" fill="#808080"/>
              </svg>              
              Imobiliárias e <br>
              Corretores
            </a>
            <a href="#" data-form="form7">
              <svg class="isActive" width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0542 24.7431C8.93376 25.1555 7.84436 24.0661 8.25681 22.9456L11.9346 12.9545C12.2876 11.9955 13.5158 11.7256 14.2383 12.4481L20.5517 18.7615C21.2743 19.4841 21.0044 20.7123 20.0454 21.0653L10.0542 24.7431Z" stroke="white" stroke-width="1.2"/>
                <path d="M16.9829 9.49146C18.2612 7.75665 19.9412 3.62961 16.4351 1" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M20.5439 11.4084C21.9135 11.4997 24.8171 10.8606 25.4745 7.57355C26.2962 3.46478 26.8441 1.27344 30.6789 1.27344" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M23.5571 15.7908C25.018 14.5125 28.8164 12.9969 32.3225 17.1604" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                <circle cx="27.3916" cy="19.9004" r="1.09567" fill="white"/>
                <circle cx="13.1479" cy="5.65622" r="1.09567" fill="white"/>
                <path d="M18.0789 21.5438L11.5049 14.9697" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
              </svg>                
              <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0542 24.7431C8.93376 25.1555 7.84436 24.0661 8.25681 22.9456L11.9346 12.9545C12.2876 11.9955 13.5158 11.7256 14.2383 12.4481L20.5517 18.7615C21.2743 19.4841 21.0044 20.7123 20.0454 21.0653L10.0542 24.7431Z" stroke="#808080" stroke-width="1.2"/>
                <path d="M16.9829 9.49146C18.2612 7.75665 19.9412 3.62961 16.4351 1" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M20.5439 11.4084C21.9135 11.4997 24.8171 10.8606 25.4745 7.57355C26.2962 3.46478 26.8441 1.27344 30.6789 1.27344" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <path d="M23.5571 15.7908C25.018 14.5125 28.8164 12.9969 32.3225 17.1604" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
                <circle cx="27.3916" cy="19.9004" r="1.09567" fill="#808080"/>
                <circle cx="13.1479" cy="5.65622" r="1.09567" fill="#808080"/>
                <path d="M18.0789 21.5438L11.5049 14.9697" stroke="#808080" stroke-width="1.2" stroke-linecap="round"/>
              </svg>                
              Eventos
            </a>
          </nav>
          
          <div class="presentation-form-content">
            <form class="form1 visible">    
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                      <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>        
              <div class="input-group-wraper mb-10">
                <div class="box-select j-box-select">
                  <label for="hospedagem">
                    <div>
                      <img src="assets/images/icon-hospedagem.svg" alt="icon map">
                      Tipo da Hospedagem
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                        <? if($produtoCategorias){?>
                      <ul class="dropdown-select">
                          <? foreach($produtoCategorias as $prodCat){
                              if($prodCat->tipoFK == 1) {
                              ?>
                        <li><?=$prodCat->titulo?></li>
                          <? } } ?>                      </ul>
                        <? } ?>
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-keyword.svg" alt="">
                    Palavra-chave
                  </label>
                  <input type="text" placeholder="Digite aqui">
                </div>
              </div>
              <div class="input-group-wraper mb-10">
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkin.svg" alt="">
                    Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
                </div>
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkout.svg" alt="">
                    Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
                </div>
              </div>
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form2">
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>  
              <div class="input-group-wraper mb-10">              
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-type-space.svg" alt="icon map">
                      Tipo do Espaço
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Espaço 1</li>
                        <li>Espaço 2</li>
                        <li>Espaço 3</li>
                        <li>Espaço 4</li>
                      </ul>
                    </div>
                  </div>
                </div>  
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-keyword.svg" alt="">
                    Palavra-chave
                  </label>
                  <input type="text" placeholder="Digite aqui">
                </div>
              </div>
              <div class="input-group-wraper mb-10">
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkin.svg" alt="">
                    Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
                </div>
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkout.svg" alt="">
                    Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
                </div>
              </div>
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form3">
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                      <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>  
              <div class="input-group-wraper mb-10">              
                <div class="box-select j-box-select">
                  <label for="hospedagem">
                    <div>
                      <img src="assets/images/icon-loja-temp.svg" alt="icon map">
                      Tipo da Loja Temporária
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Hospedagem 1</li>
                        <li>Hospedagem 2</li>
                        <li>Hospedagem 3</li>
                      </ul>
                    </div>
                  </div>
                </div>              
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-area-util.svg" alt="icon map">
                      Área Útil
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>200 m²</li>
                        <li>250 m²</li>
                        <li>340 m²</li>
                      </ul>
                    </div>
                  </div>
                </div>
  
              </div>
              <div class="box-select mb-10">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-keyword.svg" alt="icon keyword">
                    Palavra-chave
                  </div>
                </label>
                <input type="text" placeholder="palavra-chave">
              </div>
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form4">            
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>
              <div class="input-group-wraper mb-10">              
                <div class="box-select j-box-select">
                  <label for="hospedagem">
                    <div>
                      <img src="assets/images/icon-prestador-servico.svg" alt="icon map">
                      Tipo do Prestador de Serviço
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Hospedagem 1</li>
                        <li>Hospedagem 2</li>
                        <li>Hospedagem 3</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-keyword.svg" alt="icon keyword">
                      Palavra-chave
                    </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
                </div>
              </div>            
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form5">
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                     <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>
              <div class="input-group-wraper mb-10">
                <div class="box-select j-box-select">
                  <label for="hospedagem">
                    <div>
                      <img src="assets/images/icon-hospedagem-2.svg" alt="icon map">
                      Tipo da Hospedagem
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Hospedagem 1</li>
                        <li>Hospedagem 2</li>
                        <li>Hospedagem 3</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-keyword.svg" alt="icon keyword">
                      Palavra-chave
                    </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
                </div>
              </div>   
              <div class="input-group-wraper mb-10">
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkin.svg" alt="">
                    Check-in
                  </label>
                  <input type="text" placeholder="Data de Entrada" class="dateInput">
                </div>
                <div class="input-group">
                  <label for="keyword">
                    <img src="assets/images/icon-checkout.svg" alt="">
                    Check-out
                  </label>
                  <input type="text" placeholder="Data de Saída" class="dateInput">
                </div>
              </div>         
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form6">
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                      <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>
              <div class="input-group-wraper mb-10">
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-venda-aluguel.svg" alt="icon map">
                      Venda/Aluguel
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Aluguel 1</li>
                        <li>Aluguel 2</li>
                        <li>Venda 1</li>
                        <li>Venda 1</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-keyword.svg" alt="icon keyword">
                      Palavra-chave
                    </div>
                  </label>
                  <input type="text" placeholder="palavra-chave">
                </div>
              </div>           
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
            <form class="form7">
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input type="text" placeholder="Busque por cidade">
                  <div class="select-list">
                      <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>
              <div class="input-group-wraper mb-10">              
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-evento.svg" alt="icon map">
                      Tipo do Evento
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Busque por cidade">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>Evento 1</li>
                        <li>Evento 2</li>
                        <li>Evento 3</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="assets/images/icon-data.svg" alt="icon map">
                      Data
                    </div>
                    <button class="j-btn-select">
                      <img src="assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input type="text" placeholder="Selecione">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li>04/08/2023</li>
                        <li>05/08/2023</li>
                        <li>06/08/2023</li>
                        <li>07/08/2023</li>
                        <li>08/08/2023</li>
                        <li>09/08/2023</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>   
              <div class="box-select mb-10">
                <label for="cities">
                  <div>
                    <img src="assets/images/icon-keyword.svg" alt="icon keyword">
                    Palavra-chave
                  </div>
                </label>
                <input type="text" placeholder="palavra-chave">
              </div>        
              <a href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </div>
      <div class="account">
        <a href="<?=PATHSITE?>" class="login show">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.75 9.75C11.0429 9.75 12.2829 9.23639 13.1971 8.32215C14.1114 7.40791 14.625 6.16793 14.625 4.875C14.625 3.58207 14.1114 2.34209 13.1971 1.42785C12.2829 0.513615 11.0429 0 9.75 0C8.45707 0 7.21709 0.513615 6.30285 1.42785C5.38861 2.34209 4.875 3.58207 4.875 4.875C4.875 6.16793 5.38861 7.40791 6.30285 8.32215C7.21709 9.23639 8.45707 9.75 9.75 9.75ZM13 4.875C13 5.73695 12.6576 6.5636 12.0481 7.1731C11.4386 7.78259 10.612 8.125 9.75 8.125C8.88805 8.125 8.0614 7.78259 7.4519 7.1731C6.84241 6.5636 6.5 5.73695 6.5 4.875C6.5 4.01305 6.84241 3.1864 7.4519 2.5769C8.0614 1.96741 8.88805 1.625 9.75 1.625C10.612 1.625 11.4386 1.96741 12.0481 2.5769C12.6576 3.1864 13 4.01305 13 4.875ZM19.5 17.875C19.5 19.5 17.875 19.5 17.875 19.5H1.625C1.625 19.5 0 19.5 0 17.875C0 16.25 1.625 11.375 9.75 11.375C17.875 11.375 19.5 16.25 19.5 17.875ZM17.875 17.8685C17.8734 17.4688 17.6248 16.2662 16.523 15.1645C15.4635 14.105 13.4696 13 9.75 13C6.02875 13 4.0365 14.105 2.977 15.1645C1.87525 16.2662 1.62825 17.4688 1.625 17.8685H17.875Z" fill="#932327"/>
          </svg>            
          Entrar
        </a>
        <div class="box-logged">
          <img src="assets/images/logged-user.png" alt="" class="avatar">
          <div>
            <span class="title">Olá, Marlon</span>
            <ul>
              <li><a href="#">Meu perfil</a></li>
              <li>|</li>
              <li><a href="#">Sair</a></li>
            </ul>
          </div>
        </div>
        <a href="<?=PATHSITE?>area-do-anunciante/" class="button-primary">Área do anunciante</a>
      </div> 
    </div>   
  </header>
 
  <div class="menu-mobile-modal">
    <div class="menu-mobile-modal-content">
      <div>
        <header class="header-modal">
          <div class="menu-mobile">
            <button class="menu-mobile-button-modal">
              <span></span>
              <span></span>
              <span></span>
            </button>        
          </div>
          <div class="box-logo">          
            <img src="<?=PATHSITE?>assets/images/logo.png" alt="Logo" class="logo">
          </div>
        </header>
        <h2>Olá! <span>Entre</span> para montar <br> sua festa</h2>
        <hr>
        <nav class="menu-mobile-links">
          <a href="<?=PATHSITE?>espacos/">Espaços</a>
          <a href="<?=PATHSITE?>eventos/">Eventos</a>
          <a href="<?=PATHSITE?>prestadores-de-servico/">Serviços e Prestadores</a>
        </nav>
      </div>

      <div class="account">
        <a href="#" class="login show">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.75 9.75C11.0429 9.75 12.2829 9.23639 13.1971 8.32215C14.1114 7.40791 14.625 6.16793 14.625 4.875C14.625 3.58207 14.1114 2.34209 13.1971 1.42785C12.2829 0.513615 11.0429 0 9.75 0C8.45707 0 7.21709 0.513615 6.30285 1.42785C5.38861 2.34209 4.875 3.58207 4.875 4.875C4.875 6.16793 5.38861 7.40791 6.30285 8.32215C7.21709 9.23639 8.45707 9.75 9.75 9.75ZM13 4.875C13 5.73695 12.6576 6.5636 12.0481 7.1731C11.4386 7.78259 10.612 8.125 9.75 8.125C8.88805 8.125 8.0614 7.78259 7.4519 7.1731C6.84241 6.5636 6.5 5.73695 6.5 4.875C6.5 4.01305 6.84241 3.1864 7.4519 2.5769C8.0614 1.96741 8.88805 1.625 9.75 1.625C10.612 1.625 11.4386 1.96741 12.0481 2.5769C12.6576 3.1864 13 4.01305 13 4.875ZM19.5 17.875C19.5 19.5 17.875 19.5 17.875 19.5H1.625C1.625 19.5 0 19.5 0 17.875C0 16.25 1.625 11.375 9.75 11.375C17.875 11.375 19.5 16.25 19.5 17.875ZM17.875 17.8685C17.8734 17.4688 17.6248 16.2662 16.523 15.1645C15.4635 14.105 13.4696 13 9.75 13C6.02875 13 4.0365 14.105 2.977 15.1645C1.87525 16.2662 1.62825 17.4688 1.625 17.8685H17.875Z" fill="#932327"/>
          </svg>            
          Entrar
        </a>
        <div class="box-logged">
          <img src="assets/images/logged-user.png" alt="" class="avatar">
          <div>
            <span class="title">Olá, Marlon</span>
            <ul>
              <li><a href="#">Meu perfil</a></li>
              <li>|</li>
              <li><a href="#">Sair</a></li>
            </ul>
          </div>
        </div>
        <a href="#" class="button-primary">Área do anunciante</a>
      </div>
    </div>
  </div>