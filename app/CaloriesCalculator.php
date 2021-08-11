<?php declare(strict_types=1);

namespace App;

class CaloriesCalculator
{
    public static function calculate(float $protein, float $carbs, float $fat): float
    {
        return ($protein * 4) + ($carbs * 4) + ($fat * 9);
    }

    public static function proteinInPercentage(int $calories, float $protein): float
    {
        return round((($protein * 4) / $calories) * 100);
    }

    public static function carbsInPercentage(int $calories, float $carbs): float
    {
        return round((($carbs * 4) / $calories) * 100);
    }

    public static function fatInPercentage(int $calories, float $fat): float
    {
        return round((($fat * 9) / $calories) * 100);
    }
}
