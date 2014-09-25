<?php
namespace main;

use utils\Utils;

class Controller
{
    protected $model;
    public $view;

    public function __construct ($className = '')
    {
        if (!$className) return false;
        $entityName = Utils::getEntityName($className);
        $model = "\\apps\\" . $entityName . "\\" . $entityName . "Model";
        $this->model = new $model();
        $view = "\\apps\\" . $entityName . "\\" . $entityName . "View";
        $this->view = new $view($entityName);
    }
}