
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
        {!! Form::text('rut', $paciente->rut != null ? formatoRut($paciente->rut) : '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('pasaporte', 'Pasaporte') !!}
        {!! Form::text('pasaporte', null, ['class' => 'form-control']) !!}
    </div>
</div>
<hr>
<div class="form-row">
    <div class="form-group col-md-2">
        {!! Form::label('vas', 'N° VAS') !!}
        {!! Form::text('vas', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('dau', 'N° DAU') !!}
        {!! Form::text('dau', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('prevision_id', 'Previsión') !!}
        {!! Form::select('prevision_id', $previsiones, null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
    </div>

    <!-- AGREGADO CAMPO Modalidad de Atención-->
    <div class="form-group col-md-2">

        <?php 
            //return $modalidad;
        ?>
        {!! Form::label('modalidad_id', 'Modalidad de Atencion') !!}
        {!! Form::select('modalidad_id', $modalidad, null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
      <!--   <select id="tipo_modalidad" class="form-control" name="tipo_modalidad">
            <option value="INSTITUCIONAL">INSTITUCIONAL</option>
            <option value="ELECCION LIBRE">ELECCION LIBRE</option>
        </select>  -->
    </div>

    <div class="form-group col-md-3">
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