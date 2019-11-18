<?php


namespace MyAlgorithm\Queue;


interface IQueue
{
    //判断队列是否是空
    public function queueEmpty();
    //获取队列长度
    public function queueLength();
    //获取头节点数值
    public function getHead();
    //清空队列
    public function clearQueue();
    //入队列
    public function enQueue($data);
    //出队列
    public function deQueue();

}