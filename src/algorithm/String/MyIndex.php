<?php


namespace MyAlgorithm\String;

/**
 * 求解匹配子串的首个位置
 * Class MyIndex
 * @package MyAlgorithm\String
 */
abstract class MyIndex
{
    protected $main_str;
    
    public function __construct($main_str)
    {
        $this->main_str=$main_str;
    }
    
    abstract function index($search_str,$position);
}