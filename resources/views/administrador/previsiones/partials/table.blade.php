<table class="table table-bordered table-hover">
    <thead>
        <tr class="active">
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($previsiones as $prevision)
        <tr>
            <td>{{ $prevision->nombre }}</td>
            <td>
                <span class="badge {{$prevision->activo == 1 ? 'badge-success' : 'badge-danger'}}">{{ $prevision->activo == 1 ? 'Activo' : 'Inactivo' }}</span>
            </td>
            <td>
                <a href="{{ route('administrador.previsiones.edit', $prevision->id) }}"
                   class="btn btn-primary btn-sm" title="Editar usuario">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $previsiones->links("pagination::bootstrap-4") }}