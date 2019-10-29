<?php
//链表的测试
use MyAlgorithm\LinkList;
use PHPUnit\Framework\TestCase;

class LinkListTest extends TestCase {
	private $link;
	public function setUp() {
		// your code here
		$this->link = new LinkList();
		$this->size = 4;
	}

	public function tearDown() {
		// your code here
		unset($this->link);
	}

	public function testInsertElementByTail() {
		//测试插入尾结点
		$expected_str = '';
		for ($i = 0; $i < $this->size; $i++) {
			$this->link->insertElementByTail($i);
			$expected_str .= $i . ',';
		}
		$this->expectOutputString(trim($expected_str, ','));
		$this->link->printList();
		return $this->link;
	}

	public function testInsertElementByTop() {
		$expected_str = '';
		for ($i = 0; $i < $this->size; $i++) {
			$this->link->insertElementByTop($i);
			$expected_str .= ',' . ($this->size - $i - 1);
		}
		$this->expectOutputString(trim($expected_str, ','));
		$this->link->printList();
		return $this->link;
	}
	/**
	 *
	 * @depends testInsertElementByTop
	 */
	public function testInsertElementByPosition($link) {
		$link->insertElementByPosition(3, 7);
		$this->expectOutputString('3,2,7,1,0');
		$link->printList();

		$this->assertFalse($link->insertElementByPosition(7, 7));

	}
}
