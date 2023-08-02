<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2019 British Columbia Institute of Technology
 * Copyright (c) 2019-2020 CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 */
/**
 * CodeIgniter Encrypt Helpers
 *
 * @package CodeIgniter
 */
if (!function_exists('base64_url_encode')) {

    function base64_url_encode($input) {
        return strtr(base64_encode($input), '+/=', '-_,');
    }

}

if (!function_exists('base64_url_decode')) {

    function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_,', '+/='));
    }

}

if (!function_exists('randomizar')) {

    function randomizar($iv_len) {
        $iv = '';
        while ($iv_len-- > 0) {
            $iv .= chr($iv_len & 0xff);
        }
        return $iv;
    }

}


if (!function_exists('encode')) {

    function encode($texto, $senha = "1j34ia4", $iv_len = 16) {
        $texto .= "\x13";
        $n = strlen($texto);
        if ($n % 16)
            $texto .= str_repeat("\0", 16 - ($n % 16));
        $i = 0;
        $Enc_Texto = randomizar($iv_len);
        $iv = substr($senha ^ $Enc_Texto, 0, 512);
        while ($i < $n) {
            $Bloco = substr($texto, $i, 16) ^ pack('H*', md5($iv));
            $Enc_Texto .= $Bloco;
            $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
            $i += 16;
        }
        $x = base64_url_encode($Enc_Texto);
        return $x;
    }

}

if (!function_exists('decode')) {

    function decode($Enc_Texto, $senha = "1j34ia4", $iv_len = 16) {
        $Enc_Texto = base64_url_decode($Enc_Texto);
        $n = strlen($Enc_Texto);
        $i = $iv_len;
        $texto = '';
        $iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
        while ($i < $n) {
            $Bloco = substr($Enc_Texto, $i, 16);
            $texto .= $Bloco ^ pack('H*', md5($iv));
            $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
            $i += 16;
        }
        return preg_replace('/\\x13\\x00*$/', '', $texto);
    }

}