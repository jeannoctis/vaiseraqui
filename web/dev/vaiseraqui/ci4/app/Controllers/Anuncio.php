<?php

namespace App\Controllers;

class Anuncio extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text', 'utils']);
      $this->model = model('App\Models\AnuncioModel', false);
      $this->tabela = "anuncio";
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
      $paginate = \is_numeric($get['page_anuncios']) ? $get['page_anuncios'] : 1;      

      $data['lista'] = $this->model->paginate(25, 'anuncios', $paginate);
      $data['pager'] = $this->model->pager;

      $data['title'] = 'Anúncios Pagos';
      $data['tabela'] = "anuncio";
      $data["nomeModel"] = "AnuncioModel";

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $request = request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Anúncio Pago';
      $data['tabela'] = 'anuncio';
      $data['resultado'] = "";

      $this->produtoModel = \model('App\Models\ProdutoModel', false)->where("ativo", "1");
      $data['produtos'] = $this->produtoModel->findAll();

      if ($post) {

         if($post['tipo'] == "XL") {
            $search = $this->model->where("tipo", "XL")->where("{$post['inicio']} <= termino", NULL, FALSE);

            if($search) {
               $data["erros"] = $this->model->errors();
            }
         }

         if($post['tipo'] == "HSM") {
            $this->model
               ->select("anuncio.*, prod.categoriaFK, prod_cat.tipoFK, tipo.id as tipo")
               ->join("produto prod", "prod.id = anuncio.produtoFK")
               ->join("produto_categoria prod_cat", "prod.categoriaFK = prod_cat.id")
               ->join("tipo", "prod_cat.tipoFK = tipo.id")
               ->where("anuncio.tipo", $post['tipo'])
               ->where("termino > {$post['inicio']}");
            $search = $this->model->findAll();

            if(\count($search) < 4) {

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

   public function tipo()
   {
      $request = \request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));      
      $this->session->set('menuAdmin', setMenuAdminTipo($id));
      
      $this->produtoCategoriaModel = \model('App\Models\ProdutoCategoriaModel', false)
         ->select('id, titulo')
         ->where("tipoFK", $id);
      $IDsCategorias = $this->produtoCategoriaModel->findAll();

      if(empty($IDsCategorias)) {
         $IDsCategorias[]['id'] = 0;
      }
      $IDsCategorias = array_column($IDsCategorias, 'id');

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->whereIn("categoriaFK", $IDsCategorias)
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $this->anuncioTipoModel = \model('App\Models\AnuncioTipoModel', false);

      $data['title'] = 'Anúncios';
      $data['resultado'] = '';

      if($post) {         
         $post["id"] = $id;
         $data['salvou'] = $this->anuncioTipoModel->save($post);         
         $data["erros"] = $this->anuncioTipoModel->errors();
      }

      if($id) {
         $data['resultado'] = $this->anuncioTipoModel->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/tipo");
      echo view('templates/admin-footer');
   }

   public function emAlta()
   {
      $request = \request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));      
      $this->session->set('menuAdmin', 7);
      
      $this->produtoCategoriaModel = \model('App\Models\ProdutoCategoriaModel', false)
         ->select('id, titulo')
         ->where("tipoFK", $id);
      $IDsCategorias = $this->produtoCategoriaModel->findAll();

      if(empty($IDsCategorias)) {
         $IDsCategorias[]['id'] = 0;
      }
      $IDsCategorias = array_column($IDsCategorias, 'id');

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->whereIn("categoriaFK", $IDsCategorias)
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $this->anuncioTipoModel = \model('App\Models\AnuncioTipoModel', false)
         ->where("tipo", "alta");
      $data['lista'] = $this->anuncioTipoModel->findAll();


      $data['title'] = 'Anúncios em alta';
      $data['resultado'] = '';

      if($post) {         
         $post["id"] = $id;
         $data['salvou'] = $this->anuncioTipoModel->save($post);         
         $data["erros"] = $this->anuncioTipoModel->errors();
      }

      if($id) {
         $data['resultado'] = $this->anuncioTipoModel->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/em-alta");
      echo view('templates/admin-footer');
   }
}
