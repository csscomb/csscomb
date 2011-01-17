<?
/*
Форматирование
Отсутствие свойств (пустые каркасы)
Свойства
Комментарии
Правила начинающиеся с @
Ключевые символы

todo: Примеры реальных css-файлов

todo: добавить LESSCSS testcases
todo: тестирование окружения
    пересортировка только того, что внутри <style>...</style>
    несколько style в одном html файле
    пересортировка небольшого выделенного участка кода вида top:0;position:relative;font-size:10px;
 */

$testcases = Array();

$case['descr'] = 'Форматирование. Фигурные скобки. Вариант 1';
$case['code'] = 'div{
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

$case['result'] = 'div{
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
$testcases[] = $case;


$case['descr'] = 'Форматирование. Фигурные скобки. Вариант 2';
$case['code'] = 'div
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

$case['result'] = 'div
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
$testcases[] = $case;


$case['descr'] = 'Форматирование. Фигурные скобки. Вариант 3';
$case['code'] = 'div {
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

$case['result'] = 'div {
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
$testcases[] = $case;





$case['descr'] = 'Форматирование. Запись в одну строку. Вариант 1';
$case['code'] = 'div{padding:0;margin:0;}
div p{font-size:1px;top:0;}
div p em{font-style:italic;border-bottom:1px solid red;}';

$case['result'] = 'div{margin:0;padding:0;}
div p{top:0;font-size:1px;}
div p em{border-bottom:1px solid red;font-style:italic;}';
$testcases[] = $case;




$case['descr'] = 'Форматирование. Запись в одну строку. Вариант 2';
$case['code'] = 'div{padding:0;margin:0;}div p{font-size:1px;top:0;}div p em{font-style:italic;border-bottom:1px solid red;}';
$case['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';
$testcases[] = $case;



$case['descr'] = 'Форматирование. Запись в одну строку. Вариант 3';
$case['code'] = 'div{padding:0;margin:0}div p{font-size:1px;top:0}div p em{font-style:italic;border-bottom:1px solid red}';
$case['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';
$testcases[] = $case;




$case['descr'] = 'Отсутствие свойств (пустые каркасы). Вариант 1';
$case['code'] = 'div{}
div p {}';
$case['result'] = 'div{ }
div p { }';
$testcases[] = $case;


$case['descr'] = 'Отсутствие свойств (пустые каркасы). Вариант 2';
$case['code'] = 'div {
	}
	div p {
		}
		div p em {
			}';

$case['result'] = 'div {
	}
	div p {
		}
		div p em {
			}';
$testcases[] = $case;



$case['descr'] = 'Свойства. Одинаковые свойства c разным значением.';
$case['code'] = 'div{
    color:red;
    color:green;
	}';
$case['result'] = 'div{
    color:red;
    color:green;
	}';
$testcases[] = $case;




$case['descr'] = 'Свойства. Одинаковые свойства с одинаковым значением.';
$case['code'] = 'div{
	color:#fff;
	padding:0;
	color:#fff;
	}';

$case['result'] = 'div{
	padding:0;
	color:#fff;
	color:#fff;
	}';
$testcases[] = $case;



$case['descr'] = 'Свойства. Неизвестные свойства.';
$case['code'] = 'div{
	color:#fff;
	myProperty:1;
	padding:0;
	unknown:true;
	}';
$case['result'] = 'div{
	padding:0;
	color:#fff;
	myProperty:1;
	unknown:true;
	}';
$testcases[] = $case;


$case['descr'] = 'Свойства. Хаки.';
$case['code'] = 'div{
	color: red;
	*color: green;
	_color: yellow;
	co\lor: black;
	}';
$case['result'] = 'div{
	color: red;
	*color: green;
	_color: yellow;
	co\lor: black;
	}';
$testcases[] = $case;


$case['descr'] = 'Свойства. expression.';
$case['code'] = '#header{
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

$case['result'] = '#header{
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
$testcases[] = $case;


$case['descr'] = 'Свойства. filter.';
$case['code'] = 'div{
	background: red;
	filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'/i/pic1.png\',sizingMethod=\'crop\');
	}';
