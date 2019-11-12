<?php

namespace MyAlgorithm\Stack;
use MyAlgorithm\Stack\IStack;
use MyAlgorithm\Stack\Node;
use MyAlgorithm\Status;

/**
 * 链式结构实现堆栈
 */
class LinkStack implements IStack {
	private $node;
	private $top;
	private $botton;
	private $length;

	/**
	 * 初始化一个空节点
	 */
	public function __construct() {
		$this->node = new Node('');
		$this->botton = $this->top = $this->node;
		$this->length = 0;
	}

	public function __destruct() {
		$head = $this->botton;
		while ($head != NULL) {
			$p = $head;
            $head = $head->next;
            unset($p);
		}
	}

	//清空堆栈
	public function clearStack() {
        $head = $this->botton->next;
        while ($head != NULL) {
            $p = $head;
            $head = $head->next;
            unset($p);
        }
        $this->top=$this->botton;
		$this->length = 0;
	}
	//得到堆栈的长度
	public function stackLength() {
		return $this->length;
	}
	//堆栈是否为空
	public function stackEmpty() {
		return $this->top == $this->botton;
	}
	//得到栈顶元素
	public function getTop() {
		return $this->top;
	}
	//弹出栈顶
	public function pop() {
		if ($this->stackEmpty()) {
			return Status::ERROR;
		}
        $head = $this->botton;
		while ($head->next != $this->top) {
			$head = $head->next;
		}
		$q = $this->top;
		$e = $q->data;
		$head->next = $q->next;
		$this->top = $head;
		unset($q);
		$this->length--;
		return $e;
	}
	//推入栈顶
	public function push($e) {
		//栈满了，报错返回
		$new_node = new Node($e);
		$new_node->next = $this->top->next;
		$this->top->next = $new_node;
		$this->top = $new_node;
		$this->length++;
		return Status::OK;
	}

}