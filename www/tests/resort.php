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
require_once '../src/csscomb.php';

$css = '.bordered {
    border-top: dotted 1px black;
    border-bottom: solid 2px black;
    }
#menu a {.nani;
    color: #111;
    .bordered;
    }
.post a {
    color: red;
    .bordered;
    }
.notice {
  color: tomato;
  @include inline-block;
  @extend %extreme;
}';

//$css = '.test{
    //content: \'&#160\';
//}';
$c = new csscomb($css, true);
?>
</body>
</html>
