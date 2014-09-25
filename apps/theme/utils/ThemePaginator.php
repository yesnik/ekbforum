<?php

namespace apps\theme\utils;

use \PDO;
use utils\Paginator;

class ThemePaginator extends Paginator {
    private $model;
    private $itemsPerPage = 10;
    private $itemsAmount;
    private $page;
    public function __construct ($model, $vars = array())
    {
        parent::__construct();
        $this->model = $model;
        $this->itemsAmount = (int)$this->getItemsTotal();
    }

    public function getPagesUrls($id = 0)
    {
        $pagesNum = (int)ceil($this->itemsAmount / $this->itemsPerPage);
        $arUrls = array();
        for($i = 1; $i <= $pagesNum; $i++) {
            $arUrls[] = '/?page=' . $i;
        }
        return $arUrls;
    }

    public function getPageItems()
    {
        $params = array(
            'page' => $this->currentPage,
            'itemsAmount' => $this->itemsAmount,
            'commentsPerPage' => $this->itemsPerPage
        );
        return $this->model->getThemesPaginated($params);
    }

    protected function getItemsTotal($themeId = 1)
    {
        global $db;
        $query = 'SELECT count(*) as items_total FROM ' . $this->model->table;
        $stmt = $db->prepare($query);
        $stmt->bindParam(':theme_id', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['items_total'];
    }

}