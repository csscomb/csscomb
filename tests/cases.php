<?
// todo: Примеры реальных css-файлов

$yandex_style = '[
[
    "font",
    "font-family",
    "font-size",
    "font-weight",
    "font-style",
    "font-variant",
    "font-size-adjust",
    "font-effect",
    "font-emphasize",
    "font-emphasize-position",
    "font-emphasize-style",
    "font-smooth",
    "font-stretch"
],
[
    "position",
    "z-index",
    "top",
    "right",
    "bottom",
    "left"
],
[
    "display",
    "visibility",
    "float",
    "clear",
    "overflow",
    "overflow-x",
    "overflow-y",
    "overflow-style",
    "clip",
    "zoom"
],
[
    "-moz-box-sizing",
    "-webkit-box-sizing",
    "box-sizing",
    "width",
    "min-width",
    "max-width",
    "height",
    "min-height",
    "max-height",
    "margin",
    "margin-top",
    "margin-right",
    "margin-bottom",
    "margin-left",
    "padding",
    "padding-top",
    "padding-right",
    "padding-bottom",
    "padding-left"
],
[
    "table-layout",
    "empty-cells",
    "caption-side",
    "border-spacing",
    "border-collapse",
    "list-style",
    "list-style-position",
    "list-style-type",
    "list-style-image"
],
[
    "content",
    "quotes",
    "counter-reset",
    "counter-increment",
    "cursor",
    "text-align",
    "vertical-align",
    "line-height",
    "white-space",
    "white-space-collapse",
    "text-decoration",
    "text-indent",
    "text-transform",
    "text-align-last",
    "text-emphasis",
    "text-height",
    "text-justify",
    "text-outline",
    "text-replace",
    "text-wrap",
    "letter-spacing",
    "word-spacing",
    "word-break",
    "word-wrap"
],
[
    "opacity",
    "color",
    "border",
    "-moz-border-radius",
    "-webkit-border-radius",
    "border-radius",
    "border-break",
    "border-color",
    "-webkit-border-image",
    "-moz-border-image",
    "-khtml-border-radius",
    "border-image",
    "border-top-image",
    "border-right-image",
    "border-bottom-image",
    "border-left-image",
    "border-corner-image",
    "border-top-left-image",
    "border-top-right-image",
    "border-bottom-right-image",
    "border-bottom-left-image",
    "border-fit",
    "border-length",
    "border-style",
    "border-width",
    "border-top",
    "border-top-width",
    "border-top-style",
    "border-top-color",
    "border-right",
    "border-right-width",
    "border-right-style",
    "border-right-color",
    "border-bottom",
    "border-bottom-width",
    "border-bottom-style",
    "border-bottom-color",
    "border-left",
    "border-left-width",
    "border-left-style",
    "border-left-color",
    "border-top-right-radius",
    "border-top-left-radius",
    "border-bottom-right-radius",
    "border-bottom-left-radius",
    "outline",
    "outline-offset",
    "outline-width",
    "outline-style",
    "outline-color",
    "background",
    "background-color",
    "background-image",
    "background-repeat",
    "background-attachment",
    "background-position",
    "background-position-x",
    "background-position-y",
    "background-break",
    "background-clip",
    "background-origin",
    "background-size",
    "-webkit-box-shadow",
    "-moz-box-shadow",
    "box-shadow",
    "text-shadow",
    "transitions",
    "resize",
    "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader",
    "filter:progid:DXImageTransform.Microsoft.Alpha(Opacity",
    "-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha"
],
[
    "page-break-before",
    "page-break-inside",
    "page-break-after",
    "orphans",
    "widows"
]
]';

$case_groups = $group =  Array();


$group['group-id'] = 'formatting';
$group['group-name'] = 'Форматирование';
$group['group-name-en'] = 'Formatting';


$case['descr'] = 'Фигурные скобки. Вариант 1';
$case['descr-en'] = 'Formatting. Braces. Option 1';
$case['link'] = 'formatting-braces-option-1';
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
$group['cases'][] = $case;


$case['descr'] = 'Фигурные скобки. Вариант 2';
$case['descr-en'] = 'Formatting. Braces. Option 2';
$case['link'] = 'formatting-braces-option-2';
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
$group['cases'][] = $case;


$case['descr'] = 'Фигурные скобки. Вариант 3';
$case['descr-en'] = 'Formatting. Braces. Option 3';
$case['link'] = 'formatting-braces-option-3';
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
$group['cases'][] = $case;



$case['descr'] = 'Запись в одну строку. Вариант 1';
$case['descr-en'] = 'Formatting. One-line CSS. Option 1';
$case['link'] = 'formatting-one-line-css-option-1';
$case['code'] = 'div{padding:0;margin:0;}
div p{font-size:1px;top:0;}
div p em{font-style:italic;border-bottom:1px solid red;}';
$case['result'] = 'div{margin:0;padding:0;}
div p{top:0;font-size:1px;}
div p em{border-bottom:1px solid red;font-style:italic;}';
$group['cases'][] = $case;




$case['descr'] = 'Запись в одну строку. Вариант 2';
$case['descr-en'] = 'Formatting. One-line CSS. Option 2';
$case['link'] = 'formatting-one-line-css-option-2';
$case['code'] = 'div{padding:0;margin:0;}div p{font-size:1px;top:0;}div p em{font-style:italic;border-bottom:1px solid red;}';
$case['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';
$group['cases'][] = $case;



$case['descr'] = 'Запись в одну строку. Вариант 3';
$case['descr-en'] = 'Formatting. One-line CSS. Option 3';
$case['link'] = 'formatting-one-line-css-option-3';
$case['code'] = 'div{padding:0;margin:0}div p{font-size:1px;top:0}div p em{font-style:italic;border-bottom:1px solid red}';
$case['result'] = 'div{margin:0;padding:0;}div p{top:0;font-size:1px;}div p em{border-bottom:1px solid red;font-style:italic;}';
$group['cases'][] = $case;



$case_groups[] = $group;
$group = Array();










$group['group-id'] = 'properties';
$group['group-name'] = 'Свойства';
$group['group-name-en'] = 'Properties';


$case['descr'] = 'Отсутствие свойств: пустые каркасы. Вариант 1';
$case['descr-en'] = 'No properties: empty braces. Option 1';
$case['link'] = 'no-properties-empty-braces-option-1';
$case['code'] = 'div{}
div p {}';
$case['result'] = 'div{ }
div p { }';
$group['cases'][] = $case;



$case['descr'] = 'Отсутствие свойств: пустые каркасы. Вариант 2';
$case['descr-en'] = 'No properties: empty braces. Option 2';
$case['link'] = 'no-properties-empty-braces-option-2';
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
$group['cases'][] = $case;



$case['descr'] = 'Одинаковые свойства с разным значением';
$case['descr-en'] = 'Properties: The same properties with different values';
$case['link'] = 'properties-the-same-properties-with-different-values';
$case['code'] = 'div{
    color:red;
    color:green;
	}';
$case['result'] = 'div{
    color:red;
    color:green;
	}';
$group['cases'][] = $case;




$case['descr'] = 'Одинаковые свойства с одинаковым значением';
$case['descr-en'] = 'Properties: The same properties with same values';
$case['link'] = 'properties-the-same-properties-with-same-values';
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
$group['cases'][] = $case;



$case['descr'] = 'Неизвестные свойства';
$case['descr-en'] = 'Properties: unknown property';
$case['link'] = 'properties-unknown-property';
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
$group['cases'][] = $case;


$case['descr'] = 'Хаки';
$case['descr-en'] = 'Hacks';
$case['link'] = 'properties-hacks';
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
$group['cases'][] = $case;


$case['descr'] = 'Expression';
$case['descr-en'] = 'Properties: expression';
$case['link'] = 'properties-expression';
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
	padding-bottom:10px;
	height:100px;
	zoom:1;
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
$group['cases'][] = $case;


$case['descr'] = 'Filter';
$case['descr-en'] = 'Properties: filter';
$case['link'] = 'properties-filter';
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
$group['cases'][] = $case;


$case['descr'] = 'Запись значения одного свойства на нескольких строках';
$case['descr-en'] = 'Properties: multiline';
$case['link'] = 'properties-multiline';
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
$group['cases'][] = $case;




$case['descr'] = 'Хак с фигурной скобкой }';
$case['descr-en'] = 'Properties: } hack';
$case['link'] = 'properties-brace-hack';
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
$group['cases'][] = $case;


$case_groups[] = $group;
$group = Array();








$group['group-id'] = 'comments';
$group['group-name'] = 'Комментарии';
$group['group-name-en'] = 'Comments';



$case['descr'] = 'Вне @media';
$case['descr-en'] = 'Comments: out of @media';
$case['link'] = 'comments-out-of-media';
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
$group['cases'][] = $case;



$case['descr'] = 'Вне селектора. Вариант 1';
$case['descr-en'] = 'Comments: out of selector. Option 1';
$case['link'] = 'comments-out-of-selector-option-1';
$case['code'] = '/* .b-pager (begin) */
.b-pager{font-size:130%;margin:1em 0 2em;}
.b-pager__title{font-weight:bold;padding-right:.65em;}
/* .b-pager (end) */';

$case['result'] = '/* .b-pager (begin) */
.b-pager{margin:1em 0 2em;font-size:130%;}
.b-pager__title{padding-right:.65em;font-weight:bold;}
/* .b-pager (end) */';
$group['cases'][] = $case;




$case['descr'] = 'Вне селектора. Вариант 2';
$case['descr-en'] = 'Comments: out of selector. Option 2';
$case['link'] = 'comments-out-of-selector-option-2';
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
$group['cases'][] = $case;



$case['descr'] = 'Вне селектора. /* comment */ /**/';
$case['descr-en'] = 'Comments: /* comment */ /**/';
$case['link'] = 'comments-double';
$case['code'] = '/* test comment 1 */
.one{
    padding:0;
    margin:0;
    }

/* test comment 2 */ /**/
.two{
    padding:0;
    margin:0;
    }

div{
    left:10px;
    top:10px;
    }

/* test comment 3 */
.one{
    padding:0;
    margin:0;
    }

/* test comment 4 */ /**/
.two{
    padding:0;
    margin:0;
    }';

$case['result'] = '/* test comment 1 */
.one{
    margin:0;
    padding:0;
    }

/* test comment 2 */ /**/
.two{
    margin:0;
    padding:0;
    }

div{
    top:10px;
    left:10px;
    }

/* test comment 3 */
.one{
    margin:0;
    padding:0;
    }

/* test comment 4 */ /**/
.two{
    margin:0;
    padding:0;
    }';
$group['cases'][] = $case;




$case['descr'] = 'Вне селектора. /* comment **/';
$case['descr-en'] = 'Comments: /* comment **/';
$case['link'] = 'comments-double-asterisk';
$case['code'] = '/* Multi stars comment **/
.class1 {
top: 1px;
}

/* Simple comment */
.class2 {
top: 1px;
}';

$case['result'] = '/* Multi stars comment **/
.class1 {
top: 1px;
}

/* Simple comment */
.class2 {
top: 1px;
}';
$group['cases'][] = $case;










$case['descr'] = 'Вне селектора + вне медиа';
$case['descr-en'] = 'Comments: out of media & selector.';
$case['link'] = 'comments-out-of-media-and-selector';
$case['code'] = '/* comment 1 */
@media screen {
    /* .b-pager (begin) */
	.b-pager{
		font-size:130%;
		margin:1em 0 2em;
		}
		.b-pager__title{
			font-weight:bold;
			padding-right:.65em;
			}
/* .b-pager (end) */
}

/* comment 2 */

@media print {
/* .b-pager (begin) */
	.b-pager{
		font-size:130%;
		margin:1em 0 2em;
		}
		.b-pager__title{
			font-weight:bold;
			padding-right:.65em;
			}
/* .b-pager (end) */
}
/* eof */';

