<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('calories')->nullable();
            $table->float('protein')->nullable();
            $table->float('fat')->nullable();
            $table->float('saturated_fat')->nullable();
            $table->float('carbohydrates')->nullable();
            $table->float('sugar')->nullable();
            $table->float('fiber')->nullable();
            $table->float('sodium')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
