<?php

namespace MyAlgorithm\Arrays;

use PHPUnit\Framework\TestCase;

class SequenceArrayADTTest extends TestCase
{
    
    public function testTranspose()
    {
        /**
         * 0 1 1
         * 1 0 1
         */
        
        $arr=[[0,1,1],[1,0,1]];
        
        $seq=new SequenceArrayADT($arr);
        $output=<<<EOF
0:(0,1)->1
1:(0,2)->1
2:(1,0)->1
3:(1,2)->1

EOF;
//        $this->expectOutputString($output);
//        $seq->printM();
        
        $transpose = $seq->transpose();
        $transpose->printM();
        
    }
}
