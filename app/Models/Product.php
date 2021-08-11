<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $protein
 * @property int $fat
 * @property int $carbohydrates
 * @method static Product create(array $data)
 */
class Product extends Model
{
    protected $guarded = ['id'];

    public function calories(): int
    {
        return ($this->protein * 4) + ($this->carbohydrates * 4) + ($this->fat * 9);
    }
}
