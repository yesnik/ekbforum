<?php

namespace apps\car;

use \PDO;
use apps\car\CarModel;
use main\Controller;

class CarController extends Controller
{
    public function __construct ()
    {
        echo 'Это контроллер МАШИНЫ';
        $this->model = new CarModel();
    }

    public function index ()
    {
        global $db;
        $rows = $this->model->getAll();
        var_dump($rows);
    }
}