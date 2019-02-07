<table border="0" class="w-100" style="font-size: 11px">
    <tr>
        <td width="10%" rowspan="3">
            {{ Html::image('img/servicio_salud_atacama.jpg', 'a picture', ['width' => 60 , 'height' => 60]) }}
        </td>
        <td>
            SERVICIO DE SALUD ATACAMA
        </td>
        <td style="text-align: right" rowspan="3">{{ Html::image('img/acreditacion.png', 'a picture', ['width' => 60 , 'height' => 60]) }}</td>
    </tr>
    <tr>
        <td>
            <u>Departamento de Comercialización</u>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($pagare->codigo, 'C128')}}" alt="barcode" height="20" class="float-right" />
        </td>
    </tr>
    <tr>
        <td colspan="3" class="text-right">
            {{ $pagare->codigo }}
        </td>
    </tr>
</table>