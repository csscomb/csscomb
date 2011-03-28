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
$case['order'] = '[
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

$css = 'div{
    /* border-width: 1px 1px 1px 0; */
    /* border-color: #93875d #dfd199 #fff6d5; */

    color: #7a7254;

    background: #F5E39E;
    background: -moz-linear-gradient(top, #F5E39E 0%, #FFEFB2 42%, #FFF3C8 75%, #FFF5CF 100%);
    /*
    Старый код
    background: #F5E39E;
    background: -moz-linear-gradient(top, #F5E39E 0%, #FFEFB2 42%, #FFF3C8 75%, #FFF5CF 100%);
    */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#F5E39E), color-stop(42%,#FFEFB2), color-stop(75%,#FFF3C8), color-stop(100%,#FFF5CF));

    /* Объясняю как работает: раз-два-три и готово! */
    }';


$css = 'div{
    display: -moz-inline-box;
    display: inline-block;

    /* margin-left: 1px;

    border-width: 1px;
    border-style: none solid;
    border-color: transparent;
    */
    background: #fff;
    background: -moz-linear-gradient(top, #FFF 10%, #C1C1C1 92%, #A8A8A8 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(10%,#fff), color-stop(92%,#C1C1C1), color-stop(100%,#A8A8A8));
    }';

$css = 'body {
    background:#FFF;
}

