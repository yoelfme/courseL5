@extends('examples.layout')

@section('title')
    Curso de Laravel en duilio.me
@stop

@section('content')
    <h2>Curso basico de Laravel 5</h2>
    <p>
        @if(isset($user))
            <p>Bienvenido {{ $user }}
        @else
            [Login]
        @endif
    </p>
@stop