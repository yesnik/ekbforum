<?php

namespace apps\comment;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class CommentController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ()
    {
        $vars['title'] = 'Список комментариев';
        $vars['comments'] = $this->model->getAll();
        return $this->view->parse($vars);
    }

    public function view ($id)
    {
        $res = $this->model->getById($id);
        if (empty($res)) {
            return 'Не найдено записи с id = ' . $id;
        }
        $vars['comment'] = $res;
        //Преобразуем кавычки и спец. символы в html-сущности
        array_walk_recursive($vars, function(&$var) {
            $var = htmlspecialchars($var);
        });

        $this->view->setTemplate('detail.php');
        //$vars_escaped = array_map('htmlspecialchars', $vars);
        return $this->view->parse($vars);
    }
}