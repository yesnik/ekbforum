<?php

require 'autoloader.php';
require 'Controller.php';
require 'Model.php';
require './config/installedApps.php';
require 'routes.php';
require 'database.php';

global $db;
$db = Database::getConnection();