$case['result'] = '/* comment 1 */
@media screen {
    /* .b-pager (begin) */
	.b-pager{
		margin:1em 0 2em;
		font-size:130%;
		}
		.b-pager__title{
			padding-right:.65em;
			font-weight:bold;
			}
/* .b-pager (end) */
}

/* comment 2 */

@media print {
/* .b-pager (begin) */
	.b-pager{
		margin:1em 0 2em;
		font-size:130%;
		}
		.b-pager__title{
			padding-right:.65em;
			font-weight:bold;
			}
/* .b-pager (end) */
}
/* eof */';
$group['cases'][] = $case;



$case['descr'] = 'Внутри селектора';
$case['descr-en'] = 'Comments: in selector';
$case['link'] = 'comments-in-selector';
$case['code'] = 'h1{
	background: #faf0e6; /* bg color */
	border: 2px dashed #800000; /* comment number 2 */
	color: #a0522d; /* text color */
	padding: 7px; /* last line comment */
	}';
$case['result'] = 'h1{
	padding: 7px; /* last line comment */
	border: 2px dashed #800000; /* comment number 2 */
	background: #faf0e6; /* bg color */
	color: #a0522d; /* text color */
	}';
$group['cases'][] = $case;




$case['descr'] = 'Внутри селектора сразу после открывающей фигурной скобки';
$case['descr-en'] = 'Comments: Inside the selector immediately after the opening brace';
$case['link'] = 'comments-Inside-the-selector-immediately-after-the-opening-brace';
$case['code'] = '.test1 {
	width:100px;
	height:100px;
	position:relative;
	}

.test2 { /* тестовый комментарий */
	width:100px;
	height:100px;
	position:relative;
	}

.test3 {
	width:100px;
	height:100px;
	position:relative;
	}';
$case['result'] = '.test1 {
	position:relative;
	width:100px;
	height:100px;
	}

.test2 { /* тестовый комментарий */
	position:relative;
	width:100px;
	height:100px;
	}

.test3 {
	position:relative;
	width:100px;
	height:100px;
	}';
$group['cases'][] = $case;


$case['descr'] = 'После селектора, а скобка { на следующей строке';
$case['descr-en'] = 'Comments: After a selector, and the bracket { on the next line';
$case['link'] = 'comments-after-a-selector-and-the-bracket-on-the-next-line';
$case['code'] = '.test1
{
	width:100px;
	height:100px;
	position:relative;
}

.test2 /* тестовый комментарий */
{
	width:100px;
	height:100px;
	position:relative;
}

.test3
{
	width:100px;
	height:100px;
	position:relative;
}';
$case['result'] = '.test1
{
	position:relative;
	width:100px;
	height:100px;
}

.test2 /* тестовый комментарий */
{
	position:relative;
	width:100px;
	height:100px;
}

.test3
{
	position:relative;
	width:100px;
	height:100px;
}';
$group['cases'][] = $case;



$case['descr'] = 'Внутри селектора одна строка целиком';
$case['descr-en'] = 'Comments: in a selector,  one line';
$case['link'] = 'comments-in-a-selector-one-line';
$case['code'] = 'h1{
	background: #faf0e6;
	/*border: 2px dashed #800000;*/
	color: #a0522d;
	padding: 7px;
	}';
$case['result'] = 'h1{
	padding: 7px;
	/* border: 2px dashed #800000; */
	background: #faf0e6;
	color: #a0522d;
	}';
$group['cases'][] = $case;



$case['descr'] = 'Внутри селектора многострочный комментарий';
$case['descr-en'] = 'Comments: in a selector,  multiline comment';
$case['link'] = 'comments-in-a-selector-multiline-comment';
$case['code'] = 'h1 {
	background: #faf0e6;
	/*border: 2px dashed #800000;
	color: #a0522d;*/
	padding: 7px;
	}';
$case['result'] = 'h1 {
	padding: 7px;
	/* border: 2px dashed #800000; */
	background: #faf0e6;
	/* color: #a0522d; */
	}';
$group['cases'][] = $case;






$case['descr'] = 'Комбинация многострочных и однострочных комментариев';
$case['descr-en'] = 'Comments: The combination of multi-and single-line comments';
$case['link'] = 'comments-the-combination-of-multi-and-singleline-comments';
$case['code'] = 'div{
    /* раз, два, три */
    position:absolute;
    left:1px;
    /*
    z-index:1;
    margin-top:10px;
    */
    /* top:1px; */
    padding:0;
    /*font-size:12px;*/
    }

    .test1{
        /*border-width: 1px 1px 1px 0;*/
        /*border-color: #93875d #dfd199 #fff6d5;*/

        color: #7a7254;

        background: #F5E39E;
        background: -moz-linear-gradient(top, #F5E39E 0%, #FFEFB2 42%, #FFF3C8 75%, #FFF5CF 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#F5E39E), color-stop(42%,#FFEFB2), color-stop(75%,#FFF3C8), color-stop(100%,#FFF5CF));
        }';
$case['result'] = 'div{
    /* раз, два, три */
    position:absolute;
    /* top:1px; */
    left:1px;
    /* z-index:1; */
    /* margin-top:10px; */
    padding:0;
    /* font-size:12px; */
    }

    .test1{
        /* border-color: #93875d #dfd199 #fff6d5; */
        /* border-width: 1px 1px 1px 0; */

        background: #F5E39E;
        background: -moz-linear-gradient(top, #F5E39E 0%, #FFEFB2 42%, #FFF3C8 75%, #FFF5CF 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#F5E39E), color-stop(42%,#FFEFB2), color-stop(75%,#FFF3C8), color-stop(100%,#FFF5CF));

        color: #7a7254;
        }';
$group['cases'][] = $case;




$case['descr'] = 'Хитрый случай с хаком для IE';
$case['descr-en'] = 'Comments: IE hack';
$case['link'] = 'comments-ie-hack';
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
$group['cases'][] = $case;




$case['descr'] = 'Хитрый случай';
$case['descr-en'] = 'Comments: Tricky case';
$case['link'] = 'comments-tricky-case';
$case['code'] = '.article BLOCKQUOTE P:before {
    position:absolute;
    margin:-47px 0 0 -36px;
    color:#C6BFBE;
    content:\'\201E\'; /* &bdquo; */
    line-height:1;
    font-size:70px;
    }';
$case['result'] = '.article BLOCKQUOTE P:before {
    position:absolute;
    margin:-47px 0 0 -36px;
    color:#C6BFBE;
    content:\'\201E\'; /* &bdquo; */
    line-height:1;
    font-size:70px;
    }';
$group['cases'][] = $case;


$case['descr'] = 'Внутри фигурных скобок селектора: все закоментировано и есть перенос строки';
$case['descr-en'] = 'Comments: All commented out and there is a line break';
$case['link'] = 'comments-all-commented-out-and-there-is-a-line-break';
$case['code'] = '.badges {
  /*margin: 0 10px 10px 10px;
  padding: 10px;*/
}';
$case['result'] = '.badges {
  /* margin: 0 10px 10px 10px; */
  /* padding: 10px; */
}';
$group['cases'][] = $case;


$case['descr'] = 'Внутри фигурных скобок селектора: все закоментировано и нет переноса строки';
$case['descr-en'] = 'Comments: All commented out and no a line break';
$case['link'] = 'comments-all-commented-out-and-no-a-line-break';
$case['code'] = '.badges {/*margin: 0 10px 10px 10px;padding: 10px;*/}';
$case['result'] = '.badges {/* margin: 0 10px 10px 10px; *//* padding: 10px; */}';
$group['cases'][] = $case;





$case['descr'] = 'Все закоментировано построчно';
$case['descr-en'] = 'Commented all by lines';
$case['link'] = 'comments-all-by-lines';
$case['code'] = '/* test comment 3 */
.one{
    padding:0;
    margin:0;
    }

/* test comment 4 */ /**/
.two{
    padding:0;
    margin:0;
    }

/*.about{*/
   /*width:50%;*/
   /*float:left;*/
   /*}*/

/* Multi stars comment **/
.class1 {
top: 1px;
}

/* Simple comment */
.class2 {
top: 1px;
}';
$case['result'] = '/* test comment 3 */
.one{
    margin:0;
    padding:0;
    }

/* test comment 4 */ /**/
.two{
    margin:0;
    padding:0;
    }

/*.about{*/
   /* float:left; */
   /* width:50%; */
   /*;}*/

/* Multi stars comment **/
.class1 {
top: 1px;
}

/* Simple comment */
.class2 {
top: 1px;
}';
$group['cases'][] = $case;
/*.about{*/
   /*width:50%;*/
   /*float:left;*/
   /*}*/









$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'selectors';
$group['group-name'] = 'Селекторы';
$group['group-name-en'] = 'Selectors';


$case['descr'] = 'CSS3-селекторы';
$case['descr-en'] = 'Selectors';
$case['link'] = 'selectors';
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
$group['cases'][] = $case;








$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'at-rules';
$group['group-name'] = 'Правила начинающиеся с @';
$group['group-name-en'] = 'Rules beginning with @';


$case['descr'] = '@media';
$case['descr-en'] = '@media';
$case['link'] = 'Rules-beginning-with-at-media';
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
		font-family: Times, \'Times New Roman\', serif; /* Шрифт с засечками */
	}

	H1, H2, P {
		top:0;
		color: #000; /* Черный цвет текста */
	}
}

@media screen { /* Стиль для экранов */

	BODY {
		top:0;
		font-family: Times, \'Times New Roman\', serif; /* Шрифт с засечками */
	}

	H1, H2, P {
		left:0;
		color: #000; /* Черный цвет текста */
	}

}

/* test */';
$group['cases'][] = $case;




$case['descr'] = '@font-face';
$case['descr-en'] = '@font-face';
$case['link'] = 'Rules-beginning-with-at-font-face';
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
$group['cases'][] = $case;



$case['descr'] = '@import';
$case['descr-en'] = '@import';
$case['link'] = 'Rules-beginning-with-at-import';
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
$group['cases'][] = $case;



$case['descr'] = '@-wekit-keyframes';
$case['descr-en'] = '@-webkit-keyframes';
$case['link'] = 'Rules-beginning-with-at-webkit-keyframes';
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
$group['cases'][] = $case;









$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'key-symbols';
$group['group-name'] = 'Ключевые символы';
$group['group-name-en'] = 'Key symbols';


$case['descr'] = 'Точка с запятой в data uri';
$case['descr-en'] = '; in data uri';
$case['link'] = 'key-symbols-data-uri';
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
$group['cases'][] = $case;


$case['descr'] = 'data uri с charset';
$case['descr-en'] = '; in data uri with charset';
$case['link'] = 'key-symbols-data-uri-with-charset';
$case['code'] = 'div{
	padding:10px 20px;
	display:block;
}
BODY {
	background:#cce7f5 url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IGZpbGw9IiNGRkYiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48cmVjdCBmaWxsPSIjY2NlN2Y1IiByeD0iMjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48L3N2Zz4=);
	color:#241412;
	padding:0;
	margin:0;
	}
	.test{
	    color:#fff;
	    position:relative;
	    }
div {
	background:#cce7f5 url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IGZpbGw9IiNGRkYiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48cmVjdCBmaWxsPSIjY2NlN2Y1IiByeD0iMjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48L3N2Zz4=);
	color:#241412;
	padding:0;
	margin:0;
	}';
$case['result'] = 'div{
	display:block;
	padding:10px 20px;
}
BODY {
	margin:0;
	padding:0;
	background:#cce7f5 url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IGZpbGw9IiNGRkYiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48cmVjdCBmaWxsPSIjY2NlN2Y1IiByeD0iMjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48L3N2Zz4=);
	color:#241412;
	}
	.test{
	    position:relative;
	    color:#fff;
	    }
