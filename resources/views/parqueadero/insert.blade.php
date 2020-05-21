@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Parqueadero')])

@section('titulo')
Crear nuevo puesto 
@endsection
<br><br>
@section('content')
<div class="container-fluid">
    <br><br>
<h1 class="text-center">Crear Nuevo Puesto</h1>
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

<form action="{{route('parqueadero.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Puesto de autos:</label>
        <input type="text" class="form-control" name="puestoautos" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Puesto de motos:</label>
        <input type="text" class="form-control" name="puestomotos" placeholder="0">
        </div>
    </div>
        
    
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Puestos</button>
    </div>
    </form>
    <br><br>
</div>
@endsection