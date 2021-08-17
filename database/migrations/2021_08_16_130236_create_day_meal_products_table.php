<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayMealProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('day_meal_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('meal_id')->constrained('day_meals');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_meal_products');
    }
}
