@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-4">Previsiones</h1>
                    </div>
                    {!! Form::model(Request::all(), ['route' => 'administrador.previsiones.index', 'method' => 'GET', 'role' => 'search']) !!}
                    <div class="form-row align-items-center">
                        <div class="col-sm-5 my-1">
                            {!! Form::text('nombre_prevision', null, ['class' => 'form-control', 'placeholder' => 'Previsión']) !!}
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{ route('administrador.previsiones.index') }}" class="btn btn-outline-danger">
                                <i class="fas fa-eraser"></i> Limpiar
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @include('administrador.previsiones.partials.table')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h1><small>Formulario de previsión</small></h1>
                    <hr>
                    {!! Form::open(['route'=> 'administrador.previsiones.store', 'method' => 'POST']) !!}
                    @include('administrador.previsiones.partials.field')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection