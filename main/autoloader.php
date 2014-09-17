<?php

function __autoload($class_name) {
    global $installedApps;

    foreach ($installedApps as $appName) {
        require 'apps/' . $appName . '/' . $appName . 'Model.php';
        require 'apps/' . $appName . '/' . $appName . 'Controller.php';
    }
}


