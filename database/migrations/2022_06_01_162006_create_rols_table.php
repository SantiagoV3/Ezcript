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
        Schema::create('rol', function (Blueprint $table) {
            $table->id('rol_id');
            
            $table->string('rol_nombre');
            $table->string('rol_descripcion');

            $table->timestamps();
        });

        // Insertando filas por defecto
        DB::table('rol')->insert(
            [
                [
                    'rol_id' => 1,
                    'rol_nombre' => 'Alumno',
                    'rol_descripcion' => ''
                ],
                [
                    'rol_id' => 2,
                    'rol_nombre' => 'Profesor',
                    'rol_descripcion' => ''
                ],
                [
                    'rol_id' => 3,
                    'rol_nombre' => 'Administrador',
                    'rol_descripcion' => ''
                ],
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
        Schema::dropIfExists('rol');
    }
};
