<main>
    <form action="#">
        <div class="content">
            <div class="box-inputs">
                <div class="left">
                    <h3 data-aos="fade-up">FORMAS DE PAGAMENTO</h3>
                    <div id="paymentBrick_container" style="font-family: Noir Pro, sans-serif;"></div>
                </div>
                <div class="right" data-aos="fade-up">
                    <div class="box">
                        <h2>Resumo do Pedido</h2>
                        <div class="table">
                            <h3><span>Projeto</span> <span>Valores</span></h3>
                                <h4><span class="name"><?= $projeto->titulo ?></span> <span class="price">R$ <?= number_format($projeto->valor, 2, ',', '.') ?></span></h4>
                            <? if ($adicionais) { ?>
                                <ul>
                                    <li><span><img src="<?= PATHSITE ?>assets/images/icon-chevron-li.svg" alt=""> Projeto Arquitetônico</span></li>
                                    <? foreach ($adicionais as $adicional) { ?>
                                        <li><span><img src="<?= PATHSITE ?>assets/images/icon-chevron-li.svg" alt=""> <?=$adicional->titulo?></span>
                                            <span  class="price">R$ <?= number_format($adicional->valor, 2, ',', '.') ?></span></li>
                                        <? } ?>
                                </ul>
                            <? } ?>
                            <? if($carrinho['envio'] == 'ambos') {
                                if($frete[0]->ShippingPrice) {
                                ?>
                            <h4><span class="name">Entrega via e-mail e PAC</span> <span class="price">R$ <?=number_format($frete[0]->ShippingPrice, 2,',','.')?></span></h4>
                            <? }  else { ?>
                            <h4><span class='name'>Frete indisponível</span> <span class='price'>Não foi possível calcular o frete</span> </h4>   
                            <? } } ?>
                            <? if($valorImpressao) {?>
                            <h4><span class="name">Impressão (<?=$carrinho['copias']?> cópias)</span> <span class="price">R$ <?= number_format($valorImpressao * $carrinho['copias'] , 2, ',', '.') ?></span></h4>
                            <? } ?>
                            <hr>
                            <footer>
                                <span>Total</span>
                                <span>R$<?=number_format($valorTotal, 2, ',', '.') ?></span>
                            </footer>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>



<script>

    function criarMP() {

        const mp = new MercadoPago('<?= MERCADOPAGOKEY ?>', {
            locale: 'pt-BR'
        });
        const bricksBuilder = mp.bricks();
        const renderPaymentBrick = async (bricksBuilder) => {
            const settings = {
                initialization: {
                    /*
                     "amount" é o valor total a ser pago por todos os meios de pagamento
                     com exceção da Conta Mercado Pago e Parcelamento sem cartão de crédito, que tem seu valor de processamento determinado no backend através do "preferenceId"
                     */
                    amount: <?=$valorTotal?>
                            //  preferenceId: "000",
                },
                customization: {
                    paymentMethods: {
                        ticket: "all",
                        bankTransfer: "all",
                        creditCard: "all",
                        // debitCard: "all",
                        mercadoPago: "all",
                    maxInstallments: <?=($projeto->parcelas <= 12 && $projeto->parcelas >= 1) ? $projeto->parcelas : 1 ?> ,
                    },
                },
                callbacks: {
                    onReady: () => {
                        /*
                         Callback chamado quando o Brick estiver pronto.
                         Aqui você pode ocultar loadings do seu site, por exemplo.
                         */
                    },
                    onSubmit: ({ selectedPaymentMethod, formData }) => {
                        // formData.adicionais = '1234';

                        // callback chamado ao clicar no botão de submissão dos dados
                        return new Promise((resolve, reject) => {
                            $(".preloader").show();
                            fetch("<?= PATHSITE ?>pedido/finalizarPedido", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify(formData),
                            })
                                    .then((response) => response.json())
                                    .then((response) => {
                                        $(".preloader").hide();
                                        // receber o resultado do pagamento
                                        resolve();
                                       
                                        if (response.status === 'approved') {
                                            swal.fire("Obrigado", "Compra aprovada com sucesso", "success");
                                            location.href = PATHSITE + 'pedido-finalizado/' + response.pedidoId;
                                        } else if (response.status === 'rejected') {
                                            swal.fire("Ops,", "Recusado por erro geral. Detalhes:" + response.status_detail, "error");
                                        } else if (response.status === 'in_process' || response.status == 'pending') {
                                            location.href = PATHSITE + 'pedido-finalizado/' + response.pedidoId;
                                            //  swal.fire("Ops,", "Pagamento pendente. Aguardar!", "success");
                                        } else if(response.erro) { 
                                            swal.fire(response.erro);
                                        } else {
                                            swal.fire("Ops...", "Ocorreu um erro desconhecido. Aguarde e tente novamente mais tarde ", "warning");
                                        }
                                    })
                                    .catch((error) => {
                                        $(".preloader").hide();
                                console.log(error);
                                       Swal.fire("Ops. Erro na requisição. Verificar: ", error, "error");
                                        // lidar com a resposta de erro ao tentar criar o pagamento
                                        reject();
                                    });
                        });
                    },
                    onError: (error) => {
                       $(".preloader").hide();
                        // callback chamado para todos os casos de erro do Brick
                        Swal.fire("Ops", error, "error");
                    },
                },
            };
            window.paymentBrickController = await bricksBuilder.create(
                    "payment",
                    "paymentBrick_container",
                    settings
                    );
        };
        renderPaymentBrick(bricksBuilder);
    }

    window.addEventListener("load", function () {
        criarMP();
    });
 /*
    document.addEventListener("visibilitychange", function () {
        if (document.visibilityState === "hidden") {
            window.paymentBrickController.unmount();
        } else {
            criarMP();
        }
    }); */

</script>

<style>
    input,select{
        min-height: unset !important;
        font-size: var(--font-size-large) !important;
        font-weight: var(--font-weight-normal) !important;
    }
    select{
        background-image: unset !important;
    }
    
    button.svelte-1a8kh4a{
        background-color: #607380 !important;
        background-image: unset !important;
    }
    
    button.svelte-1a8kh4a:hover {
        transition: 200ms color ease-in-out;
    }
    
    input[name=DOCUMENT] {
        border: none !important;
    }
    
</style>


<div style="display: none;" class="preloader">
    <img class="img-loader" src="<?=PATHSITE?>assets/images/preloader.gif" />
</div>