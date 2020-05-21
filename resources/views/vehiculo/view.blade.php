@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Vehiculo')])


@section('titulo')
    Detalle Vehiculo
@endsection
<
@section('content')
<div class="container-fluid">
    <br><br>
    <h1 class="text-center">Detalle de Vehiculo</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Placa Vehiculo: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$vehiculo->placavehiculo}}</p>
        </div>
    </div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de lugar: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$vehiculo->numlugar}}</p>
    </div>
        
</div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Precio: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$vehiculo->precio}}</p>
    </div>
        
</div>
<br>
    
@endsection