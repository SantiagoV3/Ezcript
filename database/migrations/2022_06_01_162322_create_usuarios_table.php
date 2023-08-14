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
        Schema::create('usuario', function (Blueprint $table) {

            $table->Id('pef_id');

            $table->string('pef_foto')->default('uploads/foto-perfil-por-defecto.png');
            $table->string('pef_rut');
            $table->string('pef_nombre');
            $table->string('pef_correo');
            $table->string('pef_telefono')->nullable();
            //$table->string('pef_contrasena');

            $table->foreignId('rol_id')->references('rol_id')->on('rol');
            $table->foreignId('cur_id')->nullable()->references('id')->on('curso')->constrained(); // primer cambio
            $table->foreignId('usr_id')->references('id')->on('users');

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
        Schema::dropIfExists('usuario');
    }
};
