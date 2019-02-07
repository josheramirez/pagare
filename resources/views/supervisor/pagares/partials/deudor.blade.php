<div class="card border-primary">
    <div class="card-body">
        <h5 class="card-title">Deudor</h5>
        <p class="card-text">{{ $pagare->deudor->full_nombre }}</p>
        @if(!is_null($pagare->deudor->rut))
            <p class="card-text">RUT: {{ formatoRut($pagare->deudor->rut) }}</p>
        @else
            <p class="card-text">Pasaporte: {{ $pagare->deudor->pasaporte }}</p>
        @endif
        @if($pagare->estado_id !== 3)
            <a href="{{ route('supervisor.pagare.deudor.edit', [$pagare->deudor_id]) }}" class="card-link float-right">Editar</a>
        @endif
    </div>
</div>