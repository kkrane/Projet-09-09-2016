@extends('templates.baseTemplate')

@section('title', 'Register')

@section('content')
	
	{{Form::open(['route'=>'user.store'])}}
		{{Form::label('email','Mail :',['class'=>'registerForm'])}}
		{{Form::email('email')}}<br/>{!! $errors->first('email','<small class="help-block">:message</small>') !!}
		{{Form::label('name','Prenom :',['class'=>'registerForm'])}}
		{{Form::text('name')}}<br/>{!! $errors->first('name','<small class="help-block">:message</small>') !!}
		{{Form::label('surname','Nom :', ['class'=>'registerForm'])}}
		{{Form::text('surname')}}<br/>{!! $errors->first('surname','<small class="help-block">:message</small>') !!}
		{{Form::label('password','Mot de passe :',['class'=>'registerForm'])}}
		{{Form::password('password')}}<br/>{!! $errors->first('password','<small class="help-block">:message</small>') !!}
		{{Form::label('password_confirmation','Confirmation :',['class'=>'registerForm'])}}
		{{Form::password('password_confirmation')}}<br/>{!! $errors->first('password_confirmation','<small class="help-block">:message</small>') !!}
		{{Form::submit()}}
	{{Form::close()}}
	
@endsection