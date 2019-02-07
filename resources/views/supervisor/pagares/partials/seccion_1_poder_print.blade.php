<table border="0" class="w-100" style="font-size: 11px" id="poderSeccion1">
    <tr>
        <td class="text-center" >
            <h2><strong>PODER ESPECIAL</strong></h2>
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            El suscriptor del pagaré folio <strong>Nº {{ $pagare->numeracion == null ? '*****' : $pagare->numeracion }}</strong>, como su codeudor solidario y aval, en adelante el aval, ambos individualizados
            al final del presente instrumento, el primero en su calidad de usuario del Hospital de Copiapó, Establecimiento de Salud
            dependiente del Servicio de Salud Atacama, Persona Jurídica de Derecho Público, RUT 61.606.307-3 y el segundo en su calidad
            de aval del mismo, vienen en otorgar y conferir PODER ESPECIAL, pero tan amplio como en derecho se requiera, al Servicio de
            Salud Atacama, a fin de que éste, en su nombre y representación complete el pagaré suscrito por el suscriptor y el codeudor
            solidario aval, en favor del Servicio de Salud Atacama, en cuanto al monto adeudado, reajustes y multas , si hubiere, y la
            fecha de vencimiento del mismo.
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            El presente poder es de carácter suficiente e irrevocable en los términos del Artículo 241 del Código de Comercio, y
            faculta al Servicio de Salud Atacama, para que por medio de cualquiera de sus mandatarios habilitados, complete el pagaré,
            que se ha suscrito en su favor con esta fecha.
        </td>
    </tr>
</table>
<br>
<table border="0" class="w-100" style="font-size: 11px">
    <tr>
        <td>
            Poderante (Deudor) <strong>{{ $pagare->deudor->full_nombre }}</strong> de nacionalidad <strong>{{ $pagare->deudor->nacionalidad }}</strong>
            RUT: <strong>{{ formatoRut($pagare->deudor->rut) }}</strong>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Firma _________________________</td>
    </tr>
</table>
<hr>
<table border="0" class="w-100" style="font-size: 11px">
    <tr>
        <td>
            Codeudor Solidario y Aval <strong>{{ $pagare->codeudor->full_nombre }}</strong> de nacionalidad <strong>{{ $pagare->codeudor->nacionalidad }}</strong>
            RUT: <strong>{{ formatoRut($pagare->codeudor->rut) }}</strong>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Firma _________________________</td>
    </tr>
</table>
<hr>
<table border="0" class="w-100" style="font-size: 11px">
    <tr>
        <td colspan="4">
            DOMICILIO DEUDOR:
        </td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->calle }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->numero }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->depto }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->poblacion }}</strong>
        </td>
    </tr>
    <tr>
        <td>CALLE</td>
        <td>N°</td>
        <td>DEPTO</td>
        <td>VILLA /O POBLACIÓN</td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->comuna }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->ciudad }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->fono }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->deudor->direccion->email}}</strong>
        </td>
    </tr>
    <tr>
        <td>COMUNA</td>
        <td>CIUDAD</td>
        <td>TELÉFONO</td>
        <td>E-MAIL</td>
    </tr>
</table>
<hr>
<table border="0" class="w-100" style="font-size: 11px">
    <tr>
        <td colspan="4">
            DOMICILIO CODEUDOR SOLIDARIO Y AVAL:
        </td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->calle }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->numero }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->depto }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->poblacion }}</strong>
        </td>
    </tr>
    <tr>
        <td>CALLE</td>
        <td>N°</td>
        <td>DEPTO</td>
        <td>VILLA /O POBLACIÓN</td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->comuna }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->ciudad }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->fono }}</strong>
        </td>
        <td style="border-bottom: 1px solid">
            <strong>{{ $pagare->codeudor->direccion->email}}</strong>
        </td>
    </tr>
    <tr>
        <td>COMUNA</td>
        <td>CIUDAD</td>
        <td>TELÉFONO</td>
        <td>E-MAIL</td>
    </tr>
</table>