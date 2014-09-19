<?php

namespace apps\car;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class CarController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ()
    {
        $vars['title'] = 'Список автомобилей';
        $vars['cars'] = $this->model->getAll();
        return $this->view->parse($vars);
    }
}