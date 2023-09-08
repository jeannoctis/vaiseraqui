<?
$links = [
   "fancybox" => "https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css",
   "jquery_ui" => "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css",
   "swiper" => "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css",
];

foreach ($styles_list as $style) {
   if (array_key_exists($style, $links)) {
      echo '<link rel="stylesheet" href="' . $links[$style] . '" />';
   }
}