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
        global $db;
        //$rows = $this->model->getAll();
        $row = $this->model->getById(2);
        var_dump($row);
    }
}