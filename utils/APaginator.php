<?php

namespace utils;

abstract class APaginator {
    abstract function getPagesUrls($id);
    abstract protected function getItemsTotal($themeId);
}