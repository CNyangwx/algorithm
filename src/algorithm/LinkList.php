<?php

namespace MyAlgorithm;

use Node;

/**
 * 带头节点的链表,基础版本
 */
class LinkList {
	//节点
	public $node;

	public function __construct($node) {
		$this->node = $node;
	}

	public function __destruct() {
		$head = $this->node;
		while ($head && $head->next) {
			$tmp = $head;
			$head = $tmp->next;
			unset($tmp);
		}
		echo '__destruct';
	}

	/**
	 * 尾插法插入元素
	 * @param  mixed $element 要插入的元素值
	 * @return void
	 */
	public function insertElementByTail($new_node) {
		$p = $this->node;

		while ($p->next) {
			$p = $p->next;
		}
		$p->next = $new_node;
	}

	/**
	 * 头插法插入元素
	 * @param  mixed $element 要插入的元素值
	 * @return void
	 */
	public function insertElementByTop($element) {
		$new_node = new Node($element);
		$new_node->next = $this->node->next;
		$this->node->next = $new_node;
	}

	/**
	 * 根据位置插入元素
	 * @param  mixed $element 要插入的元素值
	 * @return void
	 */
	public function insertElementByPosition($position, $element) {
		$new_node = new Node($element);
		$p = $this->node->next;
		$i = 1;
		while ($i++ < $position - 1 && $p) {
			$p = $p->next;
		}
		if (!$p) {
			return Status::ERROR;
		}
		$new_node->next = $p->next;
		$p->next = $new_node;
		return Status::OK;
	}

	/**
	 * 得到position位置上的元素
	 * @param  int $position 位置
	 * @return Status|第position位置上的元素
	 */
	public function getElement($position) {
		if ($position <= 0) {
			return Status::ERROR;
		}
		$p = $this->node->next;
		$i = 1;
		while ($i++ < $position - 1 && $p) {
			$p = $p->next;
		}
		if (!p) {
			return Status::ERROR;
		}
		return $p->data;
	}
	/**
	 * 删除指定位置的元素
	 * @param  int $position 位置
	 * @return Status|           [description]
	 */
	public function delElement($position) {
		if ($position <= 0) {
			return Status::ERROR;
		}
		$p = $this->node->next;
		$i = 1;
		while ($i++ < $position - 1 && $p) {
			$q = $p;
			$p = $p->next;
		}
		if (!p) {
			return Status::ERROR;
		}
		$q->next = $p->next;
		$element = $p->data;
		unset($p);
		return $element;
	}
	/**
	 * 打印链表
	 * @return void
	 */
	public function printList() {
		$arr = [];
		$p = $this->node;
		while ($p = $p->next) {
			$arr[] = $p->data;
		}
		echo implode(',', $arr);
	}

}