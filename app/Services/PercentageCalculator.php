<?php declare(strict_types=1);

namespace App\Services;

class PercentageCalculator
{
    public function rounded($max, $part)
    {
        echo '<pre>' , var_dump($max, $part) , '</pre>'; die;
        
        if ($max === 0 || $max === '0') {
            return 0;
        }

        return round(($part / $max) * 100);
    }
}
