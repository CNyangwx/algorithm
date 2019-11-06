<?php
require "vendor/autoload.php";
use MyAlgorithm\Stack\Maze;
// use MyAlgorithm\Stack\Pratices;
// $pratices = new Pratices();

// $str = $pratices->conversion(100, 2);
// echo $str;
//
//小游戏
// while (!feof(STDIN)) {
// 	$line = fgets(STDIN);
// 	if (strcmp($line, "bye") == 0) {
// 		break;
// 	}
// 	echo $pratices->lineEdit($line);
// 	$pratices->getStack()->clearStack();
// }

echo '迷宫游戏';
$maze = new Maze();
$maze->solve();