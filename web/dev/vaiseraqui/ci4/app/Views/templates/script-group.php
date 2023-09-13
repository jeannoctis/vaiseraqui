<?php
$files = [
   "fancybox" => [
      "src" => PATHSITE . "assets/scripts/fancybox/fancybox.umd.js",
      "type" => null,
   ],
   "swiper" => [
      "src" => PATHSITE . "assets/scripts/swiper/swiper-bundle.min.js",
      "type" => null,
   ],
   "sticksy" => [
      "src" => PATHSITE . "assets/scripts/sticksy/sticksy.min.js",
      "type" => null,
   ],
   "jquery_ui" => [
      "src" => PATHSITE . "assets/scripts/jquery_ui/jquery_ui.min.js",
      "type" => null,
   ],
   "card-like" => [
      "src" => PATHSITE . "assets/scripts/card-like.js",
      "type" => null,
   ],
   "controller-agenda" => [
      "src" => PATHSITE . "assets/scripts/controller-agenda.js",
      "type" => "module",
   ],
   "controller-blog" => [
      "src" => PATHSITE . "assets/scripts/controller-blog.js",
      "type" => "module",
   ],
   "controller-card" => [
      "src" => PATHSITE . "assets/scripts/controller-card.js",
      "type" => "module",
   ],
   "controller-imoveis" => [
      "src" => PATHSITE . "assets/scripts/controller-imoveis.js",
      "type" => "module",
   ],
   "controller-page-internal" => [
      "src" => PATHSITE . "assets/scripts/controller-page-internal.js",
      "type" => "module",
   ],
   "controller-page-internal-3" => [
      "src" => PATHSITE . "assets/scripts/controller-page-internal-3.js",
      "type" => "module",
   ],
   "controller-presentation" => [
      "src" => PATHSITE . "assets/scripts/controller-presentation.js",
      "type" => "module",
   ],
   "faq-dropdown" => [
      "src" => PATHSITE . "assets/scripts/faq-dropdown.js",
      "type" => null,
   ],
   "fs-lightbox" => [
      "src" => PATHSITE . "assets/scripts/fslightbox.js",
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
      "src" => PATHSITE . "assets/scripts/modal-filter.js",
      "type" => null,
   ],
   "modal-select-order" => [
      "src" => PATHSITE . "assets/scripts/modal-select-order.js",
      "type" => null,
   ],
];

foreach ($script_list as $script) {
   if (array_key_exists($script, $files)) {
      $scriptInfo = $files[$script]; ?>

      <script src="<?= $scriptInfo["src"] ?>" <?= $scriptInfo["type"] ? "type='{$scriptInfo["type"]}'" : "" ?>></script>
   <? }
} ?>