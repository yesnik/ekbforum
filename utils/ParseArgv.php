<?php

namespace utils;

/**
 * Class ParseArgv
 * @package utils
 * This is a class for parsing script's params to associative array
 * Ex.:
 * bash:
 *      $ php some_script.php --a=11 -b=22 c=33
 * in your script:
 *      $args = (new ParseArgv())->params();
 *      var_dump($args);
 *  array(3) {
 *       ["a"]=>
 *       string(2) "11"
 *       ["b"]=>
 *       string(2) "22"
 *       ["c"]=>
 *       string(2) "33"
 *   }
 */
class ParseArgv {
    protected $currentPage;
    private $params = array();
    public function __construct()
    {
        global $argv;
        $argsNum = $this->argsNum();
        // We start with second element of $argv, because $argv[0] is script name
        $i = 1;
        while ($i <= $argsNum) {
            $this->parseParam($argv[$i]);
            $i++;
        }
    }

    public function argsNum()
    {
        global $argv;
        return sizeof($argv) - 1;
    }

    public function params()
    {
        return $this->params;
    }

    private function parseParam($str)
    {
        list($key, $value) = explode('=', $str);
        $this->params[$this->normalizeKey($key)] = $value;
    }

    private function normalizeKey($key)
    {
        return str_replace('-', '', $key);
    }
}
