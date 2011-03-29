<?
$title['en'] = $h1['en'] = 'Tests';
$title['ru'] = $h1['ru'] = 'Тесты';
$module = 'tests';
require_once'../common/header.php';

        require_once 'cases.php';
        require_once'../lib/csscomb.php';
        $c = new csscomb();

        $test_count = $errors = $warnings = 0;
        $case_groups_nav = $tests_list = '';

        // Строим навигацию по группам
        $case_groups_nav .= '<div style="float:left;"><h2>'.$loc['tests-category'].'</h2><ol>';
        foreach($case_groups as $group_key=>$group){
            $case_groups_nav .= '<li><a href="#'.$group["group-id"].'">';
            if($lang=='en'){
                $case_groups_nav .= $group['group-name-en'];
            }
            else{
                $case_groups_nav .= $group['group-name'];
            }

            $case_groups_nav .= '</a></li>';
        }
        $case_groups_nav .= '</ol></div>';

        // Строим список тестов
        foreach($case_groups as $group_key => $group){
            $tests_list .= '<h3 id="'.$group["group-id"].'">'.($group_key+1).'. ';
            if($lang=='en'){
                $tests_list .= $group['group-name-en'];
            }
            else{
                $tests_list .= $group['group-name'];
            }
            $tests_list .= '</h3>';

            foreach($group['cases'] as $case){
                $result = $c->csscomb($case['code'], false, $case['order']);

                if($result===$case['result']){
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
                            <span><i class="toggle">+</i> ';

                if($lang=='en'){
                    $tests_list .= $case['descr-en'];
                }
                else{
                    $tests_list .= $case['descr'];
                }

                $tests_list .= '</span>
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
                        <th><?=$loc['all-tests']?>:</th>
                        <td class="count"><span><?=$test_count?></span></td>
                        <td></td>
                    </tr>
                </tfoot>
                <tr>
                    <th><?=$loc['errors']?>:</th>
                    <td class="count"><span class="error"><?=$errors?></span></td>
                    <td class="comment"><?=$loc['errors-desc']?></td>
                </tr>
                <tr>
                    <th><?=$loc['warnings']?>:</th>
                    <td class="count"><span class="warning"><?=$warnings?></span></td>
                    <td class="comment"><?=$loc['warnings-desc']?></td>
                </tr>
                <tr>
                    <th><?=$loc['success']?>:</th>
                    <td class="count"><span class="success"><?=($test_count - $warnings - $errors)?></span></td>
                    <td class="comment"><?=$loc['success-desc']?></td>
                </tr>
            </table>
        </div>

        <?=$case_groups_nav?>

        <div class="filter-for-tests">
            <h4><?=$loc['filter-by-result']?></h4>
            <ul>
                <li><span id="show-all-tests"><?=$loc['all']?></span></li>
                <li><span id="show-errors-and-warnings"><?=$loc['errors-and-warnings']?></span></li>
                <li><span id="show-errors-only"><?=$loc['errors-only']?></span></li>
                <li><span id="show-warnings-only"><?=$loc['warnings-only']?></span></li>
                <li><span id="show-success-only"><?=$loc['success-only']?></span></li>
            </ul>
        </div>
        <div class="clear"></div>

        <div class="test-list">
            <h2><?=$loc['tests']?></h2>
            <?=$tests_list?>
            <div class="clear"></div>
        </div>
        <script type="text/javascript" src="../static/highlight/highlight.pack.js"></script>
        <script type="text/javascript" src="../static/js/tests.js"></script>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
<?require_once'../common/footer.php'?>