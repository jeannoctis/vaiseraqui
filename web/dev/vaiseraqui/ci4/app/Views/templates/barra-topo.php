<div class="barraTopo">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-md-7 order-10 order-md-1 left">
            <div class="tituloPagina">
               <? if ($iconePagina != "") { ?>
                  <img src="<?= PATHSITE ?>images/<?= $iconePagina ?>">
               <? } ?>
               <div class="infoTituloPagina">
                  <h1><?= $nomeDaPagina ?></h1>
                  <? if ($statusAnuncio == 'INATIVO') { ?>
                     <a href="#">
                        Anúncio inativo
                     </a>
                  <? } else if ($statusAnuncio == "ATIVO") { ?>
                     <a class='ativo' href="#">
                        Anúncio ativo
                     </a>
                  <? } ?>
               </div>
            </div>
         </div>

         <div class="col-12 col-md-5 order-1 order-lg-10 right">
            <button class="menuMobile" onclick="openNav()">
               <img src="<?= PATHSITE ?>images/menu.svg">
            </button>

            <a href="<?= PATHSITE ?>area-do-anunciante/perfil" class="avatar">
               <? if ($fotoAnunciante) { ?>
                  <img src="<?= PATHSITE ?>uploads/anunciante/<?= $fotoAnunciante ?>">
               <? } else { ?>
                  <img src="<?= PATHSITE ?>images/soufesta.svg">
               <? } ?>
            </a>

            <a href="#" class="notificacoes">
               <img src="<?= PATHSITE ?>images/icon-bell.svg" class="bell">
               <div class="sinalNotificacao d-none"></div>
            </a>
         </div>
      </div>
   </div>
</div>