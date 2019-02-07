
<script>
    function calcular_pago(total){
        pago = document.getElementById("monto").value;
        total_pagado= $('input[name=total_pagado]').val();
        deuda= $('input[name=deuda_monto]').val();

        nueva_deuda=deuda-total_pagado-pago;
        
        //alert( deuda+"\n-"+total_pagado+"\n-"+pago+"\n"+nueva_deuda);
    }
</script>

<?php  
if ($numero_cuota!=null) { 
?>
    {!! Form::hidden('cuota_id', $numero_cuota->id) !!}
    {!! Form::hidden('total_pagado', $total_pagado) !!}
    {!! Form::hidden('deuda_id', $pagare->deuda->id) !!}
    {!! Form::hidden('deuda_monto',  $pagare->deuda->total) !!}
    {!! Form::hidden('pagare_id',  $pagare->id) !!}


    <div class="form-row">
        <div class="form-group col-md-2">
            
            {!! Form::label('n_cuota', 'Número cuota') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">N°</span>
                </div>
                {{-- $pagare_id--}}
                {!! Form::number('n_cuota', $numero_cuota->n_cuota, ['class' => 'form-control','readonly']) !!}
            </div>
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('monto', 'Valor') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                {!! Form::number('monto', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('f_pago', 'Fecha pago') !!}
            {!! Form::text('f_pago', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('n_boleta', 'Número boleta') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">N°</span>
                </div>
                {!! Form::number('n_boleta', null, ['class' => 'form-control','onblur' => 'calcular_pago()']) !!}
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            {!! Form::label('detalle', 'Detalle') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control']) !!}
        </div>
    </div>


<?php 
}else{

// CUOTA DE TIPO ABONO, SIN DEUDA
?>

    {!! Form::hidden('cuota_id', 0) !!}
    {!! Form::hidden('total_pagado', $total_pagado) !!}
    {!! Form::hidden('deuda_id', $pagare->deuda->id) !!}
    {!! Form::hidden('deuda_monto',  $pagare->deuda->total) !!}


    {!! Form::hidden('pagare_id',  $pagare->id) !!}



    <div class="form-row">
        <div class="form-group col-md-2">
            
            {!! Form::label('n_cuota', 'Número cuota') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">N°</span>
                </div>
                {{-- $pagare_id--}}
                {!! Form::number('n_cuota', "1", ['class' => 'form-control','readonly']) !!}
            </div>
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('monto', 'Valor') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                {!! Form::number('monto', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('f_pago', 'Fecha pago') !!}
            {!! Form::text('f_pago', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('n_boleta', 'Número boleta') !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">N°</span>
                </div>
                {!! Form::number('n_boleta', null, ['class' => 'form-control','onblur' => 'calcular_pago()']) !!}
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            {!! Form::label('detalle', 'Detalle') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control']) !!}
        </div>
    </div>





<?php
}
?>



