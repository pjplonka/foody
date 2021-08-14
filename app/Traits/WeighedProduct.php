<?php declare(strict_types=1);

namespace App\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait WeighedProduct
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function calories(): float
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

    public function sugar(): float
    {
        return $this->product->sugar * ($this->weight / 100);
    }

    public function fiber(): float
    {
        return $this->product->fiber * ($this->weight / 100);
    }

    public function fat(): float
    {
        return $this->product->fat * ($this->weight / 100);
    }
}
