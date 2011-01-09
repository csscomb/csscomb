<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Пересортировка</title>
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


$css = '
    position:absolute;
    top:0;
    left: 0;
    background:red;  /* comment */
    padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;
    background-image:
        url(/i/one.png),
        url(/i/two.png),
        url(/i/three.png);
    overflow:hidden;
    /*width:100px*/;
    height:100px;
    _margin-top:3px;
    color:#345673;
    font-size:1em/1.333 Georgia,"Times New Roman",serif;';

$c = new csscomb();
$c->parse_properties($css);
?>
</body>
</html>