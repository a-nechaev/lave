<?php

spl_autoload_register(function ($class) {
    if (strpos($class, 'Lave') === false) {
        return;
    }

    $dir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;

    $file_name = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file = $dir.$file_name.'.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
