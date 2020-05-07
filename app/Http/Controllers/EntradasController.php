<?php

namespace App\Http\Controllers;

use App\Entrada;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entradas = Entrada::all();
        return view('entradas.index', ['entradas' => $entradas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entradas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isUpdate = false;
        if(strlen(request("NumEntrada")) > 8)
        {
            //es un update
            $entrada = Entrada::where('asignacion','=' ,request("NumEntrada"))->first();
            if($entrada != null)
            {
                $isUpdate = true;
            }
        }
        if(!$isUpdate)
        {
            $entrada = new Entrada();
        }
        
        $entrada->fecha = request("Fecha");
        $entrada->customer_id = request("Cliente");
        $entrada->carrier_id = request("Transportista");
        $entrada->supplier_id = request("Proveedor");
        $entrada->referencia = request("Referencia");
        $entrada->caja = request("Caja");
        $entrada->sello = request("Sello");
        $entrada->observaciones = request("Observaciones");
        $entrada->impoExpo = request("ImpoExpo");
        $entrada->factura = request("Factura");
        $entrada->tracking = request("Tracking");
        $entrada->enviada = false;
        $entrada->user = "Taylor";
        $entrada->revisada = request("Revisada");
        $entrada->cerrada = false;
        $entrada->po = request("POdef");
        $entrada->locacion = request("Locaciondef");

        if(!$isUpdate) //is insert
        {
            //asignar un numero de Entrada
            $entrada_anterior = (string)Entrada::max('asignacion');
            $entrada_anterior_year = "";
            $current_year = date("Y");
            $aux_num = 1;
            if(strlen($entrada_anterior) > 8)
            {
                $entrada_anterior_year = substr($entrada_anterior, 0, 4);
                if($entrada_anterior_year == $current_year)
                {
                    $aux_num = ((int)substr($entrada_anterior, 4, 9)) + 1;
                }
            }
            $entrada->asignacion = $current_year . str_pad($aux_num,5,"0",STR_PAD_LEFT);
            //
        }
        

        $entrada->save(); 

        return $entrada->asignacion ." <- Entrada registrda!";     
    }

    /**
     * Display the specified resource.
     */
    public function show($numero_entrada)
    {
        $entrada = Entrada::where('asignacion','=' ,$numero_entrada)->first();
        if(is_null($entrada))
        {
            abort('404','El numero de entrada ' . $numero_entrada . ' no existe!');
        }
        return view('entradas.create', ['Entrada' => $entrada]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return "Eliminada!";
    }
}
