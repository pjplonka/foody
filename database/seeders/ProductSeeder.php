<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ryż biały (surowy)',
            'protein' => 7.4,
            'fat' => 0,
            'carbohydrates' => 0,
            'sugar' => 0,
            'fiber' => 0,
        ]);
    }
}
