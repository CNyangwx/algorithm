<?php


namespace MyAlgorithm\Arrays;
use MyAlgorithm\Arrays\Node;
use mysql_xdevapi\Exception;

/**
 * 稀疏矩阵
 * Class SequenceArrayADT
 * @package MyAlgorithm\Arrays
 */
class SequenceArrayADT
{
    /**
     * @var Node
     */
    private $node;
    /**
     * @var []
     */
    private $data=[];
    /**
     * @var [][] 每个元素插入的位置
     */
    private $row_line_num=0,$col_line_num=0,$element_total_num=0;
    
    private $num=[];
    private $cpots=[];
    
    //将数组转为三元矩阵
    public function __construct($array=null)
    {
        if (!is_array($array) || !isset($array[0][0])) {
            return;
        }
        $k=0;
        $max=0;
        for ($i=0;$i<count($array);$i++){
            for ($j=0;$j<count($array[$i]);$j++){
                if (!empty($array[$i][$j])){
                    $this->data[$k++]=new Node($i,$j,$array[$i][$j]);
                    $this->element_total_num++;
                }
            }
            if ($max<count($array[$i])){
                $max=count($array[$i]);
            }
        }
        $this->row_line_num=count($array);
        $this->col_line_num=$max;
    }
    
    public function printM()
    {
        /**
         *   0 1 2
         * 0 0 1 1
         * 1 1 0 1
         */
    
        /**
         * 0 0 1 1
         * 1 0 2 1
         * 2 1 0 1
         * 3 1 2 1
         */
        
        foreach ($this->data as $key=>$data_val){
            echo $key.':('.$data_val->getXCoordinate().','.$data_val->getYCoordinate().
                ')->'.$data_val->getValue().PHP_EOL;
        }
        
    }
    
    /**
     * 稀疏矩阵转置
     */
    public function transpose(){
        if ($this->element_total_num==0){
            return false;
        }
        $new_smartrix=new self();
        $new_smartrix->row_line_num=$this->col_line_num;
        $new_smartrix->col_line_num=$this->row_line_num;
        $new_smartrix->element_total_num=$this->element_total_num;
        $cpots=$this->getCpots();
        $i=0;
        /**
         * [[0,1,1],[1,0,1]]
         *
         * 0 1 1
         * 1 0 1
         *
         * 0 1
         * 1 0
         * 1 1
         */
        
        
        foreach ($this->data as $data_element){
            $position=$cpots[$data_element->getYCoordinate()];
            $new_smartrix->data[$position]=new Node($data_element->getYCoordinate(),
                $data_element->getXCoordinate(),
                $data_element->getValue()
            );
            $cpots[$data_element->getYCoordinate()]++;
        }
        sort($new_smartrix->data);
        return $new_smartrix;
    }
    
    /**
     * 表示第i列中col元素的个数
     * @return mixed
     */
    public function getNum()
    {
        if ($this->element_total_num!=0){
            for ($i=0;$i<$this->col_line_num;$i++){
                $this->num[$i]=0;
            }
            foreach ($this->data as $data_value){
                ++$this->num[$data_value->getYCoordinate()];
            }
        }
        
        return $this->num;
    }
    
    /**
     * @return mixed
     */
    public function getCpots()
    {
        $nums=$this->getNum();
        
        if ($this->element_total_num!=0 && !empty($nums) ){
            $this->cpots[0]=0;
            for($i=1;$i<$this->col_line_num;$i++){
                $this->cpots[$i]=$this->cpots[$i-1]+$nums[$i-1];
            }
        }
        
        return $this->cpots;
    }
    
    
    
    
    
}