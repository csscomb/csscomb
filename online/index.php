<?
$title['en'] = $h1['en'] = 'Online sorting';
$title['ru'] = $h1['ru'] = 'Онлайн сортировка';


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
					<td class="code-line-numbers"></td>
					<td class="h-code-original">
						<pre class="code-original css"></pre>
					</td>
					<td class="code-line-numbers"></td>
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
        <script type="text/javascript" src="../static/js/online.js"></script>
        <script type="text/javascript" src="../static/highlight/highlight.pack.js"></script>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
        <!--<script type="text/javascript" src="../static/js/allow_tab_key.js"></script>-->
<?require_once'../common/footer.php'?>
