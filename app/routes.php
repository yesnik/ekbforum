<?php

//В зависимости от uri происходит определение контроллера и экшена

$uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '';
if ($uri) {
    $uriArr = explode('/', $uri);
    if (sizeof($uriArr) > 1) {
        $controller = $uriArr[0];
        $action = $uriArr[1];
    } else {
        $controller = $uriArr[0];
        $action = 'index';
    }
} else {
    $controller = 'index';
    $action = 'index';
}