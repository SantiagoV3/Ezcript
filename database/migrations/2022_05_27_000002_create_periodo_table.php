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
        Schema::create('periodo', function (Blueprint $table) {
            $table->id();
            $table->string('per_anio');
            $table->string('per_semestre');
            $table->timestamps();
        });


        // Insertar datos por defecto
        DB::table('periodo')->insert(
            [
                ['per_anio' => "2023", 'per_semestre' => "2"],
                ['per_anio' => "2023", 'per_semestre' => "1"]
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
        Schema::dropIfExists('periodo');
    }
};
