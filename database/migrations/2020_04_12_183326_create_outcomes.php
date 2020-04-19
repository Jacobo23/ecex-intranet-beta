<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('asignacion');
            $table->date('fecha');
            $table->bigInteger('customer_id');
            $table->bigInteger('carrier_id');
            $table->string('referencia');
            $table->string('caja');
            $table->string('sello');
            $table->string('observaciones');
            $table->string('factura');
            $table->string('pedimento');
            $table->boolean('enviada');
            $table->string('user');
            $table->string('recibido_por');
            $table->string('placas');
            $table->string('descontar');
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
        Schema::dropIfExists('outcomes');
    }
}
