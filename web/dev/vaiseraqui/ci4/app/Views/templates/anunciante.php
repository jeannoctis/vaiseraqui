 <? if ($responsavel) { ?>
   <div class="box-ads">
     <img src="<?= PATHSITE ?>uploads/anunciante/<?= $responsavel->arquivo ?>" alt="">
     <div>
       <span class="type">Responsável pelo anúncio</span>
       <span class="title"><?= $responsavel->titulo ?></span>
       <ul>
         <? if ($responsavel->telefone) { ?>
           <li>
             <a target="_blank" href="<?= $responsavel->link1 ?>">
               <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
               <span><?= $responsavel->telefone ?></span>
             </a>
           </li>
         <? } ?>
         <? if ($responsavel->telefone2) { ?>
           <li>
             <a target="_blank" href="<?= $responsavel->link2 ?>">
               <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
               <span><?= $responsavel->telefone2 ?></span>
             </a>
           </li>
         <? } ?>
         <? if ($responsavel->telefone3) { ?>
           <li>
             <a target="_blank" href="<?= $responsavel->link3 ?>">
               <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
               <span><?= $responsavel->telefone3 ?></span>
             </a>
           </li>
         <? } ?>
       </ul>
     </div>
   </div>
 <? } ?>