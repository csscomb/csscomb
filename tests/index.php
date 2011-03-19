<?
$title['en'] = $h1['en'] = 'Tests';
$title['ru'] = $h1['ru'] = 'Тесты';

require_once'../common/header.php';

        require_once 'cases.php';
        require_once'../lib/csscomb.php';
        $c = new csscomb();

        $test_count = $errors = $warnings = 0;
        $case_groups_nav = $tests_list = '';

        // Строим навигацию по группам
        $case_groups_nav .= '<div style="float:left;"><h2>Категории тестов</h2><ol>';
        foreach($case_groups as $group_key=>$group){
            $case_groups_nav .= '<li><a href="#'.$group["group-id"].'">'.$group["group-name"].'</a></li>';
        }
        $case_groups_nav .= '</ol></div>';

        // Строим список тестов
        foreach($case_groups as $group_key => $group){
            $tests_list .= '<h3 id="'.$group["group-id"].'">'.($group_key+1).'. '.$group['group-name'].'</h3>';

            foreach($group['cases'] as $case){
                $result = $c->csscomb($case['code'], false, $case['order']);

                if($result===$case['result']) {
                    $passed = 'success';
                }
                else{
                    $passed = 'error';

                    if(strlen($result)!=strlen($case['result'])){
                        $errors++;
                    }
                    else{
                        $warnings++;
                        $passed = 'warning';
                    }
                }

                $tests_list .= '
                    <div class="test '.$passed.'" id="'.$case['link'].'">
                        <h4 class="test-title">
                            <span><i class="toggle">+</i> '.$case['descr'].'</span>
                            <a href="#'.$case['link'].'"><img src="../static/i/anchor.gif"></a>
                        </h4>
                        <div class="code">
                            <table>
                                <tr>
                                    <td class="code-line-numbers"></td>
                                    <td class="code-original">
                                            <pre class="css"><code>'.htmlentities($case['code']).'</code></pre>
                                    </td>
                                    <td class="code-line-numbers"></td>
                                    <td class="code-resorted">
                                        <pre class="css"><code>'.htmlentities($result).'</code></pre>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>';

                $test_count++;
            }
        }
        ?>

        <div class="tests-summary">
            <table>
                <tfoot>
                    <tr>
                        <th>Всего тестов:</th>
                        <td class="count"><span><?=$test_count?></span></td>
                        <td></td>
                    </tr>
                </tfoot>
                <tr>
                    <th>Ошибок:</th>
                    <td class="count"><span class="error"><?=$errors?></span></td>
                    <td class="comment">код поломался или пересортировался с нарушениями</td>
                </tr>
                <tr>
                    <th>Предупреждений:</th>
                    <td class="count"><span class="warning"><?=$warnings?></span></td>
                    <td class="comment">код не пересортировался или частично не пересортировался, но при этом сохранил свою целостность</td>
                </tr>
                <tr>
                    <th>Успешно:</th>
                    <td class="count"><span class="success"><?=($test_count - $warnings - $errors)?></span></td>
                    <td class="comment">получен ожидаемый код с указанным порядком сортировки</td>
                </tr>
            </table>
        </div>

        <?=$case_groups_nav?>

        <div class="filter-for-tests">
            <h4>Фильтр по результатам</h4>
            <ul>
                <li><span id="show-all-tests">Все</span></li>
                <li><span id="show-errors-and-warnings">Ошибки и предупреждения</span></li>
                <li><span id="show-errors-only">Только ошибки</span></li>
                <li><span id="show-warnings-only">Только предупреждения</span></li>
                <li><span id="show-success-only">Только успешно пройденные</span></li>
            </ul>
        </div>
        <div class="clear"></div>

        <div class="test-list">
            <h2>Тесты</h2>
            <?=$tests_list?>
            <div class="clear"></div>
        </div>
        <script type="text/javascript" src="../static/highlight/highlight.pack.js"></script>
        <script type="text/javascript" src="../static/js/tests.js"></script>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
<?require_once'../common/footer.php'?>