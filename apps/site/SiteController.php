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
        $vars['title'] = 'Главная страница';
        $vars['coder'] = 'Johny';
        //$vars['content'] = $content;
        $html = $this->view->parse($vars);
        return $html;
    }
}