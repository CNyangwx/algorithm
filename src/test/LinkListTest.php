<?php
//链表的测试
use MyAlgorithm\LinkListEven;
use PHPUnit\Framework\TestCase;

class LinkListTest extends TestCase {
	private $link;
	public function setUp() {
		// your code here
		// $this->link = new LinkList();
		$this->link = new LinkListEven();
		$this->size = 4;
	}

	public function tearDown() {
		// your code here
		unset($this->link);
	}

	public function testInsertElement() {
		//测试插入尾结点
		$expected_str = '';
		for ($i = 0; $i < $this->size; $i++) {
			$this->link->insertElement($i);
			$expected_str .= $i . ',';
		}
		$this->expectOutputString(trim($expected_str, ','));
		$this->link->printList();
		$this->assertEquals(4, $this->link->length);
		return $this->link;
	}

	/**
	 *
	 * @depends testInsertElement
	 */
	public function testgetElement($link) {
		$this->assertEquals(2, $link->getElement(2));
		$this->assertEquals(2, $link->current->data);
	}

	/**
	 *
	 * @depends testInsertElement
	 */
	public function testdelElement($link) {
		$link->delElement(1);
		$this->expectOutputString('0,2,3');
		$link->printList();
	}

	/**
	 *
	 * @depends testInsertElementByTop
	 */
	/*
		public function testInsertElementByPosition($link) {
			$link->insertElementByPosition(3, 7);
			$this->expectOutputString('3,2,7,1,0');
			$link->printList();

			$this->assertFalse($link->insertElementByPosition(7, 7));

		}
	*/
}
