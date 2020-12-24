<?php

namespace App\Http\Controllers;

use App\EscuelaSede;
use App\Escuela;
use App\Sede;
use App\User;
use Illuminate\Http\Request;

class EscuelaSedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    #metodos get y post para asociar sedes a una escuela
    public function addSede(Escuela $escuela)
    {
        $sedes = Sede::select('id','nombre')->orderBy('nombre','ASC')->get();
        $users = User::select('id','name')->where('role_id', 3)->orderBy('name','ASC')->get();

        return view('escuelaSedes.addSede',compact('escuela','sedes','users'));
    }

    public function setSede(Request $request, Escuela $escuela)
    {
        $this->validate($request, [
            'sede' => 'required|integer',
        ]);

        #comprobar que una sede - escuela no halaa sido registrada
        $registro = EscuelaSede::where('escuela_id', $escuela->id)->where('sede_id', $request->sede)->first();
        if ($registro) {
            return redirect('/escuelas/' . $escuela->id)->with('danger','Esta sede ya está asociada... Intenta con otra');
        }

        $sede = new EscuelaSede;
        $sede->escuela_id = $escuela->id;
        $sede->sede_id = $request->sede;
        $sede->user_id = $request->user;
        $sede->save();

        return redirect('/escuelas/' . $escuela->id)->with('success','La sede se ha asociado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EscuelaSede  $escuelaSede
     * @return \Illuminate\Http\Response
     */
    public function show(EscuelaSede $escuelaSede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EscuelaSede  $escuelaSede
     * @return \Illuminate\Http\Response
     */
    public function edit(EscuelaSede $escuelaSede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EscuelaSede  $escuelaSede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EscuelaSede $escuelaSede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EscuelaSede  $escuelaSede
     * @return \Illuminate\Http\Response
     */
    public function destroy(EscuelaSede $escuelaSede)
    {
        //
    }
}
