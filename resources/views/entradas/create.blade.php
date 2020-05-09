@extends('layouts.app')

@section('headers')

<style>
#modalNumeroParte
{
	position: fixed;
  	top: 50%;
  	left: 50%;
  	/* bring your own prefixes */
  	transform: translate(-50%, -50%);

  	background-color: white;
  	width: 80%;
  	box-shadow: 0px 0px 1000px 150px #333;
  	padding: 10px;
  	border-radius: 5px;
}

#modalNumeroParte .btn
{
	float: right;
	position: relative;
	top: 50px;
	margin-left: 20px;
}
</style>

@endsection

@section('content')
<div class="container">
    

<div class="panel-div">

    <h3 class="subT">Entrada</h3>

    <div class="form-group controlDiv">
        <label>Numero de Entrada:</label>
        <input type="text" class="form-control" id="txtNumEntrada" v-model="txtNumEntrada" @focus="txtNEFocus">
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
        <label>Cliente:</label>
        <select class="form-control" id="txtCliente" v-model="txtCliente" :disabled="CantPartidas > 0">
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

















    <h3 class="subT">Partidas @{{CantPartidas}}</h3>

    <div class="form-group" style="width:32%;display: inline-block;">
      <div class="btn-group">
        <button type="button" class="btn btn-primary" @click="sigPartida(-1)"><</button>
        <input type="number" id="txtPartida" style="text-align: center;" v-model="partida_actual"/>
        <button type="button" class="btn btn-primary" @click="sigPartida(1)">></button>
      </div>
    </div>
    <input type="hidden" id="txtPartidaID" value = "">

    <div class="btn-group">
      <button id = 'btnGuardarPartida' type="button" class="btn btn-success" @click="RegistrarPartida">Guardar</button>
      <button id = 'btnEliminarPartida' type="button"  class="btn btn-danger">Eliminar</button>
    </div>

    <br/>


    <div class="form-group controlDiv" style="width:32%;display: inline-block;">
      <label>Numero de Parte @{{id_partida}}:</label>
      <input type="text" class="form-control" id="txtNumParte" v-model="txtNumParte" style="text-transform:uppercase" @focusout="GetInfoNP" :disabled="id_partida > 0">
    </div>
    <div class="form-group" style="width:32%;display: inline-block;">
      <label>Descripción Inglés:</label>
      <input type="text" class="form-control" id="txtDescEng" v-model="txtDescEng">
    </div>
    <div class="form-group" style="width:32%;display: inline-block;">
      <label>Descripción Español:</label>
      <input type="text" class="form-control" id="txtDescEsp" v-model="txtDescEsp">
    </div>

    <div class="form-group controlDiv">
      <label>País de origen:</label>
      <input type="text" class="form-control" id="txtPais" v-model="txtPais" maxlength="5" list="listaPaises">
    </div>
    <div class="form-group controlDiv">
      <label>Cantidad:</label>
      <input type="number" class="form-control" id="txtCantidad" v-model="txtCantidad">
    </div>
    <div class="form-group controlDiv">
      <label>UM:@{{txtUM}}</label>
      <!--<input type="text" class="form-control" id="txtUM" maxlength="5">-->
      <select class="form-control" id="txtUM" v-model="txtUM" >
      <option v-for="option in options_ump" :value="option.value">@{{option.text}}</option>
        </select>
    </div>
    <div class="form-group controlDiv">
      <label>Bultos:</label>
      <input type="number" class="form-control" id="txtBultos" v-model="txtBultos">
    </div>
    <div class="form-group controlDiv">
      <label>Tipo Bulto:</label>
      <select id="txtTBulto" v-model="txtTBulto" class="form-control">
          <option v-for="option in options_umb" :value="option.value">@{{option.text}}</option>
        </select>
    </div>
    <div class="form-group controlDiv">
      <label>Peso Neto:</label>
      <input type="number" class="form-control" id="txtPesoNeto" v-model="txtPesoNeto">
      <input type="hidden" id="txtPesoU">
    </div>
    <div class="form-group controlDiv">
      <label>Peso Bruto:</label>
      <input type="number" class="form-control" id="txtPesoBruto" v-model="txtPesoBruto">
    </div>
    <div class="form-group controlDiv">
      <label>Fracción:</label>
      <input type="text" class="form-control" id="txtFraccion" v-model="txtFraccion">
    </div>
    <div class="form-group controlDiv">
      <label>Po:</label>
      <input type="text" class="form-control" id="txtPO" v-model="txtPO">
    </div>

        
    <div class="form-group controlDiv">
      <label>IMMEX:</label>
      <input type="text" class="form-control" id="txtIMMEX" v-model="txtIMMEX">
    </div>
    
    <div class="form-group controlDiv">
      <label>Marca:</label>
      <input type="text" class="form-control" id="txtMarca" v-model="txtMarca">
    </div>
    <div class="form-group controlDiv">
      <label>Modelo:</label>
      <input type="text" class="form-control" id="txtModelo" v-model="txtModelo">
    </div>
    <div class="form-group controlDiv">
      <label>Numero de serie:</label>
      <input type="text" class="form-control" id="txtNumSerie" v-model="txtNumSerie">
    </div>
    <div class="form-group controlDiv">
      <label>Locación:</label>
      <input type="text" class="form-control" id="txtLoc" v-model="txtLoc">
    </div>

    <div class="form-group" style="width: 650px;display: inline-block; margin:10px;">
        <label for="txtPartidaObservaciones" >Observaciones:</label>
        <textarea class="form-control" id="txtPartidaObservaciones" v-model="txtPartidaObservaciones" placeholder="Observaciones"  rows='2'></textarea>
      </div>












    
    