#header {
    margin:0;
    padding:0;
}
    #header .redline {
        position:relative;
    }
        #header .redline ins {
            position:absolute;
            width:100%;
            height:41px;
            left:0;
            top:0;
            background:#730a0a;
            z-index:-1;
        }
    #header * {
        margin:0;
        padding:0;
    }
    .main optgroup option  {
        padding:0 0 0 20px;
    }
    #header img {
        vertical-align:middle;
    }
    #header ul {
         list-style:none;
    }
    #header .top-banner, #header .main {
        width:990px;
        margin:0 auto;
    }
    #header .redline {
        background:url(../img/bg-header-red-line.gif) top repeat-x;
    }
    #header .main {
         height:155px;
         margin:0 auto 5px auto;
         border-bottom:4px solid #730a0a;/**/
         /*Новый год*/
         /*margin:0 auto -5px auto;
         height:190px;
         background:url(../img/bg-01-01.png) center 110px no-repeat;
         */
         /*
         //День победы
         margin:5px auto -5px auto;
         height:173px;
         background:url(../img/bg-09-05.png) center 140px no-repeat;
         */
         /*
         //Праздник весны и труда
         margin:5px auto -5px auto;
         height:178px;
         background:url(../img/bg-01-05.png) center 128px no-repeat;
         */
         /*
         //Международный женский день
         margin:5px auto -5px auto;
         height:170px;
         background:url(../img/bg-08-03.png) center 108px no-repeat;
         */

         /*
         //День защитника отечества
         margin:5px auto -5px auto;
         height:175px;
         background:url(../img/bg-23-02.gif) center 140px no-repeat;*/


         /*
         //Новый год
         margin:5px auto -5px auto;
         height:169px;
         background:url(../img/bg-new-year-header.png) center 113px no-repeat;
         */
         position:relative;
    }
    #header .victoty-day {
         margin:5px auto -5px auto;
         height:173px;
         background:url(../img/bg-09-05.png) center 140px no-repeat;
         border:none;
    }
    #header .labor-day {
         margin:5px auto -5px auto;
         height:178px;
         background:url(../img/bg-01-05.png) center 128px no-repeat;
         border:none;
    }
        #header .main h1 {
             position:absolute;
             top:75px;
             left:0;
             width:22%;
             text-indent:-10000px;
             margin:0;
        }
        #header .main h1.dozor {
             background:url(../img/logo-autoru-dozor.png) 7px center no-repeat;
             top:52px;
             left:15px;
        }
            #header .main h1 a {
                display:block;
                background:url(../img/sprite-grid.png) -55px 0 no-repeat;
                width:194px;
                height:47px;
            }
            #header .main h1.dozor a {
                height:94px;
                background:none;
            }
        #header .main h2 {
             position:absolute;
             top:5px;
             left:0;
             width:20%;
             height:36px;
             line-height:36px;
             background: #fff url(../img/bg-service-name.gif) right bottom no-repeat;
             padding:0 0 0 1.5%;
             font-size:16px;
        }
        #header .main h2.long {
             width:16%;
             padding:3px 4% 0 1.5%;
             line-height:16px;
             font-size:15px;
             background-position:right top;
        }
            #header .main h2 a {
                color:#000;
                font-weight:bold;
                font-style:italic;
                text-decoration:none;
            }
        #header .services {
             position:absolute;
             width:78%;
             height:41px;
             margin:2px 0 0 22%;
        }
            .services li {
                float:left;
            }
                #header .services .tw {
                    padding:10px 18px 14px 10px;
                    font-size:13px;
                    position:relative;
                }
                    #header .services a {
                        color:#fff;
                    }
                    #header .i-services-arrow {
                        cursor:pointer;
                        margin:0 -4px 0 5px;
                    }
                    #header .selected .i-services-arrow, #header .services .selected .arrow {
                        visibility:hidden;
                    }
                    #header .services .show-submenu {
                        position:absolute;
                        padding:5px;
                        right:2px;
                        top:12px;
                        cursor:pointer;
                    }
            #header .services li.more {
                float:right;
                margin-top:-2px;
            }
                #header .services .more .arrow {
                    width:8px;
                    height:4px;
                    background:url(../img/sprite-grid.png) 0 0 no-repeat;
                    padding:0;
                    margin:8px 5px 5px 5px;
                }
                .selected .i-traffic-lights {
                    background-position:-1971px -25px;
                }
            #header .services li.selected {
                position:relative;
                margin-left:-4px;
                padding-right:10px;
                background:url(../img/bg-services-selected.gif) right top no-repeat;
            }
                    #header .services .selected .show-submenu {
                        right:-6px;
                        _right:13px;
                    }
            #header .services li.selected .tw {
                padding-right:8px;
                padding-left:14px;
                background:url(../img/bg-services-selected.gif) left top no-repeat;
            }
                #header .services li.selected a {
                    color:#006c8a;
                }

                #header .services .frame {
                    position:absolute;
                    display:none;
                    z-index:3;
                    top:34px;
                    left:-4px;
                }
                #header .services .more .frame {
                    left:auto;
                    right:0;
                }
                #header .services li.selected .frame {
                    display:block;
                }
                    .frame .f {
                        width:188px;
                        position:relative;
                        overflow:hidden;
                    }
                        .frame .t {
                            width:188px;
                            position:absolute;
                            top:0;
                            left:0;
                            overflow:hidden;
                            height:4px;
                        }
                        .frame .b {
                            width:188px;
                            position:absolute;
                            top:4px;
                            bottom:0;
                            left:0;
                            overflow:hidden;
                            display:none;
                            display:block;
                            height: expression(this.offsetParent.offsetHeight + \'px\');
                        }
                            .frame .t ins, .frame .b ins {
                                width:188px;
                                height:500px;
                                position:absolute;
                                background:url(../img/bg-services-menu.png) 0 0 no-repeat;
                                -background-image: none;
                                -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://i.auto.ru/design/2009/img/bg-services-menu.png,sizingMethod=crop);
                            }
                            .more .frame .t ins, .more .frame .b ins {
                                background:url(../img/bg-services-menu-2.png) 0 0 no-repeat;
                                -background-image: none;
                                -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://i.auto.ru/design/2009/img/bg-services-menu-2.png,sizingMethod=crop);
                            }
                            .frame .t ins {
                                top:-496px;
                            }
                            .frame .b ins {
                                bottom:-4px;
                            }
                        #header .frame ul {
                            position:relative;
                            z-index:30;
                            padding:0 20px 7px 18px;
                            overflow:hidden;
                        }
                            #header .frame li {
                                float:none;
                                margin:-1px 0 0 0;
                                padding:10px 5px 10px 0;
                                border-top:1px solid #F2F2F2;
                                font-size:12px;
                            }
                            .more .frame li {
                                padding:8px 5px 9px 0;
                                border-top:1px solid #f2f2f2;
                            }

    #header .user-card, #header .login-links {
        position:absolute;
        top:56px;
        right:0;
        width:21%;
        font-size:12px;
        z-index:1;
        //z-index:-1;
    }
        #header .user-card li {
            margin:0 0 3px 0;
            padding:0 0 0 40px;
        }
        #header .user-card li.nikname {
            margin:8px 0 10px 0;
            padding:0;
            font-size:11px;
            line-height:12px;
            width:100%;
            overflow:hidden;
        }
            #header .user-card li.nikname span {
                display:block;
                float:left;
            }
                #header .user-card li.nikname strong {
                    font-size:12px;
                    display:block;
                    margin:1px 0;
                }
                #header .user-card li.nikname img {
                    float:left;
                    margin:0 10px 0 5px;
                }
        #header .user-card li.messages a {
            color:#919191;
        }
        #header .user-card li.new-messages {
            background:url(http://i.auto.ru/design/2007/layoutdata/resources/icons/icon-meessage.gif) 18px 3px no-repeat;
        }
            #header .user-card img {
                border:1px solid #d0d0d0;
                margin:5px;
            }
            #header .user-card a {
                color:#006c8a;
            }
    #header .login-links {
        width:18%;
        height:75px;
        margin-top:5px;
        padding:0 10px;
        border:1px solid #d0d0d0;
        z-index:1;
        //z-index:-1;
    }
            #header .login-links li {
                 font-size:13px;
                 padding:10px 10px 11px 30px;
                 //padding-bottom:10px;
            }
                #header .login-links a {
                     color:#006c8a;
                }
            #header .login-links li.enter {
                 border-bottom:1px solid #d0d0d0;
                 padding-left:5px;
            }
                #header .enter .ico {
                     margin-right:5px;
                }
            .login-links .bg-arrow-login {
                -display:none;
            }

    div.top_banner {
        margin-bottom: 0px;
    }

    #search-cars {
        position:absolute;
        left:22%;
        _left:21%;
        top:61px;
        z-index:0;
        //z-index:-1;
        width:550px;
        _width:560px;
    }
    #search-cars fieldset {
        border:none;
    }
        #search-cars .cell {
            float:left;
            margin:0 0 0 10px;
        }
            #search-cars .cell label {
                display:block;
                font-size:11px;
                color:#5e5e5e;
                margin-bottom:3px;
            }
            #search-cars .cell input {
                width:60px;
            }
            #search-cars .cell select {
                width:60px;
            }
            #search-cars .cell #f1, #search-cars .cell #f2 {
                width:112px;
            }
            #search-cars .cell #f2 {
                margin-left:5px;
            }
            #search-cars .cell #f3 {
                width:78px;
            }
        #search-cars .region {
            width:330px;
            margin:13px 10px;
            float:left;
            font-size:12px;
            color:#919191;
        }
            #search-cars .region em {
                font-style:normal;
                color:#006c8a;
                cursor:pointer;
                background:url(../img/bg-dashed-blue.gif)  bottom repeat-x;
            }
        #search-cars .buttons {
            width:200px;
            float:right;
            margin:11px 0;
            font-size:12px;
        }
            #search-cars .buttons a {
                color:#006c8a;
            }
            #search-cars .buttons input {
                width:67px;
                margin-left:11px;
            }

    #show-category-auto {
        margin:-1px 0 3px 0;
        overflow:hidden;
        color:#5E5E5E;
        _width:235px;
    }
        #show-category-auto b {
            font-size:12px;
            font-style:normal;
            color:#006c8a;
            background:url(../img/bg-dashed-blue.gif)  bottom repeat-x;
            font-weight:normal;
            display:-moz-inline-box;
            display:inline-block;
            //display:inline;
            cursor:pointer;
        }
    #category-list {
        display:none;
    }

    #login-form {
        width:390px;
    }
        #login-form form {
            padding:0 15px 15px 15px;
        }
            #login-form fieldset {
                border:none;
                position:relative;
            }
            #login-form .name {
                display:block;
                float:left;
                width:55px;
                line-height:20px;
                clear:both;
                margin:0 0 20px 0;
            }
            #login-form .text {
                width:150px;
                margin:0 0 20px 0;
            }
            #login-form .submit {
                margin:0 0 0 55px;
                clear:both;
                display:block;
            }
            #login-form .r {
                position:absolute;
                top:3px;
                right:0;
                width:120px;
                white-space:nowrap;
            }
                #login-form .r a {
                    display:block;
                    margin:23px 0;
                }

    #category-auto {
        width:590px;
    }
        #category-auto ul {
            list-style:none;
        }
        #category-auto .column {
            width:165px;
            float:left;
            padding:0 0 0 20px;
        }
        #category-auto .column li {
            margin:0 0 15px 0;
        }
            #category-auto .column li ul {
                margin:10px 0 0 0;
            }
                #category-auto .column li li {
                    margin:0 0 8px 10px;
                }

    #region-list {
        width:410px;
        height:440px;
        overflow:hidden;
    }
        #region-list .box {
            display:none;
        }
            #region-list .list, .region-list .list {
                width:360px;
                overflow:hidden;
                margin:0 15px 15px 15px;
            }
            #region-list .list ul, .region-list .list ul {
                width:358px;
                height:300px;
                overflow:auto;
                border:1px solid #a4a4a4;
                margin:0 0 15px 0;
            }
                #region-list .list li, .region-list .list li {
                    padding:0;
                    margin:0;
                }
                    #region-list .list a, .region-list .list a {
                        display:block;
                        padding:5px 10px;
                        margin:0;
                        //width:321px;
                        color:#000;
                        text-decoration:none;
                        background:#fff;
                    }
                    #region-list .list a:hover, .region-list .list a:hover {
                        background:#d4e9ef;
                    }
                    #region-list .list a.selected, .region-list .list a.selected {
                        background:#006c8a;
                        color:#fff;
                    }
                    #region-list .list .g, .region-list .list .g {
                        background:#f2f2f2;
                    }
            #region-list input {
                float:right;
            }
            #region-list .back {
                float:left;
                padding:0 0 0 20px;
                background:url(../img/i-long-arrow.gif) 1px center no-repeat;
            }
                #region-list .back b {
                    display:block;
                    float:left;
                    color:#006c8a;
                    border-bottom:1px dashed #006c8a;
                    line-height:15px;
                    font-weight:normal;
                    cursor:pointer;
                }

    #account-menu {
        display:none;
    }
    #account-links {
        position:relative;
    }
        #account-links * {
            margin:0;
            padding:0;
        }
        #account-links .frame .arrow {
            position:absolute;
            z-index:2;
            top:-12px;
            left:50px;
            width:29px;
            height:15px;
            background:url(../img/bg-services-menu-arrow-top.png) 0 0 no-repeat;
            -background-image: none;
            -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=img/bg-services-menu-arrow-top.png,sizingMethod=crop);
        }
        #account-links .wide .arrow {
            left:420px;
        }
        #account-links dl {
            overflow:hidden;
            padding:3px 15px 10px 15px;
        }
            #account-links dt {
                position:relative;
                z-index:1;
                font-weight:bold;
                padding:10px 5px;
                border-top:1px solid #e3e3e3;
                margin:-1px 0 0 0;
            }
            #account-links dd {
                padding:0 5px;
            }
                #header .user-card #account-links li {
                    margin:0 0 10px 0;
                    padding:0;
                    border:none;
                }
                #account-links .frame {
                    position:absolute;
                    top:21px;
                    left:0;
                    z-index:100;
                }
                #account-links .wide {
                    left:-370px;
                    z-index:999;
                }
                #account-links .frame .f {
                    overflow:visible;
                }
                #account-links .frame .f, #account-links .frame .t, #account-links .frame .b {
                    width:203px;
                }
                #account-links .wide .f, #account-links .wide .t, #account-links .wide .b {
                    width:570px;
                }
                #account-links .frame .t {
                    height:7px;
                }
                #account-links .frame .b {
                    top:7px;
                }
                #account-links .frame .t ins {
                    top:0;
                }
                #account-links .frame .t ins, #account-links .frame .b ins {
                    width:203px;
                    background:url(../img/bg-services-menu-3.png) 0 0 no-repeat;
                    -background-image: none;
                    -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://i.auto.ru/design/2009/img/bg-services-menu-3.png,sizingMethod=crop);
                }
                #account-links .wide .t ins, #account-links .wide .b ins {
                    width:570px;
                    height:650px;
                    background:url(../img/bg-services-menu-3-wide.png) 0 0 no-repeat;
                    -background-image: none;
                    -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://i.auto.ru/design/2009/img/bg-services-menu-3-wide.png,sizingMethod=crop);
                }
                #account-links .columns {
                    width:530px;
                    padding:20px;
                    overflow:hidden;
                }
                    #account-links .columns .c {
                        width:32%;
                        margin-left:1%;
                        float:left;
                    }

    .menu2009 {
        border:1px solid #c4c4c4;
        padding:10px 15px 0 15px;
        position:relative;
        z-index:2;
        clear:both;
        margin-bottom:5px;
    }
        .menu2009 * {
            padding:0;
            margin:0;
            font-size:12px;
        }
        .menu2009 h6 {
            color:#5e5e5e;
            background:#f2f2f2;
            padding:12px 0 0px 0;
            margin:-1px 0 -5px 0;
            position:relative;
            border-top:1px solid #c4c4c4;
            font-weight:normal;
        }
        .menu2009 ul {
            list-style:none;
            margin:-1px 0 15px 0;
            padding:12px 0 0 0;
            border-top:1px solid #c4c4c4;
        }
            .menu2009 ul li {
                margin:0 0 10px 0;
            }
        .menu2009 a {
            color:#006c8a;
        }
        .menu2009 a.selected {
            color:#000;
            font-weight:bold;
            text-decoration:none;
        }
        .menu2009 .arrow {
            position:absolute;
            top:-1px;
            right:-1px;
            _top:0;
            _right:5px;
            width:6px;
            height:6px;
            background:url(http://i.auto.ru/design/2009/img/sprite-grid.png) -48px 0 no-repeat;
        }
        .menu2009 .user-region {
            background:#fff;
            padding:8px 15px 10px 15px;
            margin:-10px -15px 0 -15px;
            color:#5e5e5e;
            position:relative;
            line-height:17px;
        }
            .menu2009 .user-region strong {
                font-weight:normal;
                cursor:pointer;
                color:#006c8a;
                background:url(../img/bg-dashed-blue.gif) bottom repeat-x;
            }
        .menu2009 .i-add-1 {
            margin-left:8px;
        }
    #user-region-list, #form-region-list {
        width:410px;
    }
        #user-region-list input, #user-region-list .back, #form-region-list input, #form-region-list .back  {
            display:none;
        }

    #show-user-region-list, #show-form-region-list {
        white-space: nowrap;
    }

    #show-form-region-list {
        font-weight:normal;
        cursor:pointer;
        color:#006c8a;
        background:url(../img/bg-dashed-blue.gif) bottom repeat-x;
        width:105px;
    }
    #form-region-data{
        clear:both;
        display:block;
    }










    .design2009 {
        padding:10px 15px 0 15px;
        font-size:12px;
    }
        .design2009 * {
            margin:0;
            padding:0;
        }
        .headers {
            height:45px;
        }
            .headers h2 {
                padding:10px 0 0 0;
                font: italic bold 18px Arial;
            }


        .crumbs {
            padding:5px 0 0 0;
            margin:0 0 -10px 0;
        }
            .crumbs ul {
                width:100%;
                overflow:hidden;
                list-style:none;
                margin:0 0 0 -5px;
            }
                .crumbs li {
                    float:left;
                    color:#666666;
                }
                    .crumbs a {
                        color:#666666;
                        margin:0 2px 0 5px;
                    }
    a {
        color:#006c8a;
    }


   .mega-tabs-simple,.mega-tabs {
        clear:both;
        width:100%;
        overflow:hidden;
        background:url(../img/bg-mega-tabs-underline.gif) top repeat-x;
        padding:0;
    }
        .mega-tabs-simple .tab-link, .mega-tabs .tab-link {
            float:left;
            cursor:pointer;
            margin:0 0 0 10px;
        }
        .alt .tab-link {
            width:40%;
            margin-left:2%;
            background:url(../img/bg-mega-tabs-2.png) right top no-repeat;
            padding-right:7%;
            //width:35%;
            //padding-right:40px;
        }
            .mega-tabs-simple .tab-link h4, .mega-tabs .tab-link h4, #testdrive .tab-link h4 {
                font-size:12px;
                font-weight:normal;
                margin:0;
                padding:10px 10px 10px 10px;
            }
            .alt .tab-link h4 {
                text-align:center;
                padding:10px 0 10px 15px;
                background:url(../img/bg-mega-tabs-2.png) left top no-repeat;
            }
                .mega-tabs-simple .tab-link .link, .mega-tabs .tab-link .link {
                    color:#006c8a;
                    text-decoration: none;
                    border-bottom:1px dashed #006c8a;
                }
                .mega-tabs-simple .tab-link .grey, .mega-tabs .tab-link .grey {
                    color:#919191;
                }
        .mega-tabs-simple div.selected, .mega-tabs div.selected {
            background:url(../img/bg-mega-tabs-selected.png) right top no-repeat;
            padding-right:37px;
        }
        .alt div.selected {
            background:url(../img/bg-mega-tabs-selected-2.png) right top no-repeat;
            padding-right:7%;
            //padding-right:40px;
        }
            .mega-tabs-simple .selected h4, #testdrive .selected h4 {
                background:url(../img/bg-mega-tabs-selected.png) left top no-repeat;
                padding-right:0;
                font-size:15px;
                font-weight:bold;
                cursor:default;
            }
            .alt .selected h4 {
                background:url(../img/bg-mega-tabs-selected-2.png) left top no-repeat;
                font-size:15px;
                font-weight:bold;
            }
                .mega-tabs-simple .selected .link, .mega-tabs .selected .link {
                    color:#000;
                    border-bottom:none;
                }
        .mega-tabs-simple .tab-block, .mega-tabs .tab-block {
            display:none;
            float:right;
            width:100%;
            margin:30px 0 0 -100%;
            padding: 0;  /* was 10px 0 */
        }
        .mega-tabs-simple .view{
           display: block;
        }

        .mega-tabs .first {
            margin:0px;
        }

    .pagenation {
        height:60px;
        border-top:1px solid #d4d4d4;
        padding:10px 5px;
    }
        .pagenation p {
            margin:0;
        }
        .pagenation ul {
            float:left;
            margin:0;
            padding:0;
        }
        .pagenation li {
            float:left;
            padding:0;
            margin:7px 5px;
            overflow:hidden;
        }
        .pagenation .selected {
            border:1px solid #d0d0d0;
            padding:2px 4px;
            margin:5px 1px;
        }
        .pagenation .prev, .pagenation .next {
            width:8px;
            margin:6px;
            background:url(../img/i-page-prev.gif) 0 4px no-repeat;
        }
            .pagenation .prev a, .pagenation .next a {
                text-indent:-100px;
                display:block;
            }
        .pagenation .next {
            background-image:url(../img/i-page-next.gif);
        }
        .pagenation .top {
            float:right;
            margin:5px 0;
        }
            .pagenation .top select {
                margin:0 3px;
            }

    .dashed, a.dashed {
        color:#006C8A;
        cursor:pointer;
        text-decoration:none;
        background:url(../img/bg-dashed-blue.gif) bottom repeat-x;
        line-height:17px;
        border:none;
    }


    .radio-string {
        list-style:none;
        width:100%;
        overflow:hidden;
        padding:0;
        margin: 0;
    }
        .radio-string li {
            float:left;
            overflow:hidden;
            margin:0 15px 0 0;
            color:#006c8a;
            cursor:pointer;
        }
            .radio-string label {
                background:url(../img/bg-dashed-blue.gif) bottom repeat-x;
                line-height:17px;
                display:inline-block;
                display:-moz-inline-box;
                //display:inline;
                cursor:pointer;
            }

        .radio-string li.checked {
            color:#000;
            font-weight:bold;
            border-bottom:none;
            cursor:default;
        }
            .radio-string .checked label {
                background:none;
            }
            .radio-string input {
                width:15px;
                margin:0 0 0 -15px;
            }

