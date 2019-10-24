<?php
use MyAlgorithm\Matrix;
use MyAlgorithm\MatrixOperate;
use PHPUnit\Framework\TestCase;

class MatrixOperateTest extends TestCase {

	protected $t1;
	protected $t2;

	protected $matrix_operate;

	public function setUp() {
		$this->t1 = new Matrix();
		$this->t1->setMatrix([
			[1, 1],
			[2, 0],

		]);

		$this->t2 = new Matrix();
		$this->t2->setMatrix([
			[0, 2, 3],
			[1, 1, 2],
		]);

		$this->matrix_operate = new MatrixOperate();
	}

	//测试T1(2*2) T2(2*3)两矩阵相乘
	public function testMultiply() {
		// assertions
		//
		$result = $this->matrix_operate->Multiply($this->t1, $this->t2);
		$expected_result = [
			[1, 3, 5],
			[0, 4, 6],
		];

		$this->assertEquals($expected_result, $result);

	}
}
