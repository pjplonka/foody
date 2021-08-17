<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class DayMeal
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property MealProduct[]|Collection $products
 * @method static DayMeal create(array $data)
 * @mixin Builder
 */
class DayMeal extends Model
{
    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(MealProduct::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function calories(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->calories();
        }));
    }

    public function protein(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->protein();
        }), 1);
    }

    public function carbohydrates(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->carbohydrates();
        }), 1);
    }

    public function sugar(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->sugar();
        }), 1);
    }

    public function fiber(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->fiber();
        }), 1);
    }

    public function fat(): float
    {
        return round($this->products->sum(function (MealProduct $product) {
            return $product->fat();
        }), 1);
    }
}
