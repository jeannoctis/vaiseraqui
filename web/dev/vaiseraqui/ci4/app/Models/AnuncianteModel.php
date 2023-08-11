<?php

namespace App\Models;

use CodeIgniter\Model;

class AnuncianteModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'anunciante';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'cpf','telefone','email','senha','arquivo','recuperar'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required'     
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ]
   ];
   protected $skipValidation = false;
   
   public function verPagina($segments){
       $page = $segments[1];
    $this->session = \Config\Services::session($config);   
        
     if(!$this->session->get('anunciante') && $page != 'login') {?>
 <meta http-equiv="refresh" content="0;URL='<?=PATHSITE?>area-do-anunciante/login'" /> 
<?  exit();   }
    
    $data['segments'] = $segments;
    helper("date");
       helper("encrypt");
    $data['status'] = 1;
     $request = \Config\Services::request();
     $post = $request->getPost();
     $header = "header-anunciante";
    $footer = "footer-anunciante";
    
    $produtoModel = model('App\Models\ProdutoModel', false);  
    $produtoModel->where("anuncianteFK",$this->session->get('anunciante')->id);
    $data['anuncios'] = $produtoModel->findAll();
        
    if(!$this->session->get('anuncio') && $data['anuncios']){
      $this->session->set('anuncio',$data['anuncios'][0]->id);
    }
    
    $produtoModel->resetQuery();
    $produtoModel->select("produto.*,  DATEDIFF(validade, NOW()) AS difValidade,  "
            . "DATEDIFF(validadeDestaque, NOW()) AS difDestaque, DATEDIFF(inicioValidade, NOW()) AS difInicio, pc.tipoFK ");
    $produtoModel->join('produto_categoria pc','produto.categoriaFK = pc.id');
    $data['anuncio'] = $produtoModel->find( $this->session->get('anuncio'));
   

  $data['anunciante'] = $this->find($this->session->get('anunciante')->id);
    
     $data['infoPagina'] = array();
     $data['infoPagina']['fotoAnunciante'] = $data['anunciante']->arquivo;
   
      switch($page) {
          
        case "inicio":
          
       $data['hoje'] = date('Y-m-d');
      $data['hoje30'] = date("Y-m-d",strtotime("-30 day", strtotime($data['hoje'])));
          
          break;
          
        case "downloads":
          
              $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(61);
          
           $downloadModel = model('App\Models\DownloadModel', false);  
          $downloadModel->orderBy("ordem ASC, id DESC");
          $data['downloads'] = $downloadModel->findAll();
          break;
          
        case 'troca-anuncio':
    $produtoModel = model('App\Models\ProdutoModel', false);  
    $produtoModel->select("id");
    $produtoModel->where("anuncianteFK",$this->session->get('anunciante')->id);
    $anuncio = $produtoModel->find(decode($segments[2]));
          if($anuncio){
          $this->session->set('anuncio',$anuncio->id);   
          }?>
  <meta http-equiv="refresh" content="0;URL='<?=PATHSITE?>area-do-anunciante/inicio/'" />   
      <? 
            exit();
          break;
        case "o-que-tem-no-imovel":
          
             $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(57);
          
         $data['nomePagina'] = "Comodidades";
          $data['iconePagina'] = "icone_ok.svg";
             $data['tipoPagina'] = 'itens';
           $itemModel = model('App\Models\ItemModel', false);
      $itemModel->orderBy("titulo ASC");
        $itemModel->where("tipo",1);
      $data["itens"] = $itemModel->findAll();
          
           if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
          break;
        case "atende-em":
          
                  $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(63);
          
           $data['nomePagina'] = "Atende em";
          $data['iconePagina'] = "icone_ok.svg";
       $data['tipoPagina'] = 'itens';
       $itemModel = model('App\Models\ItemModel', false);
      $itemModel->orderBy("titulo ASC");
      $itemModel->where("tipo",3);
      $data["itens"] = $itemModel->findAll();
          
           if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          $page = 'o-que-tem-no-imovel';    
          break;
      case "proximidades":
          
              $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(58);
          
           $data['nomePagina'] = "Proximidades";
          $data['iconePagina'] = "icone_local.svg";
        $data['tipoPagina'] = 'proximidades';
      $proximidadeModel = model('App\Models\ProximidadeModel', false);
      $proximidadeModel->orderBy("titulo ASC");
        $proximidadeModel->where("tipo",1);
      $data["itens"] = $proximidadeModel->findAll();
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
          $page = 'o-que-tem-no-imovel';      
          break;
           case "lazer":
          
              $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(58);
          
           $data['nomePagina'] = "Lazer";
          $data['iconePagina'] = "icone_lazer.svg";
        $data['tipoPagina'] = 'lazer';
      $lazerModel = model('App\Models\LazerModel', false);
      $lazerModel->orderBy("titulo ASC");
      $data["itens"] = $lazerModel->findAll();
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
          $page = 'o-que-tem-no-imovel';      
          break;
        case "perfil":
          
          $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(53);
          
           if($post){
             
           if(!$post["senha"]) {
        unset($post["senha"]);
      }

      if(!$post["senha"]) {
        unset($post["senha2"]);
      }
             
               if($post["senha"] && $post["senha2"]) {
        if($post["senha"] !== $post["senha2"]) {
          $data["erroLogin"] = "Senhas estão diferentes";
          unset($post["senha"]);
          unset($post["senha2"]);
        } else {
          $post["senha"] = sha1($post["senha"]);
        }
      } else {
        unset($post["senha"]);
      }

      unset($post["senha2"]);
             
               $img = $request->getFile("arquivo");
             
               if ($img) {
                   echo View('templates/tinypng');
                           
           if ($img->isValid() && !$img->hasMoved()) {
              $newName = date('Y-m-d') . $img->getRandomName();
              $post["arquivo"] = $newName;
            $img->move(PATHHOME . '/uploads/anunciante/', $newName);      
          }           
      }
             
             
            $post['id'] = $data['anunciante']->id;
            $data["salvou"] = $this->save($post);
          }
          break;
        case "o-que-servimos":
          
           $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(66);  
          
        $data['nomePagina'] = "O que servimos";
        $data['iconePagina'] = "icon_drink_.svg";
        $data['tipoPagina'] = 'itens';
      $itemModel = model('App\Models\ItemModel', false);
       $itemModel->where("tipo",2);
      $itemModel->orderBy("titulo ASC");
      $data["itens"] = $itemModel->findAll();
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
          $page = 'o-que-tem-no-imovel';      
          break;
           case "shows-ao-vivo":
          
          $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(67);  
          
           $data['nomePagina'] = "Shows ao vivo";
        $data['iconePagina'] = "icon_show.svg";
        $data['tipoPagina'] = 'proximidades';
      $itemModel = model('App\Models\ProximidadeModel', false);
       $itemModel->where("tipo",2);
      $itemModel->orderBy("titulo ASC"); 
      $data["itens"] = $itemModel->findAll();
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
          $page = 'o-que-tem-no-imovel';      
          break;
        case "fotos":
          
            $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(54);
          
         $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);  
          
        if (isset($_POST['excluir'])) {
      foreach ($_POST['excluir'] as $exc) {
      $data['salvou'] =  $produtoFotoModel->delete(['id' => $exc]);
      }
    }
       
        if ($request->getFileMultiple('arquivo')) {     
                   echo View('templates/tinypng');
           foreach($request->getFileMultiple('arquivo') as $img) { 
                   
                   if ($img->isValid() && !$img->hasMoved()) {
              $newName = date('Y-m-d') . $img->getRandomName();
              $save["arquivo"] = $newName;
            $img->move(PATHHOME . '/uploads/produto/' . $data['anuncio']->id, $newName);
                     
          try{
          $upload_path = "uploads/produto/".$data['anuncio']->id ;                   
                 
        $upload_path_root = PATHHOME  . $upload_path;
        $file_name = $img->getName();
        $file_path = $upload_path_root . "/". $file_name;
          
        $tinyfile = \Tinify\fromFile($file_path);
        $tinyfile->toFile($file_path);
      } catch(\Tinify\Exception $e) {
        }
                     
                               try {
$img2 = imagecreatefromstring(file_get_contents(PATHSITE."uploads/produto/".$data['anuncio']->id."/".$newName));
imagepalettetotruecolor($img2);
imagealphablending($img2, true);
imagesavealpha($img2, true);
imagewebp($img2, PATHHOME ."uploads/produto/{$data['anuncio']->id}/{$newName}.webp", 80);
imagedestroy($img2);
             } catch(\ErrorException $e) {
                  }
          }
          
            $save["produtoFK"] = $data['anuncio']->id;
            $data["salvou"] = $produtoFotoModel->save($save);      
           }
      }
          
          $produtoFotoModel->resetQuery();
          $produtoFotoModel->where("produtoFK", $data['anuncio']->id);
          $produtoFotoModel->orderBy("ordem ASC, id DESC");
          $data['fotos'] = $produtoFotoModel->findAll();
          $data['tabela'] = 'produto_foto';
          $data['nomeModel'] = 'ProdutoFotoModel';
          
          break;
        case "textos":
          
          $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(58);
          
           $produtoTextoModel = model('App\Models\ProdutoTextoModel', false);  
          $produtoTextoModel->where("produtoFK", $data['anuncio']->id);
          $data['textos'] = $produtoTextoModel->findAll();
          
          if($post){
              if($post['titulo']){
                $save['produtoFK'] = $data['anuncio']->id;
                foreach($post['titulo'] as $ind => $titulo){
                  if($post['id'][$ind]){
                    $save['id'] = decode($post['id'][$ind]);
                  } else {
                    unset($save['id']);
                  }
                  $save['titulo'] = $titulo;
                  $save['texto'] = $post['texto'][$ind];
                  $produtoTextoModel->resetQuery();
              $data['salvou'] =  $produtoTextoModel->save($save);                
                }
              }
          }
          
          break;
        case "acomodacoes":
          
           $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(52);
          
           $produtoAcomodacaoModel = model('App\Models\ProdutoAcomodacaoModel', false);  
          $produtoAcomodacaoModel->where("produtoFK", $data['anuncio']->id);
          $data['acomodacoes'] = $produtoAcomodacaoModel->findAll();
          
          if($post){
              if($post['titulo']){
                $save['produtoFK'] = $data['anuncio']->id;
                foreach($post['titulo'] as $ind => $titulo){
                  if($post['id'][$ind]){
                    $save['id'] = decode($post['id'][$ind]);
                  } else {
                    unset($save['id']);
                  }
                  $save['titulo'] = $titulo;
                  $save['itens'] = $post['itens'][$ind];
                  $produtoAcomodacaoModel->resetQuery();
              $data['salvou'] =  $produtoAcomodacaoModel->save($save);                
                }
              }
          }
          break;
           case "precos":
          
                    $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(68);  
          
           $produtoPrecoModel = model('App\Models\ProdutoPrecoModel', false);  
          $produtoPrecoModel->where("produtoFK", $data['anuncio']->id);
          $data['precos'] = $produtoPrecoModel->findAll();
          
          if($post){
              if($post['titulo']){
                $save['produtoFK'] = $data['anuncio']->id;
                foreach($post['titulo'] as $ind => $titulo){
                  if($post['id'][$ind]){
                    $save['id'] = decode($post['id'][$ind]);
                  } else {
                    unset($save['id']);
                  }
                  $save['titulo'] = $titulo;
                  $save['descricao'] = $post['descricao'][$ind];
                  
                      $save['preco'] = str_replace(".", "", $post['preco'][$ind]);
                     $save['preco'] = str_replace(",", ".", $post['preco'][$ind]);

        $save['preco2'] = str_replace(".", "", $post['preco2'][$ind]);
        $save['preco2'] = str_replace(",", ".", $post['preco2'][$ind]);
        
         
                  
                  $produtoPrecoModel->resetQuery();
              $data['salvou'] =  $produtoPrecoModel->save($save);                
                }
              }
          }
          
          break;
        case "cardapio":
          
                  $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(63);
          
          $produtoAcomodacaoModel = model('App\Models\ProdutoAcomodacaoModel', false);  
          $produtoAcomodacaoModel->where("produtoFK", $data['anuncio']->id);
          $data['acomodacoes'] = $produtoAcomodacaoModel->findAll();
          
          if($post){
              if($post['titulo']){
                $save['produtoFK'] = $data['anuncio']->id;
                foreach($post['titulo'] as $ind => $titulo){
                  if($post['id'][$ind]){
                    $save['id'] = decode($post['id'][$ind]);
                  } else {
                    unset($save['id']);
                  }
                  $save['titulo'] = $titulo;
                  $save['itens'] = $post['itens'][$ind];
                  $produtoAcomodacaoModel->resetQuery();
              $data['salvou'] =  $produtoAcomodacaoModel->save($save);                
                }
              }
          }
          break;
        case "calendario":       
            $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(56);
          
          break;
        case "dados-servico":
          
               $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(62);
          
    $produtoQuantidadeModel = model('App\Models\ProdutoQuantidadeModel', false);
    $produtoQuantidadeModel->where("produtoFK", $data['anuncio']->id);
    $quantidades = $produtoQuantidadeModel->findAll();
  
   $capacidadeModel = model('App\Models\CapacidadeModel', false);
   $capacidadeModel->where("servico","S");
   $capacidadeModel->orderBy("id ASC");    
   $data["capacidades"] = $capacidadeModel->findAll();
          
      if(!$quantidades){
        if($data["capacidades"] ){
       foreach($data["capacidades"] as $capac){
          $save["produtoFK"] = $data['anuncio']->id;
         $save["capacidadeFK"] = $capac->id;
         $save["preco"] = 0.0;
        $produtoQuantidadeModel->insert($save);
       }
        }
      }
          
           if($post){
            $post['id'] = $data['anuncio']->id;
            
                     $img = $request->getFile("arquivo");
             
               if ($img) {
                   echo View('templates/tinypng');
                           
           if ($img->isValid() && !$img->hasMoved()) {
              $newName = date('Y-m-d') . $img->getRandomName();
              $post["arquivo"] = $newName;
            $img->move(PATHHOME . '/uploads/produto/'.$data['anuncio']->id.'/', $newName);
          }           
      }
      
            $post['preco'] = str_replace(".", "", $post['preco']);             
           $post['preco'] =  str_replace(",",".",  $post['preco']);
           
           
            $data["salvou"] = $produtoModel->save($post);
            
             
                if($post["precos"]) {
           foreach($post["precos"] as $ind => $preco){
              $salvamento['preco'] = str_replace(".", "", $preco);             
           $salvamento['preco'] = (String) str_replace(",",".",  $salvamento['preco']);
             
       
             
             $salvamento["id"] = $post["ids"][$ind];
             $produtoQuantidadeModel->resetQuery();
           $produtoQuantidadeModel->save($salvamento);
           
           }
         }
             
          }
          
          $cidadeModel = model('App\Models\CidadeModel', false);
      $cidadeModel->select("cidade.id, cidade.titulo, e.sigla ");
      $cidadeModel->join("estado e", "e.id = cidade.estadoFK");
     $cidadeModel->orderBy("titulo ASC");
     $data["cidades"] = $cidadeModel->findAll();
          
      $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
      $produtoCategoriaModel->orderBy("titulo ASC");
      $produtoCategoriaModel->where("tipoFK", 2 );
      $data["categorias"] = $produtoCategoriaModel->findAll();
          
     $produtoQuantidadeModel->resetQuery();
    $produtoQuantidadeModel->select("produto_quantidade.id, produto_quantidade.preco, capacidade.quantidade");
    $produtoQuantidadeModel->join("capacidade","capacidade.id = produto_quantidade.capacidadeFK");
     $produtoQuantidadeModel->where("produtoFK", $data['anuncio']->id);
    $data["quantidades"] = $produtoQuantidadeModel->findAll();
          
          break;
        case "dados-evento":
          
          $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(69);  
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          
           $cidadeModel = model('App\Models\CidadeModel', false);
      $cidadeModel->select("cidade.id, cidade.titulo, e.sigla ");
      $cidadeModel->join("estado e", "e.id = cidade.estadoFK");
     $cidadeModel->orderBy("titulo ASC");
     $data["cidades"] = $cidadeModel->findAll();
          
      $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
      $produtoCategoriaModel->orderBy("titulo ASC");
      $produtoCategoriaModel->where("tipoFK", 4 );
      $data["categorias"] = $produtoCategoriaModel->findAll();
          
          break;
           case "video":
          
             $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(55);
          
          if($post){
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);
          }
          break;
        case "dados-local":
          
                 $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(64);          
          
          $produtoFuncionamentoModel = model('App\Models\ProdutoFuncionamentoModel', false);
            $produtoFuncionamentoModel->where("produtoFK", $data['anuncio']->id);
            $data["horario"] = $produtoFuncionamentoModel->find()[0];
          
          if($post){
            $horario = $post["horario"];
            unset($post['horario']);
            
            $post['id'] = $data['anuncio']->id;
            
                    if($post['coordenadas']){
           $coord = explode(",",$post['coordenadas']);
        
            $post['latitude'] = $coord[0];
            $post['longitude'] = $coord[1];
          }
            
            
            $img = $request->getFile("arquivo");
                        
          if($img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = date('Y-m-d') . $img->getRandomName();
                $post["arquivo"] = $newName;
                $img->move(PATHHOME . '/uploads/produto/'.$data['anuncio']->id.'/', $newName);
            }
          }
            
            $data["salvou"] = $produtoModel->save($post);
            
            if($horario){
            $horario["produtoFK"] = $data['anuncio']->id;
              
              if(!$horario["segunda_abre"]){
                $horario["segunda_abre"] = NULL;
              }
               if(!$horario["terca_abre"]){
                $horario["terca_abre"] = NULL;
              }
               if(!$horario["quarta_abre"]){
                $horario["quarta_abre"] = NULL;
              }
               if(!$horario["quinta_abre"]){
                $horario["quinta_abre"] = NULL;
              }
               if(!$horario["sexta_abre"]){
                $horario["sexta_abre"] = NULL;
              }
               if(!$horario["sabado_abre"]){
                $horario["sabado_abre"] = NULL;
              }
               if(!$horario["domingo_abre"]){
                $horario["domingo_abre"] = NULL;
              }
               if(!$horario["segunda_fecha"]){
                $horario["segunda_fecha"] = NULL;
              }
               if(!$horario["terca_fecha"]){
                $horario["terca_fecha"] = NULL;
              }
               if(!$horario["quarta_fecha"]){
                $horario["quarta_fecha"] = NULL;
              }
               if(!$horario["quinta_fecha"]){
                $horario["quinta_fecha"] = NULL;
              }
               if(!$horario["sexta_fecha"]){
                $horario["sexta_fecha"] = NULL;
              }
               if(!$horario["sabado_fecha"]){
                $horario["sabado_fecha"] = NULL;
              }
               if(!$horario["domingo_fecha"]){
                $horario["domingo_fecha"] = NULL;
              }
              $produtoFuncionamentoModel->resetQuery();
              $produtoFuncionamentoModel->where("produtoFK", $data['anuncio']->id);
              $hasProdutoFuncionamento = $produtoFuncionamentoModel->find()[0];
              
              if($hasProdutoFuncionamento){
                $horario["id"] = $hasProdutoFuncionamento->id;
              }
              
            $produtoFuncionamentoModel->save($horario);
            }
            
          }
          
      $cidadeModel = model('App\Models\CidadeModel', false);
      $cidadeModel->select("cidade.id, cidade.titulo, e.sigla ");
      $cidadeModel->join("estado e", "e.id = cidade.estadoFK");
     $cidadeModel->orderBy("titulo ASC");
     $data["cidades"] = $cidadeModel->findAll();
          
      $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
      $produtoCategoriaModel->orderBy("titulo ASC");
      $produtoCategoriaModel->where("tipoFK", 3 );
      $data["categorias"] = $produtoCategoriaModel->findAll();
          
          break;
        case "dados":
          $textoModel = model('App\Models\TextoModel', false);  
          $data['textoExplicativo'] = $textoModel->find(51);
          
      $cidadeModel = model('App\Models\CidadeModel', false);
      $cidadeModel->select("cidade.id, cidade.titulo, e.sigla ");
      $cidadeModel->join("estado e", "e.id = cidade.estadoFK");
     $cidadeModel->orderBy("titulo ASC");
     $data["cidades"] = $cidadeModel->findAll();
          
      $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);   
      $produtoCategoriaModel->where("tipoFK", 1 );
         $produtoCategoriaModel->orderBy("titulo ASC");
      $data["categorias"] = $produtoCategoriaModel->findAll();
          
