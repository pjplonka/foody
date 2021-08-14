<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * Class Day
 * @package App\Models
 * @property int $id
 * @property Carbon $date
 * @property Meal[]|Collection $meals
 * @property Product[]|Collection $products
 * @method static Day create(array $data)
 * @mixin Builder
 */
class Day extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['date' => 'datetime'];

    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->using(DayProduct::class)->withPivot('id', 'weight');
    }

    public function calories(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->calories();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->calories();
        });

        return $fromMeals + $fromProducts;
    }

    public function protein(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->protein();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->protein();
        });

        return $fromMeals + $fromProducts;
    }

    public function carbohydrates(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->carbohydrates();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->carbohydrates();
        });

        return $fromMeals + $fromProducts;
    }

    public function sugar(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->sugar();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->sugar();
        });

        return $fromMeals + $fromProducts;
    }

    public function fiber(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->fiber();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->fiber();
        });

        return $fromMeals + $fromProducts;
    }

    public function fat(): float
    {
        $fromMeals = $this->meals->sum(function (Meal $meal) {
            return $meal->fat();
        });

        $fromProducts = $this->products->sum(function (Product $product) {
            return $product->pivot->fat();
        });

        return $fromMeals + $fromProducts;
    }
}
