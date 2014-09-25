<?php

namespace utils;

use \PDO;

class Paginator {
    private $model;
    private $pagesPerPage = 3;
    private $itemsTotal;
    private $page;
    public function __construct ($model, $vars = array())
    {
        $this->model = $model;
        $this->itemsTotal = (int)$this->getItemsTotal($vars['themeId']);
    }

    private function getItemsTotal($themeId)
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

    public function getPagesUrls($id)
    {
        $pagesNum = (int)ceil($this->itemsTotal / $this->pagesPerPage);
        $arUrls = array();
        for($i = 1; $i <= $pagesNum; $i++) {
            $arUrls[] = '/theme/view/' . $id . '/?page=' . $i;
        }
        return $arUrls;
    }
}