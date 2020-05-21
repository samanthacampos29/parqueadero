@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Cliente')])

@section('titulo')
Crear nuevo cliente 
@endsection
<br><br>
@section('content')
<div class="container-fluid">
    <br><br>
<h1 class="text-center">Crear Nuevo Cliente</h1>
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

<form action="{{route('cliente.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombres:</label>
        <input type="text" class="form-control" name="nombres" placeholder="Nombres">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Tipo de documento:</label>
        <input type="text" class="form-control" name="tipodoc" placeholder="Tipo de doumento">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de documento:</label>
        <input type="number" class="form-control" name="numdoc" placeholder="0">
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
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </div>
    </form>
    <br><br>
</div>
@endsection