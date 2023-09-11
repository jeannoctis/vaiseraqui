<?php

namespace App\Controllers;

class Proximidade extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\ProximidadeModel', false);
      $this->tabela = "proximidade";
      $this->session->set('menuAdmin', '5');
   }

   public function index()
   {
      $get = \request()->getGet();

      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
         }
      }
      
      $paginate = \is_numeric($get['page_proximidades']) ? $get['page_proximidades'] : 1 ;
      $data['lista'] = $this->model->paginate(25, "proximidades", $paginate);
      $data['pager'] = $this->model->pager;

      $data['title'] = 'Proximidades';
      $data['tabela'] = "proximidade";
      $data["nomeModel"] = "ProximidadeModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $post = request()->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Proximidade';
      $data['tabela'] = 'proximidade';
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
                  imagewebp($img, PATHHOME . "uploads/{$data['tabela']}/{$newName}.webp", 60);
                  imagedestroy($img);
               } catch (\Tinify\ClientException $e) {
               }
            }
         }

         if (!$id) {
            $data['salvou'] =  $this->model->insert($post);
         } else {
            $post["id"] = $id;
            $data['salvou'] = $this->model->save($post);
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

   //--------------------------------------------------------------------
}
