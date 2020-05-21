@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Parqueadero')])


@section('titulo')
    Detalle Parqueadero
@endsection
<
@section('content')
<div class="container-fluid">
    <br><br>
    <h1 class="text-center">Detalle de Parqueadero</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$parqueadero->nombre}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Puesto de autos: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$parqueadero->puestoautos}}</p>
        </div>
    </div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Puesto de motos: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$parqueadero->puestomotos}}</p>
    </div>
        
</div>
<br>
    
@endsection