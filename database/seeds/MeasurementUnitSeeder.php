<?php

use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurement_units')->insert(['unidad' => 'Lb']);
        DB::table('measurement_units')->insert(['unidad' => 'Kg']);
        DB::table('measurement_units')->insert(['unidad' => 'Gr']);
        DB::table('measurement_units')->insert(['unidad' => 'Oz']);
    }
}
