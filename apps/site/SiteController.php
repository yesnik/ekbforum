<?php
namespace apps\site;

use main\Controller;

class SiteController extends Controller
{
    public function __construct ()
    {
        parent::__construct(__CLASS__);
    }

    public function main ($vars)
    {
        //Присваиваем $vars переменные, которые хотим использовать в шаблоне
        $vars['title'] = 'Главная страница';

        $html = $this->view->parse($vars);
        return $html;
    }
}
