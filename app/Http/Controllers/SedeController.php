<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Comuna;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::with('comuna')->orderBy('nombre','ASC')->get();

        return view('sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    #metodo get para registrar sedes por comuna
    public function addSede(Comuna $comuna)
    {
        return view('sedes.addSede', compact('comuna'));
    }

    #metodo post para registrar sedes por comuna
    public function setSede(Request $request, Comuna $comuna)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:6|unique:sedes',
            'direccion' => 'required|string|min:6',
        ]);

        $sede = new Sede;
        $sede->nombre = $request->nombre;
        $sede->direccion = $request->direccion;
        $sede->comuna_id = $comuna->id;
        $sede->save();

        return redirect('/comunas/' . $comuna->id)->with('success','La sede se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        return view('sedes.show', compact('sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function edit(Sede $sede)
    {
        $comunas = Comuna::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('sedes.edit', compact('sede','comunas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sede $sede)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:6',
            'direccion' => 'required|string|min:6',
            'comuna' => 'required|integer',
        ]);

        $sed = Sede::find($sede->id);
        $sed->nombre = $request->nombre;
        $sed->direccion = $request->direccion;
        $sed->comuna_id = $request->comuna;
        $sed->save();

        return redirect('/sedes/' . $sede->id)->with('success','La sede se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sede $sede)
    {
        //
    }
}
