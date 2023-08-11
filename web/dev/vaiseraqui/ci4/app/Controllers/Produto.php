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

      $data['tipo'] = \getTipo($get['tipo']);

      $this->produtoValorModel = \model('App\Models\ProdutoValorModel', false);
      $this->produtoComodidadeModel = \model('App\Models\ProdutoComodidadeModel', false);

      $this->comodidadeModel = \model('App\Models\ComodidadeModel', false);
      $data['comodidadesDisponiveis'] = $this->comodidadeModel->findAll();

      $data['title'] = 'Produto';
      $data['tabela'] = 'produto';
      $data['resultado'] = "";

      if ($post) {

         if ($id) {
            $post["id"] = $lastId = $id;
            $data['salvou'] = $this->model->save($post);
         } else {
            $post["identificador"] = \arruma_url($post['titulo']);
            $data['salvou'] = $lastId = $this->model->insert($post);
         }

         if (!empty($post['valor'])) {

            $IDsReceviedValor = \array_column($post['valor'], "id");

            $this->produtoValorModel
               ->where("produtoFK", $lastId)
               ->whereNotIn("id", $IDsReceviedValor)
               ->delete();

            foreach ($post['valor'] as $item) {
               $item['valor'] = \str_replace(['.', ','], ['', '.'], $item['valor']);

               if (!empty($item['id'])) {
                  $updateValor[] = [
                     'id' => $item['id'],
                     'produtoFK' => $lastId,
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

            $this->produtoComodidadeModel
               ->where("produtoFK", $lastId)
               ->whereNotIn("id", $IDsReceviedCatCmdd)
               ->delete();

            foreach ($post['catCmdd'] as $item) {

               if (!empty($item['id'])) {
                  $updateCatCmdd[] = [
                     'id' => $item['id'],
                     'produtoFK' => $lastId,
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
