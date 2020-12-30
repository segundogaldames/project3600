<?php

namespace App\Http\Controllers;

use App\Escuela;
use App\EscuelaSede;
use App\Sede;
use DB;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::orderBy('nombre','ASC')->get();

        return view('escuelas.index', compact('escuelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuelas.create');
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
            'nombre' => 'required|string|min:4|unique:escuelas',
        ]);

        $escuela = new Escuela;
        $escuela->nombre = $request->nombre;
        $escuela->save();

        return redirect('/escuelas')->with('success','La escuela se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        #$carreras = Carrera::where('escuela_id', $escuela->id)->orderBy('nombre','ASC')->get();
        #uso de query builder
        $sedes = DB::table('escuela_sedes')->select('sedes.id','sedes.nombre as sede','sedes.direccion','users.name')
            ->join('sedes','sedes.id','=','escuela_sedes.sede_id')
            ->join('users','users.id','=','escuela_sedes.user_id')
            ->where('escuela_sedes.escuela_id', $escuela->id)
            ->get();

        return view('escuelas.show', compact('escuela','sedes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuela $escuela)
    {
        return view('escuelas.edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escuela $escuela)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $escuela = Escuela::find($escuela->id);
        $escuela->nombre = $request->nombre;
        $escuela->save();

        return redirect('/escuelas/' . $escuela->id)->with('success','La escuela se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela)
    {
        //
    }
}
