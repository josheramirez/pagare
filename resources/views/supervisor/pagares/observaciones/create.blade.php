@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>

    {!! Form::open(['route'=> 'supervisor.pagare.observacion.store', 'method' => 'POST']) !!}
       <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-primary mb-1">
                    <div class="card-header">Añadir Observaciones</div>
                    
                    <!-- DATOS OCULTOS -->
                    {!! Form::hidden('pagare_id', $pagare->id) !!}
                    {!! Form::hidden('total_pagado', 0) !!}
                    
                    <div class="card-body">
                        
                        <div class="form-row">




                            <div class="form-group col-md-2">
                                
                                {!! Form::label('pagare_id', 'Pagare') !!}
                                <div class="input-group mb-1">
                                    {!! Form::text('pagare_numeracion', $pagare->numeracion, ['class' => 'form-control','readonly']) !!}
                                </div>

                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('deudor', 'Deudor') !!}
                                <div class="input-group mb-3">
                                    {!! Form::text('deudor',$pagare->deudor->full_nombre, ['class' => 'form-control','readonly']) !!}
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                {!! Form::label('observacion', 'Observacion') !!}
                                {!! Form::text('observacion', null, ['class' => 'form-control','required']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row text-right">
            <div class="col-md-12">
                {!! link_to(route('supervisor.pagare.view', [$pagare->id]),'Volver', ['class' => 'btn btn-light']) !!}
                {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}


</div>
<br>
@endsection
