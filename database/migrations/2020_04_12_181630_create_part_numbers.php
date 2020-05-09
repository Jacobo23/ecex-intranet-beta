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
            $table->string('descripcion_ing')->default("");
            $table->string('descripcion_esp')->default("");
            $table->string('pais_de_origen')->default("");
            $table->string('fraccion')->default("");
            $table->string('marca')->default("");
            $table->string('modelo')->default("");
            $table->string('serie')->default("");
            $table->string('imex')->default("");
            $table->string('imagen')->default("");
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
