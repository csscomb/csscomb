<?
$case[1]['descr'] = 'Форматирование. Фигурные скобки. Вариант 1';
$case[1]['code'] = 'div{
	padding:0;
	margin:0;
	}
	div p{
		font-size:1px;
	    top:0;
		}
		div p em{
		    font-style:italic;
		    border-bottom:1px solid red;
			}';

$case[1]['result'] = 'div{
	margin:0;
	padding:0;
	}
	div p{
	    top:0;
		font-size:1px;
		}
		div p em{
		    border-bottom:1px solid red;
		    font-style:italic;
			}';



$case[2]['descr'] = 'Форматирование. Фигурные скобки. Вариант 2';
$case[2]['code'] = 'div
{
	padding:0;
	margin:0;
}
	div p
	{
		font-size:1px;
	    top:0;
	}
		div p em
		{
		    font-style:italic;
		    border-bottom:1px solid red;
		}';

$case[2]['result'] = 'div
{
	margin:0;
	padding:0;
}
	div p
	{
	    top:0;
		font-size:1px;
	}
		div p em
		{
		    border-bottom:1px solid red;
		    font-style:italic;
		}';


$case[3]['descr'] = 'Форматирование. Фигурные скобки. Вариант 3';
$case[3]['code'] = 'div {
	padding:0;
	margin:0;
}
	div p {
		font-size:1px;
	    top:0;
	}
		div p em {
		    font-style:italic;
		    border-bottom:1px solid red;
		}

		a{
top:0;margin:0;}
		b{
top:0;margin:0;}';

$case[3]['result'] = 'div {
	margin:0;
	padding:0;
}
	div p {
	    top:0;
		font-size:1px;
	}
		div p em {
		    border-bottom:1px solid red;
		    font-style:italic;
		}

		a{
top:0;margin:0;}
		b{
top:0;margin:0;}';





$case[4]['descr'] = 'Форматирование. Запись в одну строку. Вариант 1';
$case[4]['code'] = 'div{padding:0;margin:0;}
div p{font-size:1px;top:0;}
div p em{font-style:italic;border-bottom:1px solid red;}';

$case[4]['result'] = 'div{margin:0;padding:0;}
div p{top:0;font-size:1px;}
div p em{border-bottom:1px solid red;font-style:italic;}';





$case[5]['descr'] = 'Форматирование. Запись в одну строку. Вариант 2';
$case[5]['code'] = 'div{padding:0;margin:0;}div p{font-size:1px;top:0;}div p em{font-style:italic;border-bottom:1px solid red;}';
$case[5]['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';




$case[6]['descr'] = 'Форматирование. Запись в одну строку. Вариант 3';
$case[6]['code'] = 'div{padding:0;margin:0}div p{font-size:1px;top:0}div p em{font-style:italic;border-bottom:1px solid red}';
$case[6]['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';





$case[7]['descr'] = 'Отсутствие свойств (пустые каркасы). Вариант 1';
$case[7]['code'] = 'div{}
div p {}';
$case[7]['result'] = 'div{ }
div p { }';



$case[8]['descr'] = 'Отсутствие свойств (пустые каркасы). Вариант 2';
$case[8]['code'] = 'div {
	}
	div p {
		}
		div p em {
			}';

$case[8]['result'] = 'div {
	}
	div p {
		}
		div p em {
			}';



$case[9]['descr'] = 'Свойства. Одинаковые свойства c разным значением.';
$case[9]['code'] = 'div{
    color:red;
    color:green;
	}';
$case[9]['result'] = 'div{
    color:red;
    color:green;
	}';




$case[10]['descr'] = 'Свойства. Одинаковые свойства с одинаковым значением.';
$case[10]['code'] = 'div{
	color:#fff;
	padding:0;
	color:#fff;
	}';

$case[10]['result'] = 'div{
	padding:0;
	color:#fff;
	color:#fff;
	}';




