    </div>
    <footer class="page-footer">
		<p>
			<span>© 2009–2011, CSScomb.ru</span>
			<?=$lang=='ru'?'<a id="bug-report" href="mailto:mail@csscomb.ru">Обратная связь</a>':'<a id="bug-report" href="mailto:mail@csscomb.ru">Feedback</a>'?>
			<?=$lang=='ru'?'<a href="https://twitter.com/csscomb" target="_blank">Твиттер</a>':'<a href="https://twitter.com/csscomb" target="_blank">Follow me</a>'?>
			<?=$lang=='ru'?'<a href="?lang=en">English</a>':'<a href="?lang=ru">По-русски</a>'?>
			<?if($module=='online'){
                echo '<a id="toggleShortcutsSheet">'.($lang=='ru'?'Сочетания клавиш':'Shortcuts').'</a>';
            }?>
		</p>
	</footer>
</div>
</body>
</html>