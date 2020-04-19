<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(['nombre' => Str::random(5)]);
        DB::table('suppliers')->insert(['nombre' => Str::random(5)]);
        DB::table('suppliers')->insert(['nombre' => Str::random(5)]);
        DB::table('suppliers')->insert(['nombre' => Str::random(5)]);
        DB::table('suppliers')->insert(['nombre' => Str::random(5)]);
    }
}
