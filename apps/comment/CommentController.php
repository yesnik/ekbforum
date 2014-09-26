<?php

namespace apps\comment;

use main\Controller;
use apps\theme\ThemeController;
use apps\user\UserController;
use utils\FlashMessage;
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

    public function create ()
    {
        //Проверяем переданные пользователем параметры. При ошибке выводим сообщение.
        $flashMessage = new FlashMessage();
        $vars = array();
        if (empty($_POST['theme_id'])) {
            $flashMessage->addError('Не указан параметр theme_id');
        }

        $name = trim($_POST['name']);
        if (empty($name)) {
            $flashMessage->addError('Укажите имя');
        } else {
            if (!preg_match("/^[\p{Cyrillic}\sa-z\-]+$/ui", $name)) {
                $flashMessage->addError('Имя может содержать только буквы и символы пробел, "_" и "-"');
            } else {
                $vars['form']['name'] = $name;
            }
        }

        $comment = trim($_POST['comment']);
        if (empty($comment)) {
            $flashMessage->addError('Укажите комментарий');
        } else {
            $vars['form']['comment'] = $comment;
        }

        if( $flashMessage->exists() ) {
            $vars['flashMessageHtml'] = $flashMessage->getHtml();
            $themeController = new ThemeController();
            return $themeController->view($_POST['theme_id'], $vars);
        }

        $userController = new UserController();
        $rsUser = $userController->getOrCreate($name);

        $vars = array(
            'theme_id' => $_POST['theme_id'],
            'comment' => $comment,
            'user_id' => $rsUser['id']
        );

        $commentId = $this->model->create($vars);
        if ($commentId) {
            $this->model->increaseCommentCounter($_POST['theme_id']);
            $uri = '/theme/view/' . $_POST['theme_id'];
            Utils::redirect($uri);
        }
        return false;
    }
}