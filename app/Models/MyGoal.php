<?php

namespace App\Models;

use App\CaloriesCalculator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MyGoal
 * @package App\Models
 * @property int $id
 * @property int $protein
 * @property int $fat
 * @property int $carbohydrates
 * @property int $water
 * @method static MyGoal create(array $data)
 */
class MyGoal extends Model
{
    protected $guarded = ['id'];

    public static function get(): self
    {
        $myGoal = self::first();

        if ($myGoal) {
            return $myGoal;
        }

        return self::create([
            'protein' => 0,
            'carbohydrates' => 0,
            'fat' => 0,
            'water' => 0,
        ]);
    }

    public function caloriesPerDay(): float
    {
        return CaloriesCalculator::calculate($this->protein, $this->carbohydrates, $this->fat);
    }
}
