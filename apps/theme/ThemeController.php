<?php

namespace apps\theme;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class ThemeController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ()
    {
        $vars['title'] = 'Список тем';
        $vars['themes'] = $this->model->getAll();
        return $this->view->parse($vars);
    }
}