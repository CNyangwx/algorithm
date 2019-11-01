<?php

namespace MyAlgorithm;

/**
 * 一元多项式数据项
 */
class Polynomial {
	public $factor;

	public $power;

	public $next = NULL;

	/**
	 * summary
	 */
	public function __construct($factor, $power) {
		$this->factor = $factor;
		$this->power = $power;
		$this->next = NULL;
	}

	public function __toString() {
		$fuhao = $this->factor > 0 ? '+' : '-';
		$power_str = !in_array($this->power, [0, 1]) ? '*power(x,' . $this->power . ')' : ($this->power == 0 ? '' : 'x');
		return $fuhao . abs($this->factor) . $power_str;
	}

	public function add($node) {
		$pre = $this;
		$head = $this->next;

		$flag = false;
		while ($head) {
			if ($head->power == $node->power) {
				$head->factor += $node->factor;
				if ($head->factor == 0) {
					$pre->next = $head->next;
					unset($head);
					$head = $pre->next;
					$flag = true;
				}
				break;
			}
			$head = $head->next;
			$pre = $pre->next;
		}
		if ($head == NULL && !$flag) {
			$pre->next = $node;
		}
		return $this;
	}

}