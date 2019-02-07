<div class="card border-danger">
    <div class="card-body">
        <h5 class="card-title">Paciente</h5>
        <p class="card-text">{{ $pagare->paciente->full_nombre == ''? 'Sin informmación' : $pagare->paciente->full_nombre }}</p>
        <p class="card-text">RUT: {{ formatoRut($pagare->paciente->rut) }}</p>
        @if($pagare->estado_id !== 3)
            <a href="{{ route('pagare.paciente.edit', [$pagare->paciente_id]) }}" class="card-link float-right">Editar</a>
        @endif
    </div>
</div>