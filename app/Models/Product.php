<?php

namespace App\Models;

use App\CaloriesCalculator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $protein
 * @property int $fat
 * @property int $carbohydrates
 * @method static Product create(array $data)
 */
class Product extends Model
{
    protected $guarded = ['id'];

    public function calories(): int
    {
        return CaloriesCalculator::calculate($this->protein, $this->carbohydrates, $this->fat);
    }
}
