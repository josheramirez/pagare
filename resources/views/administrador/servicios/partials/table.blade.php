<table class="table table-bordered table-hover">
    <thead>
        <tr class="active">
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($servicios as $servicio)
        <tr>
            <td>{{ $servicio->nombre }}</td>
            <td>
                <span class="badge {{$servicio->activo == 1 ? 'badge-success' : 'badge-danger'}}">{{ $servicio->activo == 1 ? 'Activo' : 'Inactivo' }}</span>
            </td>
            <td>
                <a href="{{ route('administrador.servicios.edit', $servicio->id) }}"
                   class="btn btn-primary btn-sm" title="Editar usuario">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$servicios->links("pagination::bootstrap-4")}}