<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller {

    public function buscaGeral() {
        helper('text');
        
        $data['segments'] = $segments = $this->request->uri->getSegments();
          
        if($data['segments'][0] == 'uploads') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
            die();
        }
     
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
        $cidadeModel->select('cidade.id,cidade.titulo, e.sigla');
        $cidadeModel->join('estado e', 'e.id =cidade.estadoFK');
        $cidadeModel->orderBy("cidade.titulo ASC");
        $data['cidades'] = $cidadeModel->findAll();

        $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $produtoCategoriaModel->orderBy('titulo ASC');
        $data['produtoCategorias'] = $produtoCategoriaModel->findAll();

        
        $data['todosFavoritos'] = array();
        if ($this->session->get('cliente')) {
            $data["isLogado"] = TRUE;
            $clienteModel = model('App\Models\ClienteModel', false);
            $data['clienteLogado'] = $clienteModel->find($this->session->get('cliente')->id);
            
         
            $clienteFavoritoModel = model('App\Models\ClienteFavoritoModel', false);
            $clienteFavoritoModel->select("produtoFK");
            $clienteFavoritoModel->where("clienteFK", $this->session->get('cliente')->id);
            $todosFavoritos = $clienteFavoritoModel->findAll();

            if ($todosFavoritos) {
                foreach ($todosFavoritos as $tFav) {
                    $data['todosFavoritos'][] = $tFav->produtoFK;
                }
            }
        }
        
         $tipoModel = \model("App\Models\TipoModel", false);
         $data['tipos'] = $tipoModel->select("id, arquivo, titulo,identificador,identificador2,tipo")->where('status','ATIVO')->orderBy('ordem ASC, id DESC')->findAll();

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
        
         $data['txMenuFiltro'] = $this->textoModel->find(8);

         if(!$_SESSION['cidade']) {
         $_SESSION['cidade'] = $data['configs']->cidadeFK;
         $data['primeiraVisita'] = true;
         } 
         
         $data['cidadeAtual'] = $cidadeModel->find($_SESSION['cidade']);

                 
        return $data;
    }

    public function index()
    {
     
        helper("date");
        $data = $this->buscaGeral();
   $data['canonical'] = PATHSITE;  
        
        $data['style_list'] = ['swiper','jquery_ui'];
        $data['script_list'] = ['swiper', 'card-like', 'controller-agenda', 'controller-blog', 'controller-card', 'fs-lightbox', 'mask-date', 'mask-telefone', 'menu-tabs','jquery_ui'];
        $data['origem'] = "home";

        $data["pagina"] = 1;
        $data['bodyClass'] = 'home';
        
        $bannerModel = model('App\Models\BannerModel', false);
        $data['banner1'] = $bannerModel->find(1);
    
        $data['txSecaoEspacos'] = $this->textoModel->find(15);
        $data['txSecaoPrestServicos'] = $this->textoModel->find(16);
        $data['txConviteAnunciante1'] = $this->textoModel->find(9);
        $data['txConviteAnunciante2'] = $this->textoModel->find(10);
        $data['txSecaoEventos'] = $this->textoModel->find(17);
        $data['txSecaoBlog'] = $this->textoModel->find(18);
        $data['txSecaoContato'] = $this->textoModel->find(7);

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
        // $produtoModel->where("produto.tipoFK",1);
        $produtoModel->orderBy("RAND()");
        $data["espacos"] = $produtoModel->findAll(10);

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
        $data["servicos"] = $produtoModel->findAll(10);

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

        $textoModel = model('App\Models\TextoModel', false);
        $data['anuncioBannerH'] = $textoModel->find(20);
          
        $anuncioModel = model('App\Models\AnuncioModel', false);
     
             $anuncioModel->resetQuery();
          $anuncioModel->select('id');
          $anuncioModel->where('tipo','emalta');
     $anuncioModel->where('anuncio.cidadeFK',$_SESSION['cidade']);
    $data['destaqueEmAlta'] = $anuncioModel->find()[0];     
        
          $anuncioModel->resetQuery();
          $anuncioModel->select('anuncio.id, t.titulo, t.arquivo');
          $anuncioModel->join('tipo t', 't.id = anuncio.tipoFK');
          $anuncioModel->where(" t.tipo IN ('ALUGUEL','SALOES','HOSPEDAGEM','LOJAS')");
         $anuncioModel->where('anuncio.tipo','tipo');
          $anuncioModel->where('anuncio.cidadeFK',$_SESSION['cidade']);
          $data['destaquesMaiores'] = $anuncioModel->findAll();
     
            $anuncioModel->resetQuery();
          $anuncioModel->select('id');
          $anuncioModel->where('tipo','emaltaprestador');
     $anuncioModel->where('anuncio.cidadeFK',$_SESSION['cidade']);
    $data['destaqueEmAlta2'] = $anuncioModel->find()[0];    
    
     $anuncioModel->resetQuery();
          $anuncioModel->select('anuncio.id, pc.titulo, pc.arquivo');
          $anuncioModel->join('produto_categoria pc', 'pc.id = anuncio.categoriaFK');
         $anuncioModel->where('anuncio.tipo','servicocategoria');
          $anuncioModel->where('anuncio.cidadeFK',$_SESSION['cidade']);
          $data['destaquesPrestadores'] = $anuncioModel->findAll();
          
     
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

        $produtoDataModel = \model("App\Models\ProdutoDataModel", false);
        $produtoDataModel->select('data');
        $produtoDataModel->where('data > NOW()');
        $produtoDataModel->groupBy('data');
        $produtoDataModel->orderBy('data ASC');
        $produtoDataModel->limit(15);
        $data['diasMes'] = $produtoDataModel->findAll();

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

    public function view($page = 'home') {

        $data = $this->buscaGeral();
        $segments = $this->request->uri->getSegments();
        $this->redirects($segments);

        $header = "header";
        $footer = "footer";
        $data['style_list'] = [];
        $data['script_list'] = [];
        switch ($page) {
            case "area-do-anunciante":
                $this->anunciante($page);
                exit();
                break;
            case 'muda-cidade':
                $get = \request()->getGet();
             
                
                $_SESSION['cidade'] = $get['id'];
                
             
                Header("HTTP/1.1 301 Moved Permanently");
                    Header("Location:" . $_SESSION['_ci_previous_url']);
                    exit();
                
                break;
            case "espaco":
                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('categoriaFK');
                $produtoModel->where('identificador', $segments[1]);
                $produto = $produtoModel->find()[0];

                $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
                $produtoCategoriaModel->select('tipoFK');
                $pc = $produtoCategoriaModel->find($produto->categoriaFK);

                $tipoModel = model('App\Models\TipoModel', false);
                $tipoModel->select('identificador');
                $tipo = $tipoModel->find($pc->tipoFK);
                
          
                if ($tipo) {
                    Header("HTTP/1.1 301 Moved Permanently");
                    Header("Location:" . PATHSITE . $tipo->identificador . "/" . $segments[1] . "/");
                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
                }

                exit();
                break;
            case "sobre-nos":
                  $data['canonical'] = PATHSITE . 'sobre-nos/';  
                $data['script_list'] = ['mask-telefone', 'modal-filter'];

                $data['pagina'] = 2;
                $data['bodyClass'] = 'about';

                $data['txSobreNos'] = $this->textoModel->find(1);

                $this->aspectoModel = \model("App\Models\AspectoModel", false);
                $data['aspectos'] = $this->aspectoModel->orderBy("ordem ASC, id DESC")->findAll();

                $data['depoimento'] = $this->textoModel->find(2);

                $data['txContato'] = $this->textoModel->find(7);
                break;
            case 'planos':
                 $data['canonical'] = PATHSITE . 'planos/';  
                $post = \request()->getPost();
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'mask-telefone', 'modal-filter', 'modal-select-order'];

                $data['style_list'] = ['swiper'];
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

                $data['jsfiles'] = [""];

                break;
            case 'eventos':
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'card-like', 'controller-agenda', 'controller-card', 'controller-page-internal-3', 'fs-lightbox', 'menu-tabs', 'modal-filter'];

                helper('date');
                $data['pagina'] = 3;
                $data['bodyClass'] = 'events';

                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->where('pc.tipoFK', 5);
                $produtoModel->where('ativo', '1');
                $data['destaques'] = $produtoModel->findAll(3);
                if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        $data['destaques'][$ind]->datas = $produtoModel->datas($destaque->id);
                    }
                }

                $data['get'] = $get = request()->getGet();

                if ($get) {
                    $page = 'eventos-listagem';
                    $data['bodyClass'] = '';
                    $data['style_list'] = ['swiper'];
                    $data['script_list'] = ['swiper', 'card-like', 'controller-agenda', 'controller-card', 'modal-filter', 'fslightbox', 'modal-select-order', 'controller-page-internal-3', 'form-filter', 'select','menu-tabs'];

                    if (!is_numeric($get['page_produto'])) {
                        $paginate = 1;
                    } else {
                        $paginate = $get['page_produto'];
                    }
                    
                    $produtoModel->filtros($get);
                    $data['eventos'] = $produtoModel->paginate(6, 'eventos', $paginate);
                    $data['pager'] = $produtoModel->pager;
                 
                    
                     if ($data['eventos']) {
                    foreach ($data['eventos'] as $ind => $destaque) {
                        $data['eventos'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        $data['eventos'][$ind]->datas = $produtoModel->datas($destaque->id);
                    }
                }
                
                  $anuncioModel = \model("App\Models\AnuncioModel", false)
                            ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3,anuncio.produtoFK4, anuncio.produtoFK5");
                    $anuncioModel->where('cidadeFK',$_SESSION['cidade']);
                    $anuncioModel->where('tipo','tipo');
                    $anuncioModel->where('tipoFK',5);
                    $emAlta = $anuncioModel->find()[0];                    
                   
                   $data['emAlta'] = $anuncioModel->emAlta($emAlta);
                   $data['destaques'] = array();
                   if($data['emAlta']) {
                       foreach($data['emAlta'] as $ind => $emAlta) {
                           if($ind > 1) {
                       $data['destaques'][] = $emAlta;
                           }
                       }
                   }

                 
                } else {
                    $produtoDataModel = \model("App\Models\ProdutoDataModel", false);
                    $produtoDataModel->select('data');
                    $produtoDataModel->where('data >= NOW()');
                    $produtoDataModel->groupBy('data');
                    $produtoDataModel->orderBy('data ASC');
                    $produtoDataModel->limit(30);
                    $data['diasMes'] = $produtoDataModel->findAll();
                    $data['pagina'] = 3;
                }
                
                $data['coordenadas'] = array();
                
                break;
            case 'evento':
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'sticksy', 'controller-card', 'controller-page-internal-3', 'faq-dropdown', 'fs-lightbox', 'modal-filter'];

                helper('date');
                $data['bodyClass'] = 'internal-rent events-internal';
                
                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('identificador', $segments[1]);
                $data['metatag'] = $produtoModel->find()[0];
                $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);
                $data['datas'] = $produtoModel->datas($data['metatag']->id);
                $data['pontosVenda'] = $produtoModel->pontosVenda($data['metatag']->id);
                $data['setores'] = $produtoModel->setores($data['metatag']->id);
                $data['organizacoes'] = $produtoModel->organizacoes($data['metatag']->id);
                
        $produtoVisitaModel =  model('App\Models\ProdutoVisitaModel', false);  
         $produtoVisitaModel->contaVisita($data['metatag']->id);

               $anuncioModel = \model("App\Models\AnuncioModel", false)
                            ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3,anuncio.produtoFK4, anuncio.produtoFK5");
                    $anuncioModel->where('cidadeFK',$_SESSION['cidade']);
                    $anuncioModel->where('tipo','tipo');
                    $anuncioModel->where('tipoFK',5);
                    $emAlta = $anuncioModel->find()[0];                    
                   
                   $data['destaques'] = $anuncioModel->emAlta($emAlta);
                   
                           if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        $data['destaques'][$ind]->datas = $produtoModel->datas($destaque->id);
                    }
                }

                break;
                 
            case "blog":
                $data['script_list'] = ['modal-filter'];
                $data['bodyClass'] = 'blog-list';
                $data['pagina'] = 5;
                 $data['canonical'] = PATHSITE . 'blog/';  
                $data['get'] = $get = \request()->getGet();
                $page = "blog-listagem";

                $anuncioModel = \model("App\Models\AnuncioModel", false);
                $textoModel = \model("App\Models\TextoModel", false);
                
                $data['anuncioBannerH'] = $textoModel->find(22);
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
                        ->paginate(9, "artigos", $paginate);
                $data['pager'] = $this->artigoModel->pager;

                $this->categoriaArtigoModel = \model('App\Models\CategoriaArtigoModel', false);
                $this->categoriaArtigoModel->where("categoriaArtigo.id IN (SELECT categoriaFK FROM artigo WHERE artigo.excluido IS NULL)");
                $data['categorias'] = $this->categoriaArtigoModel->findAll();

                foreach ($data['categorias'] as $categoria) {
                    $data['cats'][$categoria->id] = $categoria->titulo;
                }

                $data['artigoAtual'] = $this->artigoModel->where("identificador", $segments[1])->first();

                if ($segments[1] && $data['artigoAtual']) {
                    // Blog Interna
                    $data['style_list'] = ['swiper'];
                    $data['script_list'] = ['swiper','header','form-filter','select','modal-filter','controller-page-internal-3'];
                    $data['anuncioBannerV'] = $textoModel->find(21);

                    \helper("url");
                    $data['crrUrl'] = \current_url(); // Compartilhar: copiar link ?
                    $page = 'blog-interna';
                    
                     $data['canonical'] = PATHSITE . 'blog/'. $data['metatag']->identificador . '/';  

                    $this->artigoModel->resetQuery()
                            ->where("categoriaFK", $data['artigoAtual']->categoriaFK)
                            ->where("id != {$data['artigoAtual']->id}");
                    $data['artigosRelacionados'] = $this->artigoModel->findAll();
                } else if ($segments[1] == "categoria") {
                    // Blog Categoria                    
                    $data['script_list'] = ['modal-filter', 'modal-select-order'];

                    $page = "blog-categoria";
                    $data['bodyClass'] = 'blog-list-categories';

                    $data['categoriaAtual'] = $this->categoriaArtigoModel
                            ->resetQuery()
                            ->where("identificador", $segments[2])
                            ->first();
                    $data['crrUrl'] = \current_url();

                    $this->artigoModel->resetQuery()->where("categoriaFK", $data['categoriaAtual']->id);
                    $this->artigoModel->ordenar($get);
                    $data['artigosCategoria'] = $this->artigoModel->paginate(9, "artigos", $paginate);
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
                        $data['artigos'] = $this->artigoModel->like("titulo", $get['procura'])->orLike("texto", $get['procura'])->orLike("chamada", $get['procura'])->paginate(9, 'blog', $paginate);
                        $data['pager'] = $this->artigoModel->pager;
                        unset($get['categoria']);
                    }

                    if (!empty($get['categoria'])) {
                        $data['artigos'] = $this->artigoModel->where("categoriaFK", $get['categoria'])->paginate(9, 'blog', $paginate);
                        $data['pager'] = $this->artigoModel->pager;
                    }
                    // exit;
                }

                break;
       
            case "contato":
                  $data['canonical'] = PATHSITE . 'contato/';  
                $data['script_list'] = ['mask-telefone', 'modal-filter'];
                $data['origem'] = "contato";

                $data['bodyClass'] = 'contact';
                $data['pagina'] = 6;
                $data['txContato'] = $this->textoModel->find(7);
                break;
            case "politica-de-privacidade-e-termos-de-uso":
                $data['canonical'] = PATHSITE . 'politica-de-privacidade-e-termos-de-uso/';  
                $data['script_list'] = ['modal-filter'];

                $data['bodyClass'] = 'privacy-policy';
                $data["pagina"] = 20;
                $page = "politicas-e-termos";

                $data['txPoliticaETermos'] = $this->textoModel->find(13);

                $this->politicaTermoTopicoModel = \model('App\Models\PoliticaTermoTopicoModel', false);
                $data['politicaETermos'] = $this->politicaTermoTopicoModel->orderBy("ordem ASC, id DESC")->findAll();

                break;
            case 'esqueci':
                $data['pagina'] = 18;
                  $header = "header2";
                $footer = "footer2";

                $request = \Config\Services::request();
                $post = $request->getPost();
                $get = $request->getGet();
                
