<?
$index = true;
$title['en'] = $h1['en'] = 'The Greatest tool for sorting CSS properties in specific order';
$title['ru'] = $h1['ru'] = 'Инструмент для сортировки CSS-свойств в нужном порядке';

require_once'common/header.php';
?>
        <div class="splash">
            <a
                href="https://twitter.com/share"
                class="twitter-share-button"
                data-lang="<?=$lang?>"
                data-related="CSScomb"
                data-url="http://csscomb.<?=($lang === 'en' ? 'com' : 'ru')?>"
                data-size="large"><?=$loc['tweet']?></a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <div class="versions">
            <h2><?=$loc['versions']?></h2>
            <ul>
                <li><a href="/online/">CSScomb Online</a></li>
                <li>CSScomb <?=$loc['for']?> Sublime Text 2</a> <?=$loc['sublime']?></li>
                <li><a href="http://csscomb.com/download/csscomb_for_textmate_2-12-1301040046.zip">CSScomb <?=$loc['for']?> Textmate</a></li>
                <li><a href="http://csscomb.com/download/csscomb_for_coda-2_2-12-1301040046.zip">CSScomb <?=$loc['for']?> Coda 2</a></li>
                <li><a href="http://csscomb.com/download/csscomb_for_coda_2-12-1301040046.zip">CSScomb <?=$loc['for']?> Coda</a></li>
                <li><a href="http://csscomb.com/download/csscomb_for_espresso-2_2-12-1301040046.zip">CSScomb <?=$loc['for']?> Espresso 2</a></li>
                <li><a href="http://csscomb.com/download/csscomb_for_webstorm-pycharm-idea_2-12-1301040046.zip">CSScomb <?=$loc['for']?> IntelliJIDEA/WebStorm/PyCharm</a></li>
                <li><a href="http://csscomb.com/download/csscomb_for_notepad-plus-plus_2-12-1301040046.zip">CSScomb <?=$loc['for']?> Notepad++</a></li>
                <li><a href="https://github.com/miripiruni/CSScomb-for-Vim/">CSScomb <?=$loc['for']?> Vim</a></li>
                <li><a href="https://github.com/drudge/csscomb.chocmixin">CSScomb <?=$loc['for']?> Chocolat</a></li>
            </ul>
            <p><?=$loc['help-us']?></p>
        </div>
        <div class="feature">
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
            </ul>
        </div>

        <div class="updates">
            <h2><?=$loc['updates']?></h2>
            <ul>
            <?
                $tweets = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/csscomb.json?include_rts=true&count=30"));
                $i = 0;

                foreach ($tweets as $tweet) {
                    if ($tweet->in_reply_to_user_id === NULL) {
                        $date = preg_replace('/(\w{3})\s(\w{3})\s(\d*)\s(\d\d(:\d\d){2})\s\+(?:\d{4})\s(\d{4})/','$3 $2 $6',$tweet->created_at);

                        $tweet->text = preg_replace('/http\:\/\/([\w.\/]+)/', '<a href="http://${1}">${1}</a>', $tweet->text);
                        $tweet->text = preg_replace('/\@(\w+)/', '<a href="http://twitter.com/${1}">@${1}</a>', $tweet->text);

                        echo '
                        <li>
                            <time><a target="_blank" href="http://twitter.com/csscomb/statuses/'.$tweet->id_str.'">'.$date.'</a></time>
                            <span>'.$tweet->text.'</span>
                        </li>';

                        $i++;
                        if ($i >= 4) {
                            break;
                        }
                    }
                }
            ?>
            </ul>
        </div>

        <div class="video">
            <h2><?=$loc['presentation']?></h2>
            <iframe src="http://player.vimeo.com/video/22799313?title=0&amp;byline=0&amp;portrait=0" width="640" height="360" style="width:310px;height:174px;" frameborder="0"></iframe>
        </div>

        <div class="clear"></div>
<?require_once'common/footer.php'?>
