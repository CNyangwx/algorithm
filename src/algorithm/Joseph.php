<?php

/**
 * 约瑟夫环
 * 已知n个人(以编号1，2，3…n分别表示)围坐在一张圆桌周围。从编号为k的人开始报数，数到m的那个人出列;他的下一个人又从1开始报数，数到m的那个人又出列;依此规律重复下去，直到圆桌周围的人全部出列。
 * 请打印出列的顺序
 */
namespace MyAlgorithm;
use MyAlgorithm\LinkListEven;

class Joseph {
	//节点
	public $link;
	//人数
	public $n = 41;
	//数到第m个
	public $m = 3;

	//从第K个开始数
	public $k = 1;

	/**
	 * summary
	 */
	public function __construct($n, $m, $k) {
		$this->n = $n;
		$this->m = $m;
		$this->k = $k;
		$this->link = new LinkListEven(1);
		//初始化一个n个人数的链表
		for ($i = 2; $i <= $this->n; ++$i) {
			$this->link->insertElement($i);
		}
	}
	//报数
	public function countOff() {
		$p = $this->link->head;
		$i = 1;
		//要找元素的前驱
		while ($this->link->length > $this->k) {
			$i = 1;
			while ($i++ < $this->m) {
				$q = $p;
				$p = $p->next;
			}
			echo '编号:' . $p->data . '出列' . PHP_EOL;
			$q->next = $p->next;
			//要找元素
			unset($p);
			//下一个开始
			$p = $q->next;
			//人数少一个
			$this->link->length--;
		}

		// echo '幸运儿是' . $p->data . PHP_EOL;
	}
}
