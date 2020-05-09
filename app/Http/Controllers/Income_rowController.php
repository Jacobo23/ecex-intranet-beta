<?php

namespace App\Http\Controllers;

use DB;
use App\Partida_Entrada;
use Illuminate\Http\Request;

class Income_rowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if((int)request("partida_id") == 0)
        {
            $partida = new Partida_Entrada();
            $isInsert = 1;
        }
        else
        {
            $partida = Partida_Entrada::find((int)request("partida_id"));
            $isInsert = 0;
        }
       
        $partida->income_id = request("income_id");
        $partida->part_number_id = request("part_number_id");
        $partida->cantidad_bultos = request("cantidad_bultos");
        $partida->cantidad_piezas = request("cantidad_piezas");
        $partida->umb = request("umb");
        $partida->ump = request("ump");
        $partida->peso_neto = request("peso_neto");
        $partida->peso_bruto = request("peso_bruto");
        $partida->po = request("po");
        $partida->descripcion_ing = request("descripcion_ing");
        $partida->Descripcion_esp = request("Descripcion_esp");
        $partida->pais_de_origen = request("pais_de_origen");
        $partida->fraccion = request("fraccion");
        $partida->marca = request("marca");
        $partida->modelo = request("modelo");
        $partida->serie = request("serie");
        $partida->locacion = request("locacion");
        $partida->skid = request("skid");
        $partida->packing_id = request("packing_id");
        $partida->imex = request("imex");
        $partida->observaciones = request("observaciones");        

        $partida->save(); 

        return $partida->id ."|" . $isInsert; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getByIndex($income_id, $index)
    {
        $resp = Partida_Entrada::where('income_id', '=', $income_id)
        ->offset($index-1)
        ->limit(1)
        ->first();

        if(!is_null($resp))
        {
            $resp["part_number_name"] = $resp->part_number()->numero_de_parte;
        }

        return $resp;
    }

}
