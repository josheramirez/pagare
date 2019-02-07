<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests\CrearPrevisionRequest;
use App\Http\Requests\EditarPrevisionRequest;
use App\Prevision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PrevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $previsiones = Prevision::paginatePrevision($request->get('nombre_prevision'));

        //$servicios->appends(Input::only('servicio'));

        return view('administrador.previsiones.index', compact('previsiones'));
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
    public function store(CrearPrevisionRequest $request)
    {
        $prevision = Prevision::create($request->all());

        $success = 'Prevision ' . $prevision->nombre . ' agregado correctamente';

        Session::flash('success', $success);

        return redirect()->route('administrador.previsiones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prevision  $prevision
     * @return \Illuminate\Http\Response
     */
    public function show(Prevision $prevision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prevision  $prevision
     * @return \Illuminate\Http\Response
     */
    public function edit(Prevision $prevision)
    {
        return view('administrador.previsiones.edit', compact('prevision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prevision  $prevision
     * @return \Illuminate\Http\Response
     */
    public function update(EditarPrevisionRequest $request, Prevision $prevision)
    {
        $prevision->fill($request->all());
        $prevision->save();

        $success = 'Prevision ' . $prevision->nombre.  ' editado correctamente';

        Session::flash('success', $success);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prevision  $prevision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prevision $prevision)
    {
        //
    }
}
