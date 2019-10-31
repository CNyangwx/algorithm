<?php
namespace Leecode;

use Leecode\Node;

/**
 * Leecode中的单链表
 * 获取位置节点
 * 增加位置节点
 * 按头增加节点
 * 按尾增加节点
 * 打印节点
 */
class MyLinkedList {
	public $link;
	public $length;
	/**
	 * Initialize your data structure here.
	 */
	function __construct() {
		$this->link = new Node();
		$this->link->next = null;
		$this->length = 0;
	}

	/**
	 * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
	 * @param Integer $index
	 * @return Integer
	 */
	function get($index) {
		if ($index < 0 || $index > $this->length - 1) {
			return -1;
		}
		$i = 0;
		$p = $this->link->next;
		while ($p && $i++ < $index) {
			$p = $p->next;
		}
		if (!$p) {
			return -1;
		}
		return $p->data;
	}

	/**
	 * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
	 * @param Integer $val
	 * @return NULL
	 */
	function addAtHead($val) {
		$new_node = new Node($val);
		$new_node->next = $this->link->next;
		$this->link->next = $new_node;
		$this->length++;
	}

	/**
	 * Append a node of value val to the last element of the linked list.
	 * @param Integer $val
	 * @return NULL
	 */
	function addAtTail($val) {
		$p = $this->link;

		while ($p->next) {
			$p = $p->next;
		}
		$new_node = new Node($val);
		$new_node->next = $p->next;
		$p->next = $new_node;
		$this->length++;
	}

	/**
	 * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
	 * @param Integer $index
	 * @param Integer $val
	 * @return NULL
	 */
	function addAtIndex($index, $val) {
		if ($index > $this->length) {
		} else if ($index == $this->length) {
			$this->addAtTail($val);
		} else if ($index < 0) {
			$this->addAtHead($val);
		} else {
			$q = $this->link;
			$p = $this->link->next;
			$i = 0;
			while ($p->next && ($i++ < $index)) {
				$q = $q->next;
				$p = $p->next;
			}
			$new_node = new Node($val);
			$new_node->next = $q->next;
			$q->next = $new_node;
			$this->length++;
		}
		return NULL;
	}

	/**
	 * Delete the index-th node in the linked list, if the index is valid.
	 * @param Integer $index
	 * @return NULL
	 */
	function deleteAtIndex($index) {
		if ($index < 0 || $index > $this->length) {
			return NULL;
		}
		$q = $this->link;
		$p = $this->link->next;
		$i = 0;
		while ($p && $i++ < $index) {
			$q = $q->next;
			$p = $p->next;
		}
		if (!$p) {
			return -1;
		}
		$q->next = $p->next;
		unset($p);
		$this->length--;
	}

	function printLink() {
		$p = $this->link->next;
		while ($p) {
			echo $p->data . ',';
			$p = $p->next;
		}
		echo PHP_EOL;

	}
}

/**
 * Your MyLinkedList object will be instantiated and called as such:
 * $obj = MyLinkedList();
 * $ret_1 = $obj->get($index);
 * $obj->addAtHead($val);
 * $obj->addAtTail($val);
 * $obj->addAtIndex($index, $val);
 * $obj->deleteAtIndex($index);
 */