$case['result'] = 'div{
	background: red;
	opacity: 1;
	filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'/i/pic1.png\',sizingMethod=\'crop\');
	}';
$testcases[] = $case;


$case['descr'] = 'Свойства. Запись значения одного свойства на нескольких строках.';
$case['code'] = 'aside{
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

$case['result'] = 'aside{
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
$testcases[] = $case;




$case['descr'] = 'Свойства. Хак с фигурной скобкой "}"';
$case['code'] = '.wrapper{
    position: relative;
    min-height: 100%;
    height: 100%;
    voice-family: "\"}\"";
    voice-family: inherit;
	}
	html>body .wrapper{
    	height: auto;
		}';

$case['result'] = '.wrapper{
    position: relative;
    height: 100%;
    min-height: 100%;
    voice-family: "\"}\"";
    voice-family: inherit;
	}
	html>body .wrapper{
    	height: auto;
		}';
$testcases[] = $case;





$case['descr'] = 'Комментарии. Вне @media';
$case['code'] = '/* for screen */
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

$case['result'] = '/* for screen */
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
$testcases[] = $case;



$case['descr'] = 'Комментарии. Вне селектора. Вариант 1';
$case['code'] = '/* .b-pager (begin) */
.b-pager{font-size:130%;margin:1em 0 2em;}
.b-pager__title{font-weight:bold;padding-right:.65em;}
/* .b-pager (end) */';

$case['result'] = '/* .b-pager (begin) */
.b-pager{margin:1em 0 2em;font-size:130%;}
.b-pager__title{padding-right:.65em;font-weight:bold;}
/* .b-pager (end) */';
$testcases[] = $case;




$case['descr'] = 'Комментарии. Вне селектора. Вариант 2';
$case['code'] = '/* .b-pager (begin) */
	.b-pager{
		font-size:130%;
		margin:1em 0 2em;
		}
		.b-pager__title{
			font-weight:bold;
			padding-right:.65em;
			}
/* .b-pager (end) */';

$case['result'] = '/* .b-pager (begin) */
	.b-pager{
		margin:1em 0 2em;
		font-size:130%;
		}
		.b-pager__title{
			padding-right:.65em;
			font-weight:bold;
			}
/* .b-pager (end) */';
$testcases[] = $case;



$case['descr'] = 'Комментарии. Внутри селектора.';
$case['code'] = 'h1{
	background: #faf0e6; /* Цвет фона под текстом */
	border: 2px dashed #800000; /* Рамка вокруг заголовка */
	color: #a0522d; /* Цвет текста */
	padding: 7px; /* Поля вокруг текста */
	}';
$case['result'] = 'h1{
	padding: 7px /* Поля вокруг текста */;
	border: 2px dashed #800000 /* Рамка вокруг заголовка */;
	background: #faf0e6 /* Цвет фона под текстом */;
	color: #a0522d /* Цвет текста */;
	}';
$testcases[] = $case;




$case['descr'] = 'Комментарии. Внутри селектора сразу после открывающей фигурной скобки.';
$case['code'] = '.test { /* тестовый комментарий */
	padding:0;
	position:relative;
	background:url(picture.jpg);
	}';
$case['result'] = '.test { /* тестовый комментарий */
	position:relative;
	padding:0;
	background:url(picture.jpg);
	}';
$testcases[] = $case;



$case['descr'] = 'Комментарии. Внутри селектора одна строка целиком';
$case['code'] = 'h1{
	background: #faf0e6;
	/*border: 2px dashed #800000;*/
	color: #a0522d;
	padding: 7px;
	}';
$case['result'] = 'h1{
	padding: 7px;
	/*border: 2px dashed #800000;*/
	background: #faf0e6;
	color: #a0522d;
	}';
$testcases[] = $case;



$case['descr'] = 'Комментарии. Внутри селектора многострочный комментарий';
$case['code'] = 'h1{
	background: #faf0e6;
	/*border: 2px dashed #800000;
	color: #a0522d;*/
	padding: 7px;
	}';
$case['result'] = 'h1{
	padding: 7px;
	background: #faf0e6;
	/*border: 2px dashed #800000;
	color: #a0522d;*/
	}';
$testcases[] = $case;




