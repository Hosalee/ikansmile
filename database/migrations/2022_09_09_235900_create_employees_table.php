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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('emp_fristname');
            $table->string('emp_lastname');
            $table->string('sex');
            $table->string('Address');
            $table->string('Email')->nullable();
            $table->string('tell');
            $table->text('profile');
            $table->string('Username');
            $table->string('Password');
            $table->string('position');
            


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
        Schema::dropIfExists('employees');
    }
};
