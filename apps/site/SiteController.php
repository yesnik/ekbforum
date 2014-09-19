<?php
namespace apps\site;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class SiteController extends Controller
{
    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

}