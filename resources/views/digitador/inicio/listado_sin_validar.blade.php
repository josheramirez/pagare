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
                        <h2 class="text-secondary">Listado de Pagares</h2>
                        <br>
                        @if($pagares->count() == 0)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Lo siento!</h4>
                                <p>No hay pagares registrados.</p>
                            </div>
                        @else
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Deudor</th>
                                    <th scope="col">RUT</th>
                                    <th scope="col">Creado por</th>
                                    <th scope="col">Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pagares as $pagare)
                                    <tr>
                                        <td>{{ formatoFecha($pagare->created_at)  }}</td>
                                        <td>{{ $pagare->deudor->full_nombre }}</td>
                                        <td>{{ formatoRut($pagare->deudor->rut) }}</td>
                                        <td>{{ $pagare->usuario->full_nombre }}</td>
                                        <td><a href="{{route('pagare.view', [$pagare->id])}}"><i class="fas fa-sign-in-alt"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$pagares->links("pagination::bootstrap-4")}}
                        @endif
                        <div class="row text-right">
                            <div class="col-md-12">
                                <a href="{{ route('digitador.index') }}" class="btn btn-light">Volver</a>
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
