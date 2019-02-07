<div class="card border-warning">
    <div class="card-body">
        <h5 class="card-title">Mandato Especial</h5>
        @if(is_null($pagare->mandato_id))
            <p class="card-text text-secondary"><em>Sin Mandato Especial creado. </em></p>
            @if($pagare->estado_id !== 3)
                <p class="card-text text-secondary">Para generar el mandato haga click en "crear".</p>
                <a href="{{ route('supervisor.pagare.mandato.create', [$pagare->id]) }}" class="card-link">Crear</a>
            @endif
        @else
            <p class="card-text">{{ $pagare->mandato->full_nombre}}</p>
            <p class="card-text">RUT : {{ formatoRut($pagare->mandato->rut) }}</p>
            <a href="{{ route('supervisor.pagare.mandato.edit', [$pagare->mandato_id]) }}" class="card-link float-right">Editar</a>
        @endif
    </div>
</div>