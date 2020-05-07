@extends('layouts.app')

@section('headers')

@endsection

@section('content')
<div class="container">
    

<div class="panel-div">

    <h3 class="subT">Entrada</h3>

    <div class="form-group controlDiv">
        <label>Numero de Entrada:</label>
        <input type="text" class="form-control" id="txtNumEntrada" v-model="txtNumEntrada">
    </div>

    <div class="form-group controlDiv">
        <label for="txtFecha">Fecha:</label>
        <input type="date" class="form-control" id="txtFecha" v-model="txtFecha">
    </div>


    <div class="form-group controlDiv">
        <label>Impo/Expo:</label>
        <select class="form-control" id = "txtImpoExpo" v-model="txtImpoExpo">
            <option value="Impo">Impo</option>
            <option value="Expo">Expo</option>
        </select>
    </div>
    
    <div class="form-group controlDiv">
        <label>Cliente:@{{txtCliente}}</label>
        <select class="form-control" id="txtCliente" v-model="txtCliente">
            <option value="0">Sin Cliente</option>
            <option v-for="option in options_clientes" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Transportista:</label>
        <select v-model="txtTransportista" id="txtTransportista" class="form-control">
            <option value = "0">Sin Transportista</option>
            <option v-for="option in options_transportistas" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Proveedor:</label>
        <select v-model="txtProveedor" id="txtProveedor" class="form-control">
            <option value = "0">Sin Proveedor</option>
            <option v-for="option in options_proveedores" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Referencia:</label>
        <input type="text" class="form-control" id="txtReferencia" placeholder="Referencia" v-model="txtReferencia">
    </div>

    <div class="form-group controlDiv">
        <label>Caja:</label>
        <input type="text" class="form-control" id="txtCaja" placeholder="# de Caja" v-model="txtCaja">
    </div>

    <div class="form-group controlDiv">
        <label>Sello:</label>
        <input type="text" class="form-control" id="txtSello" placeholder="# de Sello" v-model="txtSello">
    </div>

    <div class="form-group controlDiv">
        <label>Factura:</label>
        <input type="text" class="form-control" id="txtFactura" placeholder="Factura" v-model="txtFactura">
    </div>

    <div class="form-group controlDiv">
        <label>Tracking:</label>
        <input type="text" class="form-control" id="txtTracking" placeholder="Tracking" v-model="txtTracking">
    </div>

    <div class="form-group controlDiv">
        <label>PO:</label>
        <input type="text" class="form-control" id="txtPOdef" placeholder="PO" v-model="txtPOdef">
    </div>

    <div class="form-group controlDiv">
        <label>Locacion:</label>
        <input type="text" class="form-control" id="txtLocaciondef" placeholder="PO" v-model="txtLocaciondef">
    </div>

    <div class="form-group controlDiv" style="text-align:center;">
        <label>Revisada:</label>
        <input type="checkbox" id="txtRevisada" checked="true" v-model="txtRevisada">
    </div>

    <div class="form-group controlDiv">
        <button class="btn btn-extra btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Packing list:</button>
    </div>

    <div class="form-group" style="margin:10px;">
        <label for="txtObservaciones" >Observaciones:</label>
        <textarea v-model="txtObservaciones" class="form-control" id="txtObservaciones" placeholder="Observaciones"  rows='2'></textarea>
    </div>

    <div class="form-group controlDiv">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Imprimir</button>
            <button type="button" class="btn btn-info">Enviar</button>
        </div>
    </div>

    <div class="form-group controlDiv">
        <button class="btn btn-extra btn-success" @click="RegistrarEntrada()">Guardar</button>
    </div>
    <br>

    <h3 class="subT">Partidas</h3>

    <example-component></example-component>
    
    

</div> <!-- panel-div -->

</div> <!-- container -->




