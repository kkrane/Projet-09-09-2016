@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{isset($user) ? 'Editer' : 'Ajouter'}} un utilisateur</div>

                <div class="panel-body">
	
                	{{Form::open(['url' => isset($user) ? '/user/'.$user->id  :  '/user', 'method' => isset($user) ? 'put' : 'post'])}}
                	    <div class="form-group">
                		{{Form::label('email','Mail :',['class'=>'registerForm'])}}
                		{{Form::email('email', isset($user) ? $user->email : null,['class'=>'form-control'])}}<br/>{!! $errors->first('email','<small class="help-block">:message</small>') !!}
                        </div>
                	    <div class="form-group">
                		{{Form::label('name','Prenom :',['class'=>'registerForm'])}}
                		{{Form::text('name',isset($user) ? $user->name : null,['class'=>'form-control'])}}<br/>{!! $errors->first('name','<small class="help-block">:message</small>') !!}
                        </div>
                	    <div class="form-group">
                		{{Form::label('surname','Nom :', ['class'=>'registerForm'])}}
                		{{Form::text('surname',isset($user) ? $user->surname : null,['class'=>'form-control'])}}<br/>{!! $errors->first('surname','<small class="help-block">:message</small>') !!}
                        </div>
                		<div class="form-group">
                		{{Form::label('password','Mot de passe :',['class'=>'registerForm'])}}
                		{{Form::password('password',['class'=>'form-control'])}}<br/>{!! $errors->first('password','<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                		{{Form::label('password_confirmation','Confirmation :',['class'=>'registerForm'])}}
                		{{Form::password('password_confirmation',['class'=>'form-control'])}}<br/>{!! $errors->first('password_confirmation','<small class="help-block">:message</small>') !!}
                        </div>
                		{{form::hidden('id',isset($user) ? $user->id : null)}}
                		{{Form::submit(isset($user) ? 'Editer' : 'Ajouter',['class'=>'btn btn-success pull-right'])}}
                	{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection