<?php

namespace App\Http\Controllers;

use App;
use App\Parqueadero;
use App\Cliente;
use Illuminate\Http\Request;

class ServIcioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = App\Servicio::orderby('horaentrada','asc')->get();
        return view('servicio.index', compact('servicios')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = App\Vehiculo::orderby('placavehiculo','asc')->get();
        $clientes = App\Cliente::orderby('nombres','asc')->get();
        return view('servicio.insert', compact('vehiculos','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar que lleguen todos los campos
        $request->validate([
            'horaentrada' => 'required',
            'idVehiculo' => 'required',
            'idCliente' => 'required',
              
        ]);
          App\Servicio::create($request->all());
 
          return redirect()->route('servicio.index')
                        -> with('exito','Se ha creado servicio con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = App\Servicio::join('vehiculos','servicios.idVehiculo','vehiculos.id')
                                ->join('clientes','servicios.idCliente','clientes.id')
                                ->select('servicios.*', 'vehiculos.placavehiculo as vehiculo', 'clientes.nombres as cliente')
                                ->where('servicios.id', $id)
                                ->first();

        return view('servicio.view', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos = App\Vehiculo::orderby('placavehiculo','asc')->get();
        $clientes = App\Cliente::orderby('nombres','asc')->get();
        $servicio = App\Servicio::findorfail($id);
        return view('servicio.edit', compact('servicio','vehiculos','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'horaentrada' => 'required',
            'idVehiculo' => 'required',
            'idCliente' => 'required',
                  
        ]);
            
        $servicio = App\Servicio::findorfail($id);
        $servicio->update($request->all());

        return redirect()->route('servicio.index')
                     ->with('exito', 'Servicio modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = App\Servicio::findorfail($id);

        $servicio->delete();

        return redirect()->route('servicio.index')
                     ->with('exito', 'Servicio eliminado correctamente');
    }
}