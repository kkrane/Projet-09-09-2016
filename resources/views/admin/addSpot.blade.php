@extends('layouts.app')


@section('content')
<div>
	{{ Form::open(['url' => isset($spot) ? '/spot/'.$spot->id  :  '/spot', 'method' => isset($spot) ? 'put' : 'post']) }}
		{{ Form::label('num', 'N° place :',['class'=>'addSpotForm']) }}
		{{Form::text('num',isset($spot) ? $spot->num : null)}}<br/>
		{!! $errors->first('num','<small class="help-block">:message</small>') !!}
		@if(session()->has('taken'))
            <small class="help-block">Cette place existe deajà</small>
        @endif
        @if(!isset($spot))
		    {{Form::label('floor', "Etage :",['class'=>'addSpotForm'])}}
    		{{Form::text('floor',isset($spot) ? $spot->num : null)}}<br/>
        @endif
		{!! $errors->first('floor','<small class="help-block">:message</small>') !!}
		{{Form::label('type','Type : ',['class'=>'addSpotForm'])}}
		{{Form::radio('type', 0)}}<span>Normale</span>
		{{Form::radio('type', 1)}}<span>Moto</span>
		{{Form::radio('type', 2)}}<span>Handicapée</span><br/>
		{{Form::submit('Ajouter',[])}}
	{{Form::close()}}
</div>
@endsection