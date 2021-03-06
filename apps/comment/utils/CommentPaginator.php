<?php

namespace apps\comment\utils;

use \PDO;
use utils\Paginator;

class CommentPaginator extends Paginator {
    private $model;
    private $itemsPerPage = 10;
    private $itemsAmount;
    private $page;
    public function __construct ($model, $themeId)
    {
        parent::__construct();
        $this->model = $model;
        $this->itemsAmount = (int)$this->getItemsTotal($themeId);
    }

    public function getPagesUrls($id)
    {
        $pagesNum = (int)ceil($this->itemsAmount / $this->itemsPerPage);
        $arUrls = array();
        for($i = 1; $i <= $pagesNum; $i++) {
            $arUrls[] = '/theme/view/' . $id . '/?page=' . $i;
        }
        return $arUrls;
    }

    public function getPageItems($themeId)
    {
        $params = array(
            'page' => $this->currentPage,
            'itemsAmount' => $this->itemsAmount,
            'themeId' => $themeId,
            'commentsPerPage' => $this->itemsPerPage
        );
        return $this->model->getForTheme($params);
    }

    protected function getItemsTotal($themeId)
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

    public function getItemsAmount()
    {
        return $this->itemsAmount;
    }

}