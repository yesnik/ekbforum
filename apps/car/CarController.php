<?php

namespace apps\car;

class CarController
{
    public function __construct ()
    {
        echo 'Это контроллер МАШИНЫ';
    }

    public function index ()
    {
        global $db;
        var_dump($db);
        return 'Это индексный контроллер';
    }
}