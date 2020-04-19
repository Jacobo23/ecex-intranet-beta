<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_rows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('income_id');
            $table->bigInteger('part_number_id');
            $table->integer('cantidad_bultos');
            $table->decimal('cantidad_piezas', 8, 2);
            $table->string('umb');
            $table->string('ump');
            $table->decimal('peso_neto', 8, 2);
            $table->decimal('peso_bruto', 8, 2);
            $table->string('po');
            $table->string('descripcion_ing');
            $table->string('Descripcion_esp');
            $table->string('pais_de_origen');
            $table->string('fraccion');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('locacion');
            $table->string('skid');
            $table->string('packing_id');
            $table->string('imex');
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
        Schema::dropIfExists('income_rows');
    }
}
