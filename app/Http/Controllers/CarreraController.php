<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Escuela;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::with('escuela')->orderBy('nombre','ASC')->get();

        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuelas = Escuela::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('carreras.create', compact('escuelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:6|unique:carreras',
            'escuela' => 'required|integer',
        ]);

        if ($request->codigo!='') {
            $this->validate($request, [
                'codigo' => 'string|min:4',
            ]);
        }

        $carrera = new Carrera;
        $carrera->nombre = $request->nombre;
        $carrera->codigo = $request->codigo;
        $carrera->active = 1; #1 => activo y 2 => inactivo
        $carrera->escuela_id = $request->escuela;
        $carrera->save();

        return redirect('/carreras')->with('success','La carrera se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return view('carreras.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        $escuelas = Escuela::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('carreras.edit', compact('carrera','escuelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:6',
            'escuela' => 'required|integer',
        ]);

        if ($request->codigo!='') {
            $this->validate($request, [
                'codigo' => 'string|min:4',
            ]);
        }

        $car = Carrera::find($carrera->id);
        $car->nombre = $request->nombre;
        $car->codigo = $request->codigo;
        $car->active = 1; #1 => activo y 2 => inactivo
        $car->escuela_id = $request->escuela;
        $car->save();

        return redirect('/carreras/' . $carrera->id)->with('success','La carrera se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}
