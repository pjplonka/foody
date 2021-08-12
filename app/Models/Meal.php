<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Meal
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property MealProduct[]|Collection $products
 * @method static Meal create(array $data)
 * @mixin Builder
 */
class Meal extends Model
{
    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(MealProduct::class);
    }

    public function calories(): float
    {
        return $this->products->sum(function($product) {
            return $product->calories();
        });
    }

    public function protein(): float
    {
        return $this->products->sum(function($product) {
            return $product->protein();
        });
    }

    public function carbohydrates(): float
    {
        return $this->products->sum(function($product) {
            return $product->carbohydrates();
        });
    }

    public function fat(): float
    {
        return $this->products->sum(function($product) {
            return $product->fat();
        });
    }
}
