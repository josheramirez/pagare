<table class="w-100" style="font-size: 11px">
    <tr style=":hover">
        <td>Deudor Firma:</td>
        <td width="25%" class="borde-inferior"></td>
        <td width="2%"></td>
        <td>Codeudor Solidario Firma:</td>
        <td width="25%" class="borde-inferior"></td>
    </tr>
    <tr>
        <td>RUT:</td>
        <td class="borde-inferior"><strong>{{ $pagare->deudor->rut != null ? formatoRut($pagare->deudor->rut) : '' }}</strong></td>
        <td width="1%"></td>
        <td>RUT:</td>
        <td class="borde-inferior"><strong>{{ $pagare->codeudor->rut != null ? formatoRut($pagare->codeudor->rut) : '' }}</strong></td>
    </tr>
    <tr>
        <td>Autorizo firma de deudor D:</td>
        <td class="borde-inferior"></td>
        <td width="1%"></td>
        <td>RUT:</td>
        <td class="borde-inferior"></td>
    </tr>
    <tr>
        <td>y fiador y codeudor solidario D:</td>
        <td class="borde-inferior"></td>
        <td width="1%"></td>
        <td>RUT:</td>
        <td class="borde-inferior"></td>
    </tr>
</table>