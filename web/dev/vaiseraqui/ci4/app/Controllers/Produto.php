<?php

namespace App\Controllers;

class Produto extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\ProdutoModel', false);
      $this->produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
      $this->tabela = "produto";

      $get = request()->getGet();
      switch ($get['tipo']) {
         case 1:
            $this->session->set('menuAdmin', '4');
            break;
         case 2:
            $this->session->set('menuAdmin', '11');
            break;
         case 3:
            $this->session->set('menuAdmin', '12');
            break;
         case 4:
            $this->session->set('menuAdmin', '13');
            break;
         case 5:
            $this->session->set('menuAdmin', '14');
            break;
         case 6:
            $this->session->set('menuAdmin', '15');
            break;
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
      
      $get = request()->getGet();

      $categoriasDoTipo = $this->produtoCategoriaModel
         ->where("tipoFK", $get['tipo'])
         ->findAll();

      $IDsCategorias = \array_column($categoriasDoTipo, 'id');

      $data['lista'] = $this->model
         ->whereIn("categoriaFK", $IDsCategorias)
         ->orderBy("titulo ASC")
         ->findAll();

      $data['title'] = 'Produtos';
      $data['tabela'] = $this->tabela;
      $data["nomeModel"] = "ProdutoModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      $post = request()->getPost();
      $data['get'] = $get = request()->getGet();
      $id = decode($this->request->uri->getSegment(4));
      
      $data['categoriasDoTipo'] = $this->produtoCategoriaModel
         ->where("tipoFK", $get['tipo'])
         ->findAll();

      $this->cidadeModel = \model('App\Models\CidadeModel', false);
      $this->estadoModel = \model('App\Models\EstadoModel', false);

      $data['estados'] = $this->estadoModel
         ->where('EXISTS (SELECT 1 FROM cidade WHERE estado.id = cidade.estadoFK)')
         ->findAll();

      foreach($data['estados'] as $ind => $estado) {
         $this->cidadeModel->resetQuery();
         $this->cidadeModel->where('estadoFK', $estado->id);
         $this->cidadeModel->orderBy('titulo ASC');
         $data['estados'][$ind]->cidades = $this->cidadeModel->findAll();
      }

      $data['title'] = 'Produto';
      $data['tabela'] = 'produto';
      $data['resultado'] = "";

      if ($post) {

         if ($post['apagararquivo']) {
            $post['arquivo'] = NULL;
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
   
    public function carregaCalendarios() {
      
     helper("date");
     helper("encrypt");
    $request = \Config\Services::request();
  
      $produtoCalendarioModel = model('App\Models\ProdutoCalendarioModel', false);
     
        $post = $request->getPost();        
     
        $cMonth = $post["mes"];
        $cYear = $post["ano"];
        $chacaraFK = decode($post["id"]);
        $encodeChacara = encode($chacaraFK);

        $date = date('Y-m', strtotime('-6 month', strtotime("{$cYear}-{$cMonth}")));
        $date = explode("-", $date);

        $retorno["mes1"] = $date[1];
        $retorno["ano1"] = $date[0];

        ob_start();
        for ($iterator = 1; $iterator <= 6; $iterator++) {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="text-center topo"><?= mes($cMonth) ?> de <?= $cYear ?> </div>
                <table class='table'>
                    <tr>
                        <td align="center">
                            <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                <tr class='fonteBlack'>
                                    <td align="center" ><strong>D</strong></td>
                                    <td align="center" ><strong>S</strong></td>
                                    <td align="center" ><strong>T</strong></td>
                                    <td align="center" ><strong>Q</strong></td>
                                    <td align="center" ><strong>Q</strong></td>
                                    <td align="center" ><strong>S</strong></td>
                                    <td align="center" ><strong>S</strong></td>
                                </tr>
                                <?php
                                $timestamp = mktime(0, 0, 0, $cMonth, 1, $cYear);
                                $maxday = date("t", $timestamp);
                                $thismonth = getdate($timestamp);
                                $startday = $thismonth['wday'];

          
                              $produtoCalendarioModel->where("produtoFK", $chacaraFK);
                              $produtoCalendarioModel->where("( date BETWEEN '{$cYear}-{$cMonth}-01' AND '{$cYear}-{$cMonth}-31' ) ");
          
                                $diasOcupados = $produtoCalendarioModel->findAll();
    
          
                                $arrayOcupados = array();
                                if ($diasOcupados) {
                                    foreach ($diasOcupados as $diaOcup) {
                                        $arrayOcupados[] = $diaOcup->date;
                                    }
                                }

                                for ($i = 0; $i < ($maxday + $startday); $i++) {
                                    $diaSemana = ($i % 7);
                                    if ($diaSemana == 0) {
                                        echo "<tr>";
                                    }
                                    if ($i < $startday) {
                                        echo "<td></td>";
                                    } else {
                                        $resultado = ($i - $startday + 1);
                                        if (($i - $startday + 1) < 10) {
                                            $resultado = "0" . ($i - $startday + 1);
                                        }

                                        if ($mesAtual) {
                                            if ($resultado == date('d')) {
                                                $class = "";
                                            } else {
                                                $class = "";
                                            }
                                        }

                                        if (in_array($cYear . "-" . $cMonth . "-" . $resultado, $arrayOcupados)) {
                                            $class = " ocupado ";
                                            $disabled = "";
                                        } else {
                                            $onclick = "";
                                            $disabled = " ";
                                            $class = "";
                                        }
                                      
                                        $onclick = "alteraDia(\"{$cYear}\",\"{$cMonth}\",\"{$resultado}\",\"{$encodeChacara}\");";

                                        $mes = mes($cMonth);

                                        echo "<td align='center' valign='middle'><div id='dia-{$cYear}-{$cMonth}-{$resultado}' onclick='{$onclick}' class='dia {$disabled} {$class} fonteRegular'>" . $resultado . "</div></td>";
                                    }
                                    if (($i % 7) == 6) {
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <?
            $date = date('Y-m', strtotime('+1 month', strtotime("{$cYear}-{$cMonth}")));
            $date = explode("-", $date);
            $cYear = $date[0];
            $cMonth = $date[1];
        }
        $retorno["calendario"] = ob_get_clean();

        $retorno["mes2"] = $cMonth;
        $retorno["ano2"] = $cYear;

        //  echo ob_get_clean();
        echo json_encode($retorno);
    }
    
     public function whats(){
    helper('date');        
    $request = \Config\Services::request();
        $post = $request->getPost();
    
    $dtIni = dataFormata($post['dtIni']);
    $dtFim = dataFormata($post['dtFim']);
      
    $produtoWhatsModel = model('App\Models\ProdutoWhatsModel', false);
    $produtoWhatsModel->select("count(id) as qtd");
    $produtoWhatsModel->where("produtoFK", $post['id']);
    $produtoWhatsModel->where("dtCriacao BETWEEN  '{$dtIni} 00:00:00' AND '{$dtFim} 23:59:59'  ");
   $visita =  $produtoWhatsModel->find()[0];
    
    $retorno['whats'] = $visita->qtd;
  //    $retorno['visitas'] = $produtoVisitaModel->getLastQuery()->getQuery();
     echo json_encode($retorno);
  }
  
     public function fone(){
    helper('date');        
    $request = \Config\Services::request();
        $post = $request->getPost();
    
    $dtIni = dataFormata($post['dtIni']);
    $dtFim = dataFormata($post['dtFim']);
      
    $produtoWhatsModel = model('App\Models\ProdutoFoneModel', false);
    $produtoWhatsModel->select("count(id) as qtd");
    $produtoWhatsModel->where("produtoFK", $post['id']);
    $produtoWhatsModel->where("dtCriacao BETWEEN  '{$dtIni} 00:00:00' AND '{$dtFim} 23:59:59'  ");
   $visita =  $produtoWhatsModel->find()[0];
    
    $retorno['fone'] = $visita->qtd;
  //    $retorno['visitas'] = $produtoVisitaModel->getLastQuery()->getQuery();
     echo json_encode($retorno);
  }
   
}
