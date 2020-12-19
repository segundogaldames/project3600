<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #select * from users inner join roles on users.role_id = roles.id
        $users = User::with('role')->orderBy('name','ASC')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id','nombre')->get(); #select id, nombre from roles;

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #return $request;
        $this->validate($request, [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        #insert into users(name,email,active,role_id,password) VALUES(lista_de_valores)
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active = 1; #1 => activo
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users')->with('success','El usuario se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        #return $request;
        $this->validate($request, [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email',
            'role' => 'required|integer',
            'active' => 'required|integer',
        ]);

        #update users set name = valor, email = email, active = active, role_id = role where id = id
        $usuario = User::find($user->id); #select * from users where id = id
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->active = $request->active;
        $usuario->role_id = $request->role;
        $usuario->save();

        return redirect('/users/' . $user->id )->with('success','El usuario se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
