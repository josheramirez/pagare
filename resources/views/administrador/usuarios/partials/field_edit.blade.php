
<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('paterno', 'Apellido paterno') !!}
    {!! Form::text('paterno', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('materno', 'Apellido materno') !!}
    {!! Form::text('materno', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('rut', 'RUT') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('activo', 'Estado') !!}
    <div class="radio">
        <label>
            {!! Form::radio('activo', 1, null, ['id'=> 'activo']) !!}
            Activo
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('activo', 0, null, ['id'=> 'inactivo']) !!}
            Inactivo
        </label>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('rol_id', 'Rol') !!}
                {!! Form::select('rol_id', $roles, null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('username', 'Usuario') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>
<div class="form-check">
    {!! Form::checkbox('reset', '1', null, ['class' => 'form-check-input']); !!}
    {!! Form::label('reset', 'Resetear contraseña', ['class' => 'form-check-label']) !!}
</div>
<br>