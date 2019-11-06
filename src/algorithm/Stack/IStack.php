<?php

namespace MyAlgorithm\Stack;

/**
 * 堆栈必须实现的方法
 */
Interface IStack {
	//删除堆栈
	public function clearStack();
	//得到堆栈的长度
	public function stackLength();
	//堆栈是否为空
	public function stackEmpty();
	//得到栈顶元素
	public function getTop();
	//弹出栈顶
	public function pop();
	//推入栈顶
	public function push($e);
}