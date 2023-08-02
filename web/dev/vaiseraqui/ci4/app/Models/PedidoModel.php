<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'pedido';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['projetoFK', 'clienteFK', 'copias', 'total', 'envio', 'estado', 'ordem', 'rastreio', 'tipo',
        'valorEnvio', 'parcelas', 'status', 'endereco', 'uf', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'valorImpressao',
        'nome', 'email', 'cpf', 'telefone'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
    ];
    protected $validationMessages = [
    ];
    protected $skipValidation = false;

    function finalizar() {
            helper('encrypt');
        $this->session = \Config\Services::session($config);
        
        $contents = json_decode(file_get_contents('php://input'), true);

        //    $valor = '{"payment_method_id":"bolbradesco","transaction_amount":1284,"payer":{"email":"jean@uaau.digital","identification":{"type":"CPF","number":"36267900029"},"address":{"zip_code":"87050120","federal_unit":"PR","city":"Maring\u00e1","neighborhood":"Zona 03","street_name":"Rua Marc\u00edlio Dias","street_number":"994, 705"},"first_name":"Jean Adriel","last_name":"Silva Faria"}}';
        // $contents = json_decode($valor, true);    
//        $valor = '{"token": "bfeb6324ca8de9943c5fece0c42f5404","issuer_id": "24","payment_method_id": "master","transaction_amount": 1284, "installments": 1,"payer": {"email": "jean.adriel@gmail.com","identification": "type": "CPF","number": "12345678909"}}}';
        //   $contents = json_decode($valor,true);
        // $valor = '{"token": "9749fe39fac0af6c74d6a39a97761aac","issuer_id": "24","payment_method_id": "master", "transaction_amount": 2962.95,"installments": 3,"payer": {"email": "jean@uaau.digital","identification": {"type": "CPF","number": "38592136873"}}}';
        // $contents = json_decode($valor, true);

        /*  $log['mensagem'] = json_encode($contents, true);
          $log['funcao'] ='CADASTRAR';
          $log['tabela'] = 'log';
          $logModel = \model("App\Models\LogModel", false);
          $logModel->insert($log); */

        //   $valor ='{"payment_method_id":"pix","transaction_amount":1000,"payer":{"email":"jean@uaau.digital"}}';
       //   $contents = json_decode($valor, true);
        
        if ($contents['payment_method_id'] == 'bolbradesco' || $contents['payment_method_id'] == 'pec') {
            $metodoPagamento = 'boleto';
        } else if ($contents['payment_method_id'] == 'pix') {
            $metodoPagamento = 'pix';
        } else {
            $metodoPagamento = 'cartao';
        }

        $pedido['tipo'] = $metodoPagamento;

        $carrinho = $this->session->get('carrinho');

        $projetoModel = \model("App\Models\ProjetoModel", false);
        $projetoModel->where('identificador', $carrinho['projeto']);
        $projeto = $projetoModel->find()[0];

        $projetoAdicionalModel = \model("App\Models\PjAdicionalModel", false);

        if ($carrinho['envio'] == 'ambos') {
            $pedido['valorImpressao'] = ( $carrinho['copias'] * $projeto->impressao);

            $medidas[0]['Height'] = $projeto->altura;
            $medidas[0]['Length'] = $projeto->largura;
            $medidas[0]['Quantity'] = 1;
            $medidas[0]['Weight'] = $projeto->peso;
            $medidas[0]['Width'] = $projeto->comprimento;
            $medidas[0]['SKU'] = 'P-' . $projeto->id;
            $medidas[0]['Category'] = 'Projeto Arquitetônico';
        }

        if ($carrinho['adicional']) {
            $projetoAdicionalModel->whereIn('id', $carrinho['adicional']);
            $adicionais = $projetoAdicionalModel->findAll();

            if ($adicionais && $carrinho['envio'] == 'ambos') {
                foreach ($adicionais as $adicional) {
                    $pedido['valorImpressao'] += ($carrinho['copias'] * $adicional->impressao);
                    $medidas[$ind + 1]['Height'] = $adicional->altura;
                    $medidas[$ind + 1]['Length'] = $adicional->largura;
                    $medidas[$ind + 1]['Quantity'] = 1;
                    $medidas[$ind + 1]['Weight'] = $adicional->peso;
                    $medidas[$ind + 1]['Width'] = $adicional->comprimento;
                    $medidas[$ind + 1]['SKU'] = 'A-' . $adicional->id;
                    $medidas[$ind + 1]['Category'] = 'Projeto Arquitetônico';
                }
            }
        }

        //$frete = $projetoModel->calcularFrete($medidas, $carrinho['cep'], $contents['transaction_amount']);

        $pedido['valorEnvio'] = $_SESSION['ultimoFrete'];  //$frete[0]->ShippingPrice;

        switch ($metodoPagamento) {
            case 'cartao':
                \MercadoPago\SDK::setAccessToken(MERCADOPAGOTOKEN);
                $payment = new \MercadoPago\Payment();
                $payment->transaction_amount = $contents['transaction_amount'];
                $payment->token = $contents['token'];
                $payment->installments = $contents['installments'];
                $payment->payment_method_id = $contents['payment_method_id'];
                $payment->issuer_id = $contents['issuer_id'];
                $payer = new \MercadoPago\Payer();
                $payer->email = $contents['payer']['email'];
                $payer->identification = array(
                    "type" => $contents['payer']['identification']['type'],
                    "number" => $contents['payer']['identification']['number']
                );
                $payment->payer = $payer;
                try {
                    $payment->save();
                } catch (\Throwable $e) {
                    $response['erro'] = "O Mercado Pago está com problemas para processar pagamentos no momento!";
                }
                $response['status'] = $payment->status;
                $response['status_detail'] = $payment->status_detail;
                $response['id'] = $payment->id;
                break;
            case 'boleto':
                \MercadoPago\SDK::setAccessToken(MERCADOPAGOTOKEN);
                $payment = new \MercadoPago\Payment();
                $payment->transaction_amount = $contents['transaction_amount'];
                $payment->description = "Projeto Online Arq";
                $payment->payment_method_id = $contents['payment_method_id'];
                $payment->payer = array(
                    "email" => $contents['payer']['email'],
                    "first_name" => $contents['payer']['first_name'],
                    "last_name" => $contents['payer']['last_name'],
                    "identification" => array(
                        "type" => $contents['payer']['identification']['type'],
                        "number" => $contents['payer']['identification']['number'],
                    ),
                    "address" => array(
                        "zip_code" => $contents['payer']['address']['zip_code'],
                        "street_name" => $contents['payer']['address']['street_name'],
                        "street_number" => $contents['payer']['address']['street_number'],
                        "neighborhood" => $contents['payer']['address']['neighborhood'],
                        "city" => $contents['payer']['address']['city'],
                        "federal_unit" => $contents['payer']['address']['federal_unit'],
                    )
                );

                try {
                    $payment->save();
                } catch (\Throwable $e) {
                    $response['erro'] = "O Mercado Pago está com problemas para processar pagamentos no momento!";
                }

                $response['status'] = $payment->status;
                $response['status_detail'] = $payment->status_detail;
                $response['id'] = $payment->id;

                break;
            case 'pix':
                \MercadoPago\SDK::setAccessToken(MERCADOPAGOTOKEN); // Either Production or SandBox AccessToken

                $payment = new \MercadoPago\Payment();

                $payment->payment_method_id = 'pix';
                $payment->transaction_amount = $contents['transaction_amount'];

                $payment->description = "Projeto Online Arq";
                $payment->installments = 1;

                $payer = new \MercadoPago\Payer();
                $payer->email = $contents['payer']['email'];

                $payment->payer = $payer;

                $response['payment'] = $payment;

                try {                   
                    
                    $payment->save();                  
                } catch (\Throwable $e) {         
                    echo "<pre>";
                    print_r($e);
                    echo "</pre>";
                    $response['erro'] = "O Mercado Pago está com problemas para processar pagamentos no momento!";
                }
                $response['status'] = $payment->status;
                $response['status_detail'] = $payment->status_detail;
                $response['id'] = $payment->id;
                break;
        }

        if ($payment->status == 'approved' || $payment->status == 'in_process' || $payment->status == 'pending') {

            $transacaoModel = model('App\Models\TransacaoModel', false);
            //  $transacaoModel->transStart();

            $pedido['clienteFK'] = $_SESSION['cliente'];
            $pedido['pagamento'] = $metodoPagamento;
            $pedido['status'] = 'AGUARDANDO';
            $pedido['total'] = $projeto->valor; // $contents['transaction_amount'];

            $pedido['cep'] = $carrinho['cep'];
            $pedido['envio'] = $carrinho['envio'];
            $pedido['endereco'] = $carrinho['endereco'];
            $pedido['copias'] = $carrinho['copias'];
            $pedido['numero'] = $carrinho['numero'];
            $pedido['complemento'] = $carrinho['complemento'];
            $pedido['bairro'] = $carrinho['bairro'];
            $pedido['cidade'] = $carrinho['cidade'];
            $pedido['uf'] = $carrinho['estado'];
            $pedido['parcelas'] = $contents['installments'];
            $pedido['projetoFK'] = $projeto->id;
            $pedido['nome'] = $carrinho['nome'];
            $pedido['telefone'] = $carrinho['telefone'];
            $pedido['cpf'] = $carrinho['cpf'];
            $pedido['email'] = $carrinho['email'];

            $lastId = $this->insert($pedido);

            $pedidoItemModel = model('App\Models\PedidoItemModel', false);

            if ($carrinho['adicional']) {
                $pedidoItem['pedidoFK'] = $lastId;

                foreach ($adicionais as $adicional) {
                    $pedidoItem['adicionalFK'] = $adicional->id;
                    $pedidoItem['total'] = $adicional->valor;
                    $pedidoItemModel->insert($pedidoItem);
                }
            }

            $transacao['pedidoFK'] = $lastId;
            $transacao['transacao_id'] = $payment->id;
            $transacao['code'] = $payment->status_detail;
            $transacao['status'] = $payment->status;
            $transacao['tipo'] = 'mercadopago';
            $transacaoModel->insert($transacao);

            $response['pedidoId'] = encode($lastId);

            $clienteModel = \model("App\Models\ClienteModel", false);
            $emailModel = \model("App\Models\EmailModel", false);

            $cliente = $clienteModel->find($pedido['clienteFK']);
            $envio['nome'] = $cliente->nome;
            $envio['status'] = 'AGUARDANDO';
            $dadosEmail['mailTo'] = $cliente->email;
            $dadosEmail['subject'] = "Criação do pedido " . str_pad($lastId, 6, 0, STR_PAD_LEFT) . " | " . $pedido->titulo;

            $envio['id'] = $lastId;
            $envio['url'] = PATHSITE . 'pedido-finalizado/' . encode($lastId);
  
            $emails = $emailModel->findAll();

            \ob_start();
            echo \view("templates/email-status-pedido", $envio);
            $dadosEmail['message'] = \ob_get_clean();
            $emailModel->enviarEmail($dadosEmail);

            if ($emails) {
                foreach ($emails as $email) {
                    \ob_start();
                    $dadosEmail['mailTo'] = $email->email;
                    $dadosEmail['subject'] = 'Novo Pedido';
                    echo \view("templates/email-novo-pedido", $pedido);
                    $dadosEmail['message'] = \ob_get_clean();
                    $emailModel->enviarEmail($dadosEmail);
                }
            }
    
            //  $transacaoModel->transCommit();
        } else {
            //  $transacaoModel->transRollback();
        }


        return $response;
    }

    function pagarPedido($id) {
        $save['status'] = 'PAGO';
        $save['id'] = $id;
        $this->save($save);

        $pedido = $this->find($id);

        if ($pedido->status != 'PAGO') {
            $clienteModel = \model("App\Models\ClienteModel", false);

            $emailModel = \model("App\Models\EmailModel", false);

            $cliente = $clienteModel->find($pedido->clienteFK);
            $post['nome'] = $cliente->nome;
            $post['status'] = 'PAGO';
            $dadosEmail['mailTo'] = $cliente->email;
            $dadosEmail['subject'] = "Atualização do pedido " . str_pad($id, 6, 0, STR_PAD_LEFT) . " | " . $pedido->titulo;

            $post['id'] = $id;

            \ob_start();
            echo \view("templates/email-status-pedido", $post);
            $dadosEmail['message'] = \ob_get_clean();
            $emailModel->enviarEmail($dadosEmail);
        }
    }

    function cancelarPedido($id) {

        $pedido = $this->find($id);

        $save['status'] = 'CANCELADO';
        $save['id'] = $id;
        $this->save($save);

        if ($pedido->status != 'CANCELADO') {
            $clienteModel = \model("App\Models\ClienteModel", false);

            $emailModel = \model("App\Models\EmailModel", false);

            $cliente = $clienteModel->find($pedido->clienteFK);
            $post['nome'] = $cliente->nome;
            $post['status'] = 'CANCELADO';
            $dadosEmail['mailTo'] = $cliente->email;
            $dadosEmail['subject'] = "Atualização do pedido " . str_pad($id, 6, 0, STR_PAD_LEFT) . " | " . $pedido->titulo;

            $post['id'] = $id;

            \ob_start();
            echo \view("templates/email-status-pedido", $post);
            $dadosEmail['message'] = \ob_get_clean();
            $emailModel->enviarEmail($dadosEmail);
        }
    }
}
