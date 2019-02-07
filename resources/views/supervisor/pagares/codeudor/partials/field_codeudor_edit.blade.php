
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
        {!! Form::label('nacionalidad', 'Nacionalidad') !!}
        {!! Form::text('nacionalidad', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('rut', 'RUT') !!}
        {!! Form::text('rut', $codeudor->rut != null ? formatoRut($codeudor->rut) : '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('pasaporte', 'Pasaporte') !!}
        {!! Form::text('pasaporte', null, ['class' => 'form-control']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('fono', 'Fono') !!}
        {!! Form::text('fono', $codeudor->direccion->fono, ['class' => 'form-control', 'placeholder' => '+569...']) !!}
    </div>
    <div class="form-group col-md-8">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $codeudor->direccion->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-8">
        {!! Form::label('profesion', 'Profesión') !!}
        {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('calle', 'Calle') !!}
        {!! Form::text('calle', $codeudor->direccion->calle, ['class' => 'form-control', 'placeholder' => 'Psje. Av.']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('poblacion', 'Población /O Villa') !!}
        {!! Form::text('poblacion', $codeudor->direccion->poblacion, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('numero', 'N°') !!}
        {!! Form::text('numero', $codeudor->direccion->numero, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('departamento', 'Depto.') !!}
        {!! Form::text('departamento', $codeudor->direccion->departamento, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('comuna', 'Comuna') !!}
        {!! Form::text('comuna', $codeudor->direccion->comuna, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('ciudad', 'Ciudad') !!}
        {!! Form::text('ciudad', $codeudor->direccion->ciudad, ['class' => 'form-control']) !!}
    </div>
</div>