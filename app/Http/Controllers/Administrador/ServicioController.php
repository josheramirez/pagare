<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests\CrearServicioRequest;
use App\Http\Requests\EditarServicioRequest;
use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servicios = Servicio::paginateServicio($request->get('nombre_servicio'));

        //$servicios->appends(Input::only('servicio'));

        return view('administrador.servicios.index', compact('servicios'));
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
    public function store(CrearServicioRequest $request)
    {

        $servicio = Servicio::create($request->all());

        $success = 'Servicio ' . $servicio->servicio . ' agregado correctamente';

        Session::flash('success', $success);

        return redirect()->route('administrador.servicios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('administrador.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(EditarServicioRequest $request, Servicio $servicio)
    {
        $servicio->fill($request->all());
        $servicio->save();

        $success = 'Servicio ' . $servicio->nombre.  ' editado correctamente';

        Session::flash('success', $success);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
