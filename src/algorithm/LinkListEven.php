<?php
namespace MyAlgorithm;

use MyAlgorithm\Node;

/**
 * 升级版本
 * --为了解决尾插入时需要遍历整个链表，引入了head头节点和tail尾节点两个节点
 * --为了解决查询链表长度时需要遍历整个链表，引入了length的变量
 * --增加了当前节点的属性
 * 带头节点的链表
 */
class LinkListEven {
	//节点
	public $head, $tail;

	//长度
	public $length;

	//当前节点
	public $current;

	/**
	 * summary
	 */
	public function __construct() {
		$this->head = new Node();
		$this->head->next = null;
		$this->current = $this->tail = $this->head;
		$this->length = 0;
	}

	//插入元素
	public function insertElement($element) {
		$new_node = new Node($element);
		$new_node->next = $this->tail->next;
		$this->tail->next = $new_node;
		$this->tail = $new_node;
		$this->length++;
	}

	//根据位置获取某元素
	public function getElement($position) {
		$p = $this->head->next;
		$i = 1;

		while ($p && $i++ <= $position) {
			$p = $p->next;
		}

		$this->current = $p;
		return $p->data;
	}

	//删除某个位置上的元素
	public function delElement($position) {
		$this->getElement($position - 1);
		$need_del_node = $this->current->next;
		$this->current->next = $need_del_node->next;
		unset($need_del_node);
	}

	/**
	 * 打印链表
	 * @return void
	 */
	public function printList() {
		$arr = [];
		$p = $this->head;
		while ($p = $p->next) {
			$arr[] = $p->data;
		}
		echo implode(',', $arr);
	}
}