<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nome', 'sobrenome', 'email', 'senha', 'telefone', 'cpf', 'arquivo', 'ordem','recuperar', 'cidade', 'estado'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'nome' => 'required',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'Nome obrigatório'
        ],
    ];
    protected $skipValidation = false;

    public function areaRestrita() {
        $this->session = \Config\Services::session();
        $request = request();
        $segments = $request->getUri()->getSegments();
        $data['pagina'] = 1;
        \helper("utils");

        if ($this->session->get("cliente")) {
            $data['cliente'] = $this->find($this->session->get("cliente"));
        }

        switch ($segments[1]) {
            case "login":
                $data['pagina'] = 7;
                $data['page'] = "login";
                $post = $request->getPost();
                $get = $request->getGet();
                
                if ($this->session->get("cliente")) {
                    \header("Location: " . PATHSITE . 'area-do-cliente/dashboard/', true, 301);
                    exit();
                }

                if ($post) {
                    if (!$post['email'] || !$post['senha']) {
                        $data['erro'] = "Email e senha necessários!";
                    } else {
                        $result = $this->where('email', $post['email'])->where('senha', sha1($post['senha']))->find()[0];
                        if ($result) {
                            $this->session->set('cliente', $result->id);
                                              
                    if($_SESSION['projetoLogin']) {
                            if($_SESSION['adicionalLogin']) {
                               foreach($_SESSION['adicionalLogin'] as $adic) {
                                   $adicional .= 'adicional%5B%5D='.$adic . '&';
                               }                               
                       }
                          \header("Location: " .PATHSITE . 'finalize-pedido/?'. $adicional . "&projeto=" . $_SESSION['projetoLogin'] );
                                                  unset($_SESSION['projetoLogin']);
                        unset($_SESSION['adicionalLogin']);
                            exit();
                        }else {                            
                            \header("Location: " . PATHSITE . 'area-do-cliente/dashboard', true, 301);
                            exit();
                        }
                        } else {
                            $data["erro"] = "Usuário/senha incorreta!";
                        }
                    }
                }

                if ($get['sucesso']) {
                    $data['sucesso'] = $get['sucesso'];
                }

                break;
            case "logout":
                $this->session->destroy("cliente");
                \header("Location: " . PATHSITE . 'area-do-cliente/login/', true, 301);
                exit();
                break;
            case "cadastro-1":
                $data['pagina'] = 8;
                $data['page'] = 'cadastro-1';
                $post = $request->getPost();

                if ($this->session->get("cliente")) {
                    \header("Location: " . PATHSITE . 'area-do-cliente/dashboard/', true, 301);
                    exit();
                }

                if ($post) {
                    if (!$post['nome'] || !$post['sobrenome']) {
                        $data['erro'] = "Informe o nome completo!";
                    } else {
                        $cpfSearch = $this->where("cpf", $post['cpf'])->find()[0];
                        if ($cpfSearch) {
                            $data['erro'] = "CPF já cadastrado";
                        } else {
                            $this->session->set("cadastro", $post);
                            \header("Location: " . PATHSITE . "area-do-cliente/cadastro-2", true, 301);
                            exit();
                        }
                    }
                }
                break;
            case "cadastro-2":
                $data['pagina'] = 8;
                $data['page'] = 'cadastro-2';
                $post = $request->getPost();

                if ($this->session->get("cliente")) {
                    \header("Location: " . PATHSITE . 'area-do-cliente/dashboard/', true, 301);
                    exit();
                }

                if ($post) {
                    if (!$post['email']) {
                        $data['erro'] = "Informe um e-mail!";
                    } else {
                        $emailSearch = $this->where("email", $post['email'])->find()[0];
                        if ($emailSearch) {
                            $data['erro'] = "E-mail já cadastrado";
                        } else {
                            if ($post['senha'] != $post['senha2']) {
                                $data['erro'] = "Senhas não coincidem";
                            } else {
                                $post['senha'] = \sha1($post['senha']);

                                foreach ($this->session->get("cadastro") as $key => $value) {
                                    $post[$key] = $value;
                                }
                                $this->session->destroy("cadastro");
                                $cadastrar = $this->insert($post);

                                if ($cadastrar) {
                                    $sucesso = "Cadastro concluído!";

                                    $cliente = $this->where("email", $post['email'])->find()[0];
                                    $this->session->set("cliente", $cliente->id);

                                    if ($this->session->get("projetoLoggin")) {

                                        $projeto = $this->session->get("projetoLoggin");
                                        \redirect(PATHSITE . "finalize-pedido?projeto={$projeto}");
                                        exit();
                                    } else {

                                        \redirect(PATHSITE . "area-do-cliente/dashboard?sucesso=" . \urlencode($sucesso));
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                }

                break;
            case "dashboard":

                $data['pagina'] = 9;
                $data['page'] = 'dashboard';
                $get = $request->getGet();

                $this->pedidoModel = \model("App\Models\PedidoModel", false);
                $this->pedidoModel->orderBy('id DESC');
                $data['meusPd'] = $this->pedidoModel->where("clienteFK", $_SESSION['cliente'])->findAll(4);

                $this->projetoModel = \model("App\Models\ProjetoModel", false);
                $this->pjFotoModel = model('App\Models\PjFotoModel', false);

                foreach ($data['meusPd'] as $key => $pedido) {
                    $this->projetoModel->resetQuery();
                    $data['meusPd'][$key]->projeto = $this->projetoModel->find($pedido->projetoFK);
                }

                foreach ($data['meusPd'] as $key => $pedido) {
                    $this->pjFotoModel->resetQuery();
                    $this->pjFotoModel->where("projetoFK", $data['meusPd'][$key]->projetoFK);
                    $this->pjFotoModel->orderBy("ordem ASC, id ASC");
                    $data['meusPd'][$key]->foto = $this->pjFotoModel->findAll(1);
                }

                if ($get['sucesso']) {
                    $data['sucesso'] = $get['sucesso'];
                }
                break;
            case "meus-dados":
                $data['pagina'] = 10;
                $data['page'] = 'meus-dados';
                $post = $request->getPost();
                \helper("encrypt");

                $this->clPagamentoModel = \model("App\Models\ClPagamentoModel", false);

                if ($post) {

                    if (isset($post['dados'])) {
                        if (isset($post['oldpassword'])) {

                            if (\sha1($post['oldpassword']) == $data['cliente']->senha) {
                                if ($post['password'] == $post['password2']) {
                                    $post['senha'] = \sha1($post['password']);
                                } else {
                                    $data['erro'] = "Repita a nova senha corretamente!";
                                }
                            } else {
                                $data['erro'] = "Senhas antigas não coincidem";
                            }
                        }

                        if ($post['apagararquivo']) {
                            $post['arquivo'] = NULL;
                        }
                        $img = $request->getFile("arquivo");
                        if ($img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = date('Y-m-d') . $img->getRandomName();
                                $post["arquivo"] = $newName;
                                $img->move(PATHHOME . "/uploads/cliente/", $newName);
                                try {
                                    echo View('templates/tinypng');

                                    $upload_path = "uploads/cliente/";
                                    $upload_path_root = PATHHOME . $upload_path;

                                    $file_name = $img->getName();
                                    $file_path = $upload_path_root . "/" . $file_name;

                                    $tinyfile = \Tinify\fromFile($file_path);
                                    $tinyfile->toFile($file_path);

                                    $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/cliente/" . $newName));
                                    imagepalettetotruecolor($img);
                                    imagealphablending($img, true);
                                    imagesavealpha($img, true);
                                    imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                                    imagedestroy($img);
                                } catch (\Tinify\ClientException $e) {
                                    
                                }
                            }
                        }

                        $salvar = $this->save($post);
                        if ($salvar) {
                            $data['sucesso'] = "Informações atualizadas!";
                        } else {
                            $data['erro'] = $this->errors()[0];
                        }
                    } else if (isset($post['metodoPagamento'])) {
                        $incluir = $this->clPagamentoModel->save($post);

                        if ($incluir) {
                            $data['sucesso'] = "Informações atualizadas!";
                        } else {
                            $data['erro'] = $this->errors()[0];
                        }
                    }
                }

                $data['clCartoes'] = $this->clPagamentoModel->where("clienteFK", $data['cliente']->id)->findAll();
                $data['cliente'] = $this->find($this->session->get("cliente"));
                break;
            case "meus-projetos":
                $data['pagina'] = 11;
                $data['page'] = 'meus-projetos';
                \helper("encrypt");

                $this->pedidoModel = \model("App\Models\PedidoModel", false);
                $data['meusPd'] = $this->pedidoModel->where("clienteFK", $_SESSION['cliente'])->findAll();

                $this->projetoModel = \model("App\Models\ProjetoModel", false);
                $this->pjFotoModel = model('App\Models\PjFotoModel', false);

                foreach ($data['meusPd'] as $key => $pedido) {
                    $data['meusPd'][$key]->projeto = $this->projetoModel->resetQuery()->find($pedido->projetoFK);
                    $data['meusPd'][$key]->foto = $this->pjFotoModel
                            ->resetQuery()
                            ->where("projetoFK", $data['meusPd'][$key]->projeto->id)
                            ->orderBy("ordem ASC, id ASC")
                            ->find()[0];
                }
                
                if ($segments[2]) {
                    $data['pagina'] = 12;
                    $data['page'] = 'detalhes-do-pedido';
                    \helper("date");

                    $data['pdAtual'] = $this->pedidoModel->where("clienteFK", $_SESSION['cliente'])->find($segments[2]);

                    if ($data['pdAtual']) {

                        $this->projetoModel->resetQuery();
                        $data['pdAtual']->projeto = $this->projetoModel->find($data['pdAtual']->projetoFK);

                        $this->pjFotoModel->resetQuery();
                        $this->pjFotoModel->where("projetoFK", $data['pdAtual']->projetoFK);
                        $data['pdAtual']->fotos = $this->pjFotoModel->orderBy("ordem ASC, id ASC")->limit(1)->find()[0];
                        
                        $pedidoItemModel = model('App\Models\PedidoItemModel', false);
                        $pedidoItemModel->select(' GROUP_CONCAT(adicionalFK) as adicionais');
                        $pedidoItemModel->where('pedidoFK', $data['pdAtual']->id);
                        $itens = $pedidoItemModel->find()[0];
                        
                       $this->pjAdicionalModel = model('App\Models\PjAdicionalModel', false);

                       if($itens->adicionais) {
                        $adicionais = \explode(",", $itens->adicionais);
                        $data['pdAtual']->adicionais = $this->pjAdicionalModel->whereIn("id", $adicionais)->findAll();
                       }
                        
                        $transacaoModel = \model("App\Models\TransacaoModel", false);
                        $transacaoModel->where('pedidoFK', $data['pdAtual']->id);
                        $data['transacao'] = $transacaoModel->find()[0];

                       //  \MercadoPago\SDK::setAccessToken(\MERCADOPAGOTOKEN);

                      //  $data['payment'] = \MercadoPago\Payment::find_by_id($data['transacao']->transacao_id);

                        if ($segments[3] == 'visualizar') {
                            $data['pagina'] = 13;
                            $data['page'] = 'visualizar-projeto';

                            $this->pjFotoModel->resetQuery();
                            $data['pdAtual']->projeto->fotos = $this->pjFotoModel->where("projetoFK", $data['pdAtual']->projetoFK)->orderBy("ordem ASC, id ASC")->findAll();

                            $this->pjVideoModel = model('App\Models\PjVideoModel', false);
                            $data['pdAtual']->projeto->videos = $this->pjVideoModel->where("projetoFK", $data['pdAtual']->projetoFK)->orderBy("ordem ASC, id ASC")->findAll();

                            $this->pjPlantaModel = model('App\Models\PjPlantaModel', false);
                            $data['pdAtual']->projeto->plantas = $this->pjPlantaModel->where("projetoFK", $data['pdAtual']->projetoFK)->orderBy("ordem ASC, id ASC")->findAll();

                            $data['txDireitosAutorais'] = $this->textoModel = model('App\Models\TextoModel', false)->find(14);
                        } else if ($segments[3] == 'baixar') {
                            $data['pagina'] = 14;
                            $data['page'] = 'baixar-projeto';

                            $this->pjFotoModel->resetQuery();
                            $data['pdAtual']->projeto->fotos = $this->pjFotoModel->where("projetoFK", $data['pdAtual']->projetoFK)->orderBy("ordem ASC, id ASC")->findAll();
                        }
                    } else {
                        header("Location: " . PATHSITE . 'area-do-cliente/meus-projetos/');
                        exit();
                    }
                }
                break;
            case "pedido":
                $data['pagina'] = 15;
                $data['page'] = 'finalize-seu-pedido';
                break;
        }

        $data['segments'] = $segments;
        $data['header'] = 'cliente-header';
        $data['footer'] = 'cliente-footer';
        return $data;
    }

    public function isLogged() {
        if ($_SESSION['cliente']) {
            return true;
        } else {
            header("Location: " . PATHSITE . 'area-do-cliente/login/');
            exit();
        }
    }

    public function loginFacebook($post) {
        $this->session = \Config\Services::session($config);
        $this->resetQuery();
        $this->where("email", $post["email"]);
        $temCliente = $this->find()[0];

        if (!$temCliente) {
            $this->resetQuery();
            $post['nome'] = $post['titulo'];
            $id = $this->insert($post);
            $this->resetQuery();
            $temCliente = $this->find($id);
        }
        if ($temCliente) {
            $this->session->set('cliente', $temCliente->id);
        }
    }

    public function loginGoogle($payload) {
        $this->resetQuery();
        $this->where("email", $payload["email"]);
        $existeConta = $this->find()[0];
        $this->session = \Config\Services::session($config);

        if ($existeConta) {
            
        } else {
            $salvar["email"] = $payload["email"];
            $salvar["nome"] = $payload["name"];

            $this->insert($salvar);

            $this->resetQuery();
            $this->where("email", $payload["email"]);
            $existeConta = $this->find()[0];
        }

        if ($existeConta) {
            $this->session->set('cliente', $existeConta->id);
            
                if ($_SESSION['projetoLogin']) {
                if ($_SESSION['adicionalLogin']) {
                    foreach ($_SESSION['adicionalLogin'] as $adic) {
                        $adicional .= 'adicional%5B%5D=' . $adic . '&';
                    }
                }
     
             ?> 
            <meta http-equiv="refresh" content="0; url=<?=PATHSITE?>finalize-pedido/?<?=$adicional?>&projeto=<?=$_SESSION['projetoLogin']?>" />
<?   
                unset($_SESSION['projetoLogin']);
                unset($_SESSION['adicionalLogin']);
                exit();
            } else {?>
               <meta http-equiv="refresh" content="0; url=<?= PATHSITE ?>area-do-cliente/dashboard/">      
           <? }
            exit();
        }
    }
    
    public function favoritar($id,$cliente, $cadastro){
         $clienteFavoritoModel = model('App\Models\ClienteFavoritoModel', false);
        $clienteFavoritoModel->select("id");
        $clienteFavoritoModel->where("produtoFK",$id);
        $clienteFavoritoModel->where("clienteFK", $cliente);
        $temFavorito = $clienteFavoritoModel->find()[0];

        if ($temFavorito && !$cadastro) {
            $clienteFavoritoModel->delete(['id' => $temFavorito->id]);
        } else {
            $post['clienteFK'] = $cliente;
            $post['produtoFK'] = $id;
            $clienteFavoritoModel->save($post);
        }
        unset($_SESSION['favoritar']);
    }
    
}
