
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('nombre', 'Nombres') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('paterno', 'Apellido paterno') !!}
        {!! Form::text('paterno', null, ['class' => 'form-control', 'placeholder' => 'A. Paterno']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('materno', 'Apellido materno') !!}
        {!! Form::text('materno', null, ['class' => 'form-control', 'placeholder' => 'A. Materno']) !!}
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('rut', 'RUT') !!}
        {!! Form::text('rut', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('pasaporte', 'Pasaporte') !!}
        {!! Form::text('pasaporte', null, ['class' => 'form-control']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-2">
        {!! Form::label('vpm', 'N° VPM') !!}
        {!! Form::text('vpm', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('dau', 'N° DAU') !!}
        {!! Form::text('dau', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('prevision_id', 'Previsión') !!}
        {!! Form::select('prevision_id', $previsiones, null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('servicio_id', 'Servicio') !!}
        {!! Form::select('servicio_id', $servicios, null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('medico', 'Médico tratante') !!}
        {!! Form::text('medico', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- AGREGADO CAMPO prestacion-->
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('prestaciones', 'Prestaciones') !!}
        {!! Form::text('prestacion', null, ['class' => 'form-control']) !!}
    </div>
</div>


{!! Form::hidden('pagare_id', $pagare->id, ['class' => 'form-control']) !!}