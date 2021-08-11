<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyGoalsTable extends Migration
{
    public function up(): void
    {
        Schema::create('my_goals', function (Blueprint $table) {
            $table->id();
            $table->integer('protein');
            $table->integer('fat');
            $table->integer('carbohydrates');
            $table->integer('water');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('my_goals');
    }
}
