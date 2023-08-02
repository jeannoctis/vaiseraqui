<main>
    <form action="#">
        <div class="content">
            <div class="box-inputs">
                <div class="left" data-aos="fade-up">
                    <h3>Pedido realizado</h3>
                    <p>Número do Pedido: ARQ0000<?= $pedido->id ?></p>

                    <? if ($pedido->status == 'PAGO' || $pedido->status == 'ENTREGUE' || $pedido->status == 'ENVIADO') { ?>
                        <div class="box-waiting">
                            <img src="<?= PATHSITE ?>assets/images/icon-finished.svg" alt="">
                                  <p>Seu pedido foi confirmado!</p>
                        </div>

                        <div class="box-pix">
                            <a href="<?=PATHSITE?>area-do-cliente/meus-projetos/<?=$pedido->id?>" class="btn-primary">Ver pedido</a>
                            <p class="label">Obrigado por realizar uma compra na Projeto ArqOnline! Assim que nós recebermos o pagamento, você receberá um e-mail de confirmação com o seu pedido.</p>                          
                        </div>

                    <? } else if ($pedido->status == 'AGUARDANDO') { ?>
                        <div class="box-waiting">
                            <img src="<?= PATHSITE ?>assets/images/icon-waiting.svg" alt="">
                                <p>Aguardando pagamento</p>
                        </div>
                    <? } ?>


                    <? if ($payment->payment_method_id == 'pix') { ?>
                        <div class="box-pix">
                            <div class="wraper">
                                <div class="info">
                                    <h2>Pague com PIX</h2>
                                    <p>Abra o app do seu banco, escolha a opção pagar com código PIX, copie e cole o código abaixo. Caso
                                        prefira, escaneie o QR Code com a câmera do seu celular. Confirme todas as informações e autorize o
                                        pagamento.</p>

                                    <p><strong>Importante: Esta página não será atualizada após realizar o pagamento. Verifique a
                                            confirmação no app do seu banco, assim que finalizar o pagamento.</strong></p>


                                    <div class="box-copy-pix">
                                        <h3>Código PIX</h3>
                                        <div class="wraper-input">
                                            <input type="text" class="pix" value="<?= $payment->point_of_interaction->transaction_data->qr_code ?>">
                                                <button class="j-btn-copy">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.2359 4.50001L16.1109 0.555014C15.9395 0.378522 15.7343 0.238407 15.5075 0.143047C15.2807 0.0476865 15.037 -0.00096041 14.7909 1.43642e-05H8.79094C8.3015 0.0117643 7.83606 0.214484 7.49411 0.564849C7.15215 0.915214 6.9608 1.38543 6.96094 1.87501V18.375C6.96094 18.8723 7.15848 19.3492 7.51011 19.7008C7.86174 20.0525 8.33866 20.25 8.83594 20.25H18.9159C19.4132 20.25 19.8901 20.0525 20.2418 19.7008C20.5934 19.3492 20.7909 18.8723 20.7909 18.375V5.82001C20.7919 5.57398 20.7433 5.33028 20.6479 5.10348C20.5525 4.87667 20.4124 4.67143 20.2359 4.50001ZM18.9159 18.375H8.83594V1.87501H12.9159V5.82001C12.9159 6.3173 13.1135 6.79421 13.4651 7.14584C13.8167 7.49747 14.2937 7.69501 14.7909 7.69501H18.9159V18.375ZM18.9159 5.82001H14.7909V1.87501L18.9159 5.82001Z" fill="#333333"/>
                                                        <path d="M15.1659 22.125H5.08594V5.625H6.00094V3.75H5.08594C4.58866 3.75 4.11174 3.94754 3.76011 4.29917C3.40848 4.65081 3.21094 5.12772 3.21094 5.625V22.125C3.21094 22.6223 3.40848 23.0992 3.76011 23.4508C4.11174 23.8025 4.58866 24 5.08594 24H15.1659C15.6632 24 16.1401 23.8025 16.4918 23.4508C16.8434 23.0992 17.0409 22.6223 17.0409 22.125V21.18H15.1659V22.125Z" fill="#333333"/>
                                                    </svg>                          
                                                </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cover">
                                    <canvas id="qrcodepix">
                                    </canvas>
                                        <!--  <img src="<?= PATHSITE ?>assets/images/qrcode.png" alt=""> -->
                                </div>
                            </div>  
                            <p class="label">Obrigado por realizar uma compra na Projeto ArqOnline! Assim que nós recebermos o pagamento, você receberá um e-mail de confirmação com o seu pedido.</p>            
                        </div>
                        <?
                    } else if ($payment->payment_method_id == 'bolbradesco' || $payment->payment_method_id == 'pec' || $payment->payment_type_id == 'ticket') {
                        ?>
                        <div class="box-pix">
                            <a target="_blank" href="<?= $payment->transaction_details->external_resource_url ?>" class="btn-primary">Emitir Boleto</a>
                            <p class="label">Obrigado por realizar uma compra na Projeto ArqOnline! Assim que nós recebermos o pagamento, você receberá um e-mail de confirmação com o seu pedido.</p>            
                            <p>Lembrando que, pagamentos via Boleto levam até 2 dias úteis para serem <br> compensados.</p>
                        </div>             
                    <? } ?>
                </div>
                <div class="right" data-aos="fade-up">
                    <div class="box">
                        <h2>Resumo do Pedido</h2>
                        <div class="table">
                            <h3><span>Projeto</span> <span>Valores</span></h3>
                            <h4><span class="name"><?=$projeto->titulo?></span> <span class="price">R$<?=number_format($pedido->total,2,',','.')?></span></h4>
                            <ul>
                                <li><span><img src="<?= PATHSITE ?>assets/images/icon-chevron-li.svg" alt=""> Projeto Arquitetônico</span></li>
                                <? 
                                 
                                if($adicionais) {
                                    foreach($adicionais as $adicional) {
                                        $valorAdicionais += $adicional->total;
                                    ?>
                                <li><span><img src="<?= PATHSITE ?>assets/images/icon-chevron-li.svg" alt=""> <?=$adicional->titulo?></span><span
                                        class="price">R$ <?= number_format($adicional->total, 2, ',', '.') ?></span></li>
                                <? } } ?>
                            </ul>
                            <? if($pedido->envio == 'ambos') {?>
                            <h4><span class="name">Entrega via e-mail e correios</span> <span class="price">R$ <?=number_format($pedido->valorEnvio,2,',','.')?></span></h4>
                            <? } ?>
                            <? if($pedido->copias) {?>
                            <h4><span class="name">Impressão (<?=$pedido->copias?> cópias)</span> <span class="price">R$ <?=number_format($pedido->valorImpressao,2,',','.')?></span></h4>
                            <? } ?>

                            <hr>
                                <footer >
                                    <span>Total</span>
                                    <span>R$<?= number_format($pedido->total+$pedido->copias+$pedido->valorImpressao+$valorAdicionais, 2, ',', '.') ?></span>
                                </footer>
                                  <br>
                                <?
                                if ($pedido->status == 'PAGO' || $pedido->status == 'ENTREGUE' || $pedido->status == 'ENVIADO') { ?>
                                    <? if ($pdAtual->tipo == 'credit_card') { ?>
                                        <div class="via">
                                            <h3>Detalhes do Pagamento</h3>
                                            <div>
                                                <img src="<?= PATHSITE ?>assets/images/icon-credit-card.png" alt="">
                                                    <p><?=$payment->payment_method_id?> *<?=$payment->card->last_four_digits?> - Parcelamento <?=$payment->installments?>x</p>
                                            </div>
                                        </div>
                                    <? } else if ($pdAtual->tipo == 'boleto' ) {
                                        ?>

                                    <? } else if ($pdAtual->tipo == 'pix') { ?>
                                        <div>
                                            <img src="<?= PATHSITE ?>assets/images/icon-pix.svg" alt="">
                                                <p>Transferência por PIX</p>
                                        </div>                                        
                                    <? } ?>
                                <? } else { ?>
                                    <p class="only-mobile">Obrigado por realizar uma compra na Projeto ArqOnline! Assim que nós recebermos o
                                        pagamento, você receberá um e-mail de confirmação com o seu pedido.</p>    
                                <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    var btnCopyPix = document.querySelector(".j-btn-copy");

    btnCopyPix.addEventListener('click', function (e) {
        e.preventDefault()

        var inputPix = document.querySelector("input.pix");
        inputPix.select();
        inputPix.setSelectionRange(0, 99999);

        document.execCommand("copy");
        this.parentElement.classList.add('copy')
        setTimeout(() => {
            this.parentElement.classList.remove('copy')
        }, 1000);
    })

</script>