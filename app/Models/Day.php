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

    public function calories(): float
    {
        return $this->meals->sum(function (Meal $meal) {
            return $meal->calories();
        });
    }

    public function protein(): float
    {
        return $this->meals->sum(function (Meal $meal) {
            return $meal->protein();
        });
    }

    public function carbohydrates(): float
    {
        return $this->meals->sum(function (Meal $meal) {
            return $meal->carbohydrates();
        });
    }

    public function fat(): float
    {
        return $this->meals->sum(function (Meal $meal) {
            return $meal->fat();
        });
    }
}
