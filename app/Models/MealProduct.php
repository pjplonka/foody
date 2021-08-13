<?php

namespace App\Models;

use App\Traits\WeighedProduct;
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
    use WeighedProduct;

    protected $guarded = ['id'];

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}
