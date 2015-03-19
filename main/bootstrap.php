<?php

require './config/config.php';
require './config/installedApps.php';
require 'debug.php';
require 'autoloader.php';

require './utils/templateHelpers.php';

require './apps/comment/utils/CommentPaginator.php';
require './apps/theme/utils/ThemePaginator.php';

require 'routes.php';
require 'database.php';

global $db;
$db = Database::getConnection();