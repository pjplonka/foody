<?php

namespace App\Models;

use App\Traits\WeighedProduct;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class DayProduct
 * @package App\Models
 * @property int $id
 * @property int $product_id
 * @property int $day_id
 * @property int $weight
 * @property Day $day
 * @property Product $product
 * @method static DayProduct create(array $data)
 */
class DayProduct extends Pivot
{
    use WeighedProduct;

    protected $guarded = ['id'];

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }
}
