<?php

namespace MyAlgorithm\Stack;

/**
 * 节点
 */
class Node {
	public $data;
	public $next = NULL;
	/**
	 * summary
	 */
	public function __construct($data) {
		$this->data = $data;
	}
}