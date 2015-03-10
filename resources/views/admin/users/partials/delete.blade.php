{!! Form::open(['route'=>['admin.users.destroy',$user],'method'=>'DELETE']) !!}
    <button onclick="return confirm('Seguro que desea eliminar')" class="btn btn-danger">Eliminar</button>
{!! Form::close() !!}