/*    $capacidadeModel = model('App\Models\CapacidadeModel', false);
    $capacidadeModel->where("espaco","S");
    $capacidadeModel->orderBy("id ASC");    
   $data["capacidades"] = $capacidadeModel->findAll(); */
          
          if($post){
                if($post['coordenadas']){
           $coord = explode(",",$post['coordenadas']);
        
            $post['latitude'] = $coord[0];
            $post['longitude'] = $coord[1];
          }
            
             if($post["inicioAlta"]){
      $post["inicioAlta"] =  dataFormata($post["inicioAlta"]);
         } else {
             $post["inicioAlta"] = NULL;  
         }
          
      if($post["fimAlta"]){
      $post["fimAlta"] =  dataFormata($post["fimAlta"]);
         } else {
             $post["fimAlta"] = NULL;  
         }
            
        $post['limpeza'] = str_replace(".", "", $post['limpeza']);
        $post['limpeza'] = str_replace(",", ".", $post['limpeza']);
            
            $post['menorValor'] = str_replace(".", "", $post['menorValor']);
        $post['menorValor'] = str_replace(",", ".", $post['menorValor']);
          
        $post['maiorValor'] = str_replace(".", "", $post['maiorValor']);
        $post['maiorValor'] = str_replace(",", ".", $post['maiorValor']);
          
        $post['menorAlta'] = str_replace(".", "", $post['menorAlta']);
        $post['menorAlta'] = str_replace(",", ".", $post['menorAlta']);
          
         $post['maiorAlta'] = str_replace(".", "", $post['maiorAlta']);
        $post['maiorAlta'] = str_replace(",", ".", $post['maiorAlta']);          
            
        $post['hospedagemBaixa'] = str_replace(".", "", $post['hospedagemBaixa']);
        $post['hospedagemBaixa'] = str_replace(",", ".", $post['hospedagemBaixa']);
          
        $post['hospedagemAlta'] = str_replace(".", "", $post['hospedagemAlta']);
        $post['hospedagemAlta'] = str_replace(",", ".", $post['hospedagemAlta']);
        
        
            $img = $request->getFile("arquivo");
             
               if ($img) {
                   echo View('templates/tinypng');
                           
           if ($img->isValid() && !$img->hasMoved()) {
              $newName = date('Y-m-d') . $img->getRandomName();
              $post["arquivo"] = $newName;
            $img->move(PATHHOME . '/uploads/produto/'.$data['anuncio']->id.'/', $newName);
          }           
      }
        
            $post['id'] = $data['anuncio']->id;
            $data["salvou"] = $produtoModel->save($post);            
          }
          
           if($data["anuncio"]->inicioAlta){
            $data["anuncio"]->inicioAlta = formataData($data["anuncio"]->inicioAlta);
            }
          
           if($data["anuncio"]->fimAlta){
            $data["anuncio"]->fimAlta = formataData($data["anuncio"]->fimAlta);
            }
          
          break;
        case "login":
          
          $page = 'login-anunciante';
          $header = "header2";
        $footer = "footer2";
                   
          unset($_SESSION["anuncio"]);
          unset($_SESSION["anunciante"]);
          
            if (isset($post["email"])) {
              if (!$post["email"]) {
                $data["erroLogin"] = "Preencha o e-mail";
              } else if (!$post["senha"]) {
                $data["erroLogin"] = "Preencha a senha";
              } else {
                
                $this->where("email",$post["email"]);
                $this->where("senha",sha1($post["senha"]));
                $result = $this->find()[0];                 
      
                if (!$result) {
                  $data["erroLogin"] = "E-mail/usu&aacute;rio e/ou senha inv&aacute;lidos";
                } else {
                  $this->session->set('anunciante', $result);                    
                  session_write_close();
                  ?>
  <meta http-equiv="refresh" content="0;URL='<?=PATHSITE?>area-do-anunciante/inicio/'" />         
<?
                }
              }
            }
        unset($_POST);                   
          break;
      }
    if($header){
      echo view("templates/{$header}", $data);
    }
    echo view('pages/' . $page, $data);
    if($footer){
    echo view("templates/{$footer}", $data);
    }
  }
   
}
