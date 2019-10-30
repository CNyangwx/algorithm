<?php

namespace MyAlgorithm;

/**
 * 内部类
 */
class Node {
	public $data;
	public $next;

	public function __construct($data = '') {
		$this->data = $data;
	}

}