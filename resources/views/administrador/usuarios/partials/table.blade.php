<table class="table table-bordered table-hover">
    <thead>
        <tr class="active">
            <th>Nombre</th>
            <th>RUT</th>
            <th>Perfil</th>
            <th>Activo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->full_nombre }}</td>
            <td>{{ formatoRut($user->rut) }}</td>
            <td>{{ $user->rol->rol }}</td>
            <td>
                <span class="badge {{$user->activo == 1 ? 'badge-success' : 'badge-danger'}}">{{ $user->activo == 1 ? 'Activo' : 'Inactivo' }}</span>
            </td>
            <td>
                <a href="{{ route('administrador.users.edit', $user->id) }}"
                   class="btn btn-primary btn-sm" title="Editar usuario">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $users->links() }}