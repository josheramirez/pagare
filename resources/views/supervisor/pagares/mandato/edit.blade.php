@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    {!! Form::model($mandato, ['route'=> ['supervisor.pagare.mandato.update', $mandato], 'method' => 'PUT']) !!}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Mandato Especia</div>
                <div class="card-body">
                    @include('digitador.pagares.mandato.partials.field_edit')
                </div>
            </div>
        </div>
    </div>
    <div class="row text-right">
        <div class="col-md-12">
            {!! link_to(route('supervisor.pagare.view', [$mandato->pagare->id]),'Volver', ['class' => 'btn btn-light']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection