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
        padding:0;
        text-align:left;
        }
}
        /* ?? */
        #ololo{
            background:yellow;
            color:#000;
            }
            /* ?? */


ul{
    li{
        a{
            span{
                color:red;
            }
        }
    }
}';

$c = new csscomb();
$c->parse_rules($css);
?>
</body>
</html>