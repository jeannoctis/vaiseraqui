<article class="box <?= $ordem == 1 ? 'special' : '' ?>">
   <? if ($ordem == 1) { ?>
      <div class="decoy">
         <img src="<?= PATHSITE ?>assets/images/icon-star.svg" alt="">
         <span>Mais Contratado</span>
      </div>
   <? } ?>
   <header>
      <div>
         <h3><?= $titulo ?></h3>
         <span>
            <img src="<?= PATHSITE ?>assets/images/icon-barcode.svg" alt="código de barras">
            no boleto <?= $item ?>
         </span>
      </div>
      <span class="discount"><?= $detalhe ?></span>
   </header>
   <div class="price">
      <span class="value">R$<?= $mensalidade ?></span>
      <span class="period">/mês</span>
   </div>
   <? if ($inclui) {
      $arrayInclui = explode(";", $inclui); ?>
      <ul>
         <? foreach ($arrayInclui as $item) { ?>
            <li><?= $item ?></li>
         <? } ?>

         <? if ($naoInclui) {
            $arrayNaoInclui = explode(";", $naoInclui);
            foreach ($arrayNaoInclui as $item) { ?>
               <li class="no-incluse"><?= $item ?></li>
         <? }
         } ?>
      </ul>
   <? } ?>
   <a onclick="$('#planoform').val('Anúncio de linha'); $('#duracao').val('<?=$titulo?>'); $('#duracao').removeAttr('disabled'); $('.p-linha').hide(); $('.p-destaque').show(); " href="#contato" class="btn-primary">Contratar</a>
</article>