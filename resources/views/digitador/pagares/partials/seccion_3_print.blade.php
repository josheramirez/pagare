<table border="0" class="w-100">
    <tr style="text-align: justify">
        <td>
            En caso de mora o simple retardo en el pago de una o cualquiera de las cuotas antes indicadas, la deuda que consta en este Pagaré
            y todas las demás obligaciones de crédito de dinero que el deudor hubiere contraído o contraiga, se considerarán de plazo vencido
            haciéndose exigible el total de lo adeudado y devengándose, en ese caso, como interés moratorio el interés máximo convencional para
            operaciones no reajustables, vigente a esta fecha o a las épocas de mora o retardo. El interés moratorio indicado se aplicará sobre
            el total del saldo adeudado, desde mora o simple retardo y hasta fecha de su pago efectivo. En caso de cobro judicial, corresponderá
            al deudor acreditar el pago de las cuotas de servicio de este Pagaré y solventar los costos procesales que se originen. Las partes
            fijan su domicilio para todos estos efectos del presente Pagaré la ciudad de Copiapó prorrogando jurisdicción ante sus Tribunales.
            Todas las obligaciones emanadas del presente Pagaré tienen el carácter de indivisibles para todos los efectos legales.
            A fin de prevenir conflictos o litigios relacionados con el pago de esta deuda firmo este Pagaré y me obligo a cumplir oportunamente
            con los pagos del crédito que reconozco adeudar a la institución.
        </td>
    </tr>
    <tr>
        <td style="text-align: justify">
            Presente a este acto D. <strong>{{ $pagare->codeudor->full_nombre }}</strong> Profesión: <strong>{{ $pagare->codeudor->profesion }}</strong>
            domicilio: <strong>{{ $pagare->codeudor->direccion->calle . ' N° ' . $pagare->codeudor->direccion->numero . '' . $pagare->codeudor->direccion->departamento }}</strong>
            Cuidad: <strong>{{ $pagare->codeudor->direccion->ciudad }}</strong> quien se constituye en fiador y codeudor solidario de todas las obligaciones del deudor derivadas de este Pagaré,
            aceptando desde luego, las eventuales prórrogas o esperas que pudieran convenirse entre el deudor y el Hospital de Copiapó o quién a sus
            derechos represente, ya sea con o sin abono, con o sin protesto, en este mismo instrumento, o en uno distinto. El deudor y los obligados al
            pago renuncian a todo trámite de notificación, requerimiento de pago, protesto, y aviso por falta de pago. Todos los gastos de otorgamiento
            de este instrumento, serán de cargo del deudor.
        </td>
    </tr>
</table>