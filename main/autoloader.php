<?php

function __autoload($class_name) {
    global $installedApps;
    global $SITE_ROOT;

    foreach ($installedApps as $appName) {
        include_once $SITE_ROOT . '/apps/' . $appName . '/' . ucfirst($appName) . 'Model.php';
        include_once $SITE_ROOT . '/apps/' . $appName . '/' . ucfirst($appName) . 'Controller.php';
        include_once $SITE_ROOT . '/apps/' . $appName . '/' . ucfirst($appName) . 'View.php';
    }
}
