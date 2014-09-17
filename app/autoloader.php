<?php

function __autoload($class_name) {
    global $installedApps;

    foreach ($installedApps as $appName) {
        include 'app/' . $appName . '/' . $appName . 'Model.php';
        include 'app/' . $appName . '/' . $appName . 'Controller.php';
    }
    /*
    if (stripos($class_name, 'model') !== false) {
        include 'app/models/' . $class_name . '.php';
    }
    if (stripos($class_name, 'controller') !== false) {
        require_once 'app/controllers/' . $class_name . '.php';
    }
    */
}


