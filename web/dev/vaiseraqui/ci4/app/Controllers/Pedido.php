<?php

namespace App\Controllers;

class Pedido extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);
        $this->model = model('App\Models\PedidoModel', false);
        $this->tabela = "pedido";
        $this->session->set('menuAdmin', '5');
    }

    public function index()
    {
        \helper(['url', 'date']);
        $request = request();
        $data['get'] = $get = $request->getGet();

        if (!is_numeric($get['page_pedido'])) {
            $paginate = 1;
        } else {
            $paginate = $get['page_pedido'];
        }

        $this->model->orderBy("id DESC");
        $this->model->select('pedido.id, pedido.status, pedido.total, pedido.dtCriacao, c.nome, c.sobrenome, p.titulo as projeto');
        $this->model->join('cliente c', 'c.id = pedido.clienteFK');
        $this->model->join('projeto p', 'p.id = pedido.projetoFK');

        if (isset($get['status']) && $get['status'] != "") {
            $this->model->where("status", $get['status']);
        }

        if (isset($get['procura'])) {
            $get['procura'] = str_replace("0000", "", $get['procura']);
            $this->model->groupStart()
                ->like("pedido.id", $get['procura'])
                ->orLike("c.nome", $get['procura'])
                ->orLike("c.sobrenome", $get['procura'])
                ->groupEnd();
        }

        $data['lista'] = $this->model->paginate(10, 'pedido', $paginate);
        $data['pager'] = $this->model->pager;

        $data['title'] = 'Projetos';
        $data['tabela'] = $this->tabela;
        $data["nomeModel"] = "ProjetoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form()
    {
        helper('form');
        helper('url');

        $request = request();
        $post = $request->getPost();
        $id = decode($this->request->uri->getSegment(4));

        $data['title'] = 'Pedido';
        $data['tabela'] = $this->tabela;

        if ($id) {
            $data["resultado"] = $this->model->find($id);
            if ($post) {
                $post['rastreio'] = \trim($post['rastreio']);
                $this->emailModel = \model('App\Models\EmailModel', false);

                $post["id"] = $id;

                if ($data['resultado']->status != $post['status']) {
                    $dadosEmail['mailTo'] = $post['email'];
                    $dadosEmail['subject'] = "Atualização do pedido " .  str_pad($id, 6, 0, STR_PAD_LEFT) . " | " . $post['projeto'];

                    \ob_start();
                    echo \view("templates/email-status-pedido", $post);
                    $dadosEmail['message'] = \ob_get_clean();
                    $this->emailModel->enviarEmail($dadosEmail);
                } else if (($data['resultado']->rastreio != $post['rastreio']) && !empty($post['rastreio'])) {
                    $dadosEmail['mailTo'] = $post['email'];
                    $dadosEmail['subject'] = "Atualização do pedido " .  str_pad($id, 6, 0, STR_PAD_LEFT) . " | " . $post['projeto'];

                    \ob_start();
                    echo \view("templates/email-envio-rastreio", $post);
                    $dadosEmail['message'] = \ob_get_clean();
                    $this->emailModel->enviarEmail($dadosEmail);                    
                }

                $data['salvou'] = $this->model->save($post);
                $data["erros"] = $this->model->errors();
            }

            $this->clienteModel = \model('App\Models\ClienteModel', false);
            $this->projetoModel = \model('App\Models\ProjetoModel', false);
            $this->pedidoItemModel = \model('App\Models\PedidoItemModel', false);
            $this->pjAdicionalModel = \model('App\Models\PjAdicionalModel', false);

            $data["resultado"] = $this->model->find($id);
            $data['cliente'] = $this->clienteModel->find($data["resultado"]->clienteFK);
            $data['projeto'] = $this->projetoModel->find($data["resultado"]->projetoFK);
            $data['adicionais'] = $this->pedidoItemModel->where("pedidoFK", $data['resultado']->id)->findAll();

            foreach ($data['adicionais'] as $key => $adicional) {
                $this->pjAdicionalModel->resetQuery();
                $data['adicionais'][$key]->info = $this->pjAdicionalModel->find($adicional->adicionalFK);
            }
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    public function finalizarPedido()
    {
        $retorno = $this->model->finalizar();
        echo json_encode($retorno);
    }

    public function webhook()
    {
        $webhookModel = model('App\Models\WebhookModel', false);
        $transacaoModel = model('App\Models\TransacaoModel', false);
        $pedidoModel = model('App\Models\PedidoModel', false);
        $request = \Config\Services::request();

        $body = $request->getBody();

        $corpo = json_decode($body);
       
        $webhook['codigo'] = $corpo->id;
        $webhook['mensagem'] = $body;
        
        $pedidoModel = \model("App\Models\PedidoModel", false);
        $transacaoModel = \model("App\Models\TransacaoModel", false);

        \MercadoPago\SDK::setAccessToken(MERCADOPAGOTOKEN);
        switch ($corpo->type) {
            case "payment":
                $payment = \MercadoPago\Payment::find_by_id($corpo->data->id);

                $transacaoModel->where('transacao_id', $corpo->data->id);
                $transacao = $transacaoModel->find()[0];

                $pedido = $pedidoModel->find($transacao->pedidoFK);

                switch ($payment->status) {
                    case 'rejected':
                        $pedidoModel->cancelarPedido($pedido->id);
                        break;
                    case 'approved':
                        $pedidoModel->pagarPedido($pedido->id);
                        break;
                }

                //  $payment = \MercadoPago\Payment::find_by_id($corpo->data->id);
                break;
            case "plan":
                $plan = \MercadoPago\Plan::find_by_id($corpo->data->id);
                break;
            case "subscription":
                $plan = \MercadoPago\Subscription::find_by_id($corpo->data->id);
                break;
            case "invoice":
                $plan = \MercadoPago\Invoice::find_by_id($corpo->data->id);
                break;
            case "point_integration_wh":
                // $_POST contém as informações relacionadas à notificação.
                break;
        }

        $webhookModel->select('id');
        $webhookModel->where('codigo', $corpo->id);
        $jaFoi = $webhookModel->find()[0];

        if (!$jaFoi) {
            $webhookModel->insert($webhook);
            $transacaoModel->select('pedidoFK');
            $transacaoModel->where('transacao_id', $corpo->data->id);
            $transacao = $transacaoModel->find()[0];

            if ($transacao) {
                $pedido = $pedidoModel->find($transacao->pedidoFK);
                if ($corpo->type == 'order.paid' && $pedido) {
                    $pedidoModel->pagarPedido($pedido->id);
                } else if ($corpo->type == 'order.canceled') {
                    $pedidoModel->cancelarPedido($pedido->id);
                }
            }
        }
    }

    public function selecionaEndereco()
    {
        $request = \Config\Services::request();
        $post = $request->getPost();

        $id = decode($post['id']);

        $_SESSION['endereco'] = $id;

        echo json_encode($id);
    }

    public function informacoesCobranca()
    {
        $clienteEnderecoModel = model('App\Models\ClienteEnderecoModel', false);
        $retorno =  $clienteEnderecoModel->find($_SESSION['endereco']);

        echo json_encode($retorno);
    }

    //--------------------------------------------------------------------
}
