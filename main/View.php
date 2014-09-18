<?php

namespace main;

class View
{
    protected $templateHtml;
    protected $templatePath;

    public function __construct ($entityName)
    {
        global $SITE_ROOT;
        $this->templatePath = $SITE_ROOT . 'apps/' . $entityName . '/templates/template.php';
    }

    public function parse ($vars)
    {
        ob_start();
        require $this->templatePath;
        return ob_get_clean();
    }

}