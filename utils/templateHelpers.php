<?php

function url($entityName = 'site', $action = 'index', $id = '') {
    $url = '/' . $entityName . '/' . $action;
    if ($id) {
        $url .= '/' . $id;
    }
    return $url;
}