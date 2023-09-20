<?php

namespace App\Controllers;

class Utils extends BaseController
{

   public function __construct()
   {
      $this->db = \Config\Database::connect();
   }

   public function ordena()
   {

      $listas = $_POST['lista'];
      $tabela = $_POST['tabela'];
      $nomeModel = $_POST["nomeModel"];

      $model = model('App\Models\\' . $nomeModel, false);

      if ($listas) {
         $contador = 1;
         foreach ($listas as $list) {
            $data = array(
               'ordem' => $contador
            );

            // $query = $db->query("UPDATE {$tabela} SET ordem = {$contador} WHERE id =  {$list}  ");
            $data["id"] = $list;

            $model->save($data);

            $contador++;
         }
      }
   }

   public function ordena2()
   {

      $listas = $_POST['lista'];
      $tabela = $_POST['tabela'];
      $nomeModel = $_POST["nomeModel"];

      $model = model('App\Models\\' . $nomeModel, false);

      if ($listas) {
         $contador = 1;
         foreach ($listas as $list) {
            $data = array(
               'ordem2' => $contador
            );

            // $query = $db->query("UPDATE {$tabela} SET ordem = {$contador} WHERE id =  {$list}  ");
            $data["id"] = $list;

            $model->save($data);

            $contador++;
         }
      }
   }

   public function carregaMapa()
   {
      $nomeModel = "ConfigModel";
      $model = model('App\Models\\' . $nomeModel, false);
      $model->select("mapa");
      $configs = $model->find(1);

      ob_start();
      echo $configs->mapa;
      echo ob_get_clean();
   }

   function contadorWhatsapp()
   {
      $request = \Config\Services::request();
      $post = $request->getPost();


      if ($post['whatsappFK']) {
         $dados["whatsappFK"] = $post['whatsappFK'];
      }
      $dados["ip"] = $_SERVER["REMOTE_ADDR"];
      $my_date = date("Y-m-d H:i:s");
      $cliqueWhatsappModel = model('App\Models\CliqueWhatsappModel', false);
      $salvar = $cliqueWhatsappModel->insert($dados);
   }

   function contadorBanner()
   {
      $request = \Config\Services::request();
      $post = $request->getPost();
      if (!is_numeric($post["bannerFK"])) {
         ///  exit();
      }
      $id = $post["bannerFK"];
      if ($id) {
         $dados["bannerFK"] = $id;
      }
      $dados["ip"] = $_SERVER["REMOTE_ADDR"];
      $my_date = date("Y-m-d H:i:s");
      $cliqueBannerModel = model('App\Models\CliqueBannerModel', false);

      $salvar = $cliqueBannerModel->insert($dados);
   }

