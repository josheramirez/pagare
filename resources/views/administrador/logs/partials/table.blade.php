<table class="table table-bordered table-hover">
    <thead>
        <tr class="active">
            <th>RUT</th>
            <th>Usuario</th>
            <th>Código</th>
            <th>Acción</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td>{{ formatoRut($log->rut) }}</td>
            <td>{{ $log->usuario }}</td>
            <td>{{ $log->pagare }}</td>
            <td>{{ $log->accion }}</td>
            <td>{{ formatoFechaHora($log->created_at) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>