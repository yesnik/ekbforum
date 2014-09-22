<?php
namespace apps\user;

use main\Model;
use \PDO;

class UserModel extends Model {
    protected $table;
    public function __construct () {
        parent::__construct(__CLASS__);
    }

    public function getAll ()
    {
        global $db;

    }
}