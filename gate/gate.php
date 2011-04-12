<?php
require_once'../lib/csscomb.php';

if($_POST['code'] and $_POST['code'] != ''){

    $c = new csscomb();

    if($_POST['order'] and $_POST['order'] != ''){
        $order = stripslashes($_POST['order']);
        echo $c->csscomb($_POST['code'], false, $order);
    }
    else{
        echo $c->csscomb($_POST['code'], false);
    }


}

if($_POST['get_order'] and $_POST['get_order'] != ''){
    $c = new csscomb();
    echo $c->get_sort_order($_POST['get_order']);
}