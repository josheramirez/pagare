<div class="form-row">
 <?= $deuda->id?>
    
    <div class="form-group col-md-2">
        {!! Form::label('vencimiento', 'Fecha vencimiento') !!}
        {!! Form::date('vencimiento', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('plazo', 'Plazo') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Días</span>
            </div>
            {!! Form::number('plazo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('total', 'Suma total') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {!! Form::number('total', null, ['class' => 'form-control']) !!}
            {{-- Form::number('total', null, ['class' => 'form-control', 'onblur' => 'divideBy()']) --}}
        </div>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('n_cuota', 'Número de cuotas') !!}
        {!! Form::number('n_cuota', null, ['class' => 'form-control']) !!}
        {{-- Form::number('n_cuota', null, ['class' => 'form-control', 'onblur' => 'divideBy()']) --}}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('valor_cuota', 'Valor cuota') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {!! Form::number('valor_cuota', null, ['class' => 'form-control',]) !!}
        </div>
    </div>
</div>
{!! Form::hidden('pagare', $deuda->pagare->id) !!}