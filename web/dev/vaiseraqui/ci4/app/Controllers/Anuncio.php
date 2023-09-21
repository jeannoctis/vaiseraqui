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

   public function emAltaG()
   {
      $post = \request()->getPost();

      if ($post) {
         $post['produtoFK1'] = \decode($post['produtoFK1']);

         $busca = $this->model
            ->where("tipoFK", $post['tipoFK'])
            ->where("cidadeFK", $post['cidadeFK'])
            ->where("tipo", $post['tipo'])
         ->first();

         if ($busca) {
            $post['id'] = $busca->id;

            $produtosFKs = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5];
            if(\in_array($post['produtoFK1'], $produtosFKs)) {
               $return['produtoEmAltaMenor'] = true;
               echo \json_encode($return);
               return;
}

            if($busca->produtoFK1 == $post['produtoFK1']) {
               $post['produtoFK1'] = NULL;

               $return['remove'] = $this->model->save($post);
               echo \json_encode($return);
               return;
            }

            $return['save'] = $this->model->save($post);
         } else {
            $return['insert'] = $this->model->insert($post);
         }
      }
      echo \json_encode($return);
   }

   public function emAltaP()
   {
      $post = \request()->getPost();

      if ($post) {
         $post['produtoFK'] = \decode($post['produtoFK']);

         $busca = $this->model
            ->where("tipoFK", $post['tipoFK'])
            ->where("cidadeFK", $post['cidadeFK'])
            ->where("tipo", $post['tipo'])
         ->first();

         if ($busca) {
            $post['id'] = $busca->id;

            if($busca->produtoFK1 == $post['produtoFK']) {
               $return['produtoEmAltaMaior'] = true;
               echo \json_encode($return);
               return;
            }

            $posicao = \array_search($post['produtoFK'], (array)$busca);
            if($posicao) {
               $post[$posicao] = NULL;               
               $return['save'] = $this->model->save($post);
               echo \json_encode($return);
               return;
            }

            if (empty($busca->produtoFK2)) {
               $post['produtoFK2'] = $post['produtoFK'];
            } else if (empty($busca->produtoFK3)) {
               $post['produtoFK3'] = $post['produtoFK'];
            } else if (empty($busca->produtoFK4)) {
               $post['produtoFK4'] = $post['produtoFK'];            
            } else if (empty($busca->produtoFK5)) {
               $post['produtoFK5'] = $post['produtoFK'];            
            } else {
               $return['noEmptySlots'] = true;
               echo \json_encode($return);
               return;
            }

            $return['save'] = $this->model->save($post);
         } else {
            $return['insert'] = $this->model->insert($post);
         }
      }
      echo \json_encode($return);
   }

   public function destaqueG()
   {
      $post = \request()->getPost();

      if ($post) {
         $post['produtoFK1'] = \decode($post['produtoFK1']);

         $this->model
            ->where("tipoFK", $post['tipoFK'])
            ->where("cidadeFK", $post['cidadeFK']);
         if($post['tipoFK'] == 6) {
            $this->model->where("categoriaFK", $post['categoriaFK']);
         }
         $busca = $this->model->where("tipo", $post['tipo'])->first();

         if ($busca) {
            $post['id'] = $busca->id;

            $produtosFKs = [$busca->produtoFK2, $busca->produtoFK3, $busca->produtoFK4, $busca->produtoFK5];
            if($post['tipo'] == 6) {
               $produtosFKs[] = [$busca->produtoFK6, $busca->produtoFK7];
            }
            
            if(\in_array($post['produtoFK1'], $produtosFKs)) {
               $return['produtoEmDestaqueMenor'] = true;
               echo \json_encode($return);
               return;
            }

            if($busca->produtoFK1 == $post['produtoFK1']) {
               $post['produtoFK1'] = NULL;

               $return['remove'] = $this->model->save($post);
               echo \json_encode($return);
               return;
            }

            $return['save'] = $this->model->save($post);
         } else {
            $return['insert'] = $this->model->insert($post);
         }
      }
      echo \json_encode($return);
   }

   public function destaqueP()
   {
      $post = \request()->getPost();

      if ($post) {
         $post['produtoFK'] = \decode($post['produtoFK']);

         $this->model
         ->where("tipoFK", $post['tipoFK'])
         ->where("cidadeFK", $post['cidadeFK']);
         if($post['tipoFK'] == 6) {
            $this->model
               ->where("categoriaFK", $post['categoriaFK']);
         }
         $busca = $this->model
            ->where("tipo", $post['tipo'])
            ->first();

         if ($busca) {
            $post['id'] = $busca->id;

            if($busca->produtoFK1 == $post['produtoFK']) {
               $return['produtoEmDestaqueMaior'] = true;
               echo \json_encode($return);
               return;
            }

            $posicao = \array_search($post['produtoFK'], (array)$busca);
            if($posicao) {
               $post[$posicao] = NULL;               
               $return['save'] = $this->model->save($post);
               echo \json_encode($return);
               return;
            }

            if($post['tipoFK'] != 6) {
               if (empty($busca->produtoFK2)) {
                  $post['produtoFK2'] = $post['produtoFK'];
               } else if (empty($busca->produtoFK3)) {
                  $post['produtoFK3'] = $post['produtoFK'];
               } else if (empty($busca->produtoFK4)) {
                  $post['produtoFK4'] = $post['produtoFK'];            
               } else if (empty($busca->produtoFK5)) {
                  $post['produtoFK5'] = $post['produtoFK'];            
               } else {
                  $return['noEmptySlots'] = true;
                  echo \json_encode($return);
                  return;
               }
            } else {
               if (empty($busca->produtoFK2)) {
                  $post['produtoFK2'] = $post['produtoFK'];
               } else if (empty($busca->produtoFK3)) {
                  $post['produtoFK3'] = $post['produtoFK'];
               } else if (empty($busca->produtoFK4)) {
                  $post['produtoFK4'] = $post['produtoFK'];            
               } else if (empty($busca->produtoFK5)) {
                  $post['produtoFK5'] = $post['produtoFK'];            
               } else if (empty($busca->produtoFK6)) {
                  $post['produtoFK6'] = $post['produtoFK'];            
               } else if (empty($busca->produtoFK7)) {
                  $post['produtoFK7'] = $post['produtoFK'];            
               } else {
                  $return['noEmptySlots'] = true;
                  echo \json_encode($return);
                  return;
               }
            }            

            $return['save'] = $this->model->save($post);
         } else {
            $return['insert'] = $this->model->insert($post);
         }
      }
      echo \json_encode($return);
   }
}
