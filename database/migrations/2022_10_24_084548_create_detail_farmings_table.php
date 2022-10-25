<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_farmings', function (Blueprint $table) {
            $table->id('detailFarming_id');
            $table->integer('farming_id');
            $table->integer('Recipes_id');
            $table->date('food_date');
            $table->integer('amount');
            $table->integer('dead_number');
            $table->date('dead_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_farmings');
    }
};
