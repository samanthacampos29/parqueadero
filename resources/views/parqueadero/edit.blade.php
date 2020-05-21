@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Parqueadero')])

@section('titulo')
Actualizar Parqueadero
 @endsection
 <br><br>
@section('content')
<div class="container-fluid">
    <br><br>

<h1 class="text-center">Editar Parqueadero</h1>
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

<form action="{{route('parqueadero.update', $parqueadero->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="{{$parqueadero->nombre}}">
        </div>
</div>
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Puesto de autos:</label>
            <input type="text" class="form-control" name="puestoautos" value="{{$parqueadero->puestoautos}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Puesto de motos:</label>
        <input type="text" class="form-control" name="puestomotos" value="{{$parqueadero->puestomotos}}">
        </div>
    </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar parqueadero</button>
    </div>
    </form>
    <br><br>
    
    
</div>
@endsection