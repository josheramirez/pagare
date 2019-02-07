@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row justify-content-center">
            <div class="col-md-6">
                @include('partials/message')
                <div class="card">
                    <div class="card-body">
                        <h1><small>Editar servicio</small></h1>
                        <hr>
                        {!! Form::model($servicio, ['route' => ['administrador.servicios.update', $servicio], 'method' => 'PUT']) !!}
                            @include('administrador.servicios.partials.field_edit')
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</button>
                            <a class="btn btn-outline-info" href="{{ route('administrador.servicios.index') }}">
                                <i class="fas fa-long-arrow-alt-left"></i> Volver
                            </a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
