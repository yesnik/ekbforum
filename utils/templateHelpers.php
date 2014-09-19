<?php

function url($entityName = 'site', $action = 'index', $id = '') {
    $url = '/' . $entityName . '/' . $action;
    if ($id) {
        $url .= '/' . $id;
    }
    return $url;
}

function loadTemplate ($appName, $templateName) {
    global $SITE_ROOT;
    require $SITE_ROOT . '/apps/' . $appName . '/templates/' . $templateName;
}