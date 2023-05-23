<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratorio_4', function (Blueprint $table) {
            $table->string('codigo_producto')->primary();
            $table->string('nombre_reactivo');
            $table->string('foto');
            $table->string('ficha_seguridad');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('laboratorio_4');
    }
};
