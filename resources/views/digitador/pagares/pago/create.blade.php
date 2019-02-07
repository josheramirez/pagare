@extends('layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {!! Html::style('assets/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials/message')
            </div>
        </div>
        {!! Form::open(['route'=> 'pagare.pago.store', 'method' => 'POST']) !!}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-primary mb-1">
                    <div class="card-header">Pago</div>

                    <div class="card-body">
                        @include('digitador.pagares.pago.partials.field')
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row text-right">
            <div class="col-md-12">
                {!! link_to(route('pagare.view', [$pagare->id]),'Volver', ['class' => 'btn btn-outline-secondary']) !!}
                {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <br>
@endsection

@section('scripts')
    {!! Html::script('assets/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('assets/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.es.min.js') !!}
    <script>
        $('#f_pago').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            toggleActive: true,
            todayBtn: "linked",
            language: "es",
            altField: "#inicio",
            altFormat: "yyyy-mm-dd",
            autoclose: true
        });
    </script>
@endsection