$case[11]['descr'] = 'Свойства. Неизвестные свойства.';
$case[11]['code'] = 'div{
	color:#fff;
	myProperty:1;
	padding:0;
	unknown:true;
	}';
$case[11]['result'] = 'div{
	padding:0;
	color:#fff;
	myProperty:1;
	unknown:true;
	}';



$case[12]['descr'] = 'Свойства. Хаки.';
$case[12]['code'] = 'div{
	color: red;
	*color: green;
	_color: yellow;
	co\lor: black;
	}';
$case[12]['result'] = 'div{
	color: red;
	*color: green;
	_color: yellow;
	co\lor: black;
	}';



$case[13]['descr'] = 'Свойства. expression.';
$case[13]['code'] = '#header{
	zoom:1;
	zoom:expression(
		runtimeStyle.zoom = 1,
		i = createElement(\'div\'),
		i.className = \'after\',
		appendChild(i)
		);
	padding-bottom:10px;
	height:100px;
	height:expression(
		runtimeStyle.height = 1,
		this.parentNode.style.offsetHeight;
		);
	}';

$case[13]['result'] = '#header{
	zoom:1;
	padding-bottom:10px;
	height:100px;
	zoom:expression(
		runtimeStyle.zoom = 1,
		i = createElement(\'div\'),
		i.className = \'after\',
		appendChild(i)
		);
	height:expression(
		runtimeStyle.height = 1,
		this.parentNode.style.offsetHeight;
		);
	}';



$case[14]['descr'] = 'Свойства. filter.';
$case[14]['code'] = 'div{
	background: red;
	filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'/i/pic1.png\',sizingMethod=\'crop\');
	}';
$case[14]['result'] = 'div{
	background: red;
	opacity: 1;
	filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'/i/pic1.png\',sizingMethod=\'crop\');
	}';



$case[15]['descr'] = 'Свойства. Запись значения одного свойства на нескольких строках.';
$case[15]['code'] = 'aside{
	background: url(a.png) top left no-repeat,
				url(b.png) center / 100% 100% no-repeat,
				url(c.png) white;

	text-shadow:
		0 -1px 1px rgba(0,0,0,0.4),
		0 0 5px rgba(255,255,255,0.7);

	top:0;
	left:0;
	position:absolute;
	}';

$case[15]['result'] = 'aside{
	position:absolute;

	top:0;
	left:0;
	background: url(a.png) top left no-repeat,
				url(b.png) center / 100% 100% no-repeat,
				url(c.png) white;

	text-shadow:
		0 -1px 1px rgba(0,0,0,0.4),
		0 0 5px rgba(255,255,255,0.7);
	}';





$case[16]['descr'] = 'Свойства. Хак с фигурной скобкой "}"';
$case[16]['code'] = '.wrapper{
    position: relative;
    min-height: 100%;
    height: 100%;
    voice-family: "\"}\"";
    voice-family: inherit;
	}
	html>body .wrapper{
    	height: auto;
		}';

$case[16]['result'] = '.wrapper{
    position: relative;
    height: 100%;
    min-height: 100%;
    voice-family: "\"}\"";
    voice-family: inherit;
	}
	html>body .wrapper{
    	height: auto;
		}';






$case[17]['descr'] = 'Комментарии. Вне @media';
$case[17]['code'] = '/* for screen */
@media screen{
    body{
        font-size:12px;
        position:relative;
    	}
	}

/* for print */
@media print{
	body{
	    font-size:12pt;
	    padding:0;
		}
	}

/* end of file */';

$case[17]['result'] = '/* for screen */
@media screen{
    body{
        position:relative;
        font-size:12px;
    	}
	}

/* for print */
@media print{
	body{
	    padding:0;
	    font-size:12pt;
		}
	}

/* end of file */';


$case[18]['descr'] = 'Комментарии. Вне селектора. Вариант 1';
$case[18]['code'] = '/* .b-pager (begin) */
.b-pager{font-size:130%;margin:1em 0 2em;}
.b-pager__title{font-weight:bold;padding-right:.65em;}
/* .b-pager (end) */';

