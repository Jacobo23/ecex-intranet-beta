<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('numero_de_parte');
            $table->bigInteger('customer_id');
            $table->string('um');
            $table->decimal('peso_unitario', 8, 2);
            $table->string('descripcion_ing');
            $table->string('descripcion_esp');
            $table->string('pais_de_origen');
            $table->string('fraccion');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('imex');
            $table->string('imagen');
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
        Schema::dropIfExists('part_numbers');
    }
}
