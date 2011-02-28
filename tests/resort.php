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


$css = "#bundle {
    .button {
        display: block;
        border: 1px solid black;
        background-color: grey;
        :hover {
            background-color: white;
            }
        }
    .tab {padding:0;margin:0;}
    .citation {font-size:10px;color:#000;}
    }

#header a {
    color: orange;
    #bundle > .button;
    }

#defaults {
    @width: 960px;
    @color: black;
    }

.article {color: #294366;}

.comment {
    width: #defaults[@width];
    color: .article['color'];
    }";

$c = new csscomb($css, true);
?>
</body>
</html>