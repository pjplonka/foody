<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Meal
 * @package App\Models
 * @property int $id
 * @property int $product_id
 * @property int $meal_id
 * @property int $weight
 * @property Meal $meal
 * @property Product $product
 * @method static Meal create(array $data)
 */
class MealProduct extends Model
{
    protected $guarded = ['id'];

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function calories(): int
    {
        return $this->product->calories() * ($this->weight / 100);
    }

    public function protein(): float
    {
        return $this->product->protein * ($this->weight / 100);
    }

    public function carbohydrates(): float
    {
        return $this->product->carbohydrates * ($this->weight / 100);
    }

    public function fat(): float
    {
        return $this->product->fat * ($this->weight / 100);
    }
}
