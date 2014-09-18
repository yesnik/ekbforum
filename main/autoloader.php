<?php

function __autoload($class_name) {
    global $installedApps;

    foreach ($installedApps as $appName) {
        $modelClassName = $appName . 'Model';
        include_once 'apps/' . $appName . '/' . $modelClassName . '.php';
        $controllerClassName = $appName . 'Controller';
        include_once 'apps/' . $appName . '/' . $appName . 'Controller.php';
    }
}


