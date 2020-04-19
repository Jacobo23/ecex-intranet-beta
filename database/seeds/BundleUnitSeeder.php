<?php

use Illuminate\Database\Seeder;

class BundleUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bundle_units')->insert(['unidad' => 'pack']);
        DB::table('bundle_units')->insert(['unidad' => 'caja']);
        DB::table('bundle_units')->insert(['unidad' => 'tarima']);
        DB::table('bundle_units')->insert(['unidad' => 'rollo']);
    }
}
