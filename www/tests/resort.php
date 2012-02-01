<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cортировка</title>
    <script src="http://yandex.st/highlightjs/5.16/highlight.min.js"></script>
    <link rel="stylesheet" href="http://yandex.st/highlightjs/5.16/styles/default.min.css">
    <script>
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad();
    </script>
</head>
<body>
<?
require_once '../lib/csscomb.php';

$css = '.test{
    test-align:right;
    
    padding:0;
    
    position:absolute;
    
    width:100px;

    font-size:11px;

    opacity:0.5;

    }';

//$css = '.test{
    //content: \'&#160\';
//}';
$c = new csscomb($css, true, 'yandex');
?>
</body>
</html>
