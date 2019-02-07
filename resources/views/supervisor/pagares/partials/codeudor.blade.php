<div class="card border-info">
    <div class="card-body">
        <h5 class="card-title">Codeudor</h5>
        <p class="card-text">{{ $pagare->codeudor->full_nombre == ''? 'Sin informmación' : $pagare->codeudor->full_nombre }}</p>
        <p class="card-text">RUT: {{ formatoRut($pagare->codeudor->rut) }}</p>
        @if($pagare->estado_id !== 3)
            <a href="{{ route('supervisor.pagare.codeudor.edit', [$pagare->codeudor_id]) }}" class="card-link float-right">Editar</a>
        @endif
    </div>
</div>