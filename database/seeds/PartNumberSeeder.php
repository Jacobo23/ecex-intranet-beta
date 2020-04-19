<?php

use Illuminate\Database\Seeder;

class PartNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('part_numbers')->insert([
            'numero_de_parte' => 'PARTE1',
            'customer_id' => 1,
            'um' => Str::random(10),
            'peso_unitario' => 1.00,
            'descripcion_ing' => Str::random(10),
            'descripcion_esp' => Str::random(10),
            'pais_de_origen' => Str::random(3),
            'fraccion' => Str::random(8),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'serie' => Str::random(10),
            'imex' => Str::random(10),
            'imagen' => ''
        ]);
        DB::table('part_numbers')->insert([
            'numero_de_parte' => 'PARTE1',
            'customer_id' => 1,
            'um' => Str::random(10),
            'peso_unitario' => 1.00,
            'descripcion_ing' => Str::random(10),
            'descripcion_esp' => Str::random(10),
            'pais_de_origen' => Str::random(3),
            'fraccion' => Str::random(8),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'serie' => Str::random(10),
            'imex' => Str::random(10),
            'imagen' => 'x'
        ]);
        DB::table('part_numbers')->insert([
            'numero_de_parte' => 'PARTE1',
            'customer_id' => 1,
            'um' => Str::random(10),
            'peso_unitario' => 1.00,
            'descripcion_ing' => Str::random(10),
            'descripcion_esp' => Str::random(10),
            'pais_de_origen' => Str::random(3),
            'fraccion' => Str::random(8),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'serie' => Str::random(10),
            'imex' => Str::random(10),
            'imagen' => ''
        ]);
        DB::table('part_numbers')->insert([
            'numero_de_parte' => 'PARTE1',
            'customer_id' => 1,
            'um' => Str::random(10),
            'peso_unitario' => 1.00,
            'descripcion_ing' => Str::random(10),
            'descripcion_esp' => Str::random(10),
            'pais_de_origen' => Str::random(3),
            'fraccion' => Str::random(8),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'serie' => Str::random(10),
            'imex' => Str::random(10),
            'imagen' => ''
        ]);
        DB::table('part_numbers')->insert([
            'numero_de_parte' => 'PARTE1',
            'customer_id' => 1,
            'um' => Str::random(10),
            'peso_unitario' => 1.00,
            'descripcion_ing' => Str::random(10),
            'descripcion_esp' => Str::random(10),
            'pais_de_origen' => Str::random(3),
            'fraccion' => Str::random(8),
            'marca' => Str::random(10),
            'modelo' => Str::random(10),
            'serie' => Str::random(10),
            'imex' => Str::random(10),
            'imagen' => ''
        ]);
    }
}
