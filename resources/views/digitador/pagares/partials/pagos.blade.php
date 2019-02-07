<div class="card border-dark">
    <div class="card-body">
        <h5 class="card-title">Pagos</h5>
        @if($pagare->deuda->cuota)
            <p class="card-text">Último pago registrado {{ formatoFecha($ultimo_pago->f_pago) }}</p>
            @if($pagare->estado_id !== 3)
                <p class="card-text">Cuota N° {{ $ultimo_pago->n_cuota }} monto: ${{ $ultimo_pago->monto }}</p>
                <a href="{{ route('pagare.pago.create', [$pagare->id]) }}" class="card-link float-right">Agregar</a>
            @endif
        @else
            <p class="card-text text-secondary"><em>Sin pagos asociados al pagare. </em></p>
            @if($pagare->estado_id !== 3)
                <p class="card-text text-secondary">Para generar generar un pago hacer click en "crear".</p>
                <a href="{{ route('pagare.pago.create', [$pagare->id]) }}" class="card-link">Crear</a>
            @endif
        @endif
    </div>
</div>