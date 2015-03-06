<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('admin.users.edit',$user) }}">Editar</a>
                <a href="#">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>