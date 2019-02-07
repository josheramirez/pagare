@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials/message')
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Cambiar contraseña</h2>
                        <hr>
                        {!! Form::open(['route'=> 'supervisor.configuracion.cambiarPassword', 'method' => 'POST']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('password_antigua', 'Contraseña antigua') !!}
                                {!! Form::password('password_antigua', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('password', 'Contraseña nueva') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('password_confirmation', 'Confirmar contraseña nueva') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row text-left">
                            <div class="col-md-12">
                                {!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection