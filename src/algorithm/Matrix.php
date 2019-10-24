<?php
/**
 * 矩阵
 *
 * @version  0.1 无确定矩阵的本质， 1 矩阵的变量为两下标，也就是说，在外部确定好n和m的数值便可以确定一个矩阵
 * @version  0.2 数据元素
 */

namespace MyAlgorithm;

class Matrix {

	private $matrix;
	//矩证的行数
	private $row = 0;
	//矩阵的列数
	private $column = 0;

	public function size() {
		return 'row:' . $this->row . ';column' . $this->column . PHP_EOL;
	}

	/**
	 * 行数
	 * @return int
	 */
	public function getRow() {
		return $this->row;
	}

	/**
	 * 列数
	 * @return int
	 */
	public function getColumn() {
		return $this->column;
	}

	/**
	 * @return array
	 */
	public function getMatrix() {
		return $this->matrix;
	}

	//初始化矩阵
	public function setMatrix($matrix) {

		if (empty($matrix)) {
			throw new \Exception("请不要实例化一个空矩阵");
		}

		foreach ($matrix as $matrix_row_value) {

			if (!is_array($matrix_row_value)) {
				throw new \Exception("这不是个合法的矩阵，矩阵里每行都必须为一维数组");
			}
			//首行的列数
			$matrix_first_column_value = $matrix_first_column_value ?? count($matrix_row_value);
			//若列数有不同，则直接报错
			if ($matrix_first_column_value != count($matrix_row_value)) {
				throw new \Exception("这不是个合法的矩阵，矩阵里每行的列数都必须相等");
			}
		}

		//矩阵的行数
		$this->row = count($matrix);

		//矩阵的列数
		$this->column = $matrix_first_column_value ?? 0;

		//初始化矩阵
		$this->matrix = $matrix;

	}

	/**
	 * 打印矩阵
	 *
	 * @param  array $T 需要被打印的矩阵
	 * @return void
	 */
	public function printMatrix() {
		for ($i = 0; $i < $this->row; $i++) {
			for ($j = 0; $j < $this->column; $j++) {
				printf("%4d\t", $this->matrix[$i][$j]);
			}
			echo PHP_EOL;
		}
	}

}