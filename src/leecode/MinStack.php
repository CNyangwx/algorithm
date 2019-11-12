<?php


namespace Leecode;


class MinStack {
    private $data=[];
    private $top=0;
    private $min;
    /**
     * initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        if ($this->top==0){
            $this->min=$x;
        }else{
            $this->min=$this->min > $x? $x:$this->min;
        }
        $this->data[$this->top++]=$x;
    }

    /**
     * @return NULL
     */
    function pop() {
        if ($this->top==0){
            return NULL;
        }
        $e = $this->data[--$this->top];
        if ($e==$this->min){
            $this->min=$this->data[0];
            for ($i=1;$i<$this->top;$i++){
                $this->min=$this->min>$this->data[$i]?$this->data[$i]:$this->min;
            }
        }
        return $e;
    }

    /**
     * @return Integer
     */
    function top() {
        if ($this->top==0){
            return NULL;
        }
        return $this->data[$this->top-1];
    }

    /**
     * @return Integer
     */
    function getMin() {
       return $this->min;
    }
}