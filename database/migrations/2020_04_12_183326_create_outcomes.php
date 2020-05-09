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
            $table->string('referencia')->default("");
            $table->string('caja')->default("");
            $table->string('sello')->default("");
            $table->string('observaciones')->default("");
            $table->string('factura')->default("");
            $table->string('pedimento')->default("");
            $table->boolean('enviada')->default(false);
            $table->string('user')->default("");
            $table->string('recibido_por')->default("");
            $table->string('placas')->default("");
            $table->string('descontar')->default("");
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
