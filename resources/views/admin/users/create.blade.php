@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>
                    <div class="panel-body">
                        @include('admin.users.errors.messages')
                        {!! Form::open(['route'=>'admin.users.store', 'method'=>'POST']) !!}
                            @include('admin.users.partials.fields')
                            {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
