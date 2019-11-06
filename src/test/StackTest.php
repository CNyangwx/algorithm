<?php
// use MyAlgorithm\Stack\SqStack;
// use MyAlgorithm\Stack\LinkStack;
use MyAlgorithm\Stack\Pratices;
use PHPUnit\Framework\TestCase;

//测试顺序堆栈
class StackTest extends TestCase {
	// private $sq_stack;
	private $pratices;

	public function setUp() {
		// your code here
		// $this->sq_stack = new SqStack();
		// $this->sq_stack = new LinkStack();
		$this->pratices = new Pratices();

	}

	//测试压入和弹出
	/**
	 * @test
	 */
	// public function testPopAndPush() {
	// 	$this->sq_stack->push(1);
	// 	$this->assertEquals(1, $this->sq_stack->stackLength());
	// 	$this->assertEquals(1, $this->sq_stack->pop());
	// 	$this->assertEquals(0, $this->sq_stack->stackLength());
	// 	$this->assertFalse($this->sq_stack->pop());
	// 	$this->assertTrue($this->sq_stack->stackEmpty());
	// }

	/**
	 * @covers Pratices::conversion()
	 */
	public function testConversion() {
		$this->assertEquals('1010', $this->pratices->conversion(100000000, 2));
	}

	/**
	 * @covers class::is_matching()
	 */
	public function testIs_matching() {
		$this->assertTrue($this->pratices->is_matching('([])'));
		$this->assertFalse($this->pratices->is_matching('([])}'));
		$this->assertFalse($this->pratices->is_matching('(['));
	}

	/**
	 * @covers class::lineEdit()
	 */
	public function testLineEdit() {
		$this->assertEquals('while', $this->pratices->lineEdit('whli##ilr#e'));
		$this->assertEquals('putchar', $this->pratices->lineEdit('whiele@putchar'));
	}

	/**
	 * @covers class::maze()
	 */
	public function testMaze() {
		//迷宫
		$maze = [
			[0, 1, 1],
			[0, 0, 1],
			[1, 0, 0],
		];
		$this->assertEquals([[0, 0], [1, 0], [1, 1], [2, 1], [2, 2]],
			$this->pratices->maze($maze, $begin, $end));
	}

}
