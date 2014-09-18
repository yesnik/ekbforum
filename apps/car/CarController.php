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
    }

    public function index ()
    {
        global $db;

        $stmt = $db->query("SELECT * FROM cars");

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            var_dump($row);
        }
    }
}