</div> <!-- panel-div -->

</div> <!-- container -->



<!-- Button trigger modal -->
<button id="btnShowModalNP" type="button" style="display:none" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Numero de parte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
      <div class="form-group controlDiv">
        <label>NumerodeParte:</label>
        <input type="text" class="form-control" v-model = "txtNumerodeParteM" id="txtNumerodeParteM" placeholder="# de Parte"/>
      </div>

      <!--<div class="form-group controlDiv">
        <label>Cliente:</label>
        <select class="form-control" v-model = "txtClienteM" id="txtClienteM">
          <option value="0">Sin Cliente</option>
          <option v-for="option in options_clientes" :value="option.value">@{{option.text}}</option>
        </select>
      </div>-->

      <div class="form-group controlDiv">
        <label>UM:</label>
        <select class="form-control" v-model = "txtUMM" id="txtUMM">
          <option v-for="option in options_ump" :value="option.value">@{{option.text}}</option>
        </select>
      </div>

      <div class="form-group controlDiv">
        <label>Peso unitario:</label>
        <input type="number" step="any" class="form-control" v-model = "txtPesoUM" id="txtPesoUM" placeholder="Peso unitario">
      </div>

      <div class="form-group controlDiv">
        <label>Descripcion_Ing:</label>
        <input type="text" class="form-control" v-model = "txtDescripcion_IngM" id="txtDescripcion_IngM" placeholder="Ingles">
      </div>

      <div class="form-group controlDiv">
        <label>Descripcion_Esp:</label>
        <input type="text" class="form-control" v-model = "txtDescripcion_EspM" id="txtDescripcion_EspM" placeholder="Español">
      </div>

      <div class="form-group controlDiv">
        <label>Pais origen:</label>
        <input type="text" class="form-control" v-model = "txtPaisDeOrigenM" id="txtPaisDeOrigenM" placeholder="Pais">
      </div>
      <div class="form-group controlDiv">
        <label>Fraccion:</label>
        <input type="text" class="form-control" v-model = "txtFraccionM" id="txtFraccionM" placeholder="Fraccion">
      </div>
      <div class="form-group controlDiv">
        <label>IMMEX:</label>
        <input type="text" class="form-control" v-model = "txtImmexM" id="txtImmexM" placeholder="IMMEX">
      </div>
      <div class="form-group controlDiv">
        <label>Marca (solo para <strong>equipo</strong>):</label>
        <input type="text" class="form-control" v-model = "txtMarcaM" id="txtMarcaM" placeholder="Marca">
      </div>
      <div class="form-group controlDiv">
        <label>Modelo (solo para <strong>equipo</strong>):</label>
        <input type="text" class="form-control" v-model = "txtModeloM" id="txtModeloM" placeholder="Modelo">
      </div>
      <div class="form-group controlDiv">
        <label>Serie (solo para <strong>equipo</strong>):</label>
        <input type="text" class="form-control" v-model = "txtSerieM" id="txtSerieM" placeholder="# de Serie">
      </div>

      </div>
      <div class="modal-footer">
        <button id="btnCerrarModalNP" type="button" class="btn btn-secondary" data-dismiss="modal" @click="cerrarModalNP">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarNP">Guardar</button>
      </div>
    </div>
  </div>
