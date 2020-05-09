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
            $table->string('referencia')->default("");
            $table->string('caja')->default("");
            $table->string('sello')->default("");
            $table->string('observaciones')->default("");
            $table->string('impoExpo')->default("");
            $table->string('factura')->default("");
            $table->string('tracking')->default("");
            $table->string('po')->default("");
            $table->string('locacion')->default("");
            $table->boolean('enviada')->default(false);
            $table->string('user')->default("");
            $table->boolean('revisada')->default(true);
            $table->boolean('cerrada')->default(false);
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
