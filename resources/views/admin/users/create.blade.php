@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'admin.users.store', 'method'=>'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('email','Correo Electronico') !!}
                                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese email']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Contraseña') !!}
                                {!! Form::password('password',['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name','Nombre') !!}
                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name','Apellido') !!}
                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('type','Tipo de Usuario') !!}
                                {!! Form::select('type',[''=>'Seleccion tipo de usuario','user'=>'Usuario','admin'=>'Administrador'],null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
