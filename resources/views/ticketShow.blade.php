@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ticket n°{{$ticket->id}}</div>

                <div class="panel-body">
	
                	<p>Utilisateur : {{$ticket->user->id}}</p>
                	<p>Message :<br/>
                        {{$ticket->message}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection