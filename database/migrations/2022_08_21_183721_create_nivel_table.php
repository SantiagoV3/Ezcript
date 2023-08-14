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
        Schema::create('nivel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lgj_id');
            $table->unsignedBigInteger('cur_id');
            $table->string('niv_nombre');
            $table->boolean('niv_activo')->default(true);
            $table->foreign('cur_id')->references('id')->on('curso');
            $table->foreign('lgj_id')->references('id')->on('lenguaje');
            $table->timestamps();
        });

        DB::table()->insert([
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_1_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_2_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_3_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_4_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_5_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_6_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_7_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_8_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_9_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_10_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_11_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_12_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_13_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_14_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_15_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_16_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_17_tutorial',
                '1'
            ],
            [
                'lgj_id' => '1',
                'crur_id' => '1',
                'niv_nombre' => 'nivel_18_tutorial',
                '1'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nivel');
    }
};
