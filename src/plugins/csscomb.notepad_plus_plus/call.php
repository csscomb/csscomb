<?php

/* Обертка для вызова CSScomb */
$csscomb = new csscomb();
$sort_type = is_file($argv[2]) ? file_get_contents($argv[2]) : $argv[2];
$input = $csscomb->csscomb(file_get_contents($argv[1]), false, $sort_type);
file_put_contents($argv[1], $input);
