<?php

namespace apps\theme;

use \PDO;
use apps\car\CarModel;
use apps\comment\CommentModel;
use apps\comment\utils\CommentPaginator;
use main\Controller;
use utils\Utils;
use utils\FlashMessage;
use apps\user\UserController;

class ThemeController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ($vars = array())
    {
        $vars['title'] = 'Список тем';
        //$vars['themes'] = $this->model->getAll();
        $vars['themes'] = $this->model->getAll();
        //Отключаем нотайсы, чтобы не выводились ошибки в шаблоне о неопределенной переменной
        error_reporting(E_ALL & ~E_NOTICE);
        return $this->view->parse($vars);
    }

    public function view ($id, $vars = array())
    {
        $vars['theme'] = $this->model->getById($id);
        if (empty($vars['theme'])) {
            return 'Не найдено записи с id = ' . $id;
        }
        $commentModel = new CommentModel();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $vars['page_current'] = $page;
        $comments = $commentModel->getForTheme($id, $page);
        $vars['comments'] = $comments;

        $params = array(
            'themeId' => $id,
            'page' => $page
        );
        $paginator = new CommentPaginator($commentModel, $params);
        $vars['pages'] = $paginator->getPagesUrls($id);

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
    }

    public function create ()
    {
        //Проверяем переданные пользователем параметры. При ошибке выводим сообщение.
        $flashMessage = new FlashMessage();
        $vars = array();
        if (empty($_POST['name'])) {
            $flashMessage->addError('Укажите имя');
        } else {
            $vars['form']['name'] = $_POST['name'];
        }

        if (empty($_POST['content'])) {
            $flashMessage->addError('Укажите содержание темы');
        } else {
            $vars['form']['content'] = $_POST['content'];
        }

        if (empty($_POST['title'])) {
            $flashMessage->addError('Укажите заголовок темы');
        } else {
            $vars['form']['title'] = $_POST['title'];
        }

        if( $flashMessage->exists() ) {
            $vars['flashMessageHtml'] = $flashMessage->getHtml();
            $themeController = new ThemeController();
            return $themeController->index($vars);
        }

        $userController = new UserController();
        $rsUser = $userController->getOrCreate($_POST['name']);

        //Создаем сообщение
        $vars = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $rsUser['id']
        );

        $themeId = $this->model->create($vars);
        if ($themeId) {
            $uri = '/theme/view/' . $themeId;
            Utils::redirect($uri);
        }
        return FALSE;
    }
}