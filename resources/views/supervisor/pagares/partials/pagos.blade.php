<div class="card border-dark">
    <div class="card-body">
        <h5 class="card-title">Pagos</h5>

<!-- PREGUNTO SI HAY PAGOS CREADOS-->
        @if($numero_pagos)
            <!-- SI SE HA REALIZADO ALGUN PAGO (DE CUOTA), SIGNIFICA QUE YA NO EXISTEN ABONOS  -->
            @if($ultimo_pago)
                
                @if($ultimo_pago->n_cuota==$numero_pagos)
                        <p class="card-text">Último pago registrado {{ formatoFecha($ultimo_pago->f_pago) }}</p>
                        @if($pagare->estado_id !== 3)
                        <p class="card-text">Cuota N° {{ $ultimo_pago->n_cuota }} de un total de {{ $numero_pagos }}</p>
                        <p class="card-text">Esta Deuda se encuentra completamente Pagada</p>
                        @endif
                @else
                        <p class="card-text">Último pago registrado {{ formatoFecha($ultimo_pago->f_pago) }}</p>
                        @if($pagare->estado_id !== 3)
                        <p class="card-text">Cuota N° {{ $ultimo_pago->n_cuota }} monto: ${{ $ultimo_pago->monto }}</p>
                        <a href="{{ route('supervisor.pagare.pago.create', [$pagare->id]) }}" class="card-link float-right">Agregar</a>     
                @endif

            @endif
            <!-- SI NO HAY PAGOS DE CUOTAS , PUEDE QUE HAYA PAGOS DE ABONOS-->
            @else
                    <p class="card-text"> <em>Aun no se paga la primera Cuota</em></p>
                    <p class="card-text">Paga la 1° de {{ $numero_pagos}} cuotas</p>
                    <a href="{{ route('supervisor.pagare.pago.create', [$pagare->id]) }}" class="card-link float-right">Agregar</a>
            @endif
<!-- NO HAY CUOTAS CREADAS -->       
        @else

            <p class="card-text text-secondary"><em>No hay cuotas asociadas al pagare. </em></p>
            @if($pagare->estado_id !== 3)

            <p class="card-text text-secondary">Puedes generar una deuda con cuotas o Abonar.</p>

            <!-- SOLO GENERO PAGOS DE ABONO SIN DEUDA -->
            <a href="{{ route('supervisor.pagare.pago.create', [$pagare->id]) }}" class="card-link float-right">Agregar</a>
            
            @endif
        @endif




    </div>
</div>