<?php

namespace App\Controllers;

class Anunciante extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\AnuncianteModel', false);
      $this->tabela = "anunciante";
      $this->session->set('menuAdmin', '7');
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
      $paginate = \is_numeric($get['page_anunciantes']) ? $get['page_anunciantes'] : 1;

      if (!empty($get['procura'])) {
         $this->model->groupStart()
            ->like("titulo", $get['procura'])
            ->orLike("cpf", $get['procura'])
            ->orLike("telefone", $get['procura'])
            ->orLike("telefone2", $get['procura'])
            ->orLike("telefone3", $get['procura'])
            ->orLike("email", $get['procura'])
            ->groupEnd();
      }

      $data['lista'] = $this->model->orderBy("titulo ASC")->paginate(25, 'anunciantes', $paginate);
      $data['pager'] = $this->model->pager;

      if (isset($_POST["gerar"])) {
         $f = fopen(PATHHOME . "uploads/anunciante/tmp.csv", "w");

         $linha['nome'] = 'Nome;Documento;Telefone;Telefone2;Telefone3;Email';
         fputcsv($f, $linha, "|", " ");

         $todosAnunciantes = $this->model->resetQuery()->findAll();
         foreach ($todosAnunciantes as $item) {

            $linha["nome"] = "{$item->titulo};{$item->cpf};{$item->telefone};{$item->telefone2};{$item->telefone3};{$item->email}";            
            fputcsv($f, $linha, "|", " ");            
         }
         header("Refresh: 0; URL=" . PATHSITE . "uploads/anunciante/tmp.csv");
      }

      $data['title'] = 'Anunciante';
      $data['tabela'] = "anunciante";
      $data["nomeModel"] = "AnuncianteModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $request = request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Anunciante';
      $data['tabela'] = 'anunciante';
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

         if ($post['senha']) {
            $post['senha'] = sha1($post['senha']);
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

   public function anunciante()
   {
   }
}
