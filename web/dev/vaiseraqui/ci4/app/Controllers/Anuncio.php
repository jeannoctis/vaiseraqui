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
      $this->session->set('menuAdmin', 7);

      $data['title'] = 'Anúncios Pagos';
      $data['tabela'] = "anuncio";
      $data["nomeModel"] = "AnuncioModel";

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/index", $data);
      echo view('templates/admin-footer');
   }   

   public function modelos()
   {
      $this->session->set('menuAdmin', 7);
      $modelo = $this->request->uri->getSegment(4);

      $this->model->where("tipo", substr($modelo, 0, -1));
      $data['lista'] = $this->model->findAll();

      if($modelo == 'categoriasservicos') {
         $titulo2 = "Categoria de Prestadores de Serviços";
      } else {
         $titulo2 = $modelo;
      }

      $data['title'] = "Anúncios {$titulo2}";
      $data['tabela'] = $this->tabela;
      $data['resultado'] = '';

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/{$modelo}");
      echo view('templates/admin-footer');
   }

   public function destaque()
   {
      $request = \request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));
      $this->session->set('menuAdmin', 7);

      switch ($id) {
         case 7:
            $tipos = [1, 2, 3, 4];
            break;
         case 8:
            $tipos = [5];
            break;
         case 9:
            $tipos = [6];
            break;
      }

      $this->produtoCategoriaModel = \model('App\Models\ProdutoCategoriaModel', false)
         ->select('id, titulo')
         ->whereIn("tipoFK", $tipos);
      $IDsCategorias = $this->produtoCategoriaModel->findAll();

      if (empty($IDsCategorias)) {
         $IDsCategorias[]['id'] = 0;
      }
      $IDsCategorias = array_column($IDsCategorias, 'id');

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->whereIn("categoriaFK", $IDsCategorias)
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $data['title'] = 'Anúncios';
      $data['tabela'] = $this->tabela;
      $data['resultado'] = '';

      if ($post) {         
         $post["id"] = $id;

         foreach ($post as $key => $item) {
            if (empty($item)) {
               $post[$key] = null;
            }
         }

         $data['salvou'] = $this->model->save($post);         
         $data["erros"] = $this->model->errors();
      }

      if ($id) {
         $data['resultado'] = $this->model->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/destaque");
      echo view('templates/admin-footer');
   }

   public function tipo()
   {
      $post = request()->getPost();
      $id = decode($this->request->uri->getSegment(4));
      $this->session->set('menuAdmin', 7);

      $this->produtoCategoriaModel = \model('App\Models\ProdutoCategoriaModel', false)
         ->select('id, titulo')
         ->where("tipoFK", $id);
      $IDsCategorias = $this->produtoCategoriaModel->findAll();

      if (empty($IDsCategorias)) {
         $IDsCategorias[]['id'] = 0;
      }
      $IDsCategorias = array_column($IDsCategorias, 'id');

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->whereIn("categoriaFK", $IDsCategorias)
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $data['title'] = 'Anúncios';
      $data['tabela'] = $this->tabela;
      $data['resultado'] = '';

      if ($post) {
         $post["id"] = $id;

         foreach ($post as $key => $item) {
            if (empty($item)) {
               $post[$key] = null;
            }
         }

         $data['salvou'] = $this->model->save($post);
         $data["erros"] = $this->model->errors();
      }

      if ($id) {
         $data['resultado'] = $this->model->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/tipo");
      echo view('templates/admin-footer');
   }

   public function banner()
   {
      $request = \request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));
      $this->session->set('menuAdmin', 7);      

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $data['title'] = 'Anúncios';
      $data['tabela'] = $this->tabela;
      $data['resultado'] = '';

      if ($post) {
         $post["id"] = $id;

         foreach ($post as $key => $item) {
            if (empty($item)) {
               $post[$key] = null;
            }
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
         $img = $this->request->getFile("arquivo2");
         if ($img) {
            if ($img->isValid() && !$img->hasMoved()) {
               $newName = date('Y-m-d') . $img->getRandomName();
               $post["arquivo2"] = $newName;
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

         $data['salvou'] = $this->model->save($post);
         $data["erros"] = $this->model->errors();
      }

      if ($id) {
         $data['resultado'] = $this->model->find($id);
      }

      echo view('templates/admin-header', $data);
      echo view("{$this->tabela}/banner");
      echo view('templates/admin-footer');
   }   
   
   public function servicocategoria()
   {
      $id = decode($this->request->uri->getSegment(4));
      $post = \request()->getPost();
      
      $anunciosCategoriasServicos = $this->model->where("tipo", "servicocategoria")->findAll();
      $data['IDsExistentes'] = \array_column($anunciosCategoriasServicos, "categoriaFK");

      $this->produtoCategoriaModel = \model("App\Models\ProdutoCategoriaModel", false);
      $data['categoriasDisponiveis'] = $this->produtoCategoriaModel->where("tipoFK", "6")->findAll();

      foreach ($data['categoriasDisponiveis'] as $cat) {
         $categoriasServicos[$cat->id] = $cat->titulo;
      }

      $IDsCatDisponiveis = \array_column($data['categoriasDisponiveis'], "id");

      $this->produtoModel = \model('App\Models\ProdutoModel', false)
         ->select("produto.id, produto.titulo, produto.anuncianteFK, a.titulo anunciante, a.telefone")
         ->join("anunciante a", "produto.anuncianteFK = a.id")
         ->whereIn("categoriaFK", $IDsCatDisponiveis)
         ->where("ativo", 1);
      $data['produtos'] = $this->produtoModel->findAll();

      $data['title'] = 'Anúncios categorias de Prestadores de Serviços';
      $data['tabela'] = "anuncio";
      $data["nomeModel"] = "AnuncioModel";
      $data['resultado'] = '';

      if($post) {
         foreach($post as $key => $item) {
            if(empty($item)) {
               $post[$key] = NULL;
            }
         }
         
         $categoriaAtual = $categoriasServicos[$post['categoriaFK']];
         $post['titulo'] = "Anúncios Serviços - Categoria {$categoriaAtual}";
         $post['tipo'] = "servicocategoria";

         if ($id) {
            $post["id"] = $id;
            $data['salvou'] = $this->model->save($post);
         } else {
            $data['salvou'] = $this->model->insert($post);
}
      }

      if ($id) {
         $data['resultado'] = $this->model->find($id);
      }
      
      echo view('templates/admin-header', $data);
      echo view("anuncio/servicocategoria", $data);
      echo view('templates/admin-footer');
   }
}
