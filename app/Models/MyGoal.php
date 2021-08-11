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

    public function stats(): array
    {
        return [
            'proteinInPercentage' => CaloriesCalculator::proteinInPercentage($this->caloriesPerDay(), $this->protein),
            'carbsInPercentage' => CaloriesCalculator::carbsInPercentage($this->caloriesPerDay(), $this->carbohydrates),
            'fatInPercentage' => CaloriesCalculator::fatInPercentage($this->caloriesPerDay(), $this->fat)
        ];
    }

    public function proteinInPercentage(float $protein): int
    {
        return round((($protein * 4) / $this->caloriesPerDay()) * 100);
    }

    public function carbsInPercentage(float $carbs): int
    {
        return round((($carbs * 4) / $this->caloriesPerDay()) * 100);
    }

    public function fatInPercentage(float $fat): int
    {
        return round((($fat * 9) / $this->caloriesPerDay()) * 100);
    }
}
