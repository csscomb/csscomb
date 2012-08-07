<?
$lang = 'en';

if($_SERVER["HTTP_HOST"] == 'csscomb.ru') {
    $lang = 'ru';
}

require_once $_SERVER['DOCUMENT_ROOT'].'/static/lang/'.$lang.'.php';
