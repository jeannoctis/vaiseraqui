<?php

namespace App\Controllers;

class Produto extends BaseController {

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text', 'utils']);
        $this->model = model('App\Models\ProdutoModel', false);
        $this->produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $this->tabela = "produto";

        $get = request()->getGet();
        $this->session->set('menuAdmin', 7);
    }

    public function index() {
        helper('date');
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->model->delete(['id' => $exc]);
            }
        } else if ($_POST['nexc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $data['get'] = $get = request()->getGet();

        $paginate = \is_numeric($get['page_produtos']) ? $get['page_produtos'] : 1;

        $this->produtoCategoriaModel
                ->select('id, titulo')
                ->where("tipoFK", $get['tipo']);
        $IDsCategorias = $data['categorias'] = $this->produtoCategoriaModel->findAll();

        $this->estadoModel = model('App\Models\EstadoModel', false)
                ->select('estado.id AS estado_id, estado.titulo AS estado_titulo, cidade.id AS cidade_id, cidade.titulo AS cidade_titulo')
                ->join('cidade', 'estado.id = cidade.estadoFK', 'inner')
                ->orderBy('estado_titulo ASC, cidade_titulo ASC');
        $data['estados'] = $this->estadoModel->findAll();

        $estados = [];
        foreach ($data['estados'] as $item) {
            if (!isset($estados[$item->estado_id])) {
                $estados[$item->estado_id] = (object) [
                            'estado_id' => $item->estado_id,
                            'estado_titulo' => $item->estado_titulo,
                            'cidades' => []
                ];
            }

            $estados[$item->estado_id]->cidades[] = (object) [
                        'cidade_id' => $item->cidade_id,
                        'cidade_titulo' => $item->cidade_titulo
            ];
        }
        $data['estados'] = array_values($estados);

        $this->anuncianteModel = \model('App\Models\AnuncianteModel', false);
        $data['anunciantes'] = $this->anuncianteModel
                ->distinct()
                ->select("anunciante.id, anunciante.titulo, anunciante.email, p.anuncianteFK")
                ->join("produto p", "anunciante.id = p.anuncianteFK")
                ->findAll();

        if (empty($IDsCategorias)) {
            $IDsCategorias[]['id'] = 0;
        }

        $IDsCategorias = array_column($IDsCategorias, 'id');

        if (!empty($get['categoria'])) {
            $this->model->where("categoriaFK", $get['categoria']);
        } else {
            $this->model->whereIn("categoriaFK", $IDsCategorias);
        }

        if (!empty($get['procura'])) {
            $this->model->groupStart()
                    ->like("titulo", $get['procura'])
                    ->orLike("descricao", $get['procura'])
                    ->orLike("detalhes", $get['procura'])
                    ->groupEnd();
        }

        if (!empty($get['cidade'])) {
            $this->model->where("cidadeFK", $get['cidade']);
        }

        if (!empty($get['anunciante'])) {
            $this->model->where("anuncianteFK", $get['anunciante']);
        }

        if (!empty($get['anunciante'])) {
            $this->model->where("anuncianteFK", $get['anunciante']);
        }

        $data['lista'] = $this->model->orderBy("titulo ASC")->paginate(25, 'produtos', $paginate);

        $tipoModel = \model('App\Models\TipoModel', false);
        $data['tipoAtual'] = $tipoModel->find($get['tipo']);
        
      if ( $data['tipoAtual']->tipo ==  'EVENTOS') {
         $this->produtoDataModel = \model("App\Models\ProdutoDataModel", false);
         foreach ($data['lista'] as $item) {
            $this->produtoDataModel->resetQuery();
            $item->datas = $this->produtoDataModel
               ->where("produtoFK", $item->id)
               ->orderBy("DATEDIFF(produto_data.data, CURDATE())", "DEESC")
               ->findAll();
         }
         $this->model->join("produto_data pdata", "pdata.produtoFK = produto.id");
      }

      $anuncioModel = \model("App\Models\AnuncioModel", false);
      if (!empty($get['tipo']) && !empty($get['cidade'])) {
         if (\in_array($data['tipoAtual']->tipo, ['ALUGUEL', 'SALOES', 'HOSPEDAGEM', 'LOJAS'])) {
            $busca = $anuncioModel
               ->where("tipoFK", $get['tipo'])
               ->where("cidadeFK", $get['cidade'])
               ->where("tipo", "tipo")
            ->first();

            $data['produtoFK1'] = [];
            $data['produtosFKs'] = [];
            if ($busca) {
               $data['produtoFK1'] = $busca->produtoFK1;
               $data['produtosFKs'] = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5];
            }

            $busca = $anuncioModel->resetQuery()
               ->where("tipoFK", $get['tipo'])
               ->where("cidadeFK", $get['cidade'])
               ->where("tipo", "emalta")
            ->first();

            $data['altaProdutoFK1'] = [];
            $data['altaProdutosFKs'] = [];
            if ($busca) {
               $data['altaProdutoFK1'] = $busca->produtoFK1;
               $data['altaProdutosFKs'] = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5];
            }

         } else if ($data['tipoAtual']->tipo == 'PRESTADORES' && !empty($get['categoria'])) {

            $busca = $anuncioModel
               ->where("tipoFK", $get['tipo'])
               ->where("cidadeFK", $get['cidade'])
               ->where("categoriaFK", $get['categoria'])
               ->where("tipo", "servicocategoria")
            ->first();

            $data['produtoFK1'] = [];
            $data['produtosFKs'] = [];
            if($busca) {
               $data['produtoFK1'] = $busca->produtoFK1;
               $data['produtosFKs'] = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5, $busca->produtoFK6, $busca->produtoFK7];
            }

            $busca = $anuncioModel->resetQuery()
               ->where("tipoFK", $get['tipo'])
               ->where("cidadeFK", $get['cidade'])
               ->where("categoriaFK", $get['categoria'])
               ->where("tipo", "emalta")
            ->first();

            $data['altaProdutoFK1'] = [];
            $data['altaProdutosFKs'] = [];
            if($busca) {
               $data['altaProdutoFK1'] = $busca->produtoFK1;
               $data['altaProdutosFKs'] = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5, $busca->produtoFK6, $busca->produtoFK7];
            }            
         }
      }

        $data['pager'] = $this->model->pager;

        $data['tipo'] = \getTipo($get['tipo']);

        $data['title'] = 'Produtos';
        $data['tabela'] = $this->tabela;
        $data["nomeModel"] = "ProdutoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form() {
        $post = request()->getPost();
        $data['get'] = $get = request()->getGet();
        $id = decode($this->request->uri->getSegment(4));

        $data['categoriasDoTipo'] = $this->produtoCategoriaModel
                ->where("tipoFK", $get['tipo'])
                ->findAll();

        $this->cidadeModel = \model('App\Models\CidadeModel', false);
        $this->estadoModel = \model('App\Models\EstadoModel', false);

        $data['estados'] = $this->estadoModel
                ->where('EXISTS (SELECT 1 FROM cidade WHERE estado.id = cidade.estadoFK)')
                ->orderBy('titulo ASC')
                ->findAll();

        foreach ($data['estados'] as $ind => $estado) {
            $this->cidadeModel->resetQuery();
            $this->cidadeModel->where('estadoFK', $estado->id);
            $this->cidadeModel->orderBy('titulo ASC');
            $data['estados'][$ind]->cidades = $this->cidadeModel->findAll();
        }

        $this->anuncianteModel = \model('App\Models\AnuncianteModel', false);
        $data['anunciantes'] = $this->anuncianteModel->orderBy("titulo ASC, id DESC")->findAll();

        $data['tipo'] = \getTipo($get['tipo']);
        
        $tipoModel = \model('App\Models\TipoModel', false);
        $data['tipoAtual'] = $tipoModel->find($get['tipo']);

        $this->produtoValorModel = \model('App\Models\ProdutoValorModel', false);
        $this->produtoComodidadeModel = \model('App\Models\ProdutoComodidadeModel', false);
        $this->produtoProximidadeModel = \model('App\Models\ProdutoProximidadeModel', false);
        $this->produtoSetorModel = \model('App\Models\ProdutoSetorModel', false);
        $this->setorIngressoModel = \model('App\Models\SetorIngressoModel', false);
        $this->produtoPontoDeVendaModel = \model('App\Models\ProdutoPontoDeVendaModel', false);
        $this->produtoCardapioModel = \model('App\Models\ProdutoCardapioModel', false);
        $this->produtoOrganizacaoModel = \model('App\Models\ProdutoOrganizacaoModel', false);
        $this->produtoDataModel = \model('App\Models\ProdutoDataModel', false);

        $this->comodidadeModel = \model('App\Models\ComodidadeModel', false);
        $data['comodidadesDisponiveis'] = $this->comodidadeModel->findAll();

        $this->proximidadeModel = \model('App\Models\ProximidadeModel', false);
        $data['proximidadesDisponiveis'] = $this->proximidadeModel->orderBy("ordem ASC, id DESC")->findAll();

        $this->cardapioModel = \model('App\Models\CardapioModel', false);
        $data['cardapiosDisponiveis'] = $this->cardapioModel->findAll();

        $data['title'] = 'Anúncio';
        $data['tabela'] = 'produto';
        $data['resultado'] = "";

        if ($post) {

            if ($post['apagarcardapio']) {
                $post['cardapio'] = NULL;
            }

            $post['preco'] = \str_replace(['.', ','], ['', '.'], $post['preco']);

            $pdf = $this->request->getFile("cardapio");
            if ($pdf) {
                if ($pdf->isValid() && !$pdf->hasMoved()) {
                    $newName = date('Y-m-d') . $pdf->getRandomName();
                    $post["cardapio"] = $newName;
                    $pdf->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                    try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $pdf->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $pdf = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($pdf);
                        imagealphablending($pdf, true);
                        imagesavealpha($pdf, true);
                        imagewebp($pdf, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                        imagedestroy($pdf);
                    } catch (\Tinify\ClientException $e) {
                        
                    }
                }
            }

            if ($id) {
                $post["id"] = $lastId = $id;
                $data['salvou'] = $this->model->save($post);
            } else {
                $post["identificador"] = \arruma_url($post['titulo']);
                $data['salvou'] = $lastId = $this->model->insert($post);
            }

            if (!empty($post['valor'])) {
                $IDsReceviedValor = \array_column($post['valor'], "id");

                if (!empty($IDsReceviedValor)) {
                    $this->produtoValorModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedValor)
                            ->delete();
                }

                foreach ($post['valor'] as $item) {
                    $item['valor'] = \str_replace(['.', ','], ['', '.'], $item['valor']);

                    if (!empty($item['id'])) {
                        $updateValor[] = [
                            'id' => $item['id'],
                            'titulo' => $item['titulo'],
                            'valor' => $item['valor'],
                        ];
                    } else {
                        $insertValor[] = [
                            'produtoFK' => $lastId,
                            'titulo' => $item['titulo'],
                            'valor' => $item['valor'],
                        ];
                    }
                }

                if (!empty($updateValor)) {
                    $this->produtoValorModel->updateBatch($updateValor, "id");
                }
                if (!empty($insertValor)) {
                    $this->produtoValorModel->insertBatch($insertValor);
                }
            } else {
                $this->produtoValorModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['catCmdd'])) {
                $IDsReceviedCatCmdd = \array_column($post['catCmdd'], "id");

                if (!empty($IDsReceviedCatCmdd)) {
                    $this->produtoComodidadeModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedCatCmdd)
                            ->delete();
                }

                foreach ($post['catCmdd'] as $item) {

                    if (!empty($item['id'])) {
                        $updateCatCmdd[] = [
                            'id' => $item['id'],
                            'titulo' => $item['titulo'],
                            'comodidades' => $item['comodidades']
                        ];
                    } else {
                        $insertCatCmdd[] = [
                            'produtoFK' => $lastId,
                            'titulo' => $item['titulo'],
                            'comodidades' => $item['comodidades']
                        ];
                    }
                }

                if (!empty($updateCatCmdd)) {
                    $this->produtoComodidadeModel->updateBatch($updateCatCmdd, "id");
                }
                if (!empty($insertCatCmdd)) {
                    $this->produtoComodidadeModel->insertBatch($insertCatCmdd);
                }
            } else {
                $this->produtoComodidadeModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['proximidade'])) {
                $IDsReceviedProximidade = \array_column($post['proximidade'], "id");

                if (!empty($IDsReceviedProximidade)) {
                    $this->produtoProximidadeModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedProximidade)
                            ->delete();
                }

                foreach ($post['proximidade'] as $item) {

                    if (!empty($item['id'])) {
                        $updateProximidade[] = [
                            'id' => $item['id'],
                            'proximidades' => $item['proximidades']
                        ];
                    } else {
                        $insertProximidade[] = [
                            'produtoFK' => $lastId,
                            'proximidadeFK' => $item['proximidadeFK'],
                            'proximidades' => $item['proximidades']
                        ];
                    }
                }

                if (!empty($updateProximidade)) {
                    $this->produtoProximidadeModel->updateBatch($updateProximidade, "id");
                }
                if (!empty($insertProximidade)) {
                    $this->produtoProximidadeModel->insertBatch($insertProximidade);
                }
            } else {
                $this->produtoProximidadeModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['setorIngresso'])) {

                $IDsReceivedSetor = \array_column($post['setorIngresso'], "id");
                if (!empty($IDsReceivedSetor)) {
                    $this->produtoSetorModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceivedSetor)
                            ->delete();
                }

                foreach ($post['setorIngresso'] as $item) {

                    if (!empty($item['id'])) {

                        foreach ($item['ingressos'] as $ingresso) {
                            $ingresso['preco'] = \str_replace(['.', ','], ['', '.'], $ingresso['preco']);

                            if (!empty($ingresso['idIngresso'])) {

                                $updateIngresso[] = [
                                    'id' => $ingresso['idIngresso'],
                                    'titulo' => $ingresso['modalidade'],
                                    'preco' => $ingresso['preco']
                                ];
                            } else {

                                $insertIngressos[] = [
                                    'setorFK' => $item['idSetor'],
                                    'titulo' => $ingresso['titulo'],
                                    'preco' => $ingresso['preco']
                                ];
                            }
                        }
                    } else {
                        $setorData = [
                            'produtoFK' => $lastId,
                            'setor' => $item['setor']
                        ];

                        $lastSetorId = $this->produtoSetorModel->insert($setorData);

                        foreach ($item['ingressos'] as $ingresso) {
                            $ingresso['preco'] = \str_replace(['.', ','], ['', '.'], $ingresso['preco']);

                            $insertIngressos[] = [
                                'setorFK' => $lastSetorId,
                                'titulo' => $ingresso['titulo'],
                                'preco' => $ingresso['preco']
                            ];
                        }
                    }
                }

                if (!empty($updateIngresso)) {
                    $this->setorIngressoModel->updateBatch($updateIngresso, "id");
                }

                if (!empty($insertIngressos)) {
                    $this->setorIngressoModel->insertBatch($insertIngressos);
                }
            } else {
                $this->produtoSetorModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['pdvs'])) {
                $IDsReceivedPdv = \array_column($post['pdvs'], "id");

                if (!empty($IDsReceivedPdv)) {
                    $this->produtoPontoDeVendaModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceivedPdv)
                            ->delete();
                }

                foreach ($post['pdvs'] as $item) {
                    if (!empty($item['id'])) {
                        $updatePdv[] = [
                            'id' => $item['id'],
                            'titulo' => $item['titulo'],
                            'endereco' => $item['endereco'],
                            'cep' => $item['cep'],
                            'cidade' => $item['cidade'],
                        ];
                    } else {
                        $insertPdv[] = [
                            'produtoFK' => $lastId,
                            'tipo' => $item['tipo'],
                            'titulo' => $item['titulo'],
                            'endereco' => $item['endereco'],
                            'cep' => $item['cep'],
                            'cidade' => $item['cidade'],
                        ];
                    }
                }

                if (!empty($updatePdv)) {
                    $this->produtoPontoDeVendaModel->updateBatch($updatePdv, "id");
                }

                if (!empty($insertPdv)) {
                    $this->produtoPontoDeVendaModel->insertBatch($insertPdv);
                }
            } else {
                $this->produtoPontoDeVendaModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['cardapios'])) {
                $IDsReceviedCardapios = \array_column($post['cardapios'], "id");

                if (!empty($IDsReceviedCardapios)) {
                    $this->produtoCardapioModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedCardapios)
                            ->delete();
                }

                foreach ($post['cardapios'] as $item) {

                    if (!empty($item['id'])) {
                        $updateCardapios[] = [
                            'id' => $item['id'],
                            'titulo' => $item['titulo'],
                            'menu' => $item['menu']
                        ];
                    } else {
                        $insertCardapios[] = [
                            'produtoFK' => $lastId,
                            'titulo' => $item['titulo'],
                            'menu' => $item['menu']
                        ];
                    }
                }

                if (!empty($updateCardapios)) {
                    $this->produtoCardapioModel->updateBatch($updateCardapios, "id");
                }
                if (!empty($insertCardapios)) {
                    $this->produtoCardapioModel->insertBatch($insertCardapios);
                }
            } else {
                $this->produtoCardapioModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['organizadores'])) {
                $IDsReceviedOrganizadores = \array_column($post['organizadores'], "id");

                if (!empty($IDsReceviedOrganizadores)) {
                    $this->produtoOrganizacaoModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedOrganizadores)
                            ->delete();
                }

                foreach ($post['organizadores'] as $item) {

                    if (!empty($item['id'])) {
                        $updateOrganizadores[] = [
                            'id' => $item['id'],
                            'titulo' => $item['titulo'],
                            'endereco' => $item['endereco'],
                            'cidade' => $item['cidade'],
                            'site' => $item['site']
                        ];
                    } else {
                        $insertOrganizadores[] = [
                            'produtoFK' => $lastId,
                            'titulo' => $item['titulo'],
                            'endereco' => $item['endereco'],
                            'cidade' => $item['cidade'],
                            'site' => $item['site']
                        ];
                    }
                }

                if (!empty($updateOrganizadores)) {
                    $this->produtoOrganizacaoModel->updateBatch($updateOrganizadores, "id");
                }
                if (!empty($insertOrganizadores)) {
                    $this->produtoOrganizacaoModel->insertBatch($insertOrganizadores);
                }
            } else {
                $this->produtoOrganizacaoModel->where("produtoFK", $lastId)->delete();
            }

            if (!empty($post['datas'])) {
                $IDsReceviedDatas = \array_column($post['datas'], "id");

                if (!empty($IDsReceviedDatas)) {
                    $this->produtoDataModel
                            ->where("produtoFK", $lastId)
                            ->whereNotIn("id", $IDsReceviedDatas)
                            ->delete();
                }

                foreach ($post['datas'] as $item) {
                    if (!empty($item['id'])) {
                        $updateDatas[] = [
                            'id' => $item['id'],
                            'data' => $item['data'],
                            'horarioInicio' => $item['horarioInicio'],
                            'horarioTermino' => $item['horarioTermino']
                        ];
                    } else {
                        $insertDatas[] = [
                            'produtoFK' => $lastId,
                            'data' => $item['data'],
                            'horarioInicio' => $item['horarioInicio'],
                            'horarioTermino' => $item['horarioTermino']
                        ];
                    }
                }

                if (!empty($updateDatas)) {
                    $this->produtoDataModel->updateBatch($updateDatas, "id");
                }
                if (!empty($insertDatas)) {
                    $this->produtoDataModel->insertBatch($insertDatas);
                }
            } else {
                $this->produtoDataModel->where("produtoFK", $lastId)->delete();
            }

            $data["erros"] = $this->model->errors();
        }

        if ($id) {
            $data["resultado"] = $this->model->find($id);

            $data['valores'] = $this->produtoValorModel
                    ->where("produtoFK", $id)
                    ->findAll();

            $data['produtoPrincCmdd'] = $this->model
                    ->select("principaiscomodidades")
                    ->find($id);

            $data['catsCmdds'] = $this->produtoComodidadeModel
                    ->where("produtoFK", $id)
                    ->findAll();

            $data['proximidadesProduto'] = $this->produtoProximidadeModel
                    ->where("produtoFK", $id)
                    ->select("produto_proximidade.id AS pp_id, proximidadeFK, produtoFK, proximidades, p.titulo, p.arquivo")
                    ->join("proximidade p", "p.id = produto_proximidade.proximidadeFK")
                    ->findAll();

            if (!empty($data['proximidadesProduto'])) {
                $proximidadesFKProduto = \array_column($data['proximidadesProduto'], "proximidadeFK");

                $data['proximidadesDisponiveis'] = $this->proximidadeModel
                        ->whereNotIn("id", $proximidadesFKProduto)
                        ->findAll();
            }

            $data['setores'] = $this->produtoSetorModel
                    ->where("produtoFK", $id)
                    ->findAll();

            foreach ($data['setores'] as $key => $setor) {
                $this->setorIngressoModel
                        ->resetQuery()
                        ->where("setorFK", $setor->id)
                        ->orderBy("preco ASC, id DESC");
                $data['setores'][$key]->ingressos = $this->setorIngressoModel->findAll();
            }

            $data['pontosDeVenda'] = $this->produtoPontoDeVendaModel->where("produtoFK", $id)->findAll();
            $data['cardapios'] = $this->produtoCardapioModel->where("produtoFK", $id)->findAll();
            $data['organizadores'] = $this->produtoOrganizacaoModel->where("produtoFK", $id)->findAll();
            $data['datas'] = $this->produtoDataModel->where("produtoFK", $id)->findAll();
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    public function fotos() {
        $this->produtoFotoModel = \model('App\Models\ProdutoFotoModel', false);

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->produtoFotoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $data['get'] = request()->getGet();
        $idFK = decode($this->request->uri->getSegment(4));

        $this->produtoFotoModel->where('produtoFK', $idFK);
        $this->produtoFotoModel->orderBy("ordem ASC");
        $data['fotos'] = $this->produtoFotoModel->findAll();
        $data['produtoFK'] = $this->model->find($idFK);

        $data['idFK'] = $idFK;

        $data['title'] = 'Fotos';
        $data['view'] = 'fotos';
        $data['tabela'] = 'produto';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'foto';
        $data['nomeModel'] = 'ProdutoFotoModel';

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function foto() {
        $this->produtoFotoModel = \model('App\Models\ProdutoFotoModel', false);

        $idFK = decode($this->request->uri->getSegment(4));
        $id = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->produtoFotoModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Foto';
        $data['view'] = "foto";
        $data['tabela'] = 'produto';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'fotos';
        $data["nomeModel"] = "ProdutoFotoModel";
        $data['idFK'] = $idFK;
        $data['id'] = $id;

        $post = request()->getPost();
        $data['get'] = request()->getGet();

        if ($post) {

            $post['produtoFK'] = $idFK;

            if ($id) {
                $img = $this->request->getFile("arquivo");
                if ($img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $newName = date('Y-m-d') . $img->getRandomName();
                        $post["arquivo"] = $newName;
                        $img->move(PATHHOME . "/uploads/{$data['tabela']}/{$idFK}/", $newName);
                        try {
                            echo View('templates/tinypng');

                            $upload_path = "uploads/{$data['tabela']}/{$idFK}/";
                            $upload_path_root = PATHHOME . $upload_path;

                            $file_name = $img->getName();
                            $file_path = $upload_path_root . "/" . $file_name;

                            $tinyfile = \Tinify\fromFile($file_path);
                            $tinyfile->toFile($file_path);

                            $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/{$idFK}/" . $newName));
                            imagepalettetotruecolor($img);
                            imagealphablending($img, true);
                            imagesavealpha($img, true);
                            imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$idFK}/{$newName}.webp", 60);
                            imagedestroy($img);
                        } catch (\Tinify\ClientException $e) {
                            
                        }
                    }
                }

                $post["id"] = $id;
                $data["salvou"] = $this->produtoFotoModel->save($post);
            } else {

                if ($this->request->getFileMultiple('arquivo')) {

                    echo View('templates/tinypng');

                    foreach ($this->request->getFileMultiple('arquivo') as $img) {

                        if ($img->isValid() && !$img->hasMoved()) {

                            $newName = date('Y-m-d') . $img->getRandomName();
                            $post["arquivo"] = $newName;
                            $img->move(PATHHOME . "/uploads/{$data['tabela']}/{$idFK}/", $newName);
                            try {
                                echo View('templates/tinypng');

                                $upload_path = "uploads/{$data['tabela']}/{$idFK}/";
                                $upload_path_root = PATHHOME . $upload_path;

                                $file_name = $img->getName();
                                $file_path = $upload_path_root . "/" . $file_name;

                                $tinyfile = \Tinify\fromFile($file_path);
                                $tinyfile->toFile($file_path);

                                $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/{$idFK}/" . $newName));
                                imagepalettetotruecolor($img);
                                imagealphablending($img, true);
                                imagesavealpha($img, true);
                                imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$idFK}/{$newName}.webp", 60);
                                imagedestroy($img);
                            } catch (\Tinify\ClientException $e) {
                                
                            }
                        }

                        $data["salvou"] = $this->produtoFotoModel->insert($post);
                    }
                }
            }

            $data["erros"] = $this->produtoFotoModel->errors();
        }

        $data['produtoFK'] = $this->model->find($idFK);
        $data['foto'] = $this->produtoFotoModel->find($id);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function videos() {
        $this->produtoVideoModel = \model('App\Models\ProdutoVideoModel', false);

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->produtoVideoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $request = request();
        $data['get'] = $request->getGet();

        $idFK = decode($this->request->uri->getSegment(4));

        $this->produtoVideoModel->where('produtoFK', $idFK);
        $this->produtoVideoModel->orderBy("ordem ASC");
        $data['videos'] = $this->produtoVideoModel->findAll();
        $data['produtoFK'] = $this->model->find($idFK);

        $data['idFK'] = $idFK;

        $data['title'] = 'Vídeos';
        $data['view'] = "videos";
        $data['tabela'] = 'produto_video';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'video';
        $data["nomeModel"] = "ProdutoVideoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function video() {
        $this->produtoVideoModel = \model('App\Models\ProdutoVideoModel', false);

        $idFK = decode($this->request->uri->getSegment(4));
        $id = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->produtoVideoModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Vídeo';
        $data['view'] = "video";
        $data['tabela'] = 'produto_video';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'videos';
        $data["nomeModel"] = "ProdutoVideoModel";
        $data['idFK'] = $idFK;
        $data['id'] = $id;

        $post = request()->getPost();
        $data['get'] = request()->getGet();

        if ($post) {

            $post['produtoFK'] = $idFK;

            if ($id) {
                $post["id"] = $id;
                $data['salvou'] = $this->produtoVideoModel->save($post);
            } else {
                $data['salvou'] = $this->produtoVideoModel->insert($post);
            }

            $data["erros"] = $this->produtoVideoModel->errors();
        }

        $data['produtoFK'] = $this->model->find($idFK);
        $data['video'] = $this->produtoVideoModel->find($id);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function carregaCalendarios() {

        helper("date");
        helper("encrypt");
        $request = \Config\Services::request();

        $produtoCalendarioModel = model('App\Models\ProdutoCalendarioModel', false);

        $post = $request->getPost();

        $cMonth = $post["mes"];
        $cYear = $post["ano"];
        $chacaraFK = decode($post["id"]);
        $encodeChacara = encode($chacaraFK);

        $date = date('Y-m', strtotime('-6 month', strtotime("{$cYear}-{$cMonth}")));
        $date = explode("-", $date);

        $retorno["mes1"] = $date[1];
        $retorno["ano1"] = $date[0];

        ob_start();
        for ($iterator = 1; $iterator <= 6; $iterator++) {
            ?>
            <div class="">
                <div class="text-center topo"><?= mes($cMonth) ?> de <?= $cYear ?> </div>
                <table class='table'>
                    <tr>
                        <td align="center">
                            <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                <tr class='fonteBlack'>
                                    <td align="center"><strong>D</strong></td>
                                    <td align="center"><strong>S</strong></td>
                                    <td align="center"><strong>T</strong></td>
                                    <td align="center"><strong>Q</strong></td>
                                    <td align="center"><strong>Q</strong></td>
                                    <td align="center"><strong>S</strong></td>
                                    <td align="center"><strong>S</strong></td>
                                </tr>
            <?php
            $timestamp = mktime(0, 0, 0, $cMonth, 1, $cYear);
            $maxday = date("t", $timestamp);
            $thismonth = getdate($timestamp);
            $startday = $thismonth['wday'];

            $produtoCalendarioModel->where("produtoFK", $chacaraFK);
            $produtoCalendarioModel->where("( date BETWEEN '{$cYear}-{$cMonth}-01' AND '{$cYear}-{$cMonth}-31' ) ");

            $diasOcupados = $produtoCalendarioModel->findAll();

            $arrayOcupados = array();
            if ($diasOcupados) {
                foreach ($diasOcupados as $diaOcup) {
                    $arrayOcupados[] = $diaOcup->date;
                }
            }

            for ($i = 0; $i < ($maxday + $startday); $i++) {
                $diaSemana = ($i % 7);
                if ($diaSemana == 0) {
                    echo "<tr>";
                }
                if ($i < $startday) {
                    echo "<td></td>";
                } else {
                    $resultado = ($i - $startday + 1);
                    if (($i - $startday + 1) < 10) {
                        $resultado = "0" . ($i - $startday + 1);
                    }

                    if ($mesAtual) {
                        if ($resultado == date('d')) {
                            $class = "";
                        } else {
                            $class = "";
                        }
                    }

                    if (in_array($cYear . "-" . $cMonth . "-" . $resultado, $arrayOcupados)) {
                        $class = " ocupado ";
                        $disabled = "";
                    } else {
                        $onclick = "";
                        $disabled = " ";
                        $class = "";
                    }

                    $onclick = "alteraDia(\"{$cYear}\",\"{$cMonth}\",\"{$resultado}\",\"{$encodeChacara}\");";

                    $mes = mes($cMonth);

                    echo "<td align='center' valign='middle'><div id='dia-{$cYear}-{$cMonth}-{$resultado}' onclick='{$onclick}' class='dia {$disabled} {$class} fonteRegular'>" . $resultado . "</div></td>";
                }
                if (($i % 7) == 6) {
                    echo "</tr>";
                }
            }
            ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
                                <?
                                $date = date('Y-m', strtotime('+1 month', strtotime("{$cYear}-{$cMonth}")));
                                $date = explode("-", $date);
                                $cYear = $date[0];
                                $cMonth = $date[1];
                            }
                            $retorno["calendario"] = ob_get_clean();

                            $retorno["mes2"] = $cMonth;
                            $retorno["ano2"] = $cYear;

                            //  echo ob_get_clean();
                            echo json_encode($retorno);
                        }

                        public function whats() {
                            helper('date');
                            $request = \Config\Services::request();
                            $post = $request->getPost();

                            $dtIni = dataFormata($post['dtIni']);
                            $dtFim = dataFormata($post['dtFim']);

                            $produtoWhatsModel = model('App\Models\ProdutoWhatsModel', false);
                            $produtoWhatsModel->select("count(id) as qtd");
                            $produtoWhatsModel->where("produtoFK", $post['id']);
                            $produtoWhatsModel->where("dtCriacao BETWEEN  '{$dtIni} 00:00:00' AND '{$dtFim} 23:59:59'  ");
                            $visita = $produtoWhatsModel->find()[0];

                            $retorno['whats'] = $visita->qtd;
                            //    $retorno['visitas'] = $produtoVisitaModel->getLastQuery()->getQuery();
                            echo json_encode($retorno);
                        }
                        
                         public function visitas() {
                            helper('date');
                            $request = \Config\Services::request();
                            $post = $request->getPost();

                            $dtIni = dataFormata($post['dtIni']);
                            $dtFim = dataFormata($post['dtFim']);

                            $produtoWhatsModel = model('App\Models\ProdutoVisitaModel', false);
                            $produtoWhatsModel->select("count(id) as qtd");
                            $produtoWhatsModel->where("produtoFK", $post['id']);
                            $produtoWhatsModel->where("dtCriacao BETWEEN  '{$dtIni} 00:00:00' AND '{$dtFim} 23:59:59'  ");
                            $visita = $produtoWhatsModel->find()[0];

                            $retorno['visita'] = $visita->qtd;
                            //    $retorno['visitas'] = $produtoVisitaModel->getLastQuery()->getQuery();
                            echo json_encode($retorno);
                        }

                      

                        public function excluirFoto() {
                            $request = \Config\Services::request();
                            $post = $request->getPost();
                            $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);

                            $foto = $produtoFotoModel->find(decode($post['id']));

                            if (is_file(PATHHOME . 'uploads/produto/' . $foto->produtoFK . '/' . $foto->arquivo)) {
                                unlink(PATHHOME . 'uploads/produto/' . $foto->produtoFK . '/' . $foto->arquivo);
                            }
                            if (is_file(PATHHOME . 'uploads/produto/' . $foto->produtoFK . '/' . $foto->arquivo . '.webp')) {
                                unlink(PATHHOME . 'uploads/produto/' . $foto->produtoFK . '/' . $foto->arquivo . '.webp');
                            }
                            $produtoFotoModel->resetQuery();
                            $retorno['excluiu'] = $produtoFotoModel->delete(['id' => decode($post["id"])]);

                            echo json_encode($retorno);
                        }

                        public function fotoDestaque() {
                            $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);

                            $produtoModel = model('App\Models\ProdutoModel', false);

                            $request = \Config\Services::request();
                            $post = $request->getPost();
                            $post['id'] = decode($post['id']);

                            $foto = $produtoFotoModel->find($post['id']);

                            $save['id'] = $foto->produtoFK;
                            $save['fotoFK'] = $post['id'];

                            $retorno['ok'] = $this->model->save($save);

                            echo json_encode($retorno);
                        }

                        public function novoVideo() {
                            ob_start();
                            $token = md5(uniqid(""));
                            ?>
        <div id='card<?= $token ?>' class="card">
            <div class="card-header" id="tituloAba<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo Vídeo<img src="<?= PATHSITE ?>images/icone_menu.svg">
                    </div>
                    <div onclick="excluirVideo('<?= $token ?>', 'false', 'ProdutoComodidadeModel')" class="excluirAba">
                        <img src="<?= PATHSITE ?>images/lixeira.svg">
                        Excluir 
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <label>Título</label>
                            <input type='hidden' name='id[]' value="" />
                            <input placeholder="https://www.youtube.com/watch?v=CODIGO" type="text" name="titulo[]" class="form-control" Value="<?= $texto->video ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function excluirVideo() {

        $request = request();
        $post = $request->getPost();

        $id = decode($post['id']);

        $produtoVideoModel = model('App\Models\ProdutoVideoModel', false);
        $produtoVideoModel->delete(['id' => $id]);
    }

    public function novaComodidade() {
        ob_start();
        $token = md5(uniqid(""));
        ?>
        <script>
            $(document).ready(function () {
                $(".mySingleFieldTags").tagit({
                    allowSpaces: true
                });
            });
        </script>
        <div class="card">
            <div class="card-header" id="card<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo <img src="<?= PATHSITE ?>images/icone_menu.svg">

                        <div onclick="excluirAba('<?= $token ?>', 'false', '')" class="excluirAba">
                            <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                            Excluir
                        </div>
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <label>Título</label>
                            <input type="text" name="titulo[]" class="form-control" Value="">
                        </div>
                        <div class='col-12'>
                            <label>Itens</label>
                            <input data-role="tagsinput" type="text" name="comodidades[]" class="form-control tags-input mySingleFieldTags " value="" placeholder="Itens">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function novoPontoDeVenda() {
        ob_start();
        $token = md5(uniqid(""));
        $request = \Config\Services::request();
        $get = $request->getGet();
        ?>
        <script>
            $(document).ready(function () {
                $(".mySingleFieldTags").tagit({
                    allowSpaces: true
                });
            });

            $(document).ready(function () {
                $('.phone_with_ddd').mask('(00) 00000-0000');
            });
        </script>
        <div class="card">
            <div class="card-header" id="tituloAba<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo <img src="<?= PATHSITE ?>images/icone_menu.svg">

                        <div onclick="excluirAba('<?= $token ?>', 'false', '')" class="excluirAba">
                            <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                            Excluir
                        </div>
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">                   
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label>Título</label>
                            <input type="hidden" name="tipo[]" value="<?= $get['tipo'] ?>" <input type='hidden' name='id[]' value="<?= encode($texto->id) ?>" />
                            <input type="text" name="titulo[]" class="form-control" Value="<?= $texto->titulo ?>">
                        </div>
                        <div class="col-12 col-md-6">
                            <label> <?= ($get['tipo'] == 'fisico') ? 'Endereço' : 'Site' ?> </label>                                              
                            <input type="text" name="endereco[]" class="form-control" Value="<?= $texto->endereco ?>">
                        </div>
                        <div class="col-12 col-md-6 <?= ($get['tipo'] == 'online') ? 'd-none' : '' ?>">
                            <label>Telefone</label>
                            <input type="text" name="cep[]" class="form-control phone_with_ddd" Value="<?= $texto->cep ?>">
                        </div>
                        <div class="col-12 col-md-6 <?= ($get['tipo'] == 'online') ? 'd-none' : '' ?>">
                            <label>Cidade / Estado</label>                                              
                            <input type="text" name="cidade[]" class="form-control" Value="<?= $texto->cidade ?>">
                        </div>                    
                    </div>

                </div>
            </div>
        </div>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function novaOrganizacao() {
        ob_start();
        $token = md5(uniqid(""));
        $request = \Config\Services::request();
        $get = $request->getGet();
        ?>
        <script>
            $(document).ready(function () {
                $(".mySingleFieldTags").tagit({
                    allowSpaces: true
                });
            });

            $(document).ready(function () {
                $('.cep').mask('00000-000');
            });
        </script>
        <div class="card">
            <div class="card-header" id="card<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo <img src="<?= PATHSITE ?>images/icone_menu.svg">

                        <div onclick="excluirAba('<?= $token ?>', 'false', '')" class="excluirAba">
                            <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                            Excluir
                        </div>
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">                   
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label>Título</label>
                            <input type='hidden' name='id[]' value="<?= encode($texto->id) ?>" />
                            <input type="text" name="titulo[]" class="form-control" Value="<?= $texto->titulo ?>">
                        </div>
                        <div class="col-12 col-md-6">
                            <label> Endereço</label>                                              
                            <input type="text" name="endereco[]" class="form-control" Value="<?= $texto->endereco ?>">
                        </div>

                        <div class="col-12 col-md-6 ">
                            <label>Site</label>                                              
                            <input type="text" name="site[]" class="form-control" Value="<?= $texto->site ?>">
                        </div>
                        <div class="col-12 col-md-6 <?= ($texto->tipo == 'online') ? 'd-none' : '' ?>">
                            <label>Cidade / Estado</label>                                              
                            <input type="text" name="cidade[]" class="form-control" Value="<?= $texto->cidade ?>">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function novoCardapio() {
        ob_start();
        $token = md5(uniqid(""));
        
        $request = \Config\Services::request();
        $get = $request->getGet();

    
        
         $this->cardapioModel = \model('App\Models\CardapioModel', false);
        $cardapiosDisponiveis = $this->cardapioModel->findAll();
        
        ?>
      
        <div class="card">
            <div class="card-header" id="card<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo <img src="<?= PATHSITE ?>images/icone_menu.svg">

                        <div onclick="excluirAba('<?= $token ?>', 'false', '')" class="excluirAba">
                            <img style="filter: unset;" src="<?= PATHSITE ?>images/lixeira.svg">
                            Excluir
                        </div>
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <label>Título</label>
                            <input type="text" name="titulo[]" class="form-control" Value="">
                        </div>
                        <div class='col-12'>
                            <label>Itens</label>
                            <input id="campoItens<?=$token?>" data-role="tagsinput" type="text" name="itens[]" class="form-control tags-input mySingleFieldTags<?=$token?> " value="" placeholder="Itens">
                            <div class="container-cardapio" id="fieldTag-<?= $get['contador'] + 1?>"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <script>
            
              var country_list = [<? if($cardapiosDisponiveis){
        foreach($cardapiosDisponiveis as $card){ 
      ?>"<?=$card->titulo?>",<? 
    } } ?>];
            
             $(document).ready(function () {
              $("#campoItens<?=$token?>").tagit({
          availableTags: country_list,
            autocomplete: {},
        allowSpaces: true,
        showAutocompleteOnFocus: true,
       // appendTo: "#fieldTag<?=$token?>"
    }); 
         $("#fieldTag-<?=$get['contador']+1?>").append( $("#ui-id-<?=$get['contador'] + 1?>") );
         });
 
            </script>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function excluirAba() {
        $request = \Config\Services::request();
        $post = $request->getPost();

        $myModel = $post['model'];

        $model = model("App\Models\\" . $myModel, false);
        $retorno = $model->delete(['id' => decode($post['id'])]);
        echo json_decode($retorno);
    }

    public function adicionaData() {

        $request = \Config\Services::request();
        $post = $request->getPost();

        $mes = $post["mes"];
        $dia = $post["dia"];
        $ano = $post["ano"];
        $anuncioFK = decode($post["id"]);
        $tipo = $post["tipo"];

        $anuncioCalendarioModel = model('App\Models\ProdutoCalendarioModel', false);

        if ($tipo == "REM") {

            $dataCompleta = $ano . "-" . $mes . "-" . $dia;

            $anuncioCalendarioModel->select("id");
            $anuncioCalendarioModel->where("date", $dataCompleta);
            $anuncioCalendarioModel->where("produtoFK", $anuncioFK);
            $result = $anuncioCalendarioModel->find()[0];
            $anuncioCalendarioModel->delete(['id' => $result->id]);
        } else if ($tipo == "ADD") {
            $dados["date"] = $ano . "-" . $mes . "-" . $dia;
            $dados["produtoFK"] = $anuncioFK;
            $my_date = date("Y-m-d H:i:s");
            $anuncioCalendarioModel->save($dados);
        }
    }

    public function novoPreco() {
        ob_start();
        $token = md5(uniqid(""));
        ?>

        <script>
            $(document).ready(function () {
                $('.money2').mask("#.##0,00", {
                    reverse: true
                });
            });
        </script>

        <div class="card">
            <div class="card-header" id="tituloAba<?= $token ?>">
                <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#aba<?= $token ?>" aria-expanded="true" aria-controls="aba<?= $token ?>">
                        Novo preço <img src="<?= PATHSITE ?>images/icone_menu.svg">

                        <div onclick="excluirAba('<?= $token ?>', 'false', '')" class="excluirAba">
                            <img style="filter: unset;" src="<?= PATHSITE ?>images/icone_excluir1.svg">
                            Excluir
                        </div>
                    </div>
                </h5>
            </div>

            <div id="aba<?= $token ?>" class="collapse show" aria-labelledby="tituloAba<?= $token ?>" data-parent="#accordion">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <label>Título</label>
                            <input type='hidden' name='id[]' value="" />
                            <input type="text" name="titulo[]" class="form-control" Value="">
                        </div>

                        <div class='col-12'>
                            <label>Preço</label>
                            <input type="text" name="valor[]" class="form-control money2" Value="">
                        </div>                                    
                    </div>

                </div>
            </div>
        </div>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function eventos() {
        $get = request()->getGet();
        $this->model->eventos($get);
    }

    public function chamarWhats() {
        $request = \Config\Services::request();
        $post = $request->getPost();
        $produtoWhatsModel = model('App\Models\ProdutoWhatsModel', false);

        $id = decode($post['produtoFK']);

        $produtoWhatsModel->contaClique($id);
    }

    public function destaques() {
        $request = \Config\Services::request();
        $get = $request->getGet();

        $anuncioModel = model('App\Models\AnuncioModel', false);
        $emAlta = $anuncioModel->find($get['id']);
      
        $produtoModel = \model("App\Models\ProdutoModel", false);

      $todosFavoritos =  $data['todosFavoritos'] = array();
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

        if ($emAlta->produtoFK1) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[0] = $produtoModel->find($emAlta->produtoFK1);
            $emAlta1[0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
        }
        if ($emAlta->produtoFK2) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[1] = $produtoModel->find($emAlta->produtoFK2);
            $emAlta1[1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
        }
        if ($emAlta->produtoFK3) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[2] = $produtoModel->find($emAlta->produtoFK3);
            $emAlta1[2]->fotos = $produtoModel->fotos($emAlta->produtoFK3, 4, true);
        }
        if ($emAlta->produtoFK4) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[3] = $produtoModel->find($emAlta->produtoFK4);
            $emAlta1[3]->fotos = $produtoModel->fotos($emAlta->produtoFK4, 4, true);
        }
        if ($emAlta->produtoFK5) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[4] = $produtoModel->find($emAlta->produtoFK5);
            $emAlta1[4]->fotos = $produtoModel->fotos($emAlta->produtoFK5, 4, true);
        }

        if ($emAlta->produtoFK6) {
            $produtoModel->resetQuery();
            $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
            $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
            $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
            $produtoModel->join('estado e', 'e.id = c.estadoFK');
            $emAlta1[5] = $produtoModel->find($emAlta->produtoFK5);
            $emAlta1[5]->fotos = $produtoModel->fotos($emAlta->produtoFK6, 4, true);
        } 
         ob_start();
        ?>
        <script>
            (function () {


                setTimeout(() => {
                    const swiperCard = new Swiper('.swiper-card', {
                        pagination: {
                            el: '.swiper-pagination',
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        observer: true,
                        observeParents: true,
                    })

                }, 100)


            })()
        </script>
        <?
       
        if ($get['index'] == 0) {
            ?>

            <? if ($emAlta1[0]) { ?>
                <article class="main card-spaces">
                    <a href="<?= PATHSITE ?>espaco/<?= $emAlta1[0]->identificador ?>/">
                        <div class="cover">
                            <span class="button-category">
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.1567 0.0905905C5.7792 0.311263 4.25266 1.25046 2.81554 2.81734C1.37866 4.38397 0 6.61324 0 9.40149H1C1 6.91932 2.22635 4.90103 3.57201 3.43386C4.91745 1.96693 6.351 1.08615 6.6837 0.891725L6.1567 0.0905905ZM9.7629 2.98543C8.5479 1.35269 7.2233 0.365588 6.8764 0.121038L6.2775 0.875964C6.5755 1.086 7.8113 2.0043 8.9443 3.52677L9.7629 2.98543ZM9.9998 3.54673C10.3371 3.13103 10.6197 2.86664 10.748 2.75405L10.0664 2.06427C9.9037 2.20711 9.5819 2.51022 9.2055 2.97405L9.9998 3.54673ZM10.2508 2.75297C10.6999 3.14697 13 5.3622 13 9.40055H14C14 4.99831 11.4885 2.55113 10.9321 2.06294L10.2508 2.75297ZM13 9.40055V9.40149H14V9.40055H13ZM13 9.40149C13 10.1442 12.8448 10.8797 12.5433 11.5659L13.4672 11.9266C13.8189 11.1261 14 10.2681 14 9.40149H13ZM12.5433 11.5659C12.2417 12.2521 11.7998 12.8756 11.2426 13.4008L11.9497 14.0674C12.5998 13.4547 13.1154 12.7272 13.4672 11.9266L12.5433 11.5659ZM11.2426 13.4008C10.6855 13.926 10.0241 14.3426 9.2961 14.6269L9.6788 15.4978C10.5281 15.1661 11.2997 14.6801 11.9497 14.0674L11.2426 13.4008ZM9.2961 14.6269C8.5681 14.9111 7.7879 15.0574 7 15.0574V16C7.9193 16 8.8295 15.8294 9.6788 15.4978L9.2961 14.6269ZM7 15.0574C6.2121 15.0574 5.4319 14.9111 4.7039 14.6269L4.32122 15.4978C5.1705 15.8294 6.0807 16 7 16V15.0574ZM4.7039 14.6269C3.97595 14.3426 3.31451 13.926 2.75736 13.4008L2.05025 14.0674C2.70026 14.6801 3.47194 15.1661 4.32122 15.4978L4.7039 14.6269ZM2.75736 13.4008C2.20021 12.8756 1.75825 12.2521 1.45672 11.5659L0.53284 11.9266C0.88463 12.7272 1.40024 13.4547 2.05025 14.0674L2.75736 13.4008ZM1.45672 11.5659C1.15519 10.8797 1 10.1442 1 9.40149H0C0 10.2681 0.18106 11.1261 0.53284 11.9266L1.45672 11.5659ZM10.748 2.75405C10.6154 2.87049 10.3961 2.88043 10.2508 2.75297L10.9321 2.06294C10.6808 1.84248 10.305 1.85478 10.0664 2.06427L10.748 2.75405ZM8.9443 3.52677C9.2 3.87045 9.7335 3.87499 9.9998 3.54673L9.2055 2.97405C9.3456 2.80137 9.6265 2.80208 9.7629 2.98543L8.9443 3.52677ZM6.6837 0.891725C6.5526 0.968362 6.3896 0.954958 6.2775 0.875964L6.8764 0.121038C6.6706 -0.0240444 6.3873 -0.044217 6.1567 0.0905905L6.6837 0.891725Z" fill="#3B9756" />
                                <path d="M6.61193 6.13111C6.32754 6.34757 5.43924 7.05685 4.61742 8.07211C3.80363 9.07754 3.00001 10.4509 3 11.9862H4.00005C4.00006 10.7922 4.63472 9.64242 5.39364 8.70483C6.14454 7.77708 6.96323 7.12329 7.21623 6.93071L6.61193 6.13111ZM10.999 11.8972C10.9684 10.3836 10.1657 9.03258 9.35861 8.04261C8.54372 7.04321 7.66982 6.34556 7.38803 6.13111L6.78373 6.93071C7.03423 7.12128 7.83962 7.76443 8.58472 8.67814C9.33751 9.60147 9.97541 10.7362 9.99921 11.9176L10.999 11.8972ZM9.99921 11.9176C9.99971 11.9401 10 11.9634 10 11.9859H11C11 11.956 10.9997 11.9269 10.999 11.8972L9.99921 11.9176ZM10 11.9859C10 13.6487 8.65692 14.9965 7.00003 14.9965V16C9.20911 16 11 14.2029 11 11.9859H10ZM7.00003 14.9965C5.34324 14.9965 4.00019 13.6488 4.00005 11.9862H3C3.00019 14.203 4.79103 16 7.00003 16V14.9965ZM3 11.9862C3 12.2622 3.22273 12.488 3.50003 12.488V11.4845C3.77728 11.4845 4.00005 11.7103 4.00005 11.9862H3ZM4.00005 11.9862C4.00003 11.7142 3.78122 11.4845 3.50003 11.4845V12.488C3.21886 12.488 3.00002 12.2582 3 11.9862H4.00005ZM7.21623 6.93071C7.08883 7.02775 6.91143 7.02785 6.78373 6.93071L7.38803 6.13111C7.15823 5.9562 6.84153 5.9564 6.61193 6.13111L7.21623 6.93071Z" fill="#3B9756" />
                                </svg>
                                Em Alta
                            </span>
                <? if ($emAlta1[0]->fotos) { ?>
                                <div class="swiper swiper-card">
                                    <div class="swiper-wrapper">
                    <? foreach ($emAlta1[0]->fotos as $foto) { ?>
                                            <div class="swiper-slide">
                                                <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                            </div>
                    <? } ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                <? } ?>
                        </div>
                <?
                if ($emAlta1[$i]->principaiscomodidades) {
                    $listaCmdd = explode(";", $emAlta1[0]->principaiscomodidades);
                } else {
                    $listaCmdd = explode(";", $emAlta1[0]->itensdisponiveis);
                }
                ?>
                        <div class="info">
                            <span class="type"><?= $emAlta1[0]->categoria ?></span>
                            <strong class="title"><?= $emAlta1[0]->titulo ?></strong>
                            <span class="uf"><?= $emAlta1[0]->cidade ?></span>
                            <p class="including"><?
                foreach ($listaCmdd as $ind => $comodi) {
                    if ($ind <= 2) {
                        ?>
                        <?= $comodi ?> <span> <?= ($ind == 2) ? '' : '•' ?> </span>
                                        <? }
                                    }
                                    ?></p>
                            <div class="box-price">
                                <span class="price">R$<?= number_format($emAlta1[0]->preco, 2, ',', '.') ?></span>
                                <span class="per">/diária</span>
                            </div>
                            <span href="#" class="icon-heart <?= (in_array($emAlta1[0]->id, $data['todosFavoritos'])) ? 'active' : '' ?>" onclick="favoritar(<?= $emAlta1[0]->id ?>)" data-id-heart="<?= $emAlta1[0]->id ?>">
                                <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                </svg>
                                <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </article>
            <? } ?>
            <div class="list-article">
                            <? $i = 1;
                            while ($i <= 4) {
                                ?>
                                <? if ($emAlta1[$i]) { ?>
                        <article class="secundary card-spaces">
                            <a href="<?= PATHSITE ?>espaco/<?= $emAlta1[$i]->identificador ?>/">
                                <div class="cover">
                                    <span class="button-category">
                                        <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756" />
                                        <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756" />
                                        </svg>
                                        Em Alta
                                    </span>
                                    <div class="swiper swiper-card">
                                        <div class="swiper-wrapper">
                    <? if ($emAlta1[$i]->fotos) { ?>
                        <? foreach ($emAlta1[$i]->fotos as $foto) { ?>
                                                    <div class="swiper-slide">
                                                        <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                                    </div>
                        <? }
                    }
                    ?>
                                        </div>
                                        <div class="swiper-pagination"></div>

                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                    <?
                    $listaCmdd = explode(";", $emAlta2[0]->principaiscomodidades);
                    if (!$listaCmdd) {
                        $listaCmdd = explode(";", $emAlta2[0]->itensdisponiveis);
                    }
                    ?>
                                <div class="info">
                                    <span class="type"><?= $emAlta1[$i]->categoria ?></span>
                                    <strong class="title"><?= $emAlta1[$i]->titulo ?></strong>
                                    <span class="uf"><?= $emAlta1[1]->cidade ?></span>
                                    <p class="including"><?
                        foreach ($listaCmdd as $ind => $comodi) {
                            if ($ind <= 2) {
                            ?>
                            <?= $comodi ?> <span> <?= ($ind == 2) ? '' : '•' ?> </span>
                        <? }
                    }
                    ?></p>
                                    <div class="box-price">
                                        <span class="price">R$<?= number_format($emAlta2[0]->preco, 2, ',', '.') ?></span>
                                        <span class="per">/diária</span>
                                    </div>
                                    <span href="#" class="icon-heart <?= (in_array($emAlta1[$i]->id, $data['todosFavoritos'])) ? 'active' : '' ?>" onclick="favoritar(<?= $emAlta1[$i]->id ?>)" data-id-heart="<?= $emAlta1[$i]->id ?>">
                                        <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                        </svg>
                                        <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                        </svg>
                                    </span>

                                </div>
                            </a>
                        </article>
                                    <?
                                    }
                                    $i++;
                                }
                                ?>
            </div>
        <? } else {?>
        <div class="item show" data-modal="alta">
            <div class="menu-abas-content box-service">
                <? if($emAlta1[0]){?>
              <article class="main card-services">
                  <a href="<?=PATHSITE?>espaco/<?=$emAlta1[0]->identificador?>/">
                <div class="cover">
                  <span class="button-category">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756"></path>
                      <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756"></path>
                    </svg>                                       
                    Em Alta
                  </span>
                  <div class="swiper swiper-card swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-1d25beea0769a10ee" aria-live="polite">
                         <? if ($emAlta1[0]->fotos) { ?>
                        <? foreach ($emAlta1[0]->fotos as $foto) { ?>
                                                    <div class="swiper-slide">
                                                        <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                                    </div>
                        <? }
                    }
                    ?>      
                    </div>
                    <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" aria-current="true"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                  
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-1d25beea0769a10ee" aria-disabled="true"></div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-1d25beea0769a10ee" aria-disabled="false"></div>                  
                  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
                
                  <div class="info">
                    <span class="type"><?=$emAlta1[0]->categori?></span>
                    <strong class="title"><?=$emAlta1[0]->titulo?></strong>
                    <span class="uf"><?=$emAlta1[0]->cidade?>-<?=$emAlta1[0]->estado?></span>
                    <p><?=$emAlta1[0]->descricao?></p>
      
                    <span href="#" class="icon-heart">
                      <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                      </svg>
                      <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                      </svg>
                    </span>
                  </div>
                  </a>
              </article>
                <? } ?>
              <div class="list-article-service">
                  <? $i = 0; while($i < 5) {?>
                <article class="card-services">
                 <a href="<?=PATHSITE?>espaco/<?=$emAlta1[$i]->identificador?>/">
                  <div class="cover">
                    <span class="button-category">
                      <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756"></path>
                        <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756"></path>
                      </svg>                                   
                      Em Alta
                    </span>
                    <div class="swiper swiper-card swiper-initialized swiper-horizontal swiper-backface-hidden">
                      <div class="swiper-wrapper" id="swiper-wrapper-d5a32b49019d0c1a" aria-live="polite">
                          <? if ($emAlta1[$i]->fotos) { ?>
                        <? foreach ($emAlta1[$i]->fotos as $foto) { ?>
                                                    <div class="swiper-slide">
                                                        <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                                    </div>
                        <? }
                      
                    }
                    ?>
                        
                      </div>
                      <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" aria-current="true"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                    
                      <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-d5a32b49019d0c1a" aria-disabled="true"></div>
                      <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-d5a32b49019d0c1a" aria-disabled="false"></div>                  
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                  </div>
            
                    <div class="info">
                       <span class="type"><?=$emAlta1[$i]->categori?></span>
                    <strong class="title"><?=$emAlta1[$i]->titulo?></strong>
                    <span class="uf"><?=$emAlta1[$i]->cidade?>-<?=$emAlta1[$i]->estado?></span>
                    <p><?=$emAlta1[$i]->descricao?></p>
        <span href="#" class="icon-heart">
                  <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                    <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                  </svg>
                  <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                    <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                  </svg>
                </span>
                    </div>
                </a>
                </article>
                  <?
                    $i++;
                  
                        } ?>        
              </div>
            </div>
          </div>
        <?
        }
        $retorno['html'] = ob_get_clean();

        echo json_encode($retorno);
    }
    
     public function relatorio()
    {
         helper('date');
        $data['get'] = $get = request()->getGet();
        $paginate = \is_numeric($get['page_clientes']) ? $get['page_clientes'] : 1;

        if (!empty($get['procura'])) {
            $this->model->groupStart()
                ->like("produto.titulo", $get['procura'])              
                ->groupEnd();
        }

        $this->model->select('produto.titulo, pc.titulo as categoria, t.titulo as tipo, produto.identificador, a.titulo as anunciante, a.telefone,'
             . 'produto.ativo,produto.inicioValidade,produto.validade, a.email, c.titulo as cidade, e.sigla as estado '  );
        $this->model->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
        $this->model->join('tipo t', 't.id = pc.tipoFK'); 
        $this->model->join('cidade c', 'c.id = produto.cidadeFK');
        $this->model->join('estado e', 'e.id = c.estadoFK');
        $this->model->join('anunciante a', 'a.id = produto.anuncianteFK','LEFT'); 
        $data['lista'] = $this->model->orderBy("titulo ASC")->findAll();
       
        if (isset($_POST["gerar"])) {
            $f = fopen(PATHHOME . "uploads/produto/tmp.csv", "w");

            $linha['nome'] = 'Nome;Ativo;Início;Fim;Tipo;Categoria;Cidade;Link;Anunciante;E-mail;Telefone';
            fputcsv($f, $linha, "|", " ");

            //$todosClientes = $this->model->resetQuery()->findAll();
            foreach ($data['lista'] as $item) {
                $item->ativo = ($item->ativo == 1) ? ' Sim' : 'Não';
                $item->inicioValidade = formataData($item->inicioValidade);
                $item->validade = formataData($item->validade);
                $linha["nome"] = "{$item->titulo};{$item->ativo};{$item->inicioValidade};{$item->validade};{$item->tipo};{$item->categoria};{$item->cidade};{$item->link};{$item->anunciante};{$item->email};{$item->telefone};";
                fputcsv($f, $linha, "|", " ");
            }
            header("Refresh: 0; URL=" . PATHSITE . "uploads/produto/tmp.csv");
        }

        $data['title'] = 'Produtos';
        $data['tabela'] = $this->tabela;
        $data["nomeModel"] = "ProdutoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/relatorio", $data);
        echo view('templates/admin-footer');
    }
}
