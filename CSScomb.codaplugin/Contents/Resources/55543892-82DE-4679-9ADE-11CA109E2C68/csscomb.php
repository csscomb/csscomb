#!/usr/bin/php
<?php
/**
 * Project homepage: http://csscomb.ru
 */
require_once($_ENV['TM_BUNDLE_SUPPORT'].'/csscomb.php');
$input = file_get_contents('php://stdin');
$csscomb = new CSScomb();
echo $csscomb->do_resort($input);
?>