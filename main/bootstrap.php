<?php

require 'autoloader.php';
require 'Controller.php';
require 'Model.php';
require 'View.php';
require './utils/Utils.php';
require './utils/templateHelpers.php';
require './utils/FlashMessage.php';
require './config/installedApps.php';
require 'routes.php';
require 'database.php';

global $db;
$db = Database::getConnection();