<?php

namespace App\Controllers;

class Artigo extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\ArtigoModel', false);
      $this->tabela = "artigo";
      $this->session->set('menuAdmin', '3');
   }

   public function index()
   {
      $get = $data['get'] = \request()->getGet();

      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
         }
      } else if ($_POST['nexc']) {
         $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
      }

      $this->categoriaArtigoModel = \model('App\Models\CategoriaArtigoModel', false);
      $data['bCategorias'] = $this->categoriaArtigoModel->findAll();

      if ($data['bCategorias']) {
         foreach ($data['bCategorias'] as $categoria) {
            $data['cats'][$categoria->id] = $categoria->titulo;
         }
      }

      $data['title'] = 'Artigos';
      $data['tabela'] = "artigo";
      $data["nomeModel"] = "ArtigoModel";

      if (!empty($get)) {

         if (!empty($get['categoria'])) {
            $this->model->where("categoriaFK", $get['categoria']);
         }

         if (!empty($get['procura'])) {
            $this->model->groupStart()
               ->like("titulo", $get['procura'])
               ->orLike("chamada", $get['procura'])
               ->orLike("texto", $get['procura'])
               ->groupEnd();
         }
      }

      $paginate = \is_numeric($get['page_artigos']) ? $get['page_artigos'] : 1 ;
      $data['artigos'] = $this->model->orderBy("ordem ASC, id DESC")->paginate(25, "artigos", $paginate);
      $data['pager'] = $this->model->pager;
      
      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $this->CategoriaArtigoModel = \model('App\Models\CategoriaArtigoModel', false);
      $data['bCategorias'] = $this->CategoriaArtigoModel->findAll();

      $request = request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Artigo';
      $data['tabela'] = 'artigo';
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

   public function destaque()
   {
      $post = \request()->getPost();

      if ($post) {
         $artigo = $this->model->find($post['id']);
         $toggleDestaque = $artigo->destaque == "S" ? "N" : "S";

         $return['ok'] = $this->model
            ->where("id", $post['id'])
            ->set("destaque", $toggleDestaque)
            ->update();
      }

      echo \json_encode($return);
   }
}
