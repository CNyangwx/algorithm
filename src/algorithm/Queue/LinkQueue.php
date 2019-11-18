<?php


namespace MyAlgorithm\Queue;
use MyAlgorithm\Node;

/**
 * 带头指针的队列链表实现
 * Class LinkQueue
 * @package MyAlgorithm\Queue
 */
class LinkQueue implements IQueue
{
    private $node;
    private $front;
    private $rear;
    private $length=0;
    public function __construct()
    {
        $this->node=new Node();
        $this->front=$this->rear=$this->node;
        $this->length=0;
    }

    public function __destruct()
    {
        $this->clearQueue();
    }

    public function queueEmpty()
    {
        return $this->front==$this->rear;
    }

    public function queueLength()
    {
        return $this->length;
    }

    public function getHead()
    {
        if ($this->queueEmpty()){
            return false;
        }
        return $this->front->next->data;
    }

    public function clearQueue()
    {
        while (!$this->queueEmpty()){
            $this->deQueue();
        }
    }

    public function enQueue($data)
    {
        $new_node = new Node($data);
        $new_node->next=$this->rear->next;
        $this->rear->next=$new_node;
        $this->rear=$new_node;
        $this->length++;
    }

    public function deQueue()
    {
        $node = $this->front->next;
        $this->front->next = $node->next;
        //本来出队列只需要动头节点，但有种特殊情况，就是要释放的节点
        //刚好是尾节点，那必须将尾节点指回头节点，防止内存泄漏
        if (empty($this->front->next)){
            $this->rear=$this->front;
        }
        $e=$node->data;
        unset($node);
        $this->length--;
        return $e;
    }


    public function printQueue()
    {
        $p=$this->front->next;
        while ($p){
            echo $p->data.",";
            $p=$p->next;
        }
    }
}