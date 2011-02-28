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


$css = "h1{
	background: #faf0e6;
	/*border: 2px dashed #800000;*/
	color: #a0522d;
	padding: 7px;
	}

	.test2 {/* тестовый комментарий */width:100px;height:100px;position:relative;}";

$c = new csscomb($css);
?>
</body>
</html>