@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Cliente')])

@section('titulo')
Cliente
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    
<h1 class="text-center">Cliente</h1>
<br><br>

    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Tipo de documento</th>
                <th>Numero de documento</th>                            
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente -> nombres}}</td>
                <td>{{$cliente -> telefono}}</td>
                <td>{{$cliente -> tipodoc}}</td>
                <td>{{$cliente -> numdoc}}</td>
                
                <td>
                  <form action="{{route('cliente.destroy', $cliente->id)}}" method="post">
                    <a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-primary">Editar</a>
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
        <a href="{{route('cliente.create')}} "><button class="btn btn-success">Crear cliente</button></a>
    </div>
</div>

        </div>
      




@endsection

