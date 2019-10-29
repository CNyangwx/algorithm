<?php
namespace MyAlgorithm;

/**
 * 顺序表
 */
class SqList {
	public $data = [];
	public $length = 0;
	public $size = 100;

	//初始化顺序表
	public function __construct($sq_size = 0) {
		$this->size = $sq_size;
	}

	/**
	 * 根据索引值获取对应的元素值
	 * @param  int $index 索引值
	 * @return Status | position
	 */
	public function getElement($index) {
		if ($index >= $this->length || $index < 0) {
			return Status::ERROR;
		}

		return $this->data[$index - 1];
	}

	/**
	 * 根据判定函数查找元素
	 * @param  mixed $element           要查找的元素
	 * @param  callable $compare_function 回调函数
	 * @return position|Status
	 */
	public function locateElement($element, $compare_function) {
		if (!is_callable($compare_function)) {
			return Status::ERROR;
		}
		$i = 0;
		while ($i < $this->length && !$compare_function($this->data[$i], $element)) {
			$i++;
		}
		if ($i == $this->length) {
			return Status::ERROR;
		}
		return $i;
	}

	/**
	 * 在指定位置插入元素
	 * @param int $position 指定位置
	 * @param mixed $element  任意数值
	 * @return  Status
	 */
	public function insertElement($position, $element) {
		if ($position <= 0 || $this->length >= $this->size) {
			return Status::ERROR;
		}

		$this->data[$this->length] = null;
		for ($i = $this->length - 1; $i > $position; --$i) {
			$this->data[$i + 1] = $this->data[$i];
		}
		$this->data[$position - 1] = $element;
		$this->length++;
		return Status::OK;
	}
}