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

    }

    public function view ($id, $vars = array())
    {

    }

    public function create ()
    {

    }

    public function getOrCreate($userName)
    {
        //$rsUser = $this->model->getUserByName($userName);
        $rsUserList = $this->model->getWhere('name', $userName);

        if ($rsUserList) {
            return $rsUserList[0];
        }

        //Создаем в БД нового пользователя
        $userId = $this->model->create($userName);
        if ($userId) {
            return $this->model->getById($userId);
        } else {
            trigger_error('Не удалось создать пользователя');
        }

    }
}