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


$css = '<p style="padding-left:0;padding-top:0;margin-right:0;margin-top:0;">бла-бла-бла</p>
<p style="padding-left:1px;padding-top:2px;margin-right:3px;margin-top:4px;">бла-бла-бла</p>';

$c = new csscomb($css, true);
?>
</body>
</html>