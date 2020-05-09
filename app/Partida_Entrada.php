<?php

namespace App;

use App\Part_number;
use Illuminate\Database\Eloquent\Model;

class Partida_Entrada extends Model
{
    //
    protected $table = 'income_rows';
    //$table->id();
    //$table->bigInteger('income_id');
    //$table->bigInteger('part_number_id');
    //$table->integer('cantidad_bultos');
    //$table->decimal('cantidad_piezas', 8, 2);
    //$table->string('umb');
    //$table->string('ump');
    //$table->decimal('peso_neto', 8, 2);
    //$table->decimal('peso_bruto', 8, 2);
    //$table->string('po');
    //$table->string('descripcion_ing');
    //$table->string('Descripcion_esp');
    //$table->string('pais_de_origen');
    //$table->string('fraccion');
    //$table->string('marca');
    //$table->string('modelo');
    //$table->string('serie');
    //$table->string('locacion');
    //$table->string('skid');
    //$table->string('packing_id');
    //$table->string('imex');
    //$table->string('observaciones');
    //$table->timestamps();
    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }
    public function part_number()
    {
        $Part = Part_number::where('id','=' ,$this->part_number_id)->first();
        return $Part;
    }
}