div {
	margin:0;
	padding:0;
	background:#cce7f5 url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IGZpbGw9IiNGRkYiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48cmVjdCBmaWxsPSIjY2NlN2Y1IiByeD0iMjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiLz48L3N2Zz4=);
	color:#241412;
	}';
$group['cases'][] = $case;











$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'less';
$group['group-name'] = 'LESS';
$group['group-name-en'] = 'LESS';




/*
 *************************************************
 *                    LESS CSS                   *
 *************************************************
 */

$case['descr'] = 'LESS переменнные';
$case['descr-en'] = 'LESS variables';
$case['link'] = 'less-variables';
$case['code'] = '@nice-blue: #5B83AD;
@light-blue: @nice-blue + #111;
#header {
    font-size:12px;
    color: @light-blue;
    position:absolute;
    left:0;
    top:0;
    }';
$case['result'] = '@nice-blue: #5B83AD;
@light-blue: @nice-blue + #111;
#header {
    position:absolute;
    top:0;
    left:0;
    color: @light-blue;
    font-size:12px;
    }';
$group['cases'][] = $case;



$case['descr'] = 'LESS Mixins';
$case['descr-en'] = 'LESS Mixins';
$case['link'] = 'less-mixins';
$case['code'] = '.bordered {
    border-top: dotted 1px black;
    border-bottom: solid 2px black;
    }
#menu a {
    color: #111;
    .bordered;
    }
.post a {
    color: red;
    .bordered;
    }';
$case['result'] = '.bordered {
    border-top: dotted 1px black;
    border-bottom: solid 2px black;
    }
#menu a {
    color: #111;
    .bordered;
    }
.post a {
    color: red;
    .bordered;
    }';
$group['cases'][] = $case;



$case['descr'] = 'LESS вложенные правила';
$case['descr-en'] = 'LESS nested rules';
$case['link'] = 'less-nested-rules';
$case['code'] = '#header {
    color: black;

    .navigation {
        font-size: 12px;
        }

    .logo {
        width: 300px;
        :hover {
            text-decoration: none;
            }
        }
    }';
$case['result'] = '#header {
    color: black;

    .navigation {
        font-size: 12px;
        }

    .logo {
        width: 300px;
        :hover {
            text-decoration: none;
            }
        }
    }';
$group['cases'][] = $case;


$case['descr'] = 'LESS operations';
$case['descr-en'] = 'LESS operations';
$case['link'] = 'less-operations';
$case['code'] = 'div{
    @base: 5%;
    @filler: @base * 2;
    @other: @base + @filler;

    color: #888 / 4;
    background-color: @base-color + #111;
    height: 100% / 2 + @filler;
    }';
$case['result'] = 'div{
    @base: 5%;
    @filler: @base * 2;
    @other: @base + @filler;

    height: 100% / 2 + @filler;
    background-color: @base-color + #111;
    color: #888 / 4;
    }';
$group['cases'][] = $case;




$case['descr'] = 'LESS namespaces & accessors';
$case['descr-en'] = 'LESS namespaces & accessors';
$case['link'] = 'less-namespaces-and-accessors';
$case['code'] = '#bundle {
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
    color: .article[\'color\'];
    }';
$case['result'] = '#bundle {
    .button {
        display: block;
        border: 1px solid black;
        background-color: grey;
        :hover {
            background-color: white;
            }
        }
    .tab {margin:0;padding:0;}
    .citation {color:#000;font-size:10px;}
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
    color: .article[\'color\'];
    }';
$group['cases'][] = $case;



$case['descr'] = 'LESS scope';
$case['descr-en'] = 'LESS scope';
$case['link'] = 'less-scope';
$case['code'] = '@var: red;

#page {
    @var: white;
    #header {
        color: @var;
        }
    }';
$case['result'] = '@var: red;

#page {
    @var: white;
    #header {
        color: @var;
        }
    }';
$group['cases'][] = $case;




$case['descr'] = 'LESS комментарии';
$case['descr-en'] = 'LESS comments';
$case['link'] = 'less-comments';
$case['code'] = 'p {
    /* One hell of a comment */
    @var: red;

    // Get in line!
    @var: white;
    }';
$case['result'] = 'p {
    /* One hell of a comment */
    @var: red;

    // Get in line!
    @var: white;
    }';
$group['cases'][] = $case;




$case['descr'] = 'LESS комментарии. Вариант 2';
$case['descr-en'] = 'LESS comments. Option 2';
$case['link'] = 'less-comments-option-2';
$case['code'] = 'p {
    @var: red; /* One hell of a comment */
    @var: white; // Get in line!
    }';
$case['result'] = 'p {
    @var: red; /* One hell of a comment */
    @var: white; // Get in line!
    }';
$group['cases'][] = $case;



$case['descr'] = 'LESS и псевдоклассы';
$case['descr-en'] = 'LESS vs pseudo-classes';
$case['link'] = 'less-less-vspseudo-classes';
$case['code'] = 'a{
    color:red;
    a:hover{
        text-decoration:underline;
    }
}';
$case['result'] = 'a{
    color:red;
    a:hover{
        text-decoration:underline;
    }
}';
$group['cases'][] = $case;










$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'sass';
$group['group-name'] = 'SASS';
$group['group-name-en'] = 'SASS';





/*
 *************************************************
 *                   SASS                        *
 *      http://sass-lang.com/tutorial.html       *
 *************************************************
 */


$case['descr'] = 'SASS nesting';
$case['descr-en'] = 'SASS nesting';
$case['link'] = 'sass-nesting';
$case['code'] = '#navbar {
    height: 23px;
    width: 80%;
    top:0;
    ul {
        list-style-type: none;
        position:relative;
        }
    li {
        padding:0 10px;
        float: left;
        a {
            font-weight: bold;
            background-color:#333;
            }
        }
    }';
$case['result'] = '#navbar {
    top:0;
    width: 80%;
    height: 23px;
    ul {
        position:relative;
        list-style-type: none;
        }
    li {
        float: left;
        padding:0 10px;
        a {
            background-color:#333;
            font-weight: bold;
            }
        }
    }';
$group['cases'][] = $case;





$case['descr'] = 'SASS nesting. Вариант 2';
$case['descr-en'] = 'SASS nesting. Option 2';
$case['link'] = 'sass-nesting-2';
$case['code'] = '.fakeshadow {
  border: {
    style: solid;
    left: {
      width: 4px;
      color: #888;
    }
    right: {
      width: 2px;
      color: #ccc;
    }
  }';
$case['result'] = '.fakeshadow {
  border: {
    style: solid;
    left: {
      width: 4px;
      color: #888;
    }
    right: {
      width: 2px;
      color: #ccc;
    }
  }';
$group['cases'][] = $case;






$case['descr'] = 'SASS nesting parent references';
$case['descr-en'] = 'SASS nesting parent references';
$case['link'] = 'sass-nesting-parent-references';
$case['code'] = 'a {
    color: #ce4dd6;
    position: relative;
    &:hover {
        color: #ffb3ff;
        position: relative;
        }
    &:visited {
        color: #c458cb;
        position: relative;
        }
    }';
$case['result'] = 'a {
    position: relative;
    color: #ce4dd6;
    &:hover {
        position: relative;
        color: #ffb3ff;
        }
    &:visited {
        position: relative;
        color: #c458cb;
        }
    }';
$group['cases'][] = $case;





$case['descr'] = 'SASS переменные';
$case['descr-en'] = 'SASS variables';
$case['link'] = 'sass-variables';
$case['code'] = '$main-color: #ce4dd6;
$style: solid;

#navbar {
    border-bottom: {
        color: $main-color;
        style: $style;
        }
    }

a {
    color: $main-color;
    &:hover {
        border-bottom: $style 1px;
        }
    }';
$case['result'] = '$main-color: #ce4dd6;
$style: solid;

#navbar {
    border-bottom: {
        color: $main-color;
        style: $style;
        }
    }

a {
    color: $main-color;
    &:hover {
        border-bottom: $style 1px;
        }
    }';
$group['cases'][] = $case;






$case['descr'] = 'SASS операции и функции';
$case['descr-en'] = 'SASS operations and functions';
$case['link'] = 'sass-operations-and-functions';
$case['code'] = '#navbar {
    $navbar-width: 800px;
    $items: 5;
    $navbar-color: #ce4dd6;

    border-bottom: 2px solid $navbar-color;
    width: $navbar-width;

    li {
        width: $navbar-width/$items - 10px;
        float: left;

        background-color: lighten($navbar-color, 20%);
        &:hover {
            background-color: lighten($navbar-color, 10%);
            position: relative;
            }
        }
    }';
$case['result'] = '#navbar {
    $navbar-width: 800px;
    $items: 5;
    $navbar-color: #ce4dd6;

    width: $navbar-width;
    border-bottom: 2px solid $navbar-color;

    li {
        float: left;
        width: $navbar-width/$items - 10px;

        background-color: lighten($navbar-color, 20%);
        &:hover {
            position: relative;
            background-color: lighten($navbar-color, 10%);
            }
        }
    }';
$group['cases'][] = $case;






$case['descr'] = 'SASS mixins';
$case['descr-en'] = 'SASS mixins';
$case['link'] = 'sass-mixins';
$case['code'] = '@mixin rounded-top {
    $side: top;
    $radius: 10px;

    -webkit-border-#{$side}-radius: $radius;
    -moz-border-radius-#{$side}: $radius;
    border-#{$side}-radius: $radius;
    }

#navbar li {
    @include rounded-top;
    }

#footer {
    @include rounded-top;
    }';
$case['result'] = '@mixin rounded-top {
    $side: top;
    $radius: 10px;

    -webkit-border-#{$side}-radius: $radius;
    -moz-border-radius-#{$side}: $radius;
    border-#{$side}-radius: $radius;
    }

#navbar li {
    @include rounded-top;
    }

#footer {
    @include rounded-top;
    }';
$group['cases'][] = $case;






$case['descr'] = 'SASS @import';
$case['descr-en'] = 'SASS @import';
$case['link'] = 'sass-import';
$case['code'] = '@mixin rounded($side, $radius: 10px) {
    -webkit-border-#{$side}-radius: $radius;
    -moz-border-radius-#{$side}: $radius;
    border-#{$side}-radius: $radius;
    }

@import "rounded";

#navbar li {@include rounded(top);}
#footer {@include rounded(top, 5px);}
#sidebar {@include rounded(left, 8px);}';
$case['result'] = '@mixin rounded($side, $radius: 10px) {
    -webkit-border-#{$side}-radius: $radius;
    -moz-border-radius-#{$side}: $radius;
    border-#{$side}-radius: $radius;
    }

@import "rounded";

#navbar li {@include rounded(top);}
#footer {@include rounded(top, 5px);}
#sidebar {@include rounded(left, 8px);}';
$group['cases'][] = $case;








$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'real-files';
$group['group-name'] = 'Примеры файлов';
$group['group-name-en'] = 'Real files';



/*
 *************************************************
 *             real-life files                   *
 *************************************************
 */



$case['descr'] = 'Пример файла: http://pepelsbey.net/wp-content/themes/pepelsbey/s/screen.css 2011/01/18';
$case['descr-en'] = 'File example: http://pepelsbey.net/wp-content/themes/pepelsbey/s/screen.css 2011/01/18';
$case['link'] = 'file-examples-pepelsbey';
$case['code'] = "@import url(reset.css);
@import url(fonts.css);

BODY {
	background:#402724 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFJREFUCFtjYfBiYfgFRr9R0V8Whj8w9BeM/sFICPoPJAFgpxRXg6BKBgAAAABJRU5ErkJggg==) repeat-x;
	color:#241412;
	font:13px/22px 'Helvetica Neue','Helvetica','Arial',sans-serif;
	}
A {
	text-decoration:none;
	}

