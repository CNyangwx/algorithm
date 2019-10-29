<?php
/**
 * 线性表测试
 */

use MyAlgorithm\SqList;
use PHPUnit\Framework\TestCase;

class MyListTest extends TestCase {

	public function setUp() {
		$this->size = 5;
		$this->mylist = new SqList($this->size);
	}

	public function tearDown() {
		unset($this->mylist);
	}

	public function testInsertElement() {
		for ($i = 1; $i < $this->size + 5; $i++) {
			$this->mylist->insertElement($i, $i);
		}

		$this->assertEquals([1, 2, 3, 4, 5], $this->mylist->data);

		$this->assertEquals(5, $this->mylist->length);

		return $this->mylist;
	}
	/**
	 * @depends testInsertElement
	 */
	public function testgetElement($mylist) {
		$element = $mylist->getElement(2);
		$this->assertEquals(2, $element);
	}
	/**
	 * @depends testInsertElement
	 */
	public function testlocateElement($mylist) {
		$function = function ($element, $need) {
			return $element == $need;
		};
		$position = $mylist->locateElement(3, $function);
		$position2 = $mylist->locateElement(7, $function);
		$this->assertEquals(2, $position);
		$this->assertFalse($position2);
		$this->assertFalse($mylist->locateElement(7, 1));

	}

}
