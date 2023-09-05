<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{

    public function buscaGeral()
    {
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

        $cidadeModel = model('App\Models\CidadeModel', false);
        $cidadeModel->select('cidade.titulo, e.sigla');
        $cidadeModel->join('estado e', 'e.id =cidade.estadoFK');
        $cidadeModel->orderBy("cidade.titulo ASC");
        $data['cidades'] = $cidadeModel->findAll();

        $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $produtoCategoriaModel->orderBy('titulo ASC');
        $data['produtoCategorias'] = $produtoCategoriaModel->findAll();

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


    public function index()
    {
        helper("date");
        $data = $this->buscaGeral();

        $data["pagina"] = 1;
        $data['bodyClass'] = 'home';

        $bannerModel = model('App\Models\BannerModel', false);
        $bannerModel->orderBy("ordem ASC, id DESC");
        $data['bannerPrincipal'] = $bannerModel->findAll();

        $cidadeModel = model('App\Models\CidadeModel', false);
        $cidadeModel->select("cidade.*,e.sigla");
        $cidadeModel->join("estado e", "e.id = cidade.estadoFK");
        $cidadeModel->orderBy("titulo ASC");
        $data["cidades"] = $cidadeModel->findAll();

        $this->metatagModel = model('App\Models\MetatagModel', false);
        $data["metatag"] = $this->metatagModel->find($data["pagina"]);

        $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $produtoCategoriaModel->orderBy("titulo ASC");
        $data["categoriasProduto"] = $produtoCategoriaModel->findAll();

        $produtoModel = model('App\Models\ProdutoModel', false);

        $produtoModel->resetQuery();

        $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
        $produtoModel->select("produto.id,  produto.titulo, produto.identificador, produto.lazer, produto.itens, produto.categoriaFK");
        $produtoModel->where("produto.destaque", "1");
        $produtoModel->where("produto.ativo", "1");
        //    $produtoModel->where("produto.tipoFK",1);
        $produtoModel->orderBy("RAND()");
        $data["espacos"] =  $produtoModel->findAll(10);

        if ($data["categoriasProduto"]) {
            foreach ($data["categoriasProduto"] as $ind => $dProd) {
                $data["nomeCategoria"][$dProd->id] = $dProd->titulo;
            }
        }

        if ($data["espacos"]) {
            foreach ($data["espacos"] as $ind => $dProd) {
                $data["arrayCatProd"][$dProd->categoriaFK] = $dProd->categoriaFK;

                $produtoFotoModel->resetQuery();
                $produtoFotoModel->where("produtoFK", $dProd->id);
                $produtoFotoModel->orderBy("ordem ASC, id DESC");
                $data["espacos"][$ind]->fotos = $produtoFotoModel->findAll(3);
            }
        }

        $produtoModel->resetQuery();
        $produtoModel->select("produto.id, produto.identificador, produto.titulo, produto.categoriaFK, produto.preco, produto.apresentacao ");
        //$produtoModel->join("produto_quantidade pq","produto.id = pq.produtoFK",'LEFT'); 
        //$produtoModel->where("tipoFK",2);
        $produtoModel->where("destaque", "1");
        $produtoModel->where("ativo", "1");
        $produtoModel->groupBy("produto.id");
        $produtoModel->where("produto.inicioValidade <= NOW() AND produto.validade >= NOW()");
        $produtoModel->where("produto.inicioDestaque <= NOW() AND produto.validadeDestaque >= NOW()");
        $produtoModel->orderBy("RAND()");
        $data["servicos"] =  $produtoModel->findAll(10);

        if ($data["servicos"]) {
            foreach ($data["servicos"] as $ind => $dProd) {
                $data["arrayCatProd"][$dProd->categoriaFK] = $dProd->categoriaFK;
                $produtoFotoModel->resetQuery();
                $produtoFotoModel->where("produtoFK", $dProd->id);
                $produtoFotoModel->orderBy("ordem ASC, id DESC");
                $data["servicos"][$ind]->fotos = $produtoFotoModel->findAll(3);
            }
        }

        $ArtigoModel = model('App\Models\ArtigoModel', false);
        $ArtigoModel->select('artigo.*, ca.titulo as categoria, ca.identificador as identificadorCat');
        $ArtigoModel->join('categoriaArtigo ca', 'ca.id = artigo.categoriaFK');
        $ArtigoModel->orderBy("artigo.ordem ASC, artigo.id DESC");
        $data["blogs"] = $ArtigoModel->findAll(6);
        /*    
   $itemModel = model('App\Models\ItemModel', false);  

    $itemModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.itens LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $itemModel->where("tipo",1);
    $itemModel->orderBy("quantidade DESC");
    $data["comodidades"] = $itemModel->findAll(12);
      
    $itemModel->resetQuery();
    $itemModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.itens LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $itemModel->where("tipo",2);
    $itemModel->orderBy("quantidade DESC");
    $data["produtosServidos"] = $itemModel->findAll(12);
    
    $itemModel->resetQuery();
    $itemModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.itens LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $itemModel->where("tipo",3);
    $itemModel->orderBy("quantidade DESC");
    $data["atendeEm"] = $itemModel->findAll(12);  
    
    $proximidadeModel = model('App\Models\ProximidadeModel', false);  
    $proximidadeModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.proximidades LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $proximidadeModel->where("tipo",1);
    $proximidadeModel->orderBy("quantidade DESC");
    $data["proximidades"] = $proximidadeModel->findAll(12);
    
    $proximidadeModel->resetQuery();
    $proximidadeModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.proximidades LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $proximidadeModel->where("tipo",2);
    $proximidadeModel->orderBy("quantidade DESC");
    $data["showsAoVivo"] = $proximidadeModel->findAll(12);
    
    $lazerModel = model('App\Models\LazerModel', false);
    $lazerModel->select("titulo, ( SELECT COUNT(id) FROM produto WHERE produto.lazer LIKE CONCAT('%', titulo, '%') ) as quantidade  ");
    $lazerModel->orderBy("quantidade DESC");
    $data["lazeres"] = $lazerModel->findAll(12);
    */
        if (isset($_POST['enviar'])) {
            $request = \Config\Services::request();
            $post = $request->getPost();
            $data["contato"] = $this->recebeEmail($data["configs"]->private_recaptcha, $post);

            if ($data["contato"] == 1) {
                $request = \Config\Services::request();
                $emailModel = model('App\Models\EmailModel', false);
                $data["sucesso"] = "Contato enviado com sucesso!";
                $data["salvou"] = TRUE;

                $idContato = 1;

                $result = $emailModel->find($idContato);
                $dados["mailTo"] = $result->email;
                $dados["subject"] = $post["assunto"];
                ob_start();
                echo View('templates/email-template', $post);
                $dados["message"] = ob_get_clean();

                $emailModel->enviarEmail($dados);
            } else {
                $data["erro"] = $data["contato"][0];
            }
        }

        echo view('templates/header', $data);
        echo view('pages/home', $data);
        echo view('templates/footer', $data);
    }

    public function redirects($segments)
    {
    }

    public function anunciante($page = 'home')
    {
        $segments = $this->request->uri->getSegments();
        $anuncianteModel = model('App\Models\AnuncianteModel', false);
        $anuncianteModel->verPagina($segments);
    }

    public function view($page = 'home')
    {

        $data = $this->buscaGeral();
        $segments = $this->request->uri->getSegments();
        $this->redirects($segments);

        $header = "header";
        $footer = "footer";

        switch ($page) {
            case "area-do-anunciante":
                $this->anunciante($page);
                exit();
                break;
            case "sobre-nos":
                $data['pagina'] = 2;
                $data['bodyClass'] = 'about';

                $data['txSobreNos'] = $this->textoModel->find(1);

                $this->aspectoModel = \model("App\Models\AspectoModel", false);
                $data['aspectos'] = $this->aspectoModel->orderBy("ordem ASC, id DESC")->findAll();

                $data['depoimento'] = $this->textoModel->find(2);
                $data['txContato'] = $this->textoModel->find(7);
                break;
            case 'planos':
                $data['pagina'] = 4;
                $data['bodyClass'] = 'plans';

                $data['txPlanosHero'] = $this->textoModel->find(3);
                $data['txPlanoLinha'] = $this->textoModel->find(4);
                $data['txPlanoAnuncio'] = $this->textoModel->find(5);

                $this->planoModel = \model('App\Models\PlanoModel', false);
                $data['planosLinha'] = $this->planoModel
                    ->orderBy("ordem DESC, id ASC")
                    ->findAll();
                
                $this->planoAnuncioModel = \model('App\Models\PlanoAnuncioModel', false);
                $data['planosAnuncio'] = $this->planoAnuncioModel
                    ->orderBy("ordem ASC, id DESC")
                    ->findAll();
                $data['txContatoPlanos'] = $this->textoModel->find(6);

                break;
            case 'eventos':
                $data['pagina'] = 3;
                $data['bodyClass'] = 'events';
                break;
            case "blog":
                $data['bodyClass'] = 'blog-list';
                $data['pagina'] = 5;
                $segments = $this->request->uri->getSegments();
                $data['get'] = $get = \request()->getGet();
                $page = "blog-listagem";

                $paginate = \is_numeric($get['page_artigos']) ? $get['page_artigos'] : 1;

                $this->artigoModel = \model("App\Models\ArtigoModel", false);
                $data['artigoDestaque'] = $this->artigoModel
                    ->where("destaque", "S")
                    ->first();
                $data['artigosMaisLidos'] = $this->artigoModel
                    ->resetQuery()
                    ->orderBy("ordem ASC, id DESC")
                    ->findAll(3);
                $data['artigosRecentes'] = $this->artigoModel
                    ->resetQuery()
                    ->orderBy("dtCriacao DESC")
                    ->paginate(1, "artigos", $paginate);
                $data['pager'] = $this->artigoModel->pager;

                $this->categoriaArtigoModel = \model('App\Models\CategoriaArtigoModel', false);
                $this->categoriaArtigoModel->where("categoriaArtigo.id IN (SELECT categoriaFK FROM artigo WHERE artigo.excluido IS NULL)");
                $data['categorias_artigos'] = $this->categoriaArtigoModel->findAll();

                if ($data['categorias_artigos']) {
                    foreach ($data['categorias_artigos'] as $categoria) {
                        $data['cats'][$categoria->id] = $categoria->titulo;
                    }
                }

                $data['artigoAtual'] = $this->artigoModel->where("identificador", $segments[1])->first();

                if ($segments[1] && $data['artigoAtual']) {
                    \helper("url");
                    $data['crrUrl'] = \current_url(); // Compartilhar: copiar link ?
                    $page = 'blog-interna';

                    $this->artigoModel->resetQuery()
                        ->where("categoriaFK", $data['artigoAtual']->categoriaFK)
                        ->where("id != {$data['artigoAtual']->id}");
                    $data['artigosRelacionados'] = $this->artigoModel->findAll();
                } else if ($segments[1] == "categoria") {
                    $page = "blog-categoria";
                    $data['bodyClass'] = 'blog-list-categories';

                    $data['categoriaAtual'] = $this->categoriaArtigoModel
                        ->resetQuery()
                        ->where("identificador", $segments[2])
                        ->first();
                    $data['artigosCategoria'] = $this->artigoModel
                        ->resetQuery()
                        ->where("categoriaFK", $data['categoriaAtual']->id)
                        ->paginate(1, "artigos", $paginate);
                    $data['pager'] = $this->artigoModel->pager;
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
            case "politica-de-privacidade-e-termos-de-uso":
                $data['bodyClass'] = 'privacy-policy';
                $data["pagina"] = 20;
                $page = "politicas-e-termos";

                $data['txPoliticaETermos'] = $this->textoModel->find(13);

                $this->politicaTermoTopicosModel = \model('App\Models\PoliticaTermoTopicosModel', false);
                $data['politicaETermos'] = $this->politicaTermoTopicosModel->orderBy("ordem ASC, id DESC")->findAll();

                break;
            case "termos-de-uso":
                $data['bodyClass'] = 'home';
                $data["pagina"] = 3;
                $data['termos'] = $this->textoModel->find(12);

                $this->workshopModel = \model('App\Models\WorkshopModel', false);
                $this->workshopModel->orderBy("ordem ASC, id DESC");
                $data['workshops'] = $this->workshopModel->findAll();
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

            case "logout":
                unset($_SESSION);
                ?>
                <meta http-equiv="refresh" content="0; url=<?= PATHSITE ?>">
<? exit();
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

    public function recebeEmail($private_recaptcha, $post)
    {
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
