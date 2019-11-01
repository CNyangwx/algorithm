<?php

/**
 * Leecode的Solution的测试类
 */
use Leecode\ListNode;
use Leecode\Solution;

class SolutionTest {
	private $solution;
	public function setUp() {
		// your code here
		// $this->link = new LinkList();
		$this->solution = new Solution();

		$list = new ListNode(1);
		$arr = [12, 3, 4];
		foreach ($arr as $a) {
			$list->addAtTail($a);
		}
	}

	public function tearDown() {
		$p = $this->list;
		while ($p) {
			$q = $p->next;
			unset($p);
			$p = $q;
		}
		unset($this->list);
	}
	/**
	 * @test
	 */
	public function testIsPalindrome() {
		$this->assertFalse($this->solution->isPalindrome($this->list));
	}

	/**
	 * @covers Solution::detectCycle()
	 */
	public function testDetectCycle() {
		$p = $this->solution->detectCycle($this->list, 1);
		var_dump($p);
	}

}