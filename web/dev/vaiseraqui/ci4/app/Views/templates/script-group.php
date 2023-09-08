<?
$links = [
   "fancybox" => "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js",
   "swiper" => "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js",
   "sticksy" => "https://cdn.jsdelivr.net/npm/sticksy/dist/sticksy.min.js",
   "jquery" => "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js",
   "jquery_ui" => "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js",
];

foreach ($cdn_list as $cdn) {
   if (array_key_exists($cdn, $links)) {
      echo '<script src="' . $links[$cdn] . '"></script>';
   }
}
?>

<?php
$files = [
   "card-like" => [
      "src" => PATHSITE . "/scripts/card-like.js",
      "type" => null,
   ],
   "controller-agenda" => [
      "src" => PATHSITE . "/scripts/controller-card.js",
      "type" => "module",
   ],
   "controller-blog" => [
      "src" => PATHSITE . "/scripts/controller-blog.js",
      "type" => "module",
   ],
   "controller-card" => [
      "src" => PATHSITE . "/scripts/controller-card.js",
      "type" => "module",
   ],
   "controller-imoveis" => [
      "src" => PATHSITE . "/scripts/controller-imoveis.js",
      "type" => "module",
   ],
   "controller-page-internal" => [
      "src" => PATHSITE . "/scripts/controller-page-internal.js",
      "type" => "module",
   ],
   "controller-page-internal-3" => [
      "src" => PATHSITE . "/scripts/controller-page-internal-3.js",
      "type" => "module",
   ],
   "controler-presentation" => [
      "src" => PATHSITE . "/scripts/controller-presentation.js",
      "type" => "module",
   ],
   "faq-dropdown" => [
      "src" => PATHSITE . "/scripts/faq-dropdown.js",
      "type" => null,
   ],
   "fs-lightbox" => [
      "src" => PATHSITE . "/scripts/fslightbox.js",
      "type" => null,
   ],
   "mask-date" => [
      "src" => PATHSITE . "assets/scripts/mask-date.js",
      "type" => null,
   ],
   "mask-telefone" => [
      "src" => PATHSITE . "assets/scripts/mask-telefone.js",
      "type" => null,
   ],
   "menu-tabs" => [
      "src" => PATHSITE . "assets/scripts/menu-tabs.js",
      "type" => null,
   ],
   "modal-filter" => [
      "src" => PATHSITE . "/scripts/modal-filter.js",
      "type" => null,
   ],
   "modal-select-order" => [
      "src" => PATHSITE . "/scripts/modal-select-order.js",
      "type" => null,
   ],
];

foreach ($script_list as $script) {
   if (array_key_exists($script, $files)) {
      $scriptInfo = $files[$script]; ?>

      <script src="<?= $scriptInfo["src"] ?>" <?= $scriptInfo["type"] ? "type='{$scriptInfo["type"]}'" : "" ?>></script>
   <? }
} ?>