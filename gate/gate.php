<?php
if($_POST['code'] and $_POST['code'] != ''){

    require_once'../lib/csscomb.php';

    $c = new csscomb();

    if($_POST['order'] and $_POST['order'] != ''){
        $order = stripslashes($_POST['order']);
        echo $c->csscomb($_POST['code'], false, $order);
    }
    else{
        echo $c->csscomb($_POST['code'], false);
    }


}
else{
    echo 'Error 1';
}