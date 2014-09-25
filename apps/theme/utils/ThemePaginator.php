<?php

namespace apps\theme\utils;

use \PDO;
use utils\Paginator;

class ThemePaginator extends Paginator {
    private $model;
    private $itemsPerPage = 3;
    private $itemsTotal;
    private $page;
    public function __construct ($model, $vars = array())
    {
        $this->model = $model;
        $this->itemsTotal = (int)$this->getItemsTotal();
    }

    public function getPagesUrls($id = 0)
    {
        $pagesNum = (int)ceil($this->itemsTotal / $this->itemsPerPage);
        $arUrls = array();
        for($i = 1; $i <= $pagesNum; $i++) {
            $arUrls[] = '/?page=' . $i;
        }
        return $arUrls;
    }

    protected function getItemsTotal($themeId = 1)
    {
        global $db;
        //Общее число записей
        $query = 'SELECT count(*) as items_total FROM ' . $this->model->table . ' WHERE theme_id = :theme_id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':theme_id', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['items_total'];
    }

}