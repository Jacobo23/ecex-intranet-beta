<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(['nombre' => Str::random(5),'email' => Str::random(4).'@gmail.com','capacidad' => 123]);
        DB::table('customers')->insert(['nombre' => Str::random(5),'email' => Str::random(4).'@gmail.com','capacidad' => 321]);
        DB::table('customers')->insert(['nombre' => Str::random(5),'email' => Str::random(4).'@gmail.com','capacidad' => 231]);
        DB::table('customers')->insert(['nombre' => Str::random(5),'email' => Str::random(4).'@gmail.com','capacidad' => 312]);
        DB::table('customers')->insert(['nombre' => Str::random(5),'email' => Str::random(4).'@gmail.com','capacidad' => 221]);
    }
}
