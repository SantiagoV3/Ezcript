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
        Schema::create('curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asg_id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('per_id');
            $table->string('cur_nombre');
            $table->string('cur_profesor');
            $table->string('cur_descripcion')->nullable();
            $table->foreign('asg_id')->references('id')->on('asignatura');
            $table->foreign('car_id')->references('id')->on('carrera');
            $table->foreign('per_id')->references('id')->on('periodo');
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
        Schema::dropIfExists('curso');
    }
};
