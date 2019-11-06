<?php

namespace MyAlgorithm\Stack;

use MyAlgorithm\Stack\SqStack;
use MyAlgorithm\Status;

/**
 * 迷宫类
 */
class Maze {
	//初始化N*M的迷宫，默认为3*3
	private $m = 3;
	private $n = 4;
	private $maze = [
		[0, 1, 1, 1],
		[0, 1, 0, 0],
		[0, 0, 0, 1],
	];
	private $begin_x = 0;
	private $begin_y = 0;
	private $end_x = 1;
	private $end_y = 3;

	private $stack;

    /**
     * 初始化堆栈
     */
	public function __construct() {
		$this->stack = new SqStack();
	}

	//验证是否合法
	public function charge($current) {
		//有越界的可能
		$charge = ($current->d == 'S' &&
			($current->x+1 >= $this->m )
		);
		$charge = $charge || ($current->d == 'E' &&
			($current->y+1 >= $this->n)
		);
		$charge = $charge || ($current->d == 'W' &&
			($current->y-1 < 0 )
		);
		$charge = $charge || ($current->d == 'N' &&
			($current->x-1 < 0)
		);
		if ($charge) {
			return Status::ERROR;
		}
		return Status::OK;
	}

	//按顺时间方向修改方向
	public function changeD($current) {
		if ($this->charge($current) == Status::ERROR) {
			return Status::ERROR;
		}

		//东
		if ($current->d == 'E') {
			$current->x = $current->x;
			$current->y = $current->y+1;
			//南
		} else if ($current->d == 'S') {
			$current->x = $current->x+1;
			$current->y = $current->y;
			//西
		} else if ($current->d == 'W') {
			$current->x = $current->x;
			$current->y = $current->y-1;
			//北
		} else if ($current->d == 'N') {
			$current->x = $current->x-1;
			$current->y = $current->y;
		}
		return Status::OK;
	}

	/**
	 * 探索迷宫，使用堆栈保存路径
	 * @return [type] [description]
	 */
	public function solve() {
		$direction = ['E', 'S', 'W', 'N'];
        $direction_arrow = ['E'=>'→', 'S'=>'↓', 'W'=>'←','N'=> '↑'];

		$flag = true;
		//初始化起点
		$current = new MazeNode($this->begin_x, $this->begin_y);
		//将起点入栈
		$this->stack->push($current);
		//把起点标志为出发

        while ($current->x<$this->m && $current->y<$this->n){
		    $startX=$current->x;
		    $startY=$current->y;
		    if ($startX==$this->end_x && $startY==$this->end_y) {
                echo '已经找到路径了' . PHP_EOL;
                break;
            }
		    $flag=false;
		    for ($k=0;$k<4;$k++){
		        $current->d=$direction[$k];
                if ($this->changeD($current)==Status::OK &&
                    0==$this->maze[$current->x][$current->y]
                ){
                    $new_node = new MazeNode($current->x,$current->y,$current->d);
                    $this->stack->push($new_node);
                    $this->maze[$current->x][$current->y]=2;
                    $flag=true;
                    break;
                }else{
                    $current->x=$startX;
                    $current->y=$startY;
                }
            }

		    if (!$flag){
		        $current=$this->stack->pop();
		        $this->maze[$startX][$startY]=-1;
            }
        }

		echo "路径为:".PHP_EOL;
        $this->printStack();
        $this->printMaze();

		return NULL;
	}

    /**
     * 打印迷宫
     */
    public function printMaze()
    {
        for ($i=0;$i<$this->m;$i++){
            for ($j=0;$j<$this->n;$j++){
                echo $this->maze[$i][$j]."\t";
            }
            echo PHP_EOL;
        }
    }

    /**
     * 打印路径
     */
    public function printStack()
    {
        while (!$this->stack->stackEmpty()){
            echo $this->stack->pop();
        }

    }

}