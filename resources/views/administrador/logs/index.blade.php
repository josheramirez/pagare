@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    <div class="row row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h1><small>Logs</small></h1>
                    <hr>
                    {!! Form::open(['route'=> 'administrador.logs.find', 'method' => 'POST']) !!}
                    @include('administrador.logs.partials.field')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection