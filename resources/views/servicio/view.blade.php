@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Servicio')])


@section('titulo')
    Detalle Servicio
@endsection
<
@section('content')
<div class="container-fluid">
    <br><br>
    <h1 class="text-center">Detalle de Servicio</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Hora de entrada: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$servicio->horaentrada}}</p>
        </div>
    </div>
<br>
<div class="row">
    <h4>Vehiculo:</h4>
    <div class="col-sm-3">
        <p class="lead">{{$servicio->vehiculo}}</p>
    </div>
</div>
<br>
<div class="row">
    <h4>Cliente:</h4>
    <div class="col-sm-3">
        <p class="lead">{{$servicio->cliente}}</p>
    </div>
</div>
<br>

@endsection