<?php


namespace MyAlgorithm\Stack\recursion;


class RecursionFuctions implements IRecursionFunctions
{
    public function ditui($n)
    {
        if ($n==0){
            return $n;
        }
        echo "$n,";
        $this->ditui($n-1);
    }
    
    public function Summation($sum):int
    {
        echo '请输入一个整数进行运算:';
        $line = fread(STDIN,1024);
        $sum=intval($line);
        if ($sum==0){
            return 0;
        }else{
            $sum+=$this->Summation($sum);
        }
        return $sum;
    }
}