@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Contacter l'administrateur</div>

                <div class="panel-body">
	
                	{{Form::open(['route' => 'ticket.store', 'method' => 'post'])}}
                	    <div class="form-group">
                		{{Form::label('message','Votre message')}}
                		{{Form::textarea('message', null,['class'=>'form-control','rows'=>'8'])}}<br/>{!! $errors->first('message','<small class="help-block">:message</small>') !!}
                		{{form::hidden('id',isset($user) ? $user->id : null)}}
                		{{Form::submit(isset($user) ? 'Editer' : 'Ajouter',['class'=>'btn btn-success pull-right'])}}
                	{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection