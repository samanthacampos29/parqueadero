@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Vehiculo')])

@section('titulo')
Vehiculo
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    
<h1 class="text-center">Vehiculo</h1>
<br><br>

    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Placa Vehiculo</th>
                <th>Numero de lugar</th> 
                <th>Precio</th>                         
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{$vehiculo -> placavehiculo}}</td>
                <td>{{$vehiculo -> numlugar}}</td>
                <td>{{$vehiculo -> precio}}</td>
               
                
                <td>
                  <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                    <a href="{{route('vehiculo.show', $vehiculo->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
               </td>
            <tr>  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <a href="{{route('vehiculo.create')}} "><button class="btn btn-success">Crear vehiculo</button></a>
    </div>
</div>

        </div>
      




@endsection

