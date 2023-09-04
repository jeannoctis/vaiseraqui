<?php

namespace App\Controllers;

class Usuario extends BaseController
{

   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\UsuarioModel', false);
      $this->tabela = "usuario";
      $this->session->set('menuAdmin', '100');

      if ($_SESSION["admin"] > 3) {
         exit();
      }
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

      $data['lista'] = $this->model->orderBy("id ASC")->findAll();

      $data['title'] = 'Usuaríos';
      $data['tabela'] = "usuario";
      $data["nomeModel"] = "UsuarioModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $secaoModel = model('App\Models\SecaoModel', false);
      $request = request();

      helper('form');

      $data['title'] = 'Usuaríos';
      $data['tabela'] = 'usuario';
      $data['resultado'] = "";

      $id = decode($this->request->uri->getSegment(4));

      $post = $request->getPost();


      if ($post) {

         if (!$post["senha"]) {
            unset($post["senha"]);
         } else {
            $post["senha"] = \sha1($post["senha"]);
         }

         if ($post['aprovados']) {
            foreach ($post['aprovados'] as $apro) {
               $post['secoes'] .= ";" . $apro;
            }
         }

         if (!$id) {
            $data['salvou'] =  $this->model->insert($post);
         } else {
            $post["id"] = $id;
            $data['salvou']  = $this->model->save($post);
            if ($data['salvou']) { ?>
               <META http-equiv="refresh" content="3;URL=<?= PATHSITE ?>admin/<?= $data['tabela'] ?>"> <?
            }
         }
         $data["erros"] = $this->model->errors();
      }

      if ($id) {
         $data["resultado"] = $this->model->find($id);
      }

      $secaoModel->resetQuery();
      $data['secoes'] =  $secaoModel->orderBy("ordem ASC, id DESC")->findAll();

      echo view('templates/admin-header', $data);
      echo view("{$data['tabela']}/form");
      echo view('templates/admin-footer');
   }

   public function login()
   {
      $data = array();

      if ($_POST) {
         $sql = "SELECT * FROM usuario WHERE usuario = ? AND SENHA = sha1(?) LIMIT 1";
         $query = $this->db->query($sql, array($_POST['usuario'], $_POST['senha']));
         $results = $query->getResult();

         if ($results) {

            $this->session->set('admin', $results[0]->id);

            return redirect()->route('admin');
         } else {
            $data['mensagem'] = "Login ou usu&aacute;rio inv&aacute;lidos";
         }
      }

      echo view('usuario/login', $data);
   }
}
