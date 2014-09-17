<?php

function __autoload($class_name) {
    if (stripos($class_name, 'model') !== false) {
        require_once 'app/models/' . $class_name . '.php';
    }
    if (stripos($class_name, 'controller') !== false) {
        require_once 'app/controllers/' . $class_name . '.php';
    }
}
