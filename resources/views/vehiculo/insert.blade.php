@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Vehiculo')])

@section('titulo')
Crear nuevo vehiculo 
@endsection
<br><br>
@section('content')
<div class="container-fluid">
    <br><br>
<h1 class="text-center">Crear Nuevo Vehiculo</h1>
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

<form action="{{route('vehiculo.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Placa vehiculo:</label>
        <input type="text" class="form-control" name="placavehiculo" placeholder="Placa vehiculo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de lugar:</label>
        <input type="number" class="form-control" name="numlugar" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Precio:</label>
        <input type="number" class="form-control" name="precio" placeholder="0">
        </div>
    </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Parqueadero: </label>
            <select name="idParqueadero"  class="form-control">
                @foreach ($parqueaderos as $parqueadero)
            <option value="{{$parqueadero->id}}" >{{$parqueadero->nombre}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Vehiculo</button>
    </div>
    </form>
    <br><br>
</div>
@endsection