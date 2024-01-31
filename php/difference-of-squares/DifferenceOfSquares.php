<?php

declare(strict_types=1);

function squareOfSum(int $max): int
{
    $sum = 0;
    for ($i = 1; $i <= $max; $i++) {
        $sum += $i;
    }
    return pow($sum, 2);
}

function sumOfSquares(int $max): int
{
    $sum = 0;
    for ($i = 1; $i <= $max; $i++) {
        $sum += pow($i, 2);
    }
    return $sum;
}

function difference(int $max): int
{
    return squareOfSum($max) - sumOfSquares($max);
}