$case['descr'] = 'Комментарии. Хитрый случай с хаком для IE';
$case['code'] = '.ie50 {
    color:#123;
    display/**/: none;
    width:100px;
}
.ie55 {
    margin-top:-10px;
    position:relative;
    display/**/: block;
}';
$case['result'] = '.ie50 {
    width:100px;
    color:#123;
    display/**/: none;
}
.ie55 {
    position:relative;
    margin-top:-10px;
    display/**/: block;
}';
$testcases[] = $case;




$case['descr'] = 'Селекторы.';
$case['code'] = '#id,
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

$case['result'] = '#id,
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
$testcases[] = $case;





$case['descr'] = 'Правила начинающиеся с @. @media';
$case['code'] = '/* test */
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
$case['result'] = '/* test */
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
$testcases[] = $case;




$case['descr'] = 'Правила начинающиеся с @. @font-face';
$case['code'] = '.test{
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

$case['result'] = '.test{
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
$testcases[] = $case;


//$case[24]['descr'] = 'Правила начинающиеся с @. @page';
//$case[24]['code'] = '';

$case['descr'] = 'Правила начинающиеся с @. @import';
$case['code'] = '@import \'reset.css\';
h1 {
	width:75%;
	padding:0;
}';

$case['result'] = '@import \'reset.css\';
h1 {
	padding:0;
	width:75%;
}';
$testcases[] = $case;



$case['descr'] = 'Правила начинающиеся с @. @-wekit-keyframes';
$case['code'] = '/********** 404 Page **********/
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

$case['result'] = '/********** 404 Page **********/
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
$testcases[] = $case;



$case['descr'] = 'Ключевые символы. ; data uri';
$case['code'] = 'div{
	padding:10px 20px;
	display:block;
}
BODY {
	background:#402724 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFJREFUCFtjYfBiYfgFRr9R0V8Whj8w9BeM/sFICPoPJAFgpxRXg6BKBgAAAABJRU5ErkJggg==) repeat-x;
	color:#241412;
	padding:0;
	margin:0;
	}
	.test{
	    color:#fff;
	    position:relative;
	    }';
$case['result'] = 'div{
	display:block;
	padding:10px 20px;
}
BODY {
	margin:0;
	padding:0;
	background:#402724 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFJREFUCFtjYfBiYfgFRr9R0V8Whj8w9BeM/sFICPoPJAFgpxRXg6BKBgAAAABJRU5ErkJggg==) repeat-x;
	color:#241412;
	}
	.test{
	    position:relative;
	    color:#fff;
	    }';
$testcases[] = $case;


/*
$case[31]['descr'] = 'Ключевые символы. ;';
$case[31]['code'] = '';

$case[33]['descr'] = 'Ключевые символы. :';
$case[33]['code'] = '';
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
    <style>.diff{
			width:100%;
			height:200px;
			overflow:auto;
			}
			.diff textarea{
				width:50%;
				height:9999px;
				padding:0;
				margin:0;
				border:0;
				background:#f5f5f5;
				}</style>
</head>
<body><?

$test_count = 0;
$errors = 0;
foreach($testcases as $key=>$case){
    $key = $key+1;
    $result = $c->csscomb($case['code'], false);

    if($result===$case['result']) $passed = true; else {
        $passed = false;
        $errors++;
    }

    echo '
<div id="case'.$key.'">
    <h2 style="'.(($passed)?'color:green':'color:red').'"><a href="#case'.$key.'">'.$key.'.</a> '.$case['descr'].'</h2>
    <div class="diff">
        <textarea name="in" cols="30" rows="10">'.$case['code'].'</textarea><textarea name="out" cols="30" rows="10">'.$result.'</textarea>
    </div>
    <!--table width="100%" style="xdisplay:none;">
        <tr>
            <td style="vertical-align:top;" width="50%"><pre class="css"><code>'.$case['code'].'</code></pre></td>
            <td style="vertical-align:top;"><pre class="css"><code>'.$result.'</code></pre></td>
        </tr>
    </table-->
</div>';

    $test_count++;
}

echo '<hr><p><span style="color:red;">Ошибок: '.$errors.'</span>. <span style="color:green;">Всего пройдено тестов: '.(sizeof($testcases)).'</span>.</p>';

?>
