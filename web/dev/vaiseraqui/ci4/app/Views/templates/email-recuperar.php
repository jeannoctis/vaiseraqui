<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
      <title>Recuperação de senha</title>
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
                <h1>Recuperação de senha</h1>
            </div>
            <div class="email-content">
                <p><strong>Recuperação de senha:</strong></p>
                <p>Olá, <?= $titulo ?>, Foi feito um pedido de recuperação de senha no site Vai Ser Aqui. Caso deseje mudar: Clique <a href='<?= PATHSITE ?>novasenha?codigo=<?= $recuperar ?>&tipo=<?= $tipo ?>'>aqui</a> e insira sua nova senha.</p>
            </div>
            <div class="email-footer">
            <p>Atenciosamente,</p>
            <p>Vai Ser Aqui <a href="<?= PATHSITE ?>">vaiseraqui.com.br</a></p>
        </div>
        </div>
    </body>

</html>