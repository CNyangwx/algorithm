<?php


namespace MyAlgorithm\Queue;

/**
 * 循环顺序队列
 * Class MyCircularQueue
 * @package MyAlgorithm\Queue
 */
class MyCircularQueue {
    private $data;
    private $front;
    private $rear;
    private $size;
    
    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->size=$k+1;
        $this->data=array_fill(0,$this->size,NULL);
        $this->rear=$this->front=0;
    }
    
    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if ($this->isFull()){
            return FALSE;
        }
        $this->data[$this->rear]=$value;
        $this->rear=($this->rear+1)%$this->size;
        return TRUE;
    }
    
    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        if ($this->isEmpty()){
            return FALSE;
        }
        
        $this->front=($this->front+1)%$this->size;
        return TRUE;
    }
    
    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        if ($this->isEmpty()){
            return -1;
        }
        return $this->data[$this->front];
    }
    
    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        if ($this->isEmpty()){
            return -1;
        }
        return $this->data[($this->rear+$this->size-1)%$this->size];
    }
    
    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->front==$this->rear;
    }
    
    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
        return ($this->rear+1)%$this->size==$this->front;
    }
}

