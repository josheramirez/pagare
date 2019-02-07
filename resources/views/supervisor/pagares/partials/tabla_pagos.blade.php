
@if($pago_sin_deuda!=0)
    <br>
    <div class="card">
        <div class="card-body">
            <?php $conta=1; ?>        
            <h5 class="card-title">Abonos</h5>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">N° Abono</th>
                   
                    <th scope="col">Monto Pagado</th>
                    
                    <th scope="col">F. Pago realizado</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Boleta / Bono</th>
                </tr>
                </thead>
                <tbody>
    
                    @foreach($abonos as $pago)
                        <tr>
                            <th scope="row">{{ $conta }}</th>
                            
                            <td>{{ $pago->monto }}</td>
                         
                            <td>{{ formatoFecha($pago->f_pago) }}</td>
                            <td>{{ $pago->estado }}</td>
                            <td>{{ $pago->n_boleta }}</td>
                        </tr>
                        <?php $conta++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

 @endif
        

@if($numero_pagos!=0)
<br>
<div class="card">
    <div class="card-body">

    <h5 class="card-title">Lista de Pagos</h5>

        
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">N° cuota</th>
                <th scope="col">Monto Cuota</th>
                <th scope="col">Monto Pagado</th>
                <th scope="col">F. Vencimiento</th>
                <th scope="col">F. Pago realizado</th>
                <th scope="col">Estado cuota</th>
                <th scope="col">Boleta / Bono</th>
            </tr>
            </thead>
            <tbody>

    
               @foreach($pagos as $pago)
                    <?php  if($pago->n_cuota==0||$pago->estado=="antiguo")continue;?>
                    <tr>
                        <th scope="row">{{ $pago->n_cuota }}</th>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->monto_pagado }}</td>
                        <td>{{ formatoFecha($pago->f_vencimiento) }}</td>
                        <td>{{ formatoFecha($pago->f_pago) }}</td>
                        <td>{{ $pago->estado }}</td>
                        <td>{{ $pago->n_boleta }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
 @endif

