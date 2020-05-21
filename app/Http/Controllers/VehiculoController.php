<?php

namespace App\Http\Controllers;

use App;
use App\Parqueadero;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $vehiculos = app\Vehiculo::orderby('placavehiculo', 'asc')->get();
            return view('vehiculo.index', compact('vehiculos'));
        }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parqueaderos = App\Parqueadero::orderby('nombre','asc')->get();
        return view('vehiculo.insert', compact('parqueaderos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que llenen todos los campos
        $request->validate([
            'idParqueadero' => 'required',
            'placavehiculo' => 'required',
            'numlugar' => 'required',
            'precio' => 'required'
        ]);
        app\Vehiculo::create($request->all());
        return redirect()->route('vehiculo.index')
                ->with('exito', 'Se ha creado el vehiculo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = App\Vehiculo::join('parqueaderos', 'vehiculos.idParqueadero', 'parqueaderos.id')
                                ->select('vehiculos.*', 'parqueaderos.nombre as parqueadero')
                                ->where('vehiculos.id', $id)
                                ->first();

        return view('vehiculo.view', compact ('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueaderos =App\Parqueadero::orderby('nombre', 'asc')->get();
        $vehiculo = App\Vehiculo::findorfail($id);

        return view('vehiculo.edit', compact('vehiculo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'placavehiculo' => 'required',
                'numlugar' => 'required',
                'precio' => 'required',
                'idParqueadero' => 'required'
                ]);

        $vehiculo = App\Vehiculo::findorfail($id);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculo.index')
                        ->with('exito','Vehiculo modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = App\Vehiculo::findorfail($id);
        $vehiculo->delete('id');
        return redirect()->route('vehiculo.index')
                  ->with('exito','Vehiculo eliminado');
    }
}