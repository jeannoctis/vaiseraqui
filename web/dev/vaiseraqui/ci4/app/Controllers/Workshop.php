<?php

namespace App\Controllers;

class Workshop extends BaseController
{
   public function __construct()
   {
      $this->db = \Config\Database::connect();
      $this->session = \Config\Services::session($config);
      helper(['encrypt', 'text']);
      $this->model = model('App\Models\WorkshopModel', false);
      $this->tabela = "workshop";
      $this->session->set('menuAdmin', '1');
      $this->workshopFotoModel = \model('App\Models\WorkshopFotoModel', false);
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

      $this->model->orderBy("ordem ASC");
      $data['lista'] = $this->model->findAll();

      $data['title'] = 'Workshops / Cursos';
      $data['tabela'] = "workshop";
      $data["nomeModel"] = "WorkshopModel";

      echo view('templates/admin-header', $data);
      echo view("{$data["tabela"]}/index", $data);
      echo view('templates/admin-footer');
   }

   public function form()
   {
      helper('form');

      $request = request();
      $post = $request->getPost();
      $id = decode($this->request->uri->getSegment(4));

      $data['title'] = 'Workshop / curso';
      $data['tabela'] = 'workshop';
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
            $data['sworkshopu'] = $this->model->save($post);
         } else {
            $data['sworkshopu'] =  $this->model->insert($post);
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

   public function fotos()
   {
      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->workshopFotoModel->delete(['id' => $exc]);
         }
      } else if ($_POST['naoExc']) {
         $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
      }

      echo $idWorkshop = decode($this->request->uri->getSegment(4));

      $this->workshopFotoModel->where('workshopFK', $idWorkshop);
      $this->workshopFotoModel->orderBy("ordem ASC, id DESC");
      $data['fotos'] = $this->workshopFotoModel->findAll();
      $data['workshop'] = $this->model->find($idWorkshop);

      $data['idWorkshop'] = $idWorkshop;

      $data['title'] = 'Fotos';
      $data['tabela'] = "workshop_foto";
      $data['tabelaFK'] = $this->tabela;
      $data["nomeModel"] = "WorkshopFotoModel";

      echo view('templates/admin-header', $data);
      echo view("{$data['tabelaFK']}/fotos", $data);
      echo view('templates/admin-footer');
   }

   public function foto()
   {
      if (isset($_POST['excluir'])) {
         foreach ($_POST['excluir'] as $exc) {
            $data['excluiu'] =  $this->workshopFotoModel->delete(['id' => $exc]);
         }
      }

      $request = \Config\Services::request();
      $post = $request->getPost();

      $idWorkshop = decode($this->request->uri->getSegment(4));
      $idFoto = decode($this->request->uri->getSegment(5));

      $this->workshopFotoModel = \model("App\Models\WorkshopFotoModel", false);

      $data['title'] = 'Foto';
      $data['tabela'] = "workshop_foto";
      $data['tabelaFK'] = $this->tabela;
      $data['tabelaFK2'] = 'fotos';
      $data["nomeModel"] = "WorkshopFotoModel";
      $data['idWorkshop'] = $idWorkshop;
      $data['idFoto'] = $idFoto;

      if ($post) {

         $post['workshopFK'] = $idWorkshop;

         if ($idFoto) {

            $img = $this->request->getFile("arquivo");
            if ($img) {
               if ($img->isValid() && !$img->hasMoved()) {
                  $newName = date('Y-m-d') . $img->getRandomName();
                  $post["arquivo"] = $newName;
                  $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                  try {
                     echo View('templates/tinypng');

                     $upload_path = "uploads/{$data['tabela']}/";
                     $upload_path_root = PATHHOME . $upload_path;

                     $file_name = $img->getName();
                     $file_path = $upload_path_root . "/" . $file_name;

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

            $post["id"] = $idFoto;
            $data["salvou"] = $this->workshopFotoModel->save($post);
         } else {

            if ($this->request->getFileMultiple('arquivo')) {

               echo View('templates/tinypng');

               foreach ($this->request->getFileMultiple('arquivo') as $img) {

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

                  $data["salvou"] = $this->workshopFotoModel->insert($post);
               }
            }
         }

         if ($idFoto) {
            $post['id'] = $idFoto;
         }
         $data["erros"] = $this->workshopFotoModel->errors();
      }

      if ($idFoto) {
         $data['resultado'] = $this->workshopFotoModel->find($idFoto);
      }

      $data['workshop'] = $this->model->find($idWorkshop);
      // $data['fotos'] = $this->workshopFotoModel->find($idFotos);

      echo view('templates/admin-header', $data);
      echo view("{$data['tabelaFK']}/foto", $data);
      echo view('templates/admin-footer');
   }

   public function abrirModalWorkshop()
   {
      $request = request();
      $post = $request->getPost();

      $this->workshopModel = \model('App\Models\WorkshopModel', false);
      $this->workshopModel->orderBy("ordem ASC, id DESC");

      $workshop = $this->model->find($post['id']);

      $this->workshopFotoModel->where("workshopFK", $workshop->id);
      $this->workshopFotoModel->orderBy("ordem ASC, id DESC");
      $fotos = $this->workshopFotoModel->findAll();

      \ob_start(); ?>

      <div class="body">
         <span class="closeBtn" data-workshopmodal-close>
            <img src="<?=PATHSITE?>assets/images/icon-close.svg" alt="fechar">
         </span>

         <h3><?= $workshop->titulo ?></h3>
         <article><?= $workshop->texto ?></article>

         <? if ($workshop->topicos) { ?>
            <ul>
               <? $topicos = \explode(";", $workshop->topicos);
               foreach ($topicos as $topico) { ?>
                  <li><img src="<?= PATHSITE ?>assets/images/star.svg" alt="estrela"> <?= $topico ?></li>
               <? } ?>
            </ul>
         <? } ?>
         

         <? if ($fotos) { ?>

            <div class="workshop-swiper">

               <div class="swiper-wrapper">
                  <? foreach ($fotos as $foto) { ?>
                     <div class="swiper-slide">
                        <img src="<?= PATHSITE ?>uploads/workshop_foto/<?= $foto->arquivo ?>" alt="">
                     </div>
                  <? } ?>
               </div>

               <div class="swiper-pagination"></div>


               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
            </div>
         <? } ?>

      </div>

      <script>
         document.querySelector("[data-workshopmodal-close]").addEventListener("click", e => {
            body.classList.toggle("noscroll")
            html.classList.toggle("noscroll")
            
            workshopModal.close();
            
         })

         new Swiper('.workshop-swiper', {
            slidesPerView: 1,
            centeredSlides: true,
            
            pagination: {
               el: '.swiper-pagination',
               dynamicBullets: true,
            },
            
            navigation: {
               nextEl: '.swiper-button-next',
               prevEl: '.swiper-button-prev',
            },

         });
      </script>

<? $retorno['html'] = \ob_get_clean();
      echo \json_encode($retorno);
   }
}
