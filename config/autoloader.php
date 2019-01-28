<?php
/**
 * Created by IntelliJ IDEA.
 * User: micha
 * Date: 28.01.19
 * Time: 09:35
 */
spl_autoload_register(function ($class) {
    $fixSlashes = str_replace('\\', '/', $class);
    $file = "./".$fixSlashes.".php";

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo 'jest problem';
    }
});
