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

$css = '.nani {
  @each $animal in puma, sea-slug, egret, salamander {
    .#{$animal}-icon {
      background-image: url("/images/#{$animal}.png");
    }
  }
}';

//$css = '.test{
    //content: \'&#160\';
//}';
$c = new csscomb($css, true);
?>
</body>
</html>
