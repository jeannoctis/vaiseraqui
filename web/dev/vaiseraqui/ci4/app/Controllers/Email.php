<?php

namespace App\Controllers;

class Email extends BaseController
{

   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\EmailModel', false);
      $this->tabela = "email";
      $this->session->set('menuAdmin', '8');
   }

   public function index()
   {
      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $this->model->delete(['id' => $exc]);
         }
      }

      $data['lista'] = $this->model->findAll();

      $data['title'] = 'E-mail';
      $data['tabela'] = "email";
      $data["nomeModel"] = "EmailModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $request = request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));

      helper('form');

      $data['title'] = 'E-mail';
      $data['tabela'] = 'email';
      $data['resultado'] = "";

      if ($post) {

         if ($id) {
            $post["id"] = $id;
            $data['salvou'] = $this->model->save($post);
         } else {
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

   //--------------------------------------------------------------------
}
