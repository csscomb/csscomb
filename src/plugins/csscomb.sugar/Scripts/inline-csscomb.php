#!/usr/bin/env php
<?php
/**
 * CSScomb 2.11 (build 3ded73c-1208080145)
 * http://CSScomb.com
 * http://twitter.com/CSScomb
 */
require($_ENV['EDITOR_SUGAR_PATH'] . '/ScriptLibraries/csscomb.php'); 
$input = file_get_contents('php://stdin');
$c = new csscomb();
echo $c->csscomb($input);
?>
