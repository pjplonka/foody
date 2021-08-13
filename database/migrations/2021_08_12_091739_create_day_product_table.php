<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayProductTable extends Migration
{
    public function up(): void
    {
        Schema::create('day_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_product');
    }
}
