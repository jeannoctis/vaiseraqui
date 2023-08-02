<?
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify/Exception.php");
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify/ResultMeta.php");
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify/Result.php");
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify/Source.php");
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify/Client.php");
require_once(APPPATH . "ThirdParty/tinify/lib/Tinify.php");

  $tinyModel = model('App\Models\ConfigModel', false);
  $tinyModel->select("tinymce");
  
\Tinify\setKey("kS470dhSQt3xRVY5S2JpPBnZCyhjSt1h");

?>