
<div class="form-row">
    <div class="form-group col-md-2">
        {!! Form::label('n_cuota', 'Número cuota') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">N°</span>
            </div>
            {!! Form::number('n_cuota', $numero_cuota, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('monto', 'Valor') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {!! Form::number('monto', $pagare->deuda->valor_cuota, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('f_pago', 'Fecha pago') !!}
        {!! Form::text('f_pago', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('n_boleta', 'Número boleta') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">N°</span>
            </div>
            {!! Form::number('n_boleta', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
        {!! Form::label('detalle', 'Detalle') !!}
        {!! Form::text('detalle', null, ['class' => 'form-control']) !!}
    </div>
</div>
{!! Form::hidden('deuda_id', $pagare->deuda->id) !!}