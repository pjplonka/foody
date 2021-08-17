<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayMealsTable extends Migration
{
    public function up(): void
    {
        Schema::create('day_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_meals');
    }
}
