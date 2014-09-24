<?php
namespace utils;

class Utils
{
    /**
     * Получение имени сущности (модели или контроллера) на основании имени класса
     * @param $className
     * @return bool|string
     */
    public static function getEntityName ($className)
    {
        $wasFound = preg_match('/(\w+)(Model|Controller|View)/', $className, $matches);
        if ($wasFound) {
            return strtolower($matches[1]);
        }
        return false;
    }

    public static function redirect ($uri)
    {
        header('Location: ' . $uri);
        die();
    }

    public static function getScripts($controller, $action) {
        $uri = $controller . '/' . $action;
        $arScripts = array();
        switch ($uri) {
            case 'theme/view':
                $arScripts[] = '/apps/comment/js/comment.js';
                break;
        }
        return $arScripts;
    }
}