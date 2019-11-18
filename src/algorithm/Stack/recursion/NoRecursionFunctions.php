<?php


namespace MyAlgorithm\Stack\recursion;


class NoRecursionFunctions implements IRecursionFunctions
{
    public function ditui($n)
    {
        $i=$n;
        while ($i){
            echo $i--.",";
        }
    }
    
    public function Summation($n):int
    {
        $sum=0;
        do{
            echo '请输入一个整数进行运算:';
            $line = fread(STDIN, 1024);
            $input=intval($line);
            $sum+=$input;
        }while($input!=0);
        return $sum;
    }
}