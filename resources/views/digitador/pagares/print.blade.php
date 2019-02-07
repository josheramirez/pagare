@extends('layouts.app')

@section('styles')
    <style>
        @media all {
            div.saltoDePagina{
                display: none;
            }
        }
        /* cuando vayamos a imprimir ... */
        @media print{
            /* indicamos el salto de pagina */
            div.saltoDePagina{
                display:block;
                page-break-before:always;
            }
            .no-print {
                visibility: hidden;
            }
        }
        .borde-inferior{
            border-bottom: 1px solid #ccc;
        }
        table{
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container justify-content-center">
        {{-- Header --}}
        @include('digitador.pagares.partials.header')
        {{-- Pagare --}}
        @include('digitador.pagares.partials.seccion_1_print')
        <br>
        @include('digitador.pagares.partials.seccion_2_print')
        <br>
        @include('digitador.pagares.partials.seccion_3_print')
        <br>
        @include('digitador.pagares.partials.seccion_4_print')
        <br>
        @include('digitador.pagares.partials.seccion_5_print')
        <div class="saltoDePagina"></div>
        {{-- Poder especial --}}
        @if($pagare->mandato_id != null)
            @include('digitador.pagares.partials.seccion_2_mandato_print')
        @endif
        {{-- Poder especial --}}
        @include('digitador.pagares.partials.seccion_1_poder_print')
        <div class="no-print">
            <hr>
            <br>
            <a href="{{ route('pagare.view', [$pagare->id]) }}" class="btn btn-secondary float-left btn-lg">Volver </a>
            <a onclick="javascript:window.print();" class="btn btn-success float-right btn-lg" href="#">Imprimir Pagare</a>
            <br>
            <br>
            <hr>
        </div>
    </div>
@endsection