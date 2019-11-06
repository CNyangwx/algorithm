<?php
namespace MyAlgorithm\Stack;
use MyAlgorithm\Stack\SqStack;

// use MyAlgorithm\Stack\linkStack;

/**
 * 堆栈的练习题
 */
class Pratices {
	private $stack;

	/**
	 * @return MyAlgorithm\Stack\IStack
	 */
	public function getStack() {
		return $this->stack;
	}
	/**
	 * summary
	 */
	public function __construct() {
		$this->stack = new SqStack();
	}

	//整数进制转换
	/**
	 * 整数进制转换
	 * @param  int    $num      要转换的整数
	 * @param  int    $base_num 任意进制
	 * @return string           转换后的数值
	 */
	public function conversion(int $num, int $base_num) {
		while ($num) {
			$this->stack->push($num % $base_num);
			$num = (int) ($num / $base_num);
		}
		$str = '';
		while (!$this->stack->stackEmpty()) {
			$str .= $this->stack->pop();
		}
		return $str;
	}

	/**
	 * 验证表达式中的括弧是否匹配
	 * @param  string $exp 需验证的表达式
	 * @return boolean
	 */
	public function is_matching(string $exp) {
		$flag = true;
		$exp_arr = str_split($exp);
		$i = 0;

		$exp_arr_length = count($exp_arr);
		/* 第一种解法
			// $left = ['(', '{', '['];
			// $right = [')', '}', ']'];
			//
			// while ($i < $exp_arr_length) {
			// 	$exp_var = $exp_arr[$i++];
			// 	if (in_array($exp_var, $left)) {
			// 		$this->stack->push($exp_var);
			// 	} else if (in_array($exp_var, $right)) {
			// 		$pop_left = $this->stack->pop();
			// 		$charge = $pop_left == '(' && $exp_var == ')';
			// 		$charge = $charge || ($pop_left == '[' && $exp_var == ']');
			// 		$charge = $charge || ($pop_left == '{' && $exp_var == '}');
			// 		if (!$charge) {
			// 			$flag = false;
			// 			break;
			// 		}
			// 	}
			// }
		*/
		// 第二种解法，用switch进行优化
		while ($i < $exp_arr_length) {
			$exp_var = $exp_arr[$i++];
			switch ($exp_var) {
			case '{':
			case '[':
			case '(':
				$this->stack->push($exp_var);
				break;
			case ')':
				$pop_left = $this->stack->pop();
				if ($pop_left != '(') {
					$flag = false;
					break;
				}
				break;
			case ']':
				$pop_left = $this->stack->pop();
				if ($pop_left != '[') {
					$flag = false;
					break;
				}
				break;
			case '}':
				$pop_left = $this->stack->pop();
				if ($pop_left != '{') {
					$flag = false;
					break;
				}
				break;
			}
		}

		if ($flag && !$this->stack->stackEmpty()) {
			$flag = false;
		}
		return $flag;
	}

	/**
	 * 行编辑处理
	 * 规则: 遇到#则删除前一个字符，遇到@则清空前面所有字符
	 * @param  sting $exp 输入的表达式
	 * @return string 处理过后的表达式
	 */
	public function lineEdit(string $exp) {
		$exp_arr = str_split($exp);
		$i = 0;
		$exp_arr_length = count($exp_arr);

		while ($i < $exp_arr_length) {
			$exp_var = $exp_arr[$i++];
			switch ($exp_var) {
			case '#':
				$this->stack->pop();
				break;
			case '@':
				$this->stack->clearStack();
				break;
			default:
				$this->stack->push($exp_var);
				break;
			}
		}
		$str = '';
		while (!$this->stack->stackEmpty()) {
			$str = $this->stack->pop() . $str;
		}
		return $str;
	}

	/**
	 * 迷宫算法
	 * @param  array  $maze  传入一个迷宫，通常为平面的N*N数组
	 * @param  Node   $begin 开始节点
	 * @param  Node   $end   结束节点
	 * @return array         经过的可行节点路径
	 */
	public function maze(array $maze, $begin, $end) {

	}

}