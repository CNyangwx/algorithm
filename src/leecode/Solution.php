<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
namespace Leecode;

use Leecode\ListNode;

class Solution {

	/**
	 * 解法1:构建一个新的链表，将元素依次加入他的头部
	 * @param ListNode $head
	 * @return ListNode
	 */
	function reverseList($head) {
		$next = NULL;
		$new_list = NULL;
		while ($head != NULL) {
			$next = $head->next;
			$head->next = $new_list;
			$new_list = $head;
			$head = $next;
		}
		return $new_list;
	}

	/**
	 * 删除链表中等于给定值 val 的所有节点。
	 * @param ListNode $head
	 * @param Integer $val
	 * @return ListNode
	 */
	function removeElements($head, $val) {
		$ppre = $pre = new ListNode('');
		$pre->next = $head;
		$cur = $head;

		while ($cur) {
			if ($cur->val == $val) {
				$pre->next = $cur->next;
				unset($cur);
			} else {
				$pre = $cur;
			}
			$cur = $pre->next;
		}

		return $ppre->next;
	}

	/**
	 * 其实也是考察前驱节点的知识点
	 * @param ListNode $head
	 * @return ListNode
	 */
	function oddEvenList($head) {

		$even = $q = $head;
		$odd = $p = $head->next;
		if (!$q || !$p) {
			return $head;
		}
		while ($p->next) {
			$q->next = $p->next;
			$q = $q->next;
			$p->next = $q->next;
			$p = $p->next;
		}
		$q->next = $odd;
		return $even;
	}

	/**
	 * @param ListNode $head
	 * @return Boolean
	 */
	function isPalindrome($head) {
		if (!$head || !$head->next) {
			return false;
		}
		// $p = clone $head; //反而慢
		$head_serialize = serialize($head);
		$p = unserialize($head_serialize);
		$q = $this->reverse($head);

		while ($q && $p) {
			if ($q->val != $p->val) {
				return false;
			}
			$q = $q->next;
			$p = $p->next;
		}
		return true;
	}

	function reverse($head) {
		$old_list = $head;
		$new_list = null;
		while ($old_list) {
			$next = $old_list->next;
			$old_list->next = $new_list;
			$new_list = $old_list;
			$old_list = $next;
		}
		return $new_list;
	}

	/**
	 * @param ListNode $head
	 * @param Integer $pos
	 * @return ListNode
	 */
	function detectCycle($head, $pos) {
		if ($pos < 0) {
			return NULL;
		}

		$slow = $head;
		$fast = $slow->next;

		$flag = false;
		while ($slow && $fast && $fast->next) {
			$slow = $slow->next;
			$fast = $fast->next->next;
			if ($slow == $fast) {
				$flag = true;
				break;
			}
		}

		if ($flag) {
			return 'tail connects to node index ' . $pos;
		}
		return 'no cycle';
	}

	/**
	 * @param Integer $intersectVal
	 * @param ListNode $listA
	 * @param ListNode $listB
	 * @param Integer $skipA
	 * @param Integer $skipB
	 * @return ListNode
	 */
	function getIntersectionNode($intersectVal, $listA, $listB, $skipA, $skipB) {

	}

    /**
     * 有效的括号
     * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
    有效字符串需满足：
    左括号必须用相同类型的右括号闭合。
    左括号必须以正确的顺序闭合。
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $arr_s_split=str_split(trim($s));
        $length=count($arr_s_split);
        $i=0;
        $stack=[];
        do{
            switch ($arr_s_split[$i]){
                case '(':
                case '{':
                case '[':
                    array_push($stack,$arr_s_split[$i]);
                    break;
                case ')':
                    $left = array_pop($stack);
                    if ($left!='('){
                        return false;
                    }
                    break;
                case ']':
                    $left = array_pop($stack);
                    if ($left!='['){
                        return false;
                    }
                    break;
                case '}':
                    $left = array_pop($stack);
                    if ($left!='{'){
                        return false;
                    }
                    break;
            }
        }while(++$i<$length);
        if (!empty($stack)){
            return false;
        }
        return true;
    }


    /**
     * 每日气温
     * 第一种解法，超出时间限制，时间复杂度为O(N^2)
     * 根据每日 气温 列表，请重新生成一个列表，
     * 对应位置的输入是你需要再等待多久温度才会升高超过该日的天数。
     * 如果之后都不会升高，请在该位置用 0 来代替。
     * 例:
     * temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，
     * 你的输出应该是 [1, 1, 4, 2, 1, 1, 0, 0]。
     * @param Integer[] $T
     * @return Integer[]
     */
    function _dailyTemperatures($T) {
        $res=[];
        for ($i=0;$i<count($T);$i++){
            $current=$T[$i];
            $k=0;
            $t=false;
            for ($j=$i+1;$j<count($T);$j++){
                $next=$T[$j];
                $k++;
                if ($current<$next) {
                    $t=true;
                    break;
                }
            }
            if (!$t){
                $k=0;
            }
            $res[]=$k;
        }
        return $res;
    }

    /**
     * 每日气温，第二种解法
     * temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，
     *
     * 你的输出应该是 [1, 1, 4, 2, 1, 1, 0, 0]。
     * @param <Integer>[] $T
     * @return <Integer>[]
     */
    public function dailyTemperatures($T)
    {
        $length=count($T);
        //由于数列到后面有可能呈递减状态，所以先全部赋值为0
//        $i=0;
//        while ($i<$length){
//            $res[$i++]=0;
//        }
        $res=array_fill(0,$length,0);

        $tmp=[];
        for ($i=0;$i<$length;$i++){
            //如果栈不是空或者数列是递增的则计算差值后保存
            if (!empty($tmp) && $T[end($tmp)] < $T[$i]){
                while (!empty($tmp) && $T[end($tmp)] < $T[$i]) {
                    $res[end($tmp)] = $i - end($tmp);
                    array_pop($tmp);
                }
            }
            array_push($tmp,$i);
        }
        return $res;
    }


    /**
     * 逆波兰运算
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        //初始化一个运算栈
        $num_stack=[];
        $i=0;
        $length=count($tokens);
        do{
            switch ($tokens[$i]){
                case '+':
                    $num1=array_pop($num_stack);
                    $num2=array_pop($num_stack);
                    array_push($num_stack,$num1+$num2);
                    break;
                case '-':
                    $num2=array_pop($num_stack);
                    $num1=array_pop($num_stack);
                    array_push($num_stack,$num1-$num2);
                    break;
                case '*':
                    $num1=array_pop($num_stack);
                    $num2=array_pop($num_stack);
                    array_push($num_stack,$num1*$num2);
                    break;
                case '/':
                    $num2=array_pop($num_stack);
                    $num1=array_pop($num_stack);
                    if ($num2==0){
                        return 0;
                    }
                    array_push($num_stack,intval($num1/$num2));
                    break;
                default:
                    array_push($num_stack,$tokens[$i]);
            }
        }while(++$i<$length);

        return end($num_stack);
    }

}