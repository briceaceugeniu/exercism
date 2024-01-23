<?php

class PizzaPi
{
    const SAUCE_PER_PIZZA = 125;
    const SLICES_PER_PIZZA = 8;
    const PI = 3.14159;

    public function calculateDoughRequirement(int $pizzas, int $persons) : int
    {
        return $pizzas * (($persons * 20) + 200);
    }

    public function calculateSauceRequirement(int $pizzas, int $sauceCanVolume) : float
    {
        return $pizzas * self::SAUCE_PER_PIZZA / $sauceCanVolume;
    }

    public function calculateCheeseCubeCoverage(int $cheese_dimension, float $thickness, int $diameter) : int
    {
        return (int) (pow($cheese_dimension, 3) / ($thickness * self::PI * $diameter));
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends)
    {
        return $pizzas * self::SLICES_PER_PIZZA % $friends;
    }
}
