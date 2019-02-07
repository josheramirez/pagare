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
                <div class="card">
                    <div class="card-body">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h4 class="text-secondary">Pagare sin validar: <a href="{{ route('supervisor.buscar.sinValidar') }}" class="badge badge-pill badge-warning">{{ $num_pagare_abierto }}</a></h4>
                            </li>
                        </ul>
                        <hr>
                        <h2 class="text-secondary">Buscar pagare</h2>
                        <br>
                        <div class="row" >

                        <!-- BLQUE CODIGO DE BARRAS -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Código de barras</h5>
                                        <p class="card-text">Para buscar el Pagare ingrese el código de barras del Pagare.</p>
                                        {!! Form::open(['route'=> 'supervisor.buscar.codigo', 'method' => 'POST', 'id' => 'formCodigo']) !!}
                                            <div class="form-group">
                                                {!! Form::label('codigo', 'Ingrese código') !!}
                                                {!! Form::number('codigo', null, ['class' => 'form-control', 'autofocus'=>'autofocus']) !!}
                                            </div>
                                            <button type="submit" class="btn btn-primary">Buscar <i class="fas fa-barcode"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        <!-- BLQUE NUMERO DE PAGARE -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">N° Pagare</h5>
                                        <p class="card-text">Para buscar el Pagare debe ingresar el número correspondiente del Pagare</p>
                                        {!! Form::open(['route'=> 'supervisor.buscar.numero', 'method' => 'POST', 'id' => 'formNumero']) !!}
                                        <div class="form-group">
                                            {!! Form::label('numeracion', 'N° Pagare') !!}
                                            {!! Form::number('numeracion', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Buscar <i class="fas fa-search"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        <!-- BLQUE RUT DEUDOR -->    
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">RUT Deudor</h5>
                                        <p class="card-text">Para buscar el Pagare debe ingresar el RUT del deudor</p>
                                        {!! Form::open(['route'=> 'supervisor.buscar.rut', 'method' => 'POST', 'id' => 'formRut']) !!}
                                        <div class="form-group">
                                            {!! Form::label('rut', 'RUT') !!}
                                            {!! Form::text('rut', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Buscar <i class="fas fa-user"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>


                         <!-- BLQUE RUT-NOMBRE CLIENTE -->    
                            <div class="col-md-4" style="padding-top: 30px">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Buscar Paciente</h5>
                                        <p class="card-text">Para buscar el Pagare debe ingresar el RUT o Nombre del paciente</p>

                                        {!! Form::open(['route'=> 'supervisor.buscar.paciente', 'method' => 'POST', 'id' => 'formPaciente']) !!}

                                        <div class="form-group">

                                            {!! Form::label('d_paciente', 'RUT o Nombre') !!}
                                            {!! Form::text('d_paciente', null, ['class' => 'form-control']) !!}

                                        </div>

                                        <button type="submit" class="btn btn-primary">Buscar <i class="fas fa-user"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>



                        </div>


                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
