<?php

//Корень сайта
global $SITE_ROOT;
$SITE_ROOT = $_SERVER['DOCUMENT_ROOT'];

//Подключение к базе данных
define('DB_HOST', 'localhost');
define('DB_NAME', 'forum');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
