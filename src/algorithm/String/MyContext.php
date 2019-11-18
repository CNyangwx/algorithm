<?php


namespace MyAlgorithm\String;

/**
 * 策略模式调度算法
 * Class MyContext
 * @package MyAlgorithm\String
 */
class MyContext
{
    /**
     * @var MyIndex
     */
    private $strategy;
    
    /**
     * MyContext constructor.
     * @param MyIndex $strategy
     */
    public function __construct(MyIndex $strategy)
    {
        $this->strategy=$strategy;
    }
    
    public function index($search_str,$position=0)
    {
        return $this->strategy->index($search_str,$position);
    }
}