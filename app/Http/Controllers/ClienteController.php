<?php

namespace App\Http\Controllers;

use App;
use App\Parqueadero;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $clientes = app\Cliente::orderby('nombres', 'asc')->get();
            return view('cliente.index', compact('clientes'));
        }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parqueaderos = App\Parqueadero::orderby('nombre','asc')->get();
        return view('cliente.insert', compact('parqueaderos'));
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
            'nombres' => 'required',
            'telefono' => 'required',
            'tipodoc' => 'required',
            'numdoc' => 'required',
            'idParqueadero' => 'required'
        ]);
        app\Cliente::create($request->all());
        return redirect()->route('cliente.index')
                ->with('exito', 'Se ha creado el cliente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = App\Cliente::join('parqueaderos', 'clientes.idParqueadero', 'parqueaderos.id')
                                ->select('clientes.*', 'parqueaderos.nombre as parqueadero')
                                ->where('clientes.id', $id)
                                ->first();

        return view('cliente.view', compact ('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueaderos = App\Parqueadero::orderby('nombre', 'asc')->get();
        $cliente = App\Cliente::findorfail($id);

        return view('cliente.edit', compact('cliente', 'parqueaderos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'nombres' => 'required',
                'telefono' => 'required',
                'tipodoc' => 'required',
                'numdoc' => 'required',
                'idParqueadero' => 'required'
                ]);

        $cliente = App\Cliente::findorfail($id);

        $cliente->update($request->all());

        return redirect()->route('cliente.index')
                        ->with('exito','Cliente modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = App\Cliente::findorfail($id);
        $cliente->delete('id');
        return redirect()->route('cliente.index')
                  ->with('exito','Cliente eliminado');
    }
}