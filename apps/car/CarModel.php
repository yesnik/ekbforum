<?php
namespace apps\car;

use main\Model;

class CarModel extends Model {
    public function __construct () {
        $params = array(
            'table' => 'cars',
        );
        parent::__construct($params);
    }
}