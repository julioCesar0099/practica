<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('convocatoria_id');
            $table->string('item_nombre');
            $table->string('estado');
            $table->string('observacion')->nullable();
            $table->unsignedInteger('persona_id');
            $table->unsignedInteger('nota_meritos')->nullable();
            $table->unsignedInteger('nota_conocimientos')->nullable();
            $table->unsignedInteger('nota_final')->nullable();

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
        Schema::dropIfExists('postulantes');
    }
}
