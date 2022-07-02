<?php declare(strict_types=1);

namespace App\Models\Day;

use App\Models\Day;
use App\Models\MealProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Meal
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property Day $day
 * @property Product[]|Collection $products
 * @method static Meal create(array $data)
 * @mixin Builder
 */
class Meal extends Model
{
    protected $table = 'day_meals';

    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function calories(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->calories();
        }));
    }

    public function protein(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->protein();
        }), 1);
    }

    public function carbohydrates(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->carbohydrates();
        }), 1);
    }

    public function sugar(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->sugar();
        }), 1);
    }

    public function fiber(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->fiber();
        }), 1);
    }

    public function fat(): float
    {
        return round($this->products->sum(function (Product $product) {
            return $product->fat();
        }), 1);
    }

    public function saturatedFat(): float
    {
        return round($this->products->sum(function(Product $product) {
            return $product->saturatedFat();
        }), 1);
    }

    public function sodium(): float
    {
        return round($this->products->sum(function(Product $product) {
            return $product->sodium();
        }), 1);
    }
}
