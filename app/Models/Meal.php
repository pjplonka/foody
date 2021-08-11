<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Meal
 * @package App\Models
 * @property int $id
 * @property string $name
 * @method static Meal create(array $data)
 */
class Meal extends Model
{
    protected $guarded = ['id'];
}
