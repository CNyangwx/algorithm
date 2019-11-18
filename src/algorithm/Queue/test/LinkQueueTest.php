<?php

use MyAlgorithm\Queue\LinkQueue;
use PHPUnit\Framework\TestCase;

class LinkQueueTest extends TestCase
{
    private $link_queue;

    protected function setUp()
    {
       $this->link_queue=new LinkQueue();
    }

    /**
     * 测试基本操作
     */
    public function testBasic()
    {
       $this->link_queue->enQueue( 1);
       $this->link_queue->enQueue( 2);
       $this->link_queue->enQueue( 3);
//       $this->assertEquals(1,$this->link_queue->getHead());
//       $this->link_queue->deQueue();
//       $this->assertEquals(2,$this->link_queue->getHead());
//       $this->link_queue->deQueue();
//       $this->link_queue->deQueue();
//       $this->assertTrue($this->link_queue->queueEmpty());
//       $this->assertEquals(0,$this->link_queue->queueLength());
       $this->expectOutputString("1,2,3,");
       $this->link_queue->printQueue();
    }

}
