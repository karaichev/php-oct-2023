<?php

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (!file_exists($file)) {
        return false;
    }

    require $file;
    return true;
});
