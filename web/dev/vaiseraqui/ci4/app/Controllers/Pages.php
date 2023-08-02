<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller {

    public function buscaGeral() {
        helper('text');
        $this->session = \Config\Services::session($config);
        $this->redeSocialModel = model('App\Models\RedeSocialModel', false);
        $this->redeSocialModel->where("link != '' AND link IS NOT NULL ");
        $this->redeSocialModel->where("imagem != '' AND imagem IS NOT NULL ");
        $this->redeSocialModel->orderBy("ordem ASC");
        $data['redes'] = $this->redeSocialModel->findAll();

        $this->configModel = model('App\Models\ConfigModel', false);
        $data['configs'] = $this->configModel->find(1);

        $this->analyticModel = model('App\Models\AnalyticModel', false);
        $data['analytics'] = $this->analyticModel->findAll();

        $this->whatsappModel = model('App\Models\WhatsappModel', false);
        $data['whatsapps'] = $this->whatsappModel->findAll();

        $enderecoModel = model('App\Models\EnderecoModel', false);
        $enderecoModel->orderBy("ordem ASC, id DESC");
        $data['enderecos'] = $enderecoModel->findAll();

        $this->textoModel = model('App\Models\TextoModel', false);

        $this->bannerModel = \model('App\Models\BannerModel', false);
        $data['banner'] = $this->bannerModel->find(1);

        $this->faqModel = \model("App\Models\FaqModel", false);
        $data['faqs'] = $this->faqModel->findAll(1);

        $this->reviewModel = \model("App\Models\ReviewModel", false);
        $data['depoimentos'] = $this->reviewModel->findAll(1);

        $removeChars = array("-", "(", ")", " ");
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");

        if ($iphone || $android || $palmpre || $ipod || $berry == true) {
            $usaApi = "api";
        } else {
            $usaApi = "web";
        }
        $data["whatsapp"] = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $data["configs"]->telefone);

        $data["cookies"] = $this->session->get("cookies");
        if ($_POST["cookies"]) {
            $this->session->set("cookies", TRUE);
            $data["cookies"] = TRUE;
        }

        return $data;
    }

    public function index() {
        $data = $this->buscaGeral();
        $data['pagina'] = 1;
        $data['bodyClass'] = 'home';

        $this->projetoModel = \model("App\Models\ProjetoModel", false);

        $data['txFiltro'] = $this->textoModel->find(8);

        $query = $this->projetoModel->select("pavimento, loteminimo, quartos, suites, banheiros, vagas, areautil")->findAll();

        $result = array(
            'pavimentos' => array(),
            'loteminimo' => array(),
            'dormitorios' => array(),
            'banheiros' => array(),
            'vagas' => array(),
            'areautil' => array(),
        );

        foreach ($query as $row) {
            if (!in_array($row->pavimento, $result['pavimentos'])) {
                $result['pavimentos'][] = $row->pavimento;
            }
            if (!in_array($row->loteminimo, $result['loteminimo'])) {
                $result['loteminimo'][] = $row->loteminimo;
            }
            if (!in_array($row->quartos + $row->suites, $result['dormitorios'])) {
                $result['dormitorios'][] = $row->quartos + $row->suites;
            }
            if (!in_array($row->banheiros, $result['banheiros'])) {
                $result['banheiros'][] = $row->banheiros;
            }
            if (!in_array($row->vagas, $result['vagas'])) {
                $result['vagas'][] = $row->vagas;
            }
            if (!in_array($row->areautil, $result['areautil'])) {
                $result['areautil'][] = $row->areautil;
            }
        }
        $data['filtros'] = $result;

        $data['txPjRecentes'] = $this->textoModel->find(9);
        $data['txPjRelevantes'] = $this->textoModel->find(10);

        $this->pjFotoModel = \model("App\Models\PjFotoModel", false);

        $data['pjRecentes'] = $this->projetoModel->orderBy("dtCriacao DESC, id ASC")->findAll();
        foreach ($data['pjRecentes'] as $ind => $projeto) {
            $this->pjFotoModel->resetQuery();
            $this->pjFotoModel->where("projetoFK", $projeto->id);
            $this->pjFotoModel->orderBy("ordem ASC, id DESC");
            $data['pjRecentes'][$ind]->fotos = $this->pjFotoModel->findAll(1);
        }

        $data['pjRelevantes'] = $this->projetoModel->orderBy("ordem ASC, id DESC")->findAll(3);
        foreach ($data['pjRelevantes'] as $ind => $projeto) {
            $this->pjFotoModel->resetQuery();
            $this->pjFotoModel->where("projetoFK", $projeto->id);
            $this->pjFotoModel->orderBy("ordem ASC, id ASC");
            $data['pjRelevantes'][$ind]->fotos = $this->pjFotoModel->findAll(1);
        }

        $data['sobreNos'] = $this->textoModel->find(1);
        $data['txDepoimentos'] = $this->textoModel->find(3);

        $this->reviewModel->resetQuery();
        $data['depoimentos'] = $this->reviewModel->orderBy("ordem ASC, id ASC")->findAll();

        $data['txBlog'] = $this->textoModel->find(6);

        $this->artigoModel = \model('App\Models\ArtigoModel', false);
        $data['artigos'] = $this->artigoModel->orderBy("ordem ASC, id ASC")->findAll(3);

        $this->bCategoria = \model('App\Models\BCategoriaModel', false);
        $this->bCategoria->where("bcategoria.id in (select categoriaFK from artigo WHERE artigo.excluido IS null)");
        $data['BCategorias'] = $this->bCategoria->findAll();

        if ($data['BCategorias']) {
            foreach ($data['BCategorias'] as $categoria) {
                $data['cats'][$categoria->id] = $categoria->titulo;
            }
        }

        $data['txFaq'] = $this->textoModel->find(4);

        $this->faqModel->resetQuery();
        $data['faqs'] = $this->faqModel->orderBy("ordem ASC, id DESC")->findAll();

        $data['txContato'] = $this->textoModel->find(7);

        if (isset($_POST['enviar'])) {
            $request = request();
            $post = $request->getPost();
            $data["contato"] = $this->recebeEmail($data["configs"]->private_recaptcha, $post);

            if ($data["contato"] == 1) {
                $emailModel = model('App\Models\EmailModel', false);
                $data["sucesso"] = "Contato enviado com sucesso!";
                $data["salvou"] = TRUE;
                $result = $emailModel->find(1);
                $dados["mailTo"] = $result->email;
                $dados["subject"] = "Contato";
                ob_start();
                echo View('templates/email-template', $post);
                $dados["message"] = ob_get_clean();
                $emailModel->enviarEmail($dados);
            } else {
                echo "falha no recaptcha";
                $data["erro"] = $data["contato"][0];
            }
        }

        if (!$data["metatag"]) {
            $this->metatagModel = model('App\Models\MetatagModel', false);
            $data["metatag"] = $this->metatagModel->find($data["pagina"]);
        }

        if (!$data['metatag']->description) {
            $data['metatag']->description = character_limiter(strip_tags($data['metatag']->description), 160);
        }

        echo view('templates/header', $data);
        echo view('pages/home', $data);
        echo view('templates/footer', $data);
    }

    public function redirects($segments) {
        
    }

    public function view($page = 'home') {
        $data = $this->buscaGeral();
        $segments = $this->request->uri->getSegments();
        $this->redirects($segments);

        $header = "header";
        $footer = "footer";

        switch ($page) {
            case "sobre-nos":
                $data['pagina'] = 2;

                $data['sobreNos'] = $this->textoModel->find(1);

                $this->aspectoModel = \model("App\Models\AspectoModel", false);
                $data['aspectos'] = $this->aspectoModel->orderBy("ordem ASC, id DESC")->findAll();

                $data['depoimento'] = $this->textoModel->find(2);

                $data['txInstagram'] = $this->textoModel->find(5);
                $data['igInfo'] = $this->redeSocialModel->find(2);
                $data['bodyClass'] = 'page-about-us';
                break;
            case "projetos":
                $data['bodyClass'] = 'project-list';
                $data['pagina'] = 3;
                $segments = $this->request->uri->getSegments();
                $request = \request();
                $post = $request->getPost();
                $data['get'] = $get = $request->getGet();

                if (!is_numeric($get['page_projetos'])) {
                    $paginate = 1;
                } else {
                    $paginate = $get['page_projetos'];
                }
                if (!is_numeric($get['page_filtrados'])) {
                    $paginate = 1;
                } else {
                    $paginate = $get['page_filtrados'];
                }

                $data['txFiltro'] = $this->textoModel->find(8);
                $data['txPjRecentes'] = $this->textoModel->find(9);
                $data['txPjRelevantes'] = $this->textoModel->find(10);
                $data['txOutrosPj'] = $this->textoModel->find(11);

                $this->pjFotoModel = \model("App\Models\PjFotoModel", false);
                $this->projetoModel = \model("App\Models\ProjetoModel", false);

                $query = $this->projetoModel->select("pavimento, loteminimo, quartos, suites, banheiros, vagas, areautil")->findAll();

                $result = array(
                    'pavimentos' => array(),
                    'loteminimo' => array(),
                    'dormitorios' => array(),
                    'banheiros' => array(),
                    'vagas' => array(),
                    'areautil' => array(),
                );

                foreach ($query as $row) {
                    if (!in_array($row->pavimento, $result['pavimentos'])) {
                        $result['pavimentos'][] = $row->pavimento;
                    }
                    if (!in_array($row->loteminimo, $result['loteminimo'])) {
                        $result['loteminimo'][] = $row->loteminimo;
                    }
                    if (!in_array($row->quartos + $row->suites, $result['dormitorios'])) {
                        $result['dormitorios'][] = $row->quartos + $row->suites;
                    }
                    if (!in_array($row->banheiros, $result['banheiros'])) {
                        $result['banheiros'][] = $row->banheiros;
                    }
                    if (!in_array($row->vagas, $result['vagas'])) {
                        $result['vagas'][] = $row->vagas;
                    }
                    if (!in_array($row->areautil, $result['areautil'])) {
                        $result['areautil'][] = $row->areautil;
                    }
                }
                $data['filtros'] = $result;

                $data['pjRecentes'] = $this->projetoModel->orderBy("dtCriacao DESC, id ASC")->findAll();
                foreach ($data['pjRecentes'] as $ind => $projeto) {
                    $this->pjFotoModel->resetQuery();
                    $this->pjFotoModel->where("projetoFK", $projeto->id);
                    $this->pjFotoModel->orderBy("ordem ASC, id ASC");
                    $data['pjRecentes'][$ind]->fotos = $this->pjFotoModel->findAll(1);
                }

                $data['pjRelevantes'] = $this->projetoModel->orderBy("ordem ASC, id DESC")->findAll(3);
                foreach ($data['pjRelevantes'] as $ind => $projeto) {
                    $this->pjFotoModel->resetQuery();
                    $this->pjFotoModel->where("projetoFK", $projeto->id);
                    $this->pjFotoModel->orderBy("ordem ASC, id ASC");
                    $data['pjRelevantes'][$ind]->fotos = $this->pjFotoModel->findAll(1);
                }

                $data['pjOutros'] = $this->projetoModel->orderBy("ordem ASC, id DESC")->paginate(1, 'projetos', $paginate);
                foreach ($data['pjOutros'] as $ind => $projeto) {
                    $this->pjFotoModel->resetQuery();
                    $this->pjFotoModel->where("projetoFK", $projeto->id);
                    $this->pjFotoModel->orderBy("ordem ASC, id ASC");
                    $data['pjOutros'][$ind]->fotos = $this->pjFotoModel->findAll(1);
                }
                $data['pager'] = $this->projetoModel->pager;

                $data['lotesMinimos'] = $this->projetoModel->select("dimensoes")->findAll();

                $data['pjAtual'] = $this->projetoModel->where("identificador", $segments[1])->find()[0];

                if ($segments[1] && $data['pjAtual']) {
                    $data['pagina'] = 4;
                    $page = 'projetos-interna';

                    $this->pjFotoModel->resetQuery();
                    $data['pjAtualFotos'] = $this->pjFotoModel->where('projetoFK', $data['pjAtual']->id)->orderBy('ordem ASC, id DESC')->findAll();
                    $data['pjAtual']->fotos = $data['pjAtualFotos'];

                    $this->pjPlantaModel = \model("App\Models\PjPlantaModel", false);
                    $data['pjAtualPlantas'] = $this->pjPlantaModel->where('projetoFK', $data['pjAtual']->id)->orderBy('ordem ASC, id DESC')->findAll();
                    $data['pjAtual']->plantas = $data['pjAtualPlantas'];

                    $this->pjVideoModel = \model("App\Models\PjVideoModel", false);
                    $data['pjAtualVideos'] = $this->pjVideoModel->where('projetoFK', $data['pjAtual']->id)->orderBy('ordem ASC, id DESC')->findAll();
                    $data['pjAtual']->videos = $data['pjAtualVideos'];

                    $this->pjAdicionalModel = \model("App\Models\PjAdicionalModel", false);
                    $data['pjAtualAdicionais'] = $this->pjAdicionalModel->where('projetoFK', $data['pjAtual']->id)->orderBy('ordem ASC, id DESC')->findAll();
                    $data['pjAtual']->adicionais = $data['pjAtualAdicionais'];

                    $data['txDireitosAutorais'] = $this->textoModel->find(14);

                    $this->projetoModel->resetQuery();
                    $this->projetoModel->where("pavimento", $data['pjAtual']->pavimento)->where("id != {$data['pjAtual']->id}");
                    $data['pjRelacionados'] = $this->projetoModel->orderBy("ordem ASC, id DESC")->findAll();

                    foreach ($data['pjRelacionados'] as $ind => $projeto) {
                        $this->pjFotoModel->resetQuery();
                        $this->pjFotoModel->where("projetoFK", $projeto->id);
                        $this->pjFotoModel->orderBy("ordem ASC, id ASC");
                        $data['pjRelacionados'][$ind]->fotos = $this->pjFotoModel->findAll(1);
                    }
                } else if ($segments[1]) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
                }

                if ($get && !$get['page_projetos']) {
                    $this->projetoModel->resetQuery();

                    if (isset($get['dormitorios'])) {
                        $this->projetoModel->whereIn("(quartos + suites)", $get['dormitorios']);
                        unset($get['dormitorios']);
                    }

                    if (isset($get['areautil'])) {
                        $this->projetoModel->groupStart();

                        foreach ($get['areautil'] as $condicao) {
                            $this->projetoModel->orWhere("areautil {$condicao}");
                        }

                        $this->projetoModel->groupEnd();
                        unset($get['areautil']);
                    }

                    unset($get['page_filtrados']);

                    foreach ($get as $campos => $valores) {
                        $this->projetoModel->whereIn($campos, $valores);
                    }
                    $data['pjFiltrados'] = $this->projetoModel->paginate(10, 'filtrados', $paginate);
                    $data['pagerFiltro'] = $this->projetoModel->pager;
                }

                break;
            case "blog":
                $data['bodyClass'] = 'page-blog-list';
                $data['pagina'] = 5;
                $segments = $this->request->uri->getSegments();
                $data['get'] = $get = \request()->getGet();

                $data['txBlog'] = $this->textoModel->find(6);

                if (!is_numeric($get['page_blog'])) {
                    $paginate = 1;
                } else {
                    $paginate = $get['page_blog'];
                }

                $this->artigoModel = \model("App\Models\ArtigoModel", false);
                $data['artigos'] = $this->artigoModel->orderBy("ordem ASC, id DESC")->paginate(10, 'blog', $paginate);
                $data['pager'] = $this->artigoModel->pager;

                $this->bCategoria = \model('App\Models\BCategoriaModel', false);
                $this->bCategoria->where("bcategoria.id in (select categoriaFK from artigo WHERE artigo.excluido IS null)");
                $data['BCategorias'] = $this->bCategoria->findAll();

                if ($data['BCategorias']) {
                    foreach ($data['BCategorias'] as $categoria) {
                        $data['cats'][$categoria->id] = $categoria->titulo;
                    }
                }

                $data['artigoAtual'] = $this->artigoModel->where("identificador", $segments[1])->find()[0];

                if ($segments[1] && $data['artigoAtual']) {
                    $page = 'blog-post';
                    \helper("url");
                    $data['crrUrl'] = \current_url();

                    $this->artigoModel->resetQuery();
                    $this->artigoModel->where("categoriaFK", $data['artigoAtual']->categoriaFK);
                    $this->artigoModel->where("id != {$data['artigoAtual']->id}");
                    $data['artigosRelacionados'] = $this->artigoModel->findAll();
                } else if ($segments[1]) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
                }

                if ($get) {
                    $this->artigoModel->resetQuery();

                    if ($get['page_blog']) {
                        unset($get['page_blog']);
                    }

                    if (!empty($get['procura'])) {
                        $data['artigos'] = $this->artigoModel->like("titulo", $get['procura'])->orLike("texto", $get['procura'])->orLike("chamada", $get['procura'])->paginate(1, 'blog', $paginate);
                        $data['pager'] = $this->artigoModel->pager;
                        unset($get['categoria']);
                    }

                    if (!empty($get['categoria'])) {
                        $data['artigos'] = $this->artigoModel->where("categoriaFK", $get['categoria'])->paginate(1, 'blog', $paginate);
                        $data['pager'] = $this->artigoModel->pager;
                    }
                    // exit;
                }
                break;
            case "contato":
                $data['bodyClass'] = 'page-contact';
                $data['pagina'] = 6;
                $data['txContato'] = $this->textoModel->find(7);
                break;
            case "politica-de-privacidade":
                $data['bodyClass'] = 'home';
                $data["pagina"] = 2;
                $data['politica'] = $this->textoModel->find(13);
                break;
            case "termos-de-uso":
                $data['bodyClass'] = 'home';
                $data["pagina"] = 3;
                $data['termos'] = $this->textoModel->find(12);

                $this->workshopModel = \model('App\Models\WorkshopModel', false);
                $this->workshopModel->orderBy("ordem ASC, id DESC");
                $data['workshops'] = $this->workshopModel->findAll();
                break;
            case 'finalize-pedido':
                $request = \request();
                $data['get'] = $get = $request->getGet();
                $projetoModel = \model("App\Models\ProjetoModel", false);

                if (!$_SESSION['cliente']) {
                    $this->session->set("projetoLogin", $get['projeto']);
                    $this->session->set("adicionalLogin", $get['adicional']);
                }

                $this->clienteModel = \model('App\Models\ClienteModel', false);
                $this->clienteModel->isLogged();

                $data['clienteLogado'] = $this->clienteModel->find($_SESSION['cliente']);

                $data['bodyClass'] = 'finalize-your-order';

                $projetoAdicionalModel = \model("App\Models\PjAdicionalModel", false);

                $data['pagina'] = 15;

                $projetoModel->where('identificador', $get['projeto']);
                $data['projeto'] = $projetoModel->find()[0];

                $data['valorImpressao'] = $data['projeto']->impressao;

                $projetoAdicionalModel->where('projetoFK', $data['projeto']->id);
                $projetoAdicionalModel->orderBy('ordem ASC, id DESC');
                // if($get['adicional']) {
                //      $projetoAdicionalModel->whereIn('id', $get['adicional']);
                // }
                $data['adicionais'] = $projetoAdicionalModel->findAll();

                if ($data['adicionais']) {
                    foreach ($data['adicionais'] as $adicional) {
                        $data['valorImpressao'] += $adicional->impressao;
                    }
                }

                $estadoModel = \model("App\Models\EstadoModel", false);
                $data['estados'] = $estadoModel->findAll();

                break;
            case 'forma-pagamento':
                $data['bodyClass'] = "methods-of-payments";
                $data['pagina'] = 16;
                $request = \request();
                $post = $request->getPost();

                if ($post) {
                    $this->session->set("carrinho", $post);
                    header('Status: 301 Moved Permanently', false, 301);
                    header('Location:' . PATHSITE . "forma-pagamento/");
                    exit();
                }
                if (!$_SESSION['carrinho']) {
                    header('Status: 301 Moved Permanently', false, 301);
                    header('Location:' . PATHSITE . "projetos/");
                    exit();
                }

                $data['carrinho'] = $carrinho = $this->session->get('carrinho');

                $data['valorTotal'] = 0.0;

                $projetoModel = \model("App\Models\ProjetoModel", false);
                $projetoModel->where('identificador', $carrinho['projeto']);
                $data['projeto'] = $projetoModel->find()[0];

                if ($data['carrinho']['envio'] == 'ambos') {
                    $medidas[0]['Height'] = $data['projeto']->altura/1000;
                    $medidas[0]['Length'] = $data['projeto']->largura/1000;
                    $medidas[0]['Quantity'] = $carrinho['copias'];
                    $medidas[0]['Weight'] = $data['projeto']->peso/1000;
                    $medidas[0]['Width'] = $data['projeto']->comprimento/1000;
                    $medidas[0]['SKU'] = 'P-' . $data['projeto']->id;
                    $medidas[0]['Category'] = 'Projeto Arquitetônico';
                    $data['valorImpressao'] = ( $carrinho['copias'] * $data['projeto']->impressao);
                }

                $data['valorTotal'] += $data['projeto']->valor;

                if ($carrinho['adicional']) {
                    $projetoAdicionalModel = \model("App\Models\PjAdicionalModel", false);
                    $projetoAdicionalModel->where('projetoFK', $data['projeto']->id);
                    $projetoAdicionalModel->whereIn('id', $carrinho['adicional']);
                    $data['adicionais'] = $projetoAdicionalModel->findAll();

                    if ($data['adicionais']) {
                        foreach ($data['adicionais'] as $ind => $adicional) {
                            $data['valorImpressao'] += $carrinho['copias'] * ($adicional->impressao);
                            $data['valorTotal'] += $adicional->valor;

                            $medidas[$ind + 1]['Height'] = $adicional->altura/1000;
                            $medidas[$ind + 1]['Length'] = $adicional->largura/1000;
                            $medidas[$ind + 1]['Quantity'] = $carrinho['copias'];
                            $medidas[$ind + 1]['Weight'] = $adicional->peso/1000;
                            $medidas[$ind + 1]['Width'] = $adicional->comprimento/1000;
                            $medidas[$ind + 1]['SKU'] = 'A-' . $adicional->id;
                            $medidas[$ind + 1]['Category'] = 'Projeto Arquitetônico';
                        }
                    }
                }
                
                //   $data['valorTotal'] += $valorFrete;

                $data['valorTotal'] += $data['valorImpressao'];
                
                if ($medidas) {
                     $data['frete'] = $projetoModel->calcularFrete($medidas, $carrinho['cep'], $data['valorTotal']);
                    
                    if($data['frete'][0]->ShippingPrice) {
                          $_SESSION['ultimoFrete'] =$data['frete'][0]->ShippingPrice;
                    $data['valorTotal'] += $data['frete'][0]->ShippingPrice;
                    } else {
                        unset($_SESSION['ultimoFrete']);
                        }
                    
                  
                }
                break;

            case 'pedido-finalizado':
                helper('encrypt');
                $data['pagina'] = 17;
                $data['bodyClass'] = 'order-placed pix';

                $pedidoModel = \model("App\Models\PedidoModel", false);
                $data['pedido'] = $pedidoModel->find(decode($segments[1]));

                $projetoModel = \model("App\Models\ProjetoModel", false);
                $data['projeto'] = $projetoModel->find($data['pedido']->projetoFK);

                $pedidoItemModel = \model("App\Models\PedidoItemModel", false);
                $pedidoItemModel->select('pedido_item.*,pa.titulo');
                $pedidoItemModel->join('pj_adicional pa', 'pa.id = pedido_item.adicionalFK');
                $pedidoItemModel->where('pedidoFK', $data['pedido']->id);
                $data['adicionais'] = $pedidoItemModel->findAll();

                $transacaoModel = \model("App\Models\TransacaoModel", false);
                $transacaoModel->where('pedidoFK', $data['pedido']->id);
                $data['transacao'] = $transacaoModel->find()[0];

                \MercadoPago\SDK::setAccessToken(\MERCADOPAGOTOKEN);

                $data['payment'] = \MercadoPago\Payment::find_by_id($data['transacao']->transacao_id);
               
                $clienteModel = \model("App\Models\ClienteModel", false);
                  $clienteModel->isLogged();

                break;

            case 'esqueci':
                $data['pagina'] = 18;

                $request = \Config\Services::request();
                $post = $request->getPost();
                $get = $request->getGet();
                $model = model('App\Models\ClienteModel', false);

                if ($post) {
                    if (!$post["email"]) {
                        $data["erro"] = "Preencha o e-mail";
                    } else {
                        $model->where("email", $post["email"]);
                        $model->limit(1);
                        $result = $model->find();

                        if (!$result) {
                            $data["erro"] = "E-mail não encontrado!";
                        } else {
                            $emailModel = model('App\Models\EmailModel', false);
                            $dados["mailTo"] = $result[0]->email;
                            $dados["subject"] = "Recuperação de senha";
                            $post["recuperar"] = $recuperar["recuperar"] = md5(uniqid());
                            $post["tipo"] = $segments[1];
                            $post["nome"] = $result[0]->nome;
                            $post['tipo'] = $get['tipo'];
                            ob_start();
                            echo View('templates/email-recuperar', $post);
                            $dados["message"] = ob_get_clean();

                            if (!$emailModel->enviarEmail($dados)) {
                                $data["erroLogin"] = "Erro no e-mail. Contate o suporte!";
                            } else {
                                //  $model->where("id", $result[0]->id);
                                $recuperar["id"] = $result[0]->id;
                                $data["salvou"] = $model->save($recuperar);
                                $data["sucesso"] = "Em seu e-mail serão enviados os passos necessários para alteração de senha";
                            }
                        }
                    }
                }

                break;

            case 'novasenha':
                $data['pagina'] = 19;
                $request = \Config\Services::request();
                $post = $request->getPost();
                $get = $request->getGet();
                $model = model('App\Models\ClienteModel', false);

                $model->where("recuperar", $get['codigo']);
                $model->where("recuperar IS NOT NULL");
                $result = $model->find();

                if ($result) {
                    if (isset($_POST["senha1"])) {
                        $post = $request->getPost();

                        if ($post["senha1"] == $post["senha2"]) {
                            $inserir['senha'] = sha1($post["senha1"]);
                            $inserir["recuperar"] = "";
                            $model->resetQuery();
                            $inserir["id"] = $result[0]->id;
                            $data["salvar"] = $model->save($inserir);
                            $data["sucesso"] = "Senha alterada com sucesso!";
                            ?>
                            <meta http-equiv="refresh" content="3; url=<?= PATHSITE ?>area-do-cliente/login/">
                            <?
                        } else {
                            $data["erro"] = "Senha sestão Diferentes";
                        }
                    }
                } else {
                    ?>
                    <meta http-equiv="refresh" content="0; url=<?= PATHSITE ?><?= $qualLogin ?>/">
                    <?
                    session_write_close();
                    exit();
                }

                break;

            case "area-do-cliente":
                $this->clienteModel = \model("App\Models\ClienteModel", false);

                if ($segments[1] !== "login" && $segments[1] !== "cadastro-1" && $segments[1] !== "cadastro-2") {
                    $this->clienteModel->isLogged();
                }

                $aux = $data['configs'];

                $data = $this->clienteModel->areaRestrita();

                $data['configs'] = $aux;

                $header = $data['header'];
                $page = $data['page'];
                $footer = $data['footer'];
                break;
        }

        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        if (!$data["metatag"]) {
            $this->metatagModel = model('App\Models\MetatagModel', false);
            $data["metatag"] = $this->metatagModel->find($data["pagina"]);
        }

        if (!$data['metatag']->description) {
            $data['metatag']->description = character_limiter(strip_tags($data['metatag']->description), 160);
        }

        if (isset($_POST['enviar'])) {

            $request = request();
            $post = $request->getPost();

            $data["contato"] = $this->recebeEmail($data["configs"]->private_recaptcha, $post);

            if ($data["contato"] == 1) {

                $emailModel = model('App\Models\EmailModel', false);
                $data["sucesso"] = "Contato enviado com sucesso!";
                $data["salvou"] = TRUE;

                $result = $emailModel->find(1);
                $result->email = str_replace(";", ",", $result->email);

                $dados["mailTo"] = $result->email;
                $dados["subject"] = "Contato";

                ob_start();
                echo View('templates/email-template', $post);
                $dados["message"] = ob_get_clean();

                $emailModel->enviarEmail($dados);
            } else {
                $data["erro"] = $data["contato"][0];
            }
        }

        echo view("templates/" . $header, $data);
        echo view("pages/" . $page, $data);
        echo view("templates/" . $footer, $data);
    }

    public function recebeEmail($private_recaptcha, $post) {
        $token = $_POST['g-recaptcha-response'];
        $secret = $private_recaptcha;
        $ip = $_SERVER["REMOTE_ADDR"];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$token}&remoteip={$ip}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Postman-Token: 07226bf6-7d2d-41fc-8218-ccbdbab4dbdd",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
        } else {
            //  echo $response;
            $retorno = json_decode($response);
        }

        //  $retorno->score = 1;

        if ($retorno->score < 0.7) {
            $erro[] = "Falha na verificação do google recaptcha";
        }

        $post["ip"] = $ip;

        if (!$erro) {

            $this->contatoModel = model('App\Models\ContatoModel', false);

            unset($post["salvar"]);
            unset($post["enviar"]);
            unset($post["g-recaptcha-response"]);

            // $copiaEspera = $post['espera'];
            // $post['espera'] = '';
            // if ($copiaEspera) {
            //     foreach ($copiaEspera as $espera) {
            //         $post['espera'] .= $espera . ";";
            //     }
            // }

            $retorno = $this->contatoModel->save($post);

            return $retorno;
        } else {
            return $erro;
        }
    }
}
