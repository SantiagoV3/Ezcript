<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(){
        Schema::create('ezc_problemas', function (Blueprint $table) {
            $table->id('PBM_ID');
            $table->string('PEF_ID');
            $table->string('PBM_ASUNTO');
            $table->string('PBM_DESCRIPCION');
        });
    }

    public function down(){
        Schema::dropIfExists('ezc_problemas');
    }
};
