<?php

if (!function_exists('arruma_url')) {

    function arruma_url($str)
    {
        return strtolower(url_title(convert_accented_characters($str)));
    }
}
