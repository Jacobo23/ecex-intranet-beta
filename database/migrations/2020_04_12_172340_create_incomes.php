<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->Integer('asignacion');
            $table->date('fecha');
            $table->bigInteger('customer_id');
            $table->bigInteger('carrier_id');
            $table->bigInteger('supplier_id');
            $table->string('referencia');
            $table->string('caja');
            $table->string('sello');
            $table->string('observaciones');
            $table->string('impoExpo');
            $table->string('factura');
            $table->string('tracking');
            $table->string('po');
            $table->string('locacion');
            $table->boolean('enviada');
            $table->string('user');
            $table->boolean('revisada');
            $table->boolean('cerrada');
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
        Schema::dropIfExists('incomes');
    }
}
