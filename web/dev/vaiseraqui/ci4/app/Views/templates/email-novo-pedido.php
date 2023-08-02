<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <title>Novo pedido</title>
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
            <p>Olá, <b>administrador</b>!</p> <br>

            <p>Um novo pedido foi realizado na plataforma <strong>Projetos Online ARQ</strong>.</p> <br>
            
            <p>
               Para mais detalhes sobre a compra acesse o seu painel administrativo clicando 
               <a href="<?= PATHSITE ?>admin/pedido/form/<?=encode($id)?>" target="_blank">aqui</a>
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