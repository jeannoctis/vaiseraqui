<?php

namespace App\Controllers;

class Cardapio extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\CardapioModel', false);
      $this->tabela = "cardapio";
      $this->session->set('menuAdmin', '5');
   }

   public function index()
   {
      $get = \request()->getGet();

      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->model->delete(['id' => $exc]);
         }
      } else if ($_POST['nexc']) {
         $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
      }

      $paginate = \is_numeric($get['page_cardapio']) ? $get['page_cardapio'] : 1 ;

      $data['lista'] = $this->model->orderBy("ordem ASC")->paginate(25, "cardapio", $paginate);
      $data['pager'] = $this->model->pager;

      $data['title'] = 'Cardápio';
      $data['tabela'] = "cardapio";
      $data["nomeModel"] = "CardapioModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $post = request()->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Item';
      $data['tabela'] = 'cardapio';
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
