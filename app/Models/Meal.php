<?php

namespace App\Models;

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
 */
class Meal extends Model
{
    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(MealProduct::class);
    }
}
