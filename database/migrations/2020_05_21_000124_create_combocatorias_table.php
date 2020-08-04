<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combocatorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->mediumText('descripcion')->nullable();;
            $table->string('tipo');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->string('estado');
            $table->unsignedInteger('tabla_id')->nullable();
            $table->unsignedInteger('facultad_id')->nullable();
            $table->unsignedInteger('notas')->nullable();
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
        Schema::dropIfExists('combocatorias');
    }
}
