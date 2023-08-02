<?php

namespace App\Controllers;

class RedeSocial extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\RedeSocialModel', false);
      $this->tabela = "RedeSocial";
      $this->session->set('menuAdmin', '100');
   }

   public function index()
   {

      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
         }
      } else if ($_POST['naoExc']) {
         $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
      }

      $this->model->orderBy("ordem ASC, id ASC");
      $data['lista'] = $this->model->findAll();

      $data['title'] = 'Redes Sociais';
      $data['tabela'] = "rede_social";
      $data["nomeModel"] = "RedeSocialModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $request = request();
      // helper('form');

      $data['title'] = 'Redes Sociais';
      $data['tabela'] = 'rede_social';
      $data['resultado'] = "";

      $id = decode($this->request->uri->getSegment(4));

      $post = $request->getPost();

      if ($post) {

         if ($post['apagarimagem']) {
            $post['imagem'] = NULL;
         }

         $img = $this->request->getFile("imagem");
         if ($img) {
            if ($img->isValid() && !$img->hasMoved()) {
               $newName = date('Y-m-d') . $img->getRandomName();
               $post["imagem"] = $newName;
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
