@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Vehiculo')])

@section('titulo')
Actualizar Vehiculo
 @endsection
 <br><br>
@section('content')
<div class="container-fluid">
    <br><br>

<h1 class="text-center">Editar Cliente</h1>
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

<form action="{{route('vehiculo.update', $vehiculo->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Placa vehiculo:</label>
            <input type="text" class="form-control" name="nombres" value="{{$vehiculo->placavehiculo}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de lugar:</label>
        <input type="text" class="form-control" name="numlugar" value="{{$vehiculo->numlugar}}">
        </div>
    </div>
  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Precio:</label>
        <input type="text" class="form-control" name="precio" value="{{$vehiculo->precio}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>ID Parqueadero:</label>
        <input type="number" class="form-control" name="idParqueadero" value="{{$vehiculo->idparqueadero}}">
        </div>
    </div>    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar vehiculo</button>
    </div>
    </form>
    <br><br>
    
    
</div>
@endsection