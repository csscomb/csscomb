<?

$lang = 'ru';

if(isset($_COOKIE['lang']) AND !isset($_GET['lang'])){
	if($_COOKIE['lang'] == 'en'){
        $lang = 'en';
    }
    else if($_COOKIE['lang'] == 'ru'){
        $lang = 'ru';
    }
}
else{
    if(isset($_GET['lang']) AND ($_GET['lang']=='ru' or $_GET['lang']=='en')){
        $lang = $_GET['lang'];

        setcookie('lang', $lang, time()+60*60*24*30*12*3, '/', $_SERVER['HTTP_HOST'], false, true);

        if (!headers_sent()) header('Location: '.str_replace('index.php','',$_SERVER['PHP_SELF']));
        echo "<script>document.location.href='".str_replace('index.php','',$_SERVER['PHP_SELF'])."';</script>\n";
        echo "<noscript><a href='".str_replace('index.php','',$_SERVER['PHP_SELF'])."'>click to view the page</a></noscript>\n";
        exit();
    }
}


require_once $_SERVER['DOCUMENT_ROOT'].'/static/lang/'.$lang.'.php';