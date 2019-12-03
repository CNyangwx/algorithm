<?php


namespace MyAlgorithm\BiTree;


class TreeNode
{
    public $val='';
    public $left=NULL;
    public $right=NULL;
    
    public function __construct($val)
    {
        $this->val=$val;
    }
}