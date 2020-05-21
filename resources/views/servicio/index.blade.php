@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Servicio')])

@section('titulo')
Servicio
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    
<h1 class="text-center">Servicio</h1>
<br><br>

    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hora de entrada</th>                        
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
            <tr>
                <td>{{$servicio -> horaentrada}}</td>               
                
                <td>
                  <form action="{{route('servicio.destroy', $servicio->id)}}" method="post">
                    <a href="{{route('servicio.show', $servicio->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('servicio.edit', $servicio->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('servicio.create')}} "><button class="btn btn-success">Crear servicio</button></a>
    </div>
</div>

        </div>
      




@endsection

