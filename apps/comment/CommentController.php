<?php

namespace apps\comment;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;
use utils\FlashMessage;
use apps\theme\ThemeController;


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

    public function create ()
    {
        $flashMessage = new FlashMessage();
        $vars = array();
        if (empty($_POST['theme_id'])) {
            $flashMessage->addError('Не указан параметр theme_id');
        }

        if (empty($_POST['name'])) {
            $flashMessage->addError('Укажите имя');
        } else {
            $vars['formAddComment']['name'] = $_POST['name'];
        }

        if (empty($_POST['comment'])) {
            $flashMessage->addError('Укажите комментарий');
        } else {
            $vars['formAddComment']['comment'] = $_POST['comment'];
        }

        if( $flashMessage->exists() ) {
            $vars['flashMessageHtml'] = $flashMessage->getHtml();
            $themeController = new ThemeController();
            return $themeController->view($_POST['theme_id'], $vars);
        }


        //$this->model->create($vars);

        return '123132';
    }
}