<?php

spl_autoload_register(function ($className) {
    $filename = "classes/$className.class.php";
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
});

spl_autoload_register(function ($className) {
    $filename = "classes/accounts/$className.class.php";
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
});

spl_autoload_register(function ($className) {
    $filename = "classes/sessions/$className.class.php";
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
});

spl_autoload_register(function ($className) {
    $filename = "includes/$className.inc.php";
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
});
