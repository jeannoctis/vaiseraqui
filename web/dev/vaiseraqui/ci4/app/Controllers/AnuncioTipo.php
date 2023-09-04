<?php

namespace App\Controllers;

class AnuncioTipo extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\TipoModel', false);
      $this->tabela = "tipo";
      $this->session->set('menuAdmin', 7);
   }

   public function index()
   {
      $data['lista'] = $this->model->orderBy("id ASC")->findAll();

      $data['title'] = 'Tipo de Anúncio';
      $data['tabela'] = "tipo";
      $data["nomeModel"] = "TipoModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $post = request()->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Anúncio Tipo';
      $data['tabela'] = 'tipo';
      
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
}
