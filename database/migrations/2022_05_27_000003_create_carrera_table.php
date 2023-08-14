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
        Schema::create('carrera', function (Blueprint $table) {
            $table->id();
            $table->string('car_nombre');
            $table->timestamps();
        });

        DB::table('carrera')->insert(
            [
                ['car_nombre' => "Ingeniería Civíl Informática"],
                ['car_nombre' => "Ingenieria en Ejecución y Computación en Informatica"],
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
        Schema::dropIfExists('carrera');
    }
};
