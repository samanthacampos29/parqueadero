@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Cliente')])

@section('titulo')
Actualizar Cliente
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

<form action="{{route('cliente.update', $cliente->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
            <div class="form-group col-md-6">
            <label>Nombres:</label>
            <input type="text" class="form-control" name="nombres" value="{{$cliente->nombres}}">
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Tipo de documento:</label>
        <input type="text" class="form-control" name="tipodoc" value="{{$cliente->tipodoc}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de documento:</label>
        <input type="text" class="form-control" name="numdoc" value="{{$cliente->numdoc}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Parqueadero:</label>
        <select name="idParqueadero" class="form-control">
            @foreach ($parqueaderos as $parqueadero)
            <option value="{{$parqueadero->id}}"
                @if ($cliente->idParqueadero == $parqueadero->id)
                selected                    
                @endif>
                {{$parqueadero->nombre}} </option>                 
            @endforeach
        </select>
            </div>
    </div>    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar cliente</button>
    </div>
    </form>
    <br><br>
    
    
</div>
@endsection