#!/usr/bin/php
<?php
/**
 * CSScomb
 * @version: 2.11 (build 4d71dea-1210271349)
 * @author: Vyacheslav Oliyanchuk (miripiruni)
 * @web: http://csscomb.com/
 */
require_once(getenv('TM_BUNDLE_SUPPORT').'/csscomb.php');
$input = file_get_contents('php://stdin');
$c = new csscomb();
echo $c->csscomb($input);?>
