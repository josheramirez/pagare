@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    {!! Form::open(['route'=> 'pagare.paciente.store', 'method' => 'POST']) !!}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Información del paciente</div>

                <div class="card-body">
                    @include('digitador.pagares.paciente.partials.field_paciente')
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row text-right">
        <div class="col-md-12">
            {!! Form::button('Volver', ['class' => 'btn btn-light']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection