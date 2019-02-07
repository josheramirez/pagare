<!-- <table border="0" class="w-100">
    <tr>
        <td class="text-center">
            <h2><strong>PAGARE N° {{ $pagare->numeracion == null ? '*****' : $pagare->numeracion }}</strong></h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            En Copiapó a: <strong>{{ formatoFecha($pagare->fecha) }}</strong> Yo, <strong>{{$pagare->deudor->full_nombre}}</strong> Rut: <strong>{{ formatoRut($pagare->deudor->rut) }}</strong>,
            domicilio: <strong>{{ $pagare->deudor->direccion->calle }}</strong> N° <strong>{{ formatoNull($pagare->deudor->direccion->numero) }}</strong>,
            {{ $pagare->deudor->direccion->departamento == null ? '' : 'Depto'}}
            <strong>{{ $pagare->deudor->direccion->departamento == null ? '' : formatoNull($pagare->deudor->direccion->departamento) . ','}}</strong>
            ciudad: <strong>{{ $pagare->deudor->direccion->ciudad }}</strong> fono: <strong>{{ $pagare->deudor->direccion->fono }}</strong>
            en adelante “el deudor”, debo y pagaré al Hospital Regional de Copiapo, en adelante “el Hospital” con domicilio en  Los Carreras 1320, la suma de
            <strong>${{formatoNull($pagare->deuda->total)}}, {{ formatoNull($pagare->valor_total) }} </strong>
            en la forma que más adelante se expresa, contra prestación de este documento.
            La deuda será pagada en el domicilio del acreedor, voluntariamente en dinero en efectivo o cheque de esta plaza,
            fecha de vencimiento: <strong> {{ formatoFecha($pagare->deuda->vencimiento) }}</strong> para hospitalización se establecen cuotas de
            <strong>${{ formatoNull($pagare->deuda->valor_cuota) }}</strong> cada una.
            Nombre Paciente: <strong>{{ $pagare->paciente->full_nombre }}</strong> Rut: <strong>{{ formatoRut($pagare->paciente->rut) }}</strong>
            Sistema Previsional: <strong> {{ $pagare->paciente->prevision_id != null ? $pagare->paciente->prevision->nombre : '_____' }}
            </strong> N° VAS <strong>{{ formatoNull($pagare->paciente->vas) }}</strong>
            N° DAU <strong>{{ formatoNull($pagare->paciente->dau) }}
            </strong> Servicio Clínico: <strong>{{ $pagare->paciente->servicio_id != null ? $pagare->paciente->servicio->nombre : '_______________' }}</strong>.
        </td>
    </tr>
</table>
 -->

<table border="0" class="w-100">
    <tr>
        <td class="text-center">
            <h2><strong>PAGARE N° <?php echo e($pagare->numeracion == null ? '*****' : $pagare->numeracion); ?></strong></h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            En Copiarock a: <strong><?php echo e(formatoFecha($pagare->fecha)); ?></strong> Yo, <strong><?php echo e($pagare->deudor->full_nombre); ?>  
            </strong> Rut: <strong><?php echo e(formatoRut($pagare->deudor->rut)); ?></strong>,
            
            <!-- DOMICILIO, NUMERO-->
            domicilio: <strong><?php echo e(formatoNull($pagare->deudor->direccion->calle)); ?>
            </strong> N° <strong><?php echo e(formatoNull($pagare->deudor->direccion->numero)); ?></strong>,
            
            <!--DEPARTAMENTO (OPCIONAL)-->
            <?php echo e($pagare->deudor->direccion->departamento == null ? '' : 'Depto'); ?>
            <strong><?php echo e($pagare->deudor->direccion->departamento == null ? '' : formatoNull($pagare->deudor->direccion->departamento) . ','); ?></strong>

            <!-- POBLACION (OPCIONAL)-->
            <?php echo e($pagare->deudor->direccion->poblacion == null ? '' : 'Poblacion'); ?>
            <strong><?php echo e($pagare->deudor->direccion->poblacion == null ? '' : formatoNull($pagare->deudor->direccion->poblacion) . ','); ?></strong>

            <!-- CIUDAD-->
            ciudad: <strong><?php echo e(formatoNull($pagare->deudor->direccion->ciudad)); ?>,
                
            <!-- TELEFONO -->    
            </strong> fono: <strong><?php echo e(formatoNull($pagare->deudor->direccion->fono)); ?></strong>

            <!-- VALOR-->  
            en adelante “el deudor”, debo y pagaré al Hospital Regional de Copiapo, en adelante “el Hospital” con domicilio en  Los Carreras 1320, la suma de
            <strong>$<?php echo e(formatoNull($pagare->deuda->total)); ?>, <?php echo e(formatoNull($pagare->valor_total)); ?> </strong>

            <!-- FECHA VENCIMIENTO-->  
            en la forma que más adelante se expresa, contra prestación de este documento.
            La deuda será pagada en el domicilio del acreedor, voluntariamente en dinero en efectivo o cheque de esta plaza,
            fecha de vencimiento: <strong> <?php echo e(formatoFecha($pagare->deuda->vencimiento)); ?>
            
            <!-- CUOTA-->  
            </strong> para hospitalización se establecen <strong><?php echo e(formatoNull($pagare->deuda->n_cuota)); ?> </strong> cuotas de
            <strong>$<?php echo e(formatoNull($pagare->deuda->valor_cuota)); ?></strong> cada una.

            <!-- PACIENTE-->  
            Nombre Paciente: <strong><?php echo e(formatoNull($pagare->paciente->full_nombre)); ?></strong> Rut: <strong><?php echo e(formatoRut($pagare->paciente->rut)); ?></strong>
            Sistema Previsional: <strong> <?php echo e($pagare->paciente->prevision_id != null ? $pagare->paciente->prevision->nombre : '_____'); ?>

            </strong> N° VAS <strong><?php echo e(formatoNull($pagare->paciente->vas)); ?></strong>
            N° DAU <strong><?php echo e(formatoNull($pagare->paciente->dau)); ?>

            </strong> Servicio Clínico: <strong><?php echo e($pagare->paciente->servicio_id != null ? $pagare->paciente->servicio->nombre : '_______________'); ?></strong>.
        </td>
    </tr>
</table>