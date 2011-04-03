<?
$title['en'] = $h1['en'] = 'Online sorting';
$title['ru'] = $h1['ru'] = 'Онлайн сортировка';
$module = 'online';

require_once'../common/header.php';
?>
		<div id="mode-selector" class="code-view-mode">
			<a id="mode-edit" class="pseudo-link" href=""><?=$loc['edit-mode']?></a>
			<a id="mode-diff" class="pseudo-link" href=""><?=$loc['diff-mode']?></a>
		</div>
		<div class="settings-link"><a href="#"><?=$loc['settings']?></a></div>
		<div class="code">
			<table>
				<tr>
					<td class="code-line-numbers-original"></td>
					<td class="h-code-original">
						<pre class="code-original css"></pre>
					</td>
					<td class="code-line-numbers-resorted"></td>
					<td class="h-code-resorted">
						<pre class="code-resorted css"></pre>
					</td>
				</tr>
			</table>
		</div>
		<div class="code-actions">
			<button id="resort-button" class="button"><?=$loc['resort']?></button> <kbd>Ctrl + Enter</kbd>
			<a id="copy-result-button" class="pseudo-link" href=""><?=$loc['copy-result-code']?></a>
		</div>
		<div class="clear"></div>
        <div class="settings-bar">
            <span class="hide"><i>&rarr;</i> <span>Скрыть</span> <kbd>Esc</kbd></span>
            <h2>Настройки порядка сортировки</h2>
            <p>
                <span>Пресеты сортировок:</span>
                <span class="preset">by Zen Coding</span>
                <span class="preset">by Яндекс</span>
                <span class="preset">По-своему</span>
            </p>
            <p>Если хотите, разделите свойства на группы пустой строкой, тогда результат сортировки будет отформатирован так же.</p>
            <div><button type="submit">Сохранить</button></div>
            <textarea name="settings" id="settings-textarea" cols="30" rows="10">position
top
right
bottom
left
z-index
float
clear
display
visibility
overflow
overflow-x
overflow-y
overflow-style
zoom
clip
box-sizing
box-shadow
-webkit-box-shadow
-moz-box-shadow
margin
margin-top
margin-right
margin-bottom
margin-left
padding
padding-top
padding-right
padding-bottom
padding-left
width
height
max-width
max-height
min-width
min-height
outline
outline-offset
outline-width
outline-style
outline-color
border
border-break
border-collapse
border-color
border-image
-webkit-border-image
-moz-border-image
border-top-image
border-right-image
border-bottom-image
border-left-image
border-corner-image
border-top-left-image
border-top-right-image
border-bottom-right-image
border-bottom-left-image
border-fit
border-length
border-spacing
border-style
border-width
border-top
border-top-width
border-top-style
border-top-color
border-right
border-right-width
border-right-style
border-right-color
border-bottom
border-bottom-width
border-bottom-style
border-bottom-color
border-left
border-left-width
border-left-style
border-left-color
-webkit-border-radius
-moz-border-radius
-khtml-border-radius
border-radius
border-top-right-radius
border-top-left-radius
border-bottom-right-radius
border-bottom-left-radius
background
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader
background-color
background-image
background-repeat
background-attachment
background-position
background-position-x
background-position-y
background-break
background-clip
background-origin
background-size
color
table-layout
caption-side
empty-cells
list-style
list-style-position
list-style-type
list-style-image
quotes
content
counter-increment
counter-reset
vertical-align
text-align
text-align-last
text-decoration
text-emphasis
text-height
text-indent
text-justify
text-outline
text-replace
text-transform
text-wrap
text-shadow
line-height
white-space
white-space-collapse
word-break
word-spacing
word-wrap
letter-spacing
font
font-weight
font-style
font-variant
font-size
font-size-adjust
font-family
font-effect
font-emphasize
font-emphasize-position
font-emphasize-style
font-smooth
font-stretch
opacity
filter:progid:DXImageTransform.Microsoft.Alpha(Opacity
-ms-filter:'progid:DXImageTransform.Microsoft.Alpha
transitions
resize
cursor
page-break-before
page-break-inside
page-break-after
orphans
widows</textarea>
        </div>
        <div class="popup" id="shortcutsSheet">
            <hgroup class="popup-header">
                <span class="popup-close">Закрыть <kbd>(Esc)</kbd></span>
                <h2 class="popup-title">Сочетания клавиш</h2>
            </hgroup>
            <div class="popup-content">
                <table>
                    <tr>
                        <th>Сортировать</th>
                        <td><kbd>Ctrl+R, Ctrl + Enter</kbd></td>
                    </tr>
                    <tr>
                        <th>Режим редактирования</th>
                        <td><kbd>Ctrl + E</kbd></td>
                    </tr>
                    <tr>
                        <th>Режим сравнения</th>
                        <td><kbd>Ctrl + D</kbd></td>
                    </tr>
                    <tr>
                        <th>Показать/скрыть настройки</th>
                        <td><kbd>Ctrl + S</kbd></td>
                    </tr>
                    <tr>
                        <th>Закрыть настройки/попап</th>
                        <td><kbd>Esc</kbd></td>
                    </tr>
                </table>
            </div>
        </div>
        <script type="text/javascript" src="../static/js/online.js"></script>
        <script type="text/javascript" src="../static/highlight/highlight.pack.js"></script>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
        <!--<script type="text/javascript" src="../static/js/allow_tab_key.js"></script>-->
<?require_once'../common/footer.php'?>
