<div class="item">
   <header>
      <div>
         <h3><?= $titulo ?></h3>
         <span>
            <img src="<?= PATHSITE ?>assets/images/icon-barcode.svg" alt="ícone boleto">
            no boleto
         </span>
      </div>
      <span class="discount"><?= $detalhe ?></span>
   </header>
   <div class="price">
      <span class="value">R$<?= $mensalidade ?></span>
      <span class="period">/mês</span>
   </div>
   <a onclick="$('#planoform').val('Anúncio destaque'); $('#duracao').val('<?=$titulo?>'); $('#duracao').removeAttr('disabled'); $('.p-linha').show(); $('.p-destaque').hide();  " href="#contato" class="btn-primary">Contratar</a>
</div>