/* Header
---------------------------------------- */
.header-wrap {
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUCFtjYGBiAiFGMAlBzDASiFhgCMhmRUVsQAQADBEAc1g+jvkAAAAASUVORK5CYII=) 0 100% repeat-x;
	}
	.header {
		position:relative;
		margin:auto;
		width:610px;
		line-height:1;
		}
	.header:after {
		clear:both;
		display:block;
		height:0;
		content:'';
		}

/* Title */
.header > :first-child {
	position:absolute;
	top:50%;
	margin-top:-18px;
	color:#FFF;
	text-shadow:0 0 5px rgba(0,0,0,0.7);
	font:30px 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.header > :first-child A {
		color:#FFF;
		-webkit-transition:text-shadow 0.2s linear;
		-moz-transition:text-shadow 0.2s linear;
		-o-transition:text-shadow 0.2s linear;
		}
	.header > :first-child A:hover {
		text-shadow:0 0 20px rgba(255,255,255,0.3);
		}
	.header > :first-child SPAN {
		position:absolute;
		margin:-10px 0 0 -65px;
		width:60px;
		height:60px;
		background:url(data:image/png;base64,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) no-repeat;
		}

/* Menu */
.header UL,
.header UL LI {
	background:url(data:image/gif;base64,R0lGODlhAQAKAIAAAFM9OgAAACH5BAAAAAAALAAAAAABAAoAAAIDhI8FADs=) no-repeat;
	}
.header UL {
	float:right;
	background-position:0 43px;
	}
	.header UL LI {
		float:left;
		margin-left:-1px;
		background-position:100% 43px;
		}
		.header UL LI A {
			display:block;
			padding:42px 20px 40px;
			color:#FFF;
			text-transform:uppercase;
			text-shadow:0 1px 1px #402724;
			font-size:11px;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
		.header UL LI A:hover {
			background:#2D1B19;
			}
	.header UL .current {
		position:relative;
		border:1px solid #CC3D3D;
		border-width:0 1px;
		background:#BB0000 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAABYCAIAAAC79grhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADBJREFUGJVj2s3AwPQfiBmg+D8SzYhFjpGAGmIwNvtw8QmJE5Ij1V3/sbDxuZmAuwDYPxZaMTG+OAAAAABJRU5ErkJggg==) 0 100% repeat-x;
		}
		.header UL .current A,
		.header UL .current A:hover {
			margin-bottom:-1px;
			padding:42px 19px 41px;
			background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAJCAYAAAA7KqwyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAH9JREFUKFOVjNEKQEAQRX22Uv5NURSh5IFdtDY+42q084DdxdSpaebeEwAIPIQGZ+atzOOUeMtyHCGGgSXRVwEFMQmBLElOaHdJrOVFShRpeoFuNsmjrOYZVZ5bod9dcilrpdCUpRfKmIlZQAu2dUVX15+gLEtIgF1r9G37C5YcY8HghAKqNLsAAAAASUVORK5CYII=) 50% 100% no-repeat;
			}

/* Article
---------------------------------------- */
.article-wrap {
	background:#FFF url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAEhJREFUCFttjDEKgDAAxO5y7f/f5uJPbGsRdKmTLiEQiCRJ+7bdABckkySTlDIpyUlqHZRkYLtj6Mvs9gE0bB+/VcvegdSxPR6yfRxKh5xqMwAAAABJRU5ErkJggg==) repeat-x;
	}
	.article {
		margin:auto;
		padding:30px 0 15px;
		width:610px;
		}
	.article:after {
		clear:both;
		display:block;
		content:'';
		}

/* Elements */
.article H1,
.article H2,
.article H3 {
	clear:both;
	margin:0 0 15px;
	color:#402724;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
.article P {
	margin:0 0 15px;
	}
.article A {
	color:#D00;
	}
.article A:hover {
	color:#E57373;
	}
.article B,
.article STRONG {
	font-weight:bold;
	}
.article I,
.article EM {
	font-style:italic;
	}

/* Header */
.article > HEADER {
	margin:0 0 15px;
	}
	.article > HEADER > :first-child {
		margin:0;
		}
		.article > HEADER > :first-child A {
			color:#402724;
			-webkit-transition:color 0.2s linear;
			-moz-transition:color 0.2s linear;
			-o-transition:color 0.2s linear;
			}
			.article > HEADER > :first-child A SPAN {
				position:absolute;
				margin:3px 0 0 -60px;
				width:50px;
				height:16px;
				background-color:#C00;
				background-position:-1px -1px;
				-webkit-transition:background-color 0.2s linear;
				-moz-transition:background-color 0.2s linear;
				-o-transition:background-color 0.2s linear;
				}
		.article > HEADER > :first-child A:hover {
			color:#C00;
			}
			.article > HEADER > :first-child A:hover SPAN {
				background-color:#E00;
				}
	.article > HEADER TIME {
		color:#837674;
		font-size:11px;
		}

/* Lists */
.article UL {
	margin:0 0 15px;
	}
	.article UL LI:before {
		position:absolute;
		margin:0 0 0 -18px;
		color:#D6D1D1;
		content:'\2022';
		font-size:22px;
		}
.article OL {
	margin:0 0 15px;
	counter-reset:list;
	}
	.article OL LI:before {
		position:absolute;
		margin-left:-48px;
		width:40px;
		color:#B3A9A7;
		content:counter(list)'.';
		counter-increment:list;
		text-align:right;
		}

/* Code Inline */
.article VAR,
.article KBD,
.article CODE,
.article SAMP {
	padding:2px 4px;
	background:#ECEAEA;
	color:#533D3A;
	font-family:Consolas,monospace;
	}
.article ABBR {
	display:inline;
	border-bottom:dotted 1px;
	}

/* Code Block */
.article PRE {
	clear:both;
	margin:0 0 15px -60px;
	padding:12px 0 12px 59px;
	border-left:1px solid #D9D4D3;
	background:#ECEAEA;
	color:#533D3A;
	counter-reset:code;
	white-space:normal;
	font:12px/20px Consolas,monospace;
	}
	.article PRE CODE {
		display:block;
		padding:0;
		white-space:pre-wrap;
		}
	.article PRE CODE:before {
		position:absolute;
		margin-left:-35px;
		color:#B3A9A7;
		content:counter(code,decimal-leading-zero)'.';
		counter-increment:code;
		}

/* Quote */
.article Q {
	font-style:italic;
	font-family:Georgia,serif;
	}
.article Q:before {
	content:'\00AB';
	}
	.article Q Q:before {
		content:'\201E';
		}
.article Q:after {
	content:'\00BB';
	}
	.article Q Q:after {
		content:'\201C';
		}

/* Blockquote */
.article BLOCKQUOTE {
	clear:both;
	margin:0 0 15px -60px;
	padding:12px 20px 12px 59px;
	border-left:1px solid #D9D4D3;
	background:#ECEAEA;
	color:#533D3A;
	font-family:'Georgia','Times',serif;
	}
	.article BLOCKQUOTE P {
		margin:0;
		}
	.article BLOCKQUOTE P:before {
		position:absolute;
		margin:-47px 0 0 -36px;
		color:#C6BFBE;
		content:'\201E';
		line-height:1;
		font-size:70px;
		}

/* Figure */
.article FIGURE {
	float:left;
	margin:5px 0 20px -60px;
	}
	.article FIGURE IMG {
		float:left;
		margin:0 10px 10px 0;
		}
	.article FIGURE > A[rel=darkbox]:before {
		position:absolute;
		display:none;
		margin:8px 0 0 8px;
		width:20px;
		height:20px;
		background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAB8klEQVR42q1VTUtCQRR9CoYl1AOhtOcfqMCNpo+saBH4OzIMceFeQVDwjwj9ASHKaisibgMXgpsINRQXbrLwOd1jd8L8fJAXDtzunHNec+fOqCwIK8FG2CKoBCdD5ZqNOSvDwuRtgkY4IPgJJww/1zTm2KARQijAPDM7YZdwFI1GI6VS6aHZbL6ORiMDQI4a1sBhrp1NZ8w2CfuEYKFQuP2iIBNhGIYYDofAOEcNa+CAC400nTTbILjcbvd5o9F4gQgG9Xq9mMvlblRVPQOQo4Y1cMCFhrR78JCmVm62t1KpFEHs9/utfD6fpprOffMBnOtYAwfccrl8Dy1hZ+zFzp5EIhEzKPD1dDodZbNjNgky/FzTs9lsDFxo4vE4+B72UhxoMH3pEV+s1Wp3E2YBwqngQA5jaQouNDgo+vuQR0pRQeh2u+9oeiaTuZbbY4OwNESOmmwDegpNp9NpcU1VeGBDw58QmqZdsGFALAisgaPrehiawWDwwXPq/Jeh1+u9hOaTQhr+brnX63Xw76dSqSuzW0Z7ZrfMh0Ij82zyUALTh4ID5UNxzB2bZDIZWTU2GC05NtDKsfkz2NVq9WnOYPsmMT3YuAzQsofV1NWTr82Sq+eSV29djwO0FlPPV7vdfhMcyJc/X+Yf2BBg5oFd+0/AN0yzD+RphwJXAAAAAElFTkSuQmCC) no-repeat;
		content:'';
		}
	.article FIGURE > A[rel=darkbox]:hover:before {
		display:block;
		}
	.article FIGURE FIGCAPTION {
		clear:both;
		padding:0 30px 0 60px;
		color:#7A6866;
		line-height:15px;
		font-size:11px;
		}
.article FIGURE.small {
	width:260px;
	}
.article FIGURE.medium {
	width:380px;
	}
.article FIGURE.large {
	clear:both;
	width:670px;
	}

/* Video */
.article .video-player {
	display:block;
	margin:0 0 15px;
	}

/* Footer */
.article > FOOTER {
	}
	.article > FOOTER A {
		color:#188418;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
		.article > FOOTER A SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:26px;
			background-color:#188418;
			background-position:-1px -18px;
			}
	.article > FOOTER A:hover {
		color:#1C9E1C;
		}
		.article > FOOTER A:hover SPAN {
			background-color:#1C9E1C;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
	.article > FOOTER SMALL {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Aside
---------------------------------------- */
.aside-wrap {
	background:#FFF;
	}
	.aside {
		margin:auto;
		padding:0 0 15px;
		width:610px;
		}

/* Title */
.aside HEADER {
	margin:-20px 0 20px;
	border-bottom:1px solid #D8D4D3;
	color:#C6BFBE;
	text-align:center;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.aside HEADER H2 {
		position:relative;
		top:10px;
		display:inline;
		padding:0 10px;
		background:#FFF;
		}

/* List */
.aside OL {
	overflow:hidden;
	margin:0 0 20px;
	border-bottom:1px solid #D8D4D3;
	}
	.aside OL LI {
		margin:0 0 18px;
		}
	.aside OL LI A {
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
		.aside OL LI A SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:16px;
			background-color:#D9D4D3;
			background-position:-1px -1px;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
	.aside OL LI A:hover {
		color:#C00;
		}
		.aside OL LI A:hover SPAN {
			background-color:#C00;
			}
	.aside OL LI TIME {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Next */
.aside > FOOTER {
	padding:0 0 15px;
	color:#C6BFBE;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.aside > FOOTER SPAN {
		display:none;
		cursor:pointer;
		color:#C00;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
	.aside > FOOTER SPAN:hover {
		color:#E57373;
		}

/* Aside JS */
#js .aside OL {
	display:none;
	}
#js .aside OL:first-of-type {
	display:block;
	}
#js .aside > FOOTER SPAN {
	display:inline;
	}

/* Comments
---------------------------------------- */
.comments {
	}

/* Header */
.comments > HEADER {
	padding:15px 0;
	}
	.comments > HEADER H3 {
		display:inline;
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		}
		.comments > HEADER H3 SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:26px;
			background-color:#188418;
			background-position:-1px -18px;
			}
	.comments > HEADER SMALL {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Article */
.comments > ARTICLE {
	position:relative;
	padding:15px 0 2px 180px;
	min-height:50px;
	border-top:1px solid #D9D4D3;
	}
	.comments > ARTICLE FOOTER {
		position:absolute;
		top:15px;
		left:0;
		overflow:hidden;
		width:160px;
		white-space:nowrap;
		}
		.comments > ARTICLE FOOTER TIME {
			display:block;
			line-height:1;
			font-size:11px;
			}
			.comments > ARTICLE FOOTER TIME A {
				color:#8C7D7C;
				}

/* Elements */
.comments P {
	margin:0 0 15px;
	}

/* Blockquote */
.comments BLOCKQUOTE {
	margin:0 0 15px;
	padding:5px 10px 5px;
	}
	.comments BLOCKQUOTE P:before {
		content:'';
		}

/* Blockcode */
.comments PRE {
	margin:0 0 15px;
	padding:5px 10px 5px;
	}
	.comments PRE CODE:before {
		content:'';
		}

/* Form
---------------------------------------- */
.form {
	padding:0 0 15px;
	}
	.form INPUT[type=email],
	.form INPUT[type=text],
	.form INPUT[type=url],
	.form TEXTAREA {
		display:block;
		margin:0;
		border:1px solid;
		border-color:#C6BFBE #E3DFDE #E3DFDE #C6BFBE;
		background:#ECEAEA;
		color:#533D3A;
		}
	.form TEXTAREA {
		margin:0 0 15px;
		width:430px;
		line-height:22px;
		}
	.form INPUT[type=submit] {
		clear:both;
		display:block;
		padding:5px 15px;
		border:1px solid #2e8a2e;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
		border-radius:5px;
		background:#188418 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAeCAYAAADtlXTHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAC9JREFUeNpi+v//fwMTAwPDHxDxC078hBPfQcQPVBaC+AnX8ZsBaBQDiEU5ARBgALXSFFMVb0VqAAAAAElFTkSuQmCC) 0 50% repeat-x;
		color:#FFF;
		text-shadow:0 1px 1px #333;
		cursor:pointer;
		-webkit-transition:background-color 0.2s linear;
		-moz-transition:background-color 0.2s linear;
		-o-transition:background-color 0.2s linear;
		}
	.form INPUT[type=submit]:hover {
		background-color:#1C9E1C;
		}
	.form INPUT[type=submit]:active {
		background:#188418;
		}

/* Comment */
.form-comment {
	padding-left:180px;
	border-top:1px solid #D9D4D3;
	}
	.form-comment LEGEND {
		padding:15px 0;
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		}
	.form-comment DL {
		margin:0 0 15px;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
		border-radius:5px;
		border:1px solid #F7F2CF;
		background:#FFF9C7;
		color:#402724;
		line-height:14px;
		font-size:11px;
		}
		.form-comment DL DT {
			padding:7px 10px 6px;
			}
		.form-comment DL DD {
			padding:0 10px 8px;
			}
		.form-comment DL CODE {
			padding:0;
			background:none;
			}
	.form-comment .subscription {
		padding:0 0 15px;
		}
	.form-comment .details {
		float:left;
		}
		.form-comment .details INPUT {
			float:left;
			margin:0 5px 15px 0;
			width:250px;
			}
		.form-comment .details INPUT:focus+LABEL {
			color:#533D3A;
			}
		.form-comment .details LABEL {
			float:left;
			color:#8C7D7C;
			}

/* Comment JS */
#js .form-comment DL DT {
	position:relative;
	padding-left:22px;
	cursor:pointer;
	}
#js .form-comment DL DT:before {
	position:absolute;
	top:50%;
	left:9px;
	margin:-4px 0 0;
	width:9px;
	height:9px;
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAJCAYAAAA/33wPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAIJJREFUKM9jcFBXYQDi1UAsCmWThWGM/0D8FoijcCg8AFWDC69ANgiGtwCxNJpBKkD8DYchr4BYCJtBIPwBiNPQDCvFYVAIutew4RYkg5iB+Dya/GpsYUTIRSBsAMR/kMJUAp9BG7GEETJuh6qLxRVroEALJyKq2YC4F1f0L6U0HQEAZveWBACUFTUAAAAASUVORK5CYII=) no-repeat;
	content:'';
	}
#js .form-comment DL DD {
	display:none;
	}
