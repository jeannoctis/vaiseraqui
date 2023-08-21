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

      $IDsCategorias = $this->produtoCategoriaModel
         ->select('id')
         ->where("tipoFK", $get['tipo'])
         ->findAll();

      if (!empty($IDsCategorias)) {
         $IDsCategorias = \array_column($IDsCategorias, 'id');

         $data['lista'] = $this->model
            ->whereIn("categoriaFK", $IDsCategorias)
            ->orderBy("titulo ASC")
            ->findAll();
      } else {
         $data['lista'] = [];
      }

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

      $this->comodidadeModel = \model('App\Models\ComodidadeModel', false);
      $data['comodidadesDisponiveis'] = $this->comodidadeModel->findAll();

      $this->proximidadeModel = \model('App\Models\ProximidadeModel', false);
      $data['proximidadesDisponiveis'] = $this->proximidadeModel->orderBy("ordem ASC, id DESC")->findAll();

      $this->cardapioModel = \model('App\Models\CardapioModel', false);
      $data['cardapiosDisponiveis'] = $this->cardapioModel->findAll();

      $data['title'] = 'Produto';
      $data['tabela'] = 'produto';
      $data['resultado'] = "";

      if ($post) {

         if ($post['apagarcardapio']) {
            $post['cardapio'] = NULL;
         }

         $pdf = $this->request->getFile("cardapio");
         if ($pdf) {
            if ($pdf->isValid() && !$pdf->hasMoved()) {
               $newName = date('Y-m-d') . $pdf->getRandomName();
               $post["cardapio"] = $newName;
               $pdf->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
               try {
                  echo View('templates/tinypng');

                  $upload_path = "uploads/{$data['tabela']}/";
                  $upload_path_root = PATHHOME  . $upload_path;

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

                     $updateIngresso[] = [
                        'id' => $ingresso['idIngresso'],
                        'titulo' => $ingresso['modalidade'],
                        'preco' => $ingresso['preco']
                     ];
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
                        'titulo' => $ingresso['modalidade'],
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
      $data['tabela'] = 'produto_foto';
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
      $data['tabela'] = 'produto_foto';
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
                  $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                  try {
                     echo View('templates/tinypng');

                     $upload_path = "uploads/{$data['tabela']}/";
                     $upload_path_root = PATHHOME . $upload_path;

                     $file_name = $img->getName();
                     $file_path = $upload_path_root . "/" . $file_name;

                     $tinyfile = \Tinify\fromFile($file_path);
                     $tinyfile->toFile($file_path);

                     $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                     imagepalettetotruecolor($img);
                     imagealphablending($img, true);
                     imagesavealpha($img, true);
                     imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
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
                     $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                     try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $img->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($img);
                        imagealphablending($img, true);
                        imagesavealpha($img, true);
                        imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
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
}
