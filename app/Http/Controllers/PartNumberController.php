<?php


namespace App\Http\Controllers;

use App\Part_number;
use Illuminate\Http\Request;

class PartNumberController extends Controller
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
        $NP = Part_number::where('numero_de_parte','=' ,request("numero_de_parte"))
            ->where('customer_id','=' ,request("customer_id"))
            ->first();

        if(is_null($NP))
        {
            $NP = new Part_number();
            $NP->customer_id = request("customer_id");
            $NP->numero_de_parte = request("numero_de_parte");
        }
       
        
        $NP->um = request("um");
        $NP->peso_unitario = request("peso_unitario");
        $NP->descripcion_ing = request("descripcion_ing");
        $NP->descripcion_esp = request("descripcion_esp");
        $NP->pais_de_origen = request("pais_de_origen");
        $NP->fraccion = request("fraccion");
        $NP->marca = request("marca");
        $NP->modelo = request("modelo");
        $NP->serie = request("serie");
        $NP->imex = request("imex");
        $NP->imagen = ".";//request("imagen");  

        $NP->save();

        return $NP->id;

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

    public function getInfo($cliente, $part_number)
    {
        $Part = Part_number::where('numero_de_parte','=' ,$part_number)->first();
        return $Part;
    }
}
