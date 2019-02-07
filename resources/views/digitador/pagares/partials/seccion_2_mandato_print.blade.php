<table border="0" class="w-100" id="poderSeccion1">
    <tr>
        <td class="text-center" >
            <h2><strong>MANDATO ESPECIAL</strong></h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            La actuación personal del demandante no revocará por si solo el presente poder especial, ni lo exonera
            de realizar todas las gestiones necesarias ante la Isapre para obtener de esta el pago de las prestaciones
            recibidas en "el Hospital".
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>En comprobante firman:</td>
    </tr>
    <tr>
        <td>
            Beneficiario: <strong>{{ $pagare->mandato->full_nombre }}</strong> por <strong>Hospital Regional de Copiapó</strong>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            Datos del Afiliado:
        </td>
    </tr>
    <tr>
        <td>
            Nombre: <strong>{{ $pagare->paciente->full_nombre }}</strong> RUT: <strong>{{ formatoRut($pagare->paciente->rut) }}</strong>
        </td>
    </tr>
</table>