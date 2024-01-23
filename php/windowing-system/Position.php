<?php
class Position
{
    public $x;
    public $y;

    function __construct(int $y, int $x)
    {
        $this->x = $x;
        $this->y = $y;
    }
}