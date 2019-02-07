@extends('layouts.app')

@section('styles')
    {{Html::style('assets/sweet-alert/sweet-alert.min.css')}}
@endsection

@section('content')
    <div class="container justify-content-center">
        <h1>Pagare N° {{ $pagare->numeracion }}</h1>
        <p>
            <strong>Creado por: {{ $pagare->usuario->full_nombre }}</strong>
        </p>
        <p>
            @if($pagare->estado_id == 1)
                <strong>Estador del pagare: <span class="badge badge-pill badge-warning">{{ $pagare->estado->tipo }}</span></strong>
            @elseif($pagare->estado_id == 2)
                <strong>Estador del pagare: <span class="badge badge-pill badge-success">{{ $pagare->estado->tipo }}</span></strong>
            @else
                <strong>Estador del pagare: <span class="badge badge-pill badge-danger">{{ $pagare->estado->tipo }}</span></strong>
            @endif
        </p>
        <div class="row">
            <div class="col-md-4">
                @include('digitador.pagares.partials.deudor')
            </div>
            <div class="col-md-4">
                @include('digitador.pagares.partials.codeudor')
            </div>
            <div class="col-md-4">
                @include('digitador.pagares.partials.paciente')
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                @include('digitador.pagares.partials.finanza')
            </div>
            <div class="col-md-4">
                @include('digitador.pagares.partials.mandato')
            </div>


{{--
            @if($pagare->estado_id == 2)
            <!-- CAJA DE PAGO DESHABILITADA
                <div class="col-md-4">
                    @include('digitador.pagares.partials.pagos')
                </div>
            -->
            @endif
--}}

        </div>
        @include('digitador.pagares.partials.tabla_acciones')
        @if($pagare->estado_id == 2 && $numero_pagos > 0)
            @include('digitador.pagares.partials.tabla_pagos')
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/sweet-alert/sweet-alert.min.js')}}"></script>
    <script>
        document.querySelector('#from1').addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                    title: "¿Seguro quiere validar el Pagare?",
                    text: "Al validar no podrá realizar más modificaciones!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Si, ¡seguro!',
                    cancelButtonText: "No, ¡cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: '¡Validado!',
                            text: 'Pagare terminado con éxito!',
                            type: 'success'
                        }, function() {
                            form.submit();
                        });

                    } else {
                        swal("Cancelado", "Podrás seguir modificando", "error");
                    }
                });
        });
    </script>
@endsection