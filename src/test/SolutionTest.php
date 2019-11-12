<?php

/**
 * Leecode的Solution的测试类
 */
use Leecode\ListNode;
use Leecode\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase {
	private $solution;
	public function setUp() {
		// your code here
		// $this->link = new LinkList();
		$this->solution = new Solution();
//
//		$list = new ListNode(1);
//		$arr = [12, 3, 4];
//		foreach ($arr as $a) {
//			$list->addAtTail($a);
//		}
	}

	public function tearDown() {
//		$p = $this->list;
//		while ($p) {
//			$q = $p->next;
//			unset($p);
//			$p = $q;
//		}
//		unset($this->list);
	}
//	/**
//	 * @test
//	 */
//	public function testIsPalindrome() {
//		$this->assertFalse($this->solution->isPalindrome($this->list));
//	}
//
//	/**
//	 * @covers Solution::detectCycle()
//	 */
//	public function testDetectCycle() {
//		$p = $this->solution->detectCycle($this->list, 1);
//		var_dump($p);
//	}

    public function testIsValid()
    {
        $this->assertTrue($this->solution->isValid("()"));
	}

    public function testDailyTemperatures()
    {
        $tmp=[73, 74, 75, 71, 69, 72, 76, 73];
        $res = $this->solution->dailyTemperatures($tmp);
        $this->assertEquals([1, 1, 4, 2, 1, 1, 0, 0],$res);
    }

    public function testevalRPN()
    {
        $val = $this->solution->evalRPN(["10", "6", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"]);
        $this->assertEquals(22,$val);
    }


}