<?php


namespace MyAlgorithm\Arrays;


class Node
{
    /**
     * @var int X轴坐标
     */
    private $x_coordinate;
    /**
     * @var int Y轴坐标
     */
    private $y_coordinate;
    /**
     * @var mixed 数值
     */
    private $value;
    
    public function __construct($x_coordinate,$y_coordinate,$value)
    {
        $this->setXCoordinate($x_coordinate);
        $this->setYCoordinate($y_coordinate);
        $this->setValue($value);
    }
    
    /**
     * @return int
     */
    public function getXCoordinate(): int
    {
        return $this->x_coordinate;
    }
    
    /**
     * @param int $x_coordinate
     */
    private function setXCoordinate(int $x_coordinate): void
    {
        $this->x_coordinate = $x_coordinate;
    }
    
    /**
     * @return int
     */
    public function getYCoordinate(): int
    {
        return $this->y_coordinate;
    }
    
    /**
     * @param int $y_coordinate
     */
    private function setYCoordinate(int $y_coordinate): void
    {
        $this->y_coordinate = $y_coordinate;
    }
    
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * @param mixed $value
     */
    private function setValue($value): void
    {
        $this->value = $value;
    }
}