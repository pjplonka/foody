<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public $products = [
        ['Ryż biały (surowy)', 7.4, 0, 79, 0, 0],
        ['Filet z piersi z indyka bez skóry (surowy)', 22, 2, 0, 0, 0],
    ];

    public function run(): void
    {
        foreach ($this->products as $product) {
            DB::table('products')->insert([
                'name' => $product[0],
                'protein' => $product[1],
                'fat' => $product[2],
                'carbohydrates' => $product[3],
                'sugar' => $product[4],
                'fiber' => $product[5],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
