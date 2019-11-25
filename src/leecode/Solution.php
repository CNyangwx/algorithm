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
    
    /**
     * @param Node $l
     * @return int
     */
    public function getLength($l){
        $p=$l;
        $length=0;
        while($p->next){
            $length++;
            $p=$p->next;
        }
        return $length;
    }
    
    function addTwoNumbers($l1, $l2) {
        $is_l1=false;
        //就是将p1置为长链，p2置为短链，不再开额外空间
        if($this->getLength($l1) >= $this->getLength($l2)){
            $p1=$l1;
            $p2=$l2;
            $is_l1=true;
        }else{
            $p1=$l2;
            $p2=$l1;
        }
        
        var_dump($this->getLength($l1),$this->getLength($l2));
    
        $jin=0;
        while(!$p1 && !$p2){
            $sum = $p1->val+$p2->val;
            $jin=intval($sum/10);
            $left=intval($sum%10);
            $p1->val=$left;
            $p1=$p1->next;
            $p2=$p2->next;
            $p1->val +=$jin;
        }
        //处理最大位还有进制的问题
        if($jin!=0 && !$p1){
            $more_node = new ListNode($jin);
            $p1->next=$more_node;
        }
        
        return $is_l1?$l1:$l2;
    }
    
    /**
     * 二进制求和
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $jin_val=2;
        
        $a_i=strlen($a)-1;
        $b_j=strlen($b)-1;
        
        $jin=0;
        $result=[];
        // 1 111
        while ($a_i >= 0 || $b_j >=0 )
        {
            $a_i_val= $a_i<0 ? 0 : $a[$a_i]-'0';
            $b_j_val= $b_j<0 ? 0 : $b[$b_j]-'0';
            $num=$a_i_val+$b_j_val+$jin;
            array_push($result,intval($num%$jin_val));
            $jin=intval($num/$jin_val);
            $a_i--;
            $b_j--;
        }
        
        if ($jin!=0){
            array_push($result,1);
        }
        
        return implode(array_reverse($result));
    }
    
    /**
     * 给定一个 haystack 字符串和一个 needle 字符串，
     * 在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。
     * 如果不存在，则返回  -1。若needle为空字符串，则返回0
     * @param String $haystack
     * @param String $needle
     * @return Integer 位序
     */
    function strStr($haystack, $needle):int {
        if ($needle==''){
            return 0;
        }
        $i=0;
        $j=0;
        while ($i<strlen($haystack) && $j<strlen($needle)){
            if ($haystack[$i]==$needle[$j]) {
                $i++;
                $j++;
            }else{
                $i=$i-$j+1;
                $j=0;
            }
        }
        if ($j>=strlen($needle)){
            return $i-$j+1;
        }
        return -1;
    }
    
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if (count($strs)==0 || empty($strs[0])){
            return '';
        }
        $long=$strs[0];
        
        // flower flow flew
        for ($j=1;$j<count($strs);$j++){
            for ($i = 0; $i < strlen($long); $i++) {
                if ($long[$i]!=$strs[$j][$i]){
                    $long=substr($long,0,$i);
                    break;
                }
            }
        }
        
        return $long;
    }
    
    /**
     * 寻找数组里的中心节点
     * @param $nums
     * @return int
     */
    function pivotIndex($nums) {
        $nums_length=count($nums);
        if ($nums_length<3){
            return -1;
        }
        
        $total_sum=array_sum($nums);
        $left=0;
        $nums[-1]=0;
        for ($i=-1;$i<$nums_length/2+1;$i++){
            $left+=$nums[$i];
            if (2*$left+$nums[$i+1]==$total_sum){
                return $i+1;
            }
        }
        
        return -1;
    }
    
    /**
     * 求数组中最大值是否是其他数值的2倍
     * @param $nums
     * @return int
     */
    function dominantIndex($nums) {
        
        $nums_length=count($nums);
        $max=$second=PHP_INT_MIN;
        $pos=-1;
        for($i=0;$i<$nums_length;++$i){
           if ($max<$nums[$i]){
               $second=$max;
               $max=$nums[$i];
               $pos=$i;
           }elseif ($nums[$i]>$second){
               $second=$nums[$i];
           }
        }
        
        return $max>=2*$second?$pos:-1;
    }
    
    /**
     * 有M*N的数组，求他们的对角线遍历
     * i,j
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function findDiagonalOrder($matrix) {
        if (!is_array($matrix) || !isset($matrix[0][0])){
            return [];
        }
        $i=0;
        $j=0;
        $director=[0=>[-1,1],1=>[1,-1]];
        //遍历右上角
        $d=0;
        $result=[];
        $m=count($matrix) ;
        $n=count($matrix[0]);
        $k=0;
        while ($k++ != $m*$n ){
            $result[]=$matrix[$i][$j];
            $director_d=$director[$d];
            $need_change_d=false;
            //左上角移动
            if ($d==0){
                if ($j==$n-1){
                    //到达最右上角
                    $i++;
                    $need_change_d=true;
                }elseif ($i==0){
                    //到达顶部
                    $j++;
                    $need_change_d=true;
                }
            }else{
                //右下角移动
                if ($i==$m-1){
                    $j++;
                    $need_change_d=true;
                }elseif ($j==0){
                    $i++;
                    $need_change_d=true;
                }
            }
            
            if ($need_change_d){
                $d=($d+1)%2;
            }else{
                $i+=$director_d[0];
                $j+=$director_d[1];
            }
        }
        return $result;
        
    }
    
    function spiralOrder($matrix) {
        if (!is_array($matrix) || !isset($matrix[0][0])){
            return [];
        }
        $i=0;
        $j=0;
        //顺时间旋转 左 下 右 上
        $director=[0=>[0,1],1=>[1,0],2=>[0,-1],3=>[-1,0]];
        //初始从左边开始
        $d=0;
        $result=[];
        $m=count($matrix) ;
        $n=count($matrix[0]);
        $k=0;
        $r=0;
        while ($k++ != $m*$n ) {
            $need_change_d = FALSE;
            $result[] = $matrix[$i][$j];
            $director_d = $director[$d];
            switch ($d){
                case 0:
                    if ($j==$n-1-$r){
                        $i+=1;
                        $need_change_d=true;
                    }
                    break;
                case 1:
                    if ($i==$m-1-$r){
                        $j-=1;
                        $need_change_d=true;
                    }
                    break;
                case 2:
                    if ($j==$r){
                        $i-=1;
                        $need_change_d=true;
                    }
                    break;
                case 3:
                    //当向上遍历到第r层的时候，需要改变方向
                    if ($i==$r+1){
                        $r=$r+1;
                        $j+=1;
                        $need_change_d=true;
                    }
                    break;
            }
            if ($need_change_d){
                $d=($d+1)%4;
            }else{
                $i+=$director_d[0];
                $j+=$director_d[1];
            }
        }
        return $result;
        
    }
}