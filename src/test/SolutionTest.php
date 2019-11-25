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
    
    public function stringdataProvider()
    {
        return [
            'example01'=>['11','1','100'],
            'example02'=>['1010','1011','10101'],
            'example03'=>['1','111','1000'],
            'example04'=>['1111','1111',"11110"],
        ];
    }
    
    /**
     * @dataProvider stringdataProvider
     * 字符串进制相加
     */
    public function testAddBinary($a,$b,$expected)
    {
        $this->assertEquals($expected,$this->solution->addBinary($a,$b));
    }
    
    
    public function testPivotIndex()
    {
//        $arr=[-1,-1,-1,0,1,1];
        $arr=[1, 7, 3, 6, 5, 6];
        $this->assertEquals(0,$this->solution->pivotIndex($arr));
    }
    
    public function testlongestCommonPrefix()
    {
        $long=$this->solution->longestCommonPrefix(["flower","flow","flight"]);
        $this->assertEquals("fl",$long);
    }
    
    public function testdominantIndex()
    {
        $arr=[0,0,3,2];
        $this->assertEquals(3,$this->solution->dominantIndex($arr));
    }
    
    public function testFindDiagonalOrder()
    {
        $arr=[
            [1,2,3,4],
            [5,6,7,8],
            [9,10,11,12],
            [13,14,15,16]
        ];
        
        $result=$this->solution->spiralOrder($arr);
        $this->assertEquals([1,2,3,4,8,12,11,10,9,5,6,7],$result);
    
    }
    


}