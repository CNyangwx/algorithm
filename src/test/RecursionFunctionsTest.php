<?php


use MyAlgorithm\Stack\recursion\NoRecursionFunctions;
use MyAlgorithm\Stack\recursion\RecursionFuctions;
use PHPUnit\Framework\TestCase;


class RecursionFunctionsTest extends TestCase
{
    private $solve ;
    
    protected function setUp()
    {
//        $this->solve = new RecursionFuctions();
        $this->solve = new NoRecursionFunctions();
    }
    
    public function testDitui()
    {
        $this->expectOutputString('3,2,1,');
        $this->solve->ditui(3);
    }
    
    public function testSummation()
    {
        $this->assertEquals(6,$this->solve->Summation(3));
    }
}