#js .form-comment DL.on DT:before {
	background-position:-9px 0;
	}
#js .form-comment DL.on DD {
	display:block;
	}

/* Search */
.form-search {
	}
	.form-search INPUT[type=text] {
		margin:0 0 15px;
		width:606px;
		font-size:22px;
		}

/* Footer
---------------------------------------- */
.footer-wrap {
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAOUlEQVQI1wXBIQqAMAAAwEM2RAYiDAwLC4LFsrJiMZn2/wftjsHPx0un8XBzUSmcZA52EhsrkcAyAW3EAn9Qy3GQAAAAAElFTkSuQmCC) repeat-x;
	}
	.footer {
		margin:auto;
		padding:15px 0;
		width:610px;
		color:#665250;
		text-shadow:0 0 5px rgba(0,0,0,0.4);
		font-size:11px;
		}
	.footer:after {
		display:block;
		height:0;
		content:'';
		clear:both;
		}
		.footer A {
			border-bottom:1px solid #533D3A;
			color:#665250;
			-webkit-transition:color 0.2s linear;
			-moz-transition:color 0.2s linear;
			-o-transition:color 0.2s linear;
			}
		.footer A:hover {
			color:#8C7D7C;
			}

/* Copyright */
.footer P {
	float:left;
	}

/* Links */
.footer UL {
	float:right;
	}
	.footer UL LI {
		float:left;
		margin-left:8px;
		}

/* Flag Image
---------------------------------------- */
.article > HEADER > :first-child A SPAN,
.article > FOOTER A SPAN,
.aside OL LI A SPAN,
.comments > HEADER H3 SPAN {
	background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAtCAYAAADhoUi4AAABRElEQVR42u3YwQYCURQG4GGIiB6gbcSsopfoYWKYVcTQA/QeMczDRMwDRKuIVrOqIzf/SI50i3N+Hf7NrO7n3jlzzyRXsnqASkniPQABRQJCrYhAQPGAUEsjCxxJtpJDyDY800FGURPJ6XlR4VmmgoyiKmVdtQoyijora7r8QQY6Xh115Ay27+ybTaE01LYryTGk+qRtlyQfVmBYQGuSyykwHCCi0kCNpJDMJKmhHUjDmgpJ8y5oI+k7OF59yUYDtZK5w/dmLmlfgXLHzaB4Bu2Ud8XDgJdK9gApu+NowCu6oIkBQOyAl3VBPQOA2HloyAYadEFjg6A65sgtDABiB7xcbdvOBrz0bgAIu+Q0Od3Vh/hyqo8PU4OQqT4+/Khi/iZFD3gGUF5BQBGBgCICAUUEAooIBBQRCCgiEFBEIKDiQGR1A9eb3JNCdVgPAAAAAElFTkSuQmCC);
	background-repeat:no-repeat;
	}

/* Darkbox
---------------------------------------- */
.darkbox {
	position:fixed;
	top:0;
	left:0;
	z-index:999;
	display:none;
	overflow:hidden;
	width:100%;
	height:100%;
	}
	.darkbox .darkbox-shadow {
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		background:#000;
		}
	.darkbox .darkbox-canvas {
		position:absolute;
		top:50%;
		left:50%;
		overflow:hidden;
		margin:-40px 0 0 -40px;
		width:80px;
		height:80px;
		-webkit-border-radius:15px;
		-moz-border-radius:15px;
		border-radius:15px;
		background:#000 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAGoCAMAAAAQMBfHAAABtlBMVEX///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8cWrVBAAAAkXRSTlMAKUfghaPCZkAlPw7nsHiUy1w3VBcoLEoiNsAw/EbdoYNlGSYIFEUdDEgS2yENIMi9CnfkLhUnkhutW5/5gGSCAgsyaZlEsVA4yQQfAxM9Khh/AWEPm7nVEfNCtB4kNDnGSU+JM5dznmAtXkuQO3JnTlhiWp2nIwf2rtgcPha7UYxf4avt0DUGpjp1eXwvTBBjhUW/zwAABtxJREFUeF7tmtlXE0kUxm/2zr5gwhI3QiAsCXtCQFED4gKCIKIgoo7ruI0zOjNuo7Pva/7jqTq3iy9dOc05eclT/94434/qk6fbt74mK6GLF0N0EJF6PXKgUBcgAJfLzcJyHvkjz/VOXQhXXAWVX/Z4PCOdViHsEqgz1q+zAYHzyjKZdB4VxtEbIpiq16dEPuiShEkCIyGSoUhkSAh7Ik6bOYwx/BlUORhIJNYg1ILBErWP7Fm/5GzWGgxfcEsuDFPUz0StguFmDJo1hVmrEDKFEKX4iGjKKvTzEUY/tY/pjY00gkLy+z1r3n3M54tD+CIQ6O3Tc9+MSIqLi0UWlIH8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) 24px 24px no-repeat;
		}
		.darkbox .darkbox-canvas IMG {
			display:block;
			visibility:hidden;
			}
	.darkbox .darkbox-button {
		position:absolute;
		top:-13px;
		z-index:1;
		display:none;
		overflow:hidden;
		width:30px;
		height:30px;
		background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAQAAACROWYpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAy1JREFUOI2NlU1IG1EQx8e4icbYWMNKUoWwIMFvEFIPVdGezJbQghRRPIg2UCgBz7lYEKHXnj16yVEQcrKiJ0FBvQg9eIhIEDEHP9BY8uX0/3Y32c1HP94EMpmZ35t57817IcLgCqEGiI0aIRJEfNs0W/1RAdpIOvA+LOcTxRMucKF4kk88LB94MY2t7gRWcL0ts/J8z1Xj+T6zst5Wd4Iyat9T8kcieIvnOcgSJAhtS5sgf7SnkL0G19BGcmwHiinmIw5z1TbAIuYsprYD5EBkBS6yOmY8uWPmBMs1qBAZHubc8YwHeEV2FEyu9JrI2l4XFdKuZU+vkUsrvpxXImdMKd5yueAYq2VIxa9S8Sj9NqaQE0RDKa+D3D+jomQ96CuCngxchcaw6B5R+nmM3Frp2pCoheS7HeYvRsiitrsC11HmiOGZh363QzIILXcDVuCmzl/nzD3lUnU8C7GixF1i066pC4RdwDZqJg8phQfml5btWSw3SMRibRINkyMFRLMovBHL76BANawaWbOWrSN+AUvhiQIgnCDxcZGXejMX1rJLay2tvWTvwe/MBfWCcAlYolbyUd/lPvPnKnTRsnXmhl3uUz+9AiWV4a1vlUclUHPt1qP68R2wT4eNskfUXMZsklUD1fFVS5PkMq/fmWUbG0ZvdjeYD//anoeAdzdo1Nww46goKIfTSXEZ3XVRt3Yx00n/ewqaR2U0CQ3Q5FTk8UZcDrUGVbVL8XgzFaFJGjSbxGhP6qYRCoWiV0n9MZjlYQ0bhqY/BlfJUJRCiOo229O4GMjdR2MU9i0kNrPmIRsj+5TY9C1QGBF9iLRcDO1KYhV+GqJxBMwOROPxs9PrlMCuU2en8fhAlGbhGUeEH5GWK2k8BihGgXMMpU3THC3QEn2CLEGbgyUEzxAi5MrHwHjBcOwy5u3HqiZJpQ8APkKmoamwjMDjR0RrvVdM4C6U1IkNGcRxjNIEvYVMQAvC0g2PBxE1aAm3YzVuzN6F8gLoo35ILzQFFhkeJyLqoKU3VKImHIMbOTrQgj6IF5oHlhZ4/vSvUTGBHf3jRImtEBe0Zlj+AZoT/Ocf3W8M2nFgGCB/ewAAAABJRU5ErkJggg==) no-repeat;
		cursor:pointer;
		}
	.darkbox .darkbox-button-left {
		left:-16px;
		}
	.darkbox .darkbox-button-right {
		right:-16px;
		}

