<?php

use MyAlgorithm\String\MyContext;
use MyAlgorithm\String\KMP;
use MyAlgorithm\String\SimpleIndex;
use PHPUnit\Framework\TestCase;

class MyStringContextTest extends TestCase
{
    
    public function testIndex()
    {
        $my_content=new MyContext(new KMP('dabcab'));
        $index=$my_content->index('vb');
        $this->assertEquals(3,$index);
    }
}
