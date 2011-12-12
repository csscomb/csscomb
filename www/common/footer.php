    </div>
    <footer class="page-footer">
		<p>
			<span>© 2009–2011, CSScomb.ru</span>
			<a id="bug-report" href="https://github.com/miripiruni/CSScomb/issues?sort=created&direction=desc&state=open"><?=$lang=='ru'?'Баг-трекер':'Feedback'?></a>
			<?=$lang=='ru'?'<a href="https://twitter.com/csscomb" target="_blank">Твиттер</a>':'<a href="https://twitter.com/csscomb" target="_blank">Follow me</a>'?>
			<?=$lang=='ru'?'<a href="?lang=en">English</a>':'<a href="?lang=ru">По-русски</a>'?>
			<?if($module=='online'){
                echo '<a id="toggleShortcutsSheet">'.($lang=='ru'?'Сочетания клавиш':'Shortcuts').'</a>';
            }?>
		</p>
	</footer>
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter6201430 = new Ya.Metrika({id:6201430,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        }
        catch(e) { }
    });
})(window, 'yandex_metrika_callbacks');
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/6201430" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</div>
</body>
</html>