</div>



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
        $adjuntos_prev = array();
        $dir_adjuntos = "files/entradas/adjuntos/".$Entrada->asignacion;
        if(file_exists($dir_adjuntos))
        {
          $adjuntos_prev = array_diff(scandir($dir_adjuntos), array('..', '.'));
        }
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
vars.partida_actual = 0;

///options para comboboxes
vars.options_clientes = "";
vars.options_proveedores = "";
vars.options_transportistas = "";

vars.options_ump = "";
vars.options_umb = "";

//inicializar variables
// -- Variables de encabezzado
// -- en caso de ser un update o edit
@if (isset($Entrada))
vars.id_entrada = {{$Entrada->id}};
vars.id_partida = 0;
vars.txtNumEntrada = "{{$Entrada->asignacion}}";
vars.txtFecha = "{{$Entrada->fecha}}";
vars.txtImpoExpo = "{{$Entrada->impoExpo}}";
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
vars.CantPartidas = {{count($Entrada->partidas())}};
@else
// -- Default value
vars.id_entrada = 0;
vars.id_partida = 0;
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
vars.CantPartidas = 0;
@endif
//variables de encabezado inicializadas

vars.txtNumParte = "";
vars.txtNumParte_id = 0;
vars.txtDescEng = "";
vars.txtDescEsp = "";
vars.txtPais = "";
vars.txtCantidad = "";
vars.txtBultos = "";
vars.txtTBulto = "";
vars.txtPesoNeto = "";
vars.txtPesoBruto = "";
vars.txtFraccion = "";
vars.txtPO = "";
vars.txtUM = "";
vars.txtIMMEX = "";
vars.txtMarca = "";
vars.txtModelo = "";
vars.txtNumSerie = "";
vars.txtLoc = "";
vars.txtPartidaObservaciones = "";

//variables para el modal de NP

vars.txtNumerodeParteM = "";
vars.txtClienteM = "";
vars.txtUMM = "";
vars.txtPesoUM = "";
vars.txtDescripcion_IngM = "";
vars.txtDescripcion_EspM = "";
vars.txtPaisDeOrigenM = "";
vars.txtFraccionM = "";
vars.txtMarcaM = "";
vars.txtModeloM = "";
vars.txtSerieM = "";
vars.txtImmexM = "";



