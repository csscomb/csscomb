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
			<table class="edit-mode">
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
            <span class="hide"><?=$loc['settings-hide']?></span>
            <h2><?=$loc['settings-title']?></h2>
            <?/*<p>
                <span>Пресеты сортировок:</span>
                <span id="zen-sort-order" class="preset">by Zen Coding</span>
                <span id="ya-sort-order" class="preset">by Яндекс</span>
                <span id="user-sort-order" class="preset">По-своему</span>
            </p>*/?>
            <p><?=$loc['settings-comment']?></p>
            <div>
                <button id="save-sort-order" type="submit"><?=$loc['settings-save']?></button>
                <span id="settings-status"></span>
            </div>
            <textarea name="settings" id="settings-textarea" cols="30" rows="10"></textarea>
        </div>
        <div class="popup" id="shortcutsSheet">
            <hgroup class="popup-header">
                <span class="popup-close"><?=$loc['close']?></span>
                <h2 class="popup-title"><?=$loc['shortcuts']?></h2>
            </hgroup>
            <div class="popup-content">
                <?=$loc['shortcuts-content']?>
            </div>
        </div>
        <div class="popup" id="copyResultPopup">
            <hgroup class="popup-header">
                <span class="popup-close"><?=$loc['close']?></span>
                <h2 class="popup-title"><?=$loc['copy-result']?></h2>
            </hgroup>
            <div class="popup-content">
                <textarea id="copy-result-textarea" cols="30" rows="10"></textarea>
            </div>
        </div>
        <script type="text/javascript" src="../static/js/online.js"></script>
        <script type="text/javascript" src="../static/highlight/highlight.pack.js"></script>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
<?require_once'../common/footer.php'?>
