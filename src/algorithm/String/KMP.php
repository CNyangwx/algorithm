<?php


namespace MyAlgorithm\String;

/**
 * KMP 算法是解决字符串匹配问题的解法
 * 其变体题目为：求字符串的最长子串
 * Class KMP
 * @package MyAlgorithm\String
 */
class KMP extends MyIndex
{
    public function __construct($main_str)
    {
        parent::__construct(' '.$main_str);
    }
    
    /**
     * KMP实在简单算法中进行优化，引入next数组记录j的变化值，以减少i值的回溯
     * @param $search_str  要查找的字符串
     * @param int $position 从第几个位置遍历
     * @return bool|int
     */
    public function index($search_str,$position=0)
    {
        //将下标从0变为1
        $search_str=' '.$search_str;
        $i=$position;
        $j=1;
        $index=false;
        $next=$this->get_next($search_str);
        
        while( $i<strlen($this->main_str) && $j<strlen($search_str)){
            $i_str=$this->main_str[$i];
            $j_str=$search_str[$j];
    
            if ($j==0 || $i_str==$j_str){
                $i++;
                $j++;
            }else{
                $j=$next[$j];
            }
        }
        
        if ($j>=strlen($search_str)){
            $index=$i-strlen($search_str);
        }
        return $index;
    }
    
    private function get_next(string $str)
    {
        //初始值为0
        $next=[1=>0];
        $k=0;
        $j=1;
        while ($j<strlen($str)){
            if ($k==0 || $str[$j]==$str[$k]){
                $next[++$j]=++$k;
            }else{
                $k=$next[$k];
            }
        }
        
        return $next;
    }
}