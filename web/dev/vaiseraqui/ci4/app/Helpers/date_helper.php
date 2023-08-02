<?php

if (!function_exists('dateFormat')) {

    function dateFormat($format = 'd-m-Y', $givenDate = null) {
        return date($format, strtotime($givenDate));
    }

}

if (!function_exists('mes')) {

    function mes($mes) {
        switch ($mes) { 
            case "01":
                return "Janeiro";
                break;
            case "02":
                return "Fevereiro";
                break;
            case "03":
                return "Março";
                break;
            case "04":
                return "Abril";
                break;
            case "05":
                return "Maio";
                break;
            case "06":
                return "Junho";
                break;
            case "07":
                return "Julho";
                break;
            case "08":
                return "Agosto";
                break;
            case "09":
                return "Setembro";
                break;
            case "10":
                return "Outubro";
                break;
            case "11":
                return "Novembro";
                break;
            case "12":
                return "Dezembro";
                break;
        }
    }

}

if (!function_exists('mesCurto')) {

    function mesCurto($mes) {
        switch ($mes) {
            case "01":
                return "Jan";
                break;
            case "02":
                return "Fev";
                break;
            case "03":
                return "Mar";
                break;
            case "04":
                return "Abr";
                break;
            case "05":
                return "Mai";
                break;
            case "06":
                return "Jun";
                break;
            case "07":
                return "Jul";
                break;
            case "08":
                return "Ago";
                break;
            case "09":
                return "Set";
                break;
            case "10":
                return "Out";
                break;
            case "11":
                return "Nov";
                break;
            case "12":
                return "Dez";
                break;
        }
    }

}

if (!function_exists('formataData')) {

    function formataData($data) {
        $data = explode("-", $data);
        $data = "$data[2]/$data[1]/$data[0]";
        return $data;
    }

} 

if (!function_exists('dataFormata')) {

    function dataFormata($data) {
        $data = explode("/", $data);
        $data = "$data[2]-$data[1]-$data[0]";
        return $data;
    }

}

if (!function_exists('formataDataHora')) {

    function formataDataHora($data) {
        $data = explode(" ", $data);
        $hora = $data[1];
        $data = $data[0];
        $data = formataData($data);
        return $data . " " . $hora;
    }

}
