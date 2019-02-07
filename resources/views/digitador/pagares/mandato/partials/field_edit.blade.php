
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
        {!! Form::text('rut', $mandato->rut != null ? formatoRut($mandato->rut) : '', ['class' => 'form-control']) !!}
    </div>
</div>