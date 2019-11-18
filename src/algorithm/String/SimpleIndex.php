<?php


namespace MyAlgorithm\String;

/**
 * 简单算法
 * Class SimpleIndex
 * @package MyAlgorithm\String
 */
class SimpleIndex extends MyIndex
{
    public function __construct($main_str)
    {
        parent::__construct($main_str);
    }
    
    /**
     * 朴素算法（简单算法）
     * 时间复杂度为strlen(main_str)*strlen(search_str)
     * @param $search_str
     * @param int $position
     * @return bool|int
     */
    public function index($search_str,$position=0)
    {
        $i=$position;
        $j=0;
        $index=false;
        while($i<strlen($this->main_str) && $j<strlen($search_str)){
            if ($this->main_str[$i]==$search_str[$j]){
                $i++;
                $j++;
            }else{
                $i=$i-$j+1;
                $j=0;
            }
        }
        
        if ($j>=strlen($search_str)){
            $index=$i-strlen($search_str);
        }
        return $index;
    }
}