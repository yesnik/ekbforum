<?php

require 'autoloader.php';
require 'Controller.php';
require 'Model.php';
require './utils/Utils.php';
require './config/installedApps.php';
require 'routes.php';
require 'database.php';

global $db;
$db = Database::getConnection();