<?php

/**
 * 矩阵操作
 */

namespace MyAlgorithm;

/**
 * 关于矩阵的操作
 */
class MatrixOperate {

	/**
	 * 两矩阵相乘
	 * 规则: T1和T2的行数和列数必须相同
	 * 算法：sum(t1(n,m)*t2(m,k)) = t(n,k)
	 *
	 * @access public
	 * @param  Matrix $T1 [矩阵T1，其中行数必须与T2的列数相同]
	 * @param  Matrix $T2 [矩阵T2，其中列数必须与T1的行数相同]
	 * @return array|Exception 两矩阵相乘的结果
	 */
	public function Multiply(Matrix $t1, Matrix $t2) {
		if ($t1->getColumn() != $t2->getRow()) {
			throw new \Exception('t1的列数必须等于t2的行数');
		}

		$result = [];
		//获取矩阵的值
		$t1_matrix = $t1->getMatrix();
		$t2_matrix = $t2->getMatrix();

		/**
		 * 		$this->t1->setMatrix([
		[0, 2, 3],
		[1, 1, 2],
		]);

		$this->t2 = new Matrix();
		$this->t2->setMatrix([
		[1, 1],
		[2, 0],
		]);

		c[0][0] = a[0][0] * b[0][0] +  a[0][1] * b[0][0] + a[0][2]*b[0][0];

		 */
		// 2,3  2 2
		// 规则 t1[m,p]和t2[p,n]时才有意义
		// sum(t1[i,k]*t2[k,j])[ 0<=k<=p]
		for ($i = 0; $i < $t1->getRow(); $i++) {
			for ($j = 0; $j < $t2->getColumn(); $j++) {
				$result[$i][$j] = 0;

				for ($k = 0; $k < $t1->getColumn(); $k++) {
					$result[$i][$j] += $t1_matrix[$i][$k] * $t2_matrix[$k][$j];
				}
			}
		}
		return $result;
	}
}