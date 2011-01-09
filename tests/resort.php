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


$css = '/* ?? */
@media print {
    div{
        text-align:left;
        padding:0;
        _padding:0;
        }
}
        /* ?? */
        #ololo{
            background:yellow;
            color:#000;
            display:block;
            }
            /* ?? */


ul{
    li{
        a{
            span{
                color:red;
                position:absolute;
            }
        }
    }
}';

$c = new csscomb($css);
?>
</body>
</html>