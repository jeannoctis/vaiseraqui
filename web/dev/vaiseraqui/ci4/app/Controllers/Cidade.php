<?php

namespace App\Controllers;

class Cidade extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\CidadeModel', false);
      $this->tabela = "cidade";
      $this->session->set('menuAdmin', '5');
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
      $paginate = \is_numeric($get['page_cidades']) ? $get['page_cidades'] : 1;

      $this->estadoModel = \model('App\Models\EstadoModel', false)
         ->select("estado.titulo, estado.sigla")
         ->join("cidade", "cidade.estadoFK = estado.id")
         ->orderBy("estado.titulo ASC")
         ->distinct();
      $data['estados'] = $this->estadoModel->findAll();

      $this->model
         ->select("cidade.*, estado.titulo estado, estado.sigla")
         ->join("estado", "cidade.estadoFK = estado.id")
         ->orderBy("cidade.titulo ASC");

      if (!empty($get)) {

         if (!empty($get['estado'])) {
            $this->model->where("sigla", $get['estado']);
         }

         if (!empty($get['procura'])) {
            $this->model->groupStart()
               ->like("cidade.titulo", $get['procura'])
               ->orLike("estado.titulo", $get['procura'])
               ->orLike("sigla", $get['procura'])
               ->groupEnd();
         }
      }
      $data['lista'] = $this->model->paginate(10, "cidades", $paginate);
      $data['pager'] = $this->model->pager;

      $data['title'] = 'Cidades';
      $data['tabela'] = "cidade";
      $data["nomeModel"] = "CidadeModel";

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

      $data['title'] = 'Cidade';
      $data['tabela'] = 'cidade';
      $data['resultado'] = "";

      $estadoModel = model('App\Models\EstadoModel', false);
      $estadoModel->orderBy('titulo ASC');
      $data['estados'] =  $estadoModel->findAll();

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
