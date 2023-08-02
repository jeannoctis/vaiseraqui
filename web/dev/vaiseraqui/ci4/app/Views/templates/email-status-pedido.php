<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Atualização do Status do Pedido</title>
        <style>
            /* Estilos globais */
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                background-color: #ffffff;
            }

            /* Estilos específicos para o email */
            .email-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border: 1px solid #dddddd;
            }

            .email-header {
                text-align: center;
                margin-bottom: 20px;
                background-color: #668aa2;
                padding: 10px;
            }

            .email-header h1 {
                color: #ffffff;
                font-size: 24px;
                margin: 0;
            }

            .email-content {
                color: #555555;
            }

            .email-content p {
                word-wrap: break-word;
                margin-bottom: 0;
            }

            .email-footer {
                margin-top: 20px;
                text-align: center;
            }

            .email-footer p {
                color: #999999;
                margin: 0;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="email-header">
                <h1>Pedido <?= str_pad($id, 6, 0, STR_PAD_LEFT) ?></h1>
            </div>
            <div class="email-content">
                <article>
                    <p>Olá <b><?= $nome ?></b>!</p>

                    <p>O atual status do seu pedido é <strong><?= $status ?></strong>.</p> <br>

                    <? switch ($status) {
                        case 'AGUARDANDO':
                            ?>
                            <p>Pedido criado com sucesso.</p>
                            <p>Assim que for confirmado o pagamento do seu pedido, avisaremos por aqui =).</p>
                            <p>Para acompanhar o status do seu pedido, você pode acessar este link <a href="<?=$url?>">aqui</a> </p>
                            <? break;
                        case 'APROVADO':
                            ?>
                            <p>Pedido concluído.</p>
                            <p>Assim que o pagamento for aprovado, seguiremos com as tratativas de envio!</p>
        <? break;
    case 'PAGO':
        ?>
                            <p>O pagamento do seu pedido foi aprovado! </p>
                            <p>Estamos seguindo as tratativas de envio. O projeto também ficará disponível para download na <a href="<?= PATHSITE ?>area-do-cliente/dashboard/" target="_blank">área do cliente</a>.</p>
                            <? break;
                        case 'ENVIADO':
                            ?>
                            <p>Fizemos o envio do seu projeto.</p>
                            <? switch ($envio) {
                                case 'email':
                                    ?>
                                    <p>Cheque sua caixa de e-mail, o(s) arquivo(s) do projeto estará em anexo.</p>
                                    <? break;
                                case 'sedex':
                                    ?>
                                    <p>A entrega será feita via SEDEX.</p>
                                    <? if (!empty(trim($rastreio))) { ?>
                                        <p>O código de rastreio para acompanhar a entrega é o <strong><?= trim($rastreio) ?></strong></p>
                                    <? } else { ?>
                                        <p>Assim que o código de rastreio estiver disponível, enviaremos por e-mail!</p>
                                    <? } ?>
                                    <? break;
                                case 'ambos':
                                    ?>
                                    <p>Cheque sua caixa de e-mail, o(s) arquivo(s) do projeto estará em anexo.</p>
                                    <p>A entrega também será feita via SEDEX.</p>
                                    <? if (!empty(trim($rastreio))) { ?>
                                        <p>O código de rastreio para acompanhar a entrega é o <strong><?= trim($rastreio) ?></strong></p>
                                    <? } else { ?>
                                        <p>Assim que o código de rastreio estiver disponível, enviaremos por e-mail!</p>
                                    <? } ?>
                                    <? break;
                            }
                            ?>
                            <p>O projeto também ficará disponível para download na <a href="<?= PATHSITE ?>area-do-cliente/dashboard/" target="_blank">área do cliente</a>.</p>
                            <? break;
                        case 'ENTREGUE':
                            ?>
                            <p>Tudo certo com seu pedido?</p>
                            <p>Entre em contato conosco em caso de dúvidas.</p>
        <? break;
    case 'CANCELADO':
        ?>
                            <p>Seu pedido foi <strong>cancelado</strong>.</p>
                            <p>Para mais informações entre em contato conosco.</p>
        <? break;
}
?>

                    <br>
                    <p>
                        Para mais detalhes sobre a compra acesse a
                        <a href="<?= PATHSITE ?>area-do-cliente/dashboard/" target="_blank">Área do Cliente</a>
                    </p>

                </article>
            </div>
            <div class="email-footer">
                <p>Atenciosamente,</p>
                <p>Projetos Online Arq <a href="<?= PATHSITE ?>">projetosonlinearq.com.br</a></p>
            </div>
        </div>
    </body>

</html>