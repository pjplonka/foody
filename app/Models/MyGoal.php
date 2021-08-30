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
 * @property int $sugar
 * @property int $fiber
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
            'sugar' => 0,
            'fiber' => 0,
            'water' => 0,
        ]);
    }

    public function caloriesPerDay(): float
    {
        return CaloriesCalculator::calculate($this->protein, $this->carbohydrates, $this->fat, $this->fiber);
    }

    public function proteinCaloriesPerDay(): float
    {
        return $this->protein * 4;
    }

    public function carbsCaloriesPerDay(): float
    {
        return $this->carbohydrates * 4;
    }

    public function fiberCaloriesPerDay(): float
    {
        return $this->fiber * 4;
    }

    public function fatCaloriesPerDay(): float
    {
        return $this->fat * 9;
    }
}
