<?
$index = true;
$title['en'] = $h1['en'] = 'Greatest tool for sorting CSS properties in specific order';
$title['ru'] = $h1['ru'] = 'Инструмент для сортировки CSS-свойств в нужном порядке';


require_once'common/header.php';
//$ts = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/csscomb.json?include_rts=true&count=3"));
//echo '<pre>';
//var_dump($ts);
//echo '</pre>';
?>
        <div class="splash">
            <a href="http://twitter.com/share" class="twitter-share-button" data-text="http://csscomb.ru: инструмент для сортировки CSS-свойств в нужном порядке" data-count="none" data-via="csscomb" data-related="miripiruni">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </div>
        <div class="versions">
            <h2><?=$loc['versions']?></h2>
            <ul>
                <li><a href="/online/">CSScomb Online</a></li>
                <li><a href="">CSScomb <?=$loc['for']?> Textmate</a></li>
                <li><a href="">CSScomb <?=$loc['for']?> Coda</a></li>
                <li><a href="">CSScomb <?=$loc['for']?> IntelliJ IDEA/WebStorm</a></li>
                <li><?=$loc['help-us']?></li>
            </ul>
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
                <?/*<li>
                    <strong><?=$loc['index7']?></strong>
                    <span><?=$loc['index77']?></span>
                </li>*/?>
            </ul>
        </div>

        <div class="updates">
            <h2><?=$loc['updates']?></h2>
            <ul>
            <?
                $ts = json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/csscomb.json?include_rts=true&count=10"));
                $i = 0;
                foreach($ts as $t){
                    if($t->in_reply_to_user_id === NULL){
                        $date = preg_replace('/(\w{3})\s(\w{3})\s(\d*)\s(\d\d(:\d\d){2})\s\+(?:\d{4})\s(\d{4})/','$3 $2 $6',$t->created_at);
                            echo '
                        <li>
                            <time><a target="_blank" href="http://twitter.com/csscomb/statuses/'.$t->id_str.'">'.$date.'</a></time>
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
        </div>


        <div class="reviews">
            <h2><?=$loc['review']?></h2>
            <div><em>Dan Cederholm presents real CSS3 for real websites. Cogent, concise, comprehensible. Look no further. Dan Cederholm presents real CSS3 for real websites. Cogent, concise, comprehensible. Look no further.</em></div>
            <cite>— Dmitriy Medved, medved.com</cite>
        </div>


        <div class="video">
            <h2><?=$loc['presentation']?></h2>
            <iframe src="http://player.vimeo.com/video/17494685?title=0&amp;portrait=0" width="310" height="174" frameborder="0"></iframe>
        </div>

        <div class="clear"></div>
<?require_once'common/footer.php'?>