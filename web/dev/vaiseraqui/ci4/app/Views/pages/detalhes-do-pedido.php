<? $status = getPdStatus($pdAtual->status) ?>


<main>
   <div class="box">
      <h1 data-aos="fade-up">DETALHES DO PEDIDO</h1>
      <p data-aos="fade-up">Pedido ARQ0000<?= $pdAtual->id ?> • <?= formataDataHora($pdAtual->dtCriacao) ?> </p>
      
      <div class="box-details" data-aos="fade-up">
         <div class="cover-and-options">
            <div style="margin-bottom: 15px;" class="cover">
               <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $pdAtual->fotos->arquivo ?>" alt="capa do projeto">
               <span class="<?= $status['class'] ?>"><?= $status['badge'] ?></span>
            </div>
             <? if($pdAtual->status == 'PAGO' || $pdAtual->status == 'ENVIADO' || $pdAtual->status == 'ENTREGUE' ) {?>
            <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/<?= $pdAtual->id ?>/baixar/" class="btn-primary">
               <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 8.93359V15.9853C1 16.5196 1.21227 17.0321 1.59011 17.41C1.96796 17.7878 2.48042 18.0001 3.01477 18.0001H17.1182C17.6525 18.0001 18.165 17.7878 18.5428 17.41C18.9207 17.0321 19.1329 16.5196 19.1329 15.9853V8.93359" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.5332 10.0664L10.0664 13.4663L14.5997 10.0664" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10.0664 1V12.3331" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               <span>Baixar projeto</span>
            </a>
             <? } ?>
            <a href="<?= PATHSITE ?>area-do-cliente/meus-projetos/<?= $pdAtual->id ?>/visualizar/" class="btn-outline">Visualizar projeto</a>
         </div>
         <div class="wraper">
            <div class="table">
               <h2 class="title-head">
                  <span>Projeto</span>
                  <span>Valores</span>
               </h2>
               <div class="item">
                  <h3>
                     <span class="name"><?= $pdAtual->projeto->titulo ?> </span>
                     <span class="price">R$<?= number_format($pdAtual->projeto->valor, 2, ",", ".") ?></span>
                  </h3>
                  <ul>
                     <li>
                        <span class="name">Projeto Arquitetônico</span>
                     </li>
                     <? foreach ($pdAtual->adicionais as $adicional) {
                         $valorAdicionais += $adicional->valor;
                         ?>
                        <li>
                           <span class="name"><?= $adicional->titulo ?></span>
                           <span class="price">R$<?= number_format($adicional->valor, 2, ",", ".") ?></span>
                        </li>
                     <? } ?>
                  </ul>
               </div>
               <div class="item">
                  <h3>
                     <span class="name">Entrega via <?= $pdAtual->envio ?></span>
                     <span class="price">R$<?= number_format($pdAtual->valorEnvio, 2, ",", ".") ?></span>
                  </h3>
               </div>
               <? if ($pdAtual->envio == "sedex" || $pdAtual->envio == "ambos") { ?>
                  <div class="item">
                     <h3>
                        <span class="name">Impressão <?= $pdAtual->copias ?> cópia(s)</span>
                        <span class="price">R$<?= ($pdAtual->copias * $pdAtual->valorImpressao) ?></span>
                     </h3>
                  </div>
               <? } ?>

               <h2 class="title-footer">
                  <span class="name">Total</span>
                  <span class="price">R$<?= number_format($pdAtual->total + $valorAdicionais + $pdAtual->valorEnvio + ($pdAtual->copias * $pdAtual->valorImpressao), 2, ",", ".") ?></span>
               </h2>
            </div>
            <div class="info-payment-and-delivery">
               <div class="item">
                  <h2>Detalhes do Pagamento</h2>
                    <? if ($pdAtual->tipo == 'cartao') { ?>
                  <div class="text">
                     <img src="<?= PATHSITE ?>assets-cliente/images/icon-credit-card.svg" alt="ícone cartão de crédito">
                     <div>
                        <span>
                           <span id="cardFlagText"><?= $pdAtual->pagamento->bandeira ?></span> 
                           *<?=$payment->payment_method_id?> *<?=$payment->card->last_four_digits?> - Parcelamento <?=$payment->installments?>x
                        </span>
                     </div>
                  </div>
                    <? } else if($pdAtual->tipo == 'boleto') { ?>
                  <div class="text">
                     <img src="<?= PATHSITE ?>assets/images/icon-bar-code.svg" alt="ícone cartão de crédito">
                     <div>
                        <span>
                           <span id="cardFlagText"><?= $pdAtual->pagamento->bandeira ?></span> 
                           *<?=$payment->payment_method_id?> *<?=$payment->card->last_four_digits?> - Parcelamento <?=$payment->installments?>x
                        </span>
                     </div>
                  </div>
                    <? } else if($pdAtual->tipo == 'pix') { ?>
                       <div class="text">
                     <img height="21" src="<?= PATHSITE ?>assets/images/icon-pix.svg" alt="ícone cartão de crédito">
                     <div>
                        <span>
                           <span id="cardFlagText"><?= $pdAtual->pagamento->bandeira ?></span> 
                           PIX
                        </span>
                     </div>
                  </div> 
                 <?   } ?>
               </div>
               <div class="item">
                  <h2>Dados da Entrega</h2>
                  <div class="text">
                     <img src="<?= PATHSITE ?>assets-cliente/images/icon-trunk.svg" alt="ícone caminhão de entrega">
                     <div>
                        <span>
                           <?= $pdAtual->endereco ?>, nº <?= $pdAtual->numero ?>
                           <?= $pdAtual->complemento ? '-' : '' ?> <?= $pdAtual->complemento ?>
                        </span>
                        <span><?= $pdAtual->cidade ?> - <?= $pdAtual->estado ?></span>
                        <span><?= $pdAtual->cep ?></span>
                     </div>
                  </div>
               </div>

               <div class="box-rastreio">Código de Rastreio: <?= $pdAtual->rastreio ?></div>
            </div>
         </div>
      </div>
   </div>
</main>