if($get['tipo'] == 'cliente') {                
                $model = model('App\Models\ClienteModel', false);
}else {
         $model = model('App\Models\AnuncianteModel', false);
}
                
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

            case 'login':
                $data['pagina'] = 7;
                $header = "header2";
                $footer = "footer2";
                $request = \Config\Services::request();
                $post = $request->getPost();

                if (isset($post["email"])) {
                    if (!$post["email"]) {
                        $data["erroLogin"] = "Preencha o e-mail";
                    } else if (!$post["senha"]) {
                        $data["erroLogin"] = "Preencha a senha";
                    } else {
                        $clienteModel = model('App\Models\ClienteModel', false);

                        $clienteModel->where("email", $post["email"]);
                        $clienteModel->where("senha", sha1($post["senha"]));
                        $result = $clienteModel->find()[0];

                        if (!$result) {
                            $data["erroLogin"] = "E-mail/usu&aacute;rio e/ou senha inv&aacute;lidos";
                        } else {
                            $this->session->set('cliente', $result);
                            if ($_SESSION['favoritar']) {
                                $clienteModel->favoritar($_SESSION['favoritar'], $result->id, true);
                            }
                            session_write_close();
                            ?>
                            <meta http-equiv="refresh" content="0;URL='<?= PATHSITE ?>meu-perfil/'" />         
                            <?
                        }
                    }
                }

                unset($_POST);
                break;

            case 'meu-perfil';
                $data['pagina'] = 21;
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'card-like', 'controller-card', 'mask-telefone'];
                $data['coordenadas'] = array();

                helper('encrypt');
                if ($this->session->get('cliente')) {
                    $clienteModel = model('App\Models\ClienteModel', false);
                    $data["clienteLogado"] = $clienteModel->find($this->session->get('cliente')->id);
                } else {
                    ?>
                    <meta http-equiv="refresh" content="0;URL='<?= PATHSITE ?>login/'" />         
                    <?
                    exit();
                }
                $data["tiraContato"] = TRUE;

                $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
                $produtoCategoriaModel->orderBy("ordem ASC");
                $data['categorias'] = $produtoCategoriaModel->findAll();

                if ($data["categorias"]) {
                    foreach ($data["categorias"] as $cat) {
                        $data["arrayCategorias"][$cat->id] = $cat->titulo;
                    }
                }

                foreach ($data['tipos'] as $ind => $tipo) {
                    $produtoCategoriaModel->resetQuery()
                            ->select("id, titulo")
                            ->where("tipoFK", $tipo->id)
                            ->orderBy("titulo ASC");
                    $tipo->categorias = $produtoCategoriaModel->findAll();
                }

                $estadoModel = model('App\Models\EstadoModel', false);
                $estadoModel->orderBy("titulo ASC");
                $data['estados'] = $estadoModel->findAll();

                $request = \Config\Services::request();
                $post = $request->getPost();
                $clienteInteresseModel = model('App\Models\ClienteInteresseModel', false);

                if ($post) {
                    $post['id'] = $data['clienteLogado']->id;

                    $img = $this->request->getFile("arquivo");
                    if ($img) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = date('Y-m-d') . $img->getRandomName();
                            $post["arquivo"] = $newName;
                            $img->move(PATHHOME . "/uploads/cliente/", $newName);
                            try {
                                echo View('templates/tinypng');

                                $upload_path = "uploads/cliente/";
                                $upload_path_root = PATHHOME  . $upload_path;

                                $file_name = $img->getName();
                                $file_path = $upload_path_root . "/" . $file_name;

                                $tinyfile = \Tinify\fromFile($file_path);
                                $tinyfile->toFile($file_path);

                                $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/cliente/" . $newName));
                                imagepalettetotruecolor($img);
                                imagealphablending($img, true);
                                imagesavealpha($img, true);
                                imagewebp($img, PATHHOME . "uploads/cliente/{$newName}.webp", 60);
                                imagedestroy($img);
                            } catch (\Tinify\ClientException $e) {
                            }
                        }
                    }

                    $data['salvou'] = $clienteModel->save($post);
           
                    $interesses = $post['interesse'];

                    if ($interesses) {
                        $clienteInteresseModel->resetQuery()
                                ->where("clienteFK", $data['clienteLogado']->id)
                                ->whereNotIn("id", $interesses)
                                ->delete();

                        foreach ($interesses as $inte) {
                            $updateInteresses[] = [
                                "clienteFK" => $data['clienteLogado']->id,
                                "categoriaFK" => $inte
                            ];
                        }

                        $clienteInteresseModel->insertBatch($updateInteresses);
                    }
                }
                $interessesCliente = $clienteInteresseModel->where("clienteFK", $data['clienteLogado']->id)->findAll();
                $data['interessesClienteIds'] = \array_column($interessesCliente, "categoriaFK");

                $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
                $produtoModel = model('App\Models\ProdutoModel', false);

                 $data['favoritos']  = array();
                if ($data['todosFavoritos']) {
                    $produtoModel->dadosCard()                        
                        ->whereIn("produto.id", $data['todosFavoritos']);
                    $data['favoritos'] = $produtoModel->findAll();
               
                    
                    foreach ($data['favoritos'] as $ind => $favorito) {
                    $favorito->fotos = $produtoModel->fotos($favorito->id, 4, true);
                    }
                     }

                $clienteInteresseModel->select('pc.titulo, cliente_interesse.id');
                $clienteInteresseModel->join('produto_categoria pc', 'pc.id = cliente_interesse.categoriaFK');
                $clienteInteresseModel->where("clienteFK", $this->session->get('cliente')->id);
                $data['clientesInteresses'] = $clienteInteresseModel->findAll();
                $data['coordenadas'] = array();
                break;
            case 'novasenha':
                $header = "header2";
                $footer = "footer2";
                $data['pagina'] = 19;
                $request = \Config\Services::request();
                $post = $request->getPost();
                $get = $request->getGet();
                if($get['tipo'] == 'cliente') {
                $model = model('App\Models\ClienteModel', false);
                } else {
                    $model = model('App\Models\AnuncianteModel', false);
                }
                
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
                                                                                 
                            $data["salvou"] = $model->save($inserir);
                                                        
                            $data["sucesso"] = "Senha alterada com sucesso!";
                            if($get['tipo'] == 'cliente') {
                            ?>
                            <meta http-equiv="refresh" content="3; url=<?= PATHSITE ?>meu-perfil/">
                            <?
                            } else { ?>
                                 <meta http-equiv="refresh" content="3; url=<?= PATHSITE ?>area-do-anunciante/">
                           <? }
                        } else {
                            $data["erro"] = "Senha sestão Diferentes";
                        }
                    }
                } else {
                    ?>
                    <meta http-equiv="refresh" content="0; url=<?= PATHSITE ?>/">
                    <?
                    session_write_close();
                    exit();
                }

                break;

            case "logout":
                unset($_SESSION['cliente']);
                unset($_SESSION['anunciante']);
                ?>
                <meta http-equiv="refresh" content="0; url=<?= PATHSITE ?>">
                <?
                exit();
                break;

            case "cadastro":
                $header = "header2";
                $footer = "footer2";
                $data['pagina'] = 8;

                $request = \Config\Services::request();
                $post = $request->getPost();

                if ($post) {
                    if (isset($post["credential"]) && isset($post["g_csrf_token"])) {
                        //AUTOLOAD
                        require APPPATH . 'Libraries/googleapi/vendor/autoload.php';

                        $client = new \Google_Client(['client_id' => $data["configs"]->chavegoogle]);

                        $payload = $client->verifyIdToken($post["credential"]);
                        if ($payload) {
                            $clienteModel = model('App\Models\ClienteModel', false);
                            $retornoGoogle = $clienteModel->loginGoogle($payload);
                            // If request specified a G Suite domain:
                            //$domain = $payload['hd'];
                        } else {
                            // Invalid ID token
                        }

                        $cookie = $_COOKIE['g_csrf_token'] ?? '';

                        if ($post['g_csrf_token'] != $cookie) {
                        }
                    }
                }

                if (isset($post["email"])) {

                    $interesse = $post['interesse'];

                    if (!$post["email"]) {
                        $data["erroLogin"] = "Digite o seu e-mail";
                    } else if (!$post["senha"]) {
                        $data["erroLogin"] = "Digite a sua senha";
                    } else if (strlen($post["senha"]) < 8) {
                        $data["erroLogin"] = "Senha deve ter mais de 8 caracteres";
                    } else if (!$post["titulo"]) {
                        $data["erroLogin"] = "Digite o seu nome";
                    } else {
                        $model = model('App\Models\ClienteModel', false);
                        $model->where("email", $post["email"]);
                        $existeCadastro = $model->find();
                        if ($existeCadastro) {
                            $data["erroLogin"] = "E-mail já cadastrado";
                        } else {
                            $this->session = \Config\Services::session($config);
                            $post["senha"] = sha1($post["senha"]);
                            $idCliente = $model->insert($post);
                            if ($idCliente) {

                                if ($interesse) {
                                    $clienteInteresseModel = model('App\Models\ClienteInteresseModel', false);
                                    foreach ($interesse as $inte) {
                                        $save['clienteFK'] = $idCliente;
                                        $save['categoriaFK'] = $inte;
                                        $clienteInteresseModel->save($save);
                                    }
                                }

                                $model->resetQuery();
                                $result = $model->find($idCliente);
                                $this->session->set('cliente', $result);
                                $data["sucessoCadastro"] = TRUE;
                                
                                if ($_SESSION['favoritar']) {
                                $clienteModel->favoritar($_SESSION['favoritar'], $result->id, true);
                                }
                                
                                unset($_POST);
                            }
                        }
                    }

                    if ($data["erroLogin"]) {
                        $data["post"] = $post;
                    }
                }

                $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
                $produtoCategoriaModel->orderBy("ordem ASC");
                $data['categorias'] = $produtoCategoriaModel->findAll();

                break;
            case "busca":
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'card-like', 'controller-card'];

                $data['pagina'] = 26;
                $data['bodyClass'] = 'blog-list-categories';

                $data['get'] = $get = request()->getGet();

                if($get['busca']) {
                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $artigoModel = \model("App\Models\ArtigoModel", false);
        }

                // busca artigos
                $artigoModel->select("artigo.*")
                    ->like("artigo.titulo", $get['busca'])
                    ->orLike("chamada", $get['busca'])
                    ->orLike("texto", $get['busca'])
                    ->orlike("ca.titulo", $get['busca'])
                    ->join("categoriaArtigo ca", "artigo.categoriaFK = ca.id");
                $data['buscaArtigo'] = $artigoModel->findAll();

                $categoriaArtigoModel = \model("App\Models\CategoriaArtigoModel", false);
                $data['cats'] = $categoriaArtigoModel->categorias();

                // busca produtos
                $produtoModel->dadosCard()   
                     ->where(" (produto.cidadeFK = {$_SESSION['cidade']} ) ")
                    ->like("produto.titulo", $get['busca'])
                    ->orLike("produto.descricao", $get['busca'])
                    ->orLike("produto.detalhes", $get['busca'])
                    ->orLike("produto.endereco", $get['busca'])
                    ->orLike("produto.bairro", $get['busca'])
                    ->orLike("c.titulo", $get['busca'])
                    ->orLike("e.titulo", $get['busca'])
                    ->orLike("produto.principaiscomodidades", $get['busca'])
                    ->orLike("produto.itensdisponiveis", $get['busca'])
                    ->orLike("produto.condominio", $get['busca'])
                 //   ->orLike("cd.titulo", $get['busca'])
                  //  ->orLike("cd.menu", $get['busca'])
                    ->orLike("pc.titulo", $get['busca']);
                 //   ->join("produto_cardapio cd", "cd.produtoFK = produto.id");
                $data['buscaProduto'] = $produtoModel->findAll();
               
                if($data['buscaProduto']) {
                    foreach($data['buscaProduto'] as $produto) {
                        $produto->fotos = $produtoModel->fotos($produto->id, 4, true);
                    }
                }

            break;
            
            default:
            
                $produtoModel = \model("App\Models\ProdutoModel", false);
                $plusData = $produtoModel->default($data, $page);
                $data = array_merge($data,$plusData);
                $page = $data['page'];
                
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
            $post = request()->getPost();
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

         $retorno->score = 1;

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
