<?
$index = true;
$title['en'] = $h1['en'] = 'Greatest tools bundle for sorting CSS properties in specific order';
$title['ru'] = $h1['ru'] = 'Инструмент для сортировки CSS-свойств в нужном порядке';


require_once'common/header.php';
//$ts = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/csscomb.json?include_rts=true&count=3"));
//echo '<pre>';
//var_dump($ts);
//echo '</pre>';
?>
        <div style="width:445px;margin:50px auto;"><img width="445" height="453" src="static/i/csscomb.png" alt="CSScomb"></div>
		<table style="width:100%;margin:5px 0 40px;">
			<tr>
                <td style="width:50%;padding-left:10px;">
                    <h2><span class="brace">#</span><?=$loc['versions']?> <span class="brace">{</span></h2>
					<ul>
						<li><a href="/online/">CSScomb Online</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> Textmate</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> Coda</a></li>
						<li><a href="">CSScomb <?=$loc['for']?> IntelliJ IDEA/WebStorm</a></li>
                        <li><?=$loc['help-us']?></li>
					</ul>
                    <span class="brace brace-close">}</span>
                </td>
                <td style="width:30px;border-left:2px dotted #e5e5e5;">&nbsp;</td>
                <td style="vertical-align:top;">
					<h2><span class="brace">#</span><?=$loc['feature']?> <span class="brace">{</span></h2>
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
                    <span class="brace brace-close">}</span>
				</td>
			</tr>
		</table>

		<table style="width:100%;margin-bottom:10px;">
			<tr>
				<td style="width:31%;vertical-align:top;padding-right:10px;padding-left:10px;">
					<h2><span class="brace">#</span><?=$loc['updates']?> <span class="brace">{</span></h2>
                    <ul style="list-style:none;margin-left:0;">
                    <?
                        $ts = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/csscomb.json?include_rts=true&count=10"));
                        $i = 0;
                        foreach($ts as $t){
                            if($t->in_reply_to_user_id === NULL){
                                $date = preg_replace('/(\w{3})\s(\w{3})\s(\d*)\s(\d\d(:\d\d){2})\s\+(?:\d{4})\s(\d{4})/','$3 $2 $6',$t->created_at);
                                    echo '
                                <li style="margin-left:0;">
                                    <time style="color:gray;margin-top:3px;display:block;font-size:10px;"><a target="_blank" href="http://twitter.com/csscomb/statuses/'.$t->id_str.'">'.$date.'</a></time>
                                    <span>'.$t->text.'</span>
                                </li>';

                                $i++;
                                if($i>=2){
                                    break;
                                }
                            }
                        }
                    ?>
					</ul>
                    <span class="brace brace-close">}</span>
				</td>
                <td style="width:35%;vertical-align:top;xborder-left:2px dotted #e5e5e5;padding-left:20px;padding-right:20px;">
					<h2><span class="brace">#</span><?=$loc['review']?> <span class="brace">{</span></h2>
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
                    <span class="brace brace-close">}</span>
				</td>
                <td style="width:33%;vertical-align:top;xborder-left:2px dotted #e5e5e5;padding-left:20px;padding-right:10px;">
                    <h2><span class="brace">#</span><?=$loc['presentation']?> <span class="brace">{</span></h2>
                    <iframe src="http://player.vimeo.com/video/17494685?title=0&amp;portrait=0" width="310" height="174" frameborder="0"></iframe>
                    <span class="brace brace-close">}</span>
                </td>
			</tr>
		</table>
<?require_once'common/footer.php'?>