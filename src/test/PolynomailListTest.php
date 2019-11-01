<?php
use MyAlgorithm\Polynomial;
use MyAlgorithm\PolynomialList;
use PHPUnit\Framework\TestCase;

class PolynomailListTest extends TestCase {

	private $polyn;
	public function setUp() {
		// your code here
		// $this->link = new LinkList();
		$node = new Polynomial(0, -1);
		$this->polyn = new PolynomialList($node);
	}

	/**
	 * @covers class::printList()
	 */
	public function testPrintList() {
		$expected_str = '2*x^1-2*x^2+2*x^3';

		$node = new Polynomial(2, 1);
		$node2 = new Polynomial(-2, 2);
		$node3 = new Polynomial(2, 2);
		$this->polyn->add($node)->add($node2)->add($node3);
		$this->assertEquals($expected_str, $this->polyn->printList());
	}
}