functions = {
    onLoad()
    {
        
        //llenar <select> para cliente, proveedor y transportista
        axios.get('/get-options-customers').then(function (response) {vars.options_clientes = response.data;});
        axios.get('/get-options-suppliers').then(function (response) {vars.options_proveedores = response.data;});
        axios.get('/get-options-carriers').then(function (response) {vars.options_transportistas = response.data;});

        axios.get('/get-options-ump').then(function (response) {vars.options_ump = response.data;});
        axios.get('/get-options-umb').then(function (response) {vars.options_umb = response.data;});
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
            location.href = "/entradas/"+data[0];
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    RegistrarPartida()
    {
      if(vars.id_entrada == 0)
      {
        alert("Guarde la entrada primero!");
        return;
      }
        axios.post('/partidas', {
          partida_id: vars.id_partida,
          income_id: vars.id_entrada,
          part_number_id: vars.txtNumParte_id,
          cantidad_bultos: vars.txtBultos,
          cantidad_piezas: vars.txtCantidad,
          umb: vars.txtTBulto,
          ump: vars.txtUM,
          peso_neto: vars.txtPesoNeto,
          peso_bruto: vars.txtPesoBruto,
          po: vars.txtPO,
          descripcion_ing: vars.txtDescEng,
          Descripcion_esp: vars.txtDescEsp,
          pais_de_origen: vars.txtPais,
          fraccion: vars.txtFraccion,
          marca: vars.txtMarca,
          modelo: vars.txtModelo,
          serie: vars.txtNumSerie,
          locacion: vars.txtLoc,
          skid: ".",
          packing_id: ".",
          imex: vars.txtIMMEX,
          observaciones: vars.txtPartidaObservaciones
        })
        .then(function (response) {
            let data = response.data.split('|');
            vars.id_partida = data[0];
            if(data[1] == 1) //is insert
            {
              vars.CantPartidas++;
              alert("Partida registrada!");
            }
            else{
              alert("Partida actualizada!");
            }
            
        })
        .catch(function (error) {
            console.log(error);
        });
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
    },
    GetInfoNP()
    {
      if(vars.id_entrada == 0)
      {
        alert("Guarde la entrada primero!");
        return;
      }
      if(vars.txtCliente == 0)
      {
        alert("Seleccione cliente!");
        return;
      }

      if(vars.txtNumParte.trim() != "")
      {
        axios.get('/part_numbers/' + vars.txtCliente + '/' + vars.txtNumParte)
        .then(function (response) 
        {
          if(!response.data.id)
          {
            alert("El numero de parte no existe, favor de verificar!");
            vars.txtNumerodeParteM = vars.txtNumParte;
            document.getElementById("btnShowModalNP").click();
            //functions.limpiarControlesPartida();
            return;
          }
          if(response.data.customer_id != vars.txtCliente)
          {
            alert("El numero de parte no existe para el cliente seleccionado.");
            document.getElementById("btnShowModalNP").click();
            functions.limpiarControlesPartida();
            return;
          }
          vars.txtNumParte_id = response.data.id;
          vars.txtDescEng = response.data.descripcion_ing;
          vars.txtDescEsp = response.data.descripcion_esp;
          vars.txtPais = response.data.pais_de_origen;
          vars.txtCantidad = 0;
          vars.txtBultos = 0;
          vars.txtFraccion = response.data.fraccion;
          vars.txtPO = vars.txtPOdef;
          vars.txtIMMEX = response.data.imex;
          vars.txtMarca = response.data.marca;
          vars.txtModelo = response.data.modelo;
          vars.txtNumSerie = response.data.serie;
          vars.txtLoc = vars.txtLocaciondef;
          vars.txtPartidaObservaciones = "";
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
      }
      else{
        
        functions.limpiarControlesPartida();
      }
      
      
    },
    limpiarControlesPartida()
    {
      vars.txtNumParte = "";
      vars.txtNumParte_id = 0;
      vars.txtDescEng = "";
      vars.txtDescEsp = "";
      vars.txtPais = "";
      vars.txtCantidad = "";
      vars.txtBultos = "";
      vars.txtTBulto = "";
      vars.txtPesoNeto = "";
      vars.txtPesoBruto = "";
      vars.txtFraccion = "";
      vars.txtPO = "";
      vars.txtUM = "";
      vars.txtIMMEX = "";
      vars.txtMarca = "";
      vars.txtModelo = "";
      vars.txtNumSerie = "";
      vars.txtLoc = "";
      vars.txtPartidaObservaciones = "";
    },
    guardarNP()
    {
        axios.post('/part_numbers', {
            customer_id: vars.txtCliente,
            numero_de_parte: vars.txtNumerodeParteM,
            um: vars.txtUMM,
            peso_unitario: vars.txtPesoUM,
            descripcion_ing: vars.txtDescripcion_IngM,
            descripcion_esp: vars.txtDescripcion_EspM,
            pais_de_origen: vars.txtPaisDeOrigenM,
            fraccion: vars.txtFraccionM,
            marca: vars.txtMarcaM,
            modelo: vars.txtModeloM,
            serie: vars.txtSerieM,
            imex: vars.txtImmexM
        })
        .then(function (response) {
          if(!response.data)
          {
            alert("Error al guardar numero de parte!");
            return;
          }
            vars.txtNumParte = vars.txtNumerodeParteM;
            vars.txtNumParte_id = response.data;
            vars.txtDescEng = vars.txtDescripcion_IngM;
            vars.txtDescEsp = vars.txtDescripcion_EspM;
            vars.txtPais = vars.txtPaisDeOrigenM;
            vars.txtFraccion = vars.txtFraccionM;
            vars.txtUM = vars.txtUMM;
            vars.txtIMMEX = vars.txtImmexM;
            vars.txtMarca = vars.txtMarcaM;
            vars.txtModelo = vars.txtModeloM;
            vars.txtNumSerie = vars.txtSerieM;
            document.getElementById("btnCerrarModalNP").click();
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    cerrarModalNP()
    {
      vars.txtNumerodeParteM = "";
      vars.txtClienteM = "";
      vars.txtUMM = "";
      vars.txtPesoUM = "";
      vars.txtDescripcion_IngM = "";
      vars.txtDescripcion_EspM = "";
      vars.txtPaisDeOrigenM = "";
      vars.txtFraccionM = "";
      vars.txtMarcaM = "";
      vars.txtModeloM = "";
      vars.txtSerieM = "";
      vars.txtImmexM = "";
    },
    txtNEFocus()
    {
      document.getElementById("txtFecha").focus();
    },
    sigPartida(val)
    {
      if(vars.id_entrada < 1)
      {
        alert("Guarde la entrada primero!");
        return;
      }
      vars.partida_actual += val;
      if(vars.partida_actual < 1)
      {
        vars.partida_actual = 1;
      }
      if(vars.partida_actual > vars.CantPartidas + 1)
      {
        vars.partida_actual = vars.CantPartidas + 1;
        return;
      }
      if(vars.partida_actual == vars.CantPartidas + 1)
      {
        functions.limpiarControlesPartida();
      }
      

      axios.get('/partidas_index/'+vars.id_entrada+'/'+vars.partida_actual)
        .then(function (response) 
        {
          data = response.data;
          if(data.id)
          {
              functions.limpiarControlesPartida();

              vars.txtNumParte = data.part_number_name;
              vars.txtNumParte_id = data.part_number_id;
              vars.txtDescEng = data.descripcion_ing;
              vars.txtDescEsp = data.descripcion_esp;
              vars.txtPais = data.pais_de_origen;
              vars.txtCantidad = data.cantidad_piezas;
              vars.txtBultos = data.cantidad_bultos;
              vars.txtFraccion = data.fraccion;
              vars.txtPO = data.po;
              vars.txtIMMEX = data.imex;
              vars.txtMarca = data.marca;
              vars.txtModelo = data.modelo;
              vars.txtNumSerie = data.serie;
              vars.txtLoc = data.locacion;
              vars.txtPartidaObservaciones = data.observaciones;

              vars.txtTBulto = data.umb;
              vars.txtPesoNeto = data.peso_neto;
              vars.txtPesoBruto = data.peso_bruto;
              vars.txtUM = data.ump;
          }
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });

    }
};

</script>


@endsection
