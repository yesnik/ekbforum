<?php
spl_autoload_register(function($class){
  global $installedApps;
  global $SITE_ROOT;
  
  foreach ($installedApps as $appName) {
    $includePath = $SITE_ROOT . DIRECTORY_SEPARATOR . 'apps' . 
      DIRECTORY_SEPARATOR . $appName;
    set_include_path(get_include_path(). PATH_SEPARATOR . $includePath); 
  }
  $fileName = ucfirst( end( (explode('\\', $class)) ));

  require_once $fileName . '.php';
});
