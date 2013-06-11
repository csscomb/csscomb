<?
//header("Content-Type: text/html; charset=utf-8");
require_once 'lang.php';
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$title[$lang]?$title[$lang]:'CSScomb'?></title>
    <!--[if lte IE 8]><script type="text/javascript" src="/static/js/html5.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/static/_css/csscomb.css">
    <script src="/static/_js/csscomb.js"></script>
    <link rel="stylesheet" title="Default" href="/static/highlight/styles/default.css">
</head>
<body class="<?=$index?'index':$module?>">
<div class="page-wrap">
    <header class="page-header">
        <div class="logo"><?=$index?'<b>CSScomb</b>':'<a href="/">CSScomb</a>'?></div>
        <nav role="navigation">
            <ul>
                <li><?=strpos($_SERVER['PHP_SELF'], '/about/')===0?'<b>'.$nav['about'].'</b>':'<a href="/about/">'.$nav['about'].'</a>'?></li>
                <li><?=strpos($_SERVER['PHP_SELF'], '/online/')===0?'<b>'.$nav['online'].'</b>':'<a href="/online/">'.$nav['online'].'</a>'?></li>
                <li><?=strpos($_SERVER['PHP_SELF'], '/tests/')===0?'<b>'.$nav['tests'].'</b>':'<a href="/tests/">'.$nav['tests'].'</a>'?></li>
                <li><?=strpos($_SERVER['PHP_SELF'], '/downloads/')===0?'<b>'.$nav['downloads'].'</b>':'<a href="http://github.com/miripiruni/CSScomb/downloads/">'.$nav['downloads'].'</a>'?></li>
            </ul>
        </nav>
    </header>
    <hgroup>
        <h1><?=($h1[$lang])?$h1[$lang]:'CSScomb'?></h1>
        <div class="clear"></div>
    </hgroup>

    <div class="page">
