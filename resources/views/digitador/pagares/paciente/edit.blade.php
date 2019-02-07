@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    {!! Form::model($paciente, ['route'=> ['pagare.paciente.update', $paciente], 'method' => 'PUT']) !!}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Información del paciente</div>

                <div class="card-body">
                    @include('digitador.pagares.paciente.partials.field_paciente_edit')
                </div>
            </div>
        </div>
    </div>
    <div class="row text-right">
        <div class="col-md-12">
            @if($paciente->nombre == null or $paciente->paterno == null or $paciente->materno = null or $paciente->rut == null)
                {!! link_to(route('pagare.paciente.copiar', [$paciente->pagare->id]),'Copiar datos del deudor', ['class' => 'btn btn-outline-success']) !!}
            @endif
            {!! link_to(route('pagare.view', [$paciente->pagare->id]),'Volver', ['class' => 'btn btn-outline-secondary']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection