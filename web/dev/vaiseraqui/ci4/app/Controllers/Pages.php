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

        $data['segments'] = $segments = $this->request->uri->getSegments();

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

        $data['style_list'] = ['swiper'];
        $data['script_list'] = ['swiper', 'card-like', 'controller-agenda', 'controller-blog', 'controller-card', 'fs-lightbox', 'mask-date', 'mask-telefone', 'menu-tabs'];

        $data["pagina"] = 1;
        $data['bodyClass'] = 'home';

        $bannerModel = model('App\Models\BannerModel', false);
        $data['banner1'] = $bannerModel->find(1);

        $data['txMenuFiltro'] = $this->textoModel->find(8);
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

        $anuncioModel = model('App\Models\AnuncioModel', false);
        $emAlta = $anuncioModel->find(7);

        $emAltaAluguel = $anuncioModel->find(1);
        $emAltaSaloes = $anuncioModel->find(2);
        $emAltaTemporarias = $anuncioModel->find(4);
        $emAltaServicos = $anuncioModel->find(9);

        if ($emAlta->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta1'][0] = $produtoModel->find($emAlta->produtoFK1);
            $data['emAlta1'][0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
        }
        if ($emAlta->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta1'][1] = $produtoModel->find($emAlta->produtoFK2);
            $data['emAlta1'][1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
        }
        if ($emAlta->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta1'][2] = $produtoModel->find($emAlta->produtoFK3);
            $data['emAlta1'][2]->fotos = $produtoModel->fotos($emAlta->produtoFK3, 4, true);
        }
        if ($emAlta->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta1'][3] = $produtoModel->find($emAlta->produtoFK4);
            $data['emAlta1'][3]->fotos = $produtoModel->fotos($emAlta->produtoFK4, 4, true);
        }
        if ($emAlta->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta1'][4] = $produtoModel->find($emAlta->produtoFK5);
            $data['emAlta1'][4]->fotos = $produtoModel->fotos($emAlta->produtoFK5, 4, true);
        }

        if ($emAltaAluguel->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta2'][0] = $produtoModel->find($emAltaAluguel->produtoFK1);
            $data['emAlta2'][0]->fotos = $produtoModel->fotos($emAltaAluguel->produtoFK1, 4, true);
        }
        if ($emAltaAluguel->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta2'][1] = $produtoModel->find($emAltaAluguel->produtoFK2);
            $data['emAlta2'][1]->fotos = $produtoModel->fotos($emAltaAluguel->produtoFK2, 4, true);
        }
        if ($emAltaAluguel->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta2'][2] = $produtoModel->find($emAltaAluguel->produtoFK3);
            $data['emAlta2'][2]->fotos = $produtoModel->fotos($emAltaAluguel->produtoFK3, 4, true);
        }
        if ($emAltaAluguel->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta2'][3] = $produtoModel->find($emAltaAluguel->produtoFK4);
            $data['emAlta2'][3]->fotos = $produtoModel->fotos($emAltaAluguel->produtoFK4, 4, true);
        }
        if ($emAltaAluguel->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta2'][4] = $produtoModel->find($emAltaAluguel->produtoFK5);
            $data['emAlta2'][4]->fotos = $produtoModel->fotos($emAltaAluguel->produtoFK5, 4, true);
        }

        if ($emAltaSaloes->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta3'][0] = $produtoModel->find($emAltaSaloes->produtoFK1);
            $data['emAlta3'][0]->fotos = $produtoModel->fotos($emAltaSaloes->produtoFK1, 4, true);
        }
        if ($emAltaSaloes->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta3'][1] = $produtoModel->find($emAltaSaloes->produtoFK2);
            $data['emAlta3'][1]->fotos = $produtoModel->fotos($emAltaSaloes->produtoFK2, 4, true);
        }
        if ($emAltaSaloes->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta3'][2] = $produtoModel->find($emAltaSaloes->produtoFK3);
            $data['emAlta3'][2]->fotos = $produtoModel->fotos($emAltaSaloes->produtoFK3, 4, true);
        }
        if ($emAltaSaloes->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta3'][3] = $produtoModel->find($emAltaSaloes->produtoFK4);
            $data['emAlta3'][3]->fotos = $produtoModel->fotos($emAltaSaloes->produtoFK4, 4, true);
        }
        if ($emAltaSaloes->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta3'][4] = $produtoModel->find($emAltaSaloes->produtoFK5);
            $data['emAlta3'][4]->fotos = $produtoModel->fotos($emAltaSaloes->produtoFK5, 4, true);
        }

        if ($emAltaTemporarias->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta4'][0] = $produtoModel->find($emAltaTemporarias->produtoFK1);
            $data['emAlta4'][0]->fotos = $produtoModel->fotos($emAltaTemporarias->produtoFK1, 4, true);
        }
        if ($emAltaTemporarias->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta4'][1] = $produtoModel->find($emAltaTemporarias->produtoFK2);
            $data['emAlta4'][1]->fotos = $produtoModel->fotos($emAltaTemporarias->produtoFK2, 4, true);
        }
        if ($emAltaTemporarias->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta4'][2] = $produtoModel->find($emAltaTemporarias->produtoFK3);
            $data['emAlta4'][2]->fotos = $produtoModel->fotos($emAltaTemporarias->produtoFK3, 4, true);
        }
        if ($emAltaTemporarias->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta4'][3] = $produtoModel->find($emAltaTemporarias->produtoFK4);
            $data['emAlta4'][3]->fotos = $produtoModel->fotos($emAltaTemporarias->produtoFK4, 4, true);
        }
        if ($emAltaTemporarias->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta4'][4] = $produtoModel->find($emAltaTemporarias->produtoFK5);
            $data['emAlta4'][4]->fotos = $produtoModel->fotos($emAltaTemporarias->produtoFK5, 4, true);
        }

        if ($emAltaServicos->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][0] = $produtoModel->find($emAltaServicos->produtoFK1);
            $data['emAlta5'][0]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK1, 4, true);
        }
        if ($emAltaServicos->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][1] = $produtoModel->find($emAltaServicos->produtoFK2);
            $data['emAlta5'][1]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK2, 4, true);
        }
        if ($emAltaServicos->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][2] = $produtoModel->find($emAltaServicos->produtoFK3);
            $data['emAlta5'][2]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK3, 4, true);
        }
        if ($emAltaServicos->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][3] = $produtoModel->find($emAltaServicos->produtoFK4);
            $data['emAlta5'][3]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK4, 4, true);
        }
        if ($emAltaServicos->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][4] = $produtoModel->find($emAltaServicos->produtoFK5);
            $data['emAlta5'][4]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK5, 4, true);
        }
        if ($emAltaServicos->produtoFK6) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][5] = $produtoModel->find($emAltaServicos->produtoFK6);
            $data['emAlta5'][5]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK6, 4, true);
        }
        if ($emAltaServicos->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $data['emAlta5'][6] = $produtoModel->find($emAltaServicos->produtoFK7);
            $data['emAlta5'][6]->fotos = $produtoModel->fotos($emAltaServicos->produtoFK7, 4, true);
        }

        $hospedagemHome = $anuncioModel->resetQuery()->select("produtoFK1, produtoFK2, produtoFK3, produtoFK4, produtoFK5")->find(3);
        $hospedagemHome = (array)$hospedagemHome;

        $produtoModel->resetQuery()->dadosCard()->whereIn("produto.id", $hospedagemHome);
        $data['hospedagemHome'] = $produtoModel->findAll();

        foreach ($data['hospedagemHome'] as $hosp) {
            $hosp->fotos = $produtoModel->fotos($hosp->id, 5, true);
        }

        $data['anuncioBannerH'] = $anuncioModel->find(11);        
        
        $categoriasComAnuncio = $produtoCategoriaModel->resetQuery()
            ->select("produto_categoria.id, produto_categoria.titulo, produto_categoria.arquivo, a.produtoFK1")
            ->join("anuncio a", "a.categoriaFK = produto_categoria.id")
            ->where("a.tipo", "servicocategoria")
        ->findAll();
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

    public function view($page = 'home')
    {

        $data = $this->buscaGeral();
        $data['segments'] = $segments = $this->request->uri->getSegments();

        $header = "header";
        $footer = "footer";
        $data['style_list'] = [];
        $data['script_list'] = [];
        switch ($page) {
            case "area-do-anunciante":
                $this->anunciante($page);
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
                    $data['script_list'] = ['swiper', 'card-like', 'controller-agenda', 'controller-card', 'controller-page-internal-3', 'form-filter', 'select'];

                    if (!is_numeric($get['page_produto'])) {
                        $paginate = 1;
                    } else {
                        $paginate = $get['page_produto'];
                    }

                    $data['eventos'] = $produtoModel->paginate(6, 'eventos', $paginate);
                    $data['pager'] = $produtoModel->pager;

                    if ($data['eventos']) {
                        foreach ($data['eventos'] as $ind => $destaque) {
                            $data['eventos'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                            $data['eventos'][$ind]->datas = $produtoModel->datas($destaque->id);
                        }
                    }

                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->where('pc.tipoFK', 5);
                    $produtoModel->where('ativo', '1');
                    $anuncioModel = model('App\Models\AnuncioModel', false);
                    $emAlta = $anuncioModel->find(5);

                    if ($emAlta->produtoFK1) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['emAlta'][0] = $produtoModel->find($emAlta->produtoFK1);
                        $data['emAlta'][0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
                        $data['emAlta'][0]->datas =  $produtoModel->datas($emAlta->id);;
                    }
                    if ($emAlta->produtoFK2) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['emAlta'][1] = $produtoModel->find($emAlta->produtoFK2);
                        $data['emAlta'][1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
                        $data['emAlta'][1]->datas =  $produtoModel->datas($emAlta->produtoFK2);
                    }
                } else {
                    $produtoDataModel = \model("App\Models\ProdutoDataModel", false);
                    $produtoDataModel->select('data');
                    $produtoDataModel->where('data >= NOW()');
                    $produtoDataModel->groupBy('data');
                    $produtoDataModel->orderBy('data ASC');
                    $produtoDataModel->limit(15);
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

                $produtoModel->resetQuery();
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->where('pc.tipoFK', 5);
                $produtoModel->where('ativo', '1');
                $data['destaques'] = $produtoModel->findAll();
                if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        $data['destaques'][$ind]->datas = $produtoModel->datas($destaque->id);
                    }
                }

                break;
            case "prestadores-de-servicos":
                $data['get'] = $get = request()->getGet();
                $data['style_list'] = ['swiper'];
                $data['script_list'] = ['swiper', 'card-like', 'controller-card', 'controller-imoveis', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                $data['form4Visible'] = 'visible';
                $produtoModel = \model("App\Models\ProdutoModel", false);

                $data['destaques'] = $produtoModel->destaquePrestadores(4);

                if (!is_numeric($get['page_produto'])) {
                    $paginate = 1;
                } else {
                    $paginate = $get['page_produto'];
                }

                $produtoModel->resetQuery();
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('pc.tipoFK', 6);
                $produtoModel->where('ativo', '1');
                $produtoModel->filtros($get);
                $data['servicos'] = $produtoModel->paginate(8, 'produto', $paginate);
                $data['pager'] = $produtoModel->pager;

                if ($data['servicos']) {
                    foreach ($data['servicos'] as $ind => $destaque) {
                        $data['servicos'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        if ($data['produtos'][$ind]->fotos) {
                            $data['produtos'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                        }
                    }
                }

                $data['pagina'] = 11;
                break;

            case 'prestador-de-servico':
                $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                $data['script_list'] = ['fancybox', 'swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-imoveis', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                helper('date');
                $data['bodyClass'] = 'internal-rent';
                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('identificador', $segments[1]);
                $data['metatag'] = $produtoModel->find()[0];
                $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);
                $data['cardapio'] = $produtoModel->cardapio($data['metatag']->id);
                $data['responsavel'] = $produtoModel->responsavel($data['metatag']->anuncianteFK);

                //  $data['pontosVenda'] = $produtoModel->pontosVenda($data['metatag']->id);
                //  $data['setores'] = $produtoModel->setores($data['metatag']->id);
                //  $data['organizacoes'] = $produtoModel->organizacoes($data['metatag']->id);

                $produtoModel->resetQuery();
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->where('pc.tipoFK', 6);
                $produtoModel->where('ativo', '1');
                $data['destaques'] = $produtoModel->findAll();
                if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                        $data['destaques'][$ind]->datas = $produtoModel->datas($destaque->id);
                    }
                }

                break;
            case 'salao-de-festa-e-area-de-lazer':
                helper('encrypt');
                helper('utils');
                $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                $data['script_list'] = ['fancybox', 'swiper', 'jquery_ui', 'card-like', 'controller-card', 'controller-page-internal', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                $data['bodyClass'] = 'internal-rent ';

                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('produto.identificador', $segments[1]);
                $data['metatag'] = $produtoModel->find()[0];
                $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);

                $data['valores'] = $produtoModel->valores($data['metatag']->id);
                $data['proximidades'] = $produtoModel->proximidades($data['metatag']->id);
                $data['anunciante'] = $produtoModel->anunciante($data['metatag']->anuncianteFK);
                $data['destaques'] = $produtoModel->destaquePrestadores(4);
                $data['videos'] = $produtoModel->videos($data['metatag']->id);

                break;
            case 'saloes-de-festas-e-areas-de-lazer':
                $data['form2Visible'] = 'visible';
                $data['get'] = $get = request()->getGet();

                $anuncioModel = model('App\Models\AnuncioModel', false);
                $emAlta = $anuncioModel->find(2);

                $data['style_list'] = ['fancybox', 'swiper'];
                $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-card', 'controller-imoveis', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                $data['bodyClass'] = 'base-list-map';
                $data['pagina'] = 25;

                $produtoModel = \model("App\Models\ProdutoModel", false);

                $data['destaques'] = $produtoModel->destaquePrestadores(4);

                if (!is_numeric($get['page_produto'])) {
                    $paginate = 1;
                } else {
                    $paginate = $get['page_produto'];
                }
                if ($emAlta->produtoFK1) {
                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $data['emAlta'][0] = $produtoModel->find($emAlta->produtoFK1);
                    $data['emAlta'][0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
                }
                if ($emAlta->produtoFK2) {
                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $data['emAlta'][1] = $produtoModel->find($emAlta->produtoFK2);
                    $data['emAlta'][1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
                }
                if ($emAlta->produtoFK3) {
                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $data['emAlta'][2] = $produtoModel->find($emAlta->produtoFK3);
                    $data['emAlta'][2]->fotos = $produtoModel->fotos($emAlta->produtoFK3, 4, true);
                }
                $contador = 0;
                if ($data['emAlta']) {
                    foreach ($data['emAlta'] as $ind => $produto) {

                        if ($produto->latitude && $produto->latitude) {
                            $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                        }

                        if ($produto->coordenadas) {
                            $data["coordenadas"][$contador]["id"] = $produto->id;

                            $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                            $data["coordenadas"][$contador]["foto"] = $produto->fotos[0];
                            $data["coordenadas"][$contador]["preco"] = $produto->preco;

                            $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                            $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                            $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                        }
                        $contador++;
                    }
                }

                $produtoModel->resetQuery();
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('pc.tipoFK', 2);
                $produtoModel->where('ativo', '1');
                $produtoModel->filtros($get);
                $data['saloes'] = $produtoModel->paginate(8, 'produto', $paginate);
                $data['pager'] = $produtoModel->pager;

                foreach ($data['saloes'] as $ind => $produto) {
                    $data['saloes'][$ind]->fotos = $produtoModel->fotos($produto->id, 4, true);
                    if ($produto->latitude && $produto->latitude) {
                        $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                    }

                    if ($produto->coordenadas) {
                        $data["coordenadas"][$contador]["id"] = $produto->id;

                        $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                        $data["coordenadas"][$contador]["foto"] = $data['produtos'][$ind]->fotos[0];
                        $data["coordenadas"][$contador]["preco"] = $produto->preco;

                        $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                        $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                        $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                    }
                    $contador++;
                }

                break;

            case "aluguel-para-temporada":
                $data['style_list'] = ['fancybox', 'swiper'];
                $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-blog', 'controller-card', 'controller-page-internal', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                \helper(['utils']);
                $data['bodyClass'] = "base-list-map";
                $data['pagina'] = 12;

                $data['get'] = $get = request()->getGet();

                $paginate = \is_numeric($get['page_anuncios']) ? $get['page_anuncios'] : 1;

                $this->anuncioModel = \model("App\Models\AnuncioModel", false)
                    ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3, anuncio.produtoFK4, anuncio.produtoFK5, anuncio.produtoFK7");
                $busca = (array)$this->anuncioModel->find(1);

                $this->produtoModel = \model('App\Models\ProdutoModel', false)
                    ->dadosCard()
                    ->whereIn("produto.id", $busca)
                    ->where("ativo", 1);
                $data['alugueisEmAlta'] = $this->produtoModel->findAll();
                $contador = 0;
                foreach ($data['alugueisEmAlta'] as $ind => $item) {
                    if ($item->id == $busca['produtoFK1']) {
                        $data['alugueisEmAlta']['grande'] = $item;
                    } else {
                        $data['alugueisEmAlta']['comum'][] = $item;
                    }

                    $data['alugueisEmAlta'][$ind]->fotos = $this->produtoModel->fotos($item->id, 4);

                    if ($produto->latitude && $produto->latitude) {
                        $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                    }

                    if ($produto->coordenadas) {
                        $data["coordenadas"][$contador]["id"] = $produto->id;

                        $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                        $data["coordenadas"][$contador]["foto"] = $data['produtos'][$ind]->fotos[0];
                        $data["coordenadas"][$contador]["preco"] = $produto->preco;

                        $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                        $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                        $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                    }
                    $contador++;
                }


                $this->produtoModel->resetQuery()
                    ->dadosCard()
                    ->where("pc.tipoFK", 1)
                    ->where("ativo", 1)
                    ->ordernar($get['ordem']);
                $data['alugueisParaTemporada'] = $this->produtoModel->paginate(8, "anuncios", $paginate);
                if ($data['alugueisParaTemporada']) {
                    foreach ($data['alugueisParaTemporada'] as $ind => $produto) {
                        $data['alugueisParaTemporada'][$ind]->fotos = $this->produtoModel->fotos($produto->id, 4, true);

                        if ($produto->latitude && $produto->latitude) {
                            $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                        }

                        if ($produto->coordenadas) {
                            $data["coordenadas"][$contador]["id"] = $produto->id;

                            $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                            $data["coordenadas"][$contador]["foto"] = $data['produtos'][$ind]->fotos[0];
                            $data["coordenadas"][$contador]["preco"] = $produto->preco;

                            $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                            $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                            $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                        }
                        $contador++;
                    }
                }

                $data['pager'] = $this->produtoModel->pager;

                foreach ($data['alugueisParaTemporada'] as $item) {
                    $item->fotos = $this->produtoModel->fotos($item->id, 5, true);
                }



                if ($segments[1] && !is_numeric($segments[1])) {
                    helper('encrypt');

                    $data['espacoAtual'] = $data['metatag'] = $this->produtoModel
                        ->resetQuery()
                        ->dadosCard()
                        ->where("produto.identificador", $segments[1])
                        ->first();

                    // Interna
                    $data['script_list'] = ['fancybox', 'swiper', 'sticksy', 'card-like', 'controller-card', 'controller-page-internal', 'controler-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter'];

                    $page = "aluguel-para-temporada-interna";
                    $data['bodyClass'] = "internal-rent";

                    $data['espacoAtual']->fotos = $this->produtoModel->fotos($data['espacoAtual']->id, 99);
                    $data['espacoAtual']->valores = $this->produtoModel->valores($data['espacoAtual']->id);
                    // $data['espacoAtual']->fotoDestaque = $this->produtoModel->fotoDestaque($data['espacoAtual']->fotoFK);
                    $data['espacoAtual']->comodidades = $this->produtoModel->comodidades($data['espacoAtual']->id);
                    $data['espacoAtual']->proximidades = $this->produtoModel->proximidades($data['espacoAtual']->id);
                    $data['espacoAtual']->anunciante = $this->produtoModel->anunciante($data['espacoAtual']->anuncianteFK);
                    $data['espacoAtual']->total = $this->produtoModel->valorTotal($data['espacoAtual']->valores, $data['espacoAtual']->preco);

                    // Serviços em Alta
                    $this->anuncioModel->resetQuery()
                        ->select("produtoFK1, produtoFK2, produtoFK3, produtoFK4, produtoFK5, produtoFK6, produtoFK7");
                    $busca = $this->anuncioModel->find(9);

                    $this->produtoModel->resetQuery()
                        ->dadosCard()
                        ->whereIn("produto.id", (array) $busca)
                        ->orderBy("rand()");
                    $this->produtoModel->limit(4);
                    $data['servicosEmAlta'] = $this->produtoModel->findAll(4);
                    foreach ($data['servicosEmAlta'] as $ind => $emAlta) {
                        $data['servicosEmAlta'][$ind]->fotos = $this->produtoModel->fotos($emAlta->id, 4);
                    }
                    $data['coordenadas'] = array();
                }

                break;
            case "lojas-temporarias":
                $this->produtoModel = \model('App\Models\ProdutoModel', false);
                $this->anuncioModel = \model('App\Models\AnuncioModel', false);

                if ($segments[1] && !is_numeric($segments[1])) {
                    helper("utils");
                    // Interna

                    $data['lojaAtual'] = $data['metatag'] = $this->produtoModel
                        ->resetQuery()
                        ->dadosCard()
                        ->where("produto.identificador", $segments[1])
                        ->first();

                    $data['coordenadas'] = NULL;
                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];
                    $page = "lojas-temporarias-interna";
                    $data['bodyClass'] = "internal-rent";

                    $data['lojaAtual']->fotos = $this->produtoModel->fotos($data['lojaAtual']->id, 99, true);
                    $data['lojaAtual']->valores = $this->produtoModel->valores($data['lojaAtual']->id);
                    $data['lojaAtual']->comodidades = $this->produtoModel->comodidades($data['lojaAtual']->id);
                    $data['lojaAtual']->proximidades = $this->produtoModel->proximidades($data['lojaAtual']->id);
                    $data['lojaAtual']->anunciante = $this->produtoModel->anunciante($data['lojaAtual']->anuncianteFK);
                    $data['lojaAtual']->total = $this->produtoModel->valorTotal($data['lojaAtual']->valores, $data['lojaAtual']->preco);

                    // Serviços em Alta
                    $this->anuncioModel->resetQuery();
                    $this->anuncioModel->select("produtoFK1, produtoFK2, produtoFK3, produtoFK4, produtoFK5, produtoFK6, produtoFK7");
                    $busca = $this->anuncioModel->find(9);
                } else {
                    $data['style_list'] = ['fancybox', 'swiper'];
                    $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-card', 'controller-imoveis', 'modal-filter', 'modal-select-order'];

                    \helper(['utils']);
                    $data['bodyClass'] = "base-list-map";
                    $data['pagina'] = 24;

                    $data['get'] = $get = request()->getGet();

                    $paginate = \is_numeric($get['page_anuncios']) ? $get['page_anuncios'] : 1;

                    $this->anuncioModel = \model("App\Models\AnuncioModel", false)
                        ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3");
                    $emAlta = $this->anuncioModel->find(4);

                    if ($emAlta->produtoFK1) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][0] = $this->produtoModel->find($emAlta->produtoFK1);
                        $data['lojasEmAlta'][0]->fotos = $this->produtoModel->fotos($emAlta->produtoFK1, 4, true);
                    }
                    if ($emAlta->produtoFK2) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][1] = $this->produtoModel->find($emAlta->produtoFK2);
                        $data['lojasEmAlta'][1]->fotos = $this->produtoModel->fotos($emAlta->produtoFK2, 4, true);
                    }
                    if ($emAlta->produtoFK3) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][2] = $this->produtoModel->find($emAlta->produtoFK3);
                        $data['lojasEmAlta'][2]->fotos = $this->produtoModel->fotos($emAlta->produtoFK3, 4, true);
                    }



                    foreach ($data['lojasEmAlta'] as $ind => $item) {
                        $data['lojasEmAlta'][$ind]->fotos = $this->produtoModel->fotos($item->id, 4);
                    }

                    $this->produtoModel->resetQuery()
                        ->dadosCard()
                        ->where("pc.tipoFK", 4)
                        ->where("ativo", 1);
                    $this->produtoModel->ordernar($get['ordem']);
                    $data['lojasTemporarias'] = $this->produtoModel->paginate(8, "anuncios", $paginate);
                    $data['pager'] = $this->produtoModel->pager;

                    if ($data['lojasTemporarias']) {
                        foreach ($data['lojasTemporarias'] as $ind => $produto) {
                            $data['lojasTemporarias'][$ind]->fotos = $this->produtoModel->fotos($produto->id, 4, true);

                            if ($produto->latitude && $produto->latitude) {
                                $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                            }

                            if ($produto->coordenadas) {
                                $data["coordenadas"][$ind]["id"] = $produto->id;

                                $data["coordenadas"][$ind]["titulo"] = $produto->titulo;
                                $data["coordenadas"][$ind]["foto"] = $data['produtos'][$ind]->fotos[0];
                                $data["coordenadas"][$ind]["preco"] = $produto->preco;

                                $data["coordenadas"][$ind]["pagina"] = "hospedagem";

                                $data["coordenadas"][$ind]["coord"] = $produto->coordenadas;
                                $data["coordenadas"][$ind]["identificador"] = $produto->identificador;
                            }
                        }
                    }


                    $data['lojaAtual'] = $this->produtoModel
                        ->resetQuery()
                        ->dadosCard()
                        ->where("produto.identificador", $segments[1])
                        ->first();
                }

                $this->produtoModel = \model('App\Models\ProdutoModel', false);
                $data['destaques'] = $this->produtoModel->destaquePrestadores(4);
                break;
            case "blog":
                $data['script_list'] = ['modal-filter'];

                $data['bodyClass'] = 'blog-list';
                $data['pagina'] = 5;
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
                    // Blog Interna
                    $data['style_list'] = ['swiper'];
                    $data['script_list'] = ['swiper'];

                    \helper("url");
                    $data['crrUrl'] = \current_url(); // Compartilhar: copiar link ?
                    $page = 'blog-interna';

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
                    $data['artigosCategoria'] = $this->artigoModel->paginate(1, "artigos", $paginate);
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
            case 'hospedagens':
                $data['style_list'] = ['fancybox', 'swiper'];
                $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-card', 'fs-lightbox', 'modal-filter', 'modal-select-order'];
                $data['pagina'] = 23;
                $data['bodyClass'] = 'base-list-map';

                $produtoModel = model('App\Models\ProdutoModel', false);
                $retorno = $produtoModel->hospedagens(11);
                $data['produtos'] = $retorno['servicos'];
                $data['pager'] = $retorno['pager'];
                if ($data['produtos']) {
                    foreach ($data['produtos'] as $ind => $produto) {
                        $data['produtos'][$ind]->fotos = $produtoModel->fotos($produto->id, 4, true);

                        if ($data['produtos'][$ind]->fotos) {
                            $data['produtos'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                        }

                        if ($produto->latitude && $produto->latitude) {
                            $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                        }

                        if ($produto->coordenadas) {
                            $data["coordenadas"][$ind]["id"] = $produto->id;

                            $data["coordenadas"][$ind]["titulo"] = $produto->titulo;
                            $data["coordenadas"][$ind]["foto"] = $data['produtos'][$ind]->fotos[0];
                            $data["coordenadas"][$ind]["preco"] = $produto->preco;

                            $data["coordenadas"][$ind]["pagina"] = "hospedagem";

                            $data["coordenadas"][$ind]["coord"] = $produto->coordenadas;
                            $data["coordenadas"][$ind]["identificador"] = $produto->identificador;
                        }
                    }
                }

                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('pc.tipoFK', 3);
                $produtoModel->where('ativo', '1');
                $produtoModel->orderBy('rand()');
                $data['destaques'] = $produtoModel->findAll(8);
                if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);

                        if ($data['destaques'][$ind]->fotos) {
                            $data['destaques'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                        }
                    }
                }

                break;
            case 'hospedagem':
                $data['style_list'] = ['jquery_ui', 'swiper'];
                $data['script_list'] = ['swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-imoveis', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];
                $data['pagina'] = 23;
                $data['bodyClass'] = 'internal-rent';

                helper(['date', 'utils']);
                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('identificador', $segments[1]);
                $data['metatag'] = $produtoModel->find()[0];
                $data['metatag']->valores = $produtoModel->valores($data['metatag']->id);
                $data['metatag']->proximidades = $produtoModel->proximidades($data['metatag']->id);
                $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);
                $data['responsavel'] = $produtoModel->responsavel($data['metatag']->anuncianteFK);
                $data['comodidades'] = $produtoModel->comodidades($data['metatag']->id);

                $produtoModel = \model("App\Models\ProdutoModel", false);
                $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                $produtoModel->join('estado e', 'e.id = c.estadoFK');
                $produtoModel->where('pc.tipoFK', 6);
                $produtoModel->where('ativo', '1');
                $produtoModel->orderBy('rand()');
                $data['destaques'] = $produtoModel->findAll(8);
                if ($data['destaques']) {
                    foreach ($data['destaques'] as $ind => $destaque) {
                        $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                    }
                }
                $data['coordenadas'] = array();
                break;
            case "contato":
                $data['script_list'] = ['mask-telefone', 'modal-filter'];

                $data['bodyClass'] = 'contact';
                $data['pagina'] = 6;
                $data['txContato'] = $this->textoModel->find(7);
                break;
            case "politica-de-privacidade-e-termos-de-uso":
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

                $tipoModel = \model("App\Models\TipoModel", false);
                $data['tipos'] = $tipoModel->select("id, titulo")->findAll();

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

                $data["clienteLogado"] = $clienteModel->find($this->session->get('cliente')->id);

                $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
                $produtoModel = model('App\Models\ProdutoModel', false);

                if ($data['todosFavoritos']) {
                    $produtoModel->dadosCard()
                        ->whereIn("produto.id", $data['todosFavoritos']);
                    $data['favoritos'] = $produtoModel->findAll();
                }
                foreach ($data['favoritos'] as $ind => $favorito) {
                    $favorito->fotos = $produtoModel->fotos($favorito->id, 4, true);
                }

                $clienteInteresseModel->select('pc.titulo, cliente_interesse.id');
                $clienteInteresseModel->join('produto_categoria pc', 'pc.id = cliente_interesse.categoriaFK');
                $clienteInteresseModel->where("clienteFK", $this->session->get('cliente')->id);
                $data['clientesInteresses'] = $clienteInteresseModel->findAll();

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
                unset($_SESSION['cliente']);
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