<!-- Modal Adjuntos -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adjuntos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        @if (isset($Entrada))
        @php
        $dir_adjuntos = "files/entradas/adjuntos/".$Entrada->asignacion;
        $adjuntos_prev = array_diff(scandir($dir_adjuntos), array('..', '.'));
        @endphp 
        @foreach ($adjuntos_prev as $ad_file)
            <div id="div_file_adjunto_{{$loop->index}}" class="btn-group" style="margin: 5px;">
            <button type="button" class="btn btn-outline-secondary" @click="irAdjunto('{{$Entrada->asignacion}}','{{$ad_file}}')">{{$ad_file}}</button>
            <button type="button" class="btn btn-outline-danger btn-sm toggle" data-toggle="dropdown" @click="deleteAdjunto('{{$Entrada->asignacion}}','{{$ad_file}}','div_file_adjunto_{{$loop->index}}')">x</button>
            </div>
        @endforeach
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="explorarArchivos">Explorar</button>
            <form id = "PackingListForm" action ="/uploadfile" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="file" style="display:none;"  name="fl_adjuntos" id="fl_adjuntos" value="file" @change="uploadAdjunto">
                <input type="hidden" name="txtEntradaTemp" id='txtEntradaTemp' v-model="txtNumEntrada">
            </form>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')

<script>
///options para comboboxes
vars.options_clientes = "";
vars.options_proveedores = "";
vars.options_transportistas = "";

//inicializar variables
// -- Variables de encabezzado
// -- en caso de ser un update o edit
@if (isset($Entrada))
vars.txtNumEntrada = "{{$Entrada->asignacion}}";
vars.txtFecha = "{{$Entrada->fecha}}";
vars.txtImpoExpo = "{{$Entrada->fecha}}";
vars.txtCliente = {{$Entrada->customer_id}};
vars.txtTransportista = {{$Entrada->carrier_id}};
vars.txtProveedor = {{$Entrada->supplier_id}};
vars.txtReferencia = "{{$Entrada->referencia}}";
vars.txtCaja = "{{$Entrada->caja}}";
vars.txtSello = "{{$Entrada->sello}}";
vars.txtFactura = "{{$Entrada->factura}}";
vars.txtTracking = "{{$Entrada->tracking}}";
vars.txtPOdef = "{{$Entrada->po}}";
vars.txtLocaciondef = "{{$Entrada->locacion}}";
vars.txtRevisada = {{$Entrada->revisada}};
vars.txtObservaciones = "{{$Entrada->observaciones}}";
@else
// -- Default value
vars.txtNumEntrada = "";
vars.txtFecha = "{{date('Y-m-d')}}";
vars.txtImpoExpo = "";
vars.txtCliente = "";
vars.txtTransportista = "";
vars.txtProveedor = "";
vars.txtReferencia = "";
vars.txtCaja = "";
vars.txtSello = "";
vars.txtFactura = "";
vars.txtTracking = "";
vars.txtPOdef = "";
vars.txtLocaciondef = "";
vars.txtRevisada = true;
vars.txtObservaciones = "";
@endif
//variables inicializadas



functions = {
    onLoad()
    {
        //llenar <select> para cliente, proveedor y transportista
        axios.get('/get-options-customers').then(function (response) {vars.options_clientes = response.data;});
        axios.get('/get-options-suppliers').then(function (response) {vars.options_proveedores = response.data;});
        axios.get('/get-options-carriers').then(function (response) {vars.options_transportistas = response.data;});
    },
    RegistrarEntrada()
    {
        axios.post('/entradas', {
            NumEntrada: vars.txtNumEntrada,
            Fecha: vars.txtFecha,
            ImpoExpo: vars.txtImpoExpo,
            Cliente: vars.txtCliente,
            Transportista: vars.txtTransportista,
            Proveedor: vars.txtProveedor,
            Referencia: vars.txtReferencia,
            Caja: vars.txtCaja,
            Sello: vars.txtSello,
            Factura: vars.txtFactura,
            Tracking: vars.txtTracking,
            POdef: vars.txtPOdef,
            Locaciondef: vars.txtLocaciondef,
            Revisada: vars.txtRevisada,
            Observaciones: vars.txtObservaciones
        })
        .then(function (response) {
            let data = response.data.split(' ');
            vars.txtNumEntrada = data[0];
            alert(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    adjuntos()
    {

    },
    explorarArchivos()
    {
        document.getElementById('fl_adjuntos').click();
    },
    uploadAdjunto()
    {
        if(vars.txtNumEntrada.length != 9)
        {
            alert("Debes guardar la Entrada primero!");
            return;
        }
        
        document.getElementById("PackingListForm").submit();
    },
    irAdjunto(entrada,filename)
    {
        window.open("/adjutos/entrada/"+entrada+"/"+filename,"_blank");

    },
    deleteAdjunto(entrada,filename,id_el)
    {
        location.href = "/adjutos-delete/entrada/"+entrada+"/"+filename;
    }
};


</script>
@endsection
