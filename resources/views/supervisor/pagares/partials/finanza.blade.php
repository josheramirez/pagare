<div class="card border-success">
    <div class="card-body">
        <h5 class="card-title">Deuda</h5>
        <p class="card-text">Total: ${{ $pagare->deuda->total }}</p>
        <p class="card-text">N° cuotas : {{ $pagare->deuda->n_cuota }}</p>
        @if($pagare->estado_id !== 3)
            <a href="{{ route('supervisor.pagare.deuda.edit', [$pagare->deuda_id]) }}" class="card-link float-right">Editar</a>
        @endif
    </div>
</div>