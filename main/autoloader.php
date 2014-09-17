<?php

function __autoload($class_name) {
    global $installedApps;

    foreach ($installedApps as $appName) {
        include 'apps/' . $appName . '/' . $appName . 'Model.php';
        include 'apps/' . $appName . '/' . $appName . 'Controller.php';
    }
}


