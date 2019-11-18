<?php

namespace MyAlgorithm\Queue\test;

use MyAlgorithm\Queue\MyCircularQueue;
use PHPUnit\Framework\TestCase;

class MyCircularQueueTest extends TestCase
{
    private $queue;
    protected function setUp()
    {
       $this->queue=new MyCircularQueue(3);
    }
    
    public function testBasic()
    {
        $this->queue->enQueue(1);
        $this->queue->enQueue(2);
        $this->queue->enQueue(3);
        $this->assertFalse($this->queue->enQueue(4));
        
//        $this->assertEquals(3,$this->queue->Rear());
        $this->queue->deQueue();
        $this->queue->enQueue(4);
        $this->queue->Rear();
    
    
    }
    
}
