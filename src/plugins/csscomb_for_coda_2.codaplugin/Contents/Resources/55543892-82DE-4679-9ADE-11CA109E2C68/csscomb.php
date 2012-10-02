#!/usr/bin/php
<?php
/**
 * CSScomb
 * @version: 2.11 (build 3ded73c-1208080145)
 * @author: Vyacheslav Oliyanchuk (miripiruni)
 * @web: http://csscomb.com/
 */
require_once(getenv('TM_BUNDLE_SUPPORT').'/csscomb.php');
$input = file_get_contents('php://stdin');
$c = new csscomb();
echo $c->csscomb($input);?>
