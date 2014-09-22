<?php

namespace apps\user;

use \PDO;
use apps\car\CarModel;
use apps\comment\CommentModel;
use main\Controller;
use utils\Utils;

class UserController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ()
    {
        /*
        $vars['title'] = 'Список тем';
        $vars['themes'] = $this->model->getAll();
        return $this->view->parse($vars);
        */
    }

    public function view ($id, $vars = array())
    {
        /*
        $vars['theme'] = $this->model->getById($id);
        if (empty($vars['theme'])) {
            return 'Не найдено записи с id = ' . $id;
        }
        $commentModel = new CommentModel();
        $comments = $commentModel->getForTheme($id);
        $vars['comments'] = $comments;

        //Преобразуем кавычки и спец. символы в html-сущности
        array_walk_recursive($vars['theme'], function(&$var) {
            $var = htmlspecialchars($var);
        });
        array_walk_recursive($vars['comments'], function(&$var) {
            $var = htmlspecialchars($var);
        });
        error_reporting(E_ALL & ~E_NOTICE);
        $this->view->setTemplate('detail.php');
        return $this->view->parse($vars);
        */
    }

    public function create ()
    {

    }
}