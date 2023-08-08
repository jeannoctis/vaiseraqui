<?php

namespace App\Controllers;

class CategoriaArtigo extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\CategoriaArtigoModel', false);
      $this->tabela = "categoriaArtigo";
      $this->session->set('menuAdmin', '3');
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

      $this->model->orderBy("ordem ASC");
      $data['lista'] = $this->model->findAll();

      $data['title'] = 'Categorias do Blog';
      $data['tabela'] = "categoriaArtigo";
      $data["nomeModel"] = "CategoriaArtigoModel";

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

      $data['title'] = 'Categoria do Blog';
      $data['tabela'] = 'categoriaArtigo';
      $data['resultado'] = "";

      if ($post) {

         if ($id) {
            $post["id"] = $id;
            $data['salvou'] = $this->model->save($post);
         } else {
            $post["identificador"] = \arruma_url($post['titulo']);
            $data['salvou'] =  $this->model->insert($post);
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
