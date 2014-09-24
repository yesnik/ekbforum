<?php
namespace apps\site;

use \PDO;
use apps\car\CarModel;
use main\Controller;
use utils\Utils;

class SiteController extends Controller
{
    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function main ($vars)
    {
        $vars['title'] = 'Главная страница';
        $vars['coder'] = 'Johny';
        //$vars['content'] = $content;
        $html = $this->view->parse($vars);
        return $html;
    }
}