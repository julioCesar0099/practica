<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemlabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemlabs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('combocatoria_id');
            $table->unsignedInteger('area_id');
            $table->Integer('cantidad_aux');
            $table->Integer('horas');
            $table->text('nombre');
            $table->text('codigo');
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
        Schema::dropIfExists('itemlabs');
    }
}
