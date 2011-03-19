<?php
if($_POST['code'] and $_POST['code'] != ''){

    require_once'../lib/csscomb.php';

    $c = new csscomb();

    echo $c->csscomb($_POST['code'], false);

}
else{
    echo 'Error 1';
}