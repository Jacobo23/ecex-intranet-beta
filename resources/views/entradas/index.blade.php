@extends('layouts.app')

@section('headers')

@endsection

@section('content')
<div class="container">
    

<div class="panel-div">

    <h3 class="subT">Entradas</h3>
			
    
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Entrada</th>
        <th scope="col">Fecha</th>
        <th scope="col">Dias</th>
        <th scope="col">Cliente</th>
        <th scope="col">Tracking</th>
        <th scope="col">Packing</th>
        <th scope="col">Enviada</th>
        <th scope="col">Balance</th>
        <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
@foreach ($entradas as $entrada)
        <tr id="row_{{$entrada->id}}">
            <th scope="row">{{$loop->iteration}}</th>
            <td><a href="/entradas/{{$entrada->asignacion}}">{{$entrada->asignacion}}</a></td>
            <td>{{$entrada->fecha}}</td>
            <td>{{$entrada->dias()}}</td>
            <td>{{$entrada->customer_id}}</td>
            <td>{{$entrada->tracking}}</td>
            <td><a href = "{{$entrada->id}}"><i class="far fa-file-pdf"></i></a></td>

            <td>
            @if ($entrada->enviada)
                <i class="fas fa-check-circle"></i>
            @else
                <i class="far fa-times-circle"></i>
            @endif
            </td>

            <td>{{$entrada->id}}</td>
            <td><button @click="EliminarEntrada({{$entrada->id}})" class="btn btn-danger"><i class="fas fa-minus"></i></button></td>
        </tr>
@endforeach
        
    </tbody>
    </table>


</div> <!-- panel-div -->

</div> <!-- container -->


@endsection

@section('scripts')

<script>


functions = {
    onLoad()
    {
        
    },
    EliminarEntrada(id)
    {
        axios.delete("/entradas/" + (id+2))
        .then(function (response) {
            alert(response.data);
            if(response.data == "Eliminada!")
            {
                document.getElementById("row_"+id).remove();
            }
        })
        .catch(function (error) {
            console.log(error);
        }); 
        
    }
};


</script>
@endsection
