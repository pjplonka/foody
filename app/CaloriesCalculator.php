<?php declare(strict_types=1);

namespace App;

class CaloriesCalculator
{
    public static function calculate(float $protein, float $carbs, float $fat, float $fiber): float
    {
        return ($protein * 4) + ($carbs * 4) + ($fat * 9) + ($fiber * 4);
    }
}

