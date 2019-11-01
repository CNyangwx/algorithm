<?php
namespace Leecode;

class ListNode {
	public $val = 0;
	public $next = null;
	function __construct($val) {$this->val = $val;}
	/**
	 * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
	 * @param Integer $val
	 * @return NULL
	 */
	function addAtHead($val) {
		$new_node = new self($val);
		$new_node->next = $this->next;
		$this->next = $new_node;
	}

	/**
	 * Append a node of value val to the last element of the linked list.
	 * @param Integer $val
	 * @return NULL
	 */
	function addAtTail($val) {
		$p = $this;

		while ($p->next) {
			$p = $p->next;
		}
		$new_node = new self($val);
		$new_node->next = $p->next;
		$p->next = $new_node;
	}

	function printLink() {
		$p = $this;
		while ($p) {
			echo $p->val . ',';
			$p = $p->next;
		}
		echo PHP_EOL;
	}

	//克隆非空对象
	public function __clone() {
		if ($this->next) {
			$this->next = clone $this->next;
		}
	}
}