#footer {
    clear:both;
    overflow:hidden;
}
    #footer hr {
        border:none;
        height:1px;
        background:none;
        clear:both;
    }
    #footer hr.blue {
        height:4px;
        border-top:4px solid #006c8a;
        margin:10px 0;
        //margin:1px 0 8px 0;
    }
    #footer hr.grey {
        border-top:1px solid #e7e7e7;
        margin:0;
    }
    #footer * {
        margin:0;
        padding:0;
        font-size:12px;
    }
    #footer .column, #footer .all, #footer .rules {
        width:170px;
        float:left;
        display:inline;
        margin:0 0 10px 20px;
        //margin-bottom:0px;
    }
        #footer h4 {
            color:#5e5e5e;
            margin-bottom:10px;
        }
        #footer a {
            color:#006c8a;
        }
        #footer a.grey {
            color:#919191;
        }
        #footer ul {
            list-style:none;
        }
            #footer li {
                margin-bottom:10px;
            }
        #footer .all {
            margin:-5px 0 0 20px;
        }
            #footer .i-traffic-lights {
                background-position:-1971px -25px;
            }
        #footer .copyright {
            width:141px;
            float:right;
            margin:20px 60px 0 0;
            //margin:13px 40px 0 0;
            font-size:11px;
            color:#5e5e5e;
        }
            #footer .copyright .pic {
                float:left;
                margin:2px 5px 0 0;
            }
        #footer .rules {
            width:141px;
            float:right;
            margin:20px 70px 0 0;
            //margin:13px 50px 0 0;
        }
            #footer .rules a {
                font-size:11px;
            }
            #footer .rules .ico {
                margin:2px 10px 10px 0;
                float:left;
            }
        #footer .global-search {
            clear:both;
            width:200px;
            float:right;
            padding:0 0 0 20px;
            margin-top:-35px;
            //margin-top:-45px;
            position:relative;
        }
            #footer .global-search .text {
                width:160px;
                height:16px;
                border:1px solid;
                border-top-color:#aaadb2;
                border-left-color:#e3e3eb;
                border-right-color:#dcdfe6;
                border-bottom-color:#e2e9ef;
                padding:2px;
                font-size:12px;
            }
            .global-search .empty {
                background:url(../img/sprite-grid.png) -248px 4px no-repeat;
            }
            #footer .global-search .submit {
                margin:5px;
                text-indent:-99em;
                width:13px;
                height:13px;
                background:url(../img/sprite-icon.png) -1807px 0 no-repeat;
                border:none;
                cursor:pointer;
                outline:none;
            }
            .global-search fieldset {
                border:none;
            }
    #footer .signature {
        clear:both;
        float:right;
        width:200px;
        color:#5e5e5e;
        font-size:11px;
        padding:20px 0 0 0;
    }
    #footer .counters {
        float:left;
        width:375px;
        padding:20px 0 0 0;
    }
    #footer .signature, #footer .counters {
        //padding-top:15px;
    }
        #footer .counters img {
            margin:0 0 20px 20px;
        }

    .dashed, a.dashed {
        color:#006C8A;
        cursor:pointer;
        text-decoration:none;
        background:url(http://i.auto.ru/design/2009/img/bg-dashed-blue.gif) bottom repeat-x;
        line-height:17px;
        border:none;
    }

    i.ico, ins.pic, ins.sale-pic {
        font-size:0;
        display:inline-block;
        vertical-align:middle;
        background:url(../img/sprite-icon.png) 0 0 no-repeat;
        -background-image:url(../img/sprite-icon-ie.png);
    }
    i.i-a-rm {
        background-position:0 0;
        width:28px;
        height:17px;
    }
    i.i-a-rma {
        background-position:-29px 0;
        width:34px;
        height:17px;
    }
    i.i-a-rmab {
        background-position:-64px 0;
        width:41px;
        height:17px;
    }
    i.i-a-rmabt {
        background-position:-106px 0;
        width:47px;
        height:17px;
    }
    i.i-add-1 {
        background-position:-154px 0;
        width:12px;
        height:13px;
    }
    i.i-add-2 {
        background-position:-167px 0;
        width:14px;
        height:15px;
    }
    i.i-add-circle {
        background-position:-182px 0;
        width:16px;
        height:16px;
    }
    i.i-add-variant {
        background-position:-199px 0;
        width:14px;
        height:15px;
    }
    i.i-add {
        background-position:-214px 0;
        width:16px;
        height:16px;
    }
    i.i-aghtung {
        background-position:-231px 0;
        width:14px;
        height:15px;
    }
    i.i-all-opinion {
        background-position:-246px 0;
        width:16px;
        height:15px;
    }
    i.i-anketa {
        background-position:-263px 0;
        width:16px;
        height:13px;
    }
    i.i-arrow-back {
        background-position:-280px 0;
        width:14px;
        height:7px;
    }
    i.i-arrow-blue {
        background-position:-295px 0;
        width:15px;
        height:12px;
    }
    i.i-arrow-left-b {
        background-position:-311px 0;
        width:16px;
        height:22px;
    }
    i.i-arrow-left-grey {
        background-position:-328px 0;
        width:15px;
        height:16px;
    }
    i.i-arrow-left-s {
        background-position:-344px 0;
        width:6px;
        height:11px;
    }
    i.i-arrow-next-test {
        background-position:-351px 0;
        width:10px;
        height:13px;
    }
    i.i-arrow-prev-test {
        background-position:-362px 0;
        width:10px;
        height:13px;
    }
    i.i-arrow-right-b {
        background-position:-373px 0;
        width:16px;
        height:22px;
    }
    i.i-arrow-right-s {
        background-position:-390px 0;
        width:6px;
        height:11px;
    }
    i.i-arrow-simple-left, i.i-long-arrow {
        background-position:-397px 0;
        width:14px;
        height:5px;
    }
    i.i-arrow-steps2 {
        background-position:-412px 0;
        width:16px;
        height:11px;
    }
    i.i-arrow-steps {
        background-position:-429px 0;
        width:14px;
        height:5px;
    }
    i.i-arrow-top-blue {
        background-position:-444px 0;
        width:13px;
        height:15px;
    }
    i.i-arrows-blue {
        background-position:-458px 0;
        width:12px;
        height:8px;
    }
    i.i-asc {
        background-position:-471px 0;
        width:7px;
        height:5px;
    }
    i.i-attention {
        background-position:-479px 0;
        width:16px;
        height:15px;
    }
    i.i-author-w {
        background-position:-496px 0;
        width:16px;
        height:16px;
    }
    i.i-author {
        background-position:-513px 0;
        width:16px;
        height:16px;
    }
    i.i-block {
        background-position:-654px 0;
        width:14px;
        height:15px;
    }
    i.i-blocked {
        background-position:-669px 0;
        width:14px;
        height:14px;
    }
    i.i-calculate {
        background-position:-684px 0;
        width:16px;
        height:13px;
    }
    i.i-calculator {
        background-position:-701px 0;
        width:15px;
        height:16px;
    }
    i.i-calendar {
        background-position:-717px 0;
        width:16px;
        height:16px;
    }
    i.i-checkbox-checked {
        background-position:-734px 0;
        width:13px;
        height:13px;
    }
    i.i-checkbox {
        background-position:-748px 0;
        width:13px;
        height:13px;
    }
    i.i-circle-green {
        background-position:-762px 0;
        width:9px;
        height:10px;
    }
    i.i-circle-grey {
        background-position:-772px 0;
        width:9px;
        height:10px;
    }
    i.i-circle-yellow {
        background-position:-782px 0;
        width:9px;
        height:10px;
    }
    i.i-clock {
        background-position:-792px 0;
        width:14px;
        height:15px;
    }
    i.i-close-info-block {
        background-position:-807px 0;
        width:15px;
        height:15px;
    }
    i.i-close-stoty {
        background-position:-823px 0;
        width:12px;
        height:12px;
    }
    i.i-collapse {
        background-position:-836px 0;
        width:13px;
        height:13px;
    }
    i.i-comment {
        background-position:-850px 0;
        width:11px;
        height:11px;
    }
    i.i-comments-w {
        background-position:-862px 0;
        width:14px;
        height:13px;
    }
    i.i-comments {
        background-position:-877px 0;
        width:14px;
        height:12px;
    }
    i.i-consult {
        background-position:-892px 0;
        width:16px;
        height:16px;
    }
    i.i-contact, i.i-phone {
        background-position:-909px 0;
        width:13px;
        height:16px;
    }
    i.i-decollapse {
        background-position:-923px 0;
        width:13px;
        height:13px;
    }
    i.i-desc {
        background-position:-937px 0;
        width:7px;
        height:5px;
    }
    i.i-document {
        background-position:-945px 0;
        width:16px;
        height:13px;
    }
    i.i-edit-menu {
        background-position:-962px 0;
        width:16px;
        height:16px;
    }
    i.i-edit {
        background-position:-979px 0;
        width:17px;
        height:16px;
    }
    i.i-error {
        background-position:-997px 0;
        width:14px;
        height:15px;
    }
    i.i-exchange {
        background-position:-1012px 0;
        width:16px;
        height:16px;
    }
    i.i-eye-close {
        background-position:-1029px 0;
        width:16px;
        height:16px;
    }
    i.i-eye {
        background-position:-1046px 0;
        width:16px;
        height:16px;
    }
    i.i-fantomas {
        background-position:-1063px 0;
        width:16px;
        height:16px;
    }
    i.i-favorite {
        background-position:-1080px 0;
        width:16px;
        height:16px;
    }
    i.i-file-excel {
        background-position:-1097px 0;
        width:16px;
        height:16px;
    }
    i.i-file-pdf {
        background-position:-1114px 0;
        width:16px;
        height:16px;
    }
    i.i-fill {
        background-position:-1131px 0;
        width:16px;
        height:16px;
    }
    i.i-flag {
        background-position:-1148px 0;
        width:16px;
        height:15px;
    }
    i.i-home {
        background-position:-1165px 0;
        width:11px;
        height:10px;
    }
    i.i-hot {
        background-position:-1177px 0;
        width:12px;
        height:15px;
    }
    i.i-house-white {
        background-position:-1190px 0;
        width:15px;
        height:16px;
    }
    i.i-certificate {
        background-position:-121px -62px;
        width:16px;
        height:16px;
    }
    i.i-house {
        background-position:-1206px 0;
        width:14px;
        height:14px;
    }
    i.i-idea {
        background-position:-1221px 0;
        width:14px;
        height:13px;
    }
    i.i-info-block-yellow {
        background-position:-1236px 0;
        width:17px;
        height:17px;
    }
    i.i-key {
        background-position:-1254px 0;
        width:10px;
        height:16px;
    }
    i.i-korona {
        background-position:-1265px 0;
        width:15px;
        height:13px;
    }
    i.i-mail {
        background-position:-1281px 0;
        width:16px;
        height:13px;
    }
    i.i-mdash {
        background-position:-1298px 0;
        width:9px;
        height:1px;
    }
    i.i-megafon {
        background-position:-1308px 0;
        width:15px;
        height:16px;
    }
    i.i-minus-red {
        background-position:-1324px 0;
        width:9px;
        height:4px;
    }
    i.i-minus {
        background-position:-1334px 0;
        width:8px;
        height:2px;
    }
    i.i-msg-mr {
        background-position:-1343px 0;
        width:19px;
        height:19px;
    }
    i.i-msg-ok {
        background-position:-1363px 0;
        width:19px;
        height:17px;
    }
    i.i-msg {
        background-position:-1383px 0;
        width:16px;
        height:13px;
    }
    i.i-ndash-black {
        background-position:-1400px 0;
        width:8px;
        height:1px;
    }
    i.i-new-opinion {
        background-position:-1409px 0;
        width:16px;
        height:14px;
    }
    i.i-new-row {
        background-position:-1426px 0;
        width:14px;
        height:15px;
    }
    i.i-notebook {
        background-position:-1441px 0;
        width:16px;
        height:16px;
    }
    i.i-ok-circle {
        background-position:-1458px 0;
        width:16px;
        height:16px;
    }
    i.i-page-next {
        background-position:-1475px 0;
        width:8px;
        height:11px;
    }
    i.i-page-prev {
        background-position:-1484px 0;
        width:8px;
        height:11px;
    }
    i.i-pause {
        background-position:-1493px 0;
        width:8px;
        height:11px;
    }
    i.i-pay {
        background-position:-1502px 0;
        width:16px;
        height:15px;
    }
    i.i-personal-info {
        background-position:-1519px 0;
        width:16px;
        height:13px;
    }
    i.i-play-2 {
        background-position:-1536px 0;
        width:9px;
        height:12px;
    }
    i.i-play {
        background-position:-1546px 0;
        width:8px;
        height:14px;
    }
    i.i-play {
        background-position:-1555px 0;
        width:16px;
        height:16px;
    }
    i.i-plus-green {
        background-position:-1572px 0;
        width:14px;
        height:15px;
    }
    i.i-plus-grey {
        background-position:-1587px 0;
        width:14px;
        height:14px;
    }
    i.i-plus {
        background-position:-1602px 0;
        width:8px;
        height:8px;
    }
    i.i-porfel {
        background-position:-1611px 0;
        width:16px;
        height:15px;
    }
    i.i-print {
        background-position:-1628px 0;
        width:16px;
        height:16px;
    }
    i.i-prolong {
        background-position:-1645px 0;
        width:14px;
        height:14px;
    }
    i.i-quote-l {
        background-position:-1660px 0;
        width:11px;
        height:9px;
    }
    i.i-quote-r {
        background-position:-1672px 0;
        width:11px;
        height:9px;
    }
    i.i-refresh {
        background-position:-1684px 0;
        width:15px;
        height:15px;
    }
    i.i-reject {
        background-position:-1700px 0;
        width:14px;
        height:15px;
    }
    i.i-remove-2 {
        background-position:-1715px 0;
        width:10px;
        height:10px;
    }
    i.i-remove-b {
        background-position:-1726px 0;
        width:14px;
        height:13px;
    }
    i.i-remove-row {
        background-position:-1741px 0;
        width:16px;
        height:5px;
    }
    i.i-remove-s {
        background-position:-1758px 0;
        width:7px;
        height:7px;
    }
    i.i-remove {
        background-position:-1766px 0;
        width:14px;
        height:13px;
    }
    i.i-required {
        background-position:-1781px 0;
        width:8px;
        height:8px;
    }
    i.i-return {
        background-position:-1790px 0;
        width:16px;
        height:15px;
    }
    i.i-search {
        background-position:-1807px 0;
        width:13px;
        height:13px;
    }
    i.i-services-arrow {
        background-position:-1821px 0;
        width:7px;
        height:4px;
    }
    i.i-settings {
        background-position:-1829px 0;
        width:14px;
        height:15px;
    }
    i.i-stop {
        background-position:-1844px 0;
        width:14px;
        height:15px;
    }
    i.i-succesful {
        background-position:-1859px 0;
        width:14px;
        height:13px;
    }
    i.i-succesfull {
        background-position:-1874px 0;
        width:14px;
        height:13px;
    }
    i.i-successful {
        background-position:-1889px 0;
        width:14px;
        height:13px;
    }
    i.i-tags-2 {
        background-position:-1904px 0;
        width:16px;
        height:11px;
    }
    i.i-tags {
        background-position:-1921px 0;
        width:16px;
        height:16px;
    }
    i.i-to-blog {
        background-position:-1938px 0;
        width:15px;
        height:16px;
    }
    i.i-to-date {
        background-position:-1954px 0;
        width:16px;
        height:16px;
    }
    i.i-traffic-lights {
        background-position:-1971px 0;
        width:26px;
        height:25px;
    }
    i.i-tyre {
        background-position:-1998px 0;
        width:15px;
        height:16px;
    }
    i.i-user {
        background-position:0 -62px;
        width:12px;
        height:13px;
    }
    i.i-vehicle {
        background-position:-13px -62px;
        width:16px;
        height:14px;
    }
    i.i-votes-w {
        background-position:-30px -62px;
        width:15px;
        height:16px;
    }
    i.i-votes {
        background-position:-46px -62px;
        width:15px;
        height:15px;
    }
    i.i-windows {
        background-position:-62px -62px;
        width:11px;
        height:10px;
    }
    ins.pic {
        background-image:url(../img/sprite-grid.png);
    }
    ins.bg-arrow-login {
        background-position:-9px 0;
        width:12px;
        height:12px;
    }
    ins.bg-copyright {
        background-position:-22px 0;
        width:25px;
        height:24px;
    }
    ins.sale-pic {
        background-image:url(../img/sprite-sale.png);
    }
    ins.bg-cost {
        background-position:0 0;
        width:23px;
        height:45px;
    }
    ins.p-attention-sms {
        background-position:-145px 0;
        width:36px;
        height:33px;
    }
    ins.p-draw-1 {
        background-position:-182px 0;
        width:140px;
        height:140px;
    }
    ins.p-draw-2 {
        background-position:-323px 0;
        width:140px;
        height:140px;
    }
    ins.p-draw-3 {
        background-position:-464px 0;
        width:141px;
        height:140px;
    }
/*
.adv-context {
    clear:both;
}
    .adv-context h4 {
        display:none;
    }
    .adv-context ul {
        background:#fff;
        overflow:hidden;
        padding:20px 0 0 0;
        margin:0;
        border:1px solid #d1d1d1;
        line-height:18px;
    }
        .adv-context li {
            margin:0 20px 20px 20px;
            display:inline-block;
            vertical-align:top;
            font-size:12px;
        }
        .adv-context li {
            //display:inline;
        }
            .adv-context li a {
                font-size:13px;
                font-weight:bold;
                color:#730a0a;
            }
        .adv-context .variant-1 li {
            width:160px;
        }
    .adv-context .variant-2, .adv-context .variant-3 {
        padding-left:10px;
        padding-right:20px;
    }
        .adv-context .variant-2 li, .adv-context .variant-3 li {
            width:230px;
            margin-right:0;
            margin-left:10px;
        }
    .adv-context .variant-3 {
        width:938px;
    }
        .adv-context .variant-3 li {
            width:173px;
        }
        .adv-context .link .l {
            float:right;
            width:110px;
            height:12px;
            background:#b0b0b0;
            color:#fff;
            font-size:8px;
            line-height:11px;
            text-decoration:none;
            text-align:center;
            text-transform:uppercase;
            white-space:nowrap;
        }
*/
/* блок текстовой рекламы */

.adv-context {
    border:1px solid #d4d4d4;
    background:#fff;
    margin-bottom:20px;
    position:relative;
}
    .adv-context ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .adv-context li {
        font-size: 12px;
        margin: 0;
        padding: 0;
        line-height:18px;
    }
    .adv-context .n {
        color:#750a04;
        font-weight:bold;
    }
    .adv-context .c {
        font-size:11px;
    }
    .adv-context .ico {
        margin:3px;
    }
    .adv-context .all a {
        color:#750a04;
    }
    .adv-1 {
        width:200px;
    }
        .adv-1 ul {
            margin:15px 20px 0 20px;
        }
            .adv-1 li {
                margin:0 0 15px 0;
            }
            .adv-1 .add {
                border-top:1px dashed #d1d1d1;
                padding:10px 10px 10px 17px;
                margin:0 -20px;
            }
        .adv-1 ul.b {
            margin:0x;
        }
        .adv-2 ul {
            width:98%;
            overflow:hidden;
            margin:15px 2% 0 0;
        }
            .adv-2 li {
                float:left;
                width:18%;
                margin-left:2%;

                //width:17.9%;
                //margin-top:15px;
            }
            .adv-2 .all {
                float:right;
            }
            .adv-2 .b {
                border-top:1px dashed #d1d1d1;
                width:96%;
                padding:10px 2%;
                margin:15px 0 0 0;
            }
            .adv-2 .b li {
                margin:0;
                width:auto;
            }
        .adv-3 ul {
            width:79%;
            overflow:hidden;
        }
            .adv-3 li {
                float:left;
                width:22.5%;
                margin:15px 0 15px 2.5%;
                //width:22%;
            }
        .adv-3 .b {
            width:15%;
            height:100%;
            position:absolute;
            top:0;
            right:0;
            padding:0 2%;
            margin:0;
            border-left:1px dashed #d1d1d1;
        }
            .adv-3 .b li {
                float:none;
                width:100%;
            }
                .adv-3 .add {
                    position:absolute;
                    bottom:0;
                    left:17px;
                }
                .adv-3 .add a {
                    width:75px;
                    vertical-align:top;
                    display:inline-block;
                    margin-left:3px;
                }

/* ---------------------- */

input.block-submit {
    margin-top: 30px;
}
ul.legend li {
    clear: both;
    text-align: left;
    list-style-type: none;
}
ul.legend li div.example {
    text-align: center;
    margin-right: 5px;
    clear: both;
    float: left;
    width: 30px;
    height: 14px;
    border: 1px solid black;
    margin-bottom: 1px;
}
.attention {
    color: red;
    font-size: 12px;
}
.green {
    color: green;
}

#select-type-ads {
    width:520px;
    height:520px;
}
    #select-type-ads ul {
        width:100%;
        overflow:hidden;
        list-style: none outside none;
    }
         #select-type-ads .b-type-ads {
            float:left;
            width:150px;
            height:165px;
            margin:20px 40px;
            padding:0 10px 0 10px;
            text-align:center;
        }
            #select-type-ads ins {
                width:160px;
                height:130px;
                display:block;
                background:url(../img/sprite-type-ads.png) 0 0 no-repeat;
            }
            #select-type-ads .bta-2 {
                background-position:-160px 0;
            }
            #select-type-ads .bta-3 {
                background-position:-320px 0;
            }
            #select-type-ads .bta-4 {
                background-position:-480px 0;
            }';




$css = '/* test comment 1 */
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

//$c = new csscomb($css, true, $case['order']);
$c = new csscomb($css, true);
?>
</body>
</html>