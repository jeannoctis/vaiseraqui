<?php

namespace App\Controllers;

class Produto extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\ProdutoModel', false);
      $this->produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
      $this->tabela = "produto";

      $get = request()->getGet();
      switch ($get['tipo']) {
         case 1:
            $this->session->set('menuAdmin', '4');
            break;
         case 2:
            $this->session->set('menuAdmin', '11');
            break;
         case 3:
            $this->session->set('menuAdmin', '12');
            break;
         case 4:
            $this->session->set('menuAdmin', '13');
            break;
         case 5:
            $this->session->set('menuAdmin', '14');
            break;
         case 6:
            $this->session->set('menuAdmin', '15');
            break;
      }
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
      
      $get = request()->getGet();

      $categoriasDoTipo = $this->produtoCategoriaModel
         ->where("tipoFK", $get['tipo'])
         ->findAll();

      $IDsCategorias = \array_column($categoriasDoTipo, 'id');

      $data['lista'] = $this->model
         ->whereIn("categoriaFK", $IDsCategorias)
         ->orderBy("titulo ASC")
         ->findAll();

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
         ->findAll();

      foreach($data['estados'] as $ind => $estado) {
         $this->cidadeModel->resetQuery();
         $this->cidadeModel->where('estadoFK', $estado->id);
         $this->cidadeModel->orderBy('titulo ASC');
         $data['estados'][$ind]->cidades = $this->cidadeModel->findAll();
      }

      $data['title'] = 'Produto';
      $data['tabela'] = 'produto';
      $data['resultado'] = "";

      if ($post) {

         if ($post['apagararquivo']) {
            $post['arquivo'] = NULL;
         }
         $img = $this->request->getFile("arquivo");
         if ($img) {
            if ($img->isValid() && !$img->hasMoved()) {
               $newName = date('Y-m-d') . $img->getRandomName();
               $post["arquivo"] = $newName;
               $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
               try {
                  echo View('templates/tinypng');

                  $upload_path = "uploads/{$data['tabela']}/";
                  $upload_path_root = PATHHOME  . $upload_path;

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

         if ($id) {
            $post["id"] = $id;
            $data['salvou'] = $this->model->save($post);
         } else {
            $post["identificador"] = \arruma_url($post['titulo']);
            $data['salvou'] = $this->model->insert($post);
         }

         $data["erros"] = $this->model->errors();
         $post['artigoFK'] = $id;
      }

      if ($id) {
         $data["resultado"] = $this->model->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$data['tabela']}/form");
      echo view('templates/admin-footer');
   }
}
