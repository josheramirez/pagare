<table border="0" class="w-100">
    <tr style="text-align: justify">
        <td>
            Por lo tanto de constituido Pagaré <strong>Nº {{ $pagare->numeracion == null ? '*****' : $pagare->numeracion }}
            </strong> con fecha: <strong>{{ formatoFecha($pagare->fecha) }}</strong> Monto: <strong>${{formatoNull($pagare->deuda->total)}}</strong>
            Don (a) <strong>{{$pagare->deudor->full_nombre}}</strong> Rut:
            <strong>{{ formatoRut($pagare->deudor->rut) }}</strong> a favor del Hospital Regional de Copiapó.
        </td>
    </tr>
</table>