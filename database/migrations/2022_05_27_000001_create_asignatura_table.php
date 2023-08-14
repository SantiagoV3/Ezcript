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
        Schema::create('asignatura', function (Blueprint $table) {
            $table->id();
            $table->string('asg_nombre');
            $table->timestamps();
        });

        // Insertar datos por defecto
        DB::table('asignatura')->insert(
            [
                ['asg_nombre' => "Introducción a la Programación"],
                ['asg_nombre' => "Programación Orientada a Objetos"],
                ['asg_nombre' => "Ingenieria de Software"]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura');
    }
};
