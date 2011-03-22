<?
$index = true;
$title['en'] = $h1['en'] = 'Greatest tools bundle for sorting CSS properties in specific order';
$title['ru'] = $h1['ru'] = 'Инструмент для сортировки CSS-свойств в нужном порядке';


require_once'common/header.php';
?>
        <div style="width:445px;margin:50px auto;"><img width="445" height="453" src="static/i/csscomb.png" alt="CSScomb"></div>

		<table style="width:100%;margin:5px 0 40px;">
			<tr>
                <td style="width:50%;padding-left:10px;">
                    <h2><?=$loc['versions']?></h2>
					<ul>
						<li><a href="/online/">CSScomb Online</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> Textmate</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> Coda</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> IntelliJ IDEA/WebStorm</a></li>
                        <li><?=$loc['help-us']?></li>
					</ul>
                </td>
                <td style="width:30px;border-left:2px dotted #e5e5e5;">&nbsp;</td>
                <td style="vertical-align:top;">
					<h2><?=$loc['feature']?></h2>
					<ul class="about-block">
						<li>
							<strong><?=$loc['index1']?></strong>
							<span><?=$loc['index11']?></span>
						</li>
                        <li>
							<strong><?=$loc['index2']?></strong>
							<span><?=$loc['index22']?></span>
						</li>
                        <li>
							<strong><?=$loc['index3']?></strong>
							<span><?=$loc['index33']?></span>
						</li>
                        <li>
							<strong><?=$loc['index4']?></strong>
							<span><?=$loc['index44']?></span>
						</li>
                        <li>
							<strong><?=$loc['index5']?></strong>
							<span><?=$loc['index55']?></span>
						</li>
                        <li>
							<strong><?=$loc['index6']?></strong>
							<span><?=$loc['index66']?></span>
						</li>
                        <li>
							<strong><?=$loc['index7']?></strong>
							<span><?=$loc['index77']?></span>
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