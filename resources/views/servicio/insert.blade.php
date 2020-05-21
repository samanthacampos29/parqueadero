@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Servicio')])

@section('titulo')
Crear nuevo servicio 
@endsection
<br><br>
@section('content')
<div class="container-fluid">
    <br><br>
<h1 class="text-center">Crear Nuevo Servicio</h1>
<br><br>

@if($errors->any())
	<div class="alert alert-danger">
	<div class="header"> <strong>Ups.</strong> Algo anda mal</div>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
	</div>
	
@endif

<form action="{{route('servicio.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Hora de entrada:</label>
        <input type="text" class="form-control" name="horaentrada" placeholder="Hora de entrada">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Fecha:</label>
        <input type="text" class="form-control" name="fecha" placeholder="Fecha">
        </div>
    </div>
  
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cliente: </label>
            <select name="idCliente"  class="form-control">
                @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}" >{{$cliente->nombres}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Vehiculo: </label>
            <select name="idVehiculo"  class="form-control">
                @foreach ($vehiculos as $vehiculo)
            <option value="{{$vehiculo->id}}" >{{$vehiculo->placavehiculo}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </div>
    </form>
    <br><br>
</div>
@endsection