/* Darkbox On
---------------------------------------- */
.darkbox-on {
	display:block;
	}

/* Darkbox Loaded
---------------------------------------- */
.darkbox-loaded {
	}
	.darkbox-loaded .darkbox-canvas {
		overflow:visible;
		height:auto;
		-webkit-border-radius:0;
		-moz-border-radius:0;
		border-radius:0;
		background:none;
		}
		.darkbox-loaded .darkbox-canvas IMG {
			width:100%;
			visibility:visible;
			}

/* Darkbox Error
---------------------------------------- */
.darkbox-error {
	}
	.darkbox-error .darkbox-canvas {
		background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAAAAABWESUoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAJ0Uk5TAEQHIkixAAABv0lEQVQYGWXBQWcjcRzH4d+L+xpDRVRYETGXqt5W9FI9xFIVvfae64i11IgosfoGeqtaZawcwlgrlxE1Qvx99j+zk5lUn8fU6N48pmtc+vpwrZapNkgKGtvFUDVTJYgdH+xnJ6qYStEbn6wGKpm8wYZSHl+fS9Hl9w2l7bk8k9TP8HZ3oQ4mG7w8kmRSuKIyU6uzxHsLJZOm1CY6kuDFkqlfAE9vwH6kI0vADWRaAH86/Q2QR2p1MiCRdQrgVrrYAauuWjdAcWoTIAskjfGeAzWCDBjbHJipNMWbqxUDc/sFjFRZ4t2rMQJSy4EvqoQvgLvSQQ/IbQ8u0H+9DHg/Uy1w4MyBC1Q7eweynmp72FsO9HRw5YCXUJUusLUUGKlxj/dTlRGQ2hyI1UrwpirNgIWNgXWgRvCMN5a3BiZ2WgDf1OqugN2FNAaKjikBso5aUQ5s+p01sJBp4IBHHfm6B9InoOjLpBjvQUcm1KaSSWGKtzxRa0ZlFUomKcrx1mMdhHc7vKwvyeRdbCn9jS+H0vl1nFPaDOWZStGaT35HKpkqJz8cH7g4VMVUGz4WNHbJUDVTo3uTvKaOLF3enqrxD+aQUnwgKhDtAAAAAElFTkSuQmCC);
		}

/* Darkbox Done
---------------------------------------- */
.darkbox-done {
	}
	.darkbox-done .darkbox-button {
		display:block;
		}";






















$case['result'] = "@import url(reset.css);
@import url(fonts.css);

BODY {
	background:#402724 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACFJREFUCFtjYfBiYfgFRr9R0V8Whj8w9BeM/sFICPoPJAFgpxRXg6BKBgAAAABJRU5ErkJggg==) repeat-x;
	color:#241412;
	font:13px/22px 'Helvetica Neue','Helvetica','Arial',sans-serif;
	}
A {
	text-decoration:none;
	}

/* Header
---------------------------------------- */
.header-wrap {
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUCFtjYGBiAiFGMAlBzDASiFhgCMhmRUVsQAQADBEAc1g+jvkAAAAASUVORK5CYII=) 0 100% repeat-x;
	}
	.header {
		position:relative;
		margin:auto;
		width:610px;
		line-height:1;
		}
	.header:after {
		clear:both;
		display:block;
		height:0;
		content:'';
		}

