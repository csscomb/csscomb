<?php


/* Обертка для вызова CSScomb из WebStorm/IntelliJ IDEA */
$csscomb  = new csscomb();

if (is_dir($argv[1]))
    foreach (glob("{$argv[1]}/*.css") as $path)
        $cssfiles[] = $path;

foreach (isset($cssfiles) ? $cssfiles : array($argv[1]) as $path)
    file_put_contents($path, $csscomb->csscomb(
            file_get_contents($path), false, 'yandex')
    );
