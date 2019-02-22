<table border="0" class="w-100">
    <tr>
        <td class="text-center">
            <h2><strong>PAGARE N° <?php echo e($pagare->numeracion == null ? '*****' : $pagare->numeracion); ?></strong></h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            En Copiapo a: <strong><?php echo e(formatoFecha($pagare->fecha)); ?></strong> Yo, <strong><?php echo e($pagare->deudor->full_nombre); ?></strong> Rut: <strong><?php echo e(formatoRut($pagare->deudor->rut)); ?></strong>,
            domicilio: <strong><?php echo e($pagare->deudor->direccion->calle); ?></strong> N° <strong><?php echo e(formatoNull($pagare->deudor->direccion->numero)); ?></strong>,
            <?php echo e($pagare->deudor->direccion->departamento == null ? '' : 'Depto'); ?>

            <strong><?php echo e($pagare->deudor->direccion->departamento == null ? '' : formatoNull($pagare->deudor->direccion->departamento) . ','); ?></strong>
            ciudad: <strong><?php echo e($pagare->deudor->direccion->ciudad); ?></strong> fono: <strong><?php echo e($pagare->deudor->direccion->fono); ?></strong>
            en adelante “el deudor”, debo y pagaré al Hospital Regional de Copiapo, en adelante “el Hospital” con domicilio en  Los Carreras 1320, la suma de
            <strong>$<?php echo e(formatoNull($pagare->deuda->total)); ?>, <?php echo e(formatoNull($pagare->valor_total)); ?> </strong>
            en la forma que más adelante se expresa, contra prestación de este documento.
            La deuda será pagada en el domicilio del acreedor, voluntariamente en dinero en efectivo o cheque de esta plaza,
            fecha de vencimiento: <strong> <?php echo e(formatoFecha($pagare->deuda->vencimiento)); ?></strong> para hospitalización se establecen <strong> <?php echo e(formatoNull($pagare->deuda->n_cuota)); ?></strong> cuotas de
            <strong>$<?php echo e(formatoNull($pagare->deuda->valor_cuota)); ?></strong> cada una.
            Nombre Paciente: <strong><?php echo e($pagare->paciente->full_nombre); ?></strong> Rut: <strong><?php echo e(formatoRut($pagare->paciente->rut)); ?></strong>
            Sistema Previsional: <strong> <?php echo e($pagare->paciente->prevision_id != null ? $pagare->paciente->prevision->nombre : '_____'); ?>

            </strong> N° VAS <strong><?php echo e(formatoNull($pagare->paciente->vas)); ?></strong>
            N° DAU <strong><?php echo e(formatoNull($pagare->paciente->dau)); ?>

            </strong> Servicio Clínico: <strong><?php echo e($pagare->paciente->servicio_id != null ? $pagare->paciente->servicio->nombre : '_______________'); ?></strong>.
        </td>
    </tr>
</table>