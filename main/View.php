<?php

namespace main;

class View
{
    protected $templateHtml;
    protected $templatePath;
    protected $entityName;

    public function __construct ($entityName)
    {
        global $SITE_ROOT;
        $this->entityName = $entityName;
        //Шаблон по умолчанию
        $this->templatePath = $SITE_ROOT . 'apps/' . $entityName . '/templates/template.php';
    }

    /**
     * Преобразует шаблон в html с использованием переданных в массиве $vars переменных
     * @param $vars
     *
     * @return string
     */
    public function parse ($vars)
    {
        ob_start();
        require $this->templatePath;
        return ob_get_clean();
    }

    /**
     * Устанавливает шаблон, используемый при парсинге представления
     * @param $templateName
     */
    public function setTemplate($templateName) {
        global $SITE_ROOT;
        $this->templatePath = $SITE_ROOT . 'apps/' . $this->entityName . '/templates/' . $templateName;
    }

}