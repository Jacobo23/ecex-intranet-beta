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
            $table->integer('cantidad_bultos')->default(0);
            $table->decimal('cantidad_piezas', 8, 2)->default(0);
            $table->string('umb');
            $table->string('ump');
            $table->decimal('peso_neto', 8, 2)->default(0);
            $table->decimal('peso_bruto', 8, 2)->default(0);
            $table->string('po')->default("");
            $table->string('descripcion_ing')->default("");
            $table->string('descripcion_esp')->default("");
            $table->string('pais_de_origen')->default("");
            $table->string('fraccion')->default("");
            $table->string('marca')->default("");
            $table->string('modelo')->default("");
            $table->string('serie')->default("");
            $table->string('locacion')->default("");
            $table->string('skid')->default("");
            $table->string('packing_id')->default("");
            $table->string('imex')->default("");
            $table->string('observaciones')->default("");
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
