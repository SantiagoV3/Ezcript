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
        Schema::create('lenguaje', function (Blueprint $table) {
            $table->id();
            $table->string('lgj_nombre');
            $table->string('lgj_descripcion')->nullable();
            $table->timestamps();
        });

        DB::table('lenguaje')->insert(
            [
                'lgj_nombre' => "Pseudocódigo", 
                'lgj_descripcion' => 'Lenguaje utilizado para 
                representar las instrucciones que ejecuta un programa de una forma comprensible 
                para los humanos.'
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
        Schema::dropIfExists('lenguaje');
    }
};
