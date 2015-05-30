<?php

namespace apps\theme;

use main\Controller;
use apps\user\UserController;
use apps\theme\ThemeModel;
use apps\theme\utils\ThemePaginator;
use apps\comment\CommentModel;
use apps\comment\utils\CommentPaginator;
use utils\Utils;
use utils\FlashMessage;


class ThemeController extends Controller
{
    protected $model;

    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function index ($vars = array())
    {
        global $vars;
        $vars['title'] = 'Список тем';
        $commentModel = new ThemeModel();
        $paginator = new ThemePaginator($commentModel);
        $vars['page_current'] = $paginator->getCurrentPage();
        $vars['pagination_pages_urls'] = $paginator->getPagesUrls();
        $vars['themes'] = $paginator->getPageItems();
        //Преобразуем кавычки и спец. символы в html-сущности
        array_walk_recursive($vars['themes'], function(&$var) {
            $var = htmlspecialchars($var);
        });
        //Отключаем нотайсы, чтобы не выводились ошибки в шаблоне о неопределенной переменной
        error_reporting(E_ALL & ~E_NOTICE);
        return $this->view->parse($vars);
    }

    public function view ($id, $vars = array())
    {
        global $vars;
        $vars['theme'] = $this->model->getById($id);
        if (empty($vars['theme'])) {
            return 'Не найдено записи с id = ' . $id;
        }
        $commentModel = new CommentModel();
        $paginator = new CommentPaginator($commentModel, $id);
        $vars['page_current'] = $paginator->getCurrentPage();
        $vars['comments'] = $paginator->getPageItems($id);
        $vars['pagination_pages_urls'] = $paginator->getPagesUrls($id);

        //Преобразуем кавычки и спец. символы в html-сущности
        array_walk_recursive($vars['theme'], function(&$var) {
            $var = htmlspecialchars($var);
        });
        array_walk_recursive($vars['comments'], function(&$var) {
            $var = htmlspecialchars($var);
        });
        $vars['theme']['content'] = nl2br($vars['theme']['content']);
        $vars['title'] = $vars['theme']['title'];
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