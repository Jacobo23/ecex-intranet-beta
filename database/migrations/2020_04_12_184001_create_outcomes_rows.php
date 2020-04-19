<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes_rows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('outcome_id');
            $table->bigInteger('income_row_id');
            $table->integer('cantidad_bultos');
            $table->decimal('cantidad_piezas', 8, 2);
            $table->string('umb');
            $table->string('ump');
            $table->decimal('peso_neto', 8, 2);
            $table->decimal('peso_bruto', 8, 2);
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
        Schema::dropIfExists('outcomes_rows');
    }
}
