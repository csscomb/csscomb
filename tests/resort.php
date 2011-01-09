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


$css = '/* test */
@media print { /* Стиль для принтеров */

    BODY {
        font-family: Times, \'Times New Roman\', serif; /* Шрифт с засечками */
        left:0;
    }

    H1, H2, P {
        color: #000; /* Черный цвет текста */
        top:0;
    }
}

@media screen { /* Стиль для экранов */

    BODY {
        font-family: Times, \'Times New Roman\', serif; /* Шрифт с засечками */
        top:0;
    }

    H1, H2, P {
        color: #000; /* Черный цвет текста */
        left:0;
    }

}

/* test */';

$c = new csscomb($css);
?>
</body>
</html>