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
                        <h2 class="text-secondary">Listado</h2>
                        @if($pagares->count() == 0)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Lo siento!</h4>
                                <p>No existe Pagare asociado al RUT ingresado.</p>
                                <hr>
                                <p class="mb-0">Favor vuelva al inicio y busque por código de barras o número de Pagare</p>
                            </div>
                        @else
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">N° Pagare</th>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Paciente Rut</th>
                                    <th scope="col">Deudor</th>
                                    <th scope="col">Deudor Rut</th>
                                    <th scope="col">Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pagares as $pagare)
                                    <tr>
                                        <th scope="row">{{ $pagare->numeracion }}</th>
                                        <td>{{ formatoFecha($pagare->created_at)  }}</td>
                                        <td>{{ $pagare->paciente_nombre }}</td>
                                        <td>{{ formatoRut($pagare->paciente_rut) }}</td>
                                        <td>{{ $pagare->deudor_nombre }}</td>
                                        <td>{{ formatoRut($pagare->deudor_rut) }}</td>
                                        <td><a href="{{route('supervisor.pagare.view', [$pagare->id])}}"><i class="fas fa-sign-in-alt"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div class="row text-right">
                            <div class="col-md-12">
                                <a href="{{ route('supervisor.index') }}" class="btn btn-light">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
@endsection
