<?php
namespace apps\site;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class SiteController extends Controller
{
    protected $model;
    protected $view;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ()
    {
        echo 'Hello This is Site Controller';
    }
}