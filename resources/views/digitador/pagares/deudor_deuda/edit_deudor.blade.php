@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    {!! Form::model($deudor, ['route'=> ['pagare.deudor.update', $deudor], 'method' => 'PUT']) !!}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Información del deudor</div>

                <div class="card-body">
                    @include('digitador.pagares.deudor_deuda.partials.field_edit_deudor')
                </div>
            </div>
        </div>
    </div>
    <div class="row text-right">
        <div class="col-md-12">
            {!! link_to(route('pagare.view', [$deudor->pagare->id]),'Volver', ['class' => 'btn btn-outline-secondary']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection