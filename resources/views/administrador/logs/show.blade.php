@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h1><small>Logs</small></h1>
                    <hr>
                    @include('administrador.logs.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection