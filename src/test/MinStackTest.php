<?php

use PHPUnit\Framework\TestCase;
use Leecode\MinStack;

class MinStackTest extends TestCase
{
    private $min_stack;
    protected function setUp()
    {
        $this->min_stack=new MinStack();
    }

    /**
     * @test MinStack::getMin
     */
    public function testGetMin()
    {
        $this->min_stack->push(-2);
        $this->min_stack->push(-3);
        $this->assertEquals(-3,$this->min_stack->getMin());
    }

}