$case[18]['result'] = '/* .b-pager (begin) */
.b-pager{margin:1em 0 2em;font-size:130%;}
.b-pager__title{padding-right:.65em;font-weight:bold;}
/* .b-pager (end) */';



$case[19]['descr'] = 'Комментарии. Вне селектора. Вариант 2';
$case[19]['code'] = '/* .b-pager (begin) */
	.b-pager{
		font-size:130%;
		margin:1em 0 2em;
		}
		.b-pager__title{
			font-weight:bold;
			padding-right:.65em;
			}
/* .b-pager (end) */';

$case[19]['result'] = '/* .b-pager (begin) */
	.b-pager{
		margin:1em 0 2em;
		font-size:130%;
		}
		.b-pager__title{
			padding-right:.65em;
			font-weight:bold;
			}
/* .b-pager (end) */';



$case[20]['descr'] = 'Комментарии. Внутри селектора.';
$case[20]['code'] = 'h1{
	background: #faf0e6; /* Цвет фона под текстом */
	border: 2px dashed #800000; /* Рамка вокруг заголовка */
	color: #a0522d; /* Цвет текста */
	padding: 7px; /* Поля вокруг текста */
	}';
$case[20]['result'] = 'h1{
	padding: 7px /* Поля вокруг текста */;
	border: 2px dashed #800000 /* Рамка вокруг заголовка */;
	background: #faf0e6 /* Цвет фона под текстом */;
	color: #a0522d /* Цвет текста */;
	}';




$case[21]['descr'] = 'Селекторы.';
$case[21]['code'] = '#id,
.class,
div,
h1 + p,
div > p,
a[href^="https://"],
:visited
{
	border:1px solid red;
	padding:0;
	margin:0;
	width:100px;
}';

$case[21]['result'] = '#id,
.class,
div,
h1 + p,
div > p,
a[href^="https://"],
:visited
{
	margin:0;
	padding:0;
	width:100px;
	border:1px solid red;
}';




$case[22]['descr'] = 'Правила начинающиеся с @. @media';
$case[22]['code'] = '/* test */
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
$case[22]['result'] = '/* test */
@media print { /* Стиль для принтеров */

	BODY {
		left:0;
		font-family: Times, \'Times New Roman\', serif /* Шрифт с засечками */;
	}

	H1, H2, P {
		top:0;
		color: #000 /* Черный цвет текста */;
	}
}

@media screen { /* Стиль для экранов */

	BODY {
		top:0;
		font-family: Times, \'Times New Roman\', serif /* Шрифт с засечками */;
	}

	H1, H2, P {
		left:0;
		color: #000 /* Черный цвет текста */;
	}

}

/* test */';



$case[23]['descr'] = 'Правила начинающиеся с @. @font-face';
$case[23]['code'] = '.test{
    left:0;
    top:0;
    position:relative;
	}

@font-face {
	font-family: MyHelvetica;
	src: local("Helvetica Neue Bold"),
		 local("HelveticaNeue-Bold"),
		 url(MgOpenModernaBold.ttf);
	font-weight: bold;
}
/* http://www.w3.org/TR/css3-fonts/#font-resources */

div{
	padding:0;
	margin:0;
	}';

$case[23]['result'] = '.test{
    position:relative;
    top:0;
    left:0;
	}

@font-face {
	font-weight: bold;
	font-family: MyHelvetica;
	src: local("Helvetica Neue Bold"),
		 local("HelveticaNeue-Bold"),
		 url(MgOpenModernaBold.ttf);
}
/* http://www.w3.org/TR/css3-fonts/#font-resources */

div{
	margin:0;
	padding:0;
	}';


//$case[24]['descr'] = 'Правила начинающиеся с @. @page';
//$case[24]['code'] = '';

