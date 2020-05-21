@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Cliente')])


@section('titulo')
    Detalle Cliente
@endsection
<
@section('content')
<div class="container-fluid">
    <br><br>
    <h1 class="text-center">Detalle de Cliente</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombres: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$cliente->nombres}}</p>
        </div>
    </div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Telefono: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$cliente->telefono}}</p>
    </div>
        
</div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Tipo de documento: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$cliente->tipodoc}}</p>
    </div>
        
</div>
<br>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de documento: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$cliente->numdoc}}</p>
    </div>
        
</div>
<br>

    
@endsection