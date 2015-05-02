<?php

$lave_autoload = __DIR__.DIRECTORY_SEPARATOR.'../Lave/Form/Autoload.php';
if (file_exists($lave_autoload)) {
    include_once $lave_autoload;
}

$composer_autoload = __DIR__.DIRECTORY_SEPARATOR.'../vendor/autoload.php';
if (file_exists($composer_autoload)) {
    include_once $composer_autoload;
}