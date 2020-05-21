<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class ParqueaderoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $parqueaderos = app\Parqueadero::orderby('puestoautos', 'asc')->get();
            return view('parqueadero.index', compact('parqueaderos'));
        }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parqueadero.insert');
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
            'nombre' => 'required',
            'puestoautos' => 'required',
            'puestomotos' => 'required'
        ]);
        app\Parqueadero::create($request->all());
        return redirect()->route('parqueadero.index')
                ->with('exito', 'Se ha creado el parqueadero correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);

        return view('parqueadero.view', compact ('parqueadero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);

        return view('parqueadero.edit', compact('parqueadero'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'nombre' => 'required',
                'puestoautos' => 'required',
                'puestomotos' => 'required'
                ]);

        $parqueadero = App\Parqueadero::findorfail($id);

        $parqueadero->update($request->all());

        return redirect()->route('parqueadero.index')
                        ->with('exito','Parqueadero modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);
        $parqueadero->delete('id');
        return redirect()->route('parqueadero.index')
                  ->with('exito','Parqueadero eliminado');
    }
}

