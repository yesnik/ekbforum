<?php

//Корень сайта
global $SITE_ROOT;
$SITE_ROOT = dirname(__DIR__);

//Подключение к базе данных
define('DB_HOST', 'localhost');
define('DB_NAME', 'forum');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
