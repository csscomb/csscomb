<?
$index = true;
$title['en'] = $h1['en'] = 'Greatest tools bundle for sorting <span class="nowrap">CSS properties</span> in specific order';
$title['ru'] = $h1['ru'] = 'CSScomb — утилита для сортировки CSS-свойств в нужном порядке';


require_once'common/header.php';
?>
        <div style="width:445px;margin:50px auto;"><img src="static/i/csscomb.png" alt="CSScomb"></div>

		<table style="width:100%;margin:5px 0 40px;">
			<tr>
                <td style="width:50%">
                    <h2><?=$loc['versions']?></h2>
					<ul>
						<li><a href="/online/">CSScomb Online</a></li>
						<li><a href="">CSScomb for Textmate</a></li>
						<li><a href="">CSScomb for Coda</a></li>
						<li><a href="">CSScomb for IntelliJ IDEA or WebStorm</a></li>
                        <li>Помоги CSScomb, подружи его с другими редакторами кода.</li>
					</ul>
                </td>
                <td style="width:30px;border-left:2px dotted #e5e5e5;">&nbsp;</td>
                <td style="vertical-align:top;">
					<h2><?=$loc['feature']?></h2>
					<ul class="about-block">
						<li>
							<strong>Cортировка CSS-свойств</strong>
							<span>Порядок свойств в помощь профессионалу</span>
						</li>
						<li>
							<strong>Настройки порядка CSS-свойств</strong>
							<span>Используйте тот порядок, к которому вы привыкли</span>
						</li>
                        <li>
							<strong>Парсинг CSS в тегах <code>&lt;style></code>, аттрибутах <code>style="..."</code></strong>
							<span>CSScomb найдет CSS-код среди других языков и отсортирует его</span>
						</li>
                        <li>
							<strong>Форматирование таблицы стилей сохраняется</strong>
							<span>Работайте как с однострочным так и многострочным CSS</span>
						</li>
						<li>
							<strong>Разделение CSS-свойств на группы</strong>
							<span>Разделяйте группы пустой строкой, если хотите</span>
						</li>
						<li>
							<strong>Полная поддержка CSS2/CSS2.1/CSS3</strong>
							<span>CSScomb готов к самому продвинутому CSS-коду</span>
						</li>
						<li>
							<strong>Базовая поддержка <abbr title="The dynamic stylesheet language http://lesscss.org/">LESS</abbr>/<abbr title="Syntactically Awesome Stylesheets http://sass-lang.com/">SASS</abbr></strong>
							<span>Вложенные блоки, вычисления, переменные и т.д.</span>
						</li>
					</ul>
				</td>
			</tr>
		</table>

		<table style="width:100%;margin-bottom:10px;">
			<tr>
				<td style="width:31%;vertical-align:top;padding-right:10px;padding-left:10px;">
					<h2><?=$loc['updates']?></h2>
					<ul>
						<li>
							<time style="display:block;">28 feb</time>
							<span>Add full LESS/SASS support</span>
						</li>
						<li>
							<time style="display:block;">9 feb</time>
							<span>Again add some blah-blah-blah</span>
						</li>
						<li>
							<time style="display:block;">1 feb</time>
							<span>Add some bla-bla-bla</span>
						</li>
					</ul>
				</td>
                <td style="width:35%;vertical-align:top;border-left:2px dotted #e5e5e5;padding-left:20px;padding-right:20px;">
					<h2><?=$loc['review']?></h2>
					<table style="width:100%;">
						<tr>
							<td style="vertical-align:middle;width:32px;">
								<a href=""><img src="static/i/prev.png" alt=""></a>
							</td>
							<td style="vertical-align:top;">
								<em>Dan Cederholm presents real CSS3 for real websites. Cogent, concise, comprehensible. Look no further. Dan Cederholm presents real CSS3 for real websites. Cogent, concise, comprehensible. Look no further.</em>
								<br>
								<cite style="display:block;text-align:right;margin-top:5px;font-size:.75em;">— Dmitriy Medved, medved.com</cite>
							</td>
							<td style="vertical-align:middle;width:32px;">
								<a href=""><img src="static/i/next.png" alt=""></a>
							</td>
						</tr>
					</table>
				</td>
                <td style="width:33%;vertical-align:top;border-left:2px dotted #e5e5e5;padding-left:20px;padding-right:10px;">
                    <h2><?=$loc['presentation']?></h2>
                    <iframe src="http://player.vimeo.com/video/17494685?title=0&amp;portrait=0" width="310" height="174" frameborder="0"></iframe>
                </td>
			</tr>
		</table>
<?require_once'common/footer.php'?>