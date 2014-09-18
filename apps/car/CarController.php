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
        global $SITE_ROOT;
        //$rows = $this->model->getAll();
        $templateVars = $this->model->getById(2);
        $templateVars['title'] = 'Заголовок страницы';
        //var_dump($row);
        $template = $SITE_ROOT . 'templates/base.html.php';
        $raw_html = file_get_contents($template);

        foreach($templateVars as $key => $value) {
            $raw_html = preg_replace('/{{\s*'.$key.'\s*}}/', $value, $raw_html);
        }
        echo $raw_html;
    }
}