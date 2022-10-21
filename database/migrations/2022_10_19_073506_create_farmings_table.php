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
        Schema::create('farmings', function (Blueprint $table) {
            $table->id('farming_id');
            $table->integer('fish_id');
            $table->integer('cage_id');
            $table->integer('emp_id');
            $table->date('date_import');
            $table->integer('fishSize');
            $table->integer('fish_quantity');
            $table->integer('fish_amount_left');
            $table->integer('total_feeding_amount');
            $table->string('status');
            
           
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
        Schema::dropIfExists('farmings');
    }
};
