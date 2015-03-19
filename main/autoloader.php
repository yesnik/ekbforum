<?php

//Пути для автозагрузки системные
$includePaths = array(
  'utils'
);
foreach ($includePaths as $path) {
  set_include_path(get_include_path(). PATH_SEPARATOR . $path);
}

//Пути для автозагрузки на основе установленных приложений
foreach ($installedApps as $appName) {
  //Путь к папке приложения
  $includeAppPath = $SITE_ROOT . DIRECTORY_SEPARATOR . 'apps' . 
    DIRECTORY_SEPARATOR . $appName;
  //Путь к utlis приложения
  $includeAppUtilsPath = $includeAppPath . DIRECTORY_SEPARATOR . 'utils';

  set_include_path(
    get_include_path(). PATH_SEPARATOR . $includeAppPath .
    PATH_SEPARATOR . $includeAppUtilsPath
  ); 
}

spl_autoload_register(function($class){
  $fileName = ucfirst( end( (explode('\\', $class)) ));
  require_once $fileName . '.php';
});
