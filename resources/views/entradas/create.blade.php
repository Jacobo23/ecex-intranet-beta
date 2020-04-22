@extends('layouts.app')

@section('headers')

@endsection

@section('content')
<div class="container">
    

<div class="panel-div">

    <h3 class="subT">Entradas</h3>

    <div class="form-group controlDiv">
        <label>Numero de Entrada: @{{numero_de_entrada}}</label>
        <input type="text" class="form-control" id="txtNumEntrada" v-model="numero_de_entrada">
    </div>

    <div class="form-group controlDiv">
        <label for="txtFecha">Fecha:</label>
        <input type="date" class="form-control" id="txtFecha">
    </div>


    <div class="form-group controlDiv">
        <label>Impo/Expo:</label>
        <select class="form-control" id = "txtImpoExpo">
            <option value="Impo">Impo</option>
            <option value="Expo">Expo</option>
        </select>
    </div>
    
    <div class="form-group controlDiv">
        <label>Cliente:</label>
        <select class="form-control" id="txtCliente">
            <option value="0">Sin Cliente</option>
            <option v-for="option in options_clientes" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Transportista:</label>
        <select id="txtTransportista" class="form-control" onchange="ComprobarCatalogo('Transportista', this)">
            <option value = "0">Sin Transportista</option>
            <option v-for="option in options_transportistas" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Proveedor:</label>
        <select id="txtProveedor" class="form-control" onchange="ComprobarCatalogo('Proveedor', this)">
            <option value = "0">Sin Proveedor</option>
            <option v-for="option in options_proveedores" :value="option.value">@{{option.text}}</option>
        </select>
    </div>

    <div class="form-group controlDiv">
        <label>Referencia:</label>
        <input type="text" class="form-control" id="txtReferencia" placeholder="Referencia">
    </div>

    <div class="form-group controlDiv">
        <label>Caja:</label>
        <input type="text" class="form-control" id="txtCaja" placeholder="# de Caja">
    </div>

    <div class="form-group controlDiv">
        <label>Sello:</label>
        <input type="text" class="form-control" id="txtSello" placeholder="# de Sello">
    </div>

    <div class="form-group controlDiv">
        <label>Factura:</label>
        <input type="text" class="form-control" id="txtFactura" placeholder="Factura">
    </div>

    <div class="form-group controlDiv">
        <label>Tracking:</label>
        <input type="text" class="form-control" id="txtTracking" placeholder="Tracking">
    </div>

    <div class="form-group controlDiv">
        <label>PO:</label>
        <input type="text" class="form-control" id="txtPOdef" placeholder="PO">
    </div>

    <div class="form-group controlDiv">
        <label>Locacion:</label>
        <input type="text" class="form-control" id="txtLocaciondef" placeholder="PO">
    </div>

    <div class="form-group controlDiv" style="text-align:center;">
        <label>Revisada:</label>
        <input type="checkbox" id="txtRevisada" checked="true">
    </div>

    <div class="form-group controlDiv">
        <button class="btn btn-extra btn-secondary">Packing list:</button>
    </div>

    <div class="form-group" style="margin:10px;">
        <label for="txtObservaciones" >Observaciones:</label>
        <textarea class="form-control" id="txtObservaciones" placeholder="Observaciones"  rows='2'></textarea>
    </div>

    <div class="form-group controlDiv">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Imprimir</button>
            <button type="button" class="btn btn-info">Enviar</button>
        </div>
    </div>

    <div class="form-group controlDiv">
        <button class="btn btn-extra btn-success" @click="click()">Guardar</button>
    </div>
    <br>

    <h3 class="subT">Partidas</h3>

    <example-component></example-component>
    

</div> <!-- panel-div -->

</div> <!-- container -->


@endsection

@section('scripts')

<script>
vars.numero_de_entrada = "";
vars.options_clientes = "";
vars.options_proveedores = "";
vars.options_transportistas = "";
functions = {
    onLoad()
    {
        vars.options_clientes = [
            {
                text: "1",
                value: "1"
            },
            {
                text: "2",
                value: "2"
            }
        ];
        vars.options_proveedores = [
            {
                text: "1",
                value: "1"
            },
            {
                text: "2",
                value: "2"
            }
        ];
        vars.options_transportistas = [
            {
                text: "1",
                value: "1"
            },
            {
                text: "2",
                value: "2"
            }
        ];
    }
};


</script>
@endsection
