<?php
namespace MyAlgorithm\Stack;
use MyAlgorithm\Stack\IStack;
use MyAlgorithm\Status;

/**
 * 顺序结构实现堆栈
 */
class SqStack implements IStack {
	private $data;
	private $size = 100;

	public $top;
	private $botton;
	/**
	 * summary
	 */
	public function __construct() {
		$this->data = [];
		$this->botton = $this->top = 0;
	}

	public function __destruct() {
		unset($this->data);
	}

	//清除堆栈
	public function clearStack() {
		$this->top = $this->botton;
		$this->data = [];
	}
	//得到堆栈的长度
	public function stackLength() {
		return $this->top;
	}
	//堆栈是否为空
	public function stackEmpty() {
		return $this->top == 0;
	}
	//得到栈顶元素
	public function getTop() {
		if ($this->top < 1) {
			return Status::ERROR;
		}
		$e = $this->data[$this->top - 1];
		return $e;
	}
	//弹出栈顶
	public function pop() {
		if ($this->top < 1) {
			return Status::ERROR;
		}
		$e = $this->data[$this->top - 1];
		$this->top--;
		return $e;
	}
	//推入栈顶
	public function push($e) {
		//栈满了，报错返回
		if ($this->top > $this->size - 1) {
			return Status::ERROR;
		}
		$this->data[$this->top++] = $e;
		return Status::OK;
	}

}