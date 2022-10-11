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
        Schema::create('fish_stocks', function (Blueprint $table) {
            $table->id('fishStock_id');
            $table->integer('orderfish_details_id');
            $table->integer('quantity');
            $table->date('date_exp');
            $table->date('date_import');
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
        Schema::dropIfExists('fish_stocks');
    }
};
