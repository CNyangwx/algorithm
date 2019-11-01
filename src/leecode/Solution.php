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
}