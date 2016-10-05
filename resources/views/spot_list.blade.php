@extends('layouts.app')

@section('title')

@section('content')

@if(isset($deleted))
<p>L'utilisateur {{$deleted}} a été effacé avec succès!</p>
@endif

<button class="btn btn-primary pull-right">{!!Html::linkRoute('spot.create','Ajouter une place')!!}</button>
<table class="table">
	<tr>
		<th>Numéro</th>
		<th>Etage</th>
		<th>Statut</th>
		<th>Utilisateur</th>
		<th>Type</th>
		<th></th>
		<th></th>
	</tr>

@foreach($spots as $spot)
	<tr>
		<td>{{Html::linkRoute('spot.show',$spot->num,['id'=>$spot->id])}}</td>
		<td>{{$spot->floor}}</td>
		<td>{{$spot->status}}</td>
		<td>{{$spot->user_id}}</td>
		<td>{{$spot->type}}</td>
		<td>{{Html::linkRoute('spot.edit','Editer',['id'=>$spot->id])}}
		<td>
        {{Form::open(['route'=>['spot.destroy', $spot->id],'method'=>'DELETE'])}}
            {{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
            {{Form::hidden('id', $spot->id)}}
        {{Form::close()}}
		</td>
	</tr>
@endforeach
@endsection


@section('js')
<script>
       $('.btn-danger').click(function(){
          return confirm('Etes vous sûr de vouloir effacer cette place?');
       });
</script>

@endsection