<?php

namespace MyAlgorithm\BiTree;

class BiTree {
	/**
	 * @var TreeNode
	 */
	private $root;

	public function createTree() {
		echo "请输入下个元素:";
		$handle = fopen("php://stdin", "r");
		$e = trim(fgets($handle));
		if ($e == "#") {
			$tree = null;
		} else {
			$tree = new TreeNode($e);
			$tree->left = $this->createTree();
			$tree->right = $this->createTree();
		}
		return $tree;
	}

	public function createTreeByStr(&$root, $str, $index) {
		if ($index <= strlen($str)) {
			$e = substr($str, $index++, 1);
			if ($e == "#") {
				$root = null;
			} else {
				$root = new TreeNode($e);
				$index = $this->createTreeByStr($root->left, $str, $index);
				$index = $this->createTreeByStr($root->right, $str, $index);
			}
		}
		return $index;
	}

	public function preTrasverTree($root) {
		$stack = [];
		$p = $root;
		$res = [];

		while ($p != null || !empty($stack)) {
			while ($p) {
				$res[] = $p->val;
				array_push($stack, $p);
				$p = $p->left;
			}
			$p = array_pop($stack);
			$p = $p->right;
		}
		return $res;
	}

	public function InTree(TreeNode $root) {
		$stack = [];
		$p = $root;
		$res = [];

		while ($p || !empty($stack)) {
			while ($p) {
				array_push($stack, $p);
				$p = $p->left;
			}
			$p = array_pop($stack);
			$res[] = $p->val;
			$p = $p->right;
		}
		return $res;
	}

	public function PostTree(TreeNode $root) {
		$stack = [];
		$p = $root;
		$res = [];
		array_push($stack, $p);

		while (!empty($stack)) {
			$node = array_pop($stack);
			array_unshift($res, $node->val);

			if ($node->left != null) {
				array_push($stack, $node->left);
			}

			if ($node->right != null) {
				array_push($stack, $node->right);
			}
		}
		return $res;
	}

	/**
	 * @param TreeNode $root
	 * @return Integer[][]
	 */
	function levelOrder($root) {
		//根节点入队列
		$queue = [];
		array_push($queue, $root);
		$res = [];
		$i = 0;
		if (empty($root)) {
			return $res;
		}

		while (!empty($queue)) {
			$len = count($queue);
			$level_nodes = [];

			while ($len-- > 0) {
				$p = array_shift($queue);
				$level_nodes[] = $p->val;
				if ($p->left != null) {
					array_push($queue, $p->left);
				}
				if ($p->right != null) {
					array_push($queue, $p->right);
				}
			}
			$res[] = $level_nodes;
		}

		return $res;
	}

	/**
	 * @param TreeNode $root
	 * @return Integer
	 */
	public function maxDepth($root) {
		$depth = 1;
		$answer = 0;
		$this->maxDepth2($root, $depth, $answer);
		return $answer;
	}

	protected function maxDepth2($root, $depth, &$answer) {
		// 1 return specific value for null node
		if ($root == null) {
			return 0;
		}

		if ($root->left == null && $root->right == null) {
			$answer = $depth > $answer ? $depth : $answer;
		}
		$this->maxDepth2($root->left, $depth + 1, $answer);
		$this->maxDepth2($root->right, $depth + 1, $answer);
	}
	
    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum) {
        $p=$root;
        $stack=[];
        $tree_sum=0;
        
        while ($p!=null){
            while ($p->left!=null){
                $tree_sum += intval($p->val);
                array_push($stack,$p->val);
                $p=$p->left;
            }
            //叶子节点
            if ($p->left==null && $p->right==null){
                $tree_sum += intval($p->val);
                if($tree_sum==$sum){
                    return true;
                }
            }
            $p=$p->right;
            if ($p!=null){
                $tree_sum += intval($p->val);
            }
        }
        return false;
    }

}