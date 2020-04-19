<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignsKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('inventory_bundles', function (Blueprint $table) {$table->foreign('income_row_id')->references('id')->on('income_rows');});
        //Schema::table('incomes', function (Blueprint $table) {$table->foreign('customer_id')->references('id')->on('customers');});
        //Schema::table('incomes', function (Blueprint $table) {$table->foreign('carrier_id')->references('id')->on('carriers');});
        //Schema::table('incomes', function (Blueprint $table) {$table->foreign('supplier_id')->references('id')->on('suppliers');});
        //Schema::table('income_rows', function (Blueprint $table) {$table->foreign('income_id')->references('id')->on('incomes');});
        //Schema::table('income_rows', function (Blueprint $table) {$table->foreign('part_number_id')->references('id')->on('part_numbers');});
        //Schema::table('part_numbers', function (Blueprint $table) {$table->foreign('customer_id')->references('id')->on('customers');});
        //Schema::table('outcomes', function (Blueprint $table) {$table->foreign('customer_id')->references('id')->on('customers');});
        //Schema::table('outcomes', function (Blueprint $table) {$table->foreign('carrier_id')->references('id')->on('carriers');});
        //Schema::table('outcomes_rows', function (Blueprint $table) {$table->foreign('outcome_id')->references('id')->on('outcomes');});
        //Schema::table('outcomes_rows', function (Blueprint $table) {$table->foreign('income_row_id')->references('id')->on('income_rows');});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
