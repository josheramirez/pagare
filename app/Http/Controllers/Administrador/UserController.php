<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests\CrearUsuarioRequest;
use App\Rol;
use App\User;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('full_nombre', 'ASC')->paginate(10);
        $roles = Rol::orderBy('rol', 'ASC')->pluck('rol', 'id')->toArray();

        return view('administrador.usuarios.index', compact('users', 'roles'));
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
        $validator1 = Validator::make($request->all(), [
            'rut'                   => 'required|cl_rut',
        ])->validate();

        $request['rut'] = Rut::parse($request->rut)->number();
        $request['password'] = $request->rut;

        $validator2 = Validator::make($request->all(), [
            'rut'                   => 'unique:users,rut',
            'nombre'                => 'required|min:3',
            'paterno'               => 'required|min:3',
            'materno'               => 'required|min:3',
            'username'              => 'required|min:3|unique:users,username',
            'rol_id'                => 'required|exists:roles,id'
        ])->validate();

        $user = User::create($request->all());

        $success = 'Usuario ' . $user->username . ' creado correctamente, contraseña: ' . $request->rut;

        Session::flash('success', $success);

        return redirect()->route('administrador.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user['rut'] = formatoRut($user['rut']);
        $roles = Rol::orderBy('rol', 'ASC')->pluck('rol', 'id')->toArray();
        return view('administrador.usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator1 = Validator::make($request->all(), [
            'rut'                   => 'required|cl_rut',
        ])->validate();

        $request['rut'] = Rut::parse($request->rut)->number();
        $request['password'] = $request->rut;

        $validator2 = Validator::make($request->all(), [
            'rut'                   => 'unique:users,rut,' . $user->id,
            'nombre'                => 'required|min:3',
            'paterno'               => 'required|min:3',
            'materno'               => 'required|min:3',
            'username'              => 'required|min:3|unique:users,username,' . $user->id,
            'rol_id'                => 'required|exists:roles,id'
        ])->validate();

        if ($request->reset == 1){
            $request['password'] = $user->rut;
        }

        $user->fill($request->all());
        $user->save();

        $success = 'Usuario ' . $user->full_nombre.  ' editado correctamente';

        Session::flash('success', $success);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
