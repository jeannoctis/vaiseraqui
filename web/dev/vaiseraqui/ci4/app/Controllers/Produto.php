<?php

namespace App\Controllers;

class Produto extends BaseController
{

   public function __construct()
   {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text', 'utils']);
        $this->model = model('App\Models\ProdutoModel', false);
        $this->produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $this->tabela = "produto";

      $get = request()->getGet();
      $this->session->set('menuAdmin', setMenuAdminTipo($get['tipo']));
   }

   public function index()
   {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
            }
        } else if ($_POST['nexc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

      $data['get'] = $get = request()->getGet();      

      $paginate = \is_numeric($get['page_produtos']) ? $get['page_produtos'] : 1 ;

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
            $estados[$item->estado_id] = (object)[
               'estado_id' => $item->estado_id,
               'estado_titulo' => $item->estado_titulo,
               'cidades' => []
            ];
         }

         $estados[$item->estado_id]->cidades[] = (object)[
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

      if(empty($IDsCategorias)) {
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
      $data['pager'] = $this->model->pager;

      $data['tipo'] = \getTipo($get['tipo']);

      $data['title'] = 'Produtos';
      $data['tabela'] = $this->tabela;
      $data["nomeModel"] = "ProdutoModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
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

         if(!empty($post['datas'])) {
            $IDsReceviedDatas = \array_column($post['datas'], "id");            

            if (!empty($IDsReceviedDatas)) {
               $this->produtoDataModel
                  ->where("produtoFK", $lastId)
                  ->whereNotIn("id", $IDsReceviedDatas)
                  ->delete();
            }

            foreach($post['datas'] as $item) {
               if(!empty($item['id'])) {
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

   public function fotos()
   {
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

   public function foto()
   {
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

   public function videos()
   {
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

   public function video()
   {
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

   public function carregaCalendarios()
   {

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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
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

   public function whats()
   {
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

   public function fone()
   {
        helper('date');
        $request = \Config\Services::request();
        $post = $request->getPost();

      $dtIni = dataFormata($post['dtIni']);
      $dtFim = dataFormata($post['dtFim']);

      $produtoWhatsModel = model('App\Models\ProdutoFoneModel', false);
      $produtoWhatsModel->select("count(id) as qtd");
      $produtoWhatsModel->where("produtoFK", $post['id']);
      $produtoWhatsModel->where("dtCriacao BETWEEN  '{$dtIni} 00:00:00' AND '{$dtFim} 23:59:59'  ");
      $visita = $produtoWhatsModel->find()[0];

      $retorno['fone'] = $visita->qtd;
      //    $retorno['visitas'] = $produtoVisitaModel->getLastQuery()->getQuery();
      echo json_encode($retorno);
   }

   public function excluirFoto()
   {
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

   public function fotoDestaque()
   {
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

   public function novoVideo()
   {
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

   public function excluirVideo()
   {

      $request = request();
      $post = $request->getPost();

      $id = decode($post['id']);

      $produtoVideoModel = model('App\Models\ProdutoVideoModel', false);
      $produtoVideoModel->delete(['id' => $id]);
   }

   public function novaComodidade()
   {
        ob_start();
        $token = md5(uniqid(""));
        ?>
        <script>
         $(document).ready(function() {
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

   public function novoPontoDeVenda()
   {
        ob_start();
        $token = md5(uniqid(""));
        $request = \Config\Services::request();
        $get = $request->getGet();
        ?>
        <script>
         $(document).ready(function() {
                $(".mySingleFieldTags").tagit({
                    allowSpaces: true
                });
            });

         $(document).ready(function() {
                $('.cep').mask('00000-000');
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
                                <label>CEP</label>                                              
                                <input type="text" name="cep[]" class="form-control cep" Value="<?= $texto->cep ?>">
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
    
   public function novaOrganizacao()
   {
        ob_start();
        $token = md5(uniqid(""));
        $request = \Config\Services::request();
        $get = $request->getGet();
        ?>
        <script>
         $(document).ready(function() {
                $(".mySingleFieldTags").tagit({
                    allowSpaces: true
                });
            });

         $(document).ready(function() {
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

   public function excluirAba()
   {
        $request = \Config\Services::request();
        $post = $request->getPost();

      $myModel = $post['model'];

      $model = model("App\Models\\" . $myModel, false);
      $retorno = $model->delete(['id' => decode($post['id'])]);
      echo json_decode($retorno);
   }

   public function adicionaData()
   {

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

   public function novoPreco()
   {
        ob_start();
        $token = md5(uniqid(""));
        ?>

        <script>
         $(document).ready(function() {
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
}
