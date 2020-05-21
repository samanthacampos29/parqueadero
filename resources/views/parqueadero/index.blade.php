@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Parqueadero')])

@section('titulo')
Parqueadero
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    
<h1 class="text-center">Parqueadero</h1>
<br><br>

    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puesto autos</th>
                <th>Puesto motos</th>            
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($parqueaderos as $parqueadero)
            <tr>
                <td>{{$parqueadero -> nombre}}</td>
                <td>{{$parqueadero -> puestoautos}}</td>
                <td>{{$parqueadero -> puestomotos}}</td>
                
                <td>
                  <form action="{{route('parqueadero.destroy', $parqueadero->id)}}" method="post">
                    <a href="{{route('parqueadero.show', $parqueadero->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('parqueadero.edit', $parqueadero->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('parqueadero.create')}} "><button class="btn btn-success">Crear puesto</button></a>
    </div>
</div>

        </div>
      




@endsection

