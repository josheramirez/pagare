<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('rut', 'RUT') !!}
            {!! Form::text('rut', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('paterno', 'Paterno') !!}
            {!! Form::text('paterno', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('materno', 'Materno') !!}
            {!! Form::text('materno', null, ['class' => 'form-control']) !!}
        </div>
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
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('username', 'Usuario') !!}
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Crear usuario</button>
