<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contato do site</title>
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
            background-color: #932327;
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
            <h1>Contato do site</h1>
        </div>
        <div class="email-content">
            <p><strong>Nome:</strong> <?= $nome ?></p>
            <p><strong>E-mail:</strong> <?= $email ?></p>
            <? if ($telefone) { ?>
                <p>
                    <strong>Telefone:</strong> <?= $telefone ?>
                </p>
            <? } ?>
            <? if ($celular) { ?>
                <p>
                    <strong>Celular:</strong> <?= $celular ?>
                </p>
            <? } ?>
            <? if ($prefContato) { ?>
                <p>
                    <strong>Preferência de Contato:</strong> <?= $prefContato ?>
                </p>
            <? } ?>
            <? if ($mensagem) { ?>
                <p>
                    <strong>Mensagem:</strong> <?= $mensagem ?>
                </p>
            <? } ?>
            <? if ($plano) { ?>
                <p>
                    <strong>Plano:</strong> <?= $plano ?>
                </p>
            <? } ?>
            <? if ($duracao) { ?>
                <p>
                    <strong>Duração:</strong> <?= $duracao ?>
                </p>
            <? } ?>
            <? if ($anuncio) { ?>
                <p>
                    <strong>Modelo do anúncio</strong> <?= $anuncio ?>
                </p>
            <? } ?>
        </div>
        <div class="email-footer">
            <p>Atenciosamente,</p>
            <p>Vai Ser Aqui <a href="<?= PATHSITE ?>">vaiseraqui.com.br</a></p>
        </div>
    </div>
</body>

</html>