/* Title */
.header > :first-child {
	position:absolute;
	top:50%;
	margin-top:-18px;
	color:#FFF;
	text-shadow:0 0 5px rgba(0,0,0,0.7);
	font:30px 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.header > :first-child A {
		color:#FFF;
		-webkit-transition:text-shadow 0.2s linear;
		-moz-transition:text-shadow 0.2s linear;
		-o-transition:text-shadow 0.2s linear;
		}
	.header > :first-child A:hover {
		text-shadow:0 0 20px rgba(255,255,255,0.3);
		}
	.header > :first-child SPAN {
		position:absolute;
		margin:-10px 0 0 -65px;
		width:60px;
		height:60px;
		background:url(data:image/png;base64,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) no-repeat;
		}

/* Menu */
.header UL,
.header UL LI {
	background:url(data:image/gif;base64,R0lGODlhAQAKAIAAAFM9OgAAACH5BAAAAAAALAAAAAABAAoAAAIDhI8FADs=) no-repeat;
	}
.header UL {
	float:right;
	background-position:0 43px;
	}
	.header UL LI {
		float:left;
		margin-left:-1px;
		background-position:100% 43px;
		}
		.header UL LI A {
			display:block;
			padding:42px 20px 40px;
			color:#FFF;
			text-transform:uppercase;
			text-shadow:0 1px 1px #402724;
			font-size:11px;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
		.header UL LI A:hover {
			background:#2D1B19;
			}
	.header UL .current {
		position:relative;
		border:1px solid #CC3D3D;
		border-width:0 1px;
		background:#BB0000 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAABYCAIAAAC79grhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADBJREFUGJVj2s3AwPQfiBmg+D8SzYhFjpGAGmIwNvtw8QmJE5Ij1V3/sbDxuZmAuwDYPxZaMTG+OAAAAABJRU5ErkJggg==) 0 100% repeat-x;
		}
		.header UL .current A,
		.header UL .current A:hover {
			margin-bottom:-1px;
			padding:42px 19px 41px;
			background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAJCAYAAAA7KqwyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAH9JREFUKFOVjNEKQEAQRX22Uv5NURSh5IFdtDY+42q084DdxdSpaebeEwAIPIQGZ+atzOOUeMtyHCGGgSXRVwEFMQmBLElOaHdJrOVFShRpeoFuNsmjrOYZVZ5bod9dcilrpdCUpRfKmIlZQAu2dUVX15+gLEtIgF1r9G37C5YcY8HghAKqNLsAAAAASUVORK5CYII=) 50% 100% no-repeat;
			}

/* Article
---------------------------------------- */
.article-wrap {
	background:#FFF url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAbCAYAAAC9WOV0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAEhJREFUCFttjDEKgDAAxO5y7f/f5uJPbGsRdKmTLiEQiCRJ+7bdABckkySTlDIpyUlqHZRkYLtj6Mvs9gE0bB+/VcvegdSxPR6yfRxKh5xqMwAAAABJRU5ErkJggg==) repeat-x;
	}
	.article {
		margin:auto;
		padding:30px 0 15px;
		width:610px;
		}
	.article:after {
		clear:both;
		display:block;
		content:'';
		}

/* Elements */
.article H1,
.article H2,
.article H3 {
	clear:both;
	margin:0 0 15px;
	color:#402724;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
.article P {
	margin:0 0 15px;
	}
.article A {
	color:#D00;
	}
.article A:hover {
	color:#E57373;
	}
.article B,
.article STRONG {
	font-weight:bold;
	}
.article I,
.article EM {
	font-style:italic;
	}

/* Header */
.article > HEADER {
	margin:0 0 15px;
	}
	.article > HEADER > :first-child {
		margin:0;
		}
		.article > HEADER > :first-child A {
			color:#402724;
			-webkit-transition:color 0.2s linear;
			-moz-transition:color 0.2s linear;
			-o-transition:color 0.2s linear;
			}
			.article > HEADER > :first-child A SPAN {
				position:absolute;
				margin:3px 0 0 -60px;
				width:50px;
				height:16px;
				background-color:#C00;
				background-position:-1px -1px;
				-webkit-transition:background-color 0.2s linear;
				-moz-transition:background-color 0.2s linear;
				-o-transition:background-color 0.2s linear;
				}
		.article > HEADER > :first-child A:hover {
			color:#C00;
			}
			.article > HEADER > :first-child A:hover SPAN {
				background-color:#E00;
				}
	.article > HEADER TIME {
		color:#837674;
		font-size:11px;
		}

/* Lists */
.article UL {
	margin:0 0 15px;
	}
	.article UL LI:before {
		position:absolute;
		margin:0 0 0 -18px;
		color:#D6D1D1;
		content:'\2022';
		font-size:22px;
		}
.article OL {
	margin:0 0 15px;
	counter-reset:list;
	}
	.article OL LI:before {
		position:absolute;
		margin-left:-48px;
		width:40px;
		color:#B3A9A7;
		content:counter(list)'.';
		counter-increment:list;
		text-align:right;
		}

/* Code Inline */
.article VAR,
.article KBD,
.article CODE,
.article SAMP {
	padding:2px 4px;
	background:#ECEAEA;
	color:#533D3A;
	font-family:Consolas,monospace;
	}
.article ABBR {
	display:inline;
	border-bottom:dotted 1px;
	}

/* Code Block */
.article PRE {
	clear:both;
	margin:0 0 15px -60px;
	padding:12px 0 12px 59px;
	border-left:1px solid #D9D4D3;
	background:#ECEAEA;
	color:#533D3A;
	counter-reset:code;
	white-space:normal;
	font:12px/20px Consolas,monospace;
	}
	.article PRE CODE {
		display:block;
		padding:0;
		white-space:pre-wrap;
		}
	.article PRE CODE:before {
		position:absolute;
		margin-left:-35px;
		color:#B3A9A7;
		content:counter(code,decimal-leading-zero)'.';
		counter-increment:code;
		}

/* Quote */
.article Q {
	font-style:italic;
	font-family:Georgia,serif;
	}
.article Q:before {
	content:'\00AB';
	}
	.article Q Q:before {
		content:'\201E';
		}
.article Q:after {
	content:'\00BB';
	}
	.article Q Q:after {
		content:'\201C';
		}

/* Blockquote */
.article BLOCKQUOTE {
	clear:both;
	margin:0 0 15px -60px;
	padding:12px 20px 12px 59px;
	border-left:1px solid #D9D4D3;
	background:#ECEAEA;
	color:#533D3A;
	font-family:'Georgia','Times',serif;
	}
	.article BLOCKQUOTE P {
		margin:0;
		}
	.article BLOCKQUOTE P:before {
		position:absolute;
		margin:-47px 0 0 -36px;
		color:#C6BFBE;
		content:'\201E';
		line-height:1;
		font-size:70px;
		}

/* Figure */
.article FIGURE {
	float:left;
	margin:5px 0 20px -60px;
	}
	.article FIGURE IMG {
		float:left;
		margin:0 10px 10px 0;
		}
	.article FIGURE > A[rel=darkbox]:before {
		position:absolute;
		display:none;
		margin:8px 0 0 8px;
		width:20px;
		height:20px;
		background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAB8klEQVR42q1VTUtCQRR9CoYl1AOhtOcfqMCNpo+saBH4OzIMceFeQVDwjwj9ASHKaisibgMXgpsINRQXbrLwOd1jd8L8fJAXDtzunHNec+fOqCwIK8FG2CKoBCdD5ZqNOSvDwuRtgkY4IPgJJww/1zTm2KARQijAPDM7YZdwFI1GI6VS6aHZbL6ORiMDQI4a1sBhrp1NZ8w2CfuEYKFQuP2iIBNhGIYYDofAOEcNa+CAC400nTTbILjcbvd5o9F4gQgG9Xq9mMvlblRVPQOQo4Y1cMCFhrR78JCmVm62t1KpFEHs9/utfD6fpprOffMBnOtYAwfccrl8Dy1hZ+zFzp5EIhEzKPD1dDodZbNjNgky/FzTs9lsDFxo4vE4+B72UhxoMH3pEV+s1Wp3E2YBwqngQA5jaQouNDgo+vuQR0pRQeh2u+9oeiaTuZbbY4OwNESOmmwDegpNp9NpcU1VeGBDw58QmqZdsGFALAisgaPrehiawWDwwXPq/Jeh1+u9hOaTQhr+brnX63Xw76dSqSuzW0Z7ZrfMh0Ij82zyUALTh4ID5UNxzB2bZDIZWTU2GC05NtDKsfkz2NVq9WnOYPsmMT3YuAzQsofV1NWTr82Sq+eSV29djwO0FlPPV7vdfhMcyJc/X+Yf2BBg5oFd+0/AN0yzD+RphwJXAAAAAElFTkSuQmCC) no-repeat;
		content:'';
		}
	.article FIGURE > A[rel=darkbox]:hover:before {
		display:block;
		}
	.article FIGURE FIGCAPTION {
		clear:both;
		padding:0 30px 0 60px;
		color:#7A6866;
		line-height:15px;
		font-size:11px;
		}
.article FIGURE.small {
	width:260px;
	}
.article FIGURE.medium {
	width:380px;
	}
.article FIGURE.large {
	clear:both;
	width:670px;
	}

/* Video */
.article .video-player {
	display:block;
	margin:0 0 15px;
	}

/* Footer */
.article > FOOTER {
	}
	.article > FOOTER A {
		color:#188418;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
		.article > FOOTER A SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:26px;
			background-color:#188418;
			background-position:-1px -18px;
			}
	.article > FOOTER A:hover {
		color:#1C9E1C;
		}
		.article > FOOTER A:hover SPAN {
			background-color:#1C9E1C;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
	.article > FOOTER SMALL {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Aside
---------------------------------------- */
.aside-wrap {
	background:#FFF;
	}
	.aside {
		margin:auto;
		padding:0 0 15px;
		width:610px;
		}

/* Title */
.aside HEADER {
	margin:-20px 0 20px;
	border-bottom:1px solid #D8D4D3;
	color:#C6BFBE;
	text-align:center;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.aside HEADER H2 {
		position:relative;
		top:10px;
		display:inline;
		padding:0 10px;
		background:#FFF;
		}

/* List */
.aside OL {
	overflow:hidden;
	margin:0 0 20px;
	border-bottom:1px solid #D8D4D3;
	}
	.aside OL LI {
		margin:0 0 18px;
		}
	.aside OL LI A {
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
		.aside OL LI A SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:16px;
			background-color:#D9D4D3;
			background-position:-1px -1px;
			-webkit-transition:background-color 0.2s linear;
			-moz-transition:background-color 0.2s linear;
			-o-transition:background-color 0.2s linear;
			}
	.aside OL LI A:hover {
		color:#C00;
		}
		.aside OL LI A:hover SPAN {
			background-color:#C00;
			}
	.aside OL LI TIME {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Next */
.aside > FOOTER {
	padding:0 0 15px;
	color:#C6BFBE;
	font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
	}
	.aside > FOOTER SPAN {
		display:none;
		color:#C00;
		cursor:pointer;
		-webkit-transition:color 0.2s linear;
		-moz-transition:color 0.2s linear;
		-o-transition:color 0.2s linear;
		}
	.aside > FOOTER SPAN:hover {
		color:#E57373;
		}

/* Aside JS */
#js .aside OL {
	display:none;
	}
#js .aside OL:first-of-type {
	display:block;
	}
#js .aside > FOOTER SPAN {
	display:inline;
	}

/* Comments
---------------------------------------- */
.comments {
	}

/* Header */
.comments > HEADER {
	padding:15px 0;
	}
	.comments > HEADER H3 {
		display:inline;
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		}
		.comments > HEADER H3 SPAN {
			position:absolute;
			margin:3px 0 0 -60px;
			width:50px;
			height:26px;
			background-color:#188418;
			background-position:-1px -18px;
			}
	.comments > HEADER SMALL {
		position:relative;
		top:-10px;
		color:#8C7D7C;
		font-size:11px;
		}

/* Article */
.comments > ARTICLE {
	position:relative;
	padding:15px 0 2px 180px;
	min-height:50px;
	border-top:1px solid #D9D4D3;
	}
	.comments > ARTICLE FOOTER {
		position:absolute;
		top:15px;
		left:0;
		overflow:hidden;
		width:160px;
		white-space:nowrap;
		}
		.comments > ARTICLE FOOTER TIME {
			display:block;
			line-height:1;
			font-size:11px;
			}
			.comments > ARTICLE FOOTER TIME A {
				color:#8C7D7C;
				}

/* Elements */
.comments P {
	margin:0 0 15px;
	}

/* Blockquote */
.comments BLOCKQUOTE {
	margin:0 0 15px;
	padding:5px 10px 5px;
	}
	.comments BLOCKQUOTE P:before {
		content:'';
		}

/* Blockcode */
.comments PRE {
	margin:0 0 15px;
	padding:5px 10px 5px;
	}
	.comments PRE CODE:before {
		content:'';
		}

/* Form
---------------------------------------- */
.form {
	padding:0 0 15px;
	}
	.form INPUT[type=email],
	.form INPUT[type=text],
	.form INPUT[type=url],
	.form TEXTAREA {
		display:block;
		margin:0;
		border:1px solid;
		border-color:#C6BFBE #E3DFDE #E3DFDE #C6BFBE;
		background:#ECEAEA;
		color:#533D3A;
		}
	.form TEXTAREA {
		margin:0 0 15px;
		width:430px;
		line-height:22px;
		}
	.form INPUT[type=submit] {
		clear:both;
		display:block;
		padding:5px 15px;
		border:1px solid #2e8a2e;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
		border-radius:5px;
		background:#188418 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAeCAYAAADtlXTHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAC9JREFUeNpi+v//fwMTAwPDHxDxC078hBPfQcQPVBaC+AnX8ZsBaBQDiEU5ARBgALXSFFMVb0VqAAAAAElFTkSuQmCC) 0 50% repeat-x;
		color:#FFF;
		text-shadow:0 1px 1px #333;
		cursor:pointer;
		-webkit-transition:background-color 0.2s linear;
		-moz-transition:background-color 0.2s linear;
		-o-transition:background-color 0.2s linear;
		}
	.form INPUT[type=submit]:hover {
		background-color:#1C9E1C;
		}
	.form INPUT[type=submit]:active {
		background:#188418;
		}

/* Comment */
.form-comment {
	padding-left:180px;
	border-top:1px solid #D9D4D3;
	}
	.form-comment LEGEND {
		padding:15px 0;
		color:#402724;
		font:22px/1 'PT Sans Narrow','Trebuchet MS',sans-serif;
		}
	.form-comment DL {
		margin:0 0 15px;
		border:1px solid #F7F2CF;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
		border-radius:5px;
		background:#FFF9C7;
		color:#402724;
		line-height:14px;
		font-size:11px;
		}
		.form-comment DL DT {
			padding:7px 10px 6px;
			}
		.form-comment DL DD {
			padding:0 10px 8px;
			}
		.form-comment DL CODE {
			padding:0;
			background:none;
			}
	.form-comment .subscription {
		padding:0 0 15px;
		}
	.form-comment .details {
		float:left;
		}
		.form-comment .details INPUT {
			float:left;
			margin:0 5px 15px 0;
			width:250px;
			}
		.form-comment .details INPUT:focus+LABEL {
			color:#533D3A;
			}
		.form-comment .details LABEL {
			float:left;
			color:#8C7D7C;
			}

/* Comment JS */
#js .form-comment DL DT {
	position:relative;
	padding-left:22px;
	cursor:pointer;
	}
#js .form-comment DL DT:before {
	position:absolute;
	top:50%;
	left:9px;
	margin:-4px 0 0;
	width:9px;
	height:9px;
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAJCAYAAAA/33wPAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAIJJREFUKM9jcFBXYQDi1UAsCmWThWGM/0D8FoijcCg8AFWDC69ANgiGtwCxNJpBKkD8DYchr4BYCJtBIPwBiNPQDCvFYVAIutew4RYkg5iB+Dya/GpsYUTIRSBsAMR/kMJUAp9BG7GEETJuh6qLxRVroEALJyKq2YC4F1f0L6U0HQEAZveWBACUFTUAAAAASUVORK5CYII=) no-repeat;
	content:'';
	}
#js .form-comment DL DD {
	display:none;
	}
#js .form-comment DL.on DT:before {
	background-position:-9px 0;
	}
#js .form-comment DL.on DD {
	display:block;
	}

/* Search */
.form-search {
	}
	.form-search INPUT[type=text] {
		margin:0 0 15px;
		width:606px;
		font-size:22px;
		}

/* Footer
---------------------------------------- */
.footer-wrap {
	background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAVCAQAAAAtW0yPAAAAOUlEQVQI1wXBIQqAMAAAwEM2RAYiDAwLC4LFsrJiMZn2/wftjsHPx0un8XBzUSmcZA52EhsrkcAyAW3EAn9Qy3GQAAAAAElFTkSuQmCC) repeat-x;
	}
	.footer {
		margin:auto;
		padding:15px 0;
		width:610px;
		color:#665250;
		text-shadow:0 0 5px rgba(0,0,0,0.4);
		font-size:11px;
		}
	.footer:after {
		clear:both;
		display:block;
		height:0;
		content:'';
		}
		.footer A {
			border-bottom:1px solid #533D3A;
			color:#665250;
			-webkit-transition:color 0.2s linear;
			-moz-transition:color 0.2s linear;
			-o-transition:color 0.2s linear;
			}
		.footer A:hover {
			color:#8C7D7C;
			}

/* Copyright */
.footer P {
	float:left;
	}

/* Links */
.footer UL {
	float:right;
	}
	.footer UL LI {
		float:left;
		margin-left:8px;
		}

/* Flag Image
---------------------------------------- */
.article > HEADER > :first-child A SPAN,
.article > FOOTER A SPAN,
.aside OL LI A SPAN,
.comments > HEADER H3 SPAN {
	background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAtCAYAAADhoUi4AAABRElEQVR42u3YwQYCURQG4GGIiB6gbcSsopfoYWKYVcTQA/QeMczDRMwDRKuIVrOqIzf/SI50i3N+Hf7NrO7n3jlzzyRXsnqASkniPQABRQJCrYhAQPGAUEsjCxxJtpJDyDY800FGURPJ6XlR4VmmgoyiKmVdtQoyijora7r8QQY6Xh115Ay27+ybTaE01LYryTGk+qRtlyQfVmBYQGuSyykwHCCi0kCNpJDMJKmhHUjDmgpJ8y5oI+k7OF59yUYDtZK5w/dmLmlfgXLHzaB4Bu2Ud8XDgJdK9gApu+NowCu6oIkBQOyAl3VBPQOA2HloyAYadEFjg6A65sgtDABiB7xcbdvOBrz0bgAIu+Q0Od3Vh/hyqo8PU4OQqT4+/Khi/iZFD3gGUF5BQBGBgCICAUUEAooIBBQRCCgiEFBEIKDiQGR1A9eb3JNCdVgPAAAAAElFTkSuQmCC);
	background-repeat:no-repeat;
	}

