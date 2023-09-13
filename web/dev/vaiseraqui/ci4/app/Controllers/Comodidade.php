<?php

namespace App\Controllers;

class Comodidade extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text', 'utils']);
      $this->model = model('App\Models\ComodidadeModel', false);
      $this->tabela = "comodidade";
      $this->session->set('menuAdmin', '5');
   }

   public function index()
   {
      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
         }
      } else if ($_POST['nexc']) {
         $data['erros'][] = "Selecione 1 ou mais itens para Excluir";
      }

      $data['get'] = $get = request()->getGet();
      $paginate = \is_numeric($get['page_comodidades']) ? $get['page_comodidades'] : 1;

      if (!empty($get['procura'])) {
         $this->model->groupStart()
            ->like("titulo", $get['procura'])            
            ->groupEnd();
      }

      $data['lista'] = $this->model->orderBy("ordem ASC")->paginate(10, 'comodidades', $paginate);
      $data['pager'] = $this->model->pager;

      $data['title'] = 'Comodidades';
      $data['tabela'] = "comodidade";
      $data["nomeModel"] = "ComodidadeModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $post = request()->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Comodidade';
      $data['tabela'] = 'comodidade';
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