$case[25]['descr'] = 'Правила начинающиеся с @. @import';
$case[25]['code'] = '@import \'reset.css\';
h1 {
	width:75%;
	padding:0;
}';

$case[25]['result'] = '@import \'reset.css\';
h1 {
	padding:0;
	width:75%;
}';

$case[26]['descr'] = 'Правила начинающиеся с @. @-wekit-keyframes';
$case[26]['code'] = '/********** 404 Page **********/
#earth {
	width:100%;
	height:1500px;
	background:url(../images/presentation/planet_1500.jpg) top center no-repeat;
	position:absolute;
	margin:-1100px 0px 0px 0px;
	-webkit-animation-name: earthRotation;
	-webkit-animation-iteration-count: infinite;
	-webkit-animation-timing-function: linear;
	-webkit-animation-duration: 500s;
	z-index:-1;
}

@-webkit-keyframes earthRotation {
	from {
		-webkit-transform: rotate(0deg);
		}

	to {
		-webkit-transform: rotate(360deg);
		}
}';

$case[26]['result'] = '/********** 404 Page **********/
#earth {
	position:absolute;
	z-index:-1;
	margin:-1100px 0px 0px 0px;
	width:100%;
	height:1500px;
	background:url(../images/presentation/planet_1500.jpg) top center no-repeat;
	-webkit-animation-name: earthRotation;
	-webkit-animation-iteration-count: infinite;
	-webkit-animation-timing-function: linear;
	-webkit-animation-duration: 500s;
}

@-webkit-keyframes earthRotation {
	from {
		-webkit-transform: rotate(0deg);
		}

	to {
		-webkit-transform: rotate(360deg);
		}
}';


//$case[27]['descr'] = 'Ключевые символы. /* */';
//$case[27]['code'] = '';


/*$case[28]['descr'] = 'Ключевые символы. *';
$case[28]['code'] = '';


$case[29]['descr'] = 'Ключевые символы. ;';
$case[29]['code'] = '';


$case[30]['descr'] = 'Ключевые символы. ; data uri';
$case[30]['code'] = '';


$case[31]['descr'] = 'Ключевые символы. :';
$case[31]['code'] = '';


$case[32]['descr'] = 'Ключевые символы. ';
$case[32]['code'] = ''; */


//$case[32]['descr'] = 'Закомментированное свойство на одной строке ';
//$case[32]['code'] = '';

//$case[32]['descr'] = 'Закомментированное свойство на нескольких строках ';
//$case[32]['code'] = '';




/**
 *
 *  тестирование окружения
 * 	пересортировка только того, что внутри <style>...</style>
 *  пересортировка небольшого выделенного участка кода вида top:0;position:relative;font-size:10px;
 *
*
 */

require_once'../lib/csscomb.php';
$c = new csscomb();

?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тесты</title>
    <script src="http://yandex.st/highlightjs/5.16/highlight.min.js"></script>
    <link rel="stylesheet" href="http://yandex.st/highlightjs/5.16/styles/default.min.css">
    <script>
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad();
    </script>
</head>
<body><?

$test_count = 0;
$errors = 0;
foreach($case as $key=>$item){
    $result = $c->csscomb($case[$key]['code'], false);

    if($result===$case[$key]['result']) $passed = true; else {
        $passed = false;
        $errors++;
    }

    echo '
<div id="case'.$key.'">
    <h2 style="'.(($passed)?'color:green':'color:red').'"><a href="#case'.$key.'">'.$key.'.</a> '.$item['descr'].'</h2>
    <table width="100%" style="xdisplay:none;">
        <tr>
            <td style="vertical-align:top;" width="50%"><pre class="css"><code>'.$item['code'].'</code></pre></td>
            <td style="vertical-align:top;"><pre class="css"><code>'.$result.'</code></pre></td>
        </tr>
    </table>
</div>';

    $test_count++;
}

echo '<hr><p> Ошибок: '.$errors.', всего тестов: '.($test_count+1).'.</p>';

?>
