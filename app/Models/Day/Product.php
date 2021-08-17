<?php declare(strict_types=1);

namespace App\Models\Day;

use App\Traits\WeighedProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property Meal $meal
 * @method static Product create(array $data)
 * @mixin Builder
 */
class Product extends Model
{
    use WeighedProduct;

    protected $table = 'day_meal_products';

    protected $guarded = ['id'];

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}
