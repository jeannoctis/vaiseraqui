<?php

namespace App\Controllers;

class ProdutoCategoria extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text', 'utils']);
      $this->model = model('App\Models\ProdutoCategoriaModel', false);
      $this->tabela = "produto_categoria";

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

      $data['lista'] = $this->model
      ->where("tipoFK", $get['tipo'])
      ->orderBy("titulo ASC")
      ->findAll();

      $data['title'] = 'Produto Categoria';
      $data['tabela'] = "produto_categoria";
      $data["nomeModel"] = "ProdutoCategoriaModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $post = request()->getPost();
      $data['get'] = $get = request()->getGet();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Categoria';
      $data['tabela'] = 'produto_categoria';
      $data['resultado'] = "";

      $data['tipo'] = \getTipo($get['tipo']);
      
      if ($post) {
         $post['tipoFK'] = $get['tipo'];

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
         
      }

      if ($id) {
         $data["resultado"] = $this->model->find($id);         
      }

      echo view('templates/admin-header', $data);
      echo view("{$data['tabela']}/form");
      echo view('templates/admin-footer');
   }
}
