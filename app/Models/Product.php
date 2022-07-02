<?php

namespace App\Models;

use App\CaloriesCalculator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property float $calories
 * @property float $protein
 * @property float $fat
 * @property float $saturated_fat
 * @property float $carbohydrates
 * @property float $sugar
 * @property float $fiber
 * @property float $sodium
 * @method static Product create(array $data)
 * @mixin Builder
 */
class Product extends Model
{
    protected $guarded = ['id'];

//    public function calories(): int
//    {
//        return CaloriesCalculator::calculate($this->protein, $this->carbohydrates, $this->fat);
//    }
}
