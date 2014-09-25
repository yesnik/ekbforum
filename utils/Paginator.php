<?php

namespace utils;

class Paginator {
    protected $currentPage;
    public function __construct()
    {
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }
}