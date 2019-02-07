
<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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