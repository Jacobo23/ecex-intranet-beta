<?php

use Illuminate\Database\Seeder;

class CarrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carriers')->insert(['nombre' => Str::random(5)]);
        DB::table('carriers')->insert(['nombre' => Str::random(5)]);
        DB::table('carriers')->insert(['nombre' => Str::random(5)]);
        DB::table('carriers')->insert(['nombre' => Str::random(5)]);
        DB::table('carriers')->insert(['nombre' => Str::random(5)]);
    }
}
