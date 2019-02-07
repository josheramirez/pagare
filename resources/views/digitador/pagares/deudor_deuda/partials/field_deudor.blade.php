
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
        {!! Form::text('rut', null,['oninput'=>"funcion_ajax()",'class' => 'form-control', 'autocomplete'=>'off','placeholder' => 'RUT debe registrarse sin puntos ni guión'])!!}
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
        {!! Form::text('fono', null, ['class' => 'form-control', 'placeholder' => '+569...']) !!}
    </div>
    <div class="form-group col-md-8">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('calle', 'Calle') !!}
        {!! Form::text('calle', null, ['class' => 'form-control', 'placeholder' => 'Psje. Av.']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('poblacion', 'Población /O Villa') !!}
        {!! Form::text('poblacion', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('numero', 'N°') !!}
        {!! Form::text('numero', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('departamento', 'Depto.') !!}
        {!! Form::text('departamento', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('comuna', 'Comuna') !!}
        {!! Form::text('comuna', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('ciudad', 'Ciudad') !!}
        {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
    </div>
</div>