   public function mudaFormato()
   {

      $clienteModel = model("App\Models\ProdutoModel", false);
      $clienteModel->where("arquivo5 IS NOT NULL OR arquivo5 != ''");
      $clientes = $clienteModel->findAll();

      $tabela = "produto";

      if ($clientes) {
         foreach ($clientes as $cli) {
            $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/produto/" . $cli->arquivo5));
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);


            imagewebp($img, PATHHOME . "uploads/{$tabela}/{$cli->arquivo5}.webp", 100);
            imagedestroy($img);
         }
      }
   }

   public function visitaPagina()
   {
      $request = \Config\Services::request();
      $post = $request->getPost();
      $this->session = \Config\Services::session();

      if (!$post['pagina']) {
         $post['pagina'] = '/index.php';
      }

      $acessoPaginaModel = model("App\Models\AcessoPaginaModel", false);

      if (!$_SESSION['acessouPagina']) {
         $acessoSiteModel = model("App\Models\AcessoSiteModel", false);
         $save['ip'] = $_SERVER['REMOTE_ADDR'];
         $id = $acessoSiteModel->insert($save);
         $_SESSION['acessouPagina'] = $id;
      }

      if (!$_SESSION['novaPagina'][$post['pagina']]) {
         $pagina['pagina'] = $post['pagina'];
         $pagina['acessoFK'] = $_SESSION['acessouPagina'];
         $_SESSION['novaPagina'][$post['pagina']] = $post['pagina'];
         $acessoPaginaModel->insert($pagina);
      }
   }

   public function trocarIdioma()
   {
      $request = \Config\Services::request();
      $post = $request->getPost();
      $this->session = \Config\Services::session();

      $this->session->set("idioma", $post['id']);
   }

   public function instagram()
   {
      $tokenURL = "https://www.uaau.digital/assets/token.txt";
      $token = \file_get_contents($tokenURL);

      $url = 'https://graph.instagram.com/me/media?access_token=' . $token . '&fields=media_url,media_type,caption,permalink';

      $return = file_get_contents($url);
      $return = \json_decode($return);

      \ob_start();

      if ($return) {
         $count = 0; ?>
         <div class="swiper custom swiper-social">
            <div class="swiper-wrapper">

               <? foreach ($return->data as $post) {

                  if ($count < 9 && ($post->media_type == "IMAGE" || $post->media_type == "CAROUSEL_ALBUM")) { ?>

                     <div class="swiper-slide">
                        <a href="<?= $post->permalink ?>" target="_blank" class="">
                           <picture>
                              <img src="<?= $post->media_url ?>" alt="<?= $post->caption ?>">
                           </picture>
                        </a>
                     </div>

               <? $count++;
                  }
               } ?>

            </div>
            <div class="navigation">
               <div class="buttons">
                  <button class="prev">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                     </svg>
                  </button>
                  <button class="has-more next">
                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                     </svg>
                  </button>
               </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
         </div>
      <? } ?>

      <script>
         const sizeWindow = window.innerWidth > 780
         if (sizeWindow) {
            new CustomSwiper('swiper-social', 3, 30)
         } else {
            new CustomSwiper('swiper-social', 1, 30)
         }
      </script>

<?
      $retorno['html'] = \ob_get_clean();
      echo \json_encode($retorno);
   }

   public function upload()
   {

      /***************************************************
       * Only these origins are allowed to upload images *
       ***************************************************/
      $accepted_origins = array("http://localhost", "http://192.168.1.1", "uaau.digital", "www.uaau.digital", "www.julianeguzzoni.com.br", "julianeguzzoni.com.br");


      /*********************************************
       * Change this line to set the upload folder *
       *********************************************/

      $ano = date("Y");
      $mes = date("m");

      $folder = rand(1, 8);


      $imageFolder = "uploads/imagens/{$ano}/{$mes}/{$folder}/";
      $imageFolder = "uploads/imagens/{$ano}/{$mes}/{$folder}/";

      if (!is_dir(PATHHOME . $imageFolder)) {
         mkdir($imageFolder, 0777, true);
      }

      //  $imageFolder = "uploads/imagens/";


      if (isset($_SERVER['SERVER_NAME'])) {
         // same-origin requests won't set an origin. If the origin is set, it must be valid.
         if (in_array($_SERVER['SERVER_NAME'], $accepted_origins)) {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
         } else {
            header("HTTP/1.1 403 Origin Denied");
            return;
         }
      }

      // Don't attempt to process the upload on an OPTIONS request
      if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
         header("Access-Control-Allow-Methods: POST, OPTIONS");
         return;
      }

      reset($_FILES);
      $temp = current($_FILES);
      if (is_uploaded_file($temp['tmp_name'])) {



         /*
      If your script needs to receive cookies, set images_upload_credentials : true in
      the configuration and enable the following two headers.
    */
         // header('Access-Control-Allow-Credentials: true');
         // header('P3P: CP="There is no P3P policy."');


         // Sanitize input
         if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
            header("HTTP/1.1 400 Invalid file name.");
            echo json_encode(array('error' => "Entrada inválida"));
            return;
         }

         // Verify extension
         if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png", "jpeg", "svg"))) {
            header("HTTP/1.1 400 Invalid extension.");
            echo json_encode(array('error' => "Extensões aceitas: gif,jpg,png,jpeg,svg "));
            return;
         }


         $path_parts = pathinfo($temp['name']);

         $path_parts['basename'] = str_replace(".", "", $path_parts['basename']);
         $path_parts['basename'] = str_replace(" ", "", $path_parts['basename']);
         $path_parts['basename'] = str_replace("%", "", $path_parts['basename']);

         $uuid =  md5(uniqid(rand(), true));

         // Accept upload if there was no origin, or if it is an accepted origin
         $filetowrite = $imageFolder . $path_parts['basename'] . date("d-h-i-s") . "." . $path_parts['extension'];

         $filetowrite = $imageFolder . $uuid . date("d-h-i-s") . "." . $path_parts['extension'];

         move_uploaded_file($temp['tmp_name'], $filetowrite);

         // Determine the base URL
         $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
         //  $baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/";
         $baseurl = PATHSITE;
         // Respond to the successful upload with JSON.
         // Use a location key to specify the path to the saved image resource.
         // { location : '/your/uploaded/image/file'}
         echo json_encode(array('location' => $baseurl . $filetowrite));
      } else {
         // Notify editor that the upload failed
         header("HTTP/1.1 500 Server Error");
      }
   }

   public function abreComprovantes()
   {
      $model = model('App\Models\\TextoModel', false);
      $resultado = $model->find(33);

      $midnight = strtotime('00:00');
      $epochseconds = gettimeofday(true);
      $timeofdayseconds = $epochseconds - $midnight;
      $timepercent = $timeofdayseconds / (60 * 60 * 24) * 100;

      $total = $resultado->extra2 - $resultado->extra1;

      $porsegundo = (int) $total / 86400;

      $total =  (int) $resultado->extra1 + ($timepercent / 100 * $total);

      $retorno['porsegundo'] = (int) $porsegundo;
      $retorno['total'] = (int) $total;

      echo json_encode($retorno);
   }

   public function deleteCard()
   {
      \helper("encrypt");
      $request = \request();
      $post = $request->getPost();

      $this->clPagamentoModel = \model("App\Models\ClPagamentoModel", false);

      if ($post) {
         $post['id'] = \decode($post['id']);
         $delCard = $this->clPagamentoModel->delete($post['id']);
         if($delCard) {
            $response['sucesso'] = "Método de pagamento excluido!";
            
         } else {
            $response['erro'] = $this->clPagamentoModel->errors()[0];
         }
      }
      echo \json_encode($response);
   }

   public function startWpp(){
      $post = \request()->getPost();

      if($post) {
         $this->contatoModel = \model("App\Models\ContatoModel", false);
         $response['success'] = $this->contatoModel->save($post);
      }

      return \json_encode($response);
   }
}
