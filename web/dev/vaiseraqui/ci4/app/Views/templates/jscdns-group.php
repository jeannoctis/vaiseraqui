<?
$links = [
   "fancybox" => "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js",
   "swiper" => "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js",
   "sticksy" => "https://cdn.jsdelivr.net/npm/sticksy/dist/sticksy.min.js",
   "jquery" => "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js",
   "jquery_ui" => "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js",
];

foreach ($cdn_group as $cdn) {
   if (array_key_exists($cdn, $links)) {
      echo '<script src="' . $links[$cdn] . '"></script>';
   }
}
?>

<!-- script -->

<? foreach ($script_group as $script) {
   if (array_key_exists($script, $files)) {
      $scriptInfo = $files[$script];

      echo '<script src="' . $scriptInfo["src"] . '"';
      if ($scriptInfo["type"]) {
         echo ' type="' . $scriptInfo["type"] . '"';
      }
      echo '></script>';
   }
}