@extends('templates.baseTemplate')

@section('title', 'Login')

@section('content')
{{$user->name}}
{{Form::open()}}
    {{Form::label('email')}}
    {{Form::text('email')}}
    {{Form::label('password')}}
    {{Form::password('password')}}
{{Form::close()}}


@endsection