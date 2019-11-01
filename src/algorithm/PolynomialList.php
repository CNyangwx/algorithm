<?php
namespace MyAlgorithm;

/**
 * 一元多项式
 */
class PolynomialList {
	private $node;

	public function __construct($node) {
		$this->node = $node;
	}

	public function printList() {
		$ret_str = '';
		$head = $this->node->next;
		while ($head) {
			$ret_str .= $head;
			$head = $head->next;
		}
		return trim($ret_str, '+');
	}

	public function add($node) {
		return $this->node->add($node);
	}

}