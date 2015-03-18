<?php

require 'config/config.php';
require 'debug.php';
require 'autoloader.php';
require 'Controller.php';
require 'Model.php';
require 'View.php';
require './config/installedApps.php';

require './utils/Utils.php';
require './utils/templateHelpers.php';
require './utils/FlashMessage.php';
require './utils/Paginator.php';

require './apps/comment/utils/CommentPaginator.php';
require './apps/theme/utils/ThemePaginator.php';

require 'routes.php';
require 'database.php';

global $db;
$db = Database::getConnection();