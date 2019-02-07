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
                        <h1 class="display-4">Usuarios</h1>
                    </div>
                    @include('administrador.usuarios.partials.table')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h1><small>Formulario de usuario</small></h1>
                    <hr>
                    {!! Form::open(['route'=> 'administrador.users.store', 'method' => 'POST']) !!}
                    @include('administrador.usuarios.partials.field')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection