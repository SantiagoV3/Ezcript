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
        Schema::create('alumnos', function (Blueprint $table) {
            //$table->id();
            $table->engine = 'InnoDB';

            $table->id('alu_id');
            $table->string('alu_rut');
            $table->string('alu_nombre');
            $table->string('alu_apellido_p');
            $table->string('alu_apellido_m');
            $table->string('alu_correo');
            $table->string('alu_foto');
            $table->string('alu_pagina_web');
            $table->string('alu_desc');
            $table->string('alu_cont');

            $table->unsignedBigInteger('cur_id');
            $table->unsignedBigInteger('rol_id');

            $table->timestamps();

            $table->foreign('cur_id')->references('id')->on('curso');
            $table->foreign('rol_id')->references('rol_id')->on('rol');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
