<?php
namespace MyAlgorithm\Stack;

/**
 * 迷宫节点
 */
class MazeNode {
	public $x; //x轴
	public $y; //y轴
	public $d = 'E'; //初始方向为东
	/**
	 * 初始化一个迷宫节点
	 */
	public function __construct($x, $y, $d = 'E') {
		$this->x = $x;
		$this->y = $y;
		$this->d = $d;
	}

	public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->x.','.$this->y.':'.$this->d.PHP_EOL;
    }

}