/* Darkbox
---------------------------------------- */
.darkbox {
	position:fixed;
	top:0;
	left:0;
	z-index:999;
	display:none;
	overflow:hidden;
	width:100%;
	height:100%;
	}
	.darkbox .darkbox-shadow {
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		background:#000;
		}
	.darkbox .darkbox-canvas {
		position:absolute;
		top:50%;
		left:50%;
		overflow:hidden;
		margin:-40px 0 0 -40px;
		width:80px;
		height:80px;
		-webkit-border-radius:15px;
		-moz-border-radius:15px;
		border-radius:15px;
		background:#000 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAGoCAMAAAAQMBfHAAABtlBMVEX///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8cWrVBAAAAkXRSTlMAKUfghaPCZkAlPw7nsHiUy1w3VBcoLEoiNsAw/EbdoYNlGSYIFEUdDEgS2yENIMi9CnfkLhUnkhutW5/5gGSCAgsyaZlEsVA4yQQfAxM9Khh/AWEPm7nVEfNCtB4kNDnGSU+JM5dznmAtXkuQO3JnTlhiWp2nIwf2rtgcPha7UYxf4avt0DUGpjp1eXwvTBBjhUW/zwAABtxJREFUeF7tmtlXE0kUxm/2zr5gwhI3QiAsCXtCQFED4gKCIKIgoo7ruI0zOjNuo7Pva/7jqTq3iy9dOc05eclT/94434/qk6fbt74mK6GLF0N0EJF6PXKgUBcgAJfLzcJyHvkjz/VOXQhXXAWVX/Z4PCOdViHsEqgz1q+zAYHzyjKZdB4VxtEbIpiq16dEPuiShEkCIyGSoUhkSAh7Ik6bOYwx/BlUORhIJNYg1ILBErWP7Fm/5GzWGgxfcEsuDFPUz0StguFmDJo1hVmrEDKFEKX4iGjKKvTzEUY/tY/pjY00gkLy+z1r3n3M54tD+CIQ6O3Tc9+MSIqLi0UWlIH8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) 24px 24px no-repeat;
		}
		.darkbox .darkbox-canvas IMG {
			display:block;
			visibility:hidden;
			}
	.darkbox .darkbox-button {
		position:absolute;
		top:-13px;
		z-index:1;
		display:none;
		overflow:hidden;
		width:30px;
		height:30px;
		background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAQAAACROWYpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAy1JREFUOI2NlU1IG1EQx8e4icbYWMNKUoWwIMFvEFIPVdGezJbQghRRPIg2UCgBz7lYEKHXnj16yVEQcrKiJ0FBvQg9eIhIEDEHP9BY8uX0/3Y32c1HP94EMpmZ35t57817IcLgCqEGiI0aIRJEfNs0W/1RAdpIOvA+LOcTxRMucKF4kk88LB94MY2t7gRWcL0ts/J8z1Xj+T6zst5Wd4Iyat9T8kcieIvnOcgSJAhtS5sgf7SnkL0G19BGcmwHiinmIw5z1TbAIuYsprYD5EBkBS6yOmY8uWPmBMs1qBAZHubc8YwHeEV2FEyu9JrI2l4XFdKuZU+vkUsrvpxXImdMKd5yueAYq2VIxa9S8Sj9NqaQE0RDKa+D3D+jomQ96CuCngxchcaw6B5R+nmM3Frp2pCoheS7HeYvRsiitrsC11HmiOGZh363QzIILXcDVuCmzl/nzD3lUnU8C7GixF1i066pC4RdwDZqJg8phQfml5btWSw3SMRibRINkyMFRLMovBHL76BANawaWbOWrSN+AUvhiQIgnCDxcZGXejMX1rJLay2tvWTvwe/MBfWCcAlYolbyUd/lPvPnKnTRsnXmhl3uUz+9AiWV4a1vlUclUHPt1qP68R2wT4eNskfUXMZsklUD1fFVS5PkMq/fmWUbG0ZvdjeYD//anoeAdzdo1Nww46goKIfTSXEZ3XVRt3Yx00n/ewqaR2U0CQ3Q5FTk8UZcDrUGVbVL8XgzFaFJGjSbxGhP6qYRCoWiV0n9MZjlYQ0bhqY/BlfJUJRCiOo229O4GMjdR2MU9i0kNrPmIRsj+5TY9C1QGBF9iLRcDO1KYhV+GqJxBMwOROPxs9PrlMCuU2en8fhAlGbhGUeEH5GWK2k8BihGgXMMpU3THC3QEn2CLEGbgyUEzxAi5MrHwHjBcOwy5u3HqiZJpQ8APkKmoamwjMDjR0RrvVdM4C6U1IkNGcRxjNIEvYVMQAvC0g2PBxE1aAm3YzVuzN6F8gLoo35ILzQFFhkeJyLqoKU3VKImHIMbOTrQgj6IF5oHlhZ4/vSvUTGBHf3jRImtEBe0Zlj+AZoT/Ocf3W8M2nFgGCB/ewAAAABJRU5ErkJggg==) no-repeat;
		cursor:pointer;
		}
	.darkbox .darkbox-button-left {
		left:-16px;
		}
	.darkbox .darkbox-button-right {
		right:-16px;
		}

/* Darkbox On
---------------------------------------- */
.darkbox-on {
	display:block;
	}

/* Darkbox Loaded
---------------------------------------- */
.darkbox-loaded {
	}
	.darkbox-loaded .darkbox-canvas {
		overflow:visible;
		height:auto;
		-webkit-border-radius:0;
		-moz-border-radius:0;
		border-radius:0;
		background:none;
		}
		.darkbox-loaded .darkbox-canvas IMG {
			visibility:visible;
			width:100%;
			}

/* Darkbox Error
---------------------------------------- */
.darkbox-error {
	}
	.darkbox-error .darkbox-canvas {
		background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAAAAABWESUoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAJ0Uk5TAEQHIkixAAABv0lEQVQYGWXBQWcjcRzH4d+L+xpDRVRYETGXqt5W9FI9xFIVvfae64i11IgosfoGeqtaZawcwlgrlxE1Qvx99j+zk5lUn8fU6N48pmtc+vpwrZapNkgKGtvFUDVTJYgdH+xnJ6qYStEbn6wGKpm8wYZSHl+fS9Hl9w2l7bk8k9TP8HZ3oQ4mG7w8kmRSuKIyU6uzxHsLJZOm1CY6kuDFkqlfAE9vwH6kI0vADWRaAH86/Q2QR2p1MiCRdQrgVrrYAauuWjdAcWoTIAskjfGeAzWCDBjbHJipNMWbqxUDc/sFjFRZ4t2rMQJSy4EvqoQvgLvSQQ/IbQ8u0H+9DHg/Uy1w4MyBC1Q7eweynmp72FsO9HRw5YCXUJUusLUUGKlxj/dTlRGQ2hyI1UrwpirNgIWNgXWgRvCMN5a3BiZ2WgDf1OqugN2FNAaKjikBso5aUQ5s+p01sJBp4IBHHfm6B9InoOjLpBjvQUcm1KaSSWGKtzxRa0ZlFUomKcrx1mMdhHc7vKwvyeRdbCn9jS+H0vl1nFPaDOWZStGaT35HKpkqJz8cH7g4VMVUGz4WNHbJUDVTo3uTvKaOLF3enqrxD+aQUnwgKhDtAAAAAElFTkSuQmCC);
		}

/* Darkbox Done
---------------------------------------- */
.darkbox-done {
	}
	.darkbox-done .darkbox-button {
		display:block;
		}";
$group['cases'][] = $case;

















$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'envirement';
$group['group-name'] = 'Окружение';
$group['group-name-en'] = 'Envirement';





/* Тестрование окружения */
$case['descr'] = 'Просто свойства';
$case['descr-en'] = 'Properties';
$case['link'] = 'envirement-properties';
$case['code'] = 'color:red;
position:relative;
background:url(sprite.png);
margin-bottom:10px;
padding-left:-10px;
margin-top:0;
color:#000;
text-indent:-1234px;';
$case['result'] = 'position:relative;
margin-top:0;
margin-bottom:10px;
padding-left:-10px;
background:url(sprite.png);
color:red;
color:#000;
text-indent:-1234px;';
$group['cases'][] = $case;


$case['descr'] = 'HTML содержащий аттрибут style';
$case['descr-en'] = 'Style attribute';
$case['link'] = 'envirement-style-attribute';
$case['code'] = '<p style="padding-left:0;padding-top:0;margin-right:0;margin-top:0;">bla-bla-bla</p>';
$case['result'] = '<p style="margin-top:0;margin-right:0;padding-top:0;padding-left:0;">bla-bla-bla</p>';
$group['cases'][] = $case;


$case['descr'] = 'HTML содержащий несколько аттрибутов style';
$case['descr-en'] = 'Few style attributes';
$case['link'] = 'envirement-few-style-attributes';
$case['code'] = '<p style="padding-left:0;padding-top:0;margin-right:0;margin-top:0;">bla-bla-bla</p>
<p style="padding-left:1px;padding-top:2px;margin-right:3px;margin-top:4px;">bla-bla-bla</p>';
$case['result'] = '<p style="margin-top:0;margin-right:0;padding-top:0;padding-left:0;">bla-bla-bla</p>
<p style="margin-top:4px;margin-right:3px;padding-top:2px;padding-left:1px;">bla-bla-bla</p>';
$group['cases'][] = $case;





$case['descr'] = 'HTML содержащий тег style';
$case['descr-en'] = 'Style tag';
$case['link'] = 'envirement-style-tag';
$case['code'] = '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <style>
        div{
            padding:0;
            margin:0;
            }
            div a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
</head>
<body>
    <p>Тест.</p>
<body>
</html>';
$case['result'] = '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <style>
        div{
            margin:0;
            padding:0;
            }
            div a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
</head>
<body>
    <p>Тест.</p>
<body>
</html>';
$group['cases'][] = $case;






$case['descr'] = 'HTML содержащий несколько тегов style';
$case['descr-en'] = 'Few style tags';
$case['link'] = 'envirement-few-style-tag';
$case['code'] = '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <style>
        div{
            padding:0;
            margin:0;
            }
            div a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
</head>
<body>
    <p>bla-bla-bla</p>
    <style>
        p{
            padding:0;
            margin:0;
            }
            p a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
<body>
</html>';
$case['result'] = '<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <style>
        div{
            margin:0;
            padding:0;
            }
            div a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
</head>
<body>
    <p>bla-bla-bla</p>
    <style>
        p{
            margin:0;
            padding:0;
            }
            p a:link{
                color:#f00;
                text-decoration:underline;
                }
    </style>
<body>
</html>';
$group['cases'][] = $case;








$case_groups[] = $group;
$group = Array();


$group['group-id'] = 'sort-order';
$group['group-name'] = 'Порядок сортировки';
$group['group-name-en'] = 'Sort order';



/* Порядок сортировки */
$case['descr'] = 'Тест 1';
$case['descr-en'] = 'Option 1';
$case['link'] = 'sort-order-option-1';
$case['code'] = 'div{
    outline:1px solid red;
    position:absolute;
    }
    p{
        padding:0;
        margin:0;
        }';
$case['result'] = 'div{
    position:absolute;

    outline:1px solid red;
    }
    p{
        margin:0;
        padding:0;
        }';
$case['order'] = $yandex_style;

$group['cases'][] = $case;






/* Порядок сортировки */
$case['descr'] = 'Если в коде уже есть разделение на группы';
$case['descr-en'] = 'The code is already split into groups';
$case['link'] = 'sort-order-the-code-is-already-split-into-groups';
$case['code'] = 'div{
    position:absolute;
    top:0;
    left:0;

    margin:0;
    padding:0;
    border:0;

    font-size:12px;

    background:
        url(pic1.png) top left no-repeat,
        url(pic2.png) top right no-repeat;
    color:red;

    text-shadow:
		0 -1px 1px rgba(0,0,0,0.4),
		0 0 5px rgba(255,255,255,0.7);
    }';
$case['result'] = 'div{
    font-size:12px;

    position:absolute;
    top:0;
    left:0;

    margin:0;
    padding:0;

    color:red;
    border:0;
    background:
        url(pic1.png) top left no-repeat,
        url(pic2.png) top right no-repeat;
    text-shadow:
		0 -1px 1px rgba(0,0,0,0.4),
		0 0 5px rgba(255,255,255,0.7);
    }';
$case['order'] = $yandex_style;

$group['cases'][] = $case;


$case_groups[] = $group;
$group = Array();
