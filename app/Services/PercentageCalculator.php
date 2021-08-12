<?php declare(strict_types=1);

namespace App\Services;

class PercentageCalculator
{
    public function rounded($max, $part)
    {
        return round(($part / $max) * 100);
    }
}
