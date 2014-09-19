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

    public function view ($id)
    {
        $vars['theme'] = $this->model->getById($id);
        if (empty($vars['theme'])) {
            return 'Не найдено записи с id = ' . $id;
        }

        //Преобразуем кавычки и спец. символы в html-сущности
        array_walk_recursive($vars, function(&$var) {
            $var = htmlspecialchars($var);
        });

        $this->view->setTemplate('detail.php');
        //$vars_escaped = array_map('htmlspecialchars', $vars);
        return $this->view->parse($vars);
    }
}