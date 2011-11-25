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

$css = 'div{
    content: "&darr;";
    font-size:13px;
    width:150px;
    color:red;
    background:silver;
    top:0;
    }';
$c = new csscomb($css, true);
?>
</body>
</html>
