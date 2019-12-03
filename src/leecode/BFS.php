<?php


namespace Leecode;

/**
 * 广度优先搜索
 *  广度优先搜索通常和队列有关，通常用于寻找最短路径，属于盲目搜索法
 * Class BFS
 * @package Leecode
 */
class BFS
{
    /**
     * 岛屿问题:
     * 给定一个由 '1'（陆地）和 '0'（水）组成的的二维网格，计算岛屿的数量。一个岛被水包围，并且它是通过水平方向或垂直方向上相邻的陆地连接而成的。你可以假设网格的四个边均被水包围。
     * 例如:
     * 输入:
        11110
        11010
        11000
        00000

     * 输出: 1
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        if ($grid==null || count($grid)==0 || $grid[0]==null || count($grid[0])==0 ){
            return 0;
        }
        $num=0;
        for ($i=0;$i<count($grid);++$i){
            for ($j=0;$j<count($grid[$i]);++$j){
                if ($grid[$i][$j]==1){
                    $num++;
                    $this->infect($i,$j,$grid);
                }
            }
        }
        return $num;
    }
    
    private function infect(int $i, int $j, array &$grid)
    {
        if ($i<0 || $i>=count($grid) ||
            $j<0 || $j>=count($grid[$i])||
            $grid[$i][$j]!=1
        ){
            return ;
        }
        $grid[$i][$j]=0;
        $this->infect($i-1,$j,$grid);
        $this->infect($i,$j+1,$grid);
        $this->infect($i+1,$j,$grid);
        $this->infect($i,$j-1,$grid);
    }
    /**
     * @param String[] $deadends
     * @param String $target
     * @return Integer
     */
    function openLock($deadends, $target) {
        $initial_string="0000";
        $directions=[
            [0,0,0,1],
            [0,0,1,0],
            [0,1,0,0],
            [1,0,0,0],
            [0,0,0,-1],
            [0,0,-1,0],
            [0,-1,0,0],
            [-1,0,0,0],
        ];
        
        //如果初始值便在死锁里面，那无法解锁
        if (in_array($initial_string,$deadends)){
            return -1;
        }
        //如果目标是初始值，则返回0
        if ($target==$initial_string){
            return 0;
        }
    
        $is_visited=[];
        foreach ($deadends as $dead_end){
            $is_visited[$dead_end]=1;
        }
        
        $step=0;
        $queue=[$initial_string];
        while (!empty($queue)){
            $step+=1;
            $size=count($queue);
            for ($j=0;$j<$size;$j++){
                $cur=array_shift($queue);
                if ($cur==$target){
                    return $step;
                }
                
                for ($j=0;$j<4;$j++){
                    $i=intval($cur[$j]);
                    $cur[$j] = strval(($i + 1) % 10);//数字-1。余数运算可防止节点为0、9时出现-1、10的情况
                    $visited=$is_visited[$cur]??0;
                    echo $cur.':'.$visited.' ';
                    if ($visited==0){
                        array_unshift($queue,$cur);
                        $is_visited[$cur]=1;
                    }
//                    $cur[$j] = strval($i);
                }
            }
            
        }
        return -1;
    }
    
    private function parseToInteger(String $deadend)
    {
        $a=intval(substr($deadend,0,1));
        $b=intval(substr($deadend,1,1));
        $c=intval(substr($deadend,2,1));
        $d=intval(substr($deadend,3,1));
        return [$a,$b,$c,$d];
    }
    
    function numSquares($n) {
        if ($n<=0){
            return 0;
        }
        $queue=[$n];
        $count=0;
        $is_visited=[];
        while (!empty($queue)){
            $size=count($queue);
            while ($size--){
                $cur=array_shift($queue);
                for ($j=intval(sqrt($cur));$j>0;$j--) {
                    if ($cur==$j*$j) {
                        return $count+1;
                    }else {
                        $visited=$is_visited[$cur-$j*$j]??0;
                        if ($visited==0){
                            array_push($queue,$cur-$j*$j);
                            $is_visited[$cur-$j*$j]=1;
                        }
                        
                    }
                }
            }
            $count++;
        }
        return 0;
    }
    
    
}