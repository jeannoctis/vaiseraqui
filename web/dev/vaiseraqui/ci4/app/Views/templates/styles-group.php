<?

$file = [
   "fancybox" => PATHSITE . "assets/scripts/fancybox/fancybox.css",
   "jquery_ui" => PATHSITE . "assets/scripts/jquery_ui/jquery_ui-bundle.min.css",
   "swiper" => PATHSITE . "assets/scripts/swiper/swiper-bundle.min.css",
];

foreach ($style_list as $style) {
   if (array_key_exists($style, $file)) { ?>
      <link rel="stylesheet" href="<?= $file[$style] ?>"> </link>
   <? }
}
